<?php
/**
 * Creates a chart
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */
?>
<div class="<?php echo implode(' ', $classes); ?>" data-os-animation="<?php echo $atts['scroll_animation']; ?>" data-os-animation-delay="<?php echo $atts['scroll_animation_delay']; ?>s">
    <?php echo wp_charts_shortcode( $atts );?>
</div>