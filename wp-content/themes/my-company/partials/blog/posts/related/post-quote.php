<?php
/**
 * Shows a simple single post
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */
$src = '';
if( has_post_thumbnail() ) {
    $attachment = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
    if ( isset( $attachment[0] ) ) {
        $src = 'style="background-image: url(' . $attachment[0] . ')"';
    }
}
?>
<article id="post-<?php the_ID(); ?>" class="post-related-post" <?php echo $src; ?>>
    <?php echo pm_shortcode_blockquote( array(
        'who'           => get_the_title(),
        'margin_top'    => 'no-top',
        'margin_bottom' => 'no-bottom'
    ), get_the_content() ); ?>
</article>