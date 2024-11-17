<?php
/**
 * Global menu option for below main menu options
 *
 * @package mycompany
 * @subpackage MegaMenu
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 * @author Interfused.com
 */
require_once PM_TF_DIR . 'inc/options/fields/select/InterfusedSelect.php';

// create options and value for icon select
$icon_option = array(
    'name'    => 'Icon',
    'desc'    => 'Icon',
    'id'      => 'Icon',
    'type'    => 'select',
    'options' => 'icons',
    'default' => ''
);
$icon_select_value = isset($item->pm_icon) ? esc_attr($item->pm_icon) : '';
$icon_select = new InterfusedSelect($icon_option, $icon_select_value, array(
    'id' => 'edit-menu-item-icon-' . $item_id,
    'name' => 'menu-item-pm_icon[' . $item_id . ']',
    'class' => 'widefat edit-menu-item-icon',
));
// create option for special menu items
// create options and value for icon select
$special_option = array(
    'name'    => 'Type',
    'desc'    => 'Type',
    'id'      => 'Type',
    'type'    => 'select',
    'options' => array(
        ''                    => __('Normal Menu', 'my_theme-admin-td'),
        'divider'             => __('Divider', 'my_theme-admin-td'),
        'nav-highlight'       => __('Button Menu', 'my_theme-admin-td'),
        'nav-highlight-ghost' => __('Bordered Button Menu', 'my_theme-admin-td'),
        'disabled'            => __('Disabled Menu', 'my_theme-admin-td')
    ),
    'default' => ''
);
$special_select_value = isset($item->pm_special) ? esc_attr($item->pm_special) : '';
$special_select = new InterfusedSelect($special_option, $special_select_value, array(
    'id' => 'edit-menu-item-special-' . $item_id,
    'name' => 'menu-item-pm_special[' . $item_id . ']',
    'class' => 'widefat edit-menu-item-special',
));
// create options and value for icon select
$label_type_option = array(
    'name'    => 'Label Type',
    'desc'    => 'Label Type',
    'id'      => 'Label Type',
    'type'    => 'select',
    'options' => array(
        'default' => __('Default', 'my_theme-admin-td'),
        'primary' => __('Primary', 'my_theme-admin-td'),
        'success' => __('Success', 'my_theme-admin-td'),
        'info'    => __('Info', 'my_theme-admin-td'),
        'warning' => __('Warning', 'my_theme-admin-td'),
        'danger'  => __('Danger', 'my_theme-admin-td'),
    ),
    'default' => ''
);
$label_type_select_value = isset($item->pm_label_type) ? esc_attr($item->pm_label_type) : '';
$label_type_select = new InterfusedSelect($label_type_option, $label_type_select_value, array(
    'id' => 'edit-menu-item-label_type-' . $item_id,
    'name' => 'menu-item-pm_label_type[' . $item_id . ']',
    'class' => 'widefat edit-menu-item-label_type',
));
?>
<p class="field-icon pm-icon description-wide">
    <label for="edit-menu-item-icon-<?php echo $item_id; ?>">
        <?php _e('Menu Icon', 'my_theme-admin-td'); ?>
        <?php $icon_select->render(); ?>
        <span class="description"><?php _e('This will display an icon to the left of the menu item.', 'my_theme-admin-td'); ?></span>
    </label>
</p>
<p class="field-url pm_label description-thin">
    <label for="edit-menu-item-pm_label-<?php echo $item_id; ?>">
        <?php _e('Extra menu label','my_theme-admin-td'); ?>
        <input type="text" id="edit-menu-item-pm_label-<?php echo $item_id; ?>" class="widefat code edit-menu-item-pm_label" name="menu-item-pm_label[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->pm_label); ?>" />
        <span class="description"><?php _e('Adds a label to the menu item.', 'my_theme-admin-td'); ?></span>
    </label>
</p>
<p class="field-icon pm-label-type description-thin">
    <label for="edit-menu-item-label_type-<?php echo $item_id; ?>">
        <?php _e('Label Type', 'my_theme-admin-td'); ?>
        <?php $label_type_select->render(); ?>
        <span class="description"><?php _e('Select a style to use for the label.', 'my_theme-admin-td'); ?></span>
    </label>
</p>
<?php if($item->object !== 'pm_mega_columns') : ?>
<p class="field-icon pm-icon description-wide" style="margin-top: 28px;">
    <label for="edit-menu-item-icon-<?php echo $item_id; ?>">
        <?php _e('Special Menu Item', 'my_theme-admin-td'); ?>
        <?php $special_select->render(); ?>
        <span class="description"><?php _e('This will change the menu to a special typy of menu item.', 'my_theme-admin-td'); ?></span>
    </label>
</p>
<?php endif; ?>