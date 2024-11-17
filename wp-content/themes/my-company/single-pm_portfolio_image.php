<?php
/**
 * Default page template
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 0.1
 *
 
 
 * @version 1.10.3
 */

get_header();
global $post;
pm_page_header( $post->ID, array( 'heading_type' => 'portfolio' ) );
while( have_posts() ) {
    the_post();
    get_template_part('partials/content', 'page');
}

$allow_comments = pm_get_option( 'site_comments' );
?>

<?php if ( pm_get_option('related_portfolio_items') === 'on' ) : ?>
    <?php get_template_part( 'partials/portfolio/portfolio-related' ); ?>
<?php endif; ?>


<?php if( $allow_comments === 'portfolio' || $allow_comments === 'all' ) : ?>
<section class="section <?php echo pm_get_option( 'portfolio_comments_swatch' ); ?>">
    <div class="container">
        <div class="row element-normal-top element-normal-bottom">
            <?php comments_template( '', true ); ?>
        </div>
    </div>
</section>
<?php
endif;
get_footer();