<?php
/**
 * Installer popup
 *
 * @package ThemeFramework
 * @subpackage Theme
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */

/**
 * Main theme admin bootstrap class
 *
 * @since 1.0
 */
class InterfusedThemeInstall
{
    private static $instance;

    public static function instance()
    {
        if (! self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Constructor, called if the theme is switched by †he main Theme class
     *
     * @since 1.0
     * @param array $options array of all theme options to use in construction this theme
     */
    public function __construct()
    {
        add_action('wp_ajax_pm_theme_list_installer', array(&$this, 'pm_theme_list_installer' ));
        add_action('after_switch_theme', array(&$this, 'check_first_install'));
    }

    /**
     * Checks to see if installer is needed and runs it
     *
     * @return void
     **/
    public function check_first_install()
    {
        // check if this is first install
        if (get_option(THEME_SHORT . '_first_install', false) === false) {
            $data = apply_filters('pm_theme_install_data', array());
            if (!empty($data)) {
                // enqueue js and localise it
                wp_enqueue_style('pm-colorbox', PM_TF_URI . 'assets/css/colorbox/colorbox.css');
                wp_enqueue_style('pm-list-installer', PM_TF_URI . 'assets/css/installer/list-installer.css');
                wp_enqueue_script('pm-colorbox', PM_TF_URI . 'assets/components/jquery-colorbox/jquery.colorbox-min.js', array('jquery'), '1.5.14', false);
                wp_enqueue_script('pm-first-install', PM_TF_URI . 'assets/javascripts/installer/list-installer.js', array('jquery', 'pm-colorbox'));

                wp_localize_script('pm-first-install', 'oxyThemeInstall', array(
                    'ajaxURL' => admin_url('admin-ajax.php'),
                    'data' => $data
                ));
            }
            update_option(THEME_SHORT . '_first_install', true);
        }
    }

    /**
     * List installer page
     *
     * @return void
     **/
    public function pm_theme_list_installer()
    {
        if (wp_verify_nonce($_GET['nonce'], THEME_SHORT . '-theme-list-installer')) {
            $data = apply_filters('pm_theme_install_data', array());
            include(PM_TF_DIR . 'partials/installer/list-installer.php');
        }
        die();
    }
}
// initialise singleton
InterfusedThemeInstall::instance();
