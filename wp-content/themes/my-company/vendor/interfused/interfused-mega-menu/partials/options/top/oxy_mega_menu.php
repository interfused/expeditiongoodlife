<?php
/**
 * Mega Menu Options
 *
 * @package mycompany
 * @subpackage Admin
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 * @author Interfused.com
 */
require_once PM_TF_DIR . 'inc/options/fields/select/InterfusedSelect.php';
$column_borders_option = array(
    'name'    => 'Borders',
    'desc'    => 'Borders',
    'id'      => 'Borders',
    'type'    => 'select',
    'options' => array(
        'on'  => __('On', 'my_theme-admin-td'),
        'off' => __('Off', 'my_theme-admin-td'),
    ),
    'default' => 'on'
);
$column_borders_select_value = isset($item->pm_mega_borders) ? esc_attr($item->pm_mega_borders) : '';
$column_borders_select = new InterfusedSelect($column_borders_option, $column_borders_select_value, array(
    'id' => 'edit-menu-item-mega_borders-' . $item_id,
    'name' => 'menu-item-pm_mega_borders[' . $item_id . ']',
    'class' => 'widefat edit-menu-item-mega_borders',
));
?>
<p class="field-url pm-url description-wide">
    <label for="edit-menu-item-pm-url-<?php echo $item_id; ?>">
        <?php _e('URL', 'my_theme-admin-td'); ?><br />
        <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-pm_mega_url[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->pm_mega_url); ?>" />
    </label>
</p>
<p class="field-url pm_bg_url description-wide">
    <label for="edit-menu-item-pm_bg_url-<?php echo $item_id; ?>">
        <?php _e('Background Image URL','my_theme-admin-td'); ?><br />
        <input type="text" id="edit-menu-item-pm_bg_url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-pm_bg_url" name="menu-item-pm_bg_url[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->pm_bg_url); ?>" />
    </label>
</p>
<p class="field-mega_borders pm-mega_borders description-wide">
    <label for="edit-menu-item-pm-mega_borders-<?php echo $item_id; ?>">
        <?php _e('Show Column Borders', 'my_theme-admin-td'); ?><br />
        <?php $column_borders_select->render(); ?>
        <span class="description"><?php _e('Useful for image backgrounds.', 'my_theme-admin-td'); ?></span>
    </label>
</p>
