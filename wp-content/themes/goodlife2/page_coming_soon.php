<?php 
	/*
	Template Name: Coming Soon
	*/
	get_header('maintenance');
	the_post();
?>

<section id="content" class="clearfix">
	
	<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php 
			the_content(); 
			
			if( get_the_content() )
				echo '<div class="content-break"></div>';
		?>
		
		<div id="countdown">
		
		</div>
		
		<script type="text/javascript">
			jQuery(document).ready(function(){
			   jQuery('#countdown').countdown('<?php echo get_post_meta( $post->ID, '_ebor_soon_date', 1 ); ?>', function(event) {
			     jQuery(this).html(event.strftime('<div class="clock-wrapper"><div class="clock"><span class="big-time">%D</span><span class="small-time">Days</span></div></div><div class="clock-wrapper"><div class="clock"><span class="big-time">%H</span><span class="small-time">Hours</span></div></div><div class="clock-wrapper"><div class="clock"><span class="big-time">%M</span><span class="small-time">Minutes</span></div></div><div class="clock-wrapper last"><div class="clock"><span class="big-time">%S</span><span class="small-time">Seconds</span></div></div>'));
			   });
			});
		</script>
	
	</article>
	
</section>

<?php	
	get_footer();