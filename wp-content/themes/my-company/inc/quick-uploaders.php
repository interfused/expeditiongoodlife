<?php
/**
 * Stores options for themes quick uploaders
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 
 * @version 1.10.3
 */

return array(
    // slideshoe quick upload
    'pm_slideshow_image' => array(
        'menu_title' => __('Quick Slideshow', 'my_theme-admin-td'),
        'page_title' => __('Quick Slideshow Creator', 'my_theme-admin-td'),
        'item_singular'  => __('Slideshow Image', 'my_theme-admin-td'),
        'item_plural'  => __('Slideshow Images', 'my_theme-admin-td'),
        'taxonomies' => array(
            'pm_slideshow_categories'
        )
    ),
    // services quick upload
    'pm_service' => array(
        'menu_title' => __('Quick Services', 'my_theme-admin-td'),
        'page_title' => __('Quick Services Creator', 'my_theme-admin-td'),
        'item_singular'  => __('Services', 'my_theme-admin-td'),
        'item_plural'  => __('Service', 'my_theme-admin-td'),
        'show_editor' => true,
    ),
    // portfolio quick upload
    'pm_portfolio_image' => array(
        'menu_title' => __('Quick Portfolio', 'my_theme-admin-td'),
        'page_title' => __('Quick Portfolio Creator', 'my_theme-admin-td'),
        'item_singular'  => __('Portfolio Image', 'my_theme-admin-td'),
        'item_plural'  => __('Portfolio Images', 'my_theme-admin-td'),
        'show_editor' => true,
        'taxonomies' => array(
            'pm_portfolio_categories'
        )
    ),
    // staff quick upload
    'pm_staff' => array(
        'menu_title' => __('Quick Staff', 'my_theme-admin-td'),
        'page_title' => __('Quick Staff Creator', 'my_theme-admin-td'),
        'item_singular'  => __('Staff Member', 'my_theme-admin-td'),
        'item_plural'  => __('Staff', 'my_theme-admin-td'),
        'show_editor' => true,
        'taxonomies' => array(
            'pm_staff_skills'
        )
    )
);