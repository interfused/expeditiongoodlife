<?php
/**
 * Simple Icon shortcode partial
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 1.01
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */
?>
<?php
$title = empty($link) ? $title : '<a href="' . $link . '" target="' . $link_target . '">' . $title . '</a>'; ?>
<li>
    <?php if( !empty( $fa_icon ) ) : ?>
        <i class="fa fa-li fa-<?php echo $fa_icon; ?>" style="color:<?php echo $icon_color; ?>;">
        </i>
    <?php endif; ?>
    <?php echo $title; ?>
</li>