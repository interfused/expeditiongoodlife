<?php
/**
 * Creates all theme metaboxes
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */

global $pm_theme;

$heading_options = include PM_THEME_DIR . 'inc/options/global-options/heading-options.php';
$section_options = include PM_THEME_DIR . 'inc/options/global-options/section-options.php';
$override_header_options = array(
    array(
        'name' => __('Override Default Header', 'my_theme-admin-td'),
        'desc' => __('Disregard the default settings (in Pages option page) for this page and use custom options for the header', 'my_theme-admin-td'),
        'id'   => 'override_header',
        'type' => 'select',
        'default' => 'override',
        'options' => array(
            'default'  => __('Use Defaults', 'my_theme-admin-td'),
            'override' => __('Override Header Options', 'my_theme-admin-td'),
        ),
    )
);

/*  PAGE HEADER OPTIONS */
$pm_theme->register_metabox(array(
    'id' => 'override_page_header',
    'title' => __('Header Override', 'my_theme-admin-td'),
    'priority' => 'high',
    'context' => 'advanced',
    'pages' => array('page', 'pm_portfolio_image', 'pm_staff', 'pm_service'),
    'javascripts' => array(
        array(
            'handle' => 'header_options_script',
            'src'    => PM_THEME_URI . 'inc/assets/js/metaboxes/header-options.js',
            'deps'   => array('jquery'),
            'localize' => array(
                'object_handle' => 'theme',
                'data'          => THEME_SHORT
            ),
        ),
    ),
    'fields' => $override_header_options
));

/*  PAGE HEADER SHOW / HIDE */
$pm_theme->register_metabox(array(
    'id' => 'page_header_show',
    'title' => __('Toggle Header', 'my_theme-admin-td'),
    'priority' => 'high',
    'context' => 'advanced',
    'pages' => array('page', 'pm_portfolio_image', 'pm_staff', 'pm_service'),
    'fields' => array(
        array(
            'name' => __('Show Header', 'my_theme-admin-td'),
            'desc' => __('Show or hide the header at the top of the page.', 'my_theme-admin-td'),
            'id'   => 'show_header',
            'type' => 'select',
            'default' => 'show',
            'options' => array(
                'hide' => __('Hide', 'my_theme-admin-td'),
                'show' => __('Show', 'my_theme-admin-td'),
            )
        )
    )
));

