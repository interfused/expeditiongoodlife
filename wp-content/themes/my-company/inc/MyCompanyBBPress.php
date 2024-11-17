<?php
/**
 * BBPress actions
 *
 * @package mycompany
 * @subpackage BBPress
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */

class MyCompanyBBPress extends InterfusedBBPress
{
    public function __construct($options_file)
    {
        parent::__construct($options_file);
    }

    public function global_page_header()
    {
        global $pm_theme_options;

        if (isset( $pm_theme_options['bbpress_header_show_header']) && $pm_theme_options['bbpress_header_show_header'] === 'show') {
            // use custom title
            $title = $this->get_page_header_title();

            $heading = pm_call_shortcode_with_theme_options('pm_section_heading', array(
                'sub_header',
                'header_type',
                'section_swatch_override',
                'heading_colour',
                'sub_header_size',
                'header_size',
                'header_weight',
                'header_align',
                'header_condensed',
                'header_underline',
                'header_underline_size',
                'heading_type',
                'header_fade_out',
                'extra_classes',
                'margin_top',
                'margin_bottom',
                'scroll_animation',
                'scroll_animation_delay'
            ), $title, $pm_theme_options, 'bbpress_header_', array('heading_type' => 'bbpress'));
            // create section using theme options
            echo pm_call_shortcode_with_theme_options('pm_shortcode_section', array(
                'swatch',
                'section_color_set',
                'color_speed',
                'color_duration',
                'text_shadow',
                'inner_shadow',
                'width',
                'class',
                'id',
                'label',
                'overlay_colour',
                'overlay_opacity',
                'overlay_grid',
                'background_video_mp4',
                'background_video_webm',
                'background_image',
                'background_image_size',
                'background_image_repeat',
                'background_image_attachment',
                'background_position_vertical',
                'background_image_parallax',
                'background_image_parallax_start',
                'background_image_parallax_end',
                'height',
                'transparency',
                'vertical_alignment'
            ), $heading, $pm_theme_options, 'bbpress_header_');
        }
    }
}


// only load all of this if bbpress is active
if( class_exists( 'bbPress' ) ) {
    $pm_bbpress = new MyCompanyBBPress(PM_THEME_DIR . 'inc/options/bbpress-options/option-pages.php');
}