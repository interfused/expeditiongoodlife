<?php
    /**
     * Options for on scroll animations
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
        'name'        => __('Scroll Animation', 'my_theme-admin-td'),
        'desc'        => __('Animation that will occur when the user scrolls onto the element.', 'my_theme-admin-td'),
        'id'          => 'scroll_animation',
        'type'        => 'select',
        'default'     => 'none',
        'options'     => include PM_THEME_DIR . 'inc/options/global-options/animations.php',
    ),
    array(
        'name'    => __('Animation Delay', 'my_theme-admin-td'),
        'desc'    => __('Delay after scrolling onto the element before animation starts.', 'my_theme-admin-td'),
        'id'      => 'scroll_animation_delay',
        'type'    => 'slider',
        'default' => '0',
        'attr'    => array(
            'max'  => 4,
            'min'  => 0,
            'step' => 0.1
        )
    )
);
