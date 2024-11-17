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
        'name'    => __('Swatch', 'my_theme-admin-td'),
        'desc'    => __('Choose a color swatch for the section', 'my_theme-admin-td'),
        'id'      => 'swatch',
        'type'    => 'select',
        'default' => 'swatch-white',
        'options' => include PM_THEME_DIR . 'inc/options/shortcodes/shortcode-swatches-options.php',
        'admin_label' => true,
    ),
    array(
        'name'    => __('Text Shadow', 'my_theme-admin-td'),
        'desc'    => __('Adds a text shadow to all the text in this row.', 'my_theme-admin-td'),
        'id'      => 'text_shadow',
        'type'    => 'select',
        'options' => array(
            'no-shadow' => __('No Shadow', 'my_theme-admin-td'),
            'shadow'    => __('Show Shadow', 'my_theme-admin-td'),
        ),
        'default' => 'no-shadow',
    ),
    array(
        'name'    => __('Inner Shadow', 'my_theme-admin-td'),
        'desc'    => __('Adds an inner shadow to the inside of this row.', 'my_theme-admin-td'),
        'id'      => 'inner_shadow',
        'type'    => 'select',
        'options' => array(
            'no-shadow' => __('No Shadow', 'my_theme-admin-td'),
            'shadow'    => __('Show Shadow', 'my_theme-admin-td'),
        ),
        'default' => 'no-shadow',
    ),
    array(
        'name'    => __('Section Width', 'my_theme-admin-td'),
        'desc'    => __('Choose between padded-non padded section', 'my_theme-admin-td'),
        'id'      => 'width',
        'type'    => 'select',
        'options' => array(
            'padded'    => __('Padded', 'my_theme-admin-td'),
            'no-padded' => __('Full Width', 'my_theme-admin-td'),
        ),
        'default' => 'padded',
    ),
    array(
        'name'    => __('Optional class', 'my_theme-admin-td'),
        'id'      => 'class',
        'type'    => 'text',
        'default' => '',
        'desc'    => __('Add an optional class to the section (separated with spaces)', 'my_theme-admin-td'),
    ),
    array(
        'name'    => __('Optional id', 'my_theme-admin-td'),
        'id'      => 'id',
        'type'    => 'text',
        'default' => '',
        'desc'    => __('Add an optional id to the section', 'my_theme-admin-td'),
    ),
    array(
        'name'    => __('Optional label', 'my_theme-admin-td'),
        'id'      => 'label',
        'type'    => 'text',
        'default' => '',
        'desc'    => __('Add an optional label for this section, used in bullet nav tooltips', 'my_theme-admin-td'),
    ),
    array(
        'name'      => __('Overlay Colour', 'my_theme-admin-td'),
        'desc'      => __('Set the colour of the video & image overlay', 'my_theme-admin-td'),
        'id'        => 'overlay_colour',
        'type'      => 'colour',
        'default'   => '#000000',
    ),
    array(
        'name'      => __('Overlay Opacity', 'my_theme-admin-td'),
        'desc'      => __('Set the opacity of the video & image overlay', 'my_theme-admin-td'),
        'id'        => 'overlay_opacity',
        'type'      => 'slider',
        'default'   => '0',
        'attr'      => array(
            'max'       => 1,
            'min'       => 0,
            'step'      => 0.1,
        )
    ),
    array(
        'name'      => __('Overlay Grid', 'my_theme-admin-td'),
        'desc'      => __('Adds an overlay pattern image', 'my_theme-admin-td'),
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
        'name'    => __('Background Video mp4', 'my_theme-admin-td'),
        'id'      => 'background_video_mp4',
        'type'    => 'text',
        'default' => '',
        'desc'    => __('Enter url of an mp4 video to use for this rows background.', 'my_theme-admin-td'),
    ),
    array(
        'name'    => __('Background Video webm', 'my_theme-admin-td'),
        'id'      => 'background_video_webm',
        'type'    => 'text',
        'default' => '',
        'desc'    => __('Enter url of a webm video to use for this rows background.', 'my_theme-admin-td'),
    ),
    array(
        'name'    => __('Background Image', 'my_theme-admin-td'),
        'id'      => 'background_image',
        'store'   => 'url',
        'type'    => 'upload',
        'default' => '',
        'desc'    => __('Choose an image to use for this rows background.', 'my_theme-admin-td'),
    ),
    array(
        'name'    => __('Mobile Background Image', 'my_theme-admin-td'),
        'id'      => 'background_image_mobile',
        'store'   => 'url',
        'type'    => 'upload',
        'default' => '',
        'desc'    => __('Optional alternate image to use for this rows background on mobile.', 'my_theme-admin-td'),
    ),
    array(
        'name'    => __('Image Background Size', 'my_theme-admin-td'),
        'desc'    => __('Set how the image will fit into the section', 'my_theme-admin-td'),
        'id'      => 'background_image_size',
        'type'    => 'select',
        'options' => array(
            'cover' => __('Full Width', 'my_theme-admin-td'),
            'auto'  => __('Actual Size', 'my_theme-admin-td'),
        ),
        'default' => 'cover',
    ),
    array(
        'name'    => __('Image Background Repeat', 'my_theme-admin-td'),
        'id'      => 'background_image_repeat',
        'type'    => 'select',
        'default' => 'no-repeat',
        'options' => array(
            'no-repeat' => __('No repeat', 'my_theme-admin-td'),
            'repeat-x'  => __('Repeat horizontally', 'my_theme-admin-td'),
            'repeat-y'  => __('Repeat vertically', 'my_theme-admin-td'),
            'repeat'    => __('Repeat horizontally and vertically', 'my_theme-admin-td')
        ),
        'desc'    => __('Set how the image will be repeated', 'my_theme-admin-td'),
    ),
    array(
        'name'      => __('Background Position vertical', 'my_theme-admin-td'),
        'desc'      => __('Set the vertical position of background image. 0 value represents the top horizontal edge of the section. Positive values will push the background image up.', 'my_theme-admin-td'),
        'id'        => 'background_position_vertical',
        'type'      => 'slider',
        'default'   => '0',
        'attr'      => array(
            'max'       => 100,
            'min'       => -100,
            'step'      => 1,
        )
    ),
    array(
        'name'    => __('Background Image Attachment', 'my_theme-admin-td'),
        'id'      => 'background_image_attachment',
        'type'    => 'select',
        'default' => 'scroll',
        'options' => array(
            'scroll' => __('Scroll', 'my_theme-admin-td'),
            'fixed'  => __('Fixed', 'my_theme-admin-td'),
        ),
        'desc'    => __('Set the way the background image is attached to the page. Scroll = normal Fixed = The background is fixed with regard to the viewport.', 'my_theme-admin-td'),
    ),
    array(
        'name'    => __('Background Image Parallax Effect', 'my_theme-admin-td'),
        'id'      => 'background_image_parallax',
        'type'    => 'select',
        'default' => 'off',
        'options' => array(
            'off' => __('Off', 'my_theme-admin-td'),
            'on'  => __('On', 'my_theme-admin-td'),
        ),
        'desc'    => __('Toggles the background image parallax effect.', 'my_theme-admin-td'),
    ),
    array(
        'name'      => __('Parallax Effect Start Position ', 'my_theme-admin-td'),
        'desc'      => __('Sets the position of the image in pixels that the parallax effect will start from.', 'my_theme-admin-td'),
        'id'        => 'background_image_parallax_start',
        'type'      => 'slider',
        'default'   => '0',
        'attr'      => array(
            'max'       => 500,
            'min'       => -500,
            'step'      => 1
        )
    ),
    array(
        'name'      => __('Parallax Effect End Position', 'my_theme-admin-td'),
        'desc'      => __('Sets the percentage of the image in pixels that the parallax effect will end up at.', 'my_theme-admin-td'),
        'id'        => 'background_image_parallax_end',
        'type'      => 'slider',
        'default'   => '-80',
        'attr'      => array(
            'max'       => 500,
            'min'       => -500,
            'step'      => 1
        )
    ),
    array(
        'name'        => __('Background Color Animation Bundle', 'my_theme-admin-td'),
        'desc'        => __('Choose a color bundle used to animate the section backgrounds', 'my_theme-admin-td'),
        'id'          => 'section_color_set',
        'type'        => 'select',
        'default'     =>  '',
        'blank'       => __('None', 'my_theme-admin-td'),
        'options'     => 'custom_post_id',
        'post_type'   => 'pm_color_bundle',
        'admin_label' => true,
    ),
    array(
        'name'      => __('Background Color Animation Speed', 'my_theme-admin-td'),
        'desc'      => __('Set the speed that the colors will change, in milliseconds', 'my_theme-admin-td'),
        'id'        => 'color_speed',
        'type'      => 'slider',
        'default'   => '2000',
        'attr'      => array(
            'max'       => 20000,
            'min'       => 1000,
            'step'      => 1000
        )
    ),
    array(
        'name'      => __('Background Color Animation Duration', 'my_theme-admin-td'),
        'desc'      => __('Set the length of time each color will stay active between changes, in milliseconds', 'my_theme-admin-td'),
        'id'        => 'color_duration',
        'type'      => 'slider',
        'default'   => '4000',
        'attr'      => array(
            'max'       => 20000,
            'min'       => 1000,
            'step'      => 1000
        )
    ),
    array(
        'name'    => __('Section Height', 'my_theme-admin-td'),
        'desc'    => __('Section will vertically cover the entire viewport if Full Height is selected', 'my_theme-admin-td'),
        'id'      => 'height',
        'type'    => 'select',
        'options' => array(
            'normal'       => __('Normal', 'my_theme-admin-td'),
            'fullheight'   => __('Full Height', 'my_theme-admin-td'),
        ),
        'default' => 'normal',
    ),
    array(
        'name'    => __('Section Transparency', 'my_theme-admin-td'),
        'desc'    => __('Section will be tranparent if On is selected', 'my_theme-admin-td'),
        'id'      => 'transparency',
        'type'    => 'select',
        'options' => array(
            'transparent'   => __('On', 'my_theme-admin-td'),
            'opaque'        => __('Off', 'my_theme-admin-td'),
        ),
        'default' => 'opaque',
    ),
    array(
        'name'    => __('Section Content Vertical Alignment', 'my_theme-admin-td'),
        'desc'    => __('Align the content of the section vertically', 'my_theme-admin-td'),
        'id'      => 'vertical_alignment',
        'type'    => 'select',
        'options' => array(
            'top'       => __('Top', 'my_theme-admin-td'),
            'middle'    => __('Middle', 'my_theme-admin-td'),
            'bottom'    => __('Bottom', 'my_theme-admin-td'),
        ),
        'default' => 'top',
    ),
);