/*  PAGE HEADER HEADING OPTIONS */
$pm_theme->register_metabox( array(
    'id' => 'page_header_heading',
    'title' => __('Header Options', 'my_theme-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('page', 'pm_portfolio_image', 'pm_staff', 'pm_service'),
    'fields' => $heading_options
));

/*  SECTION HEADER HEADING OPTIONS */
$pm_theme->register_metabox( array(
    'id' => 'page_header_section',
    'title' => __('Header Section Options', 'my_theme-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('page', 'pm_portfolio_image', 'pm_staff', 'pm_service'),
    'fields' => $section_options
));

// Page sidebar option
$pm_theme->register_metabox( array(
    'id' => 'page_sidebar_swatch',
    'title' => __('Sidebar Template Options', 'my_theme-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('page', 'pm_service'),
    'javascripts' => array(
        array(
            'handle' => 'sidebar_swatch',
            'src'    => PM_THEME_URI . 'inc/assets/js/metaboxes/sidebar-options.js',
            'deps'   => array( 'jquery'),
        ),
    ),
    'fields' => array(
        array(
            'name'    => __('Page Swatch', 'my_theme-admin-td'),
            'desc'    => __('Select the colour scheme to use for this page and sidebar.', 'my_theme-admin-td'),
            'id'      => 'sidebar_page_swatch',
            'type' => 'select',
            'default' => 'swatch-white',
            'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
        ),
    )
));

$pm_theme->register_metabox( array(
    'id'       => 'page_bullet_nav',
    'title'    => __('Extra Page Options', 'my_theme-admin-td'),
    'priority' => 'default',
    'context'  => 'advanced',
    'pages'    => array('page'),
    'fields'   => array(
        array(
            'name'    => __('Bullet Navigation', 'my_theme-admin-td'),
            'id'      => 'bullet_nav',
            'desc'    => __('Display a bullet-style scroll navigation.', 'my_theme-admin-td'),
            'default' => 'hide',
            'type'    => 'select',
            'options' => array(
                'show'    => __('Show', 'my_theme-admin-td'),
                'hide'    => __('Hide', 'my_theme-admin-td'),
            )
        ),
        array(
            'name'    => __('Bullet Show Tooltips', 'my_theme-admin-td'),
            'id'      => 'bullet_nav_tooltips',
            'desc'    => __('Display the section label when you hover over a bullet.', 'my_theme-admin-td'),
            'default' => 'off',
            'type'    => 'select',
            'options' => array(
                'on'    => __('Show', 'my_theme-admin-td'),
                'off'   => __('Hide', 'my_theme-admin-td'),
            )
        ),
    )
));

/*  PAGE HEADER OPTIONS */
$default_swatches = include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php';
$pm_theme->register_metabox( array(
    'id' => 'page_site_overrides',
    'title' => __('Site Overrides', 'my_theme-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('page'),
    'fields' => array(
        array(
            'name'    => __('Show Top Bar', 'my_theme-admin-td'),
            'desc'    => __('Show or hide the sites top bar (ideal for landing pages).', 'my_theme-admin-td'),
            'id'      => 'site_top_bar',
            'type' => 'select',
            'default' => 'show',
            'options' => array(
                'show' => __('Show Top Bar', 'my_theme-admin-td'),
                'hide' => __('Hide Top Bar', 'my_theme-admin-td'),
            )
        ),
        array(
            'name'    => __('Show Menu', 'my_theme-admin-td'),
            'desc'    => __('Show or hide the sites top navigation menu (ideal for landing pages).', 'my_theme-admin-td'),
            'id'      => 'site_top_nav',
            'type' => 'select',
            'default' => 'show',
            'options' => array(
                'show' => __('Show Top Nav', 'my_theme-admin-td'),
                'hide' => __('Hide Top Nav', 'my_theme-admin-td'),
            )
        ),
        array(
            'name'    => __('Override Menu Swatch', 'my_theme-admin-td'),
            'desc'    => __('Override the default site menu swatch (only for this page).', 'my_theme-admin-td'),
            'id'      => 'site_top_swatch',
            'type' => 'select',
            'default' => '',
            'options' => array_merge( array(
                '' => __('Default Menu Swatch', 'my_theme-admin-td'),
            ), $default_swatches )
        ),
        array(
            'name'    => __('Override Menu Swatch After Scroll Point', 'my_theme-admin-td'),
            'desc'    => __('Override the default site menu swatch after it crosses the scroll point (only for this page).', 'my_theme-admin-td'),
            'id'      => 'site_top_swatch_after_scroll',
            'type' => 'select',
            'default' => '',
            'options' => array_merge( array(
                '' => __('Default Menu After Scroll Swatch', 'my_theme-admin-td'),
            ), $default_swatches )
        ),
        array(
            'name'    => __('Top Navigation Transparency', 'my_theme-admin-td'),
            'desc'    => __('Make the sites top navigation transparent', 'my_theme-admin-td'),
            'id'      => 'site_top_nav_transparency',
            'type' => 'select',
            'default' => 'off',
            'options' => array(
                'on'    => __('On (Transparent)', 'my_theme-admin-td'),
                'off'   => __('Off (Opaque)', 'my_theme-admin-td'),
            )
        ),
        array(
            'name'    => __('Override Footer Swatch', 'my_theme-admin-td'),
            'desc'    => __('Override the default site footer swatch (only for this page).', 'my_theme-admin-td'),
            'id'      => 'site_footer_swatch',
            'type' => 'select',
            'default' => '',
            'options' => array_merge( array(
                '' => __('Default Footer Swatch', 'my_theme-admin-td'),
            ), $default_swatches )
        ),
    )
));

/* SWATCH METABOX */
$pm_theme->register_metabox( array(
    'id'       => 'swatch_colours_metabox',
    'title'    => __('Swatch Colours', 'my_theme-admin-td'),
    'priority' => 'default',
    'context'  => 'advanced',
    'pages'    => array('pm_swatch'),
    'fields'   => array(
        array(
            'name'    => __('Text Colour', 'my_theme-admin-td'),
            'id'      => 'text',
            'desc'    => __('Text colour to use for this swatch.', 'my_theme-admin-td'),
            'default' => '#4c4c4c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Heading Colour', 'my_theme-admin-td'),
            'id'      => 'header',
            'desc'    => __('Colour of all headings in this swatch.', 'my_theme-admin-td'),
            'default' => '#1c1c1c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Link Colour', 'my_theme-admin-td'),
            'id'      => 'link',
            'desc'    => __('Colour of all text links.', 'my_theme-admin-td'),
            'default' => '#82c9ed',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Link Colour Hover', 'my_theme-admin-td'),
            'id'      => 'link_hover',
            'desc'    => __('Colour of all text links on hover.', 'my_theme-admin-td'),
            'default' => '#4f9bc2',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Link Colour Active', 'my_theme-admin-td'),
            'id'      => 'link_active',
            'desc'    => __('Colour of all text links he moment it is clicked.', 'my_theme-admin-td'),
            'default' => '#4f9bc2',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Icon Colour', 'my_theme-admin-td'),
            'id'      => 'icon',
            'desc'    => __('Colour of all icons.', 'my_theme-admin-td'),
            'default' => '#4c4c4c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Icon Background Colour', 'my_theme-admin-td'),
            'id'      => 'icon_background',
            'desc'    => __('Background colour of all icons.', 'my_theme-admin-td'),
            'default' => '#e9e9e9',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Background Colour', 'my_theme-admin-td'),
            'id'      => 'background',
            'desc'    => __('Background colour used for this swatch.', 'my_theme-admin-td'),
            'default' => '#ffffff',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Background Inverse Colour', 'my_theme-admin-td'),
            'id'      => 'background_inverse',
            'desc'    => __('Colour used to highight elements with a background.', 'my_theme-admin-td'),
            'default' => '#82c9ed',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Background Colour Complimentary', 'my_theme-admin-td'),
            'id'      => 'background_complimentary',
            'desc'    => __('Complimentary colour for use in combination with the background colour, e.g. complimentary colour is used in the panel body alongside background colour which is used for the header.', 'my_theme-admin-td'),
            'default' => '#e9e9e9',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Form Background Colour', 'my_theme-admin-td'),
            'id'      => 'form_background',
            'desc'    => __('Colour used for background of form elements.', 'my_theme-admin-td'),
            'default' => '#e9e9e9',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Form Text Colour', 'my_theme-admin-td'),
            'id'      => 'form_text',
            'desc'    => __('Colour used for text of form elements.', 'my_theme-admin-td'),
            'default' => '#4c4c4c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Form Placeholder Colour', 'my_theme-admin-td'),
            'id'      => 'form_placeholder',
            'desc'    => __('Colour used for placeholder text of form elements.', 'my_theme-admin-td'),
            'default' => '#8c8c8c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Form Active Colour', 'my_theme-admin-td'),
            'id'      => 'form_active',
            'desc'    => __('Colour used for border of an active input element.', 'my_theme-admin-td'),
            'default' => '#82c9ed',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Primary Button Colour', 'my_theme-admin-td'),
            'id'      => 'primary_button_background',
            'desc'    => __('Colour used for all primary buttons used in this swatch.', 'my_theme-admin-td'),
            'default' => '#82c9ed',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Primary Button Text Colour', 'my_theme-admin-td'),
            'id'      => 'primary_button_text',
            'desc'    => __('Colour used for all primary button text used in this swatch.', 'my_theme-admin-td'),
            'default' => '#ffffff',
            'type'    => 'colour',
        ),

        array(
            'name'    => __('Primary Button Icon Background Colour', 'my_theme-admin-td'),
            'id'      => 'primary_button_icon_colour',
            'desc'    => __('Background colour used in primary buttons with icons.', 'my_theme-admin-td'),
            'default' => '#ffffff',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Primary Button Icon Background Opacity %', 'my_theme-admin-td'),
            'desc'    => __('Opacity of background colour used in primary buttons with icons.', 'my_theme-admin-td'),
            'id'      => 'primary_button_icon_alpha',
            'type'    => 'slider',
            'default' => 30,
            'attr'    => array(
                'max'  => 100,
                'min'  => 0,
                'step' => 1
            )
        ),

    )
));
/* COLOUR SET METABOX */
$pm_theme->register_metabox( array(
    'id'       => 'color_set_metabox',
    'title'    => __('Color Bundle Colors', 'my_theme-admin-td'),
    'priority' => 'high',
    'context'  => 'advanced',
    'pages'    => array('pm_color_bundle'),
    'fields'   => array(
        array(
            'name'    => __('Color #1', 'my_theme-admin-td'),
            'id'      => 'set_color_1',
            'desc'    => __('Color to use for this color bundle.', 'my_theme-admin-td'),
            'default' => '#4c4c4c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Enable Color #1', 'my_theme-admin-td'),
            'id'      => 'status_1',
            'desc'    => __('Turns the color on and off.', 'my_theme-admin-td'),
            'default' => 'off',
            'type'    => 'radio',
            'options' => array(
                'enable'  => __('Enable', 'my_theme-admin-td'),
                'disable'  => __('Disable', 'my_theme-admin-td'),
            ),
            'default' => 'disable',
        ),
        array(
            'name'    => __('Color #2', 'my_theme-admin-td'),
            'id'      => 'set_color_2',
            'desc'    => __('Color to use for this color bundle.', 'my_theme-admin-td'),
            'default' => '#4c4c4c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Enable Color #2', 'my_theme-admin-td'),
            'id'      => 'status_2',
            'desc'    => __('Turns the color on and off.', 'my_theme-admin-td'),
            'default' => 'off',
            'type'    => 'radio',
            'options' => array(
                'enable'  => __('Enable', 'my_theme-admin-td'),
                'disable'  => __('Disable', 'my_theme-admin-td'),
            ),
            'default' => 'disable',
        ),
        array(
            'name'    => __('Color #3', 'my_theme-admin-td'),
            'id'      => 'set_color_3',
            'desc'    => __('Color to use for this color bundle.', 'my_theme-admin-td'),
            'default' => '#4c4c4c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Enable Color #3', 'my_theme-admin-td'),
            'id'      => 'status_3',
            'desc'    => __('Turns the color on and off.', 'my_theme-admin-td'),
            'type'    => 'radio',
            'options' => array(
                'enable'  => __('Enable', 'my_theme-admin-td'),
                'disable'  => __('Disable', 'my_theme-admin-td'),
            ),
            'default' => 'disable',
        ),
        array(
            'name'    => __('Color #4', 'my_theme-admin-td'),
            'id'      => 'set_color_4',
            'desc'    => __('Color to use for this color bundle.', 'my_theme-admin-td'),
            'default' => '#4c4c4c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Enable Color #4', 'my_theme-admin-td'),
            'id'      => 'status_4',
            'desc'    => __('Turns the color on and off.', 'my_theme-admin-td'),
            'type'    => 'radio',
            'options' => array(
                'enable'  => __('Enable', 'my_theme-admin-td'),
                'disable'  => __('Disable', 'my_theme-admin-td'),
            ),
            'default' => 'disable',
        ),
        array(
            'name'    => __('Color #5', 'my_theme-admin-td'),
            'id'      => 'set_color_5',
            'desc'    => __('Color to use for this color bundle.', 'my_theme-admin-td'),
            'default' => '#4c4c4c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Enable Color #5', 'my_theme-admin-td'),
            'id'      => 'status_5',
            'desc'    => __('Turns the color on and off.', 'my_theme-admin-td'),
            'type'    => 'radio',
            'options' => array(
                'enable'  => __('Enable', 'my_theme-admin-td'),
                'disable'  => __('Disable', 'my_theme-admin-td'),
            ),
            'default' => 'disable',
        ),
        array(
            'name'    => __('Color #6', 'my_theme-admin-td'),
            'id'      => 'set_color_6',
            'desc'    => __('Color to use for this color bundle.', 'my_theme-admin-td'),
            'default' => '#4c4c4c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Enable Color #6', 'my_theme-admin-td'),
            'id'      => 'status_6',
            'desc'    => __('Turns the color on and off.', 'my_theme-admin-td'),
            'type'    => 'radio',
            'options' => array(
                'enable'  => __('Enable', 'my_theme-admin-td'),
                'disable'  => __('Disable', 'my_theme-admin-td'),
            ),
            'default' => 'disable',
        ),
        array(
            'name'    => __('Color #7', 'my_theme-admin-td'),
            'id'      => 'set_color_7',
            'desc'    => __('Color to use for this color bundle.', 'my_theme-admin-td'),
            'default' => '#4c4c4c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Enable Color #7', 'my_theme-admin-td'),
            'id'      => 'status_7',
            'desc'    => __('Turns the color on and off.', 'my_theme-admin-td'),
            'type'    => 'radio',
            'options' => array(
                'enable'  => __('Enable', 'my_theme-admin-td'),
                'disable'  => __('Disable', 'my_theme-admin-td'),
            ),
            'default' => 'disable',
        ),
        array(
            'name'    => __('Color #8', 'my_theme-admin-td'),
            'id'      => 'set_color_8',
            'desc'    => __('Color to use for this color bundle.', 'my_theme-admin-td'),
            'default' => '#4c4c4c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Enable Color #8', 'my_theme-admin-td'),
            'id'      => 'status_8',
            'desc'    => __('Turns the color on and off.', 'my_theme-admin-td'),
            'type'    => 'radio',
            'options' => array(
                'enable'  => __('Enable', 'my_theme-admin-td'),
                'disable'  => __('Disable', 'my_theme-admin-td'),
            ),
            'default' => 'disable',
        ),
        array(
            'name'    => __('Color #9', 'my_theme-admin-td'),
            'id'      => 'set_color_9',
            'desc'    => __('Color to use for this color bundle.', 'my_theme-admin-td'),
            'default' => '#4c4c4c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Enable Color #9', 'my_theme-admin-td'),
            'id'      => 'status_9',
            'desc'    => __('Turns the color on and off.', 'my_theme-admin-td'),
            'type'    => 'radio',
            'options' => array(
                'enable'  => __('Enable', 'my_theme-admin-td'),
                'disable'  => __('Disable', 'my_theme-admin-td'),
            ),
            'default' => 'disable',
        ),
        array(
            'name'    => __('Color #10', 'my_theme-admin-td'),
            'id'      => 'set_color_10',
            'desc'    => __('Color to use for this color bundle.', 'my_theme-admin-td'),
            'default' => '#4c4c4c',
            'type'    => 'colour',
        ),
        array(
            'name'    => __('Enable Color #10', 'my_theme-admin-td'),
            'id'      => 'status_10',
            'desc'    => __('Turns the color on and off.', 'my_theme-admin-td'),
            'type'    => 'radio',
            'options' => array(
                'enable'  => __('Enable', 'my_theme-admin-td'),
                'disable'  => __('Disable', 'my_theme-admin-td'),
            ),
            'default' => 'disable',
        ),
    )
));

