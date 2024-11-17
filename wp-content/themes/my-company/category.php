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
pm_blog_header( single_cat_title( '', false ), category_description() );
// if masonry option set then use masonry option for name otherwise use blog style
$name = pm_get_option( 'blog_masonry' ) === 'no-masonry' ? pm_get_option( 'blog_style' ) : pm_get_option( 'blog_masonry' );
?>
<section class="section <?php echo pm_get_option( 'blog_swatch' ); ?>">
    <?php get_template_part( 'partials/blog/list', $name ); ?>
</section>
<?php get_footer();