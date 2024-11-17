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
class InterfusedDate extends InterfusedOption
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
        $this->set_attr('class', 'pm-date-field');
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
        wp_enqueue_script('date-field', PM_TF_URI . 'inc/options/fields/date/date.js', array('jquery-ui-datepicker'));
    }
}
