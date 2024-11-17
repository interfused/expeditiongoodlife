<?php
/**
 * Template Name: Right Sidebar
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 0.1
 *
 
 
 * @version 1.10.3
 */

get_header();
global $post;
pm_page_header( $post->ID, array( 'heading_type' => 'page' ) );
$allow_comments = pm_get_option( 'site_comments' );
?>
<section class="section <?php echo get_post_meta( $post->ID, THEME_SHORT. '_sidebar_page_swatch', true ); ?>">
    <div class="container">
        <div class="row element-normal-top">
            <div class="col-md-9">
                <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'partials/content', 'page' ); ?>

                <?php endwhile; ?>
            </div>
            <div class="col-md-3 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>
<?php if( $allow_comments === 'pages' || $allow_comments === 'all' ) : ?>
<section class="section <?php echo pm_get_option( 'page_comments_swatch' ); ?>">
    <div class="container">
        <div class="row element-normal-top element-normal-bottom">
            <?php comments_template( '', true ); ?>
        </div>
    </div>
</section>
<?php
endif;
get_footer();