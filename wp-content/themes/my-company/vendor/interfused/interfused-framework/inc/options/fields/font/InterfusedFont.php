<?php
/**
 * Font Select Box
 *
 * @package InterfusedTypography
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 * @author Interfused.com
 */

require_once PM_TF_DIR . 'inc/options/fields/select/InterfusedSelect.php';

/**
 * Simple Text Input Box
 */
class InterfusedFont extends InterfusedSelect
{
    /**
     * Creates option
     *
     * @return void
     *              @since 1.0
     **/
    public function __construct($field, $value, $attr)
    {
        $field['options'] = $this->load_select_data();

        $this->set_attr('value', $value);

        parent::__construct($field, $value, $attr);
    }

    public function load_select_data($database = null)
    {
        // get data
        $data = array();

        // get default system fonts first
        global $pm_typography;
        $system_fonts = $pm_typography->get_system_fonts();
        $data['system_fonts'] = array(
            'optgroup' => __('System Fontstacks', 'my_theme-admin-td'),
            'options' => array()
        );
        foreach ($system_fonts as $key => $font) {
            $data['system_fonts']['options']['system_fonts|' . $key] = $font['family'];
        }

        // include typekit fonts if available
        $typekit = $pm_typography->get_typekit_fonts();
        if (false !== $typekit) {
            foreach ($typekit as $kit) {
                $key = $kit['kit']['id'];
                $data[$key] = array(
                    'optgroup' => __('TypeKit', 'my_theme-admin-td') . ' - ' . $kit['kit']['name'] . ' Kit',
                    'options' => array()
                );
                foreach ($kit['kit']['families'] as $font) {
                    $data[$key]['options']['typekit_fonts|' . $font['name'] . '|' . $kit['kit']['id']] = $font['name'];
                }
            }
        }
        // include google fonts if they exist
        $google_fonts = $pm_typography->get_google_fonts();
        if (!empty($google_fonts)) {
            $data['google_fonts'] = array(
                'optgroup' => __('Google Web Fonts', 'my_theme-admin-td'),
                'options' => array()
            );
            foreach ($google_fonts as $font) {
                $data['google_fonts']['options']['google_fonts|' . $font['family']] = $font['family'];
            }
        }

        return $data;
    }

    /**
     * Overrides super class render function
     *
     * @return string HTML for option
     *                @since 1.0
     **/
    public function render($echo = true)
    {
        //if it is not an array , search the backend for the select options
        if (!is_array($this->_field['options'])) {
            $this->load_select_options($this->_field['options']);
        }

        $option = '<select class="font-select">';

        if (isset($this->_field['blank'])) {
            $option .= '<option value="">' . $this->_field['blank'] . '</option>';
        }

        $option .= $this->create_select_options($this->_field['options'], $this->_value);

        $option .= '</select>';

        // add hidden option that stores all the field
        $option .= '<input type="hidden"' . $this->create_attributes() . ' />';
        $option .= '<div class="pm-checkbox-list"></div>';
        $option .= '<div class="pm-checkbox-list"></div>';

        if ($echo) {
            echo $option;
        } else {
            return $option;
        }
    }

    public function enqueue()
    {
        parent::enqueue();
        // load scripts
        wp_enqueue_script('select2-plugin', PM_TF_URI . 'assets/components/select2/select2.min.js', array('jquery'));
        wp_enqueue_style('select2-style', PM_TF_URI . 'assets/components/select2/select2.css');
        wp_enqueue_style('pm-font-style', PM_TF_URI . 'assets/css/options/pm-option-font.css');
        wp_register_script('font-field', PM_TF_URI . 'inc/options/fields/font/font.js', array('jquery'));

        wp_localize_script('font-field', 'fontData', array(
            'getFontNonce' => wp_create_nonce('get-font-nonce'),
            'ajaxURL' => admin_url('admin-ajax.php')
        ));

        wp_enqueue_script('font-field');
    }
}
