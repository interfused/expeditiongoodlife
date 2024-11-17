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

return array(
    array(
        'name'        => __('Title', 'my_theme-admin-td'),
        'id'          => 'title',
        'type'        => 'text',
        'default'     => __('Blog', 'my_theme-admin-td'),
        'desc'        => __('Main Blog Title text', 'my_theme-admin-td'),
        'admin_label' => true,
    ),
    array(
        'name'    => __('Title Font Size', 'my_theme-admin-td'),
        'desc'    => __('Choose size of the font to use in your header', 'my_theme-admin-td'),
        'id'      => 'title_size',
        'type'    => 'select',
        'options' => array(
            'big'       => __('Normal', 'my_theme-admin-td'),
            'bigger'    => __('Bigger (48px)', 'my_theme-admin-td'),
            'super'     => __('Super (60px)', 'my_theme-admin-td'),
            'hyper'     => __('Hyper (96px)', 'my_theme-admin-td'),
        ),
        'default' => 'normal',
    ),
    array(
        'name'    => __('Title Font Weight', 'my_theme-admin-td'),
        'desc'    => __('Choose weight of the font to use in the title', 'my_theme-admin-td'),
        'id'      => 'title_weight',
        'type'    => 'select',
        'options' => array(
            'regular'  => __('Regular', 'my_theme-admin-td'),
            'black'    => __('Black', 'my_theme-admin-td'),
            'bold'     => __('Bold', 'my_theme-admin-td'),
            'light'    => __('Light', 'my_theme-admin-td'),
            'hairline' => __('Hairline', 'my_theme-admin-td'),
        ),
        'default' => 'regular',
    ),
    array(
        'name' => __('Title Alignment', 'my_theme-admin-td'),
        'desc' => __('Align the text shown in the header left, right or center.', 'my_theme-admin-td'),
        'id'   => 'title_align',
        'type' => 'select',
        'default' => 'center',
        'options' => array(
            'default'   => __('Default alignment', 'my_theme-admin-td'),
            'center' => __('Center', 'my_theme-admin-td'),
            'left'   => __('Left', 'my_theme-admin-td'),
            'right'  => __('Right', 'my_theme-admin-td'),
            'justify'  => __('Justify', 'my_theme-admin-td')
        ),
    ),
    array(
        'name'    => __('Title Font Colour', 'my_theme-admin-td'),
        'desc'    => __('Choose colour of the font to use in your header', 'my_theme-admin-td'),
        'id'      => 'title_colour',
        'default' => '#FFF',
        'type'    => 'colour'
    ),
    array(
        'name'    => __('Background Header Colour', 'my_theme-admin-td'),
        'desc'    => __('Choose colour of the background of your header', 'my_theme-admin-td'),
        'id'      => 'background_title_colour',
        'default' => '#9bd6f3',
        'type'    => 'colour'
    )
);