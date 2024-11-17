<?php
	global $post;
	
	/**
	 * Determine if we're looking at a single post or a feed, and prepend our theme options accordingly
	 */
	( is_single() ) ? $location = 'single_' : $location = 'index_';
	
	if(!( get_option($location.'meta','1') == '1' ))
		return false;
?>

<span class="margin-right-10">
	<i class="fa fa-comment-o"></i>
	<?php comments_number( __('0','ebor_starter'), __('1','ebor_starter'), __('%','ebor_starter') ); ?>
</span>
<span>
	<?php 
		if( is_single() ){ 
			ebor_likes();
		} else {
			 echo '<i class="fa fa-heart-o"></i>';
		}
		echo ' ' . get_post_meta( $post->ID, '_ebor_likes', 1); 
	?>
</span>
<span class="floatright"><?php // the_time( get_option('date_format') ); ?></span>

<?php 
	if( $location == 'single_' )
		echo '<div class="break-40"></div>';