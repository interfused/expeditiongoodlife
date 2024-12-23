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
class InterfusedFontSelect extends InterfusedSelect
{
    private $pm_typography;
    /**
     * Creates option
     *
     * @return void
     *              @since 1.0
     **/
    public function __construct($field, $value, $attr, $pm_typography)
    {
        $this->pm_typography = $pm_typography;
        $field['options'] = $this->load_select_data();
        $attr['class'] = 'font-select select2';

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
            $data['system_fonts']['options'][$key] = $font['family'];
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
                    $data[$key]['options'][$font['name']] = $font['name'];
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
                $data['google_fonts']['options'][$font['family']] = $font['family'];
            }
        }

        return $data;
    }
}
