<?php
/**
 * Post header
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */
?>
<header class="post-head">
    <?php if( is_sticky() ) : ?>
        <span class="post-sticky">
            <i class="fa fa-star"></i>
        </span>
    <?php endif; ?>
    <?php if( !is_single() ) : ?>
        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'my_theme-td' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>
    <?php else : ?>
        <h1 class="post-title">
            <?php the_title(); ?>
        </h1>
    <?php endif; ?>

    <small>
        <?php if( pm_get_option( 'blog_author' ) === 'on' ) : ?>
            <?php _e( 'by', 'my_theme-td' );  ?>
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                <?php the_author(); ?>
            </a>
        <?php endif; ?>
        <?php if( pm_get_option( 'blog_date' ) === 'on' ) : ?>
            <?php _e( 'on', 'my_theme-td' ); ?>
            <?php the_time(get_option('date_format')); ?>
        <?php endif; ?>
        <?php if (pm_get_option('blog_comment_count') == 'on') {
            comments_popup_link( __( 'No comments', 'my_theme-td' ), __( '1 comment', 'my_theme-td' ), __( '% comments', 'my_theme-td' ) );
        } ?>
    </small>

    <?php if( pm_get_option( 'blog_post_icons' ) == 'on') : ?>
        <span class="post-icon">
            <?php pm_post_icon( $post->ID, true ); ?>
        </span>
    <?php endif; ?>
</header>