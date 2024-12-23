<?php
/**
 * Shows a posts featured image
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */

global $post;

$image_link         = is_single() ? '' : get_permalink( $post->ID );
$image_link_type    = is_single() && pm_get_option( 'blog_fancybox' ) === 'on' ? 'magnific' : 'item';
$image_overlay_icon = is_single() ? 'plus' : 'link';
$image_overlay      = pm_get_option( 'blog_fancybox' ) === 'on' ? 'icon' : 'none';

echo pm_section_vc_single_image( array(
    'image'          => get_post_thumbnail_id( $post->ID ),
    'size'           => 'full',
    'link'           => $image_link,
    'item_link_type' => $image_link_type,
    'overlay_icon'   => $image_overlay_icon,
    'margin_top'     => 'no-top',
    'overlay'        => $image_overlay
));