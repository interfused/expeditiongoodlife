<?php
/**
 * Heading options
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
        'name'        => __('Header Text', 'my_theme-admin-td'),
        'id'          => 'content',
        'type'        => 'text',
        'default'     => '',
        'desc'        => __('Text that will be used for the header.', 'my_theme-admin-td'),
        'admin_label' => true,
    ),
    array(
        'name'        => __('Sub Header Text', 'my_theme-admin-td'),
        'id'          => 'sub_header',
        'type'        => 'text',
        'default'     => '',
        'desc'        => __('Text that will be used below the main header.', 'my_theme-admin-td'),
        'admin_label' => true,
    ),
    array(
        'name'    => __('Header Type', 'my_theme-admin-td'),
        'desc'    => __('Choose the type of header you want to use', 'my_theme-admin-td'),
        'id'      => 'header_type',
        'type'    => 'select',
        'options' => array(
            'h1'      => __('h1', 'my_theme-admin-td'),
            'h2'      => __('h2', 'my_theme-admin-td'),
            'h3'      => __('h3', 'my_theme-admin-td'),
            'h4'      => __('h4', 'my_theme-admin-td'),
            'h5'      => __('h5', 'my_theme-admin-td'),
            'h6'      => __('h6', 'my_theme-admin-td')
        ),
        'default' => 'h1',
    ),
    array(
        'name'    => __('Override section swatch', 'PLUGIN_TD'),
        'desc'    => __('Set to On to override the swatch of the section', 'PLUGIN_TD'),
        'id'      => 'section_swatch_override',
        'type'    => 'select',
        'default' => 'off',
        'options' => array(
            'on'    => __('On', 'PLUGIN_TD'),
            'off'   => __('Off', 'PLUGIN_TD'),
        )
    ),
    array(
        'name'      => __('Heading Color', 'my_theme-admin-td'),
        'desc'      => __('Set the color of the heading', 'my_theme-admin-td'),
        'id'        => 'heading_colour',
        'type'      => 'colour',
        'default'   => '#000000'
    ),
    array(
        'name'    => __('Sub Header Font Size', 'my_theme-admin-td'),
        'desc'    => __('Choose size of the font to use in your sub header', 'my_theme-admin-td'),
        'id'      => 'sub_header_size',
        'type'    => 'select',
        'options' => array(
            'normal' => __('Normal Paragraph', 'my_theme-admin-td'),
            'lead'   => __('Lead Paragraph', 'my_theme-admin-td'),
        ),
        'default' => 'normal',
    ),
    array(
        'name'    => __('Header Font Size', 'my_theme-admin-td'),
        'desc'    => __('Choose size of the font to use in your header', 'my_theme-admin-td'),
        'id'      => 'header_size',
        'type'    => 'select',
        'options' => array(
            'normal' => __('Normal', 'my_theme-admin-td'),
            'big'    => __('Big (36px)', 'my_theme-admin-td'),
            'bigger' => __('Bigger (48px)', 'my_theme-admin-td'),
            'super'  => __('Super (60px)', 'my_theme-admin-td'),
            'hyper'  => __('Hyper (96px)', 'my_theme-admin-td'),
        ),
        'default' => 'normal',
    ),
    array(
        'name'    => __('Header Font Weight', 'my_theme-admin-td'),
        'desc'    => __('Choose weight of the font to use in the header', 'my_theme-admin-td'),
        'id'      => 'header_weight',
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
        'name' => __('Header Alignment', 'my_theme-admin-td'),
        'desc' => __('Align the text shown in the header left, right or center.', 'my_theme-admin-td'),
        'id'   => 'header_align',
        'type' => 'select',
        'default' => 'left',
        'options' => array(
            'default'   => __('Default alignment', 'my_theme-admin-td'),
            'left'   => __('Left', 'my_theme-admin-td'),
            'center' => __('Center', 'my_theme-admin-td'),
            'right'  => __('Right', 'my_theme-admin-td'),
            'justify'  => __('Justify', 'my_theme-admin-td')
        )
    ),
    array(
        'name'    => __('Header Condensed', 'my_theme-admin-td'),
        'desc'    => __('Adds padding to the sides of the heading creating a more condensed effect.', 'my_theme-admin-td'),
        'id'      => 'header_condensed',
        'default' => 'not-condensed',
        'type' => 'select',
        'options' => array(
            'not-condensed' => __('Not Condensed', 'my_theme-admin-td'),
            'condensed'     => __('Condensed', 'my_theme-admin-td'),
        )
    ),
    array(
        'name'    => __('Header Underline', 'my_theme-admin-td'),
        'desc'    => __('Adds an underline effect below the header.', 'my_theme-admin-td'),
        'id'      => 'header_underline',
        'default' => 'no-bordered-header',
        'type'    => 'select',
        'options' => array(
            'no-bordered-header' => __('Hide', 'my_theme-admin-td'),
            'bordered' => __('Show', 'my_theme-admin-td'),
        )
    ),
    array(
        'name'    => __('Underline Size', 'my_theme-admin-td'),
        'desc'    => __('Size of the underline.', 'my_theme-admin-td'),
        'id'      => 'header_underline_size',
        'default' => 'bordered-normal',
        'type'    => 'select',
        'options' => array(
            'bordered-normal' => __('Normal (72px)', 'my_theme-admin-td'),
            'bordered-small' => __('Small (48px)', 'my_theme-admin-td'),
        )
    ),
    array(
        'name'    => __('Fade out when leaving page', 'my_theme-admin-td'),
        'desc'    => __('Fades the heading out when the heading leaves the page.', 'my_theme-admin-td'),
        'id'      => 'header_fade_out',
        'default' => 'off',
        'type'    => 'select',
        'options' => array(
            'off' => __('Off', 'my_theme-admin-td'),
            'on'  => __('On', 'my_theme-admin-td'),
        )
    ),
    array(
        'name'        => __('Extra Classes', 'my_theme-admin-td'),
        'id'          => 'extra_classes',
        'type'        => 'text',
        'default'     => '',
        'desc'        => __('Space separated extra classes to add to the heading.', 'my_theme-admin-td'),
    ),
    array(
        'name'    => __('Margin Top', 'my_theme-admin-td'),
        'desc'    => __('Amount of space to add above this element.', 'my_theme-admin-td'),
        'id'      => 'margin_top',
        'default' => 'short-top',
        'options' => array(
            'no-top'     => __('No Margin (0px)', 'my_theme-admin-td'),
            'short-top'  => __('Short (24px)', 'my_theme-admin-td'),
            'medium-top'  => __('Medium (48px)', 'my_theme-admin-td'),
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
            'medium-bottom'  => __('Medium (48px)', 'my_theme-admin-td'),
            'normal-bottom' => __('Normal (72px)', 'my_theme-admin-td'),
            'tall-bottom'   => __('Tall (96px)', 'my_theme-admin-td'),
        ),
        'type' => 'select',
    ),

);