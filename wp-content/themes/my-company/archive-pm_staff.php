<?php
/**
 * Displays the archive for pm_staff custom post type
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 0.1
 *
 
 
 * @version 1.10.3
 */

get_header(); 

$page = pm_get_option( 'staff_archive_page' ); 
if( !empty( $page ) ) : 	
	
	global $post;
	$post = get_post($page);
	setup_postdata($post);
	
	pm_page_header( $post->ID );
	get_template_part('partials/content', 'page');
	
	wp_reset_postdata();

endif; 

get_footer();