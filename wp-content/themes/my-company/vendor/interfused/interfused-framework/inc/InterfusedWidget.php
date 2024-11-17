<?php
/**
 * Extends wordpress widget to work with Interfused Options
 *
 * @package ThemeFramework
 * @subpackage Widget
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */

class InterfusedWidget extends WP_Widget
{
    protected $options_file;

    public function __construct($options_file, $id_base = false, $name = '', $widget_options = array(), $control_options = array())
    {
        $this->options_file = $options_file;
        parent::__construct($id_base, $name, $widget_options, $control_options);
    }

    public function update($new_instance, $old_instance)
    {

        $options = include PM_THEME_DIR . 'inc/options/widgets/widget-options/' . $this->options_file;

        foreach ($options['sections'] as $section) {
            foreach ($section['fields'] as $field) {
                $attr = array('name' => $this->get_field_name($field['id']) , 'id' => $this->get_field_id($field['id']));
                if (isset($old_instance[$field['id']])) {
                    $form_field = $this->create_field($field, $old_instance[$field['id']], $attr);
                    if ($form_field !== false) {
                        $new_instance[$field['id']] = $form_field->save($new_instance);
                    }
                }
            }
        }

        return $new_instance;
    }

    public function form($instance)
    {
        $options = include PM_THEME_DIR . 'inc/options/widgets/widget-options/' . $this->options_file;

        foreach ($options['sections'] as $section) {
            foreach ($section['fields'] as $field) {
                $id = $this->get_field_id($field['id']);
                $attr = array('name' => $this->get_field_name($field['id']) , 'id' => $id);

                if (isset($instance[$field['id']])) {
                    $form_field = $this->create_field($field, $instance[$field['id']], $attr);
                } else {
                    $form_field = $this->create_field($field, isset($field['default'])? $field['default']:'default', $attr);
                }

                if ($form_field !== false) {
                    echo '<p>';
                    if ($field['type'] == 'checkbox') {
                        echo $form_field->render();
                        echo '<label for="' . $id . '">' . $field['name'] . '</label>';
                    } else {
                        echo '<label for="' . $id . '">' . $field['name'] . '</label>';
                        $form_field->render();
                    }
                    if (isset($field['desc'])) {
                        echo '<br/><span class="description">' . $field['desc'] . '</span>';
                    }
                    echo '</p>';
                }
            }
        }
    }

    public function get_option($name, $instance, $default = '')
    {
        $option = $default;
        if (isset($instance[$name])) {
            $option = $instance[$name];
        }

        return $option;
    }

    public function create_field($field, $value, $attr)
    {
        if (isset($field['type'])) {
            // load class for option type
            $class_file = PM_TF_DIR . 'inc/options/fields/' . $field['type'] . '/Interfused' . ucwords($field['type']) . '.php';
            if (file_exists($class_file)) {
                require_once $class_file;
                $option_class = 'Interfused' . ucwords($field['type']);
                if (class_exists($option_class)) {
                    return new $option_class($field, $value, $attr);
                }
            }
        }

        return false;
    }
}
