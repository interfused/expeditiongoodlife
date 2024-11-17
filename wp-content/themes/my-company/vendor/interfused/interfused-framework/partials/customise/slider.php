<?php
/**
 * Renders a slider for customiser
 *
 * @package mycompany
 * @subpackage Admin
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 * @author Interfused.com
 */?>
<label>
    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    <div></div>
    <input type="text" class="slider-option" value="<?php echo esc_attr( $this->value() ); ?>" min="<?php echo $this->choices['min']; ?>" max="<?php echo $this->choices['max']; ?>" step="<?php echo $this->choices['step']; ?>" <?php $this->link(); ?> />
</label>