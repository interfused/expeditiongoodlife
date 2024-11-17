<?php
	/**
	* This loop is used to create items for the portfolio archives and also the homepage template.
	* Any custom functions prefaced with ebor_ are found in /ebor_framework/theme_functions.php
	* First let's declare $post so that we can easily grab everthing needed.
	*/
	global $post;
	
	/**
	* Next, we need to grab the featured image URL of this post, so that we can trim it to the correct size for the chosen size of this post.
	*/
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
	
	/**
	* Now let's crop the image with the aq_resize function, from the aqua resizer found at /ebor_framework/aq_resizer.php
	* We'll return an array to build the image with
	* @return array
	*/
	if( $url )
		$image = aq_resize($url[0], 630, 350, 1, false);
	
	/**
	 * Determine if we're looking at a single post or a feed, and prepend our theme options accordingly
	 */
	( is_single() ) ? $location = 'single_' : $location = 'index_';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if( $url ) : ?>
		<div class="blog-image-wrapper">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" />
			</a>
			
			<?php ebor_likes(); ?>
			
			<a href="<?php echo $url[0]; ?>" class="view ebor-lightbox" rel="gallery" title="<?php the_title(); ?>">
				<i class="fa fa-search"></i>
			</a>
			
			<?php if( get_post_meta($post->ID, '_ebor_featured', 1) == 'on' ) : ?>
				<a href="#" class="ebor-featured"><i class="fa fa-star"></i></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	
	<div class="article-wrapper">
		<?php 
			the_title('<h2 class="article-title"><a href="' . get_permalink() . '">','</a></h2>');  
			the_excerpt();
			wp_link_pages();
		?>
	</div>
	
	<?php if( get_option($location.'meta','1') == '1' ) : ?>
		<div class="post-meta">
			<?php get_template_part('loop/loop','meta'); ?>
		</div>
	<?php endif; ?>
	
</article>