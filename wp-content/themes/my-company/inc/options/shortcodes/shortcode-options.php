<?php
/**
 * Sets up all theme shortcode options
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */

// get available menus for menu shortcode
$menus_data = get_terms('nav_menu');
$menus = array();
$menus[''] = __('Please select a menu', 'my_theme-admin-td');
foreach ($menus_data as $single_menu) {
    $menus[$single_menu->slug] = $single_menu->name;
}

return array(
    // SECTION
    'vc_row' => array(
        'shortcode'     => 'vc_row',
        'title'         => __('Row', 'my_theme-admin-td'),
        'desc'          => __('A Horizontal section to add content to.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => true,
        'sections'      => array(
            array(
                'title' => __('Section', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/section-options.php'
            )
        )
    ),
    'vc_row_inner' => array(
        'shortcode'     => 'vc_row_inner',
        'title'         => __('Row', 'my_theme-admin-td'),
        'desc'          => __('A Horizontal section to add content to.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => true,
        'sections'      => array(
            array(
                'title' => __('General', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Extra Classes', 'my_theme-admin-td'),
                        'desc'    => __('Add any extra classes you need to add to this column. ( space separated )', 'my_theme-admin-td'),
                        'id'      => 'extra_classes',
                        'default'     =>  '',
                        'type'        => 'text',
                    ),
                )
            )
        )
    ),
    // SECTION
    'vc_column' => array(
        'shortcode'     => 'vc_column',
        'title'         => __('Column', 'my_theme-admin-td'),
        'desc'          => __('Column shortcode for use inside a row.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => true,
        'sections'      => array(
            array(
                'title' => __('General', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Column Alignment', 'my_theme-admin-td'),
                        'id'        => 'align',
                        'type'      => 'select',
                        'default'   => 'default',
                        'options' => array(
                            'Default' => __('Default (no class)', 'my_theme-admin-td'),
                            'left'    => __('Left', 'my_theme-admin-td'),
                            'center'  => __('Center', 'my_theme-admin-td'),
                            'right'   => __('Right', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Sets the alignment items in the column.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Column Background Color', 'my_theme-admin-td'),
                        'desc'      => __('Set the background color of the column', 'my_theme-admin-td'),
                        'id'        => 'column_colour',
                        'type'      => 'colour',
                        'format'    => 'rgba',
                        'default'   => '',
                        'attr'      => array(
                            'class' => 'allow-empty'
                        )
                    ),
                    array(
                        'name'      => __('Small screens Column Alignment', 'my_theme-admin-td'),
                        'id'        => 'align_sm',
                        'type'      => 'select',
                        'default'   => 'default',
                        'options' => array(
                            'Default' => __('Default (no class)', 'my_theme-admin-td'),
                            'left'    => __('Left', 'my_theme-admin-td'),
                            'center'  => __('Center', 'my_theme-admin-td'),
                            'right'   => __('Right', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Overrides the alignment in the column on small screens.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Extra Classes', 'my_theme-admin-td'),
                        'desc'    => __('Add any extra classes you need to add to this column. ( space separated )', 'my_theme-admin-td'),
                        'id'      => 'extra_classes',
                        'default'     =>  '',
                        'type'        => 'text',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/animation-options.php'
            )
        )
    ),
    'heading' => array(
        'shortcode'     => 'heading',
        'title'         => __('Heading', 'my_theme-admin-td'),
        'desc'          => __('Creates a heading and optional sub heading.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => true,
        'sections'      => array(
            array(
                'title' => __('Header', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/heading-options.php'
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/animation-options.php'
            )
        )
    ),
    'service' => array(
        'shortcode'     => 'service',
        'title'         => __('Single Service', 'my_theme-admin-td'),
        'desc'          => __('Displays a single service.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Services', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Service', 'my_theme-admin-td'),
                        'desc'    => __('Select a service post to show.', 'my_theme-admin-td'),
                        'id'      => 'service',
                        'default' =>  '',
                        'admin_label' => true,
                        'type'    => 'select',
                        'options' => 'custom_post_type',
                        'post_type' => 'pm_service'
                    ),
                    array(
                        'name'      =>  __('Image Shape', 'my_theme-admin-td'),
                        'id'        => 'image_shape',
                        'type'      => 'select',
                        'admin_label' => true,
                        'options'   =>  array(
                            'round'  => __('Circle', 'my_theme-admin-td'),
                            'square' => __('Square', 'my_theme-admin-td'),
                            'rect'   => __('Rectangle', 'my_theme-admin-td'),
                        ),
                        'default'   => 'round',
                    ),
                    array(
                        'name'      =>  __('Shape Size', 'my_theme-admin-td'),
                        'id'        => 'image_size',
                        'type'      => 'select',
                        'options'   =>  array(
                            'big'    => __('Big', 'my_theme-admin-td'),
                            'huge'   => __('Huge', 'my_theme-admin-td'),
                            'normal' => __('Normal', 'my_theme-admin-td'),
                            'medium' => __('Medium', 'my_theme-admin-td'),
                            'small'  => __('Small', 'my_theme-admin-td'),
                        ),
                        'default'   => 'big',
                    ),
                    array(
                        'name'      => __('Icon Color', 'my_theme-admin-td'),
                        'desc'      => __('Set the color of the icon ( svg & font awesome icons )', 'my_theme-admin-td'),
                        'id'        => 'icon_colour',
                        'type'      => 'colour',
                        'default'   => '#000000',
                    ),
                    array(
                        'name'    => __('Icon Animation', 'my_theme-admin-td'),
                        'desc'    => __('Icon Animation that will occur when you hover over the service shape.', 'my_theme-admin-td'),
                        'id'      => 'icon_animation',
                        'type'    => 'select',
                        'default' => 'bounce',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/animations.php'
                    ),
                    array(
                        'name'      =>  __('Hover effect', 'my_theme-admin-td'),
                        'id'        => 'icon_effect',
                        'desc'      => __('Change the icon/background colors on hover', 'my_theme-admin-td'),
                        'type'      => 'select',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default'   => 'on',
                    ),
                    array(
                        'name'      => __('Background Color', 'my_theme-admin-td'),
                        'desc'      => __('Set the color shape background.', 'my_theme-admin-td'),
                        'id'        => 'background_colour',
                        'type'      => 'colour',
                        'default'   => '#e9e9e9',
                    ),
                    array(
                        'name'      => __('Shape Background Grid', 'my_theme-admin-td'),
                        'desc'      => __('Adds a grid pattern to the shape background.', 'my_theme-admin-td'),
                        'id'        => 'overlay_grid',
                        'type'      => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'      => __('Show Image', 'my_theme-admin-td'),
                        'id'        => 'show_image',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show'  => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Link Image', 'my_theme-admin-td'),
                        'id'        => 'link_image',
                        'type'      => 'select',
                        'default'   =>  'on',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Show Titles', 'my_theme-admin-td'),
                        'id'        => 'show_title',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Link Title', 'my_theme-admin-td'),
                        'id'        => 'link_title',
                        'type'      => 'select',
                        'default'   =>  'on',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Link Font Size', 'my_theme-admin-td'),
                        'desc'    => __('Choose the size of the font to use in the title', 'my_theme-admin-td'),
                        'id'      => 'title_size',
                        'type'    => 'select',
                        'default'   =>  'normal',
                        'options' => array(
                            'normal'=> __('Normal', 'my_theme-admin-td'),
                            'big'   => __('Big (36px)', 'my_theme-admin-td'),
                            'bigger'=> __('Bigger (48px)', 'my_theme-admin-td'),
                            'super' => __('Super (60px)', 'my_theme-admin-td'),
                            'hyper' => __('Hyper (96px)', 'my_theme-admin-td'),
                        ),
                        'default' => 'normal',
                    ),
                    array(
                        'name'    => __('Title font Weight', 'my_theme-admin-td'),
                        'desc'    => __('Choose the weight of the font to use in the title', 'my_theme-admin-td'),
                        'id'      => 'title_weight',
                        'type'    => 'select',
                        'default'   =>  'regular',
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
                        'name'    => __('Underline', 'my_theme-admin-td'),
                        'desc'    => __('Underline the title.', 'my_theme-admin-td'),
                        'id'      => 'title_underline',
                        'type'    => 'select',
                        'default'   =>  'no-bordered',
                        'options' => array(
                            'bordered'    => __('Underline', 'my_theme-admin-td'),
                            'no-bordered' => __('No Underline', 'my_theme-admin-td')
                        ),
                    ),
                    array(
                        'name'    => __('Underline Size', 'my_theme-admin-td'),
                        'desc'    => __('Size of the underline.', 'my_theme-admin-td'),
                        'id'      => 'title_underline_size',
                        'default' => 'bordered-normal',
                        'type'    => 'radio',
                        'options' => array(
                            'bordered-normal' => __('Normal (72px)', 'my_theme-admin-td'),
                            'bordered-small' => __('Small (48px)', 'my_theme-admin-td'),
                        )
                    ),
                    array(
                        'name'      => __('Show Excerpt', 'my_theme-admin-td'),
                        'id'        => 'show_excerpt',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Excerpt & More Text Alignment', 'my_theme-admin-td'),
                        'id'        => 'align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'default'   => __('Default alignment', 'my_theme-admin-td'),
                            'left'   => __('Left', 'my_theme-admin-td'),
                            'center' => __('Center', 'my_theme-admin-td'),
                            'right'  => __('Right', 'my_theme-admin-td'),
                            'justify'  => __('Justify', 'my_theme-admin-td')
                        ),
                        'desc'    => __('Sets the text alignment of the excerpt text and the read more link.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Show Readmore Link', 'my_theme-admin-td'),
                        'id'        => 'show_readmore',
                        'type'      => 'select',
                        'default'   =>  'hide',
                        'options' => array(
                            'hide' => __('Hide', 'my_theme-admin-td'),
                            'show' => __('Show', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Readmore Link Text', 'my_theme-admin-td'),
                        'id'      => 'readmore_text',
                        'type'    => 'text',
                        'default' => __('Read more', 'my_theme-admin-td'),
                        'desc'    => __('Customize your readmore link', 'my_theme-admin-td'),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'services' =>array(
        'shortcode'     => 'services',
        'title'         => __('Services', 'my_theme-admin-td'),
        'desc'          => __('Displays a horizontal / vertical list of services.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Services', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Choose a category', 'my_theme-admin-td'),
                        'desc'    => __('Category of services to show', 'my_theme-admin-td'),
                        'id'      => 'category',
                        'default' =>  '',
                        'admin_label' => true,
                        'type'    => 'select',
                        'options' => 'taxonomy',
                        'taxonomy' => 'pm_service_category',
                        'blank_label' => __('All Categories', 'my_theme-admin-td')
                    ),
                    array(
                        'name'    => __('Services Count', 'my_theme-admin-td'),
                        'desc'    => __('Number of services to show(set to 0 to show all)', 'my_theme-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'default' => '3',
                        'admin_label' => true,
                        'attr'    => array(
                            'max'  => 30,
                            'min'  => 0,
                            'step' => 1
                        )
                    ),
                    array(
                        'name'    => __('Columns (horizontal style)', 'my_theme-admin-td'),
                        'desc'    => __('Number of columns to show the services in', 'my_theme-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'select',
                        'options' => array(
                            '2' => __('Two columns', 'my_theme-admin-td'),
                            '3' => __('Three columns', 'my_theme-admin-td'),
                            '4' => __('Four columns', 'my_theme-admin-td'),
                            '6' => __('Six columns', 'my_theme-admin-td'),
                        ),
                        'default' => '3',
                    ),
                    array(
                        'name'      =>  __('Image Shape', 'my_theme-admin-td'),
                        'id'        => 'image_shape',
                        'type'      => 'select',
                        'admin_label' => true,
                        'options'   =>  array(
                            'round'  => __('Circle', 'my_theme-admin-td'),
                            'square' => __('Square', 'my_theme-admin-td'),
                            'rect'   => __('Rectangle', 'my_theme-admin-td'),
                        ),
                        'default'   => 'round',
                    ),
                    array(
                        'name'      =>  __('Shape Size', 'my_theme-admin-td'),
                        'id'        => 'image_size',
                        'type'      => 'select',
                        'options'   =>  array(
                            'big'    => __('Big', 'my_theme-admin-td'),
                            'huge'   => __('Huge', 'my_theme-admin-td'),
                            'normal' => __('Normal', 'my_theme-admin-td'),
                            'medium' => __('Medium', 'my_theme-admin-td'),
                            'small'  => __('Small', 'my_theme-admin-td'),
                        ),
                        'default'   => 'big',
                    ),
                    array(
                        'name'      => __('Icon Color', 'my_theme-admin-td'),
                        'desc'      => __('Set the color of the icon ( svg & font awesome icons )', 'my_theme-admin-td'),
                        'id'        => 'icon_colour',
                        'type'      => 'colour',
                        'default'   => '#000000',
                    ),
                    array(
                        'name'    => __('Icon Animation', 'my_theme-admin-td'),
                        'desc'    => __('Icon Animation that will occur when you hover over the service shape.', 'my_theme-admin-td'),
                        'id'      => 'icon_animation',
                        'type'    => 'select',
                        'default' => 'bounce',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/animations.php'
                    ),
                    array(
                        'name'      =>  __('Hover effect', 'my_theme-admin-td'),
                        'id'        => 'icon_effect',
                        'desc'      => __('Change the icon/background colors on hover', 'my_theme-admin-td'),
                        'type'      => 'select',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default'   => 'on',
                    ),
                    array(
                        'name'      => __('Background Color', 'my_theme-admin-td'),
                        'desc'      => __('Set the color shape background.', 'my_theme-admin-td'),
                        'id'        => 'background_colour',
                        'type'      => 'colour',
                        'default'   => '#e9e9e9',
                    ),
                    array(
                        'name'      => __('Shape Background Grid', 'my_theme-admin-td'),
                        'desc'      => __('Adds a grid pattern to the shape background.', 'my_theme-admin-td'),
                        'id'        => 'overlay_grid',
                        'type'      => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'      => __('Show Image', 'my_theme-admin-td'),
                        'id'        => 'show_image',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show'  => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Link Image', 'my_theme-admin-td'),
                        'id'        => 'link_image',
                        'type'      => 'select',
                        'default'   =>  'on',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Show Titles', 'my_theme-admin-td'),
                        'id'        => 'show_title',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Link Title', 'my_theme-admin-td'),
                        'id'        => 'link_title',
                        'type'      => 'select',
                        'default'   =>  'on',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Link Font Size', 'my_theme-admin-td'),
                        'desc'    => __('Choose the size of the font to use in the title', 'my_theme-admin-td'),
                        'id'      => 'title_size',
                        'type'    => 'select',
                        'default'   =>  'normal',
                        'options' => array(
                            'normal'=> __('Normal', 'my_theme-admin-td'),
                            'big'   => __('Big (36px)', 'my_theme-admin-td'),
                            'bigger'=> __('Bigger (48px)', 'my_theme-admin-td'),
                            'super' => __('Super (60px)', 'my_theme-admin-td'),
                            'hyper' => __('Hyper (96px)', 'my_theme-admin-td'),
                        ),
                        'default' => 'normal',
                    ),
                    array(
                        'name'    => __('Title font Weight', 'my_theme-admin-td'),
                        'desc'    => __('Choose the weight of the font to use in the title', 'my_theme-admin-td'),
                        'id'      => 'title_weight',
                        'type'    => 'select',
                        'default'   =>  'regular',
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
                        'name'    => __('Underline', 'my_theme-admin-td'),
                        'desc'    => __('Underline the title.', 'my_theme-admin-td'),
                        'id'      => 'title_underline',
                        'type'    => 'select',
                        'default'   =>  'no-bordered',
                        'options' => array(
                            'bordered'    => __('Underline', 'my_theme-admin-td'),
                            'no-bordered' => __('No Underline', 'my_theme-admin-td')
                        ),
                    ),
                    array(
                        'name'    => __('Underline Size', 'my_theme-admin-td'),
                        'desc'    => __('Size of the underline.', 'my_theme-admin-td'),
                        'id'      => 'title_underline_size',
                        'default' => 'bordered-normal',
                        'type'    => 'radio',
                        'options' => array(
                            'bordered-normal' => __('Normal (72px)', 'my_theme-admin-td'),
                            'bordered-small' => __('Small (48px)', 'my_theme-admin-td'),
                        )
                    ),
                    array(
                        'name'      => __('Show Excerpt', 'my_theme-admin-td'),
                        'id'        => 'show_excerpt',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Excerpt & More Text Alignment', 'my_theme-admin-td'),
                        'id'        => 'align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'default'   => __('Default alignment', 'my_theme-admin-td'),
                            'left'   => __('Left', 'my_theme-admin-td'),
                            'center' => __('Center', 'my_theme-admin-td'),
                            'right'  => __('Right', 'my_theme-admin-td'),
                            'justify'  => __('Justify', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Sets the text alignment of the excerpt text and the read more link.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Show Readmore Link', 'my_theme-admin-td'),
                        'id'        => 'show_readmore',
                        'type'      => 'select',
                        'default'   =>  'hide',
                        'options' => array(
                            'hide' => __('Hide', 'my_theme-admin-td'),
                            'show' => __('Show', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Readmore Link Text', 'my_theme-admin-td'),
                        'id'      => 'readmore_text',
                        'type'    => 'text',
                        'default' => __('Read more', 'my_theme-admin-td'),
                        'desc'    => __('Customize your readmore link', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'        => __('Order by', 'my_theme-admin-td'),
                        'desc'        => __('Choose the way service items will be ordered.', 'my_theme-admin-td'),
                        'id'          => 'orderby',
                        'type'        => 'select',
                        'default'     =>  'none',
                        'options'     => array(
                            'none'        => __('None', 'my_theme-admin-td'),
                            'title'       => __('Title', 'my_theme-admin-td'),
                            'date'        => __('Date', 'my_theme-admin-td'),
                            'ID'          => __('ID', 'my_theme-admin-td'),
                            'author'      => __('Author', 'my_theme-admin-td'),
                            'modified'    => __('Last Modified', 'my_theme-admin-td'),
                            'menu_order'  => __('Menu Order', 'my_theme-admin-td'),
                            'rand'        => __('Random', 'my_theme-admin-td'),
                        )
                    ),
                    array(
                        'name'        => __('Order', 'my_theme-admin-td'),
                        'desc'        => __('Choose how services will be ordered.', 'my_theme-admin-td'),
                        'id'          => 'order',
                        'type'        => 'select',
                        'default'     =>  'ASC',
                        'options'     => array(
                            'ASC'     => __('Ascending', 'my_theme-admin-td'),
                            'DESC'    => __('Descending', 'my_theme-admin-td'),
                        )
                    )
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
     // TESTIMONIALS SHORTCODE SECTION
    'testimonials' => array(
        'shortcode' => 'testimonials',
        'title'     => __('Testimonials', 'my_theme-admin-td'),
        'desc'      => __('Displays a list / slideshow of testimonials.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'   => array(
            array(
                'title' => __('Testimonials', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Choose a group', 'my_theme-admin-td'),
                        'desc'    => __('Group of testimonials to show', 'my_theme-admin-td'),
                        'id'      => 'group',
                        'default' =>  '',
                        'type'    => 'select',
                        'admin_label' => true,
                        'admin_label' => true,
                        'options' => 'taxonomy',
                        'taxonomy' => 'pm_testimonial_group',
                        'blank_label' => __('All Testimonials', 'my_theme-admin-td')
                    ),
                    array(
                        'name'    => __('Number Of Testimonials', 'my_theme-admin-td'),
                        'desc'    => __('Number of Testimonials to display(set to 0 to show all)', 'my_theme-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'admin_label' => true,
                        'default' => '3',
                        'attr'    => array(
                            'max'   => 10,
                            'min'   => 0,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Show avatars', 'my_theme-admin-td'),
                        'desc'    => __('Display the featured image as avatar', 'my_theme-admin-td'),
                        'id'      => 'show_image',
                        'type'    => 'select',
                        'default' => 'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Speed', 'my_theme-admin-td'),
                        'desc'      => __('Set the speed of the slideshow cycling, in milliseconds', 'my_theme-admin-td'),
                        'id'        => 'speed',
                        'type'      => 'slider',
                        'default'   => '7000',
                        'attr'      => array(
                            'max'       => 15000,
                            'min'       => 2000,
                            'step'      => 1000
                        )
                    ),
                    array(
                        'name'    => __('Randomize', 'my_theme-admin-td'),
                        'desc'    => __('Randomize the ordering of the testimonials', 'my_theme-admin-td'),
                        'id'      => 'randomize',
                        'type'    => 'select',
                        'default' => 'off',
                        'options' => array(
                            'on'   => __('On', 'my_theme-admin-td'),
                            'off'  => __('Off', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Text Align', 'my_theme-admin-td'),
                        'id'        => 'text_align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'left'   => __('Left', 'my_theme-admin-td'),
                            'center' => __('Center', 'my_theme-admin-td'),
                            'right'  => __('Right', 'my_theme-admin-td'),
                            'justify'  => __('Justify', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Sets the text alignment of the blockquote and citation of the testimonial', 'my_theme-admin-td'),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
     // TESTIMONIALS LIST SHORTCODE SECTION
    'testimonials_list' => array(
        'shortcode' => 'testimonials_list',
        'title'     => __('Testimonials List', 'my_theme-admin-td'),
        'desc'      => __('Displays a list of testimonials.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'   => array(
            array(
                'title' => __('Testimonials', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Choose a group', 'my_theme-admin-td'),
                        'desc'    => __('Group of testimonials to show', 'my_theme-admin-td'),
                        'id'      => 'group',
                        'default' =>  '',
                        'type'    => 'select',
                        'admin_label' => true,
                        'admin_label' => true,
                        'options' => 'taxonomy',
                        'taxonomy' => 'pm_testimonial_group',
                        'blank_label' => __('All Testimonials', 'my_theme-admin-td')
                    ),
                    array(
                        'name'    => __('Number Of Testimonials', 'my_theme-admin-td'),
                        'desc'    => __('Number of Testimonials to display(set to 0 to show all)', 'my_theme-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'admin_label' => true,
                        'default' => '3',
                        'attr'    => array(
                            'max'   => 10,
                            'min'   => 0,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('List Columns', 'my_theme-admin-td'),
                        'desc'    => __('Number of columns to show testimonials in', 'my_theme-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'select',
                        'admin_label' => true,
                        'options' => array(
                            '2' => __('Two columns', 'my_theme-admin-td'),
                            '3' => __('Three columns', 'my_theme-admin-td'),
                            '4' => __('Four columns', 'my_theme-admin-td'),
                            '6' => __('Six columns', 'my_theme-admin-td'),
                        ),
                        'default' => '3',
                    ),
                    array(
                        'name'    => __('Show avatars', 'my_theme-admin-td'),
                        'desc'    => __('Display the featured image as avatar', 'my_theme-admin-td'),
                        'id'      => 'show_image',
                        'type'    => 'select',
                        'default' => 'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Animation Timing', 'my_theme-admin-td'),
                        'desc'    => __('Will animate all testimonials at once or each one individually .', 'my_theme-admin-td'),
                        'id'      => 'testimonial_scroll_animation_timing',
                        'type'    => 'select',
                        'default' => 'staggered',
                        'options' => array(
                            'all-same'   => __('All items appear at same time', 'my_theme-admin-td'),
                            'staggered'  => __('Staggered over Animation Delay', 'my_theme-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
     /* Staff Shortcodes */
    'staff_list' =>  array(
        'shortcode'     => 'staff_list',
        'title'         => __('Staff List', 'my_theme-admin-td'),
        'desc'          => __('Displays a list of staff members in columns.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Staff members list', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Choose a department', 'my_theme-admin-td'),
                        'desc'    => __('Populate your list from a department', 'my_theme-admin-td'),
                        'id'      => 'department',
                        'default' =>  '',
                        'type'    => 'select',
                        'admin_label' => true,
                        'options' => 'taxonomy',
                        'taxonomy' => 'pm_staff_department',
                        'blank_label' => __('Select a department', 'my_theme-admin-td')
                    ),
                    array(
                        'name'    => __('Number Of members', 'my_theme-admin-td'),
                        'desc'    => __('Number of members to display(set to 0 to show all)', 'my_theme-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'admin_label' => true,
                        'default' => '3',
                        'attr'    => array(
                            'max'  => 30,
                            'min'  => 0,
                            'step' => 1
                        )
                    ),
                    array(
                        'name'    => __('List Columns', 'my_theme-admin-td'),
                        'desc'    => __('Number of columns to show staff in', 'my_theme-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'select',
                        'admin_label' => true,
                        'options' => array(
                            '2' => __('Two columns', 'my_theme-admin-td'),
                            '3' => __('Three columns', 'my_theme-admin-td'),
                            '4' => __('Four columns', 'my_theme-admin-td'),
                            '6' => __('Six columns', 'my_theme-admin-td'),
                        ),
                        'default' => '3',
                    ),
                    array(
                        'name'    => __('Show Position', 'my_theme-admin-td'),
                        'desc'    => __('Display the staff position below the name', 'my_theme-admin-td'),
                        'id'      => 'show_position',
                        'type'    => 'select',
                        'default' => 'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Show Social Links', 'my_theme-admin-td'),
                        'id'        => 'show_social',
                        'type'      => 'select',
                        'default'   => 'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Item image size', 'my_theme-admin-td'),
                        'desc'    => __('Choose the size of images that will be loaded in the staff list', 'my_theme-admin-td'),
                        'id'      => 'item_size',
                        'type'    => 'select',
                        'default' => 'full',
                        'options' => array(
                            'thumbnail'       => __('Thumbnail', 'my_theme-admin-td'),
                            'medium'          => __('Medium', 'my_theme-admin-td'),
                            'large'           => __('Large', 'my_theme-admin-td'),
                            'full'            => __('Full', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Hover Overlay Type', 'my_theme-admin-td'),
                        'id'        => 'item_overlay',
                        'type'      => 'select',
                        'default'   => 'strip',
                        'options' => array(
                            'icon'         => __('Show Icon', 'my_theme-admin-td'),
                            'caption'      => __('Show Title & Caption', 'my_theme-admin-td'),
                            'strip'        => __('Show Title Strip & Caption', 'my_theme-admin-td'),
                            'none'         => __('No Hover Overlay', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Choose the type of hover overlay you would like to appear.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Overlay Link Type', 'PLUGIN_TD'),
                        'desc'    => __('Select the link type to use for the item.', 'PLUGIN_TD'),
                        'id'      => 'item_link_type',
                        'type'    => 'select',
                        'default' => 'magnific',
                        'options' => array(
                            'magnific' => __('Magnific', 'PLUGIN_TD'),
                            'item'     => __('Link', 'PLUGIN_TD'),
                            'no-link'  => __('No Link ', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'    => __('Item Show Captions Below', 'my_theme-admin-td'),
                        'desc'    => __('Select a style to use for the staff list items.', 'my_theme-admin-td'),
                        'id'      => 'item_captions_below',
                        'type'    => 'select',
                        'default' => 'hide',
                        'options' => array(
                            'hide' => __('Image Only', 'my_theme-admin-td'),
                            'show' => __('Image + Captions Below', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Link Caption Title Below', 'my_theme-admin-td'),
                        'desc'    => __('Makes the Captions Below Title a link.', 'my_theme-admin-td'),
                        'id'      => 'captions_below_link_type',
                        'type'    => 'select',
                        'default' => 'item',
                        'options' => array(
                            'magnific' => __('Magnific', 'PLUGIN_TD'),
                            'item'     => __('Link', 'PLUGIN_TD'),
                            'no-link'  => __('No Link ', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'      => __('Item Caption Horizontal Alignment', 'my_theme-admin-td'),
                        'id'        => 'item_caption_align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'center' => __('Center', 'my_theme-admin-td'),
                            'left'   => __('Left', 'my_theme-admin-td'),
                            'right'  => __('Right', 'my_theme-admin-td'),
                            'justify' => __('Justify', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('The text alignment of the caption text / title.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Caption Vertical Alignment', 'my_theme-admin-td'),
                        'id'        => 'item_caption_vertical',
                        'type'      => 'select',
                        'default'   => 'middle',
                        'options' => array(
                            'middle' => __('Middle', 'my_theme-admin-td'),
                            'top'    => __('Top', 'my_theme-admin-td'),
                            'bottom' => __('Bottom', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Vertical alignment of the caption title and text.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Hover Animation', 'my_theme-admin-td'),
                        'id'        => 'item_overlay_animation',
                        'type'        => 'select',
                        'default'     => 'fade-in',
                        'options'     => array(
                            'fade-in'     => __('Fade in', 'my_theme-admin-td'),
                            'fade-in from-top'    => __('Fade From Top', 'my_theme-admin-td'),
                            'fade-in from-bottom' => __('Fade From Bottom', 'my_theme-admin-td'),
                            'fade-in from-left'   => __('Fade From Left', 'my_theme-admin-td'),
                            'fade-in from-right'  => __('Fade From Right', 'my_theme-admin-td'),
                            'fade-none'        => __('No Animation', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('What animation will be used to reveal the image hover overlay.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Image Hover Effects Filter', 'my_theme-admin-td'),
                        'id'      => 'item_hover_filter',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => array(
                            'none'      => __('None', 'my_theme-admin-td'),
                            'sepia'     => __('Sepia', 'my_theme-admin-td'),
                            'grayscale' => __('Grayscale', 'my_theme-admin-td'),
                            'blur'      => __('Blur', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Effects filter to apply to the image on hover.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Effects Filter Behaviour', 'my_theme-admin-td'),
                        'id'      => 'hover_filter_invert',
                        'type'    => 'select',
                        'default' => 'image-filter-onhover',
                        'options' => array(
                            'image-filter-onhover'    => __('Apply Filter On Hover', 'my_theme-admin-td'),
                            'image-filter-invert'     => __('Apply Filter On Hover Out', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('When to apply the Hover Effects Filter.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Grid', 'my_theme-admin-td'),
                        'desc'      => __('Grid pattern to apply over the image on hover.', 'my_theme-admin-td'),
                        'id'        => 'item_overlay_grid',
                        'type'      => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'      => __('Item Overlay Icon', 'my_theme-admin-td'),
                        'desc'      => __('Icon to show on the hover overlay.', 'my_theme-admin-td'),
                        'id'        => 'item_overlay_icon',
                        'type'    => 'select',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/svgs.php',
                        'default' => 'plus',
                    ),
                    array(
                        'name'    => __('Animation Timing', 'my_theme-admin-td'),
                        'desc'    => __('Will animate all staff at once or each one individually .', 'my_theme-admin-td'),
                        'id'      => 'item_scroll_animation_timing',
                        'type'    => 'select',
                        'default' => 'staggered',
                        'options' => array(
                            'all-same'   => __('All items appear at same time', 'my_theme-admin-td'),
                            'staggered'  => __('Staggered over Animation Delay', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'        => __('Order by', 'my_theme-admin-td'),
                        'desc'        => __('Choose the way staff items will be ordered.', 'my_theme-admin-td'),
                        'id'          => 'orderby',
                        'type'        => 'select',
                        'default'     =>  'none',
                        'options'     => array(
                            'none'        => __('None', 'my_theme-admin-td'),
                            'title'       => __('Title', 'my_theme-admin-td'),
                            'date'        => __('Date', 'my_theme-admin-td'),
                            'ID'          => __('ID', 'my_theme-admin-td'),
                            'author'      => __('Author', 'my_theme-admin-td'),
                            'modified'    => __('Last Modified', 'my_theme-admin-td'),
                            'menu_order'  => __('Menu Order', 'my_theme-admin-td'),
                            'rand'        => __('Random', 'my_theme-admin-td'),
                        )
                    ),
                    array(
                        'name'        => __('Order', 'my_theme-admin-td'),
                        'desc'        => __('Choose how staff will be ordered.', 'my_theme-admin-td'),
                        'id'          => 'order',
                        'type'        => 'select',
                        'default'     =>  'ASC',
                        'options'     => array(
                            'ASC'     => __('Ascending', 'my_theme-admin-td'),
                            'DESC'    => __('Descending', 'my_theme-admin-td'),
                        )
                    )
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        ),
    ),
    'staff_featured' => array(
        'shortcode'     => 'staff_featured',
        'title'         => __('Single Staff', 'my_theme-admin-td'),
        'desc'          => __('Displays a section about one member of staff.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Staff', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Featured member', 'my_theme-admin-td'),
                        'desc'    => __('Select the staff member that will be featured', 'my_theme-admin-td'),
                        'id'      => 'member',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'staff_featured',
                    ),
                    array(
                        'name'    => __('Show Position', 'my_theme-admin-td'),
                        'desc'    => __('Display the staff position below the name', 'my_theme-admin-td'),
                        'id'      => 'show_position',
                        'type'    => 'select',
                        'default' => 'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Show Social Links', 'my_theme-admin-td'),
                        'id'        => 'show_social',
                        'type'      => 'select',
                        'default'   => 'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Item image size', 'my_theme-admin-td'),
                        'desc'    => __('Choose the size of the image that will be loaded in the single-staff', 'my_theme-admin-td'),
                        'id'      => 'item_size',
                        'type'    => 'select',
                        'default' => 'full',
                        'options' => array(
                            'thumbnail'       => __('Thumbnail', 'my_theme-admin-td'),
                            'medium'          => __('Medium', 'my_theme-admin-td'),
                            'large'           => __('Large', 'my_theme-admin-td'),
                            'full'            => __('Full', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Hover Overlay Type', 'my_theme-admin-td'),
                        'id'        => 'item_overlay',
                        'type'      => 'select',
                        'default'   => 'strip',
                        'options' => array(
                            'icon'         => __('Show Icon', 'my_theme-admin-td'),
                            'caption'      => __('Show Title & Caption', 'my_theme-admin-td'),
                            'strip'        => __('Show Title Strip & Caption', 'my_theme-admin-td'),
                            'none'         => __('No Hover Overlay', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Choose the type of hover overlay you would like to appear.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Overlay Link Type', 'PLUGIN_TD'),
                        'desc'    => __('Select the link type to use for the item.', 'PLUGIN_TD'),
                        'id'      => 'item_link_type',
                        'type'    => 'select',
                        'default' => 'magnific',
                        'options' => array(
                            'magnific' => __('Magnific', 'PLUGIN_TD'),
                            'item'     => __('Link', 'PLUGIN_TD'),
                            'no-link'  => __('No Link ', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'    => __('Item Show Captions Below', 'my_theme-admin-td'),
                        'desc'    => __('Select a style to use for the single-staff item.', 'my_theme-admin-td'),
                        'id'      => 'item_captions_below',
                        'type'    => 'select',
                        'default' => 'hide',
                        'options' => array(
                            'hide' => __('Image Only', 'my_theme-admin-td'),
                            'show' => __('Image + Captions Below', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Link Caption Title Below', 'my_theme-admin-td'),
                        'desc'    => __('Makes the Captions Below Title a link.', 'my_theme-admin-td'),
                        'id'      => 'captions_below_link_type',
                        'type'    => 'select',
                        'default' => 'item',
                        'options' => array(
                            'magnific' => __('Magnific', 'PLUGIN_TD'),
                            'item'     => __('Link', 'PLUGIN_TD'),
                            'no-link'  => __('No Link ', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'      => __('Item Caption Horizontal Alignment', 'my_theme-admin-td'),
                        'id'        => 'item_caption_align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'center' => __('Center', 'my_theme-admin-td'),
                            'left'   => __('Left', 'my_theme-admin-td'),
                            'right'  => __('Right', 'my_theme-admin-td'),
                            'justify' => __('Justify', 'my_theme-admin-td')
                        ),
                        'desc'    => __('The text alignment of the caption text / title.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Caption Vertical Alignment', 'my_theme-admin-td'),
                        'id'        => 'item_caption_vertical',
                        'type'      => 'select',
                        'default'   => 'middle',
                        'options' => array(
                            'middle' => __('Middle', 'my_theme-admin-td'),
                            'top'    => __('Top', 'my_theme-admin-td'),
                            'bottom' => __('Bottom', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Vertical alignment of the caption title and text.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Hover Animation', 'my_theme-admin-td'),
                        'id'        => 'item_overlay_animation',
                        'type'        => 'select',
                        'default'     => 'fade-in',
                        'options'     => array(
                            'fade-in'     => __('Fade in', 'my_theme-admin-td'),
                            'fade-in from-top'    => __('Fade From Top', 'my_theme-admin-td'),
                            'fade-in from-bottom' => __('Fade From Bottom', 'my_theme-admin-td'),
                            'fade-in from-left'   => __('Fade From Left', 'my_theme-admin-td'),
                            'fade-in from-right'  => __('Fade From Right', 'my_theme-admin-td'),
                            'fade-none'        => __('No Animation', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('What animation will be used to reveal the image hover overlay.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Image Hover Effects Filter', 'my_theme-admin-td'),
                        'id'      => 'item_hover_filter',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => array(
                            'none'      => __('None', 'my_theme-admin-td'),
                            'sepia'     => __('Sepia', 'my_theme-admin-td'),
                            'grayscale' => __('Grayscale', 'my_theme-admin-td'),
                            'blur'      => __('Blur', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Effects filter to apply to the image on hover.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Effects Filter Behaviour', 'my_theme-admin-td'),
                        'id'      => 'hover_filter_invert',
                        'type'    => 'select',
                        'default' => 'image-filter-onhover',
                        'options' => array(
                            'image-filter-onhover'    => __('Apply Filter On Hover', 'my_theme-admin-td'),
                            'image-filter-invert'     => __('Apply Filter On Hover Out', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('When to apply the Hover Effects Filter.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Grid', 'my_theme-admin-td'),
                        'desc'      => __('Grid pattern to apply over the image on hover.', 'my_theme-admin-td'),
                        'id'        => 'item_overlay_grid',
                        'type'      => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'      => __('Item Overlay Icon', 'my_theme-admin-td'),
                        'desc'      => __('Icon to show on the hover overlay.', 'my_theme-admin-td'),
                        'id'        => 'item_overlay_icon',
                        'type'    => 'select',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/svgs.php',
                        'default' => 'plus',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    // PORTFOLIO SHORTCODE OPTIONS
    'portfolio' => array(
        'shortcode'     => 'portfolio',
        'title'         => __('Portfolio', 'my_theme-admin-td'),
        'desc'          => __('Displays a set of portfolio items in columns.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Portfolio', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Category', 'my_theme-admin-td'),
                        'desc'    => __('Categories to show (leave blank to show all)', 'my_theme-admin-td'),
                        'id'      => 'categories',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'taxonomy',
                        'taxonomy' => 'pm_portfolio_categories',
                        'admin_label' => true,
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        )
                    ),
                    array(
                        'name'    => __('Portfolio Filters', 'my_theme-admin-td'),
                        'desc'    => __('Select which filters to show above the portfolio.', 'my_theme-admin-td'),
                        'id'      => 'filters',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => array(
                            'categories' => __('Category Filter', 'my_theme-admin-td'),
                            'sort'       => __('Sort Options', 'my_theme-admin-td'),
                            'order'      => __('Sort Order', 'my_theme-admin-td'),
                        ),
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        )
                    ),
                    array(
                        'name'    => __('Portfolio items count', 'my_theme-admin-td'),
                        'desc'    => __('Number of portfolio items to display ( 0 for all )', 'my_theme-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'default' => '0',
                        'attr'    => array(
                            'max'   => 100,
                            'min'   => 0,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Mobile Columns', 'my_theme-admin-td'),
                        'desc'    => __('Number of columns to use on mobile sized displays (<768px)', 'my_theme-admin-td'),
                        'id'      => 'xs_col',
                        'type'    => 'slider',
                        'default' => '2',
                        'attr'    => array(
                            'max'   => 12,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Tablet Columns', 'my_theme-admin-td'),
                        'desc'    => __('Number of columns to use on tablet sized displays (>768px <992px)', 'my_theme-admin-td'),
                        'id'      => 'sm_col',
                        'type'    => 'slider',
                        'default' => '3',
                        'attr'    => array(
                            'max'   => 12,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Desktop Columns', 'my_theme-admin-td'),
                        'desc'    => __('Number of columns to use on regular desktop displays (>992px <1200px)', 'my_theme-admin-td'),
                        'id'      => 'md_col',
                        'type'    => 'slider',
                        'default' => '4',
                        'attr'    => array(
                            'max'   => 12,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Large Desktop Columns', 'my_theme-admin-td'),
                        'desc'    => __('Number of columns to use on large desktop displays (>1200x)', 'my_theme-admin-td'),
                        'id'      => 'lg_col',
                        'type'    => 'slider',
                        'default' => '5',
                        'attr'    => array(
                            'max'   => 12,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Layout Mode', 'my_theme-admin-td'),
                        'desc'    => __('Choose a method to layout the portfolio items in the list.', 'my_theme-admin-td'),
                        'id'      => 'layout_mode',
                        'type'    => 'select',
                        'default' => 'fitRows',
                        'options' => array(
                            'fitRows' => __('Align by Rows', 'my_theme-admin-td'),
                            'masonry' => __('Align Vertically', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Portfolio Items Padding', 'my_theme-admin-td'),
                        'desc'    => __('Space to add between portfolio items in pixels.', 'my_theme-admin-td'),
                        'id'      => 'item_padding',
                        'type'    => 'slider',
                        'default' => '15',
                        'attr'    => array(
                            'max'   => 80,
                            'min'   => 0,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Pagination', 'my_theme-admin-td'),
                        'desc'    => __('Select type of pagination to use for this portfolio list.', 'my_theme-admin-td'),
                        'id'      => 'pagination',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => array(
                            'none'      => __('No Pagination', 'my_theme-admin-td'),
                            'next_prev' => __('Next and Previous Buttons', 'my_theme-admin-td'),
                            'pages'     => __('Page Numbers', 'my_theme-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Portfolio Items', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Item image size', 'my_theme-admin-td'),
                        'desc'    => __('Choose the size of images that will be loaded in the portfolio (Portfolio Size can be changed on Theme Portfolio Options Page)', 'my_theme-admin-td'),
                        'id'      => 'item_size',
                        'type'    => 'select',
                        'default' => 'portfolio-thumb',
                        'options' => array(
                            'portfolio-thumb' => __('Portfolio Size', 'my_theme-admin-td'),
                            'thumbnail'       => __('Thumbnail', 'my_theme-admin-td'),
                            'medium'          => __('Medium', 'my_theme-admin-td'),
                            'large'           => __('Large', 'my_theme-admin-td'),
                            'full'            => __('Full', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Hover Overlay Type', 'my_theme-admin-td'),
                        'id'        => 'item_overlay',
                        'type'      => 'select',
                        'default'   => 'icon',
                        'options' => array(
                            'icon'         => __('Show Icon', 'my_theme-admin-td'),
                            'caption'      => __('Show Title & Caption', 'my_theme-admin-td'),
                            'strip'        => __('Show Title Strip & Caption', 'my_theme-admin-td'),
                            'buttons'      => __('Show Title & Buttons', 'my_theme-admin-td'),
                            'buttons_only' => __('Buttons Only', 'my_theme-admin-td'),
                            'none'         => __('No Hover Overlay', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Choose the type of hover overlay you would like to appear.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Overlay Link Type', 'PLUGIN_TD'),
                        'desc'    => __('Select the link type to use for the item.', 'PLUGIN_TD'),
                        'id'      => 'item_link_type',
                        'type'    => 'select',
                        'default' => 'magnific',
                        'options' => array(
                            'magnific'      => __('Magnific Single Item', 'PLUGIN_TD'),
                            'magnific-all'  => __('Magnific All Items', 'PLUGIN_TD'),
                            'item'          => __('Link', 'PLUGIN_TD'),
                            'no-link'       => __('No Link ', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'    => __('Item Show Captions Below', 'my_theme-admin-td'),
                        'desc'    => __('Select a portfolio style to use for the portfolio items.', 'my_theme-admin-td'),
                        'id'      => 'item_captions_below',
                        'type'    => 'select',
                        'default' => 'hide',
                        'options' => array(
                            'hide' => __('Image Only', 'my_theme-admin-td'),
                            'show' => __('Image + Captions Below', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Link Caption Title Below', 'my_theme-admin-td'),
                        'desc'    => __('Makes the Captions Below Title a link.', 'my_theme-admin-td'),
                        'id'      => 'captions_below_link_type',
                        'type'    => 'select',
                        'default' => 'item',
                        'options' => array(
                            'magnific' => __('Magnific', 'PLUGIN_TD'),
                            'item'     => __('Link', 'PLUGIN_TD'),
                            'no-link'  => __('No Link ', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'      => __('Item Caption Horizontal Alignment', 'my_theme-admin-td'),
                        'id'        => 'item_caption_align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'center' => __('Center', 'my_theme-admin-td'),
                            'left'   => __('Left', 'my_theme-admin-td'),
                            'right'  => __('Right', 'my_theme-admin-td'),
                            'justify'  => __('Justify', 'my_theme-admin-td')
                        ),
                        'desc'    => __('The text alignment of the caption text / title.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Caption Vertical Alignment', 'my_theme-admin-td'),
                        'id'        => 'item_caption_vertical',
                        'type'      => 'select',
                        'default'   => 'middle',
                        'options' => array(
                            'middle' => __('Middle', 'my_theme-admin-td'),
                            'top'    => __('Top', 'my_theme-admin-td'),
                            'bottom' => __('Bottom', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Vertical alignment of the caption title and text.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Hover Animation', 'my_theme-admin-td'),
                        'id'        => 'item_overlay_animation',
                        'type'        => 'select',
                        'default'     => 'fade-in',
                        'options'     => array(
                            'fade-in'     => __('Fade in', 'my_theme-admin-td'),
                            'fade-in from-top'    => __('Fade From Top', 'my_theme-admin-td'),
                            'fade-in from-bottom' => __('Fade From Bottom', 'my_theme-admin-td'),
                            'fade-in from-left'   => __('Fade From Left', 'my_theme-admin-td'),
                            'fade-in from-right'  => __('Fade From Right', 'my_theme-admin-td'),
                            'fade-none'        => __('No Animation', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('What animation will be used to reveal the image hover overlay.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Image Hover Effects Filter', 'my_theme-admin-td'),
                        'id'      => 'item_hover_filter',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => array(
                            'none'      => __('None', 'my_theme-admin-td'),
                            'sepia'     => __('Sepia', 'my_theme-admin-td'),
                            'grayscale' => __('Grayscale', 'my_theme-admin-td'),
                            'blur'      => __('Blur', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Effects filter to apply to the image on hover.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Effects Filter Behaviour', 'my_theme-admin-td'),
                        'id'      => 'hover_filter_invert',
                        'type'    => 'select',
                        'default' => 'image-filter-onhover',
                        'options' => array(
                            'image-filter-onhover'    => __('Apply Filter On Hover', 'my_theme-admin-td'),
                            'image-filter-invert'     => __('Apply Filter On Hover Out', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('When to apply the Hover Effects Filter.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Grid', 'my_theme-admin-td'),
                        'desc'      => __('Grid pattern to apply over the image on hover.', 'my_theme-admin-td'),
                        'id'        => 'item_overlay_grid',
                        'type'      => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'      => __('Item Overlay Icon', 'my_theme-admin-td'),
                        'desc'      => __('Icon to show on the hover overlay.', 'my_theme-admin-td'),
                        'id'        => 'item_overlay_icon',
                        'type'    => 'select',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/svgs.php',
                        'default' => 'plus',
                    ),
                    array(
                        'name'        => __('Scroll Animation', 'my_theme-admin-td'),
                        'desc'        => __('Animation that will occur when the user scrolls onto the element.', 'my_theme-admin-td'),
                        'id'          => 'item_scroll_animation',
                        'type'        => 'select',
                        'default'     => 'none',
                        'options'     => include PM_THEME_DIR . 'inc/options/global-options/animations.php',
                    ),
                    array(
                        'name'    => __('Animation Delay', 'my_theme-admin-td'),
                        'desc'    => __('Delay after scrolling onto the element before animation starts.', 'my_theme-admin-td'),
                        'id'      => 'item_scroll_animation_delay',
                        'type'    => 'slider',
                        'default' => '0',
                        'attr'    => array(
                            'max'  => 4,
                            'min'  => 0,
                            'step' => 0.1
                        )
                    ),
                    array(
                        'name'    => __('Animation Timing', 'my_theme-admin-td'),
                        'desc'    => __('Will load all portfolio items at once or each one individually .', 'my_theme-admin-td'),
                        'id'      => 'item_scroll_animation_timing',
                        'type'    => 'select',
                        'default' => 'staggered',
                        'options' => array(
                            'all-same'   => __('All items appear at same time', 'my_theme-admin-td'),
                            'staggered'  => __('Staggered over Animation Delay', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'        => __('Order by', 'my_theme-admin-td'),
                        'desc'        => __('Choose the way portfolio items will be ordered.', 'my_theme-admin-td'),
                        'id'          => 'orderby',
                        'type'        => 'select',
                        'default'     =>  'menu_order',
                        'options'     => array(
                            'none'        => __('None', 'my_theme-admin-td'),
                            'title'       => __('Title', 'my_theme-admin-td'),
                            'date'        => __('Date', 'my_theme-admin-td'),
                            'ID'          => __('ID', 'my_theme-admin-td'),
                            'author'      => __('Author', 'my_theme-admin-td'),
                            'modified'    => __('Last Modified', 'my_theme-admin-td'),
                            'menu_order'  => __('Menu Order', 'my_theme-admin-td'),
                            'rand'        => __('Random', 'my_theme-admin-td'),
                        )
                    ),
                    array(
                        'name'        => __('Order', 'my_theme-admin-td'),
                        'desc'        => __('Choose how portfolio will be ordered.', 'my_theme-admin-td'),
                        'id'          => 'order',
                        'type'        => 'select',
                        'default'     =>  'ASC',
                        'options'     => array(
                            'ASC'     => __('Ascending', 'my_theme-admin-td'),
                            'DESC'    => __('Descending', 'my_theme-admin-td'),
                        )
                    )
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/padding-options.php'
            )
        )
    ),
    // PORTFOLIO SHORTCODE OPTIONS
    'portfolio_masonry' => array(
        'shortcode'     => 'portfolio_masonry',
        'title'         => __('Masonry Portfolio', 'my_theme-admin-td'),
        'desc'          => __('Displays a set of portfolio items using a masonry style.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Portfolio', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Category', 'my_theme-admin-td'),
                        'desc'    => __('Categories to show (leave blank to show all)', 'my_theme-admin-td'),
                        'id'      => 'categories',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'taxonomy',
                        'taxonomy' => 'pm_portfolio_categories',
                        'admin_label' => true,
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        )
                    ),
                    array(
                        'name'    => __('Portfolio Filters', 'my_theme-admin-td'),
                        'desc'    => __('Select which filters to show above the portfolio.', 'my_theme-admin-td'),
                        'id'      => 'filters',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => array(
                            'categories' => __('Category Filter', 'my_theme-admin-td'),
                            'sort'       => __('Sort Options', 'my_theme-admin-td'),
                            'order'      => __('Sort Order', 'my_theme-admin-td'),
                        ),
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        )
                    ),
                    array(
                        'name'    => __('Portfolio items count', 'my_theme-admin-td'),
                        'desc'    => __('Number of portfolio items to display ( 0 for all )', 'my_theme-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'default' => '0',
                        'admin_label' => true,
                        'attr'    => array(
                            'max'   => 24,
                            'min'   => 0,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Pagination', 'my_theme-admin-td'),
                        'desc'    => __('Select type of pagination to use for this portfolio list.', 'my_theme-admin-td'),
                        'id'      => 'pagination',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => array(
                            'none'      => __('No Pagination', 'my_theme-admin-td'),
                            'next_prev' => __('Next and Previous Buttons', 'my_theme-admin-td'),
                            'pages'     => __('Page Numbers', 'my_theme-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Portfolio Items', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Item image size', 'my_theme-admin-td'),
                        'desc'    => __('Choose the size of images that will be loaded in the portfolio (Portfolio Size can be changed on Theme Portfolio Options Page)', 'my_theme-admin-td'),
                        'id'      => 'item_size',
                        'type'    => 'select',
                        'default' => 'full',
                        'options' => array(
                            'portfolio-thumb' => __('Portfolio Size', 'my_theme-admin-td'),
                            'thumbnail'       => __('Thumbnail', 'my_theme-admin-td'),
                            'medium'          => __('Medium', 'my_theme-admin-td'),
                            'large'           => __('Large', 'my_theme-admin-td'),
                            'full'            => __('Full', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Portfolio Items Padding', 'my_theme-admin-td'),
                        'desc'    => __('Space to add between portfolio items in pixels.', 'my_theme-admin-td'),
                        'id'      => 'item_padding',
                        'type'    => 'slider',
                        'default' => '0',
                        'attr'    => array(
                            'max'   => 80,
                            'min'   => 0,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'      => __('Hover Overlay Type', 'my_theme-admin-td'),
                        'id'        => 'item_overlay',
                        'type'      => 'select',
                        'default'   => 'icon',
                        'options' => array(
                            'icon'         => __('Show Icon', 'my_theme-admin-td'),
                            'caption'      => __('Show Title & Caption', 'my_theme-admin-td'),
                            'strip'        => __('Show Title Strip & Caption', 'my_theme-admin-td'),
                            'buttons'      => __('Show Title & Buttons', 'my_theme-admin-td'),
                            'buttons_only' => __('Buttons Only', 'my_theme-admin-td'),
                            'none'         => __('No Hover Overlay', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Choose the type of hover overlay you would like to appear.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Overlay Link Type', 'PLUGIN_TD'),
                        'desc'    => __('Select the link type to use for the item.', 'PLUGIN_TD'),
                        'id'      => 'item_link_type',
                        'type'    => 'select',
                        'default' => 'magnific',
                        'options' => array(
                            'magnific'      => __('Magnific Single Item', 'PLUGIN_TD'),
                            'magnific-all'  => __('Magnific All Items', 'PLUGIN_TD'),
                            'item'          => __('Link', 'PLUGIN_TD'),
                            'no-link'       => __('No Link ', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'    => __('Open Link In', 'my_theme-admin-td'),
                        'id'      => 'item_link_target',
                        'type'    => 'select',
                        'default' => '_self',
                        'options' => array(
                            '_self'   => __('Same page as it was clicked ', 'my_theme-admin-td'),
                            '_blank'  => __('Open in new window/tab', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Where the link will open.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Image Hover Effects Filter', 'my_theme-admin-td'),
                        'id'      => 'item_hover_filter',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => array(
                            'none'      => __('None', 'my_theme-admin-td'),
                            'sepia'     => __('Sepia', 'my_theme-admin-td'),
                            'grayscale' => __('Grayscale', 'my_theme-admin-td'),
                            'blur'      => __('Blur', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Effects filter to apply to the image on hover.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Effects Filter Behaviour', 'my_theme-admin-td'),
                        'id'      => 'hover_filter_invert',
                        'type'    => 'select',
                        'default' => 'image-filter-onhover',
                        'options' => array(
                            'image-filter-onhover'    => __('Apply Filter On Hover', 'my_theme-admin-td'),
                            'image-filter-invert'     => __('Apply Filter On Hover Out', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('When to apply the Hover Effects Filter.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Caption Overlay Horizontal Alignment', 'my_theme-admin-td'),
                        'id'        => 'item_caption_align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'center' => __('Center', 'my_theme-admin-td'),
                            'left'   => __('Left', 'my_theme-admin-td'),
                            'right'  => __('Right', 'my_theme-admin-td'),
                            'justify'  => __('Justify', 'my_theme-admin-td')
                        ),
                        'desc'    => __('The text alignment of the caption text / title.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Caption Vertical Alignment', 'my_theme-admin-td'),
                        'id'        => 'item_caption_vertical',
                        'type'      => 'select',
                        'default'   => 'middle',
                        'options' => array(
                            'middle' => __('Middle', 'my_theme-admin-td'),
                            'top'    => __('Top', 'my_theme-admin-td'),
                            'bottom' => __('Bottom', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Vertical alignment of the caption title and text.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Hover Animation', 'my_theme-admin-td'),
                        'id'        => 'item_overlay_animation',
                        'type'        => 'select',
                        'default'     => 'fade-in',
                        'options'     => array(
                            'fade-in'     => __('Fade in', 'my_theme-admin-td'),
                            'fade-in from-top'    => __('Fade From Top', 'my_theme-admin-td'),
                            'fade-in from-bottom' => __('Fade From Bottom', 'my_theme-admin-td'),
                            'fade-in from-left'   => __('Fade From Left', 'my_theme-admin-td'),
                            'fade-in from-right'  => __('Fade From Right', 'my_theme-admin-td'),
                            'fade-none'        => __('No Animation', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('What animation will be used to reveal the image hover overlay.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Item Overlay Grid', 'my_theme-admin-td'),
                        'desc'      => __('Grid pattern to apply over the image on hover.', 'my_theme-admin-td'),
                        'id'        => 'item_overlay_grid',
                        'type'      => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'      => __('Item Overlay Icon', 'my_theme-admin-td'),
                        'desc'      => __('Icon to show on the hover overlay.', 'my_theme-admin-td'),
                        'id'        => 'item_overlay_icon',
                        'type'    => 'select',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/svgs.php',
                        'default' => 'plus',
                    ),
                    array(
                        'name'        => __('Scroll Animation', 'my_theme-admin-td'),
                        'desc'        => __('Animation that will occur when the user scrolls onto the element.', 'my_theme-admin-td'),
                        'id'          => 'item_scroll_animation',
                        'type'        => 'select',
                        'default'     => 'none',
                        'options'     => include PM_THEME_DIR . 'inc/options/global-options/animations.php',
                    ),
                    array(
                        'name'    => __('Animation Delay', 'my_theme-admin-td'),
                        'desc'    => __('Delay after scrolling onto the element before animation starts.', 'my_theme-admin-td'),
                        'id'      => 'item_scroll_animation_delay',
                        'type'    => 'slider',
                        'default' => '0',
                        'attr'    => array(
                            'max'  => 4,
                            'min'  => 0,
                            'step' => 0.1
                        )
                    ),
                    array(
                        'name'    => __('Animation Timing', 'my_theme-admin-td'),
                        'desc'    => __('Will load all portfolio items at once or each one individually .', 'my_theme-admin-td'),
                        'id'      => 'item_scroll_animation_timing',
                        'type'    => 'select',
                        'default' => 'staggered',
                        'options' => array(
                            'all-same'   => __('All items appear at same time', 'my_theme-admin-td'),
                            'staggered'  => __('Staggered over Animation Delay', 'my_theme-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/padding-options.php'
            )
        )
    ),
    'recent_posts' => array(
        'shortcode' => 'recent_posts',
        'title'     => __('Recent Posts Masonry', 'my_theme-admin-td'),
        'desc'       => __('Displays a list of recent posts using Masonry.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'   => array(
            array(
                'title' => __('Recent Posts Masonry', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Number of posts', 'my_theme-admin-td'),
                        'desc'    => __('Total Number of posts to display.', 'my_theme-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'default' => '3',
                        'attr'    => array(
                            'max'   => 50,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Post category', 'my_theme-admin-td'),
                        'desc'    => __('Choose posts from a specific category', 'my_theme-admin-td'),
                        'id'      => 'cat',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'categories',
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        )
                    ),
                    array(
                        'name'    => __('Post Swatch', 'my_theme-admin-td'),
                        'desc'    => __('Choose a color swatch for the posts', 'my_theme-admin-td'),
                        'id'      => 'masonry_items_swatch',
                        'type'    => 'select',
                        'default' => 'swatch-red-white',
                        'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php'
                    ),
                    array(
                        'name'      => __('Masonry Items Padding', 'my_theme-admin-td'),
                        'desc'      => __('Space to add between Masonry items in pixels.', 'my_theme-admin-td'),
                        'id'        => 'masonry_items_padding',
                        'type'      => 'slider',
                        'default'   => '8',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 1
                        )
                    ),
                    array(
                        'name'    => __('Animation Timing', 'my_theme-admin-td'),
                        'desc'    => __('Will animate all posts at once or each one individually .', 'my_theme-admin-td'),
                        'id'      => 'scroll_animation_timing',
                        'type'    => 'select',
                        'default' => 'staggered',
                        'options' => array(
                            'all-same'   => __('All items appear at same time', 'my_theme-admin-td'),
                            'staggered'  => __('Staggered over Animation Delay', 'my_theme-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'recent_posts_simple' => array(
        'shortcode' => 'recent_posts_simple',
        'title'     => __('Recent Posts', 'my_theme-admin-td'),
        'desc'       => __('Displays a simple list of recent posts.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'   => array(
            array(
                'title' => __('Recent Posts', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Number of posts', 'my_theme-admin-td'),
                        'desc'    => __('Total Number of posts to display.', 'my_theme-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'default' => '3',
                        'attr'    => array(
                            'max'   => 50,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Columns Per Row', 'my_theme-admin-td'),
                        'desc'    => __('Number of posts to display per row', 'my_theme-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'select',
                        'options' => array(
                            '2' => __('Two columns', 'my_theme-admin-td'),
                            '3' => __('Three columns', 'my_theme-admin-td'),
                            '4' => __('Four columns', 'my_theme-admin-td'),
                            '6' => __('Six columns', 'my_theme-admin-td'),
                        ),
                        'default' => '3',
                    ),
                    array(
                        'name'    => __('Post category', 'my_theme-admin-td'),
                        'desc'    => __('Choose posts from a specific category', 'my_theme-admin-td'),
                        'id'      => 'cat',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'categories',
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        )
                    ),
                    array(
                        'name'    => __('Animation Timing', 'my_theme-admin-td'),
                        'desc'    => __('Will animate all posts at once or each one individually .', 'my_theme-admin-td'),
                        'id'      => 'scroll_animation_timing',
                        'type'    => 'select',
                        'default' => 'staggered',
                        'options' => array(
                            'all-same'   => __('All items appear at same time', 'my_theme-admin-td'),
                            'staggered'  => __('Staggered over Animation Delay', 'my_theme-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    // MAP SHORTCODE OPTIONS
    'map' => array(
        'shortcode'     => 'map',
        'title'         => __('Google Map', 'my_theme-admin-td'),
        'desc'          => __('Adds a Google Map to the page.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Map', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Map Type', 'my_theme-admin-td'),
                        'id'        => 'map_type',
                        'desc'    => __('Choose a type of map to show from Google Maps.', 'my_theme-admin-td'),
                        'type'      => 'select',
                        'default'   =>  'ROADMAP',
                        'options' => array(
                            'ROADMAP'   => __('Roadmap', 'my_theme-admin-td'),
                            'SATELLITE' => __('Satellite', 'my_theme-admin-td'),
                            'TERRAIN'   => __('Terrain', 'my_theme-admin-td'),
                            'HYBRID'    => __('Hybrid', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Map Style', 'my_theme-admin-td'),
                        'id'        => 'map_style',
                        'desc'    => __('Set a drawing style for the map.', 'my_theme-admin-td'),
                        'type'      => 'select',
                        'default'   =>  'regular',
                        'options' => array(
                            'blackwhite' => __('Black & White', 'my_theme-admin-td'),
                            'regular'    => __('Regular', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Center Map', 'my_theme-admin-td'),
                        'id'        => 'auto_center',
                        'type'      => 'select',
                        'default'   =>  'auto',
                        'desc'    => __('Sets the center the map automatically based on the markers, or manually.', 'my_theme-admin-td'),
                        'options' => array(
                            'auto'   => __('Auto center markers ', 'my_theme-admin-td'),
                            'manual' => __('I will tell you where to center map below', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Center Map Lat/Lng', 'my_theme-admin-td'),
                        'desc'    => __('Latitude and Longitude position to center the Map (separate lat and long with commas).', 'my_theme-admin-td'),
                        'id'      => 'center_latlng',
                        'default' =>  '',
                        'type'    => 'text',
                    ),
                    array(
                        'name'      => __('Map Zoom', 'my_theme-admin-td'),
                        'id'        => 'map_zoom',
                        'desc'    => __('Sets the zoom level of the map.  NOTE - will be overridden by the auto center map option', 'my_theme-admin-td'),
                        'type'      => 'slider',
                        'default' => '15',
                        'attr'    => array(
                            'max'   => 20,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'      => __('Map Scrollable', 'my_theme-admin-td'),
                        'id'        => 'map_scrollable',
                        'desc'    => __('Toggles draggable scrolling of the map.', 'my_theme-admin-td'),
                        'type'      => 'select',
                        'default'   =>  'on',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            'off' => __('Off', 'my_theme-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Marker', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Show Markers', 'my_theme-admin-td'),
                        'id'        => 'marker',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'desc'    => __('Toggle showing or hiding the small marker points on your map.', 'my_theme-admin-td'),
                        'options' => array(
                            'hide' => __('Hide', 'my_theme-admin-td'),
                            'show' => __('Show', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Marker Labels', 'my_theme-admin-td'),
                        'desc'    => __('Labels to show above the marker. Divide labels with pipe character |', 'my_theme-admin-td'),
                        'id'      => 'label',
                        'default' =>  '',
                        'type'    => 'textarea',
                    ),
                    array(
                        'name'    => __('Marker Addresses', 'my_theme-admin-td'),
                        'desc'    => __('Addresses to show markers. Divide addresses with pipe character |', 'my_theme-admin-td'),
                        'id'      => 'address',
                        'default' =>  '',
                        'type'    => 'textarea',
                    ),
                    array(
                        'name'    => __('Markers Lat/Lng', 'my_theme-admin-td'),
                        'desc'    => __('Latitude and Longitude of markers(separate with commas), if you dont want to use address. Divide markers with pipe character |', 'my_theme-admin-td'),
                        'id'      => 'latlng',
                        'default' =>  '',
                        'type'    => 'textarea',
                    ),
                )
            ),
            array(
                'title' => __('Section', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Map Height', 'my_theme-admin-td'),
                        'id'        => 'height',
                        'desc'    => __('Map height in pixels.', 'my_theme-admin-td'),
                        'type'      => 'slider',
                        'default' => '500',
                        'attr'    => array(
                            'max'   => 800,
                            'min'   => 50,
                            'step'  => 1
                        )
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    // PIECHART SHORTCODE
    'pie' => array(
        'shortcode' => 'pie',
        'title'     => __('Pie Chart', 'my_theme-admin-td'),
        'desc'      => __('Creates a circular chart to show a % value.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'   => array(
            array(
                'title' => __('Pie Chart', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Track Colour', 'my_theme-admin-td'),
                        'desc'    => __('Choose the chart track colour', 'my_theme-admin-td'),
                        'id'      => 'track_colour',
                        'default' =>  '',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Bar Colour', 'my_theme-admin-td'),
                        'desc'    => __('Choose the chart bar colour', 'my_theme-admin-td'),
                        'id'      => 'bar_colour',
                        'default' =>  '',
                        'type'    => 'colour',
                    ),
                    array(
                        'name'    => __('Icon', 'my_theme-admin-td'),
                        'desc'    => __('Choose a chart icon', 'my_theme-admin-td'),
                        'id'      => 'icon',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'icons',
                    ),
                    array(
                        'name'    => __('Icon Animation', 'my_theme-admin-td'),
                        'desc'    => __('Choose an icon animation', 'my_theme-admin-td'),
                        'id'      => 'icon_animation',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/animations.php'
                    ),
                    array(
                        'name'    => __('Percentage', 'my_theme-admin-td'),
                        'desc'    => __('Percentage of the pie chart', 'my_theme-admin-td'),
                        'id'      => 'percentage',
                        'admin_label' => true,
                        'type'    => 'slider',
                        'default' => '50',
                        'attr'    => array(
                            'max'   => 100,
                            'min'   => 1,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Size', 'my_theme-admin-td'),
                        'desc'    => __('Set the size of the chart', 'my_theme-admin-td'),
                        'id'      => 'size',
                        'type'    => 'slider',
                        'default' => '200',
                        'attr'    => array(
                            'max'   => 400,
                            'min'   => 50,
                            'step'  => 1
                        )
                    ),
                    array(
                        'name'    => __('Line Width', 'my_theme-admin-td'),
                        'desc'    => __('Set the width of the charts line', 'my_theme-admin-td'),
                        'id'      => 'line_width',
                        'type'    => 'slider',
                        'default' => '20',
                        'attr'    => array(
                            'max'   => 30,
                            'min'   => 5,
                            'step'  => 1
                        )
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
     // COUNTER SHORTCODE
    'counter' => array(
        'shortcode' => 'counter',
        'title'     => __('Counter', 'my_theme-admin-td'),
        'desc'      => __('Creates a circular counter to show an integer value.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'   => array(
            array(
                'title' => __('Counter', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Initial Value', 'my_theme-admin-td'),
                        'desc'    => __('Starting value of the circular counter before the animation.', 'my_theme-admin-td'),
                        'id'      => 'initvalue',
                        'admin_label' => true,
                        'default'     =>  '0',
                        'type'        => 'text',
                    ),
                    array(
                        'name'    => __('End Value', 'my_theme-admin-td'),
                        'desc'    => __('Value of the circular counter', 'my_theme-admin-td'),
                        'id'      => 'value',
                        'admin_label' => true,
                        'default'     =>  '',
                        'type'        => 'text',
                    ),
                    array(
                        'name'      => __('Number Format', 'my_theme-admin-td'),
                        'id'        => 'format',
                        'type'      => 'select',
                        'default'   => '(,ddd)',
                        'options' => array(
                            '(,ddd)'    => '12,345,678',
                            '(,ddd).dd' => '12,345,678.09',
                            '(.ddd),dd' => '12.345.678,09',
                            '( ddd),dd' => '12 345 678,09',
                            'd'         => '12345678',
                        ),
                        'desc'    => __('Sets format that the number in the counter will use.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Text Alignment', 'my_theme-admin-td'),
                        'id'        => 'align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'default'   => __('Default alignment', 'my_theme-admin-td'),
                            'left'      => __('Left', 'my_theme-admin-td'),
                            'center'    => __('Center', 'my_theme-admin-td'),
                            'right'     => __('Right', 'my_theme-admin-td'),
                            'justify'   => __('Justify', 'my_theme-admin-td')
                        ),
                        'desc'    => __('Sets the text alignment of the lead text.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Counter Font Size', 'my_theme-admin-td'),
                        'desc'    => __('Choose the size of the font to use in the counter', 'my_theme-admin-td'),
                        'id'      => 'counter_size',
                        'type'    => 'select',
                        'options' => array(
                            'normal'      => __('Normal', 'my_theme-admin-td'),
                            'super' => __('Super (60px)', 'my_theme-admin-td'),
                            'hyper' => __('Hyper (96px)', 'my_theme-admin-td'),
                        ),
                        'default' => 'normal',
                    ),
                    array(
                        'name'    => __('Counter Font Weight', 'my_theme-admin-td'),
                        'desc'    => __('Choose the weight of the font to use in the counter', 'my_theme-admin-td'),
                        'id'      => 'counter_weight',
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
                        'name'    => __('Underline', 'my_theme-admin-td'),
                        'desc'    => __('Underline the number.', 'my_theme-admin-td'),
                        'id'      => 'underline',
                        'type'    => 'select',
                        'options' => array(
                            'bordered'    => __('Underline', 'my_theme-admin-td'),
                            'no-bordered' => __('No Underline', 'my_theme-admin-td')
                        ),
                        'default' => 'bordered',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'pricing' => array(
        'title'       => __('Pricing Column', 'my_theme-admin-td'),
        'desc'        => __('Displays a price info column.', 'my_theme-admin-td'),
        'shortcode'   => 'pricing',
        'insert_with' => 'dialog',
        'has_content' => false,
        'sections'   => array(
            array(
                'title' => __('Pricing Table', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'        => __('Heading', 'my_theme-admin-td'),
                        'desc'        => __('Heading text of the column', 'my_theme-admin-td'),
                        'id'          => 'heading',
                        'admin_label' => true,
                        'default'     =>  '',
                        'type'        => 'text',
                    ),
                    array(
                        'name'      => __('Featured Column', 'my_theme-admin-td'),
                        'id'        => 'featured',
                        'type'      => 'select',
                        'default'   =>  'false',
                        'options' => array(
                            'false' => __('Not Featured', 'my_theme-admin-td'),
                            'true'  => __('Featured', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Background Color', 'my_theme-admin-td'),
                        'id'        => 'pricing_background_colour',
                        'desc'      => __('Set the background color of the Pricing Column', 'my_theme-admin-td'),
                        'type'      => 'colour',
                        'default'   => '#82c9ed',
                    ),
                    array(
                        'name'      => __('Foreground Color', 'my_theme-admin-td'),
                        'id'        => 'pricing_foreground_colour',
                        'desc'      => __('Set the foreground color of the Pricing Column', 'my_theme-admin-td'),
                        'type'      => 'colour',
                        'default'   => '#FFFFFF',
                    ),
                    array(
                        'name'      => __('Show price', 'my_theme-admin-td'),
                        'id'        => 'show_price',
                        'type'      => 'select',
                        'default'   =>  'true',
                        'options' => array(
                            'true' => __('Show', 'my_theme-admin-td'),
                            'false' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Price Color', 'my_theme-admin-td'),
                        'id'        => 'pricing_colour',
                        'desc'      => __('Set the color of the Price', 'my_theme-admin-td'),
                        'type'      => 'colour',
                        'default'   => '#FFFFFF',
                    ),
                    array(
                        'name'      => __('Price background', 'my_theme-admin-td'),
                        'id'        => 'pricing_background',
                        'desc'      => __('Set the background of the Price', 'my_theme-admin-td'),
                        'type'      => 'colour',
                        'default'   => '#82c9ed',
                    ),
                    array(
                        'name'    => __('Price', 'my_theme-admin-td'),
                        'desc'    => __('Price to show at top of the column.', 'my_theme-admin-td'),
                        'id'      => 'price',
                        'default' =>  '',
                        'type'    => 'text',
                    ),
                    array(
                        'name'    => __('Price Currency', 'my_theme-admin-td'),
                        'desc'    => __('Price currency to show next to the price.', 'my_theme-admin-td'),
                        'id'      => 'currency',
                        'default' =>  '&#36;',
                        'type'    => 'select',
                        'options' => array(
                            '&#36;'   => __('Dollar', 'my_theme-admin-td'),
                            '&#128;'  => __('Euro', 'my_theme-admin-td'),
                            '&#163;'  => __('Pound', 'my_theme-admin-td'),
                            '&#165;'  => __('Yen', 'my_theme-admin-td'),
                            'custom' => __('Custom', 'my_theme-admin-td'),
                        )
                    ),
                    array(
                        'name'    => __('Custom Currency', 'my_theme-admin-td'),
                        'desc'    => __('If custom currency selected enter the html code here. e.g. <code>&#8359;</code>', 'my_theme-admin-td'),
                        'id'      => 'custom_currency',
                        'default' =>  '',
                        'type'    => 'text',
                    ),
                    array(
                        'name'    => __('After Price Text', 'my_theme-admin-td'),
                        'desc'    => __('Text to show after the price.', 'my_theme-admin-td'),
                        'id'      => 'per',
                        'default' =>  '',
                        'type'    => 'text',
                    ),
                    array(
                        'name'    => __('Item List', 'my_theme-admin-td'),
                        'desc'    => __('List of items to put in the column under the price. Divide categories with linebreaks (Enter)', 'my_theme-admin-td'),
                        'id'      => 'list',
                        'default' =>  '',
                        'type'    => 'exploded_textarea',
                    ),
                    array(
                        'name'      => __('Show button', 'my_theme-admin-td'),
                        'id'        => 'show_button',
                        'type'      => 'select',
                        'default'   =>  'true',
                        'options' => array(
                            'true' => __('Show', 'my_theme-admin-td'),
                            'false' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Button Text', 'my_theme-admin-td'),
                        'desc'    => __('Text to inside the button at the bottom of the column.', 'my_theme-admin-td'),
                        'id'      => 'button_text',
                        'default' =>  '',
                        'type'    => 'text',
                    ),
                    array(
                        'name'    => __('Button Link', 'my_theme-admin-td'),
                        'desc'    => __('Link that the button will point to.', 'my_theme-admin-td'),
                        'id'      => 'button_link',
                        'default' =>  '',
                        'type'    => 'text',
                    ),
                    array(
                        'name'      => __('Button background Color', 'my_theme-admin-td'),
                        'id'        => 'button_background_colour',
                        'desc'      => __('Set the background color of the button', 'my_theme-admin-td'),
                        'type'      => 'colour',
                        'default'   => '#FFFFFF',
                    ),
                    array(
                        'name'      => __('Button text Color', 'my_theme-admin-td'),
                        'id'        => 'button_foreground_colour',
                        'desc'      => __('Set the foreground color of the button', 'my_theme-admin-td'),
                        'type'      => 'colour',
                        'default'   => '#82c9ed',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        ),
    ),
    'features_list' => array(
        'shortcode'   => 'features_list',
        'title'       => __('Features List', 'my_theme-admin-td'),
        'desc'        => __('Displays a list of features.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'      => __('Show Connections', 'my_theme-admin-td'),
                        'id'        => 'show_connections',
                        'type'      => 'select',
                        'default'   =>  'hide',
                        'options' => array(
                            'hide' => __('Hide', 'my_theme-admin-td'),
                            'show' => __('Show', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Show / Hide a connecting dotted line between features.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Connection Line Color', 'my_theme-admin-td'),
                        'desc'      => __('Set the colour of the connection dotted line.', 'my_theme-admin-td'),
                        'id'        => 'connection_line_colour',
                        'type'      => 'colour',
                        'default'   => '#82c9ed',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'feature' => array(
        'shortcode'   => 'feature',
        'title'       => __('Feature', 'my_theme-admin-td'),
        'desc'        => __('Displays a shape with an icon alongside some text.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'      => __('Show Icon', 'my_theme-admin-td'),
                        'id'        => 'show_icon',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Show / Hide the icon on the left.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Font Awesome Icon', 'my_theme-admin-td'),
                        'id'      => 'icon',
                        'desc'    => __('Select a font awesome icon that will appear in your features shape.', 'my_theme-admin-td'),
                        'id'      => 'fa_icon',
                        'type'    => 'select',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/fontawesome.php',
                        'default' => ''
                    ),
                    array(
                        'name'    => __('SVG Icon', 'my_theme-admin-td'),
                        'desc'    => __('Select a svg icon that will appear in your section shape.', 'my_theme-admin-td'),
                        'id'      => 'svg_icon',
                        'type'    => 'select',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/svgs.php',
                        'default' => '',
                    ),
                    array(
                        'name'      => __('Icon Colour', 'my_theme-admin-td'),
                        'desc'      => __('Set the colour of the icon ( svg & font awesome icons )', 'my_theme-admin-td'),
                        'id'        => 'icon_color',
                        'type'      => 'colour',
                        'default'   => '#FFFFFF',
                    ),
                    array(
                        'name'      => __('Background Colour', 'my_theme-admin-td'),
                        'desc'      => __('Set the colour shape background.', 'my_theme-admin-td'),
                        'id'        => 'background_color',
                        'type'      => 'colour',
                        'default'   => '#82c9ed',
                    ),
                    array(
                        'name'    => __('Hover Animation', 'PLUGIN_TD'),
                        'desc'    => __('Choose a hover animation for the feature icon.', 'PLUGIN_TD'),
                        'id'      => 'animation',
                        'type'    => 'select',
                        'default' => '',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/animations.php'
                    ),
                    array(
                        'name'        => __('Title', 'my_theme-admin-td'),
                        'id'          => 'title',
                        'type'        => 'text',
                        'admin_label' => true,
                        'default'     => '',
                        'desc'        => __('Choose a title for your featured item.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'        => __('Content', 'my_theme-admin-td'),
                        'id'          => 'content',
                        'type'        => 'textarea',
                        'default'     => '',
                        'desc'        => __('Content to show below title.', 'my_theme-admin-td'),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'slideshow' => array(
        'shortcode'     => 'slideshow',
        'title'         => __('Slideshow', 'my_theme-admin-td'),
        'desc'          => __('Adds a Flexslider slideshow to the page.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Slideshow', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Choose a Flexslider', 'my_theme-admin-td'),
                        'desc'    => __('Populate your slider with one of the slideshows you created', 'my_theme-admin-td'),
                        'id'      => 'flexslider',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'slideshow',
                    ),
                    array(
                        'name'      =>  __('Animation style', 'my_theme-admin-td'),
                        'desc'      =>  __('Select how your slider animates', 'my_theme-admin-td'),
                        'id'        => 'animation',
                        'type'      => 'select',
                        'options'   =>  array(
                            'slide' => __('Slide', 'my_theme-admin-td'),
                            'fade'  => __('Fade', 'my_theme-admin-td'),
                        ),
                        'default'   => 'slide',
                    ),
                    array(
                        'name'      => __('Direction', 'my_theme-admin-td'),
                        'desc'      =>  __('Select the direction your slider slides', 'my_theme-admin-td'),
                        'id'        => 'direction',
                        'type'      => 'select',
                        'default'   =>  'horizontal',
                        'options' => array(
                            'horizontal' => __('Horizontal', 'my_theme-admin-td'),
                            'vertical'   => __('Vertical', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Duration', 'my_theme-admin-td'),
                        'desc'      => __('Select how long each color will stay, in milliseconds', 'my_theme-admin-td'),
                        'id'        => 'duration',
                        'type'      => 'slider',
                        'default'   => '600',
                        'attr'      => array(
                            'max'       => 1500,
                            'min'       => 200,
                            'step'      => 100
                        )
                    ),
                    array(
                        'name'      => __('Speed', 'my_theme-admin-td'),
                        'desc'      => __('Select how fast the colors will change, in milliseconds', 'my_theme-admin-td'),
                        'id'        => 'speed',
                        'type'      => 'slider',
                        'default'   => '7000',
                        'attr'      => array(
                            'max'       => 15000,
                            'min'       => 2000,
                            'step'      => 1000
                        )
                    ),
                    array(
                        'name'      => __('Auto start', 'my_theme-admin-td'),
                        'id'        => 'autostart',
                        'type'      => 'select',
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
                        'type'      => 'select',
                        'default'   =>  'hide',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                     array(
                        'name'      => __('Item width', 'my_theme-admin-td'),
                        'desc'      => __('Set width of the slider items( leave blank for full )', 'my_theme-admin-td'),
                        'id'        => 'itemwidth',
                        'type'      => 'text',
                        'default'   => '',
                        'attr'      =>  array(
                            'size'    => 8,
                        ),
                    ),
                    array(
                        'name'      => __('Show controls', 'my_theme-admin-td'),
                        'id'        => 'showcontrols',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Choose the place of the controls', 'my_theme-admin-td'),
                        'id'        => 'controlsposition',
                        'type'      => 'select',
                        'default'   =>  'inside',
                        'options' => array(
                            'inside'    => __('Inside', 'my_theme-admin-td'),
                            'outside'   => __('Outside', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      =>  __('Choose the alignment of the controls', 'my_theme-admin-td'),
                        'id'        => 'controlsalign',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options'   =>  array(
                            'center' => __('Center', 'my_theme-admin-td'),
                            'left'   => __('Left', 'my_theme-admin-td'),
                            'right'  => __('Right', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Controls Vertical Position', 'my_theme-admin-td'),
                        'id'        => 'controls_vertical',
                        'type'      => 'select',
                        'default'   =>  'bottom',
                        'options' => array(
                            'top'    => __('Top', 'my_theme-admin-td'),
                            'bottom' => __('Bottom', 'my_theme-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Captions', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Show Captions', 'my_theme-admin-td'),
                        'id'        => 'captions',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
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
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'vc_single_image' => array(
        'shortcode'     => 'vc_single_image',
        'title'         => __('Image', 'my_theme-admin-td'),
        'desc'          => __('Displays an image.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Image', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Image Source', 'my_theme-admin-td'),
                        'id'      => 'image',
                        'type'    => 'upload',
                        'store'   => 'id',
                        'default' => '',
                        'desc'    => __('Place the source path of the image here', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Image size', 'my_theme-admin-td'),
                        'desc'    => __('Select the dimensions of the image that will be used.  See Settings -> Media for sizes.', 'my_theme-admin-td'),
                        'id'      => 'size',
                        'type'    => 'select',
                        'default' => 'medium',
                        'options' => array(
                            'thumbnail' => __('Thumbnail', 'my_theme-admin-td'),
                            'medium'    => __('Medium', 'my_theme-admin-td'),
                            'large'     => __('Large', 'my_theme-admin-td'),
                            'full'      => __('Full', 'my_theme-admin-td')
                        ),
                    ),
                    array(
                        'name'    => __('Image stretch', 'my_theme-admin-td'),
                        'desc'    => __('Allows you to make the image stretch to fit its container.', 'my_theme-admin-td'),
                        'id'      => 'image_stretch',
                        'type'    => 'select',
                        'default' => 'normalwidth',
                        'options' => array(
                            'normalwidth' => __("Don't Stretch", 'my_theme-admin-td'),
                            'fullwidth'    => __('Stretch Full Width', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Image Alt', 'my_theme-admin-td'),
                        'id'      => 'alt',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Place the alt of the image here', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Image Title', 'my_theme-admin-td'),
                        'id'      => 'title',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Place the title attribute of the image here', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Hover Overlay Type', 'my_theme-admin-td'),
                        'id'        => 'overlay',
                        'type'      => 'select',
                        'default'   => 'icon',
                        'options' => array(
                            'icon'         => __('Show Icon', 'my_theme-admin-td'),
                            'caption'      => __('Show Title & Caption', 'my_theme-admin-td'),
                            'strip'        => __('Show Title Strip & Caption', 'my_theme-admin-td'),
                            'buttons'      => __('Show Title & Buttons', 'my_theme-admin-td'),
                            'buttons_only' => __('Buttons Only', 'my_theme-admin-td'),
                            'none'         => __('No Hover Overlay', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Choose the type of hover overlay you would like to appear.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Overlay Link Type', 'PLUGIN_TD'),
                        'desc'    => __('Select the link type to use for the item.', 'PLUGIN_TD'),
                        'id'      => 'item_link_type',
                        'type'    => 'select',
                        'default' => 'magnific',
                        'options' => array(
                            'magnific' => __('Magnific', 'PLUGIN_TD'),
                            'item'     => __('Link', 'PLUGIN_TD'),
                            'no-link'  => __('No Link ', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'    => __('Link', 'my_theme-admin-td'),
                        'id'      => 'link',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Link that the item will link to if you select link in Item Link Type', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Open Link In', 'my_theme-admin-td'),
                        'id'      => 'link_target',
                        'type'    => 'select',
                        'default' => '_self',
                        'options' => array(
                            '_self'   => __('Same page as it was clicked ', 'my_theme-admin-td'),
                            '_blank'  => __('Open in new window/tab', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Where the link will open.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Show Captions Below', 'my_theme-admin-td'),
                        'desc'    => __('Show captions below image.', 'my_theme-admin-td'),
                        'id'      => 'captions_below',
                        'type'    => 'select',
                        'default' => 'hide',
                        'options' => array(
                            'hide' => __('Hide Captions', 'my_theme-admin-td'),
                            'show' => __('Show Captions', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Link Caption Title Below', 'my_theme-admin-td'),
                        'desc'    => __('Makes the Captions Below Title a link.', 'my_theme-admin-td'),
                        'id'      => 'captions_below_link_type',
                        'type'    => 'select',
                        'default' => 'item',
                        'options' => array(
                            'magnific' => __('Magnific', 'PLUGIN_TD'),
                            'item'     => __('Link', 'PLUGIN_TD'),
                            'no-link'  => __('No Link ', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'    => __('Caption Title', 'my_theme-admin-td'),
                        'id'      => 'caption_title',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('This text will be used for the caption title.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Caption', 'my_theme-admin-td'),
                        'id'      => 'caption_text',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('This text will be shown below the caption title.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Caption Text Alignment', 'my_theme-admin-td'),
                        'id'        => 'caption_align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'left'   => __('Left', 'my_theme-admin-td'),
                            'center' => __('Center', 'my_theme-admin-td'),
                            'right'  => __('Right', 'my_theme-admin-td'),
                            'justify'  => __('Justify', 'my_theme-admin-td')
                        ),
                        'desc'    => __('The text alignment of the caption text / title.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Effects Filter', 'my_theme-admin-td'),
                        'id'      => 'hover_filter',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => array(
                            'none'      => __('None', 'my_theme-admin-td'),
                            'sepia'     => __('Sepia', 'my_theme-admin-td'),
                            'grayscale' => __('Grayscale', 'my_theme-admin-td'),
                            'blur'      => __('Blur', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Effects filter to apply to the image on hover.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Hover Effects Filter Behaviour', 'my_theme-admin-td'),
                        'id'      => 'hover_filter_invert',
                        'type'    => 'select',
                        'default' => 'image-filter-onhover',
                        'options' => array(
                            'image-filter-onhover'    => __('Apply Filter On Hover', 'my_theme-admin-td'),
                            'image-filter-invert'     => __('Apply Filter On Hover Out', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('When to apply the Hover Effects Filter.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Zoom Button Text', 'my_theme-admin-td'),
                        'id'      => 'button_text_zoom',
                        'type'    => 'text',
                        'default' => __('View Larger', 'my_theme-admin-td'),
                        'desc'    => __('This text will be shown in the zoom button.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Link Button Text', 'my_theme-admin-td'),
                        'id'      => 'button_text_details',
                        'type'    => 'text',
                        'default' => __('More Details', 'my_theme-admin-td'),
                        'desc'    => __('This text will be shown below the link button.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Overlay Caption Vertical Alignment', 'my_theme-admin-td'),
                        'id'        => 'overlay_caption_vertical',
                        'type'      => 'select',
                        'default'   => 'middle',
                        'options' => array(
                            'top'    => __('Top', 'my_theme-admin-td'),
                            'middle' => __('Middle', 'my_theme-admin-td'),
                            'bottom' => __('Bottom', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Vertical alignment of the caption title and text.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Overlay Animation', 'my_theme-admin-td'),
                        'id'      => 'overlay_animation',
                        'type'    => 'select',
                        'default' => 'fade-in',
                        'options' => array(
                            'fade-in'             => __('Fade in', 'my_theme-admin-td'),
                            'fade-in from-top'    => __('Fade From Top', 'my_theme-admin-td'),
                            'fade-in from-bottom' => __('Fade From Bottom', 'my_theme-admin-td'),
                            'fade-in from-left'   => __('Fade From Left', 'my_theme-admin-td'),
                            'fade-in from-right'  => __('Fade From Right', 'my_theme-admin-td'),
                            'preview-bottom'      => __('Caption band at bottom of image', 'my_theme-admin-td'),
                            'fade-none'           => __('No Animation', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('What animation will be used to reveal the image hover overlay.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Overlay Grid', 'my_theme-admin-td'),
                        'desc'      => __('Grid pattern to apply over the image on hover.', 'my_theme-admin-td'),
                        'id'        => 'overlay_grid',
                        'type'      => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'      => __('Overlay Icon', 'my_theme-admin-td'),
                        'desc'      => __('Icon to show on the hover overlay.', 'my_theme-admin-td'),
                        'id'        => 'overlay_icon',
                        'type'    => 'select',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/svgs.php',
                        'default' => 'link',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'shapedimage' => array(
        'shortcode'     => 'shapedimage',
        'title'         => __('Shaped Image', 'my_theme-admin-td'),
        'desc'          => __('Displays an image that is clipped to a shape.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Image', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Image Source', 'my_theme-admin-td'),
                        'id'      => 'image',
                        'type'    => 'upload',
                        'store'   => 'id',
                        'default' => '',
                        'desc'    => __('Choose an image to use.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Image size', 'my_theme-admin-td'),
                        'desc'    => __('Choose the size that the image will have', 'my_theme-admin-td'),
                        'id'      => 'shape_size',
                        'type'    => 'select',
                        'default' => 'medium',
                        'admin_label' => true,
                        'options' => array(
                            'normal' => __('Normal', 'my_theme-admin-td'),
                            'mini'   => __('Mini', 'my_theme-admin-td'),
                            'small'  => __('Small', 'my_theme-admin-td'),
                            'medium' => __('Medium', 'my_theme-admin-td'),
                            'big'    => __('Big', 'my_theme-admin-td'),
                            'huge'   => __('Huge', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Shape', 'my_theme-admin-td'),
                        'desc'    => __('Choose if the image will be rounded or not', 'my_theme-admin-td'),
                        'id'      => 'shape',
                        'type'    => 'select',
                        'default' => 'round',
                        'options'    => array(
                            'square' => __('Square', 'my_theme-admin-td'),
                            'round'  => __('Circle', 'my_theme-admin-td'),
                        )
                    ),
                    array(
                        'name'    => __('Hover Animation', 'PLUGIN_TD'),
                        'desc'    => __('Choose a hover animation', 'PLUGIN_TD'),
                        'id'      => 'animation',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/animations.php'
                    ),
                    array(
                        'name'    => __('Open In Magnific Popup', 'PLUGIN_TD'),
                        'desc'    => __('Open the original image in magnific on click (overrides link option)', 'PLUGIN_TD'),
                        'id'      => 'magnific',
                        'type'    => 'select',
                        'default' => 'off',
                        'options' => array(
                            'on'    => __('On', 'PLUGIN_TD'),
                            'off'   => __('Off', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'    => __('Image Alt', 'my_theme-admin-td'),
                        'id'      => 'alt',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Place the alt of the image here', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Image Title', 'my_theme-admin-td'),
                        'id'      => 'title',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Place the title attribute of the image here', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Link', 'my_theme-admin-td'),
                        'id'      => 'link',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Place a link here', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Open Links In', 'my_theme-admin-td'),
                        'id'      => 'link_target',
                        'type'    => 'select',
                        'default' => '_self',
                        'options' => array(
                            '_self'   => __('Same page as it was clicked ', 'my_theme-admin-td'),
                            '_blank'  => __('Open in new window/tab', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Where the link will open.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Hover Grid', 'my_theme-admin-td'),
                        'desc'      => __('Adds an overlay pattern image when you hover over the image.', 'my_theme-admin-td'),
                        'id'        => 'overlay_grid',
                        'type'      => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'      => __('Background Colour', 'my_theme-admin-td'),
                        'desc'      => __('Set the colour shape background (will be seen if transparant images are used)', 'my_theme-admin-td'),
                        'id'        => 'background_colour',
                        'type'      => 'colour',
                        'default'   => '#e9e9e9',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'featuredicon' => array(
        'shortcode'     => 'featuredicon',
        'title'         => __('Featured Icon', 'my_theme-admin-td'),
        'desc'          => __('Creates a shape with an Font Awesome icon in the middle.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Icon', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Icon', 'my_theme-admin-td'),
                        'id'      => 'icon',
                        'type'    => 'select',
                        'options' => 'icons',
                        'default' => 'glass',
                        'admin_label' => true,
                        'desc'    => __('Choose an icon to use in your featured icon', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Featured Icon Size', 'my_theme-admin-td'),
                        'desc'    => __('Choose the size that the image will have', 'my_theme-admin-td'),
                        'id'      => 'shape_size',
                        'type'    => 'select',
                        'default' => 'medium',
                        'admin_label' => true,
                        'options' => array(
                            'normal' => __('Normal', 'my_theme-admin-td'),
                            'mini'   => __('Mini', 'my_theme-admin-td'),
                            'small'  => __('Small', 'my_theme-admin-td'),
                            'medium' => __('Medium', 'my_theme-admin-td'),
                            'big'    => __('Big', 'my_theme-admin-td'),
                            'huge'   => __('Huge', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'        => __('Shape', 'my_theme-admin-td'),
                        'desc'        => __('Choose if the image will be roundrd or not', 'my_theme-admin-td'),
                        'id'          => 'shape',
                        'type'        => 'select',
                        'default'     => 'round',
                        'admin_label' => true,
                        'options'     => array(
                            'rect'   => __('Rectangle', 'my_theme-admin-td'),
                            'square' => __('Square', 'my_theme-admin-td'),
                            'round'  => __('Circle', 'my_theme-admin-td'),
                        )
                    ),
                    array(
                        'name'    => __('Icon Link', 'PLUGIN_TD'),
                        'desc'    => __('Make the icon link to a web url.', 'PLUGIN_TD'),
                        'id'      => 'link',
                        'type'    => 'text',
                        'default' => '',
                    ),
                    array(
                        'name'    => __('Hover Animation', 'PLUGIN_TD'),
                        'desc'    => __('Choose an icon animation', 'PLUGIN_TD'),
                        'id'      => 'animation',
                        'type'    => 'select',
                        'default' => '',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/animations.php'
                    ),
                    array(
                        'name'      => __('Background Grid', 'my_theme-admin-td'),
                        'desc'      => __('Adds an overlay pattern to the shape background.', 'my_theme-admin-td'),
                        'id'        => 'overlay_grid',
                        'type'      => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'      => __('Icon Colour', 'my_theme-admin-td'),
                        'desc'      => __('Set the colour of the icon', 'my_theme-admin-td'),
                        'id'        => 'icon_colour',
                        'type'      => 'colour',
                        'default'   => '#000000',
                    ),
                    array(
                        'name'      => __('Background Colour', 'my_theme-admin-td'),
                        'desc'      => __('Set the colour shape background.', 'my_theme-admin-td'),
                        'id'        => 'background_colour',
                        'type'      => 'colour',
                        'default'   => '#e9e9e9',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'svgfeaturedicon' => array(
        'shortcode'     => 'svgfeaturedicon',
        'title'         => __('Featured SVG Icon', 'my_theme-admin-td'),
        'desc'          => __('Creates a shape with an svg icon in the middle.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Icon', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Icon', 'my_theme-admin-td'),
                        'id'      => 'icon',
                        'type'    => 'select',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/svgs.php',
                        'default' => 'link',
                        'desc'    => __('Choose an icon to use in your featured icon', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Featured Icon Size', 'my_theme-admin-td'),
                        'desc'    => __('Choose the size that the image will have', 'my_theme-admin-td'),
                        'id'      => 'shape_size',
                        'type'    => 'select',
                        'default' => 'medium',
                        'admin_label' => true,
                        'options' => array(
                            'normal' => __('Normal', 'my_theme-admin-td'),
                            'mini'   => __('Mini', 'my_theme-admin-td'),
                            'small'  => __('Small', 'my_theme-admin-td'),
                            'medium' => __('Medium', 'my_theme-admin-td'),
                            'big'    => __('Big', 'my_theme-admin-td'),
                            'huge'   => __('Huge', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'        => __('Shape', 'my_theme-admin-td'),
                        'desc'        => __('Choose if the image will be roundrd or not', 'my_theme-admin-td'),
                        'id'          => 'shape',
                        'type'        => 'select',
                        'default'     => 'round',
                        'admin_label' => true,
                        'options'     => array(
                            'rect'   => __('Rectangle', 'my_theme-admin-td'),
                            'square' => __('Square', 'my_theme-admin-td'),
                            'round'  => __('Circle', 'my_theme-admin-td'),
                        )
                    ),
                    array(
                        'name'    => __('Icon Link', 'PLUGIN_TD'),
                        'desc'    => __('Make the icon link to a web url.', 'PLUGIN_TD'),
                        'id'      => 'link',
                        'type'    => 'text',
                        'default' => '',
                    ),
                    array(
                        'name'    => __('Hover Animation', 'PLUGIN_TD'),
                        'desc'    => __('Choose an icon animation', 'PLUGIN_TD'),
                        'id'      => 'animation',
                        'type'    => 'select',
                        'default' => '',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/animations.php'
                    ),
                    array(
                        'name'      => __('Background Grid', 'my_theme-admin-td'),
                        'desc'      => __('Adds an overlay pattern to the shape background.', 'my_theme-admin-td'),
                        'id'        => 'overlay_grid',
                        'type'      => 'slider',
                        'default'   => '0',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 0,
                            'step'      => 10,
                        )
                    ),
                    array(
                        'name'      => __('Icon Colour', 'my_theme-admin-td'),
                        'desc'      => __('Set the colour of the icon', 'my_theme-admin-td'),
                        'id'        => 'icon_colour',
                        'type'      => 'colour',
                        'default'   => '#000000',
                    ),
                    array(
                        'name'      => __('Background Colour', 'my_theme-admin-td'),
                        'desc'      => __('Set the colour shape background.', 'my_theme-admin-td'),
                        'id'        => 'background_colour',
                        'type'      => 'colour',
                        'default'   => '#e9e9e9',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'icon' => array(
        'shortcode'   => 'icon',
        'title'       => __('Icon', 'PLUGIN_TD'),
        'desc'        => __('Displays a Font Awesome icon.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'General',
                'fields'  => array(
                    array(
                        'name'    => __('Font Size', 'PLUGIN_TD'),
                        'desc'    => __('Size of font to use for icon ( set to 0 to inhertit font size from container )', 'PLUGIN_TD'),
                        'id'      => 'size',
                        'type'    => 'slider',
                        'default' => '16',
                        'attr'    => array(
                            'max'  => 48,
                            'min'  => 0,
                            'step' => 1
                        )
                    ),
                )
            ),
            array(
                'title'   => 'Icon',
                'fields'  => array(
                    array(
                        'name'    => __('Icon', 'PLUGIN_TD'),
                        'desc'    => __('Type of button to display', 'PLUGIN_TD'),
                        'id'      => 'content',
                        'type'    => 'select',
                        'options' => 'icons',
                        'default' => 'glass',
                        'admin_label' => true
                    )
                ),
            ),
        ),
    ),
    'button' =>  array(
        'shortcode'   => 'button',
        'title'       => __('Button', 'PLUGIN_TD'),
        'desc'        => __('Creates a fancy call to action button with or without an icon.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'General',
                'fields'  => array(
                    array(
                        'name'    => __('Button type', 'PLUGIN_TD'),
                        'desc'    => __('Type of button to display', 'PLUGIN_TD'),
                        'id'      => 'type',
                        'type'    => 'select',
                        'default' => 'default',
                        'admin_label' => true,
                        'options' => array(
                            'default' => __('Default', 'PLUGIN_TD'),
                            'primary' => __('Primary', 'PLUGIN_TD'),
                            'info'    => __('Info', 'PLUGIN_TD'),
                            'success' => __('Success', 'PLUGIN_TD'),
                            'warning' => __('Warning', 'PLUGIN_TD'),
                            'danger'  => __('Danger', 'PLUGIN_TD'),
                            'link'    => __('Link', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'    => __('Button size', 'PLUGIN_TD'),
                        'desc'    => __('Size of button to display', 'PLUGIN_TD'),
                        'id'      => 'size',
                        'type'    => 'select',
                        'default' => 'normal',
                        'options' => array(
                            'normal'      => __('Default', 'PLUGIN_TD'),
                            'lg' => __('Large', 'PLUGIN_TD'),
                            'sm'      => __('Small', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'    => __('Text', 'PLUGIN_TD'),
                        'id'      => 'label',
                        'type'    => 'text',
                        'admin_label' => true,
                        'default' => __('My button', 'PLUGIN_TD'),
                        'desc'    => __('Add a label to the button', 'PLUGIN_TD'),
                    ),
                    array(
                        'name'    => __('Link', 'PLUGIN_TD'),
                        'id'      => 'link',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Where the button links to', 'PLUGIN_TD'),
                    ),
                )
            ),
            array(
                'title'   => 'Advanced',
                'fields'  => array(
                    array(
                        'name'    => __('Extra classes', 'PLUGIN_TD'),
                        'id'      => 'xclass',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Add an extra class to the button', 'PLUGIN_TD'),
                    ),
                    array(
                        'name'    => __('Open Link In', 'PLUGIN_TD'),
                        'id'      => 'link_open',
                        'type'    => 'select',
                        'default' => '_self',
                        'options' => array(
                            '_self'   => __('Same page as it was clicked ', 'PLUGIN_TD'),
                            '_blank'  => __('Open in new window/tab', 'PLUGIN_TD'),
                            '_parent' => __('Open the linked document in the parent frameset', 'PLUGIN_TD'),
                            '_top'    => __('Open the linked document in the full body of the window', 'PLUGIN_TD')
                        ),
                        'desc'    => __('Where the button link opens to', 'PLUGIN_TD'),
                    ),
                )
            ),
            array(
                'title'   => 'Icon',
                'fields'  => array(
                    array(
                        'name'    => __('Icon Position', 'PLUGIN_TD'),
                        'desc'    => __('Which side of the button to show the icon.', 'PLUGIN_TD'),
                        'id'      => 'icon_position',
                        'type'    => 'select',
                        'default' => 'right',
                        'options' => array(
                            'left'  => __('Left', 'PLUGIN_TD'),
                            'right' => __('Right', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'    => __('Icon Animation', 'PLUGIN_TD'),
                        'desc'    => __('Choose an icon animation', 'PLUGIN_TD'),
                        'id'      => 'animation',
                        'type'    => 'select',
                        'default' => 'none',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/animations.php'
                    ),
                    array(
                        'name'    => __('Icon', 'PLUGIN_TD'),
                        'desc'    => __('Icon to display', 'PLUGIN_TD'),
                        'id'      => 'icon',
                        'admin_label' => true,
                        'type'    => 'select',
                        'options' => 'icons',
                        'default' => ''
                    ),
                    array(
                        'name'      => __('Custom Color', 'my_theme-admin-td'),
                        'desc'      => __('Sets custom colors for the button', 'my_theme-admin-td'),
                        'id'        => 'custom_color',
                        'type'      => 'select',
                        'options'   => array(
                            'true'  => __('On', 'my_theme-admin-td'),
                            'false' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default'   =>  'false',
                    ),
                    array(
                        'name'      => __('Button Background Color', 'my_theme-admin-td'),
                        'desc'      => __('Change the background color of the button', 'my_theme-admin-td'),
                        'id'        => 'background_color',
                        'type'      => 'colour',
                        'default'   => '#82c9ed',
                    ),
                    array(
                        'name'      => __('Text Font Color', 'my_theme-admin-td'),
                        'desc'      => __('Change the font color of the text on the button', 'my_theme-admin-td'),
                        'id'        => 'text_font_color',
                        'type'      => 'colour',
                        'default'   => '#fff',
                    ),
                ),
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        ),
    ),
    'vc_jumbotron' => array(
        'shortcode'   => 'vc_jumbotron',
        'title'       => __('Jumbotron', 'PLUGIN_TD'),
        'desc'          => __('Creates a Jumbotron bootstrap component.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'PLUGIN_TD'),
                'fields'  => array(
                    array(
                        'name'    => __('Title', 'PLUGIN_TD'),
                        'id'      => 'title',
                        'type'    => 'text',
                        'holder'  => 'h1',
                        'default' => __('', 'PLUGIN_TD'),
                        'desc'    => __('The title of the jumbotron', 'PLUGIN_TD'),
                    ),
                    array(
                        'name'    => __('Main Text', 'PLUGIN_TD'),
                        'id'      => 'content',
                        'type'    => 'textarea_html',
                        'default' => __('This is a simple hero unit.', 'PLUGIN_TD'),
                        'desc'    => __('Main text that will appear in the jumbotron', 'PLUGIN_TD'),
                    )
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        ),
    ),
    'vc_message' => array(
        'shortcode'   => 'vc_message',
        'title'       => __('Alert', 'PLUGIN_TD'),
        'desc'          => __('Creates a Bootstrap Alert box.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'PLUGIN_TD'),
                'fields'  => array(
                    array(
                        'name'    => __('Alert type', 'PLUGIN_TD'),
                        'desc'    => __('Type of alert to display', 'PLUGIN_TD'),
                        'id'      => 'color',
                        'type'    => 'select',
                        'default' => 'alert-success',
                        'options' => array(
                            'alert-success' => __('Success', 'PLUGIN_TD'),
                            'alert-info'    => __('Information', 'PLUGIN_TD'),
                            'alert-warning' => __('Warning', 'PLUGIN_TD'),
                            'alert-danger'  => __('Danger', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'    => __('Title', 'PLUGIN_TD'),
                        'id'      => 'title',
                        'type'    => 'text',
                        'holder'  => 'h2',
                        'default' => __('Watch Out!', 'PLUGIN_TD'),
                        'desc'    => __('The bold text that appears first in the alert', 'PLUGIN_TD'),
                    ),
                    array(
                        'name'    => __('Main Text', 'PLUGIN_TD'),
                        'id'      => 'content',
                        'type'    => 'text',
                        'holder'  => 'div',
                        'default' => __('Change a few things up and try submitting again.', 'PLUGIN_TD'),
                        'desc'    => __('Main text that will appear in the alert box', 'PLUGIN_TD'),
                    ),
                    array(
                        'name'    => __('Dismissable', 'PLUGIN_TD'),
                        'id'      => 'dismissable',
                        'type'    => 'select',
                        'default' => 'false',
                        'desc'    => __('Defines if the alert can be removed using an x in the corner.', 'PLUGIN_TD'),
                        'options' => array(
                            'true'  => __('Closable', 'PLUGIN_TD'),
                            'false' => __('Not Closable', 'PLUGIN_TD'),
                        ),
                    )
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        ),
    ),
    'carousel' => array(
        'shortcode'     => 'carousel',
        'title'         => __('Carousel', 'my_theme-admin-td'),
        'desc'          => __('Adds a Carousel slideshow to the page.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Carousel', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Choose a slideshow', 'my_theme-admin-td'),
                        'desc'    => __('Populate your slider with one of the slideshows you created', 'my_theme-admin-td'),
                        'id'      => 'carousel',
                        'default' =>  '',
                        'type'    => 'select',
                        'options' => 'slideshow',
                    ),
                    array(
                        'name'    => __('Carousel Count', 'my_theme-admin-td'),
                        'desc'    => __('Number of slides to show, set to 0 to show all', 'my_theme-admin-td'),
                        'id'      => 'count',
                        'type'    => 'slider',
                        'default' => '0',
                        'admin_label' => true,
                        'attr'    => array(
                            'max'  => 30,
                            'min'  => 0,
                            'step' => 1
                        )
                    ),
                    array(
                        'name'      => __('Show navigation arrows', 'my_theme-admin-td'),
                        'id'        => 'directionnav',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Show controls', 'my_theme-admin-td'),
                        'id'        => 'showcontrols',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Captions', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Show Captions', 'my_theme-admin-td'),
                        'id'        => 'captions',
                        'type'      => 'select',
                        'default'   =>  'show',
                        'options' => array(
                            'show' => __('Show', 'my_theme-admin-td'),
                            'hide' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'panel' => array(
        'shortcode' => 'panel',
        'title'     => __('Panel', 'PLUGIN_TD'),
        'desc'      => __('Creates a Bootstrap Panel with a title and some content.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'PLUGIN_TD'),
                'fields'  => array(
                    array(
                        'name'    => __('Title', 'PLUGIN_TD'),
                        'id'      => 'title',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('The title of the panel.', 'PLUGIN_TD'),
                    ),
                    array(
                        'name'    => __('Panel Style', 'PLUGIN_TD'),
                        'desc'    => __('Style of panel to display', 'PLUGIN_TD'),
                        'id'      => 'style',
                        'type'    => 'select',
                        'default' => 'panel-default',
                        'options' => array(
                            'panel-default' => __('Default', 'PLUGIN_TD'),
                            'panel-primary'  => __('Primary', 'PLUGIN_TD'),
                            'panel-info'     => __('Info', 'PLUGIN_TD'),
                            'panel-success'  => __('Success', 'PLUGIN_TD'),
                            'panel-warning'  => __('Warning', 'PLUGIN_TD'),
                            'panel-danger'   => __('Danger', 'PLUGIN_TD'),
                        )
                    )
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        ),
    ),
    'progress' =>    array(
        'shortcode'   => 'progress',
        'title'       => __('Progress Bar', 'PLUGIN_TD'),
        'desc'        => __('Creates a Bootstrap progress bar with a % value.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'    => __('Percentage', 'PLUGIN_TD'),
                        'desc'    => __('Percentage of the progress bar', 'PLUGIN_TD'),
                        'id'      => 'percentage',
                        'type'    => 'slider',
                        'default' => '50',
                        'attr'    => array(
                            'max'  => 100,
                            'min'  => 1,
                            'step' => 1
                        )
                    ),
                    array(
                        'name'    => __('Progress Bar Text', 'PLUGIN_TD'),
                        'desc'    => __('Text to be displayed on the progress bar', 'PLUGIN_TD'),
                        'id'      => 'progress_text',
                        'type'    => 'text',
                        'holder'  => 'h3',
                        'default' => ''
                    ),
                    array(
                        'name'    => __('Bar Type', 'PLUGIN_TD'),
                        'desc'    => __('Type of bar to display', 'PLUGIN_TD'),
                        'id'      => 'type',
                        'type'    => 'select',
                        'default' => 'progress',
                        'options' => array(
                            'progress'                        => __('Normal', 'PLUGIN_TD'),
                            'progress progress-striped'       => __('Striped', 'PLUGIN_TD'),
                            'progress progress-striped active'=> __('Animated', 'PLUGIN_TD'),
                        ),
                    ),
                    array(
                        'name'    => __('Bar Style', 'PLUGIN_TD'),
                        'desc'    => __('Style of bar to display', 'PLUGIN_TD'),
                        'id'      => 'style',
                        'type'    => 'select',
                        'default' => 'progress-bar-info',
                        'options' => array(
                            'progress-bar-primary'  => __('Primary', 'PLUGIN_TD'),
                            'progress-bar-info'     => __('Info', 'PLUGIN_TD'),
                            'progress-bar-success'  => __('Success', 'PLUGIN_TD'),
                            'progress-bar-warning'  => __('Warning', 'PLUGIN_TD'),
                            'progress-bar-danger'   => __('Danger', 'PLUGIN_TD'),
                        ),
                    ),
                ),
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        ),
    ),
    'lead' => array(
        'shortcode'   => 'lead',
        'title'       => __('Lead Paragraph', 'PLUGIN_TD'),
        'desc'        => __('Adds a lead paragraph, with slightly larger and bolder text.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'      => __('Text Alignment', 'my_theme-admin-td'),
                        'id'        => 'align',
                        'type'      => 'select',
                        'default'   => 'center',
                        'options' => array(
                            'default'   => __('Default alignment', 'my_theme-admin-td'),
                            'left'   => __('Left', 'my_theme-admin-td'),
                            'center' => __('Center', 'my_theme-admin-td'),
                            'right'  => __('Right', 'my_theme-admin-td'),
                            'justify'  => __('Justify', 'my_theme-admin-td')
                        ),
                        'desc'    => __('Sets the text alignment of the lead text.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Lead Text', 'my_theme-admin-td'),
                        'holder'    => 'p',
                        'id'        => 'content',
                        'type'      => 'textarea',
                        'default'   => '',
                        'desc'    => __('Text to show in the lead text paragraph.', 'my_theme-admin-td'),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'blockquote' => array(
        'shortcode'   => 'blockquote',
        'title'       => __('Blockquote', 'PLUGIN_TD'),
        'desc'        => __('Creates a quotation.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'      => __('Text Alignment', 'my_theme-admin-td'),
                        'id'        => 'align',
                        'type'      => 'select',
                        'default'   => 'left',
                        'options' => array(
                            'default'   => __('Default alignment', 'my_theme-admin-td'),
                            'left'   => __('Left', 'my_theme-admin-td'),
                            'right'  => __('Right', 'my_theme-admin-td'),
                            'center'  => __('Center', 'my_theme-admin-td'),
                            'justify'  => __('Justify', 'my_theme-admin-td')
                        ),
                        'desc'    => __('Sets the text alignment of blockquote.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'      => __('Quote Text', 'my_theme-admin-td'),
                        'holder'    => 'p',
                        'id'        => 'content',
                        'type'      => 'textarea',
                        'default'   => '',
                        'desc'    => __('Text to show in the quote.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Who?', 'PLUGIN_TD'),
                        'id'      => 'who',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Who said the quote.', 'PLUGIN_TD'),
                    ),
                    array(
                        'name'    => __('Citation', 'PLUGIN_TD'),
                        'id'      => 'cite',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Citation of the quote (i.e the source).', 'PLUGIN_TD'),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'code' => array(
        'shortcode'   => 'code',
        'title'       => __('Code', 'PLUGIN_TD'),
        'desc'        => __('For use adding source code to a page.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'      => __('Source Code', 'my_theme-admin-td'),
                        'holder'    => 'p',
                        'id'        => 'content',
                        'type'      => 'textarea',
                        'default'   => '',
                        'desc'    => __('Source code to display.', 'my_theme-admin-td'),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'countdown' => array(
        'shortcode'   => 'countdown',
        'title'       => __('Countdown Timer', 'PLUGIN_TD'),
        'desc'        => __('Adds a countdown timer for coming soon pages.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'      => __('Countdown Date', 'my_theme-admin-td'),
                        'id'        => 'date',
                        'type'      => 'text',
                        'default'   => '',
                        'admin_label' => true,
                        'desc'    => __('Date to countdown to in the format YYYY/MM/DD HH:MM.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Number Font Size', 'my_theme-admin-td'),
                        'desc'    => __('Choose size of the font to use for the countdown numbers.', 'my_theme-admin-td'),
                        'id'      => 'number_size',
                        'type'    => 'select',
                        'options' => array(
                            'normal' => __('Normal', 'my_theme-admin-td'),
                            'super'  => __('Super (60px)', 'my_theme-admin-td'),
                            'hyper'  => __('Hyper (96px)', 'my_theme-admin-td'),
                        ),
                        'default' => 'normal',
                    ),
                    array(
                        'name'    => __('Number Font Weight', 'my_theme-admin-td'),
                        'desc'    => __('Choose weight of the font of the countdown numbers.', 'my_theme-admin-td'),
                        'id'      => 'number_weight',
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
                        'name'    => __('Number Underline', 'my_theme-admin-td'),
                        'desc'    => __('Adds an underline effect below the countdown numbers.', 'my_theme-admin-td'),
                        'id'      => 'number_underline',
                        'default' => 'bordered',
                        'type' => 'select',
                        'options' => array(
                            'bordered'    => __('Show', 'my_theme-admin-td'),
                            'no-underline' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'vc_scroll' => array(
        'shortcode'   => 'vc_scroll',
        'title'       => __('Scroll to button', 'PLUGIN_TD'),
        'desc'          => __('Creates a link for scrolling to other places in your page.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'PLUGIN_TD'),
                'fields'  => array(
                    array(
                        'name'    => __('Link', 'PLUGIN_TD'),
                        'id'      => 'link',
                        'type'    => 'text',
                        'holder'  => 'a',
                        'default' => __('#id', 'PLUGIN_TD'),
                        'desc'    => __('The link for the scroll button', 'PLUGIN_TD'),
                    ),
                    array(
                        'name'      => __('Arrow for the scroll to link', 'my_theme-admin-td'),
                        'id'        => 'icon',
                        'type'      => 'select',
                        'default'   =>  'down',
                        'options' => array(
                            'down' => __('Down', 'my_theme-admin-td'),
                            'up' => __('Up', 'my_theme-admin-td'),
                            'left' => __('Left', 'my_theme-admin-td'),
                            'right' => __('Right', 'my_theme-admin-td')
                        ),
                    ),
                    array(
                        'name'    => __('Place to the bottom', 'my_theme-admin-td'),
                        'desc'    => __('Place the button to the bottom of the section', 'my_theme-admin-td'),
                        'id'      => 'place_bottom',
                        'default' => '',
                        'type' => 'select',
                        'options' => array(
                            'on'  => __('Yes', 'my_theme-admin-td'),
                            '' => __('No', 'my_theme-admin-td')
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        ),
    ),
    'tags' => array(
        'shortcode'   => 'tags',
        'title'       => __('Tags', 'PLUGIN_TD'),
        'desc'        => __('Adds a list of tags', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'    => __('Tag List', 'PLUGIN_TD'),
                        'id'      => 'tags',
                        'type'    => 'text',
                        'admin_label' => true,
                        'default' => __('Web Design, Logo Design, CSS Animations', 'PLUGIN_TD'),
                        'desc'    => __('Comma seperated values that will be inserted in the tag list', 'PLUGIN_TD'),
                    ),
                    array(
                        'name'    => __('Size', 'my_theme-admin-td'),
                        'desc'    => __('Choose size of the tag list.', 'my_theme-admin-td'),
                        'id'      => 'size',
                        'type'    => 'select',
                        'options' => array(
                            'normal' => __('Normal', 'my_theme-admin-td'),
                            'lg'     => __('Large', 'my_theme-admin-td'),
                            'sm'     => __('Mini', 'my_theme-admin-td'),
                        ),
                        'default' => 'normal',
                    ),
                    array(
                        'name'    => __('Style', 'my_theme-admin-td'),
                        'desc'    => __('Choose the style of the tag list.', 'my_theme-admin-td'),
                        'id'      => 'style',
                        'default' => 'tag-list',
                        'type' => 'select',
                        'options' => array(
                            'tag-list'        => __('Block', 'my_theme-admin-td'),
                            'tag-list-inline' => __('Inline-Block', 'my_theme-admin-td'),
                        ),
                    ),
                ),
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        ),
    ),
    'vc_video' => array(
        'shortcode'     => 'vc_video',
        'title'         => __('Video Player', 'my_theme-admin-td'),
        'desc'          => __('Adds a video player.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Video Options', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Video URL', 'my_theme-admin-td'),
                        'id'        => 'src',
                        'type'      => 'text',
                        'default'   =>  '',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'vc_column_text' => array(
        'shortcode'     => 'vc_column_text',
        'title'         => __('Text Block', 'my_theme-admin-td'),
        'desc'          => __('A block of text with WYSIWYG editor.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Video Options', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Text', 'my_theme-admin-td'),
                        'id'        => 'content',
                        'type'      => 'textarea_html',
                        'holder'    => 'div',
                        'default'   =>  '<p>I am text block. Click edit button to change this text.</p>',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'sharing' => array(
        'shortcode'   => 'sharing',
        'title'       => __('Social Sharing Icons', 'PLUGIN_TD'),
        'desc'        => __('Adds Social Sharing icons to your pages', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'my_theme-admin-td'),
                'fields'  => array(
                    array(
                        'name'      => __('Title', 'my_theme-admin-td'),
                        'id'        => 'title',
                        'type'      => 'text',
                        'desc'      => __('Title that will appear above the social share icons.', 'my_theme-admin-td'),
                        'default'   => '',
                    ),
                    array(
                        'name'    => __('Social Networks', 'my_theme-admin-td'),
                        'desc'    => __('Select which social networks you would like to share on.', 'my_theme-admin-td'),
                        'id'      => 'social_networks',
                        'default' =>  'facebook,twitter,google,pinterest,linkedin',
                        'type'    => 'select',
                        'admin_label' => true,
                        'attr' => array(
                            'multiple' => '',
                            'style' => 'height:100px'
                        ),
                        'options' => array(
                            'facebook'  => __('Facebook', 'my_theme-admin-td'),
                            'twitter'   => __('Twitter', 'my_theme-admin-td'),
                            'google'    => __('Google+', 'my_theme-admin-td'),
                            'pinterest' => __('Pinterest', 'my_theme-admin-td'),
                            'linkedin' => __('LinkedIn', 'my_theme-admin-td'),
                        )
                    ),
                    array(
                        'name'    => __('Icon Size', 'my_theme-admin-td'),
                        'desc'    => __('Size of the social icons.', 'my_theme-admin-td'),
                        'id'      => 'icon_size',
                        'default' => 'sm',
                        'type' => 'select',
                        'options' => array(
                            'sm' => __('Small', 'my_theme-admin-td'),
                            'lg' => __('Large', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Show Background', 'my_theme-admin-td'),
                        'desc'    => __('Show a coloured background behind the social icon.', 'my_theme-admin-td'),
                        'id'      => 'background_show',
                        'default' => 'background',
                        'type' => 'select',
                        'options' => array(
                            'background' => __('Show', 'my_theme-admin-td'),
                            'simple'     => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Background Shape', 'my_theme-admin-td'),
                        'desc'    => __('Shape of coloured background behind the social icon.', 'my_theme-admin-td'),
                        'id'      => 'background_shape',
                        'default' => 'circle',
                        'type' => 'select',
                        'options' => array(
                            'circle' => __('Circle', 'my_theme-admin-td'),
                            'rect'   => __('Square', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'      => __('Background Shape Colour', 'my_theme-admin-td'),
                        'desc'      => __('Colour of background behind the social icon.', 'my_theme-admin-td'),
                        'id'        => 'background_colour',
                        'type'      => 'colour',
                        'format'    => 'rgba',
                       'default'   => '',
                       'attr'      => array(
                           'class' => 'allow-empty'
                        ),
                    )
                ),
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'socialicons' => array(
        'shortcode'   => 'socialicons',
        'title'       => __('Social Icons', 'PLUGIN_TD'),
        'desc'        => __('Adds Social icons to your pages', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'my_theme-admin-td'),
                'fields'  => array(
                    array(
                        'name'      => __('Title', 'my_theme-admin-td'),
                        'id'        => 'title',
                        'type'      => 'text',
                        'desc'      => __('Title that will appear above the social icons.', 'my_theme-admin-td'),
                        'default'   => '',
                    ),
                    array(
                        'name'    => __('Icon Size', 'my_theme-admin-td'),
                        'desc'    => __('Size of the social icons.', 'my_theme-admin-td'),
                        'id'      => 'icon_size',
                        'default' => 'sm',
                        'type' => 'select',
                        'options' => array(
                            'sm' => __('Small', 'my_theme-admin-td'),
                            'lg' => __('Large', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Show Background', 'my_theme-admin-td'),
                        'desc'    => __('Show a coloured background behind the social icon.', 'my_theme-admin-td'),
                        'id'      => 'background_show',
                        'default' => 'background',
                        'type' => 'select',
                        'options' => array(
                            'background' => __('Show', 'my_theme-admin-td'),
                            'simple'     => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Background Shape', 'my_theme-admin-td'),
                        'desc'    => __('Shape of coloured background behind the social icon.', 'my_theme-admin-td'),
                        'id'      => 'background_shape',
                        'default' => 'circle',
                        'type' => 'select',
                        'options' => array(
                            'circle' => __('Circle', 'my_theme-admin-td'),
                            'rect'   => __('Square', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Background Shape Colour', 'my_theme-admin-td'),
                        'desc'    => __('Colour of background behind the social icon.', 'my_theme-admin-td'),
                        'id'      => 'background_colour',
                        'default' => '#82c9ed',
                        'type' => 'colour',
                    ),
                    array(
                        'name'    => __('Open Social Links In', 'my_theme-admin-td'),
                        'id'      => 'link_target',
                        'type'    => 'select',
                        'default' => '_self',
                        'options' => array(
                            '_self'   => __('Same page as it was clicked ', 'my_theme-admin-td'),
                            '_blank'  => __('Open in new window/tab', 'my_theme-admin-td'),
                            '_parent' => __('Open the linked document in the parent frameset', 'my_theme-admin-td'),
                            '_top'    => __('Open the linked document in the full body of the window', 'my_theme-admin-td')
                        ),
                        'desc'    => __('Where the social links open to', 'my_theme-admin-td'),
                    ),
                ),
            ),
            array(
                'title'     => __('Links', 'my_theme-admin-td'),
                'fields'    => pm_create_social_options(),
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'divider' => array(
        'shortcode'   => 'divider',
        'title'       => __('Divider', 'PLUGIN_TD'),
        'desc'        => __('Adds space between elements.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'sections'    => array(
            array(
                'title'   => __('General', 'my_theme-admin-td'),
                'fields'  => array(
                    array(
                        'name'    => __('Visibility', 'my_theme-admin-td'),
                        'desc'    => __('Toggles if the divider is visible or not.', 'my_theme-admin-td'),
                        'id'      => 'visibility',
                        'default' => 'hidden',
                        'type'    => 'select',
                        'options' => array(
                            'visible' => __('Show', 'my_theme-admin-td'),
                            'hidden' => __('Hide', 'my_theme-admin-td'),
                        ),
                    ),
                    array(
                        'name'    => __('Background Colour', 'my_theme-admin-td'),
                        'desc'    => __('Background colour of the divider if it is set to visible.', 'my_theme-admin-td'),
                        'id'      => 'background_colour',
                        'default' => '#FFFFF',
                        'type' => 'colour',
                    ),
                    array(
                        'name'      => __('Mobile Height ', 'my_theme-admin-td'),
                        'desc'      => __('Height of divider on mobile displays (<768px).', 'my_theme-admin-td'),
                        'id'        => 'xs_height',
                        'type'      => 'slider',
                        'default'   => '24',
                        'attr'      => array(
                            'max'       => 500,
                            'min'       => 0,
                            'step'      => 1,
                        )
                    ),
                    array(
                        'name'      => __('Tablet Height ', 'my_theme-admin-td'),
                        'desc'      => __('Height of divider on tablet displays (>768px <992px).', 'my_theme-admin-td'),
                        'id'        => 'sm_height',
                        'type'      => 'slider',
                        'default'   => '24',
                        'attr'      => array(
                            'max'       => 500,
                            'min'       => 0,
                            'step'      => 1,
                        )
                    ),
                    array(
                        'name'      => __('Desktop Height ', 'my_theme-admin-td'),
                        'desc'      => __('Height of divider on desktop displays (>992px <1200px).', 'my_theme-admin-td'),
                        'id'        => 'md_height',
                        'type'      => 'slider',
                        'default'   => '24',
                        'attr'      => array(
                            'max'       => 500,
                            'min'       => 0,
                            'step'      => 1,
                        )
                    ),
                    array(
                        'name'      => __('Large Desktop Height ', 'my_theme-admin-td'),
                        'desc'      => __('Height of divider on mobile displays (>1200px).', 'my_theme-admin-td'),
                        'id'        => 'lg_height',
                        'type'      => 'slider',
                        'default'   => '24',
                        'attr'      => array(
                            'max'       => 500,
                            'min'       => 0,
                            'step'      => 1,
                        )
                    ),
                ),
            )
        )
    ),
    'chart' => array(
        'shortcode'     => 'chart',
        'title'         => __('Chart', 'my_theme-admin-td'),
        'desc'          => __('Add a data chart to the page.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Chart Options', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Chart Type', 'my_theme-admin-td'),
                        'desc'      => __('Choose from pie, doughnut, radar, polararea, bar, line', 'my_theme-admin-td'),
                        'id'        => 'type',
                        'type'      => 'select',
                        'options'   => array(
                            'pie'       => __('PIE Chart', 'my_theme-admin-td'),
                            'doughnut'  => __('Doughnut Chart', 'my_theme-admin-td'),
                            'radar'     => __('Radar Chart', 'my_theme-admin-td'),
                            'polararea' => __('Polar Area Chart', 'my_theme-admin-td'),
                            'bar'       => __('Bar Chart', 'my_theme-admin-td'),
                            'line'      => __('Line Chart', 'my_theme-admin-td'),
                        ),
                        'admin_label' => true,
                        'default'   =>  'pie',
                    ),
                    array(
                        'name'      => __('Data', 'my_theme-admin-td'),
                        'desc'      => __('Used for the pie, doughnut and radar charts.', 'my_theme-admin-td'),
                        'id'        => 'data',
                        'type'      => 'textarea',
                        'default'   =>  '',
                    ),
                    array(
                        'name'      => __('Datasets', 'my_theme-admin-td'),
                        'desc'      => __("Used for the bar, line, and radar charts,  the data for each 'set' is put in as before, but using the 'next' keyword to seperate each of the datasets.", 'my_theme-admin-td'),
                        'id'        => 'datasets',
                        'type'      => 'textarea',
                        'default'   =>  '',
                    ),
                    array(
                        'name'      => __('Colours', 'my_theme-admin-td'),
                        'desc'      => __("These should be put in in there HEX value only(as above). These are the default colors, there should be the same number of colours as data points, or datasets, but if you only got a few, or too many, don't worry the plugin will handle it.  (more practically if you don't want your chart to look like a rainbow, the plugin will cycle a set a colors for your data)", 'my_theme-admin-td'),
                        'id'        => 'colors',
                        'type'      => 'textarea',
                        'default'   =>  '',
                    ),
                    array(
                        'name'      => __('Labels', 'my_theme-admin-td'),
                        'desc'      => __('Used for the bar, line and polararea charts.', 'my_theme-admin-td'),
                        'id'        => 'labels',
                        'type'      => 'textarea',
                        'default'   =>  '',
                    ),
                    array(
                        'name'      => __('Width', 'my_theme-admin-td'),
                        'desc'      => __('This sets the width of the container for the chart, and should be the only size property you need to adjust.  Setting it as a % value will make the chart fluid / responsive, you can use any valid CSS measurement of value (em, px, %).', 'my_theme-admin-td'),
                        'id'        => 'width',
                        'type'      => 'text',
                        'default'   =>  '70%',
                    ),
                    array(
                        'name'      => __('Height', 'my_theme-admin-td'),
                        'desc'      => __('optional - the height will automatticaly be proportionate to the width, and you should not need to adjust this .', 'my_theme-admin-td'),
                        'id'        => 'height',
                        'type'      => 'text',
                        'default'   =>  'auto',
                    ),
                    array(
                        'name'      => __('Canvas Width', 'my_theme-admin-td'),
                        'desc'      => __('This sets the width of the container for the chart, and should be the only size property you need to adjust.  Setting it as a % value will make the chart fluid / responsive, you can use any valid CSS measurement of value (em, px, %).', 'my_theme-admin-td'),
                        'id'        => 'canvaswidth',
                        'type'      => 'text',
                        'default'   =>  '625',
                    ),
                    array(
                        'name'      => __('Canvas Height', 'my_theme-admin-td'),
                        'desc'      => __('This will be converted to px, only adjust this up or down if you experience rendering issues.', 'my_theme-admin-td'),
                        'id'        => 'canvasheight',
                        'type'      => 'text',
                        'default'   =>  '625',
                    ),
                    array(
                        'name'      => __('Relative Width', 'my_theme-admin-td'),
                        'desc'      => __('The width to height ratio', 'my_theme-admin-td'),
                        'id'        => 'relativewidth',
                        'type'      => 'text',
                        'default'   =>  '1',
                    ),
                    array(
                        'name'      => __('Margin', 'my_theme-admin-td'),
                        'desc'      => __('optional - use standard css syntax for the margin, defaults to 5px for top, bottom, left and right.', 'my_theme-admin-td'),
                        'id'        => 'margin',
                        'type'      => 'text',
                        'default'   =>  '20px',
                    ),
                    array(
                        'name'      => __('Align', 'my_theme-admin-td'),
                        'desc'      => __('optional - use one of the standard WordPress alignment classes alignleft, alignright, aligncenter.', 'my_theme-admin-td'),
                        'id'        => 'align',
                        'type'      => 'text',
                        'default'   =>  '',
                    ),
                    array(
                        'name'      => __('Class', 'my_theme-admin-td'),
                        'desc'      => __('optional - apply a css class to the chart container.', 'my_theme-admin-td'),
                        'id'        => 'class',
                        'type'      => 'text',
                        'default'   =>  '',
                    ),
                    array(
                        'name'      => __('Scale Font Size', 'my_theme-admin-td'),
                        'desc'      => __('Adjust the font size of the scale for the charts that display it', 'my_theme-admin-td'),
                        'id'        => 'scalefontsize',
                        'type'      => 'slider',
                        'default'   => '12',
                        'attr'      => array(
                            'max'       => 100,
                            'min'       => 1,
                            'step'      => 1,
                        )
                    ),
                    array(
                        'name'      => __('Scale Font Colour', 'my_theme-admin-td'),
                        'desc'      => __('Change the scale font colour', 'my_theme-admin-td'),
                        'id'        => 'scalefontcolor',
                        'type'      => 'colour',
                        'default'   => '#666666',
                    ),
                    array(
                        'name'      => __('Scale Override', 'my_theme-admin-td'),
                        'desc'      => __('By default this is turned off, and the script attempts to output an appropriate scale, setting this to true will require the following three properties to be set as well: scaleSteps, scaleStepWidth and scaleStartValue', 'my_theme-admin-td'),
                        'id'        => 'scaleoverride',
                        'type'      => 'select',
                        'options'   => array(
                            'true'  => __('On', 'my_theme-admin-td'),
                            'false' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default'   =>  'false',
                    ),
                    array(
                        'name'      => __('Scale Steps', 'my_theme-admin-td'),
                        'desc'      => __('Only applicable if scaleOveride is set to true - the number of steps in the scale', 'my_theme-admin-td'),
                        'id'        => 'scalesteps',
                        'type'      => 'text',
                        'default'   =>  'null',
                    ),
                    array(
                        'name'      => __('Scale Step Width', 'my_theme-admin-td'),
                        'desc'      => __('Only applicable if scaleOveride is set to true - the value jump used in the scale', 'my_theme-admin-td'),
                        'id'        => 'scalestepwidth',
                        'type'      => 'text',
                        'default'   =>  'null',
                    ),
                    array(
                        'name'      => __('Scale Start Value', 'my_theme-admin-td'),
                        'desc'      => __('Only applicable if scaleOveride is set to true - the center starting value for the scale', 'my_theme-admin-td'),
                        'id'        => 'scalestartvalue',
                        'type'      => 'text',
                        'default'   =>  'null',
                    ),
                    array(
                        'name'      => __('Chart Animation', 'my_theme-admin-td'),
                        'desc'      => __('Turn the load animation for the charts on or off', 'my_theme-admin-td'),
                        'id'        => 'animation',
                        'type'      => 'select',
                        'options'   => array(
                            'true'  => __('On', 'my_theme-admin-td'),
                            'false' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default'   =>  'true',
                    ),
                    array(
                        'name'      => __('Fill Opacity', 'my_theme-admin-td'),
                        'desc'      => __('For line, bar and polararea type charts you can set an opactiy for fill of the chart.', 'my_theme-admin-td'),
                        'id'        => 'fillopacity',
                        'type'      => 'slider',
                        'default'   => '0.7',
                        'attr'      => array(
                            'max'       => 1,
                            'min'       => 0,
                            'step'      => 0.1,
                        )
                    ),
                    array(
                        'name'      => __('Point Stroke Colour', 'my_theme-admin-td'),
                        'desc'      => __('For line and polararea type charts you can set the point color, though usually looks pretty good with the default.', 'my_theme-admin-td'),
                        'id'        => 'pointstrokecolor',
                        'type'      => 'colour',
                        'default'   => '#FFFFFF',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'menu' => array(
        'shortcode'     => 'menu',
        'title'         => __('Site Menu', 'my_theme-admin-td'),
        'desc'          => __('Adds a site menu to the page.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Choose a menu', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Choose a menu', 'my_theme-admin-td'),
                        'desc'      => __('Select a wordpress menu to use.', 'my_theme-admin-td'),
                        'id'        => 'slug',
                        'type'      => 'select',
                        'options'   => $menus,
                        'admin_label' => true,
                        'default'   =>  '',
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
                        'name'    => __('Menu Underline', 'my_theme-admin-td'),
                        'desc'    => __('Underline of the menu items when selected', 'my_theme-admin-td'),
                        'id'      => 'underline_menu',
                        'type'    => 'radio',
                        'options' => array(
                            'underline'    => __('On', 'my_theme-admin-td'),
                            'no-underline' => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'underline',
                    ),
                    array(
                        'name'    => __('Capitalization', 'my_theme-admin-td'),
                        'desc'    => __('Enable-disable automatic capitalization in menu logo and menus', 'my_theme-admin-td'),
                        'id'      => 'menu_capitalization',
                        'type'    => 'radio',
                        'options' => array(
                            'text-caps'      => __('Force Uppercase', 'my_theme-admin-td'),
                            'text-lowercase' => __('Force Lowercase', 'my_theme-admin-td'),
                            'text-none'      => __('Off', 'my_theme-admin-td'),
                        ),
                        'default' => 'text-none',
                    ),
                    array(
                        'name'    => __('Menu Width', 'my_theme-admin-td'),
                        'desc'    => __('Choose between normal or fullwidth menu', 'my_theme-admin-td'),
                        'id'      => 'container_class',
                        'type'    => 'radio',
                        'options' => array(
                            'container'           => __('Normal', 'my_theme-admin-td'),
                            'container-fullwidth' => __('Full Width', 'my_theme-admin-td'),
                        ),
                        'default' => 'container',
                    ),
                )
            )
        )
    ),
    'vc_tabs' => array(
        'shortcode'     => 'vc_tabs',
        'title'         => __('Tabs', 'my_theme-admin-td'),
        'desc'          => __('Creates Bootstrap Tabs with content.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'has_content'   => false,
        'sections'      => array(
            array(
                'title' => __('Choose a menu', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'      => __('Tabs Style', 'my_theme-admin-td'),
                        'desc'      => __('Select a style to use for the tabs.', 'my_theme-admin-td'),
                        'id'        => 'style',
                        'type'      => 'select',
                        'options'   => array(
                            'top'    => __('Top', 'my_theme-admin-td'),
                            'bottom' => __('Bottom', 'my_theme-admin-td'),
                        ),
                        'default'   =>  '',
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'vc_accordion' => array(
        'shortcode'     => 'vc_accordion',
        'title'         => __('Accordion', 'my_theme-admin-td'),
        'desc'          => __('Creates a Bootstrap Accordion.', 'my_theme-admin-td'),
        'insert_with'   => 'dialog',
        'sections'      => array(
            array(
                'title' => __('Accordion Options', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Accordion type', 'PLUGIN_TD'),
                        'desc'    => __('Type of accordion to display', 'PLUGIN_TD'),
                        'id'      => 'type',
                        'type'    => 'select',
                        'default' => 'primary',
                        'admin_label' => true,
                        'options' => array(
                            'default' => __('Default', 'PLUGIN_TD'),
                            'primary' => __('Primary', 'PLUGIN_TD'),
                            'info'    => __('Info', 'PLUGIN_TD'),
                            'success' => __('Success', 'PLUGIN_TD'),
                            'warning' => __('Warning', 'PLUGIN_TD'),
                            'danger'  => __('Danger', 'PLUGIN_TD'),
                        ),
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'simple_icon_list' => array(
        'shortcode'   => 'simple_icon_list',
        'title'       => __('Icons List', 'my_theme-admin-td'),
        'desc'        => __('Displays a list of icons.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title' => __('Video Options', 'my_theme-admin-td'),
                'fields' => array(
                    array(
                        'name'    => __('Item size', 'my_theme-admin-td'),
                        'desc'    => __('Choose between normal or and big item size', 'my_theme-admin-td'),
                        'id'      => 'size',
                        'type'    => 'radio',
                        'options' => array(
                            'normal' => __('Normal', 'my_theme-admin-td'),
                            'big'    => __('Big', 'my_theme-admin-td'),
                        ),
                        'default' => 'normal',
                    ),
                )
            ),
            array(
                'title' => __('List Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'simple_icon' => array(
        'shortcode'   => 'simple_icon',
        'title'       => __('Simple Icon', 'my_theme-admin-td'),
        'desc'        => __('Displays an icon alongside some text.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'    => __('Font Awesome Icon', 'my_theme-admin-td'),
                        'desc'    => __('Select a font awesome icon that will appear in your features shape.', 'my_theme-admin-td'),
                        'id'      => 'fa_icon',
                        'type'    => 'select',
                        'options' => include PM_THEME_DIR . 'inc/options/global-options/fontawesome.php',
                        'default' => ''
                    ),

                    array(
                        'name'      => __('Icon Colour', 'my_theme-admin-td'),
                        'desc'      => __('Set the colour of the icon ( svg & font awesome icons )', 'my_theme-admin-td'),
                        'id'        => 'icon_color',
                        'type'      => 'colour',
                        'default'   => '#FFFFFF',
                    ),
                    array(
                        'name'        => __('Title', 'my_theme-admin-td'),
                        'id'          => 'title',
                        'type'        => 'text',
                        'admin_label' => true,
                        'default'     => '',
                        'desc'        => __('Choose a title for your featured item.', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Title Link', 'my_theme-admin-td'),
                        'id'      => 'link',
                        'type'    => 'text',
                        'default' => '',
                        'desc'    => __('Link that the title will link to (leave empty for unlinkable title)', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Open Link In', 'my_theme-admin-td'),
                        'id'      => 'link_target',
                        'type'    => 'select',
                        'default' => '_self',
                        'options' => array(
                            '_self'   => __('Same page as it was clicked ', 'my_theme-admin-td'),
                            '_blank'  => __('Open in new window/tab', 'my_theme-admin-td'),
                        ),
                        'desc'    => __('Where the link will open.', 'my_theme-admin-td'),
                    )
                )
            ),
        )
    ),
    'audio' => array(
        'shortcode'   => 'audio',
        'title'       => __('Audio Player', 'my_theme-admin-td'),
        'desc'        => __('Creates an audio player.', 'my_theme-admin-td'),
        'insert_with' => 'dialog',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'        => __('Audio URL', 'my_theme-admin-td'),
                        'id'          => 'src',
                        'type'        => 'text',
                        'admin_label' => true,
                        'default'     => '',
                        'desc'        => __('Add a link to your audio file (mp3, m4a, ogg, wav, wma).', 'my_theme-admin-td'),
                    ),
                    array(
                        'name'    => __('Loop Audio', 'my_theme-admin-td'),
                        'id'      => 'loop',
                        'desc'    => __('Allows for looping of media.', 'my_theme-admin-td'),
                        'type'    => 'select',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            '' => __('Off', 'my_theme-admin-td')
                        ),
                        'default' => ''
                    ),
                    array(
                        'name'    => __('Autoplay', 'my_theme-admin-td'),
                        'id'      => 'autoplay',
                        'desc'    => __('Causes the media to automatically play as soon as the media file is ready.', 'my_theme-admin-td'),
                        'type'    => 'select',
                        'options' => array(
                            'on'  => __('On', 'my_theme-admin-td'),
                            '' => __('Off', 'my_theme-admin-td')
                        ),
                        'default' => ''
                    ),
                    array(
                        'name'    => __('Preload', 'my_theme-admin-td'),
                        'id'      => 'preload',
                        'desc'    => __('Specifies if and how the audio should be loaded when the page loads.', 'my_theme-admin-td'),
                        'type'    => 'select',
                        'options' => array(
                            ''     => __('Audio should not be loaded', 'my_theme-admin-td'),
                            'auto'     => __('Audio should be loaded', 'my_theme-admin-td'),
                            'metadata' => __('Metadata should be loaded', 'my_theme-admin-td')
                        ),
                        'default' => ''
                    ),
                )
            ),
            array(
                'title' => __('Extra Options', 'my_theme-admin-td'),
                'fields' => include PM_THEME_DIR . 'inc/options/global-options/global-options.php'
            )
        )
    ),
    'product' => array(
        'shortcode'   => 'product',
        'title'       => __('Product', 'my_theme-admin-td'),
        'desc'        => __('Displays a single product', 'my_theme-admin-td'),
        'insert_with' => 'text',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'        => __('Product', 'my_theme-admin-td'),
                        'desc'        => __('Choose a product to display.', 'my_theme-admin-td'),
                        'id'          => 'id',
                        'type'        => 'select',
                        'default'     =>  '',
                        'blank'       => __('None', 'my_theme-admin-td'),
                        'options'     => 'custom_post_id',
                        'post_type'   => 'product',
                        'admin_label' => true,
                    ),
                )
            ),
        )
    ),
    'product_page' => array(
        'shortcode'   => 'product_page',
        'title'       => __('Product Page', 'my_theme-admin-td'),
        'desc'        => __('Displays a single product page', 'my_theme-admin-td'),
        'insert_with' => 'text',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'        => __('Product', 'my_theme-admin-td'),
                        'desc'        => __('Choose a product to display.', 'my_theme-admin-td'),
                        'id'          => 'id',
                        'type'        => 'select',
                        'default'     =>  '',
                        'blank'       => __('None', 'my_theme-admin-td'),
                        'options'     => 'custom_post_id',
                        'post_type'   => 'product',
                        'admin_label' => true,
                    ),
                )
            ),
        )
    ),
    'product_category' => array(
        'shortcode'   => 'product_category',
        'title'       => __('Product Category', 'my_theme-admin-td'),
        'desc'        => __('Displays a product category', 'my_theme-admin-td'),
        'insert_with' => 'text',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'        => __('Product Category', 'my_theme-admin-td'),
                        'desc'        => __('Choose a product category to display', 'my_theme-admin-td'),
                        'id'          => 'category',
                        'type'        => 'select',
                        'default'     =>  '',
                        'blank'       => __('None', 'my_theme-admin-td'),
                        'options'     => 'taxonomy',
                        'taxonomy'    => 'product_cat',
                        'admin_label' => true,
                    ),
                    array(
                        'name'    => __('Number', 'my_theme-admin-td'),
                        'desc'    => __('Set the number of products to display.', 'my_theme-admin-td'),
                        'id'      => 'per_page',
                        'type'    => 'text',
                        'default' => ''
                    ),
                    array(
                        'name'    => __('Columns', 'my_theme-admin-td'),
                        'desc'    => __('Set the number of columns to display.', 'my_theme-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'text',
                        'default' => ''
                    ),
                    array(
                        'name'        => __('Order by', 'my_theme-admin-td'),
                        'desc'        => __('Choose the way products will be ordered.', 'my_theme-admin-td'),
                        'id'          => 'orderby',
                        'type'        => 'select',
                        'default'     =>  'none',
                        'options'     => array(
                            'none'     => __('None', 'my_theme-admin-td'),
                            'title' => __('Title', 'my_theme-admin-td'),
                            'name' => __('Name', 'my_theme-admin-td'),
                            'date' => __('Date', 'my_theme-admin-td'),
                            'ID'     => __('ID', 'my_theme-admin-td'),
                            'author' => __('Author', 'my_theme-admin-td'),
                            'modified' => __('Last Modified', 'my_theme-admin-td'),
                            'parent' => __('Parent id', 'my_theme-admin-td'),
                            'rand' => __('Random', 'my_theme-admin-td'),
                            'comment_count' => __('Number of comments', 'my_theme-admin-td')
                        )
                    ),
                    array(
                        'name'        => __('Order', 'my_theme-admin-td'),
                        'desc'        => __('Choose how products will be ordered.', 'my_theme-admin-td'),
                        'id'          => 'order',
                        'type'        => 'select',
                        'default'     =>  'ASC',
                        'options'     => array(
                            'ASC'     => __('Ascending', 'my_theme-admin-td'),
                            'DESC' => __('Descending', 'my_theme-admin-td'),
                        )
                    ),
                )
            ),
        )
    ),
    'product_categories' => array(
        'shortcode'   => 'product_categories',
        'title'       => __('Product Categories', 'my_theme-admin-td'),
        'desc'        => __('Displays product categories', 'my_theme-admin-td'),
        'insert_with' => 'text',
        'has_content'   => false,
        'sections'    => array(
            array(
                'title'   => 'general',
                'fields'  => array(
                    array(
                        'name'        => __('Product Categories', 'my_theme-admin-td'),
                        'desc'        => __('Choose the product categories to display.  Enter the IDs comma separated, or leave empty for all categories.', 'my_theme-admin-td'),
                        'id'          => 'ids',
                        'type'        => 'text',
                        'default'     =>  ''
                    ),
                    array(
                        'name'    => __('Number', 'my_theme-admin-td'),
                        'desc'    => __('Set the number of categories to display.', 'my_theme-admin-td'),
                        'id'      => 'number',
                        'type'    => 'text',
                        'default' => ''
                    ),
                    array(
                        'name'    => __('Columns', 'my_theme-admin-td'),
                        'desc'    => __('Set the number of columns to display.', 'my_theme-admin-td'),
                        'id'      => 'columns',
                        'type'    => 'text',
                        'default' => ''
                    ),
                    array(
                        'name'        => __('Order by', 'my_theme-admin-td'),
                        'desc'        => __('Choose the way categories will be ordered.', 'my_theme-admin-td'),
                        'id'          => 'orderby',
                        'type'        => 'select',
                        'default'     =>  'none',
                        'options'     => array(
                            'none'     => __('None', 'my_theme-admin-td'),
                            'title' => __('Title', 'my_theme-admin-td'),
                            'name' => __('Name', 'my_theme-admin-td'),
                            'date' => __('Date', 'my_theme-admin-td'),
                            'ID'     => __('ID', 'my_theme-admin-td'),
                            'author' => __('Author', 'my_theme-admin-td'),
                            'modified' => __('Last Modified', 'my_theme-admin-td'),
                            'parent' => __('Parent id', 'my_theme-admin-td'),
                            'rand' => __('Random', 'my_theme-admin-td'),
                            'comment_count' => __('Number of comments', 'my_theme-admin-td')
                        )
                    ),
                    array(
                        'name'        => __('Order', 'my_theme-admin-td'),
                        'desc'        => __('Choose how categories will be ordered.', 'my_theme-admin-td'),
                        'id'          => 'order',
                        'type'        => 'select',
                        'default'     =>  'ASC',
                        'options'     => array(
                            'ASC'     => __('Ascending', 'my_theme-admin-td'),
                            'DESC' => __('Descending', 'my_theme-admin-td'),
                        )
                    ),
                    array(
                        'name'        => __('Hide empty categories', 'my_theme-admin-td'),
                        'desc'        => __('Choose whether to show categories with no products set.', 'my_theme-admin-td'),
                        'id'          => 'hide_empty',
                        'type'        => 'select',
                        'default'     =>  '0',
                        'options'     => array(
                            '1'     => __('Hide', 'my_theme-admin-td'),
                            '0' => __('Show', 'my_theme-admin-td'),
                        )
                    ),
                    array(
                        'name'    => __('Parent', 'my_theme-admin-td'),
                        'desc'    => __('Set the parent id of the categories to display. Set to 0 to only display top level categories', 'my_theme-admin-td'),
                        'id'      => 'parent',
                        'type'    => 'text',
                        'default' => '0'
                    )
                )
            ),
        )
    ),
);
