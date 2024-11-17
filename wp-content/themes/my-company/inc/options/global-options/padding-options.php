<?php
/**
 * Padding element options
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */

return array(
    array(
        'name'    => __('Margin Top', 'my_theme-admin-td'),
        'desc'    => __('Amount of space to add above this element.', 'my_theme-admin-td'),
        'id'      => 'margin_top',
        'default' => 'short-top',
        'options' => array(
            'no-top'     => __('No Margin (0px)', 'my_theme-admin-td'),
            'short-top'  => __('Short (24px)', 'my_theme-admin-td'),
            'medium-top' => __('Medium (48px)', 'my_theme-admin-td'),
            'normal-top' => __('Normal (72px)', 'my_theme-admin-td'),
            'tall-top'   => __('Tall (96px)', 'my_theme-admin-td'),
        ),
        'type' => 'select',
    ),
    array(
        'name'    => __('Margin Bottom', 'my_theme-admin-td'),
        'desc'    => __('Amount of space to add below this element.', 'my_theme-admin-td'),
        'id'      => 'margin_bottom',
        'default' => 'short-bottom',
        'options' => array(
            'no-bottom'     => __('No Margin (0px)', 'my_theme-admin-td'),
            'short-bottom'  => __('Short (24px)', 'my_theme-admin-td'),
            'medium-bottom' => __('Medium (48px)', 'my_theme-admin-td'),
            'normal-bottom' => __('Normal (72px)', 'my_theme-admin-td'),
            'tall-bottom'   => __('Tall (96px)', 'my_theme-admin-td'),
        ),
        'type' => 'select',
    )
);
