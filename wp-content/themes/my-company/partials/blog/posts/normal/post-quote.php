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
$extra_post_class  = pm_get_option('blog_post_icons') == 'on'? 'post-showinfo':'';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $extra_post_class ); ?>>
    <?php if( pm_get_option( 'blog_post_icons' ) === 'on' ) : ?>
		<header class="post-head small-screen-center no-title">
	        <span class="post-icon">
	            <?php pm_post_icon($post->ID, true); ?>
	        </span>
	    </header>
    <?php endif; ?>
    <div class="post-body">
        <?php echo pm_shortcode_blockquote( array(
            'who'           => get_the_title(),
            'margin_top'    => 'no-top',
            'margin_bottom' => 'no-bottom'
        ), get_the_content() ); ?>
    </div>
</article>