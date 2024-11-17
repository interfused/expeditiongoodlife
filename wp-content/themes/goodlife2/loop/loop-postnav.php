<div class="clear"></div>
<div class="postnav-wrapper">

	<?php
		global $post;
		
		$url[] = '';
		$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
				
		/*
		 * Check we're on a single post, or else, return
		 */
		if( !( is_single() ) )
			return;
	
		if( get_post_type() == 'portfolio' ){
			
			echo '<div class="clear"></div><div class="break-40"></div>';
			
			$displays = get_option('ebor_cpt_display_options');
			( $displays['portfolio_slug'] ) ? $slug = $displays['portfolio_slug'] : $slug = 'portfolio';
			
			$archive_url = home_url( $slug );
			
		} elseif( get_post_type() == 'post' ){
		
			( get_option( 'show_on_front' ) == 'page' ) ? $archive_url = get_permalink( get_option('page_for_posts' ) ) : $archive_url = home_url();
			
		}
	
		previous_post_link('%link', '<div class="prev postnav"><i class="fa fa-angle-left"></i></div>' );
	?>
		
		<a href="<?php echo $archive_url; ?>" class="postnav up">
			<i class="fa fa-th"></i>
		</a>
		
	<?php 
		next_post_link('%link', '<div class="next postnav"><i class="fa fa-angle-right"></i></div>' );
	?>

</div>

<div class="share"> 
	<a class="postnav" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" target="_blank" onClick="return ebor_fb_like()" class="btn pull-left btn-facebook"><i class="fa fa-facebook-square"></i></a> 
	<a class="postnav" href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank" onClick="return ebor_tweet()" class="btn pull-left btn-twitter"><i class="fa fa-twitter-square"></i></a> 
	<a class="postnav" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" onClick="return ebor_plus_one()" class="btn pull-left btn-googleplus"><i class="fa fa-google-plus-square"></i></a> 
	<a class="postnav" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>" onClick="return ebor_pin()" target="_blank" class="btn pull-left btn-pinterest"><i class="fa fa-pinterest-square"></i></a> 
	<div class="clear"></div>
</div>

<script type="text/javascript">
	function ebor_fb_like() {
		window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php echo sanitize_title(get_the_title()); ?>','sharer','toolbar=0,status=0,width=626,height=436');
		return false;
	}
	function ebor_tweet() {
		window.open('https://twitter.com/share?url=<?php the_permalink(); ?>&t=<?php echo sanitize_title(get_the_title()); ?>','sharer','toolbar=0,status=0,width=626,height=436');
		return false;
	}
	function ebor_plus_one() {
		window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>&t=<?php echo sanitize_title(get_the_title()); ?>','sharer','toolbar=0,status=0,width=626,height=436');
		return false;
	}
	function ebor_pin() {
		window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $url[0]; ?>&description=<?php echo sanitize_title(get_the_title()); ?>','sharer','toolbar=0,status=0,width=626,height=436');
		return false;
	}
</script>