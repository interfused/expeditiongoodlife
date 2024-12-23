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
class InterfusedImport extends InterfusedOption
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
        echo '<textarea ' . $this->create_attributes() . ' >' . esc_attr($this->_value) . '</textarea>';
        echo '<br><input type="submit" class="button button-primary" name="import" value="Import Data">';
    }
}
