<?php
/**
 * Template Name: Woocommerce account template
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 0.1
 *
 
 
 * @version 1.10.3
 */

get_header();
pm_woo_shop_header();
while( have_posts() ) {
    the_post();
    get_template_part('partials/content', 'account');
}

get_footer();