$pm_theme->register_metabox( array(
    'id'    => 'portfolio_type_metabox',
    'title' => __('Portfolio Post Type', 'my_theme-admin-td'),
    'priority' => 'high',
    'context'  => 'advanced',
    'pages'    => array( 'pm_portfolio_image' ),
    'javascripts' => array(
        array(
            'handle' => 'portfolio_post_type',
            'src'    => PM_THEME_URI . 'inc/assets/js/metaboxes/portfolio-post-type.js',
            'deps'   => array( 'jquery'),
            'localize' => array(
                'object_handle' => 'theme',
                'data'          => THEME_SHORT
            ),
        ),
    ),
    'fields'  => array(
        array(
            'name' => __('Post Type', 'my_theme-admin-td'),
            'desc' => __('Select what type of portfolio post this will be.', 'my_theme-admin-td'),
            'id'   => 'post_type',
            'type' => 'select',
            'options' => array(
                'standard' => __('Standard Post', 'my_theme-admin-td'),
                'video'    => __('Video Post', 'my_theme-admin-td'),
                'gallery'  => __('Gallery Post', 'my_theme-admin-td'),
            ),
            'default' => 'standard',
        ),
        array(
            'name'     => __('Popup Video Link', 'my_theme-admin-td'),
            'desc'     => __('Enter a youtube, vimeo or custom link to a video here.  This will appear in the items &quot;view larger&quot; popup.', 'my_theme-admin-td'),
            'id'       => 'post_video_link',
            'type'     => 'text',
            'default' =>  '',
        ),
        array(
            'name'     => __('Popup Gallery', 'my_theme-admin-td'),
            'desc'     => __('Create a gallery in the editor below (click add media -> create gallery).  This will appear in the items &quot;view larger&quot; popup.', 'my_theme-admin-td'),
            'id'       => 'post_gallery',
            'type'     => 'editor',
            'default' =>  '',
        ),
    ),
));

