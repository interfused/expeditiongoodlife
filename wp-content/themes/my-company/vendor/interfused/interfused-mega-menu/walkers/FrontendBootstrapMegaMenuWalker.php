<?php
/**
 * Main Nav Walker for Bootstrap Fronted
 *
 * @package mycompany
 * @subpackage Admin
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 * @author Interfused.com
 */

/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class FrontendBootstrapMegaMenuWalker extends Walker_Nav_Menu
{
    private $parent_item;
    private $current_item;
    /**
     * @see Walker::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        // store the parent item so we can decide if it needs to be a dropdown or not
        // columns will not use dropdowns
        $this->parent_item = $this->current_item;

        $indent = str_repeat("\t", $depth);

        $classes = array();
        $classes[] = 'dropdown-menu';
        $classes = apply_filters('nav_dropdown_menu_css_class', $classes, $depth, $args);

        // if this is a column we dont want it to be a dropdown menu
        if (null !== $this->parent_item && $this->parent_item->object === 'pm_mega_columns') {
            unset($classes[0]);
        }
        // if this is a mega menu we want to add a row class to it
        $background_attr = '';
        if ($this->current_item->object === 'pm_mega_menu') {
            $classes[] = 'row';
            $pm_bg_url = get_post_meta($this->current_item->ID, 'pm_bg_url', true);
            if (!empty($pm_bg_url)) {
                $background_attr = ' style="background-image:url(' . $pm_bg_url . '); background-size: cover;"';
            }
        }

        $output .= $indent . '<ul role="menu" class="' . implode(' ', $classes) . '"' . $background_attr . '>';
    }

    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param int $current_page Menu item ID.
     * @param object $args
     */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        global $pm_is_iphone, $pm_is_android, $pm_is_ipad;

        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // add column classes if item is a column post
        if ($item->object === 'pm_mega_columns') {
            $classes[] = get_post_field('post_content', $item->object_id);
        }

        if ($item->object === 'pm_mega_menu') {
            if (isset($item->pm_mega_borders) && $item->pm_mega_borders === 'off') {
                $classes[] = 'pm_mega_menu-no-dividers';
            }
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

        if ($args->has_children) {
            $class_names .= ' dropdown';
        }

        if (in_array('current-menu-item', $classes)) {
            $class_names .= ' active';
        }

        /**
         * Dividers, Headers or Disabled
         * =============================
         */
        $pm_special_menu_type = get_post_meta($item->ID, 'pm_special', true);
        $is_divider = false;
        if (!empty($pm_special_menu_type)) {
            switch($pm_special_menu_type) {
                case 'divider':
                    $output .= $indent . '<li role="presentation" class="divider">';
                    $is_divider = true;
                    break;
                default:
                    // all other types just add the class
                    $class_names .= ' ' . $pm_special_menu_type;
                    break;
            }
        }
        if( !$is_divider ){
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

            $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';

            // create start of li
            $output .= $indent . '<li' . $id . $class_names .'>';

            $atts = array();
            $atts['target'] = !empty($item->target) ? $item->target : '';
            $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
            $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';

            // If item has_children add atts to a.
            if ($args->has_children && $depth === 0) {
                if (pm_get_option('hover_menu') === 'on' && !$pm_is_iphone && !$pm_is_android && !$pm_is_ipad) {
                    if ($item->object == 'pm_mega_menu') {
                        $pm_mega_url = get_post_meta($item->ID, 'pm_mega_url', true);
                        $atts['href'] = empty($pm_mega_url) ? '#' : $pm_mega_url;
                    } else {
                        $atts['href'] = ! empty($item->url) ? $item->url : '';
                    }
                }
                else {
                    // if we have a mobile with a mega menu hold the link as data attribute
                    if ($pm_is_iphone || $pm_is_android ||$pm_is_ipad) {
                        if ($item->object == 'pm_mega_menu') {
                            $pm_mega_url = get_post_meta($item->ID, 'pm_mega_url', true);
                            $atts['data-link'] = empty($pm_mega_url) ? '#' : $pm_mega_url;
                        } else {
                            $atts['data-link'] = ! empty($item->url) ? $item->url : '';
                        }
                    }
                    $atts['href']           = '#';
                    $atts['data-toggle']    = 'dropdown';
                }
                $atts['class']          = 'dropdown-toggle';
            } else {
                $atts['href'] = ! empty($item->url) ? $item->url : '';
            }

            $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

            // we want mega menu columns to use spans instead of links
            $link_tag = ($item->object === 'pm_mega_columns' && empty($item->pm_col_url)) ? 'strong' : 'a';

            if ($link_tag === 'a' && isset($item->pm_col_url)) {
                $atts['href'] = $item->pm_col_url;
            }

            if ($link_tag === 'strong' && isset($atts['href'])) {
                unset($atts['href']);
            }

            $attributes = '';
            foreach ($atts as $attr => $value) {
                if (! empty($value)) {
                    $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;

            // extra icon option
            $pm_icon = get_post_meta($item->ID, 'pm_icon', true);
            $item_output .= $link_tag === 'a' && $item->object === 'pm_mega_columns' ? '<strong><' . $link_tag . $attributes . '>' :  '<' . $link_tag . $attributes .'>';
            if (!empty($pm_icon)) {
                $item_output .= '<i class="menu-icon fa fa-' . esc_attr($pm_icon) . '"></i>&nbsp;';
            }

            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            // Interfused changed this line to remove caret

            if (!empty($item->pm_label)) {
                $item_output .= '<span class="label menu-label label-' . $item->pm_label_type . '">' . $item->pm_label . '</span>';
            }

            $item_output .= '</' . $link_tag . '>';
            $item_output .= $link_tag === 'a' && $item->object === 'pm_mega_columns' ? '</strong>' : '';

            $item_output .= $args->after;

            if ($item->object === 'pm_mega_columns' && !empty($item->description)) {
                $item_output .= '<p>' . $item->description . '</p>';
            }

            /**
             * Widgets
             * =============================
             */
            global $wp_registered_sidebars;
            // var_dump($wp_registered_sidebars);

            if ($item->object === 'pm_mega_columns') {
                $pm_widget = get_post_meta($item->ID, 'pm_widget', true);
                if ('on' === $pm_widget) {
                    ob_start();
                    dynamic_sidebar('menu-' . $item->ID);
                    $widget = ob_get_contents();
                    ob_end_clean();
                    $item_output .= $widget;
                }
            }

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }



    }

    /**
     * Traverse elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth.
     *
     * This method shouldn't be called directly, use the walk() method instead.
     *
     * @see Walker::start_el()
     * @since 2.5.0
     *
     * @param object $element Data object
     * @param array $children_elements List of elements to continue traversing.
     * @param int $max_depth Max depth to traverse.
     * @param int $depth Depth of current element.
     * @param array $args
     * @param string $output Passed by reference. Used to append additional content.
     * @return null Null on failure with no changes to parameters.
     */
    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
    {
        if (!$element) {
            return;
        }

        $id_field = $this->db_fields['id'];

        $element->is_dropdown = !empty($children_elements[$element->ID]);

        // Display this element.
        if (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
            if ($args[0]->has_children && $depth > 0) {
                $element->classes[] = 'dropdown-submenu';
            }
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    /**
     * Menu Fallback
     * =============
     * If this function is assigned to the wp_nav_menu's fallback_cb variable
     * and a manu has not been assigned to the theme location in the WordPress
     * menu manager the function with display nothing to a non-logged in user,
     * and will add a link to the WordPress menu manager if logged in as an admin.
     *
     * @param array $args passed from the wp_nav_menu function.
     *
     */
    public static function fallback($args)
    {
        if (current_user_can('manage_options')) {

            extract($args);

            $fb_output = null;

            if ($container) {
                $fb_output = '<' . $container;

                if ($container_id) {
                    $fb_output .= ' id="' . $container_id . '"';
                }

                if ($container_class) {
                    $fb_output .= ' class="' . $container_class . '"';
                }

                $fb_output .= '>';
            }

            $fb_output .= '<ul';

            if ($menu_id) {
                $fb_output .= ' id="' . $menu_id . '"';
            }

            if ($menu_class) {
                $fb_output .= ' class="' . $menu_class . '"';
            }

            $fb_output .= '>';
            $fb_output .= '<li><a href="' . admin_url('nav-menus.php') . '">Add a menu</a></li>';
            $fb_output .= '</ul>';

            if ($container) {
                $fb_output .= '</' . $container . '>';
            }

            echo $fb_output;
        }
    }
}
