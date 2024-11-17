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
pm_blog_header();
// if masonry option set then use masonry option for name otherwise use blog style
$name = pm_get_option( 'blog_style' );
$classes = array( pm_get_option( 'blog_swatch' ) );

if( pm_get_option( 'blog_masonry' ) !== 'no-masonry' ) {
    $name = pm_get_option( 'blog_masonry' );
    if( pm_get_option( 'blog_masonry_section_transparent' ) === 'on' ) {
        $classes[] = 'section-transparent';
    }
}
?>
<section class="section <?php echo implode(' ', $classes); ?>">
    <?php get_template_part( 'partials/blog/list', apply_filters( 'pm_blog_type', $name ) ); ?>
</section>
<?php get_footer();