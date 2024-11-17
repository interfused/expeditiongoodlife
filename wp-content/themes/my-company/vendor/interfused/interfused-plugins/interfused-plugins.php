<?php
/**
 * Plugin installer
 *
 * @package mycompany
 * @subpackage Admin
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 * @author Interfused.com
 */

define('PM_PLUGINS_INSTALLER_DIR', PM_THEME_DIR . 'vendor/interfused/interfused-plugins/');
define('PM_PLUGINS_INSTALLER_URI', PM_THEME_URI . 'vendor/interfused/interfused-plugins/');

if (!class_exists('InterfusedPlugins')) {
    require_once(PM_PLUGINS_INSTALLER_DIR . 'inc/InterfusedPlugins.php');

    InterfusedPlugins::instance();
}
