<?php
/**
 * Oxyggena Typography Module
 *
 * @package mycompany
 * @subpackage Updater
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 * @author Interfused.com
 */


define('PM_UPDATER_DIR', PM_THEME_DIR . 'vendor/interfused/interfused-updater/');
define('PM_UPDATER_URI', PM_THEME_URI . 'vendor/interfused/interfused-updater/');

if (!class_exists('InterfusedUpdater')) {
    require_once(PM_UPDATER_DIR . 'inc/InterfusedUpdater.php');
    global $pm_updater;
    $pm_updater = InterfusedUpdater::instance();
}
