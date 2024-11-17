<?php
/**
 * Upload option
 *
 * @package ThemeFramework
 * @subpackage Options
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */

/**
 * Uploads media files
 */
class InterfusedUpload extends InterfusedOption
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
        $this->set_attr('type', 'hidden');
        $this->set_attr('value', esc_attr($value));
        $this->set_attr('id', $field['id']);
        $this->set_attr('data-store', $field['store']);
    }

    /**
     * Overrides super class render function
     *
     * @return string HTML for option
     *                @since 1.0
     **/
    public function render($echo = true)
    {
        switch ($this->_field['store']) {
            case 'id':
                $image = wp_get_attachment_image_src($this->_value, 'full');
                $url = $image !== false ? $image[0] : '';
                $value = $this->_value;
                break;
            case 'url':
                $url = $this->_value;
                $value = $this->_value;
                break;
        }

        $this->create_option($value, $url);
    }

    private function create_option($value, $url)
    {
        $src = ' src="' . $url . '"';
        // hide / show image
        $hide_preview = $url ? '' : 'display:none;';

        // create preview image
        $option = '<div class="pm-media-holder">';
        $option .= '<img' .  $src . ' class="pm-image-option-preview" style="' . $hide_preview . '" />';
        $option .= '<input class="pm-media-upload-url" ' . $this->create_attributes() . '/>';
        $option .= '<input type="button" class="pm-set-image" data-frame-title="' . __('Select Image', 'my_theme-admin-td') . '" data-frame-button-text="' . __('Select Image', 'my_theme-admin-td') . '"  value="' . __('Set Image', 'my_theme-admin-td') . '"/>';
        $option .= '<input type="button" class="pm-remove-image" value="' . __('Remove Image', 'my_theme-admin-td') . '" style="' . $hide_preview . '"/>';
        $option .= '</div>';

        echo $option;
    }

    public function enqueue()
    {
        parent::enqueue();
        // load styles
        wp_enqueue_style('pm-option-upload', PM_TF_URI . 'assets/css/options/pm-option-upload.css', array('thickbox'));
        // load scripts
        wp_enqueue_script('upload-field', PM_TF_URI . 'inc/options/fields/upload/upload.js');
        wp_enqueue_media();
    }
}
