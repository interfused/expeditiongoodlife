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
pm_page_header( $post->ID, array( 'heading_type' => 'page' ) );
while( have_posts() ) {
    the_post();
    get_template_part('partials/content', 'page');
}

$allow_comments = pm_get_option( 'site_comments' );
if( $allow_comments === 'pages' || $allow_comments === 'all' ) : ?>
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
