<?php
/**
 * Text option
 *
 * @package ThemeFramework
 * @subpackage Options
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */

/**
 * Simple Text Input Box
 */
class InterfusedButton extends InterfusedOption
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
        //$this->set_attr('value', esc_attr($value));
    }

    /**
     * Overrides super class render function
     *
     * @return string HTML for option
     *                @since 1.0
     **/
    public function render($echo = true)
    {
        $tag = (isset($this->_field['link']) && $this->_field['link'] === true) ? 'a' : 'button';
        $output = '<' . $tag . ' ' . $this->create_attributes().'>' . $this->_field['button-text'] . '</' . $tag . '>';
        if ($echo) {
            echo $output;
        } else {
            return $output;
        }
    }
}
