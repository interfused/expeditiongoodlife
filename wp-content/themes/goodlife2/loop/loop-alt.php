<section id="content" class="clearfix">
	
	<div id="blog-alt-padder">
	
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