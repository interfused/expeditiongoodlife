<?php
/**
 * Template Name: Full Width Padded
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

<section class="section">
    <div class="container">
        <div class="row element-normal-top">
            <div class="col-md-12">
                <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'partials/content', 'page' ); ?>

                <?php if( $allow_comments == 'pages' || $allow_comments == 'all' ) comments_template( '', true ); ?>

                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer();