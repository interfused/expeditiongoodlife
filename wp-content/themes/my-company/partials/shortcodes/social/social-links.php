<?php
/**
 * Social Links for posts
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 1.01
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */
?>
<div class="<?php echo implode(' ', $container_classes); ?>" data-os-animation="<?php echo $scroll_animation; ?>" data-os-animation-delay="<?php echo $scroll_animation_delay; ?>s">
    <?php if( !empty( $title ) ) : ?>
        <label>
            <?php echo $title; ?>
        </label>
    <?php endif; ?>
    <ul class="<?php echo implode(' ', $classes); ?>"><?php
        foreach( $icons as $icon => $name ) : 
            if( isset( $atts[$icon] ) ) : ?>
                <li>                    
                    <a href="<?php echo $atts[$icon] ?>" target="<?php echo $link_target; ?>" style="background-color:<?php echo $background_colour; ?>;" data-iconcolor="<?php echo pm_get_icon_color(str_replace('_','-',$icon)); ?>">
                        <i class="fa fa-<?php echo str_replace('_','-',$icon); ?>"></i>
                    </a>
                </li><?php
            endif;
         endforeach; ?>
    </ul>
</div><?php

