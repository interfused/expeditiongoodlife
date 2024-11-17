<?php
/**
 * Removes all html tags
 *
 * @package mycompany
 * @subpackage Core
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */

/**
 * Removes all HTML
 *
 * @package mycompany
 * @since 1.0
 **/
class InterfusedStripHTML
{
    /**
     * Validates the option data
     *
     * @return validated options array
     *                   @since 1.0
     **/
    public function validate($field, $options, $new_options)
    {
        $options[$field['id']] = strip_tags($new_options[$field['id']]);

        return $options;
    }
}
