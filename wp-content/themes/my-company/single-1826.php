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
?>
<section class="section <?php echo pm_get_option( 'blog_swatch' ); ?> paddedTop-2x paddedBottom-4x ">
<div class="container">
<div class="row"><div class="col-sm-12">    
	<article id="post-<?php the_ID(); ?>" <?php post_class( $extra_post_class ); ?>>
   
   <header class="post-head">
                
             <?php the_title('<h1 class="post-title">','</h1>');?>         
    <!-- <small>
                    by            <a href="http://www.expeditiongoodlife.com/author/amanda/">
                amanda            </a>
                            on            July 7, 2015                <a href="http://www.expeditiongoodlife.com/paleo-cooking/mangorita/#respond">No comments</a>    </small>
 -->
    </header>
    
    
    
    <?php echo do_shortcode('[share_w_counts][/share_w_counts]');?>
	<?php if( has_post_thumbnail() && !is_search()) : ?>
        <div class="post-media">
            <?php get_template_part( 'partials/blog/posts/normal/featured-image' ); ?>
        </div>
    <?php endif; ?>

    
    <?php //get_template_part( 'partials/blog/posts/normal/post', 'header' ); 
	//the_content();
	?>

    <div class="post-body">
        <?php
        the_content( '', pm_get_option('blog_stripteaser') === 'on' );
        if( !is_single() && pm_get_option('blog_show_readmore') == 'on' ) {
            // show up to readmore tag and conditionally render the readmore
            pm_read_more_link();
        }
        ?>
    </div>
    <?php get_template_part( 'partials/blog/posts/normal/post', 'footer' ); ?>
     
<?php echo do_shortcode('[scriptless_share][/scriptless_share]');?>


   
</article>
<div id="fbCommentBox">
<?php 
echo do_shortcode('[fbcomments]');
?>
</div>


</div>


</div>

</div>

</section>

<script type="text/javascript">jQuery(document).ready(function($) { 
	$('#eglsh-total').sharrre({
		className: 'eglsh-button',
		share: {
			twitter:true,
			googlePlus:true,
			facebook:true,
			pinterest:true,
			},
		enableHover: false,
		urlCurl: 'http://expeditiongoodlife.com/wp-content/plugins/sharrre/sharrre/sharrre.php',
		});
		

		
	 });</script>

<?php get_footer();