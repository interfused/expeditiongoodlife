<?php
/**
 * Main theme class file
 *
 * @package ThemeFramework
 * @subpackage Theme
 * @since 1.0
 *
 
 
 * @version 1.10.3
 * @author Interfused.com
 */

define('PM_TF_DIR', PM_THEME_DIR . 'vendor/interfused/interfused-framework/');
define('PM_TF_URI', PM_THEME_URI . 'vendor/interfused/interfused-framework/');

include PM_TF_DIR . 'inc/InterfusedCustomise.php';
include_once PM_TF_DIR . 'inc/InterfusedOptions.php';

/**
 * Main theme bootstrap class.
 *
 */
class InterfusedTheme
{
    public $shortcode_options = array();

    public $metaboxes = array();

    private $theme_options;

    private $theme_args;

    /**
     * Constructior, this should be called from functions.php in a theme or child theme
     *
     * @param array $theme array of all theme options to use in construction this theme
     */
    public function __construct($theme_args)
    {
        // store theme options
        $this->theme_args = $theme_args;

        // load textdomains for admin / front
        if (is_admin()) {
            load_theme_textdomain($this->theme_args['admin_text_domain'], get_stylesheet_directory() . '/inc/languages');
        } else {
            load_theme_textdomain($this->theme_args['text_domain'], get_stylesheet_directory() . '/languages');
        }

        add_action('widgets_init', array(&$this, 'load_widgets'));

        // load admin class if we are admin
        if (is_admin()) {
            include PM_TF_DIR . 'inc/InterfusedThemeAdmin.php';
            $admin = new InterfusedThemeAdmin($this);
        }

        // load theme options
        global $pm_theme_options;
        $pm_theme_options = get_option(THEME_SHORT . '-options');

        add_action('after_setup_theme', array(&$this, 'load_option_pages'));

        $interfused_customise = new InterfusedCustomise();

        $this->theme_options = new InterfusedOptions(THEME_SHORT . '-options', THEME_SHORT . '-options', array(
            'admin_bar' => true
        ));
    }

    public function register_shortcode_options($shortcode_options)
    {
        foreach ($shortcode_options as $shortcode => $options) {
            $this->shortcode_options[$shortcode] = $options;
        }
    }

    public function register_option_page($option_page)
    {
        $this->theme_options->add_option_page($option_page);
    }

    public function register_sidebar($name, $desc = '', $class = '', $id = null)
    {
        if ($class == 'widget_tag_cloud') {
            $class = 'tags-widget';
        }
        $options = array(
            'name' => $name,
            'description'=> $desc,
            'before_widget' => '<div id="%1$s" class="sidebar-widget ' . $class  . ' %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="sidebar-header">',
            'after_title' => '</h3>',
        );
        if (null !== $id) {
            $options['id'] = $id;
        }
        register_sidebar($options);
    }

    public function register_metabox($metabox)
    {
        $this->metaboxes[] = $metabox;
    }

    public function load_widgets()
    {
        if (isset($this->theme_args['widgets'])) {
            foreach ($this->theme_args['widgets'] as $class => $file) {
                require_once PM_THEME_DIR . 'inc/options/widgets/' . $file;
                register_widget($class);
            }
        }
    }

    /**
    * Loads option pages. Must be done on init.
    *
    */
    public function load_option_pages()
    {
        if (is_admin() || is_admin_bar_showing()) {
            include PM_THEME_DIR . 'inc/option-pages.php';
        }
    }

    /**
     * Gets a theme option
     *
     * @return theme option value or false if not set
     * @since 1.0
     **/
    public function get_option($name, $default = false)
    {
        $options = get_option(THEME_SHORT . '-options');
        if (isset($options[$name])) {
            return $options[$name];
        } else {
            return $default;
        }
    }

    /**
     * Sets a theme option
     *
     * @return theme option value or false if not set
     * @since 1.0
     **/
    public function set_option($name, $value)
    {
        $options = get_option(THEME_SHORT . '-options');
        $options[$name] = $value;
        update_option(THEME_SHORT . '-options', $options);
    }
}
