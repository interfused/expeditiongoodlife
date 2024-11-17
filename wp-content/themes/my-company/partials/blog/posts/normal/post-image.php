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
global $post;
$extra_post_class   = pm_get_option('blog_post_icons') === 'on' ? 'post-showinfo' : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $extra_post_class ); ?>>
    <?php if( has_post_thumbnail() && !is_search()) : ?>
        <div class="post-media">
            <?php get_template_part( 'partials/blog/posts/normal/featured-image' ); ?>
        </div>
    <?php endif; ?>

    <?php get_template_part( 'partials/blog/posts/normal/post', 'header' ); ?>

    <div class="post-body">
        <?php
        the_content( '', pm_get_option('blog_stripteaser') === 'on' );
        if( !is_single() && pm_get_option('blog_show_readmore') === 'on' ) {
            // show up to readmore tag and conditionally render the readmore
            pm_read_more_link();
        }
        ?>
    </div>

    <?php get_template_part( 'partials/blog/posts/normal/post', 'footer' ); ?>
</article>