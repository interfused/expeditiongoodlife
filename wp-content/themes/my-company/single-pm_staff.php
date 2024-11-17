<?php
/**
 * Default page template
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 0.1
 *
 * @copyright **COPYRIGHT*
 
 * @version 1.10.3
 */

get_header();
global $post;
pm_page_header( $post->ID, array( 'heading_type' => 'page' ) );
while( have_posts() ) {
    the_post();
    get_template_part('partials/content', 'page');
}
get_footer();