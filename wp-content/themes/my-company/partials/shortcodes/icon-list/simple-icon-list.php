<?php
/**
 * Simple Icon List shortcode partial
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 1.01
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */
?>
<ul class="fa-ul <?php echo implode( ' ', $classes ); ?>" data-os-animation="<?php echo $scroll_animation; ?>" data-os-animation-delay="<?php echo $scroll_animation_delay; ?>s">
    <?php echo do_shortcode( $content ); ?>
</ul>