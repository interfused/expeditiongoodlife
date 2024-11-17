<?php
/**
 * Shows a simple single post
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */
global $pm_theme_options;
global $post;

$content           = get_the_content( '', pm_get_option('blog_stripteaser') === 'on' );
$extra_post_class  = pm_get_option('blog_post_icons') === 'on' ? 'post-showinfo' : '';
$gallery_shortcode = pm_get_content_shortcode( $post, 'gallery' );
$gallery_ids       = null;

if( $gallery_shortcode !== null ) {
    if( isset( $gallery_shortcode[0] ) ) {
        if( array_key_exists( 3, $gallery_shortcode ) ) {
            if( array_key_exists( 0, $gallery_shortcode[3] ) ) {
                $gallery_attrs = shortcode_parse_atts( $gallery_shortcode[3][0] );
                if( array_key_exists( 'ids', $gallery_attrs) ) {
                    $gallery_ids = explode( ',', $gallery_attrs['ids'] );
                }
            }
        }
        // strip shortcode from the content
        $content = str_replace( $gallery_shortcode[0], '', $content );
    }
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $extra_post_class ); ?>>
    <div class="post-media">
        <?php
        if( !is_search() ) {
            if( $gallery_ids !== null ) {
                echo pm_shortcode_slideshow( array(
                    'ids'                 => $gallery_ids,
                    'animation'           => $pm_theme_options['animation'],
                    'speed'               => $pm_theme_options['speed'],
                    'duration'            => $pm_theme_options['duration'],
                    'directionnav'        => $pm_theme_options['directionnav'],
                    'itemwidth'           => '',
                    'showcontrols'        => $pm_theme_options['showcontrols'],
                    'controlsposition'    => $pm_theme_options['controlsposition'],
                    'controlsalign'       => $pm_theme_options['controlsalign'],
                    'captions'            => $pm_theme_options['captions'],
                    'captions_horizontal' => $pm_theme_options['captions_horizontal'],
                    'autostart'           => $pm_theme_options['autostart'],
                    'tooltip'             => $pm_theme_options['tooltip'],
                    // global options
                    'margin_top'             => 'no-top',
                    'margin_bottom'          => 'no-bottom',
                    'scroll_animation'       => 'none',
                    'scroll_animation_delay' => '0',
                ));
            }
            else if ( has_post_thumbnail()  ) {
                get_template_part( 'partials/blog/posts/normal/featured-image' );
            }
        }
        ?>
    </div>

    <?php get_template_part( 'partials/blog/posts/normal/post', 'header' ); ?>

    <div class="post-body">
        <?php
        echo apply_filters( 'the_content', $content );

        if( !is_single() && pm_get_option('blog_show_readmore') == 'on' ) {
            // show up to readmore tag and conditionally render the readmore
            pm_read_more_link();
        }
        ?>
    </div>

    <?php get_template_part( 'partials/blog/posts/normal/post', 'footer' ); ?>
</article>