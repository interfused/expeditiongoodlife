<?php
/**
 * Themes shortcode options go here
 *
 * @package mycompany
 * @subpackage Core
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */
$animation_options = include PM_THEME_DIR . 'inc/options/global-options/animation-options.php';
$padding_options = include PM_THEME_DIR . 'inc/options/global-options/padding-options.php';

$extra_classes = array(
    array(
        'name'    => __('Extra Classes', 'my_theme-admin-td'),
        'desc'    => __('Add any extra classes you need to add to this element. ( space separated )', 'my_theme-admin-td'),
        'id'      => 'extra_classes',
        'default'     =>  '',
        'type'        => 'text',
    )
);

return array_merge( $padding_options, $animation_options, $extra_classes );