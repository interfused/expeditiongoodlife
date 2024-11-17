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
global $wp_embed;
global $post;

$content          = get_the_content( '', pm_get_option('blog_stripteaser') === 'on' );
$video_shortcode  = pm_get_content_shortcode( $post, 'embed' );
$extra_post_class = pm_get_option('blog_post_icons') === 'on' ? 'post-showinfo' : '';

if( $video_shortcode !== null ) {
    $video_src = null;

    if( isset( $video_shortcode[0] ) ) {
        if(isset($video_shortcode[5][0])) {
            $video_src = $video_shortcode[5][0];
        }
        $video_shortcode = $video_shortcode[0];
        if( isset( $video_shortcode[0] ) ) {
            $content = str_replace( $video_shortcode[0], '', $content );
        }
    }
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $extra_post_class ); ?>>
    <div class="post-media">
        <?php
        if( !is_search() ) {
            if( $video_shortcode !== null ) {
                if (preg_match("/^.*\.(mp4|webm|ogg)$/i", $video_src)) { ?>
                    <div class="video-wrapper">
                        <video controls style="width: 100%; height: 100%;">
                            <source type="video/mp4" src="<?php echo $video_src; ?>"/>
                        </video>
                    </div><?php
                }
                else {
                    echo $wp_embed->run_shortcode( $video_shortcode[0] );
                }
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