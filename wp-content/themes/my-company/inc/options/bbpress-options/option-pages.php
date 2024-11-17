<?php
/**
 * Options for BBPres
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */

$bbpress_header_options = include PM_THEME_DIR . 'inc/options/global-options/heading-options.php';
$bbpress_header_section_options = include PM_THEME_DIR . 'inc/options/global-options/section-options.php';

// remove header text and subtitle
unset($bbpress_header_options[0]);
unset($bbpress_header_options[1]);

// set defaults for blog heading and section
// set default heading to my blog
$bbpress_header_options[4]['default'] = 'super';
$bbpress_header_options[5]['default'] = 'light';
$bbpress_header_options[11]['default'] = 'medium-top';
$bbpress_header_options[12]['default'] = 'medium-bottom';
// set default swatch to blue
$bbpress_header_section_options[0]['default'] = 'swatch-blue';


global $pm_theme;
$pm_theme->register_option_page(array(
    'menu_title' => __('BBPress', 'my_theme-admin-td'),
    'page_title' => __('BBPress Theme Settings', 'my_theme-admin-td'),
    'slug'       => THEME_SHORT . '-bbpress',
    'main_menu'  => false,
    'icon'       => 'tools',
    'sections'   => array(
        'bbpress-general' => array(
            'title'   => __('General BBPress Options', 'my_theme-admin-td'),
            'header'  => __('', 'my_theme-admin-td'),
            'fields' => array(
                array(
                    'name'    => __('BBPress Page Style', 'my_theme-admin-td'),
                    'desc'    => __('Select a layout style to use for your blog pages.', 'my_theme-admin-td'),
                    'id'      => 'bbpress_style',
                    'type'    => 'imgradio',
                    'columns' => '5',
                    'options' => array(
                        'right' => array(
                            'name' => __('Right Sidebar', 'my_theme-admin-td'),
                            'image' => PM_THEME_URI . 'inc/assets/images/blog-rightsidebar.png',
                        ),
                        'left' => array(
                            'name' => __('Left Sidebar', 'my_theme-admin-td'),
                            'image' => PM_THEME_URI . 'inc/assets/images/blog-leftsidebar.png',
                        ),
                        'fullwidth' => array(
                            'name' => __('Full Width', 'my_theme-admin-td'),
                            'image' => PM_THEME_URI . 'inc/assets/images/blog-wide.png',
                        ),
                    ),
                    'default' => 'right',
                ),
                array(
                    'name'    => __('BBPres Swatch', 'my_theme-admin-td'),
                    'desc'    => __('Choose a color swatch for the BBPress pages', 'my_theme-admin-td'),
                    'id'      => 'bbpress_swatch',
                    'type'    => 'select',
                    'default' => 'swatch-white',
                    'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
                ),
            )
        ),
        'bbpress-header-text' => array(
            'title'   => __('BBPress Header Titles', 'my_theme-admin-td'),
            'header'  => __('Change the text for some of your BBPress page headings.', 'my_theme-admin-td'),
            'fields'  => array(
                array(
                    'name' => __('Forums Title', 'my_theme-admin-td'),
                    'desc' => __('Title that is shown on the main forums archive page.', 'my_theme-admin-td'),
                    'id'   => 'bbpress_header_forums',
                    'type' => 'text',
                    'default' => __('Forums', 'my_theme-admin-td')
                ),
                array(
                    'name' => __('Topics Title', 'my_theme-admin-td'),
                    'desc' => __('Title that is shown on the main topics archive page.', 'my_theme-admin-td'),
                    'id'   => 'bbpress_header_topics',
                    'type' => 'text',
                    'default' => __('Topics', 'my_theme-admin-td')
                )
            )
        ),
        'bbpress-header-options' => array(
            'title'   => __('BBPress Header Options', 'my_theme-admin-td'),
            'header'  => __('Change how your BBPress headers look.', 'my_theme-admin-td'),
            'fields'  => array_merge(
                array(
                    array(
                        'name' => __('Show Header', 'my_theme-admin-td'),
                        'desc' => __('Show or hide the header at the top of the page.', 'my_theme-admin-td'),
                        'id'   => 'bbpress_header_show_header',
                        'type' => 'select',
                        'default' => 'show',
                        'options' => array(
                            'hide' => __('Hide', 'my_theme-admin-td'),
                            'show' => __('Show', 'my_theme-admin-td'),
                        ),
                    )
                ),
                array(
                    array(
                        'name' => __('Show Breadcrumbs', 'my_theme-admin-td'),
                        'desc' => __('Show or hide the breadcrumbs in the header', 'my_theme-admin-td'),
                        'id'   => 'bbpress_header_show_breadcrumbs',
                        'type' => 'select',
                        'default' => 'show',
                        'options' => array(
                            'hide' => __('Hide', 'my_theme-admin-td'),
                            'show' => __('Show', 'my_theme-admin-td'),
                        ),
                    )
                )
            )
        ),
        'bbpress-header-heading' => array(
            'title'   => __('BBPress Header Heading', 'my_theme-admin-td'),
            'header'  => __('Change the text of your BBPress heading here.', 'my_theme-admin-td'),
            'fields'  => pm_prefix_options_id( 'bbpress_header', $bbpress_header_options ),
        ),
        'bbpress-header-section' => array(
            'title'   => __('BBPress Header Section', 'my_theme-admin-td'),
            'header'  => __('Change the appearance of your BBPress header section.', 'my_theme-admin-td'),
            'fields'  => pm_prefix_options_id( 'bbpress_header', $bbpress_header_section_options )
        ),
    )
));
