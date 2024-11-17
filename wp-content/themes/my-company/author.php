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
// get the author name
if( get_query_var('author_name') ) {
    $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
}
else {
    $author = get_userdata( get_query_var( 'author' ) );
}

get_header();
pm_blog_header( get_the_author_meta( 'display_name', $author->ID ), null );
// if masonry option set then use masonry option for name otherwise use blog style
$name = pm_get_option( 'blog_masonry' ) === 'no-masonry' ? pm_get_option( 'blog_style' ) : pm_get_option( 'blog_masonry' );
?>
<section class="section <?php echo pm_get_option( 'blog_swatch' ); ?>">
    <?php get_template_part( 'partials/blog/list', $name ); ?>
</section>
<?php get_footer();