<?php
/**
 * Creates theme shortcode options
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */

global $pm_theme;
if( isset( $pm_theme ) ) {
    $shortcode_options = include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-options.php';    
    $pm_theme->register_shortcode_options($shortcode_options);
}