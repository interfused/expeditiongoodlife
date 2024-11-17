<?php
/**
 * Main mega menu class
 *
 * @package mycompany
 * @subpackage Admin
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 * @author Interfused.com
 */

define('PM_MEGA_MENU_DIR', PM_THEME_DIR . 'vendor/interfused/interfused-mega-menu/');
define('PM_MEGA_MENU_URI', PM_THEME_URI . 'vendor/interfused/interfused-mega-menu/');

if (!class_exists('InterfusedMegaMenu')) {

    require_once(PM_MEGA_MENU_DIR . 'inc/InterfusedMegaMenu.php');
    require_once(PM_MEGA_MENU_DIR . 'walkers/FrontendBootstrapMegaMenuWalker.php');

    InterfusedMegaMenu::instance();
}
