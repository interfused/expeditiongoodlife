<?php
/**
 * Column menu options
 *
 * @package mycompany
 * @subpackage Admin
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 * @author Interfused.com
 */
require_once PM_TF_DIR . 'inc/options/fields/select/InterfusedSelect.php';
// create options and value for icon select
$widget_option = array(
    'name'    => 'Widget',
    'desc'    => 'Widget',
    'id'      => 'Widget',
    'type'    => 'select',
    'options' => array(
        'on' => __('On', 'my_theme-admin-td'),
        ''   => __('Off', 'my_theme-admin-td'),
    ),
    'default' => ''
);
$widget_select_value = isset($item->pm_widget) ? esc_attr($item->pm_widget) : '';
$widget_select = new InterfusedSelect($widget_option, $widget_select_value, array(
    'id' => 'edit-menu-item-widget-' . $item_id,
    'name' => 'menu-item-pm_widget[' . $item_id . ']',
    'class' => 'widefat edit-menu-item-widget',
));
?>
<p class="field-widget pm-widget description-wide">
    <label for="edit-menu-item-pm-widget-<?php echo $item_id; ?>">
        <?php _e('Use Column As Widget', 'my_theme-admin-td'); ?><br />
        <?php $widget_select->render(); ?>
        <span class="description"><?php _e('This will set this column up to be used as a widget position.', 'my_theme-admin-td'); ?></span>
    </label>
</p>
<p class="field-url pm_col_url description-wide">
    <label for="edit-menu-item-pm_col_url-<?php echo $item_id; ?>">
        <?php _e('Column Title URL', 'my_theme-admin-td'); ?><br />
        <input type="text" id="edit-menu-item-pm_col_url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-pm_col_url" name="menu-item-pm_col_url[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->pm_col_url); ?>" />
        <span class="description"><?php _e('Leave blank if column title is not linkable.', 'my_theme-admin-td'); ?></span>
    </label>
</p>
