<?php
/**
 * Boostrap code for typography module
 *
 * @package mycompany
 * @subpackage Typography
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 * @author Interfused.com
 */


define('PM_TYPOGRAPHY_DIR', PM_THEME_DIR . 'vendor/interfused/interfused-typography/');
define('PM_TYPOGRAPHY_URI', PM_THEME_URI . 'vendor/interfused/interfused-typography/');

if (!class_exists('InterfusedTypography')) {
    require_once(PM_TYPOGRAPHY_DIR . 'inc/InterfusedTypography.php');
    global $pm_typography;
    $pm_typography = InterfusedTypography::instance();
}
