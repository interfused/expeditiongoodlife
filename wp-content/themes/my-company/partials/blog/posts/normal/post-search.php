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
$extra_post_class   = pm_get_option('blog_post_icons') === 'on' ? 'post-showinfo' : '';
?>
<article id="post-<?php the_ID(); ?>" class="post <?php echo $extra_post_class; ?>">
    <header class="post-head small-screen-center">
        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'my_theme-td' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>
        <small>
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
                <?php the_author(); ?>
            </a>

            <?php the_time(get_option('date_format')); ?>

            <?php if( pm_get_option( 'blog_post_icons' ) == 'on'){ ?>
            <span class="post-icon post-search-icon">
                <?php echo $post_count; ?>
            </span>
            <?php } ?>
        </small>
    </header>
    <div class="post-body">
        <?php the_excerpt(); ?>
    </div>
</article>
