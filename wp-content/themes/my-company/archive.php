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
$name = pm_get_option( 'blog_masonry' ) === 'no-masonry' ? pm_get_option( 'blog_style' ) : pm_get_option( 'blog_masonry' );
$title = null;
$subtitle = null;

get_header();
if( is_day() ) {
    $title = get_the_date( 'j M Y' );
    $subtitle = __( 'All posts from', 'my_theme-td' ) . ' ' . get_the_date( 'j M Y' );
}
elseif( is_month() ) {
    $title = get_the_date( 'F Y' );
    $subtitle = __( 'All posts from', 'my_theme-td' ) . ' ' . get_the_date( 'F Y' );
}
elseif( is_year() ) {
    $title = get_the_date( 'Y' );
    $subtitle = __( 'All posts from', 'my_theme-td' ) . ' ' . get_the_date( 'Y' );
}
pm_blog_header( $title, $subtitle );
?>
<section class="section <?php echo pm_get_option( 'blog_swatch' ); ?>">
    <?php get_template_part( 'partials/blog/list', $name ); ?>
</section>
<?php get_footer();