<?php
/**
 * Themes shortcode image options go here
 *
 * @package mycompany
 * @subpackage Core
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */

return array(
        'title' => __('Image options', 'my_theme-admin-td'),
        'fields' => array(
            array(
                'name'    => __('Image Shape', 'my_theme-admin-td'),
                'desc'    => __('Choose the shape of the image', 'my_theme-admin-td'),
                'id'      => 'image_shape',
                'type'    => 'select',
                'options' => array(
                    'box-round'    => __('Round', 'my_theme-admin-td'),
                    'box-rect'     => __('Rectangle', 'my_theme-admin-td'),
                    'box-square'   => __('Square', 'my_theme-admin-td'),
                ),
                'default' => 'box-round',
            ),
            array(
                'name'    => __('Image Size', 'my_theme-admin-td'),
                'desc'    => __('Choose the size of the image', 'my_theme-admin-td'),
                'id'      => 'image_size',
                'type'    => 'select',
                'options' => array(
                    'box-mini'    => __('Mini', 'my_theme-admin-td'),
                    'no-small'    => __('Small', 'my_theme-admin-td'),
                    'box-medium'  => __('Medium', 'my_theme-admin-td'),
                    'box-big'     => __('Big', 'my_theme-admin-td'),
                    'box-huge'    => __('Huge', 'my_theme-admin-td'),
                ),
                'default' => 'box-medium',
            ),
        )
);