 <?php
/**
 * Tags shortcode
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */
?>
<ul class="<?php echo implode(' ', $classes); ?>" data-os-animation="<?php echo $scroll_animation; ?>" data-os-animation-delay="<?php echo $scroll_animation_delay; ?>s">
<?php
	foreach( $tags as $tag ) : ?>
		<li>
            <span>
                <?php echo $tag; ?>
            </span>
		</li><?php
	endforeach; ?>
</ul>