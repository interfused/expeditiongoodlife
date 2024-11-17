<?php
/**
 * Once Click Installer Option Pages
 *
 * @package mycompany
 * @subpackage Admin
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 * @author Interfused.com
 */

global $pm_theme;
$installer_throttle = $pm_theme->get_option('one_click_throttle', false);
$installer_throttle = false === $installer_throttle ? 2 : $installer_throttle;
$installer_throttle *= 1000;

$pm_theme->register_option_page(array(
    'page_title' => __('Demo Content', 'my_theme-admin-td'),
    'menu_title' => __('Demo Content', 'my_theme-admin-td'),
    'slug'       => THEME_SHORT . '-oneclick',
    'main_menu'  => false,
    'icon'       => 'tools',
    'stylesheets' => array(
        array(
            'handle' => 'one_click_installer',
            'src'    => PM_ONECLICK_URI . 'assets/stylesheets/one-click-installer.css',
            'deps'   => array('pm-option-page'),
        ),
    ),
    'javascripts' => array(
        array(
            'handle' => 'one_click_installer',
            'src'    => PM_ONECLICK_URI . 'assets/javascripts/install.js',
            'deps'   => array( 'jquery', 'jquery-ui-progressbar', 'jquery-ui-dialog' ),
            'localize' => array(
                'object_handle' => 'importInfo',
                'data'          => array(
                    'installThrottle' =>  $installer_throttle,
                    'ajaxURL'         => admin_url('admin-ajax.php'),
                    'importNonce'     => wp_create_nonce('pm-importer'),
                    'themePackages'   => array_reverse(apply_filters('pm_one_click_import_packages', array()))
                )
            ),
        ),
        array(
            'handle' => 'one_click_installer_checklist',
            'src'    => PM_ONECLICK_URI . 'assets/javascripts/checklist.js',
            'deps'   => array('jquery'),
        ),
        array(
            'handle' => 'one_click_installer_packages',
            'src'    => PM_ONECLICK_URI . 'assets/javascripts/packages.js',
            'deps'   => array('jquery'),
        ),
        array(
            'handle' => 'one_click_installer_complete',
            'src'    => PM_ONECLICK_URI . 'assets/javascripts/complete.js',
            'deps'   => array('jquery'),
        ),
    ),
    'sections'   => array(
        'oneclick-setup' => array(
            'title'   => __('OneClick Installer', 'my_theme-admin-td'),
            'header'  => __('Make my site just like the demo site!', 'my_theme-admin-td'),
            'fields' => array(
                array(
                    'name'        => __('Install Demo Site Content', 'my_theme-admin-td'),
                    'button-text' => __('Make Me Beautiful', 'my_theme-admin-td'),
                    'desc'        => __('This button will setup your site to look just like the demo site.', 'my_theme-admin-td'),
                    'id'          => 'oneclick_setup',
                    'attr'        => array(
                        'class'   => 'one-click'
                    ),
                    'type'        => 'button',
                ),
            )
        )
    )
));