// swatch status metabox
$pm_theme->register_metabox( array(
    'id'       => 'swatch_status_metabox',
    'title'    => __('Swatch Status', 'my_theme-admin-td'),
    'priority' => 'default',
    'context'  => 'side',
    'pages'    => array('pm_swatch'),
    'fields'   => array(
        array(
            'name'    => __('Swatch Status', 'my_theme-admin-td'),
            'id'      => 'status',
            'desc'    => __('Turns the swatch on and off.', 'my_theme-admin-td'),
            'default' => 'active',
            'type'    => 'select',
            'options' => array(
                'enabled' => __('Enabled', 'my_theme-admin-td'),
                'disabled' => __('Disabled', 'my_theme-admin-td'),
            )
        ),
    )
));

$link_options = array(
    'id'    => 'link_metabox',
    'title' => __('Link', 'my_theme-admin-td'),
    'priority' => 'default',
    'context'  => 'advanced',
    'pages'    => array('pm_service', 'pm_staff', 'pm_portfolio_image', 'pm_testimonial'),
    'javascripts' => array(
        array(
            'handle' => 'slider_links_options_script',
            'src'    => PM_THEME_URI . 'inc/assets/js/metaboxes/slider-links-options.js',
            'deps'   => array( 'jquery'),
            'localize' => array(
                'object_handle' => 'theme',
                'data'          => THEME_SHORT
            ),
        ),
    ),
    'fields'  => array(
        array(
            'name' => __('Link Type', 'my_theme-admin-td'),
            'desc' => __('Make this post link to something. Default link will link to the single item page.', 'my_theme-admin-td'),
            'id'   => 'link_type',
            'type' => 'select',
            'options' => array(
                'default'   => __('Default Link', 'my_theme-admin-td'),
                'page'      => __('Page', 'my_theme-admin-td'),
                'post'      => __('Post', 'my_theme-admin-td'),
                'portfolio' => __('Portfolio', 'my_theme-admin-td'),
                'category'  => __('Category', 'my_theme-admin-td'),
                'url'       => __('URL', 'my_theme-admin-td'),
                'no-link'   => __('No Link', 'my_theme-admin-td')
            ),
            'default' => 'default',
        ),
        array(
            'name'     => __('Page Link', 'my_theme-admin-td'),
            'desc'     => __('Choose a page to link this item to', 'my_theme-admin-td'),
            'id'       => 'page_link',
            'type'     => 'select',
            'options'  => 'taxonomy',
            'taxonomy' => 'pages',
            'default' =>  '',
        ),
        array(
            'name'     => __('Post Link', 'my_theme-admin-td'),
            'desc'     => __('Choose a post to link this item to', 'my_theme-admin-td'),
            'id'       => 'post_link',
            'type'     => 'select',
            'options'  => 'taxonomy',
            'taxonomy' => 'posts',
            'default' =>  '',
        ),
        array(
            'name'     => __('Portfolio Link', 'my_theme-admin-td'),
            'desc'     => __('Choose a portfolio item to link this item to', 'my_theme-admin-td'),
            'id'       => 'portfolio_link',
            'type'     => 'select',
            'options'  => 'taxonomy',
            'taxonomy' => 'pm_portfolio_image',
            'default' =>  '',
        ),
        array(
            'name'     => __('Category Link', 'my_theme-admin-td'),
            'desc'     => __('Choose a category list to link this item to', 'my_theme-admin-td'),
            'id'       => 'category_link',
            'type'     => 'select',
            'options'  => 'categories',
            'default' =>  '',
        ),
        array(
            'name'    => __('URL Link', 'my_theme-admin-td'),
            'desc'     => __('Choose a URL to link this item to', 'my_theme-admin-td'),
            'id'      => 'url_link',
            'type'    => 'text',
            'default' =>  '',
        ),
        array(
            'name'    => __('Open Link In', 'my_theme-admin-td'),
            'id'      => 'target',
            'type'    => 'select',
            'default' => '_self',
            'options' => array(
                '_self'   => __('Same page as it was clicked ', 'my_theme-admin-td'),
                '_blank'  => __('Open in new window/tab', 'my_theme-admin-td'),
                '_parent' => __('Open the linked document in the parent frameset', 'my_theme-admin-td'),
                '_top'    => __('Open the linked document in the full body of the window', 'my_theme-admin-td')
            ),
            'desc'    => __('Where the link will open.', 'my_theme-admin-td'),
        ),
    ),
);

