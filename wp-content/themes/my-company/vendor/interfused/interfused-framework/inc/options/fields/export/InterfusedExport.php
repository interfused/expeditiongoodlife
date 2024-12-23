<?php
/**
 * Textarea option
 *
 * @package ThemeFramework
 * @subpackage Options
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */

/**
 * Simple Textarea option
 */
class InterfusedExport extends InterfusedOption
{
    /**
     * Creates option
     *
     * @return void
     *              @since 1.0
     **/
    public function __construct($field, $value, $attr)
    {
        parent::__construct($field, $value, $attr);
    }

    /**
     * Overrides super class render function
     *
     * @return string HTML for option
     *                @since 1.0
     **/
    public function render($echo = true)
    {
        $pm_theme_options = get_option(THEME_SHORT . '-options');
        $pm_theme_options = apply_filters('pm_export_options', $pm_theme_options);
        $export = base64_encode(serialize($pm_theme_options));
        echo '<textarea ' . $this->create_attributes() . ' >' . esc_attr($export) . '</textarea>';
    }
}

// removing options that should not be imported
function options_not_exported($options) {
    $remove_options = array(
        'logo_image',
        '404_page',
        'blog_header_background_image',
        'blog_masonry_section_background',
        'page_header_background_image',
        'portfolio_archive_page',
        'services_archive_page',
        'staff_archive_page',
        'data_export',
        'data_import',
        'favicon',
        'iphone_icon',
        'ipad_icon',
        'ipad_icon_retina',
        'typekit_api_token'
    );
    foreach ($remove_options as $option) {
        if(isset($options[$option])) {
            unset($options[$option]);
        }
    }
    return $options;
}
add_filter('pm_export_options', 'options_not_exported');
