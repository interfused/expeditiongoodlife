<?php
/**
 * Displays the main body of the theme
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 0.1
 *
 
 
 * @version 1.10.3
 */

get_header();
pm_blog_header( __('Results for', 'my_theme-td'), get_search_query() );
?>
<section class="section <?php echo pm_get_option( 'blog_swatch' ); ?>">
    <?php get_template_part( 'partials/blog/list', pm_get_option( 'blog_style' ) ); ?>
</section>
<?php get_footer();