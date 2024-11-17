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
	$image = aq_resize($url[0], 440, 9999, 0, false);
	
	if(!( $image[0] ))
		$image[0] = $url[0];
	
	$link = get_permalink();
	
	if( get_option('portfolio_permalink','0') == 1 )
		$link = $url[0];
?>

<article id="portfolio-<?php the_ID(); ?>" <?php post_class(); ?>>

	<a href="<?php echo $link; ?>" class="portfolio-index-link">
		<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" />
		<?php 
			the_title('<h3>','</h3>');  
		?>
	</a>
	
	<?php ebor_likes(); ?>
	
	<a href="<?php echo $url[0]; ?>" class="view ebor-lightbox" rel="gallery" title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>
	
	<?php if( get_post_meta($post->ID, '_ebor_featured', 1) == 'on' ) : ?>
		<a href="#" class="ebor-featured"><i class="fa fa-star"></i></a>
	<?php endif; ?>
	
</article>