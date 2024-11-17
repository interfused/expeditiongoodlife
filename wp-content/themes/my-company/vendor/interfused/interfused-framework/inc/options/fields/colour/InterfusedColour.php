<?php
/**
 * Date Option
 *
 * @package ThemeFramework
 * @subpackage Options
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */

/**
 * Creates a date picker option
 */
class InterfusedColour extends InterfusedOption
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
        $this->set_attr('class', 'colour-option');
        // set extra format class if set in field
        if (isset($field['format'])) {
            $this->set_attr('class', 'format-' . $field['format']);
        }
        $this->set_attr('value', $value);
    }

    /**
     * Overrides super class render function
     *
     * @return string HTML for option
     *                @since 1.0
     **/
    public function render($echo = true)
    {
        $output = '<input ' . $this->create_attributes() . ' />';

        if ($echo) {
            echo $output;
        }
        else {
            return $output;
        }
    }

    public function enqueue()
    {
        parent::enqueue();
        wp_enqueue_style('pm-spectrum', PM_TF_URI . 'assets/components/spectrum/spectrum.css');
        // load script
        wp_enqueue_script('pm-spectrum', PM_TF_URI . 'assets/components/spectrum/spectrum.js', array('jquery'));
        wp_enqueue_script('pm-colour-field', PM_TF_URI . 'inc/options/fields/colour/colour.js', array('pm-spectrum'));
    }
}
