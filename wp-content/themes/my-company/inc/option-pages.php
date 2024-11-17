<?php
/**
 * Registers all theme option pages
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */


// change defaults
global $pm_theme;
if( isset($pm_theme) ) {
    $pm_theme->register_option_page( array(
        'page_title' => __('General', 'my_theme-admin-td'),
        'menu_title' => __('General', 'my_theme-admin-td'),
        'slug'       => THEME_SHORT . '-general',
        'main_menu'  => true,
        'main_menu_title' => THEME_NAME,
        'main_menu_icon'  => 'dashicons-marker',
        'icon'       => 'tools',
        'sections'   => array(
            'logo-section' => array(
                'title'   => __('Logo', 'my_theme-admin-td'),
                'header'  => __('These options allow you to configure the site logo, you can select a logo type and then create a text logo, image logo or both image and text.  There is also an option to use retina sized images.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Logo Text', 'my_theme-admin-td'),
                        'desc'    => __('Add your logo text here works with Logo Type (Text, Text & Image)', 'my_theme-admin-td'),
                        'id'      => 'logo_text',
                        'type'    => 'text',
                        'default' => 'My Company',
                    ),
                    array(
                        'name'    => __('Logo Image', 'my_theme-admin-td'),
                        'desc'    => __('Upload a logo for your site, works with Logo Type (Image, Text & Image)', 'my_theme-admin-td'),
                        'id'      => 'logo_image',
                        'store'   => 'url',
                        'type'    => 'upload',
                        'default' => PM_THEME_URI . 'assets/images/icon-logo.png',
                    ),
                    array(
                        'name'    => __('Logo Transparent Image', 'my_theme-admin-td'),
                        'desc'    => __('Upload an image to use as the sites logo when page has a transparent header.', 'my_theme-admin-td'),
                        'id'      => 'logo_image_trans',
                        'store'   => 'url',
                        'type'    => 'upload',
                        'default' => '',
                    ),
                )
            ),
            'loader-section' => array(
                'title'  => __('Page Loader', 'my_theme-admin-td'),
                'header' => __('Toggle an animation when each page loads.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Loading Animation', 'my_theme-admin-td'),
                        'desc'      => __('Show a loader whenever a page is loaded', 'my_theme-admin-td'),
                        'id'        => 'site_loader',
                        'type'      => 'radio',
                        'options'   => array(
                            'on'    => __('Enable', 'my_theme-admin-td'),
                            'off'   => __('Disable', 'my_theme-admin-td'),
                        ),
                        'default'   => 'off',
                    ),
                    array(
                        'name'    => __('Page Loader Style', 'my_theme-admin-td'),
                        'desc'    => __('Choose a style of page loader to show at the start of loading a page', 'my_theme-admin-td'),
                        'id'      => 'site_loader_style',
                        'type'    => 'radio',
                        'options' => array(
                            'dot'     => __('Dot', 'my_theme-admin-td'),
                            'minimal' => __('Minimal', 'my_theme-admin-td'),
                            'counter' => __('Counter', 'my_theme-admin-td'),
                        ),
                        'default' => 'minimal',
                    )
                )
            ),
            'header-section' => array(
                'title'   => __('Header Options', 'my_theme-admin-td'),
                'header'  => __('This section will allow you to setup your site header.  You can choose from three different types of header to use on your site, and adjust the header height to allow room for your logo.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Header Type', 'my_theme-admin-td'),
                        'desc'    => __("Sets the type of header to use at the top of your site and its behaviour.  <a href='http://angle.interfused.com/header-options/'>See this page for more details</a>", 'my_theme-admin-td'),
                        'id'      => 'header_type',
                        'type'    => 'select',
                        'options' => array(
                            'navbar-sticky'     => __('Nav Bar Fixed - Navigation bar that scrolls with the page.', 'my_theme-admin-td'),
                            'navbar-not-sticky' => __('Nav Bar Static - Navigation bar with regular scrolling.', 'my_theme-admin-td'),
                        ),
                        'default' => 'navbar-sticky',
                    ),
                    array(
                        'name'      => __('Menu Height', 'my_theme-admin-td'),
                        'desc'      => __('Use this slider to adjust the menu height.  Ideal if you want to adjust the height to fit your logo.', 'my_theme-admin-td'),
                        'id'        => 'navbar_height',
                        'type'      => 'slider',
                        'default'   => 90,
                        'attr'      => array(
                            'max'       => 300,
                            'min'       => 24,
                            'step'      => 1
                        )
                    ),
                    array(
                        'name'      => __('Sub Menu Width', 'my_theme-admin-td'),
                        'desc'      => __('Use this to adjust the width of your drop down menus.  Ideal if you have pages with large names.', 'my_theme-admin-td'),
                        'id'        => 'navbar_sub_width',
                        'type'      => 'slider',
                        'default'   => 220,
                        'attr'      => array(
                            'max'       => 450,
                            'min'       => 220,
                            'step'      => 1
                        )
                    ),
                    array(
                        'name'    => __('Menu Swatch', 'my_theme-admin-td'),
                        'desc'    => __('Choose a color swatch for the menu.', 'my_theme-admin-td'),
                        'id'      => 'menu_swatch',
                        'type'    => 'select',
                        'default' => 'swatch-white',
                        'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
                    ),
                    array(
                        'name'    => __('Top Bar Swatch', 'my_theme-admin-td'),
                        'desc'    => __('Choose a color swatch for the Top Bar when you have a Header Type Top Bar or Combo', 'my_theme-admin-td'),
                        'id'      => 'top_bar_swatch',
                        'type'    => 'select',
                        'default' => 'swatch-white',
                        'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
                    ),
                    array(
                        'name'    => __('Capitalization', 'my_theme-admin-td'),
                        'desc'    => __('Enable-disable automatic capitalization in header logo and menus', 'my_theme-admin-td'),
                        'id'      => 'menu_capitalization',
                        'type'    => 'radio',
                        'options' => array(
                            'text-caps'      => __('Force Uppercase', 'my_theme-admin-td'),
                            'text-lowercase' => __('Force Lowercase', 'my_theme-admin-td'),
                            'text-none' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'text-none',
                    ),
                    array(
                        'name'    => __('Menu Underline', 'my_theme-admin-td'),
                        'desc'    => __('Underline of the menu items when selected', 'my_theme-admin-td'),
                        'id'      => 'underline_menu',
                        'type'    => 'radio',
                        'options' => array(
                            'underline'  => __('On', 'my_theme-admin-td'),
                            'no-underline'     => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'underline',
                    ),
                    array(
                        'name'      => __('Menu Change Scroll Point', 'my_theme-admin-td'),
                        'desc'      => __('Point in pixels after the page scrolls that will trigger the menu to change shape / colour.', 'my_theme-admin-td'),
                        'id'        => 'navbar_scrolled_point',
                        'type'      => 'slider',
                        'default'   => 200,
                        'attr'      => array(
                            'max'       => 1000,
                            'min'       => 0,
                            'step'      => 1
                        )
                    ),
                    array(
                        'name'    => __('Menu Swatch After Scroll Point', 'my_theme-admin-td'),
                        'desc'    => __('Choose a color swatch for the menu after the scroll point.', 'my_theme-admin-td'),
                        'id'      => 'menu_swatch_after_scroll',
                        'type'    => 'select',
                        'default' => 'swatch-white',
                        'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
                    ),
                    array(
                        'name'      => __('Menu Height After Scroll Point', 'my_theme-admin-td'),
                        'desc'      => __('Use this slider to adjust the menu height after menu has scrolled.', 'my_theme-admin-td'),
                        'id'        => 'navbar_scrolled',
                        'type'      => 'slider',
                        'default'   => 70,
                        'attr'      => array(
                            'max'       => 300,
                            'min'       => 24,
                            'step'      => 1
                        )
                    ),
                    array(
                        'name'    => __('Hover Menu', 'my_theme-admin-td'),
                        'desc'    => __('Choose between menu that will open when you click or hover (desktop only option since mobile devices will always use touch)', 'my_theme-admin-td'),
                        'id'      => 'hover_menu',
                        'type'    => 'radio',
                        'options' => array(
                            'off' => __('Click', 'my_theme-admin-td'),
                            'on'  => __('Hover', 'my_theme-admin-td'),
                        ),
                        'default' => 'off',
                    ),
                    array(
                        'name'    => __('Hover Menu Delay', 'my_theme-admin-td'),
                        'desc'    => __('Delay in seconds before the hover menu closes after moving mouse off the menu.', 'my_theme-admin-td'),
                        'id'      => 'hover_menu_delay',
                        'type'      => 'slider',
                        'default'   => 200,
                        'attr'      => array(
                            'max'       => 1000,
                            'min'       => 0,
                            'step'      => 1
                        )
                    ),
                    array(
                        'name'    => __('Hover Menu Fade Delay', 'my_theme-admin-td'),
                        'desc'    => __('Delay of the Fade In/Fade Out animation .', 'my_theme-admin-td'),
                        'id'      => 'hover_menu_fade_delay',
                        'type'      => 'slider',
                        'default'   => 200,
                        'attr'      => array(
                            'max'       => 1000,
                            'min'       => 0,
                            'step'      => 1
                        )
                    ),
                    array(
                        'name'    => __('Full Width Menu', 'my_theme-admin-td'),
                        'desc'    => __('Choose between normal or fullwidth menu', 'my_theme-admin-td'),
                        'id'      => 'fullwidth_menu',
                        'type'    => 'radio',
                        'options' => array(
                            'container'           => __('Normal', 'my_theme-admin-td'),
                            'container-fullwidth' => __('Full Width', 'my_theme-admin-td'),
                        ),
                        'default' => 'container',
                    )
                )
            ),
            'layout-options' => array(
                'title'   => __('Layout Options', 'my_theme-admin-td'),
                'header'  => __('This section will allow you to setup the layout of your site.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                         'name'    => __('Layout Type', 'my_theme-admin-td'),
                         'desc'    => __('Sets the site layout (Normal - site will use all the width of the page, Boxed - Site will be surrounded by a background )', 'my_theme-admin-td'),
                         'id'      => 'layout_type',
                         'type'    => 'radio',
                         'options' => array(
                            'normal' => __('Normal', 'my_theme-admin-td'),
                            'boxed'  => __('Boxed', 'my_theme-admin-td'),
                        ),
                        'default' => 'normal',
                    )
                )
            ),
            'comments-options' => array(
                'title'   => __('Comments Options', 'my_theme-admin-td'),
                'header'  => __('This section will allow you to setup the comments for your site.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Show Comments On', 'my_theme-admin-td'),
                        'desc'    => __('Where to allow comments. All (show all), Pages (only on pages), Posts (only on posts), Portfolio Items (only on portfolio items), Off (all comments are off)', 'my_theme-admin-td'),
                        'id'      => 'site_comments',
                        'type'    => 'radio',
                        'options' => array(
                            'all'       => __('All', 'my_theme-admin-td'),
                            'pages'     => __('Pages', 'my_theme-admin-td'),
                            'posts'     => __('Posts', 'my_theme-admin-td'),
                            'portfolio' => __('Portfolio Items', 'my_theme-admin-td'),
                            'Off'       => __('Off', 'my_theme-admin-td')
                        ),
                        'default' => 'posts',
                    ),
                    array(
                        'name'    => __('Page Comments Section Swatch', 'my_theme-admin-td'),
                        'desc'    => __('Choose a color swatch for the comments section of your pages.', 'my_theme-admin-td'),
                        'id'      => 'page_comments_swatch',
                        'type'    => 'select',
                        'default' => 'swatch-gray',
                        'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
                    ),
                    array(
                        'name'    => __('Portfolio Item Comments Section Swatch', 'my_theme-admin-td'),
                        'desc'    => __('Choose a color swatch for the comments section of your portfolio items.', 'my_theme-admin-td'),
                        'id'      => 'portfolio_comments_swatch',
                        'type'    => 'select',
                        'default' => 'swatch-gray',
                        'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
                    ),
                )
            ),
            'upper-footer-section' => array(
                'title'   => __('Upper Footer', 'my_theme-admin-td'),
                'header'  => __('This footer is above the bottom footer of your site.  Here you can set the footer to use 1-4 columns, you can add Widgets to your footer in the Appearance -> Widgets page', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Upper Footer Columns', 'my_theme-admin-td'),
                        'desc'    => __('Select how many columns will the upper footer consist of.', 'my_theme-admin-td'),
                        'id'      => 'upper_footer_columns',
                        'type'    => 'radio',
                        'options' => array(
                            1  => __('1', 'my_theme-admin-td'),
                            2  => __('2', 'my_theme-admin-td'),
                            3  => __('3', 'my_theme-admin-td'),
                            4  => __('4', 'my_theme-admin-td'),
                        ),
                        'default' => 4,
                    ),
                    array(
                        'name'    => __('Upper Footer Swatch', 'my_theme-admin-td'),
                        'desc'    => __('Choose a color swatch for the upper footer', 'my_theme-admin-td'),
                        'id'      => 'upper_footer_swatch',
                        'type'    => 'select',
                        'default' => 'swatch-black',
                        'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
                    ),
                    array(
                        'name'    => __('Upper Footer Height', 'my_theme-admin-td'),
                        'desc'    => __('Choose the amount of padding added to the height of the Upper Footer', 'my_theme-admin-td'),
                        'id'      => 'upper_footer_height',
                        'type'    => 'select',
                        'options' => array(
                            'normal' => __('Big Padding(72px)', 'my_theme-admin-td'),
                            'short'  => __('Small Padding(24px)', 'my_theme-admin-td'),
                        ),
                        'default' => 'normal',
                    )
                )
            ),
            'footer-section' => array(
                'title'   => __('Footer', 'my_theme-admin-td'),
                'header'  => __('The footer is the bottom bar of your site.  Here you can set the footer to use 1-4 columns, you can add Widgets to your footer in the Appearance -> Widgets page', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Footer Columns', 'my_theme-admin-td'),
                        'desc'    => __('Select how many columns will the footer consist of.', 'my_theme-admin-td'),
                        'id'      => 'footer_columns',
                        'type'    => 'radio',
                        'options' => array(
                            1  => __('1', 'my_theme-admin-td'),
                            2  => __('2', 'my_theme-admin-td'),
                            3  => __('3', 'my_theme-admin-td'),
                            4  => __('4', 'my_theme-admin-td'),
                        ),
                        'default' => 4,
                    ),
                    array(
                        'name'    => __('Footer Swatch', 'my_theme-admin-td'),
                        'desc'    => __('Choose a color swatch for the footer', 'my_theme-admin-td'),
                        'id'      => 'footer_swatch',
                        'type'    => 'select',
                        'default' => 'swatch-black',
                        'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
                    ),
                    array(
                        'name'    => __('Footer Height', 'my_theme-admin-td'),
                        'desc'    => __('Choose the amount of padding added to the height of the Footer', 'my_theme-admin-td'),
                        'id'      => 'footer_height',
                        'type'    => 'select',
                        'options' => array(
                            'normal' => __('Big Padding(72px)', 'my_theme-admin-td'),
                            'short'  => __('Small Padding(24px)', 'my_theme-admin-td'),
                        ),
                        'default' => 'normal',
                    ),
                    array(
                        'name'    => __('Back to top', 'my_theme-admin-td'),
                        'desc'    => __('Enable the back-to-top button', 'my_theme-admin-td'),
                        'id'      => 'back_to_top',
                        'type'    => 'radio',
                        'options' => array(
                            'enable'  => __('Enable', 'my_theme-admin-td'),
                            'disable'  => __('Disable', 'my_theme-admin-td'),
                        ),
                        'default' => 'enable',
                    ),
                    array(
                        'name'    => __('Back to top shape', 'my_theme-admin-td'),
                        'desc'    => __('Shape of the back to top button. Square or circle', 'my_theme-admin-td'),
                        'id'      => 'back_to_top_shape',
                        'type'    => 'radio',
                        'options' => array(
                            'square' => __('Square', 'my_theme-admin-td'),
                            'circle'  => __('Circle', 'my_theme-admin-td'),
                        ),
                        'default' => 'square'
                    )
                )
            ),
            '404-section' => array(
                'title'   => __('404 Page', 'my_theme-admin-td'),
                'header'  => __('Pick the page that you want to be used as the 404 page.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'     => __('Page Link', 'my_theme-admin-td'),
                        'desc'     => __('Choose a page to link this item to', 'my_theme-admin-td'),
                        'id'       => '404_page',
                        'type'     => 'select',
                        'options'  => 'taxonomy',
                        'taxonomy' => 'pages',
                        'default' =>  '',
                    ),
                )
            ),
        )
    ));

    $blog_header_options = include PM_THEME_DIR . 'inc/options/global-options/heading-options.php';
    $blog_header_section_options = include PM_THEME_DIR . 'inc/options/global-options/section-options.php';

    // set defaults for blog heading and section
    // set default heading to my blog
    $blog_header_options[0]['default'] = __('My Blog', 'my_theme-admin-td');
    $blog_header_options[4]['default'] = 'super';
    $blog_header_options[5]['default'] = 'light';
    $blog_header_options[11]['default'] = 'medium-top';
    $blog_header_options[12]['default'] = 'medium-bottom';
    // var_dump($blog_header_options);
    // set default swatch to blue
    $blog_header_section_options[0]['default'] = 'swatch-blue';

    $pm_theme->register_option_page( array(
        'page_title' => __('Blog', 'my_theme-admin-td'),
        'menu_title' => __('Blog', 'my_theme-admin-td'),
        'slug'       => THEME_SHORT . '-blog',
        'main_menu'  => false,
        'icon'       => 'tools',
        'sections'   => array(
            'blog-header-options' => array(
                'title'   => __('Blog Header Options', 'my_theme-admin-td'),
                'header'  => __('Change how your blog header looks.', 'my_theme-admin-td'),
                'fields'  => array_merge(
                    array(
                        array(
                            'name' => __('Show Header', 'my_theme-admin-td'),
                            'desc' => __('Show or hide the header at the top of the page.', 'my_theme-admin-td'),
                            'id'   => 'blog_header_show_header',
                            'type' => 'select',
                            'default' => 'show',
                            'options' => array(
                                'hide' => __('Hide', 'my_theme-admin-td'),
                                'show' => __('Show', 'my_theme-admin-td'),
                            ),
                        )
                    ),
                    array(
                        array(
                            'name' => __('Show Breadcrumbs', 'my_theme-admin-td'),
                            'desc' => __('Show or hide the breadcrumbs in the header', 'my_theme-admin-td'),
                            'id'   => 'blog_header_show_breadcrumbs',
                            'type' => 'select',
                            'default' => 'show',
                            'options' => array(
                                'hide' => __('Hide', 'my_theme-admin-td'),
                                'show' => __('Show', 'my_theme-admin-td'),
                            ),
                        ),
                        array(
                            'name' => __('Breadcrumb Text Capitalisation', 'my_theme-admin-td'),
                            'desc' => __('Decides the case of the breadcrumbs.', 'my_theme-admin-td'),
                            'id'   => 'blog_header_breadcrumbs_case',
                            'type' => 'select',
                            'options' => array(
                                'text-caps'      => __('Force Uppercase', 'my_theme-admin-td'),
                                'text-lowercase' => __('Force Lowercase', 'my_theme-admin-td'),
                                'text-none' => __('Off', 'my_theme-admin-td'),
                            ),
                            'default' => 'text-lowercase',
                        )
                    )
                )
            ),
            'blog-header-heading' => array(
                'title'   => __('Blog Header Heading', 'my_theme-admin-td'),
                'header'  => __('Change the text of your blog heading here.', 'my_theme-admin-td'),
                'fields'  => pm_prefix_options_id( 'blog_header', $blog_header_options ),
            ),
            'blog-header-section' => array(
                'title'   => __('Blog Header Section', 'my_theme-admin-td'),
                'header'  => __('Change the appearance of your blog header section.', 'my_theme-admin-td'),
                'fields'  => pm_prefix_options_id( 'blog_header', $blog_header_section_options )
            ),
            'blog-section' => array(
                'title'   => __('General Blog Options', 'my_theme-admin-td'),
                'header'  => __('Here you can setup the blog options that are used on all the main blog list pages', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Blog Style', 'my_theme-admin-td'),
                        'desc'    => __('Select a layout style to use for your blog pages.', 'my_theme-admin-td'),
                        'id'      => 'blog_style',
                        'type'    => 'imgradio',
                        'columns' => '5',
                        'options' => array(
                            'right-sidebar' => array(
                                'name' => __('Right Sidebar', 'my_theme-admin-td'),
                                'image' => PM_THEME_URI . 'inc/assets/images/blog-rightsidebar.png',
                            ),
                            'left-sidebar' => array(
                                'name' => __('Left Sidebar', 'my_theme-admin-td'),
                                'image' => PM_THEME_URI . 'inc/assets/images/blog-leftsidebar.png',
                            ),
                            'no-sidebar-normal' => array(
                                'name' => __('No Sidebar (Normal Article)', 'my_theme-admin-td'),
                                'image' => PM_THEME_URI . 'inc/assets/images/blog-normal.png',
                            ),
                            'no-sidebar-narrow' => array(
                                'name' => __('No Sidebar (Narrow Article)', 'my_theme-admin-td'),
                                'image' => PM_THEME_URI . 'inc/assets/images/blog-narrow.png',
                            ),
                            'no-sidebar-wide' => array(
                                'name' => __('No Sidebar (Wide Article)', 'my_theme-admin-td'),
                                'image' => PM_THEME_URI . 'inc/assets/images/blog-wide.png',
                            ),
                        ),
                        'default' => 'right-sidebar',
                    ),
                    array(
                        'name'    => __('Show Post Icons', 'my_theme-admin-td'),
                        'desc'    => __('This option will show or hide all icons on both the blog list page and the blog single page.', 'my_theme-admin-td'),
                        'id'      => 'blog_post_icons',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                    array(
                        'name'    => __('Show Read More', 'my_theme-admin-td'),
                        'desc'    => __('Show or hide the readmore link in list view', 'my_theme-admin-td'),
                        'id'      => 'blog_show_readmore',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                    array(
                        'name' => __('Blog read more link', 'my_theme-admin-td'),
                        'desc' => __('The text that will be used for your read more links', 'my_theme-admin-td'),
                        'id' => 'blog_readmore',
                        'type' => 'text',
                        'default' => 'read more',
                    ),
                    array(
                        'name'    => __('Read more style', 'my_theme-admin-td'),
                        'desc'    => __('Display the readmore as button or simple link', 'my_theme-admin-td'),
                        'id'      => 'blog_readmore_style',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('Button', 'my_theme-admin-td'),
                            'off'  => __('Simple Link', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                    array(
                        'name'    => __('Strip teaser', 'my_theme-admin-td'),
                        'desc'    => __('Strip the content before the <--more--> tag in single post view', 'my_theme-admin-td'),
                        'id'      => 'blog_stripteaser',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'off',
                    ),
                    array(
                        'name'    => __('Pagination Style', 'my_theme-admin-td'),
                        'desc'    => __('How your pagination will be shown', 'my_theme-admin-td'),
                        'id'      => 'blog_pagination',
                        'type'    => 'radio',
                        'options' => array(
                            'pages'     => __('Pages', 'my_theme-admin-td'),
                            'next_prev' => __('Next & Previous', 'my_theme-admin-td'),
                        ),
                        'default' => 'pages',
                    ),
                )
            ),
            'masonry-blog-section' => array(
                'title'   => __('Masonry Blog Page', 'my_theme-admin-td'),
                'header'  => __('This section allows you to set up how your masonry blog page will look.', 'my_theme-admin-td'),
                'fields'  => array(
                    array(
                        'name'    => __('Use Masonry On Posts Page', 'my_theme-admin-td'),
                        'desc'    => __('Blog list pages will use a masonry style.', 'my_theme-admin-td'),
                        'id'      => 'blog_masonry',
                        'type'    => 'imgradio',
                        'columns' => '5',
                        'options' => array(
                            'no-masonry' => array(
                                'name' => __('No Masonry', 'my_theme-admin-td'),
                                'image' => PM_THEME_URI . 'inc/assets/images/blog-rightsidebar.png',
                            ),
                            'normal-masonry' => array(
                                'name' => __('Normal Masonry', 'my_theme-admin-td'),
                                'image' => PM_THEME_URI . 'inc/assets/images/blog-masonry.png',
                            ),
                            'left-sidebar-masonry' => array(
                                'name' => __('Left Sidebar Masonry', 'my_theme-admin-td'),
                                'image' => PM_THEME_URI . 'inc/assets/images/blog-masonry-left.png',
                            ),
                            'right-sidebar-masonry' => array(
                                'name' => __('Right Sidebar Masonry', 'my_theme-admin-td'),
                                'image' => PM_THEME_URI . 'inc/assets/images/blog-masonry-right.png',
                            ),
                            'wide-masonry' => array(
                                'name' => __('Wide Masonry', 'my_theme-admin-td'),
                                'image' => PM_THEME_URI . 'inc/assets/images/blog-masonrywide.png',
                            ),
                        ),
                        'default' => 'no-masonry',
                    ),
                    array(
                        'name'      => __('Masonry Items Padding', 'my_theme-admin-td'),
                        'desc'      => __('Space to add between blog items in pixels.', 'my_theme-admin-td'),
                        'id'        => 'blog_masonry_item_padding',
                        'type'      => 'slider',
                        'default'   => 20,
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 1
                        )
                    ),
                    array(
                        'name'    => __('Masonry Section Background Image', 'my_theme-admin-td'),
                        'desc'    => __('Upload an image as your masonry blog section background.', 'my_theme-admin-td'),
                        'id'      => 'blog_masonry_section_background',
                        'type'    => 'upload',
                        'store'   => 'url',
                        'default' => '',
                    ),
                    array(
                        'name'    => __('Masonry Section Transparent', 'my_theme-admin-td'),
                        'desc'    => __('Makes the masonry blog section transparent.', 'my_theme-admin-td'),
                        'id'      => 'blog_masonry_section_transparent',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'off',
                    ),
                ),
            ),
            'blog-single-section' => array(
                'title'   => __('Blog Single Page', 'my_theme-admin-td'),
                'header'  => __('This section allows you to set up how your single post will look.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Display date', 'my_theme-admin-td'),
                        'desc'    => __('Toggle date on/off in post', 'my_theme-admin-td'),
                        'id'      => 'blog_date',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                    array(
                        'name'    => __('Display author', 'my_theme-admin-td'),
                        'desc'    => __('Toggle author on/off in post', 'my_theme-admin-td'),
                        'id'      => 'blog_author',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                    array(
                        'name'    => __('Display categories', 'my_theme-admin-td'),
                        'desc'    => __('Toggle categories on/off in post', 'my_theme-admin-td'),
                        'id'      => 'blog_categories',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                    array(
                        'name'    => __('Display tags', 'my_theme-admin-td'),
                        'desc'    => __('Toggle tags on/off in post', 'my_theme-admin-td'),
                        'id'      => 'blog_tags',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                    array(
                        'name'    => __('Author bio', 'my_theme-admin-td'),
                        'desc'    => __('Display/hide the authors bio after the post', 'my_theme-admin-td'),
                        'id'      => 'author_bio',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'off',
                    ),
                    array(
                        'name'    => __('Display avatar in Author bio', 'my_theme-admin-td'),
                        'desc'    => __('Toggle avatars on/off in Author Bio Section', 'my_theme-admin-td'),
                        'id'      => 'author_bio_avatar',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                    array(
                        'name'    => __('Display comment count', 'my_theme-admin-td'),
                        'desc'    => __('Toggle comment count on/off in post', 'my_theme-admin-td'),
                        'id'      => 'blog_comment_count',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                    array(
                        'name'    => __('Social Networks', 'my_theme-admin-td'),
                        'desc'    => __('Select which social networks you would like to share posts on. If you need more than one, hold down Ctrl button and select as many as you like. ', 'my_theme-admin-td'),
                        'id'      => 'blog_social_networks',
                        'default' =>  array( 'facebook', 'twitter', 'google', 'pinterest', 'linkedin', 'none' ),
                        'type'    => 'select',
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:110px'
                        ),
                        'options' => array(
                            'facebook'  => __('Facebook', 'my_theme-admin-td'),
                            'twitter'   => __('Twitter', 'my_theme-admin-td'),
                            'google'    => __('Google+', 'my_theme-admin-td'),
                            'pinterest' => __('Pinterest', 'my_theme-admin-td'),
                            'linkedin' => __('LinkedIn', 'my_theme-admin-td'),
                            'none' => __('None', 'my_theme-admin-td'),
                        )
                    ),
                    array(
                        'name'    => __('Show related posts', 'my_theme-admin-td'),
                        'desc'    => __('Show Related Posts after the post content', 'my_theme-admin-td'),
                        'id'      => 'related_posts',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                    array(
                        'name'    => __('Number of related posts', 'my_theme-admin-td'),
                        'desc'    => __('Choose how many related posts are displayed in the related posts section after the post content', 'my_theme-admin-td'),
                        'id'      => 'related_posts_count',
                        'type'      => 'slider',
                        'default'   => 3,
                        'attr'      => array(
                            'max'       => 8,
                            'min'       => 3,
                            'step'      => 1
                        )
                    ),
                    array(
                        'name'    => __('Number of related posts columns', 'my_theme-admin-td'),
                        'desc'    => __('Choose how many columns are displayed in the related posts section after the post content', 'my_theme-admin-td'),
                        'id'      => 'related_posts_columns',
                        'type'    => 'radio',
                        'options' => array(
                            '3'   => __('3', 'my_theme-admin-td'),
                            '4'   => __('4', 'my_theme-admin-td')
                        ),
                        'default' => '3',
                    ),
                    array(
                        'name'    => __('Open Featured Image in Magnific Popup', 'my_theme-admin-td'),
                        'desc'    => __('Featured image in single post view will open in a large preview popup', 'my_theme-admin-td'),
                        'id'      => 'blog_fancybox',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                )
            ),
            'swatches-section' => array(
                'title'   => __('Swatches', 'my_theme-admin-td'),
                'header'  => __('Choose a swatch for your Blog.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Blog Swatch', 'my_theme-admin-td'),
                        'desc'    => __('Choose a color swatch for the Blog page', 'my_theme-admin-td'),
                        'id'      => 'blog_swatch',
                        'type'    => 'select',
                        'default' => 'swatch-white',
                        'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
                    ),
                    array(
                        'name'    => __('Masonry Items Swatch', 'my_theme-admin-td'),
                        'desc'    => __('Choose a color swatch for all the items if you use a masonry blog layout.', 'my_theme-admin-td'),
                        'id'      => 'masonry_items_swatch',
                        'type'    => 'select',
                        'default' => 'swatch-blue',
                        'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
                    ),
                    array(
                        'name'    => __('Related Section Swatch', 'my_theme-admin-td'),
                        'desc'    => __('Choose a swatch to colour the related section with.', 'my_theme-admin-td'),
                        'id'      => 'related_portfolio_swatch',
                        'type'    => 'select',
                        'default' => 'swatch-blue',
                        'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
                    ),
                )
            )
        )
    ));

    $page_header_options = include PM_THEME_DIR . 'inc/options/global-options/heading-options.php';
    $page_header_section_options = include PM_THEME_DIR . 'inc/options/global-options/section-options.php';

    // remove text from default page options
    unset($page_header_options[0]);
    unset($page_header_options[1]);

    $pm_theme->register_option_page(array(
        'page_title' => __('Pages', 'my_theme-admin-td'),
        'menu_title' => __('Pages', 'my_theme-admin-td'),
        'slug'       => THEME_SHORT . '-pages',
        'main_menu'  => false,
        'icon'       => 'tools',
        'sections'   => array(
            'page-header-options' => array(
                'title'   => __('Default Page Header', 'my_theme-admin-td'),
                'header'  => __('Change if the page header will appear by default.', 'my_theme-admin-td'),
                'fields'  => array(
                    array(
                        'name' => __('Show Header', 'my_theme-admin-td'),
                        'desc' => __('Show or hide the header at the top of the page.', 'my_theme-admin-td'),
                        'id'   => 'page_header_show_header',
                        'type' => 'select',
                        'default' => 'show',
                        'options' => array(
                            'hide' => __('Hide', 'my_theme-admin-td'),
                            'show' => __('Show', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name' => __('Show Breadcrumbs', 'my_theme-admin-td'),
                        'desc' => __('Show or hide the breadcrumbs in the header', 'my_theme-admin-td'),
                        'id'   => 'page_header_show_breadcrumbs',
                        'type' => 'select',
                        'default' => 'hide',
                        'options' => array(
                            'hide' => __('Hide', 'my_theme-admin-td'),
                            'show' => __('Show', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name' => __('Breadcrumb Text Capitalisation', 'my_theme-admin-td'),
                        'desc' => __('Decides the case of the breadcrumbs.', 'my_theme-admin-td'),
                        'id'   => 'page_header_breadcrumbs_case',
                        'type' => 'select',
                        'options' => array(
                            'text-caps'      => __('Force Uppercase', 'my_theme-admin-td'),
                            'text-lowercase' => __('Force Lowercase', 'my_theme-admin-td'),
                            'text-none' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'text-lowercase',
                    )
                )
            ),
            'default-page-header-heading' => array(
                'title'   => __('Default Page Header Heading', 'my_theme-admin-td'),
                'header'  => __('Change the text of your blog heading here.', 'my_theme-admin-td'),
                'fields'  => pm_prefix_options_id('page_header', $page_header_options),
            ),
            'default-page-header-section' => array(
                'title'   => __('Default Page Header Section', 'my_theme-admin-td'),
                'header'  => __('Change the appearance of your page header section.', 'my_theme-admin-td'),
                'fields'  => pm_prefix_options_id('page_header', $page_header_section_options)
            ),
        )
    ));
    $pm_theme->register_option_page( array(
        'page_title' => __('Flexslider Options', 'my_theme-admin-td'),
        'menu_title' => __('Flexslider', 'my_theme-admin-td'),
        'slug'       => THEME_SHORT . '-flexslider',
        'header'  => __('Global options for flexsliders used in the site (gallery posts, gallery portfolio items).', 'my_theme-admin-td'),
        'main_menu'  => false,
        'icon'       => 'tools',
        'sections'   => array(
            'slider-section' => array(
                'title' => __('Slideshow', 'my_theme-admin-td'),
                'header'  => __('Setup your global default flexslider options.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      =>  __('Animation style', 'my_theme-admin-td'),
                        'desc'      =>  __('Select how your slider animates', 'my_theme-admin-td'),
                        'id'        => 'animation',
                        'type'      => 'select',
                        'options'   =>  array(
                            'slide' => __('Slide', 'my_theme-admin-td'),
                            'fade'  => __('Fade', 'my_theme-admin-td'),
                        ),
                        'attr'      =>  array(
                            'class'    => 'widefat',
                        ),
                        'default'   => 'slide',
                    ),
                    array(
                        'name'      => __('Speed', 'my_theme-admin-td'),
                        'desc'      => __('Set the speed of the slideshow cycling, in milliseconds', 'my_theme-admin-td'),
                        'id'        => 'speed',
                        'type'      => 'slider',
                        'default'   => 7000,
                        'attr'      => array(
                            'max'       => 15000,
                            'min'       => 2000,
                            'step'      => 1000
                        )
                    ),
                    array(
                        'name'      => __('Duration', 'my_theme-admin-td'),
                        'desc'      => __('Set the speed of animations', 'my_theme-admin-td'),
                        'id'        => 'duration',
                        'type'      => 'slider',
                        'default'   => 600,
                        'attr'      => array(
                            'max'       => 1500,
                            'min'       => 200,
                            'step'      => 100
                        )
                    ),
                    array(
                        'name'      => __('Auto start', 'my_theme-admin-td'),
                        'id'        => 'autostart',
                        'type'      => 'radio',
                        'default'   =>  'true',
                        'desc'    => __('Start slideshow automatically', 'my_theme-admin-td'),
                        'options' => array(
                            'true'  => __('On', 'my_theme-admin-td'),
                            'false' => __('Off', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Show navigation arrows', 'my_theme-admin-td'),
                        'id'        => 'directionnav',
                        'type'      => 'radio',
                        'desc'    => __('Shows the navigation arrows at the sides of the flexslider.', 'my_theme-admin-td'),
                        'default'   =>  'hide',
                        'options' => array(
                            'hide' => __('Hide', 'my_theme-admin-td'),
                            'show' => __('Show', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Show controls', 'my_theme-admin-td'),
                        'id'        => 'showcontrols',
                        'type'      => 'radio',
                        'default'   =>  'show',
                        'desc'    => __('If you choose hide the option below will be ignored', 'my_theme-admin-td'),
                        'options' => array(
                            'hide' => __('Hide', 'my_theme-admin-td'),
                            'show' => __('Show', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Choose the place of the controls', 'my_theme-admin-td'),
                        'id'        => 'controlsposition',
                        'type'      => 'radio',
                        'default'   =>  'inside',
                        'desc'    => __('Choose the position of the navigation controls', 'my_theme-admin-td'),
                        'options' => array(
                            'inside'    => __('Inside', 'my_theme-admin-td'),
                            'outside'   => __('Outside', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      =>  __('Choose the alignment of the controls', 'my_theme-admin-td'),
                        'id'        => 'controlsalign',
                        'type'      => 'radio',
                        'desc'    => __('Choose the alignment of the navigation controls', 'my_theme-admin-td'),
                        'options'   =>  array(
                            'center' => __('Center', 'my_theme-admin-td'),
                            'left'   => __('Left', 'my_theme-admin-td'),
                            'right'  => __('Right', 'my_theme-admin-td'),
                        ),
                        'attr'      =>  array(
                            'class'    => 'widefat',
                        ),
                        'default'   => 'center',
                    )
                )
            ),
            'captions-section' => array(
                'title' => __('Captions', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Show Captions', 'my_theme-admin-td'),
                        'id'        => 'captions',
                        'type'      => 'radio',
                        'default'   =>  'hide',
                        'desc'    => __('If you choose hide the options below will be ignored', 'my_theme-admin-td'),
                        'options' => array(
                            'hide' => __('Hide', 'my_theme-admin-td'),
                            'show' => __('Show', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Captions Horizontal Position', 'my_theme-admin-td'),
                        'desc'      => __('Choose among left, right and alternate positioning', 'my_theme-admin-td'),
                        'id'        => 'captions_horizontal',
                        'type'      => 'select',
                        'default'   =>  'left',
                        'options' => array(
                            'left'      => __('Left', 'my_theme-admin-td'),
                            'right'     => __('Right', 'my_theme-admin-td'),
                            'alternate' => __('Alternate', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Show Tooltip', 'my_theme-admin-td'),
                        'id'        => 'tooltip',
                        'type'      => 'select',
                        'default'   =>  'hide',
                        'desc'    => __('Show tooltip if Item width option is set', 'my_theme-admin-td'),
                        'options' => array(
                            'show'  => __('Show', 'my_theme-admin-td'),
                            'hide'  => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                )
            ),
        )
    ));
    $pm_theme->register_option_page( array(
        'page_title' => __('Portfolio Options', 'my_theme-admin-td'),
        'menu_title' => __('Portfolio', 'my_theme-admin-td'),
        'slug'       => THEME_SHORT . '-portfolio',
        'main_menu'  => false,
        'sections'   => array(
            'portfolio-options-section' => array(
                'title'   => __('Portfolio List Options', 'my_theme-admin-td'),
                'header'  => __('Customise your portfolio list.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Zoom Button Text', 'my_theme-admin-td'),
                        'id'      => 'portfolio_button_text_zoom',
                        'type'    => 'text',
                        'default' => __('View Larger', 'my_theme-admin-td'),
                        'desc'    => __('This text will be shown in the portfolio item zoom button.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Link Button Text', 'my_theme-admin-td'),
                        'id'      => 'portfolio_button_text_details',
                        'type'    => 'text',
                        'default' => __('More Details', 'my_theme-admin-td'),
                        'desc'    => __('This text will be shown below the portfolio item link button.', 'my_theme-admin-td'),
                    ),
                )
            ),
            'portfolio-single-section' => array(
                'title'   => __('Portfolio Single Page', 'my_theme-admin-td'),
                'header'  => __('Customise your portfolio single page here.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Portfolio Page', 'my_theme-admin-td'),
                        'desc'      => __('Set the page that the icon at the top of the single page will link to.', 'my_theme-admin-td'),
                        'id'        => 'portfolio_page',
                        'type'      => 'select',
                        'options'  => 'taxonomy',
                        'taxonomy' => 'pages',
                        'default' =>  '',
                        'blank' => __('None', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Show related items', 'my_theme-admin-td'),
                        'desc'    => __('Show related portfolio items after the post content', 'my_theme-admin-td'),
                        'id'      => 'related_portfolio_items',
                        'type'    => 'radio',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                    array(
                        'name'    => __('Related Section Title Text', 'my_theme-admin-td'),
                        'desc'    => __('The text that will be shown above the related portfolio items.', 'my_theme-admin-td'),
                        'id'      => 'related_portfolio_text',
                        'type'    => 'text',
                        'default' => __('Other related items', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Related Section Title Font Weight', 'my_theme-admin-td'),
                        'desc'    => __('Choose weight of the font to use for the related post text', 'my_theme-admin-td'),
                        'id'      => 'related_portfolio_text_weight',
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
                        'name'    => __('Number of related items', 'my_theme-admin-td'),
                        'desc'    => __('Choose how many related posts are displayed in the related posts section after the post content', 'my_theme-admin-td'),
                        'id'      => 'related_portfolio_count',
                        'type'      => 'slider',
                        'default'   => 3,
                        'attr'      => array(
                            'max'       => 8,
                            'min'       => 3,
                            'step'      => 1
                        )
                    ),
                    array(
                        'name'    => __('Number of related item columns', 'my_theme-admin-td'),
                        'desc'    => __('Choose how many columns are displayed in the related items section after the portfolio content', 'my_theme-admin-td'),
                        'id'      => 'related_portfolio_columns',
                        'type'    => 'radio',
                        'options' => array(
                            '3'   => __('3', 'my_theme-admin-td'),
                            '4'   => __('4', 'my_theme-admin-td')
                        ),
                        'default' => '3',
                    ),
                )
            ),
            'portfolio-size-section' => array(
                'title'   => __('Portfolio Image Sizes', 'my_theme-admin-td'),
                'header'  => __('When your portfolio images are uploaded they will be automatially saved using these dimensions.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Image Width', 'my_theme-admin-td'),
                        'desc'    => __('Width of each portfolio item', 'my_theme-admin-td'),
                        'id'      => 'portfolio_item_width',
                        'type'    => 'slider',
                        'default'   => 800,
                        'attr'      => array(
                            'max'       => 1200,
                            'min'       => 50,
                            'step'      => 1
                        )
                    ),
                    array(
                        'name'    => __('Image Height', 'my_theme-admin-td'),
                        'desc'    => __('Height of each portfolio item', 'my_theme-admin-td'),
                        'id'      => 'portfolio_item_height',
                        'type'    => 'slider',
                        'default'   => 600,
                        'attr'      => array(
                            'max'       => 800,
                            'min'       => 50,
                            'step'      => 1
                        )
                    ),
                    array(
                        'name'      => __('Image Cropping', 'my_theme-admin-td'),
                        'id'        => 'portfolio_item_crop',
                        'type'      => 'radio',
                        'default'   =>  'on',
                        'desc'    => __('Crop images to the exact proportions', 'my_theme-admin-td'),
                        'options' => array(
                            'on' => __('Crop Images', 'my_theme-admin-td'),
                            'off' => __('Do not crop', 'my_theme-admin-td'),
                        ),
                    ),
                )
            ),
        )
    ));
    $pm_theme->register_option_page( array(
        'page_title' => __('Post Types', 'my_theme-admin-td'),
        'menu_title' => __('Post Types', 'my_theme-admin-td'),
        'slug'       => THEME_SHORT . '-post-types',
        'main_menu'  => false,
        'sections'   => array(
            'permalinks-section' => array(
                'title'   => __('Configure your permalinks here', 'my_theme-admin-td'),
                'header'  => __('Some of the custom single pages ( Portfolios, Services, Staff ) can be configured to use their own special url.  This helps with SEO.  Set your permalinks here, save and then navigate to one of the items and you will see the url in the format below.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'prefix'  => '<code>' . get_site_url() . '/</code>',
                        'postfix' => '<code>/my-portfolio-item</code>',
                        'name'    => __('Portfolio URL slug', 'my_theme-admin-td'),
                        'desc'    => __('Choose the url you would like your portfolios to be shown on', 'my_theme-admin-td'),
                        'id'      => 'portfolio_slug',
                        'type'    => 'text',
                        'default' => 'portfolio',
                    ),
                    array(
                        'prefix'  => '<code>' . get_site_url() . '/</code>',
                        'postfix' => '<code>/my-service</code>',
                        'name'    => __('Service URL slug', 'my_theme-admin-td'),
                        'desc'    => __('Choose the url you would like your services to use', 'my_theme-admin-td'),
                        'id'      => 'services_slug',
                        'type'    => 'text',
                        'default' => 'our-services',
                    ),
                    array(
                        'prefix'  => '<code>' . get_site_url() . '/</code>',
                        'postfix' => '<code>/our-team</code>',
                        'name'    => __('Staff URL slug', 'my_theme-admin-td'),
                        'desc'    => __('Choose the url you would like your staff pages to use', 'my_theme-admin-td'),
                        'id'      => 'staff_slug',
                        'type'    => 'text',
                        'default' => 'our-team',
                    ),
                )
            ),
            'posttypes-archives-section' => array(
                'title'   => __('Post Types Archive Pages', 'my_theme-admin-td'),
                'header'  => __('Set your post types archives pages here', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Portfolio Archive Page', 'my_theme-admin-td'),
                        'desc'      => __('Set the archive page for the portfolio post type', 'my_theme-admin-td'),
                        'id'        => 'portfolio_archive_page',
                        'type'      => 'select',
                        'options'  => 'taxonomy',
                        'taxonomy' => 'pages',
                        'default' =>  '',
                        'blank' => __('None', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Services Archive Page', 'my_theme-admin-td'),
                        'desc'      => __('Set the archive page for the services post type', 'my_theme-admin-td'),
                        'id'        => 'services_archive_page',
                        'type'      => 'select',
                        'options'  => 'taxonomy',
                        'taxonomy' => 'pages',
                        'default' =>  '',
                        'blank' => __('None', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Staff Archive Page', 'my_theme-admin-td'),
                        'desc'      => __('Set the archive page for the staff post type', 'my_theme-admin-td'),
                        'id'        => 'staff_archive_page',
                        'type'      => 'select',
                        'options'  => 'taxonomy',
                        'taxonomy' => 'pages',
                        'default' =>  '',
                        'blank' => __('None', 'my_theme-admin-td'),
                    ),
                )
            ),
        )
    ));
    $pm_theme->register_option_page( array(
        'page_title' => __('Advanced Theme Options', 'my_theme-admin-td'),
        'menu_title' => __('Advanced', 'my_theme-admin-td'),
        'slug'       => THEME_SHORT . '-advanced',
        'main_menu'  => false,
        'javascripts' => array(
            array(
                'handle' => 'default-swatches',
                'src'    => PM_THEME_URI . 'inc/options/javascripts/pages/advanced-options.js',
                'deps'   => array( 'jquery' ),
                'localize' => array(
                    'object_handle' => 'localData',
                    'data' => array(
                        'ajaxurl' => admin_url( 'admin-ajax.php' ),
                        'installDefaultsNonce'  => wp_create_nonce( 'install-default-vc' )
                    )
                ),
            ),
        ),

        'sections'   => array(
            'css-section' => array(
                'title'   => __('CSS', 'my_theme-admin-td'),
                'header'  => __('Here you can modify the themes advanced CSS options.</br> Please ensure that the CSS added here is valid. You can copy / paste your CSS <a href="https://jigsaw.w3.org/css-validator/#validate_by_input" target="_blank">here</a> to validate it.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Extra CSS (loaded last in the header)', 'my_theme-admin-td'),
                        'desc'    => __('Add extra CSS rules to be included in all pages that will be loaded in the header.  This will allow you to override some of the default styling of the theme.', 'my_theme-admin-td'),
                        'id'      => 'extra_css',
                        'type'    => 'textarea',
                        'attr'    => array( 'rows' => '10', 'style' => 'width:100%' ),
                        'default' => '',
                    ),
                    array(
                        'name'    => __('Swatch CSS Loading', 'my_theme-admin-td'),
                        'desc'    => __('Defines where the dynamic swatch css that is created by your swatch options is saved. If you are using a lot of swatches it is recommended to save them to a file.  If you dont have access to the filesystem you can save them in WP and inject them into the head', 'my_theme-admin-td'),
                        'id'      => 'swatch_css_save',
                        'on_change' => 'pm_resave_swatches_update_complete',
                        'type'    => 'select',
                        'options' => array(
                            'file'  => __('Save to a file (assets/css/swatches.css)', 'my_theme-admin-td'),
                            'head' => __('Save to DB and inject into head', 'my_theme-admin-td'),
                        ),
                        'default' => 'head',
                    ),
                )
            ),
            'js-section' => array(
                'title'   => __('Javascript', 'my_theme-admin-td'),
                'header'  => __('Here you can modify the themes advanced JS options', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Extra Javascript (loaded last in the header)', 'my_theme-admin-td'),
                        'desc'    => __('Add extra Javascript rules to be included in all pages that will be loaded in the header.  Code will be wrapped in script tags by default.', 'my_theme-admin-td'),
                        'id'      => 'extra_js',
                        'type'    => 'textarea',
                        'attr'    => array( 'rows' => '10', 'style' => 'width:100%' ),
                        'default' => '',
                    ),
                )
            ),
            'assets-section' => array(
                'title'   => __('Assets', 'my_theme-admin-td'),
                'header'  => __('Here you can choose the type of asset files enqueued by the theme.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Load Minified CSS and JS Assets', 'my_theme-admin-td'),
                        'desc'    => __('Choose between minified and not minified theme CSS and Javascript files. Minified files are smaller and faster to load, while non-minified are easier to edit and mofify because they are more readable. Minified assets are enqueued by default.', 'my_theme-admin-td'),
                        'id'      => 'minified_assets',
                        'type'    => 'radio',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                )
            ),
            'atom-section' => array(
                'title'   => __('Enable Atom Meta', 'my_theme-admin-td'),
                'header'  => __('Here you can enable atom meta for posts author, title and date (used by search engines).', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Author', 'my_theme-admin-td'),
                        'desc'    => __('Enable atom meta for posts author', 'my_theme-admin-td'),
                        'id'      => 'atom_author',
                        'type'    => 'radio',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                    array(
                        'name'    => __('Title', 'my_theme-admin-td'),
                        'desc'    => __('Enable atom meta for posts title', 'my_theme-admin-td'),
                        'id'      => 'atom_title',
                        'type'    => 'radio',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    ),
                    array(
                        'name'    => __('Date', 'my_theme-admin-td'),
                        'desc'    => __('Enable atom meta for posts date', 'my_theme-admin-td'),
                        'id'      => 'atom_date',
                        'type'    => 'radio',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    )
                )
            ),
            'favicon-section' => array(
                'title'   => __('Site Fav Icon', 'my_theme-admin-td'),
                'header'  => __('The site Fav Icon is the icon that appears in the top corner of the browser tab, it is also used when saving bookmarks.  Upload your own custom Fav Icon here, recommended resolutions are 16x16 or 32x32.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                      'name' => __('Fav Icon', 'my_theme-admin-td'),
                      'id'   => 'favicon',
                      'type' => 'upload',
                      'store' => 'url',
                      'desc' => __('Upload a Fav Icon for your site here', 'my_theme-admin-td'),
                      'default' => PM_THEME_URI . 'assets/images/favicons/favicon.ico',
                    ),
                )
            ),
            'apple-section' => array(
                'title'   => __('Apple Icons', 'my_theme-admin-td'),
                'header'  => __('If someone saves a bookmark to their desktop on an Apple device this is the icon that will be used.  Here you can upload the icon you would like to be used on the various Apple devices.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name' => __('iPhone Icon (57x57)', 'my_theme-admin-td'),
                        'id'   => 'iphone_icon',
                        'type' => 'upload',
                        'store' => 'url',
                        'desc' => __('Upload an icon to be used by iPhone as a bookmark (57 x 57 pixels)', 'my_theme-admin-td'),
                        'default' => PM_THEME_URI . 'assets/images/favicons/apple-touch-icon-precomposed.png',
                    ),
                    array(
                      'name' => __('iPhone Retina Icon (114x114)', 'my_theme-admin-td'),
                      'id'   => 'iphone_retina_icon',
                      'type' => 'upload',
                      'store' => 'url',
                      'desc' => __('Upload an icon to be used by iPhone Retina as a bookmark (114 x 114 pixels)', 'my_theme-admin-td'),
                      'default' => PM_THEME_URI . 'assets/images/favicons/apple-touch-icon-114x114-precomposed.png',
                    ),
                    array(
                      'name' => __('iPad Icon (72x72)', 'my_theme-admin-td'),
                      'id'   => 'ipad_icon',
                      'type' => 'upload',
                      'store' => 'url',
                      'desc' => __('Upload an icon to be used by iPad as a bookmark (72 x 72 pixels)', 'my_theme-admin-td'),
                      'default' => PM_THEME_URI . 'assets/images/favicons/apple-touch-icon-72x72-precomposed.png',
                    ),
                    array(
                      'name' => __('iPad Retina Icon (144x144)', 'my_theme-admin-td'),
                      'id'   => 'ipad_icon_retina',
                      'type' => 'upload',
                      'store' => 'url',
                      'desc' => __('Upload an icon to be used by iPad Retina as a bookmark (144 x 144 pixels)', 'my_theme-admin-td'),
                      'default' => PM_THEME_URI . 'assets/images/favicons/apple-touch-icon-144x144-precomposed.png',
                    ),
                )
            ),
            'mobile-section' => array(
                'title'   => __('Mobile', 'my_theme-admin-td'),
                'header'  => __('Here you can configure settings targeted at mobile devices', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Background Videos', 'my_theme-admin-td'),
                        'desc'    => __('Here you can enable section background videos for mobile. By default it is set to off in order to save bandwidth. Section background image will be displayed as a fallback', 'my_theme-admin-td'),
                        'id'      => 'mobile_videos',
                        'type'    => 'radio',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'off',
                    ),
                )
            ),
            'svg-section' => array(
                'title'   => __('SVG Icons', 'my_theme-admin-td'),
                'header'  => __('Here you can enable SVG uploads', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Enable SVG uploads', 'my_theme-admin-td'),
                        'desc'    => __('Here you can enable SVG uploads. By default it is set to off to avoid security hazards.', 'my_theme-admin-td'),
                        'id'      => 'enable_svg',
                        'type'    => 'radio',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'off',
                    ),
                )
            ),
            'google-anal-section' => array(
                'title'   => __('Google Analytics', 'my_theme-admin-td'),
                'header'  => __('Set your Google Analytics Tracker and keep track of visitors to your site.', 'my_theme-admin-td'),
                'fields' => array(
                    'google_anal' => array(
                        'name' => __('Google Analytics', 'my_theme-admin-td'),
                        'desc' => __('Paste your google analytics code here', 'my_theme-admin-td'),
                        'id' => 'google_anal',
                        'type' => 'text',
                        'default' => 'UA-XXXXX-X',
                    )
                )
            ),
            'advanced-menu-section' => array(
                'title'   => __('Menus', 'my_theme-admin-td'),
                'header'  => __('Set up advanced menu options.', 'my_theme-admin-td'),
                'fields' => array(
                    'ajax_menu_save' => array(
                        'name' => __('Save Menus Using Ajax ( allows saving menus with > 90 menu items )', 'my_theme-admin-td'),
                        'desc' => __('This feature will make WordPress menus save using ajax instead of the default PHP save.  This gets around a bug in WordPress that stops large menus from saving (see https://core.trac.wordpress.org/ticket/14134).', 'my_theme-admin-td'),
                        'id' => 'ajax_menu_save',
                        'type'    => 'radio',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    )
                )
            ),
            'advanced-visual-composer-section' => array(
                'title'   => __('Visual Composer', 'my_theme-admin-td'),
                'header'  => __('Set up advanced visual composer options.', 'my_theme-admin-td'),
                'fields' => array(
                    'ajax_menu_save' => array(
                        'name'        => __('Install Default Visual Composer Templates', 'my_theme-admin-td'),
                        'desc'        => __('This will install some default visual composer templates.', 'my_theme-admin-td'),
                        'id'          => 'visual_composer_templates',
                        'type'        => 'button',
                        'button-text' => __('Install Templates', 'my_theme-admin-td'),
                        'attr'        => array(
                            'id'    => 'install-default-vc-templates',
                            'class' => 'button button-primary'
                        ),
                    )
                )
            ),
            'advanced-menu-section' => array(
                'title'   => __('Menus', 'my_theme-admin-td'),
                'header'  => __('Set up advanced menu options.', 'my_theme-admin-td'),
                'fields' => array(
                    'ajax_menu_save' => array(
                        'name' => __('Save Menus Using Ajax ( allows saving menus with > 90 menu items )', 'my_theme-admin-td'),
                        'desc' => __('This feature will make WordPress menus save using ajax instead of the default PHP save.  This gets around a bug in WordPress that stops large menus from saving (see https://core.trac.wordpress.org/ticket/14134).', 'my_theme-admin-td'),
                        'id' => 'ajax_menu_save',
                        'type'    => 'radio',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'on',
                    )
                )
            ),
            'import-export' => array(
                'title'   => __('Import / Export', 'my_theme-admin-td'),
                'header'  => __('Here you can import/export the theme options', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Export Data', 'my_theme-admin-td'),
                        'id'      => 'data_export',
                        'type'    => 'export',
                        'attr'    => array( 'rows' => '10', 'style' => 'width:100%' ),
                        'default' => '',
                    ),
                    array(
                        'name'    => __('Import Data', 'my_theme-admin-td'),
                        'id'      => 'data_import',
                        'type'    => 'import',
                        'attr'    => array( 'rows' => '10', 'style' => 'width:100%' ),
                        'default' => '',
                    )
                )
            )
        )
    ));

    $pm_theme->register_option_page( array(
        'page_title' => __('WooCommerce', 'my_theme-admin-td'),
        'menu_title' => __('WooCommerce', 'my_theme-admin-td'),
        'slug'       => THEME_SHORT . '-woocommerce',
        'main_menu'  => false,
        'icon'       => 'tools',
        'sections'   => array(
            'woo-general' => array(
                'title'   => __('General WooCommerce Page Options', 'my_theme-admin-td'),
                'header'  => __('Change the way your shop page looks with these options.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('General Shop Swatch', 'my_theme-admin-td'),
                        'desc'    => __('Choose a general colour scheme to use for your WooCommerce site.', 'my_theme-admin-td'),
                        'id'      => 'woocom_general_swatch',
                        'type'    => 'select',
                        'default' => 'swatch-white',
                        'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
                    ),
                )
            ),
            'woo-shop-section' => array(
                'title'   => __('Shop Page', 'my_theme-admin-td'),
                'header'  => __('Setup the layout of your Shop.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Shop Layout', 'my_theme-admin-td'),
                        'desc'    => __('Layout of your shop page. Choose among right sidebar, left sidebar, fullwidth layout', 'my_theme-admin-td'),
                        'id'      => 'shop_layout',
                        'type'    => 'radio',
                        'options' => array(
                            'sidebar-right' => __('Right Sidebar', 'my_theme-admin-td'),
                            'full-width'    => __('Full Width', 'my_theme-admin-td'),
                            'sidebar-left'  => __('Left Sidebar', 'my_theme-admin-td'),
                        ),
                        'default' => 'full-width',
                    ),
                    array(
                        'name'    => __('Shop Page Columns', 'my_theme-admin-td'),
                        'desc'    => __('Number of columns to use for the products on the main shop page.', 'my_theme-admin-td'),
                        'id'      => 'woocommerce_shop_page_columns',
                        'type'    => 'slider',
                        'default' => 3,
                        'attr'    => array(
                            'max'  => 4,
                            'min'  => 2,
                            'step' => 1
                        )
                    ),
                )
            ),
            'woo-shop-checkout-sidebar' => array(
                'title'   => __('Checkout Sidebar', 'my_theme-admin-td'),
                'header'  => __('Change the way your sidebar looks with these options.', 'my_theme-admin-td'),
                'fields' => array(
                     array(
                        'name'      => __('Sidebar Enabled', 'my_theme-admin-td'),
                        'id'        => 'woo_cart_popup',
                        'type'      => 'radio',
                        'default'   =>  'show',
                        'desc'    => __('When you click on the cart widget the sidebar will appear, if disabled you will be taken to the cart page.', 'my_theme-admin-td'),
                        'options' => array(
                            'hide' => __('Disabled', 'my_theme-admin-td'),
                            'show' => __('Enabled', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Checkout Slide Sidebar Swatch', 'my_theme-admin-td'),
                        'desc'    => __('Choose a color swatch for the cart that slides in from the side.', 'my_theme-admin-td'),
                        'id'      => 'pageslide_cart_swatch',
                        'type'    => 'select',
                        'default' => 'swatch-white',
                        'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
                    ),
                )
            ),
            'woo-single-product-page' => array(
                'title'  => __('Product Details', 'my_theme-admin-td'),
                'header' => __('Setup your products page details', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Social Networks', 'my_theme-admin-td'),
                        'desc'    => __('Select which social networks you would like to share products on.', 'my_theme-admin-td'),
                        'id'      => 'woo_social_networks',
                        'default' =>  array( 'facebook', 'twitter', 'google', 'pinterest' ),
                        'type'    => 'select',
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        ),
                        'options' => array(
                            'facebook'  => __('Facebook', 'my_theme-admin-td'),
                            'twitter'   => __('Twitter', 'my_theme-admin-td'),
                            'google'    => __('Google+', 'my_theme-admin-td'),
                            'pinterest' => __('Pinterest', 'my_theme-admin-td'),
                            'none'      => __('None', 'my_theme-admin-td'),
                        )
                    ),
                ),
            ),
            'product-slider-section' => array(
                'title' => __('Product Slideshow', 'my_theme-admin-td'),
                'header'  => __('Setup your product page flexslider options.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      =>  __('Animation style', 'my_theme-admin-td'),
                        'desc'      =>  __('Select how your slider animates', 'my_theme-admin-td'),
                        'id'        => 'product_animation',
                        'type'      => 'select',
                        'options'   =>  array(
                            'slide' => __('Slide', 'my_theme-admin-td'),
                            'fade'  => __('Fade', 'my_theme-admin-td'),
                        ),
                        'attr'      =>  array(
                            'class'    => 'widefat',
                        ),
                        'default'   => 'slide',
                    ),
                    array(
                        'name'      => __('Speed', 'my_theme-admin-td'),
                        'desc'      => __('Set the speed of the slideshow cycling, in milliseconds', 'my_theme-admin-td'),
                        'id'        => 'product_speed',
                        'type'      => 'slider',
                        'default'   => 7000,
                        'attr'      => array(
                            'max'       => 15000,
                            'min'       => 2000,
                            'step'      => 1000
                        )
                    ),
                    array(
                        'name'      => __('Duration', 'my_theme-admin-td'),
                        'desc'      => __('Set the speed of animations', 'my_theme-admin-td'),
                        'id'        => 'product_duration',
                        'type'      => 'slider',
                        'default'   => 600,
                        'attr'      => array(
                            'max'       => 1500,
                            'min'       => 200,
                            'step'      => 100
                        )
                    ),
                    array(
                        'name'      => __('Auto start', 'my_theme-admin-td'),
                        'id'        => 'product_autostart',
                        'type'      => 'radio',
                        'default'   =>  'true',
                        'desc'    => __('Start slideshow automatically', 'my_theme-admin-td'),
                        'options' => array(
                            'true'  => __('On', 'my_theme-admin-td'),
                            'false' => __('Off', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Show navigation arrows', 'my_theme-admin-td'),
                        'id'        => 'product_directionnav',
                        'type'      => 'radio',
                        'desc'    => __('Shows the navigation arrows at the sides of the flexslider.', 'my_theme-admin-td'),
                        'default'   =>  'hide',
                        'options' => array(
                            'hide' => __('Hide', 'my_theme-admin-td'),
                            'show' => __('Show', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Navigation arrows type', 'my_theme-admin-td'),
                        'id'        => 'product_directionnavtype',
                        'type'      => 'radio',
                        'desc'      => __('Type of the direction arrows, fancy (with bg) or simple.', 'my_theme-admin-td'),
                        'default'   =>  'simple',
                        'options' => array(
                            'simple' => __('Simple', 'my_theme-admin-td'),
                            'fancy'  => __('Fancy', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Show controls', 'my_theme-admin-td'),
                        'id'        => 'product_showcontrols',
                        'type'      => 'radio',
                        'default'   =>  'thumbnails',
                        'desc'    => __('If you choose hide the option below will be ignored', 'my_theme-admin-td'),
                        'options' => array(
                            'hide' => __('Hide', 'my_theme-admin-td'),
                            'show' => __('Show', 'my_theme-admin-td'),
                            'thumbnails' => __('Thumbnails', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Choose the place of the controls', 'my_theme-admin-td'),
                        'id'        => 'product_controlsposition',
                        'type'      => 'radio',
                        'default'   =>  'outside',
                        'desc'    => __('Choose the position of the navigation controls', 'my_theme-admin-td'),
                        'options' => array(
                            'inside'    => __('Inside', 'my_theme-admin-td'),
                            'outside'   => __('Outside', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      =>  __('Choose the alignment of the controls', 'my_theme-admin-td'),
                        'id'        => 'product_controlsalign',
                        'type'      => 'radio',
                        'desc'    => __('Choose the alignment of the navigation controls', 'my_theme-admin-td'),
                        'options'   =>  array(
                            'center' => __('Center', 'my_theme-admin-td'),
                            'left'   => __('Left', 'my_theme-admin-td'),
                            'right'  => __('Right', 'my_theme-admin-td'),
                        ),
                        'attr'      =>  array(
                            'class'    => 'widefat',
                        ),
                        'default'   => 'center',
                    ),
                )
            ),
        )
    ));
    $pm_theme->register_option_page( array(
        'page_title' => __('Default Site Colours', 'my_theme-admin-td'),
        'menu_title' => __('Colours', 'my_theme-admin-td'),
        'slug'       => THEME_SHORT . '-default-colours',
        'main_menu'  => false,
        'icon'       => 'tools',
        'javascripts' => array(
            array(
                'handle' => 'default-swatches',
                'src'    => PM_THEME_URI . 'inc/options/javascripts/pages/default-swatches.js',
                'deps'   => array( 'jquery' ),
                'localize' => array(
                    'object_handle' => 'localData',
                    'data' => array(
                        'ajaxurl' => admin_url( 'admin-ajax.php' ),
                        'installDefaultsNonce'  => wp_create_nonce( 'install-defaults' )
                    )
                ),
            ),
        ),
        'sections'   => array(
            'default-swatch-section' => array(
                'title' => __('Default Swatches Install', 'my_theme-admin-td'),
                'header'  => __('Re-install the themes default swatches here. <strong>Warning this will remove any modifications you have made to the default swatches</strong>', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      =>  __('Re-install Default Swatches', 'my_theme-admin-td'),
                        'button-text' => __('Install Defaults', 'my_theme-admin-td'),
                        'desc'    => __('This button will reinstall all the default swatches for the site.', 'my_theme-admin-td'),
                        'id'        => 'install_defaults',
                        'type'      => 'button',
                        'attr'        => array(
                            'id'    => 'install-default-swatches',
                            'class' => 'button button-primary'
                        ),
                    ),
                )
            ),
            'save-all-swatch-section' => array(
                'title' => __('Save all swatches', 'my_theme-admin-td'),
                'header'  => __('This option will re-save all your enabled swatches.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      =>  __('Save All Swatches', 'my_theme-admin-td'),
                        'button-text' => __('Save Swatches', 'my_theme-admin-td'),
                        'desc'    => __('This button will re-save all swatches.', 'my_theme-admin-td'),
                        'id'        => 'save_all_swatches',
                        'type'      => 'button',
                        'attr'        => array(
                            'id'    => 'save-all-swatches',
                            'class' => 'button button-primary'
                        ),
                    ),
                )
            ),
            'default-button-colours-section' => array(
                'title'   => __('Default Contextual Colours', 'my_theme-admin-td'),
                'header'  => __('Set the default bootstrap context colours here. For example see buttons <a target="_blank" href="http://getbootstrap.com/css/#buttons">Bootstrap docs here</a>.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Text Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_default_button_text',
                        'desc'    => __('Text colour to use for the default context.', 'my_theme-admin-td'),
                        'default' => '#FFF',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Background Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_default_button_background',
                        'desc'    => __('Background colour to use for the default context.', 'my_theme-admin-td'),
                        'default' => '#6C6C6A',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Background Hover Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_default_button_background_hover',
                        'desc'    => __('Background colour when user hovers over the default context.', 'my_theme-admin-td'),
                        'default' => '#404040',
                        'type'    => 'colour',
                    ),
                )
            ),
            'warning-button-colours-section' => array(
                'title'   => __('Warning Button Colours', 'my_theme-admin-td'),
                'header'  => __('Set the warning bootstrap context colours here. For example see buttons <a target="_blank" href="http://getbootstrap.com/css/#buttons">Bootstrap docs here</a>.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Warning Context - Text Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_warning_button_text',
                        'desc'    => __('Text colour to use for the warning context.', 'my_theme-admin-td'),
                        'default' => '#FFFFFF',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Warning Context - Background Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_warning_button_background',
                        'desc'    => __('Background colour to use for the warning context.', 'my_theme-admin-td'),
                        'default' => '#f0ad4e',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Warning Context - Background Hover Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_warning_button_background_hover',
                        'desc'    => __('Background colour when user hovers over the warning context.', 'my_theme-admin-td'),
                        'default' => '#ed9c28',
                        'type'    => 'colour',
                    ),
                )
            ),
            'danger-button-colours-section' => array(
                'title'   => __('Danger Button Colours', 'my_theme-admin-td'),
                'header'  => __('Set the danger bootstrap context colours here. For example see buttons <a target="_blank" href="http://getbootstrap.com/css/#buttons">Bootstrap docs here</a>.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Danger Context - Text Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_danger_button_text',
                        'desc'    => __('Text colour to use for the danger context.', 'my_theme-admin-td'),
                        'default' => '#FFFFFF',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Danger Context - Background Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_danger_button_background',
                        'desc'    => __('Background colour to use for the danger context.', 'my_theme-admin-td'),
                        'default' => '#e74c3c',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Danger Context - Background Hover Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_danger_button_background_hover',
                        'desc'    => __('Background colour when user hovers over the danger context.', 'my_theme-admin-td'),
                        'default' => '#d62c1a',
                        'type'    => 'colour',
                    ),
                )
            ),
            'success-button-colours-section' => array(
                'title'   => __('Success Button Colours', 'my_theme-admin-td'),
                'header'  => __('Set the success bootstrap context colours here. For example see buttons <a target="_blank" href="http://getbootstrap.com/css/#buttons">Bootstrap docs here</a>.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Success Context - Text Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_success_button_text',
                        'desc'    => __('Text colour to use for the success context.', 'my_theme-admin-td'),
                        'default' => '#FFFFFF',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Success Context - Background Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_success_button_background',
                        'desc'    => __('Background colour to use for the success context.', 'my_theme-admin-td'),
                        'default' => '#a3c36f',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Success Context - Background Hover Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_success_button_background_hover',
                        'desc'    => __('Background colour when user hovers over the success context.', 'my_theme-admin-td'),
                        'default' => '#b7d685',
                        'type'    => 'colour',
                    ),
                )
            ),
            'info-button-colours-section' => array(
                'title'   => __('Info Button Colours', 'my_theme-admin-td'),
                'header'  => __('Set the info bootstrap context colours here. For example see buttons <a target="_blank" href="http://getbootstrap.com/css/#buttons">Bootstrap docs here</a>.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Info Context - Text Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_info_button_text',
                        'desc'    => __('Text colour to use for the info context.', 'my_theme-admin-td'),
                        'default' => '#FFF',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Info Context - Background Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_info_button_background',
                        'desc'    => __('Background colour to use for the info context.', 'my_theme-admin-td'),
                        'default' => '#5d89ac',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Info Context - Background Hover Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_info_button_background_hover',
                        'desc'    => __('Background colour when user hovers over the info context.', 'my_theme-admin-td'),
                        'default' => '#486f8e',
                        'type'    => 'colour',
                    ),
                )
            ),
            'icon-button-colours-section' => array(
                'title'   => __('Button Icon Colours', 'my_theme-admin-td'),
                'header'  => __('Set the colours used for icons when used in buttons.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Button Icon Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_button_icon',
                        'desc'    => __('Text colour to use for icons when used inside buttons.', 'my_theme-admin-td'),
                        'default' => '#FFFFFF',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Button Icon Background Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_button_icon_background',
                        'desc'    => __('Background colour to be used in fancy buttons.', 'my_theme-admin-td'),
                        'default' => '#FFF',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Button icon Background Opacity %', 'my_theme-admin-td'),
                        'desc'    => __('How see through is the overlay in percentage.', 'my_theme-admin-td'),
                        'id'      => 'default_css_button_icon_background_alpha',
                        'type'    => 'slider',
                        'default' => 20,
                        'attr'    => array(
                            'max'  => 100,
                            'min'  => 0,
                            'step' => 1
                        )
                    ),
                )
            ),
            'overlays-colours-section' => array(
                'title'   => __('Overlay Colours', 'my_theme-admin-td'),
                'header'  => __('Set the colours used in overlay areas.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Overlay Text', 'my_theme-admin-td'),
                        'id'      => 'default_css_overlay',
                        'desc'    => __('Text colour to text inside overlay areas.', 'my_theme-admin-td'),
                        'default' => '#FFF',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Overlay Background Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_overlay_background',
                        'desc'    => __('Background colour to be used in overlay areas.', 'my_theme-admin-td'),
                        'default' => '#000',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Overlay Background Opacity %', 'my_theme-admin-td'),
                        'desc'    => __('How see through is the overlay in percentage.', 'my_theme-admin-td'),
                        'id'      => 'default_css_overlay_background_alpha',
                        'type'    => 'slider',
                        'default' => 50,
                        'attr'    => array(
                            'max'  => 100,
                            'min'  => 0,
                            'step' => 1
                        )
                    ),

                )
            ),
            'magnific-colours-section' => array(
                'title'   => __('Magnific (image lightbox) Colours ', 'my_theme-admin-td'),
                'header'  => __('Set the colours used in overlay when an image preview is clicked.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Preview Background Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_magnific_background',
                        'desc'    => __('Background colour to be used in overlay areas.', 'my_theme-admin-td'),
                        'default' => '#FFF',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Preview Background Opacity %', 'my_theme-admin-td'),
                        'desc'    => __('How see through is the overlay in percentage.', 'my_theme-admin-td'),
                        'id'      => 'default_css_magnific_background_alpha',
                        'type'    => 'slider',
                        'default' => 95,
                        'attr'    => array(
                            'max'  => 100,
                            'min'  => 0,
                            'step' => 1
                        )
                    ),
                    array(
                        'name'    => __('Close Button Icon Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_magnific_close_icon',
                        'desc'    => __('Text colour to use for preview close button icon.', 'my_theme-admin-td'),
                        'default' => '#FFF',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Close Button Icon Background Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_magnific_close_icon_background',
                        'desc'    => __('Background colour to be used for preview close button.', 'my_theme-admin-td'),
                        'default' => '#000000',
                        'type'    => 'colour',
                    ),
                )
            ),
            'portfolio-colours-section' => array(
                'title'   => __('Portfolio Hover Colours ', 'my_theme-admin-td'),
                'header'  => __('Set the colours used in portfolios when you hover over an item.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Hover Text', 'my_theme-admin-td'),
                        'id'      => 'default_css_portfolio_hover_text',
                        'desc'    => __('Text colour to use inside hover .', 'my_theme-admin-td'),
                        'default' => '#FFF',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Hover Background Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_portfolio_hover_background',
                        'desc'    => __('Background colour to be used when user hovers over item.', 'my_theme-admin-td'),
                        'default' => '#000',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Hover Background Opacity %', 'my_theme-admin-td'),
                        'desc'    => __('How see through is the hover overlay in percentage.', 'my_theme-admin-td'),
                        'id'      => 'default_css_portfolio_hover_background_alpha',
                        'type'    => 'slider',
                        'default' => 50,
                        'attr'    => array(
                            'max'  => 100,
                            'min'  => 0,
                            'step' => 1
                        )
                    ),
                    array(
                        'name'    => __('Hover Button Icon Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_portfolio_hover_button_icon',
                        'desc'    => __('Icon colour to use for bottom buttons shown on hover.', 'my_theme-admin-td'),
                        'default' => '#FFF',
                        'type'    => 'colour',
                    ),
                )
            ),
            'go-to-top-colours-section' => array(
                'title'   => __('Go to top button Colours ', 'my_theme-admin-td'),
                'header'  => __('Set the colours used in go to top button that appears on scrolling a page.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Button Icon Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_gototop_icon',
                        'desc'    => __('Icon colour to use for go to top button.', 'my_theme-admin-td'),
                        'default' => '#FFF',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Button Background Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_gototop_background',
                        'desc'    => __('Background colour to use for go to top button.', 'my_theme-admin-td'),
                        'default' => '#000000',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Button Background Opacity %', 'my_theme-admin-td'),
                        'desc'    => __('How see through is the go to top button in percentage.', 'my_theme-admin-td'),
                        'id'      => 'default_css_gototop_background_alpha',
                        'type'    => 'slider',
                        'default' => 100,
                        'attr'    => array(
                            'max'  => 100,
                            'min'  => 0,
                            'step' => 1
                        )
                    ),
                )
            ),
            'loader-colours-section' => array(
                'title'   => __('Loader Colours ', 'my_theme-admin-td'),
                'header'  => __('Set the colours of the loader.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Loader Colour', 'my_theme-admin-td'),
                        'id'      => 'loader_color',
                        'desc'    => __('Color of the loader', 'my_theme-admin-td'),
                        'default' => '#82c9ed',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Loader background', 'my_theme-admin-td'),
                        'id'      => 'loader_bg',
                        'desc'    => __('Background colour of the loader.', 'my_theme-admin-td'),
                        'default' => '#ffffff',
                        'type'    => 'colour',
                        'format'  => 'rgba'
                    )
                )
            ),
            'slideshow-colours-section' => array(
                'title'   => __('Slideshow Colours ', 'my_theme-admin-td'),
                'header'  => __('Set the colours used in carousel and flexslider.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Text & Controls Colour', 'my_theme-admin-td'),
                        'id'      => 'default_css_slideshow_text',
                        'desc'    => __('Colour to use for slideshow text & control icons.', 'my_theme-admin-td'),
                        'default' => '#FFF',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Text Shadow', 'my_theme-admin-td'),
                        'id'      => 'default_css_slideshow_text_shadow',
                        'desc'    => __('Shadow colour to use on the slideshow captions.', 'my_theme-admin-td'),
                        'default' => '#000000',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Text Shadow Opacity %', 'my_theme-admin-td'),
                        'desc'    => __('Opacity of shadow used on slideshow captions.', 'my_theme-admin-td'),
                        'id'      => 'default_css_slideshow_text_shadow_alpha',
                        'type'    => 'slider',
                        'default' => 20,
                        'attr'    => array(
                            'max'  => 100,
                            'min'  => 0,
                            'step' => 1
                        )
                    ),
                )
            )
        )
    ));
    $pm_theme->register_option_page(array(
        'page_title' => __('Typography Settings', 'my_theme-admin-td'),
        'menu_title' => __('Typography', 'my_theme-admin-td'),
        'slug'       => THEME_SHORT . '-typography',
        'main_menu'  => false,
        'icon'       => 'tools',
        'stylesheets' => array(
            array(
                'handle' => 'typography-page',
                'src'    => PM_THEME_URI . 'vendor/interfused/interfused-typography/assets/css/typography-page.css',
                'deps'   => array('pm-typography-select2', 'thickbox'),
            ),
        ),
        'javascripts' => array(
            array(
                'handle' => 'typography-page',
                'src'    => PM_THEME_URI . 'vendor/interfused/interfused-typography/assets/javascripts/typography-page.js',
                'deps'   => array('jquery', 'underscore', 'thickbox', 'pm-typography-select2', 'jquery-ui-dialog'),
                'localize' => array(
                    'object_handle' => 'typographyPage',
                    'data' => array(
                        'ajaxurl' => admin_url('admin-ajax.php'),
                        'listNonce'  => wp_create_nonce('list-fontstack'),
                        'fontModal'  => wp_create_nonce('font-modal'),
                        'updateNonce'  => wp_create_nonce('update-fontstack'),
                        'defaultFontsNonce' => wp_create_nonce('default-fonts'),
                    )
                )
            ),
        ),
        // include a font stack option to enqueue select 2 ok
        'sections'   => array(
            'font-section' => array(
                'title'   => __('Fonts settings section', 'my_theme-admin-td'),
                'header'  => __('Setup Fonts settings here.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name' => __('Font Stack:', 'my_theme-admin-td'),
                        'id' => 'font_list',
                        'type' => 'fontlist',
                        'class-file' => PM_THEME_DIR . 'vendor/interfused/interfused-typography/inc/options/font-list.php',
                    ),
                )
            )
        )
    ));

    $pm_theme->register_option_page(array(
        'page_title' => __('Fonts', 'my_theme-admin-td'),
        'menu_title' => __('Fonts', 'my_theme-admin-td'),
        'slug'       => THEME_SHORT . '-fonts',
        'main_menu'  => false,
        'icon'       => 'tools',
        'sections'   => array(
            'google-fonts-section' => array(
                'title'   => __('Google Fonts', 'my_theme-admin-td'),
                // 'header'  => __('Setup Your Google Fonts Here.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'        => __('Fetch Google Fonts', 'my_theme-admin-td'),
                        'button-text' => __('Update Fonts', 'my_theme-admin-td'),
                        'id'          => 'google_update_fonts_button',
                        'type'        => 'button',
                        'desc'        => __('Click this button to fetch the latest fonts from Google and update your Google Fonts list.', 'my_theme-admin-td'),
                        'attr'        => array(
                            'id'    => 'google-update-fonts-button',
                            'class' => 'button button-primary'
                        ),
                        'javascripts' => array(
                            array(
                                'handle' => 'google-font-updater',
                                'src'    => PM_THEME_URI . 'vendor/interfused/interfused-typography/assets/javascripts/options/google-font-updater.js',
                                'deps'   => array('jquery'),
                                'localize' => array(
                                    'object_handle' => 'googleUpdate',
                                    'data' => array(
                                        'ajaxurl'   => admin_url('admin-ajax.php'),
                                        // generate a nonce with a unique ID "myajax-post-comment-nonce"
                                        // so that you can check it later when an AJAX request is sent
                                        'nonce'     => wp_create_nonce('google-fetch-fonts-nonce'),
                                    )
                                )
                            ),
                        ),
                    )
                )
            ),
            'typekit-provider-options' => array(
                'title'   => __('TypeKit Fonts', 'my_theme-admin-td'),
                'header'  => __('If you have a TypeKit account and would like to use it in your site.  Enter your TypeKit API key below and then click the Update your kits button.', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name' => __('Typekit API Token', 'my_theme-admin-td'),
                        'desc' => __('Add your typekit api token here', 'my_theme-admin-td'),
                        'id'   => 'typekit_api_token',
                        'type' => 'text',
                        'attr'        => array(
                            'id'    => 'typekit-api-key',
                        )
                    ),
                    array(
                        'name'        => __('TypeKit Kits', 'my_theme-admin-td'),
                        'button-text' => __('Update your kits', 'my_theme-admin-td'),
                        'desc' => __('Click this button to update your typography list with the kits available from your TypeKit account.', 'my_theme-admin-td'),
                        'id'          => 'typekit_kits_button',
                        'type'        => 'button',
                        'attr'        => array(
                            'id'    => 'typekit-kits-button',
                            'class' => 'button button-primary'
                        ),
                        'javascripts' => array(
                            array(
                                'handle' => 'typekit-kit-updater',
                                'src'    => PM_THEME_URI . 'vendor/interfused/interfused-typography/assets/javascripts/options/typekit-updater.js',
                                'deps'   => array('jquery' ),
                                'localize' => array(
                                    'object_handle' => 'typekitUpdate',
                                    'data' => array(
                                        'ajaxurl'   => admin_url('admin-ajax.php'),
                                        'nonce'     => wp_create_nonce('typekit-kits-nonce'),
                                    )
                                )
                            ),
                        ),
                    )
                )
            )
        )
    ));

/*
    $pm_theme->register_option_page( array(
        'page_title' => __('Update', 'my_theme-admin-td'),
        'menu_title' => __('Update', 'my_theme-admin-td'),
        'slug'       => THEME_SHORT . '-update',
        'main_menu'  => false,
        'icon'       => 'tools',
        'stylesheets' => array(
            array(
                'handle' => 'envatoUpdateStyle',
                'src'    => PM_THEME_URI . 'vendor/interfused/interfused-updater/assets/stylesheets/theme-updater.css',
                'deps'   => array(),
            ),
        ),
        'sections' => array()
    ));

    $pm_theme->register_option_page(array(
        'page_title' => __('Plugins', 'my_theme-admin-td'),
        'menu_title' => __('Plugins', 'my_theme-admin-td'),
        'slug'       => THEME_SHORT . '-plugins',
        'main_menu'  => false,
        'stylesheets' => array(
            array(
                'handle' => 'envatoPluginStyle',
                'src'    => PM_THEME_URI . 'vendor/interfused/interfused-plugins/assets/stylesheets/interfused-plugins.css',
                'deps'   => array(),
            ),
        ),
        'sections'   => array()
    ));
	*/
}