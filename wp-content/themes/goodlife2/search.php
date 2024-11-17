<?php 
	get_header();
	
	global $wp_query;
	$total_results = $wp_query->found_posts;
	( $total_results == '1' ) ? $items = __('Item','ebor_starter') : $items = __('Items','ebor_starter'); 
?>
	
<section id="content" class="clearfix">

	<div id="blog-alt-padder">
	
		<h1 class="article-title search-title">
			<?php 
				echo sprintf( __('Your Search For:','ebor_starter') . ' "%s" ' . __( 'Returned:', 'ebor_starter' ) . ' %s %s ', get_search_query(), $total_results, $items);
			?>
		</h1>
		
		<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				
				get_template_part('loop/content','alt');
				
			endwhile;	
			else : 
				
				get_template_part('loop/content','none');
				
			endif;
			
			echo function_exists('ebor_pagination') ? ebor_pagination() : posts_nav_link();
		?>
	
	</div>

</section>

<?php	
	get_footer();