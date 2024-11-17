<?php
/**
 * Slider Option
 *
 * @package ThemeFramework
 * @subpackage Options
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */

/**
 * Creates slider bar option
 */
class InterfusedSlider extends InterfusedOption
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
        $this->set_attr('type', 'text');
        $this->set_attr('class', 'slider-option');
        $this->set_attr('value', floatval($value));
    }

    /**
     * Overrides super class render function
     *
     * @return string HTML for option
     *                @since 1.0
     **/
    public function render($echo = true)
    {
        $output = '<div></div>';
        $output .= '<input ' . $this->create_attributes() . '/>';
        if (isset($this->_field['postfix'])) {
            $output .= ' <label>' . $this->_field['postfix'] . '</label>';
        }

        if ($echo) {
            echo $output;
        } else {
            return $output;
        }
    }

    public function enqueue()
    {
        parent::enqueue();
        // load styles
        wp_enqueue_style('jquery-interfused-ui-theme');
        // load scripts
        wp_enqueue_script('slider-field', PM_TF_URI . 'inc/options/fields/slider/slider.js', array('jquery-ui-slider'));
    }
}