$pm_theme->register_metabox( $link_options );

// modify link options metabox for slideshow image before registering
$link_options['fields'][0]['default'] = 'no-link';
$link_options['pages'] = array('pm_slideshow_image');
$link_options['id'] = 'slide_link_metabox';
$link_options['fields'][6]['options']['magnific'] = __('Open in magnific popup', 'my_theme-admin-td');

$pm_theme->register_metabox( $link_options );


$pm_theme->register_metabox( array(
    'id' => 'Citation',
    'title' => __('Citation', 'my_theme-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('pm_testimonial'),
    'fields' => array(
        array(
            'name'    => __('Citation', 'my_theme-admin-td'),
            'desc'    => __('Reference to the source of the quote', 'my_theme-admin-td'),
            'id'      => 'citation',
            'type'    => 'text',
        ),
    )
));
$pm_theme->register_metabox( array(
    'id' => 'services_icon_metabox',
    'title' => __('Service Image & Icon', 'my_theme-admin-td'),
    'priority' => 'core',
    'context' => 'advanced',
    'pages' => array('pm_service'),
    'fields' => array(
        array(
            'name'    => __('Font Awesome Icon', 'my_theme-admin-td'),
            'desc'    => __('Select a font awesome icon that will appear in your service shape.', 'my_theme-admin-td'),
            'id'      => 'fa_icon',
            'type'    => 'select',
            'options' => include PM_THEME_DIR . 'inc/options/global-options/fontawesome.php',
            'default' => ''
        ),
        array(
            'name'      => __('SVG Icon', 'my_theme-admin-td'),
            'desc'      => __('Select a svg icon that will appear in your service shape.', 'my_theme-admin-td'),
            'id'        => 'svg_icon',
            'type'    => 'select',
            'options' => include PM_THEME_DIR . 'inc/options/global-options/svgs.php',
            'default' => '',
        ),
    )
));

$pm_theme->register_metabox( array(
    'id' => 'staff_info',
    'title' => __('Personal Details', 'my_theme-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('pm_staff'),
    'fields' => array(
        array(
            'name'    => __('Job Title', 'my_theme-admin-td'),
            'desc'    => __('Sub header that is shown below the staff members name.', 'my_theme-admin-td'),
            'id'      => 'position',
            'type'    => 'text',
        ),
    )
));

$staff_social = array();
for( $i = 0 ; $i < 5 ; $i++ ) {
    $staff_social[] =
        array(
            'name' => __('Social Icon', 'my_theme-admin-td') . ' ' . ($i+1),
            'desc' => __('Social Network Icon to show for this Staff Member', 'my_theme-admin-td'),
            'id'   => 'icon' . $i,
            'type' => 'select',
            'options' => 'icons',
        );
    $staff_social[] =
        array(
            'name'  => __('Social Link', 'my_theme-admin-td'). ' ' . ($i+1),
            'desc' => __('Add the url to the staff members social network here.', 'my_theme-admin-td'),
            'id'    => 'link' . $i,
            'type'  => 'text',
            'std'   => '',
        );
}

$pm_theme->register_metabox( array(
    'id' => 'staff_social',
    'title' => __('Social', 'my_theme-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('pm_staff'),
    'fields' => $staff_social,
));

$pm_theme->register_metabox( array(
    'id' => 'portfolio_masonry_metabox',
    'title' => __('Portfolio Masonry Options', 'my_theme-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'pages' => array('pm_portfolio_image'),
    'fields' => array(
        array(
            'name'    => __('Masonry Image Width ', 'my_theme-admin-td'),
            'desc'    => __('Select the width that the masonry portfolio shortcode will use for this item (normal 1 column wide 2 columns)', 'my_theme-admin-td'),
            'id'      => 'masonry_width',
            'type'    => 'select',
            'options' => array(
                'normal'    => __('Normal', 'my_theme-admin-td'),
                'wide'   => __('Wide', 'my_theme-admin-td'),
            ),
            'default' => 'normal',
        ),
    )
));

$pm_theme->register_metabox( array(
    'id'       => 'service_template_metabox',
    'title'    => __('Service Template', 'my_theme-admin-td'),
    'priority' => 'default',
    'context'  => 'advanced',
    'pages'    => array('pm_service'),
    'fields'   => array(
        array(
            'name'    => __('Service Page Template', 'my_theme-admin-td'),
            'id'      => 'template',
            'desc'    => __('Select a page template to use for this service', 'my_theme-admin-td'),
            'type'    => 'select',
            'options' => array(
                'page.php'                  => __('Full Width', 'my_theme-admin-td'),
                'template-leftsidebar.php'  => __('Left Sidebar', 'my_theme-admin-td'),
                'template-rightsidebar.php' => __('Right Sidebar', 'my_theme-admin-td'),
            ),
            'default' => 'page.php',
        ),
    )
));

$pm_theme->register_metabox( array(
    'id'       => 'post_masonry_options',
    'title'    => __('Post Masonry', 'my_theme-admin-td'),
    'priority' => 'default',
    'context'  => 'advanced',
    'pages'    => array('post'),
    'fields'   => array(
        array(
            'name'    => __('Masonry Image', 'my_theme-admin-td'),
            'id'      => 'masonry_image',
            'desc'    => __('An image that will be used for this post in the masonry list view.', 'my_theme-admin-td'),
            'store'   => 'url',
            'type'    => 'upload',
            'default' => '',
        ),
        array(
            'name'    => __('Masonry Image Width ', 'my_theme-admin-td'),
            'desc'    => __('Select the width that the masonry portfolio shortcode will use for this item (normal 1 column wide 2 columns)', 'my_theme-admin-td'),
            'id'      => 'masonry_width',
            'type'    => 'select',
            'options' => array(
                'normal' => __('Normal', 'my_theme-admin-td'),
                'wide'   => __('Wide', 'my_theme-admin-td'),
            ),
            'default' => 'normal',
        ),
    )
));


$product_category_options = array(
    array(
        'name'    => __('Product Columns', 'my_theme-admin-td'),
        'desc'    => __('Number of columns to use for products on this page.', 'my_theme-admin-td'),
        'id'      => 'product_columns',
        'type'    => 'select',
        'default' => 3,
        'options'    => array(
            '2'  => __('2 Columns', 'my_theme-admin-td'),
            '3'  => __('3 Columns', 'my_theme-admin-td'),
            '4'  => __('4 Columns', 'my_theme-admin-td'),
            '5'  => __('5 Columns', 'my_theme-admin-td')
        )
    ),
);

$pm_theme->register_metabox( array(
    'id' => 'category_header',
    'title' => __('Category Header Type', 'my_theme-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'taxonomies' => array('product_cat'),
    'fields' => array_merge( $product_category_options, $override_header_options, $heading_options, $section_options )
));

$pm_theme->register_metabox( array(
    'id' => 'tag_header',
    'title' => __('Product Tag Header Type', 'my_theme-admin-td'),
    'priority' => 'default',
    'context' => 'advanced',
    'taxonomies' => array('product_tag'),
    'fields' => array_merge( $product_category_options, $override_header_options, $heading_options, $section_options )
));
