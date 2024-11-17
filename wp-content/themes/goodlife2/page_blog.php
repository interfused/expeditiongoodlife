<?php 
	/*
	Template Name: Demo Only
	*/
	get_header();
	the_post();
?>

<section id="content" class="clearfix">
	
	<div id="blog-alt-padder">
	
		<?php 
			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
			$blog_query = new WP_Query('post_type=post&posts_per_page=6&paged='.$paged);
			if ( $blog_query->have_posts() ) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
				
				get_template_part('loop/content','alt');
			
			endwhile;	
			else : 
				
				get_template_part('loop/content','none');
				
			endif;
			
			echo function_exists('ebor_pagination') ? ebor_pagination($blog_query->max_num_pages) : posts_nav_link();
			wp_reset_query();
		?>
		
	</div>

</section>
	
<?php	
	get_footer();