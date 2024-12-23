<?php
/**
 * Editor option
 *
 * @package ThemeFramework
 * @subpackage Options
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */

/**
 * Creates a standard WP editor
 */
class InterfusedEditor extends InterfusedOption
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
        $this->set_attr('value', esc_attr($value));
    }

    /**
     * Overrides super class render function
     *
     * @return string HTML for option
     *                @since 1.0
     **/
    public function render($echo = true)
    {
        // add name to the editor so save works
        $settings = array(
            'textarea_name' => $this->get_attr('name')
        );
        // add extra settings if sent form option
        if (isset($this->_field['settings'])) {
            $settings = array_merge($settings, $this->_field['settings']);
        }
        // echo out the editor
        wp_editor($this->_value, $this->_field['id'], $settings);
    }
}
