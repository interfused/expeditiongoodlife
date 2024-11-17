<section id="content" class="clearfix">
	
	<?php
		if( is_tax() ){
			$taxonomy = get_queried_object();
			echo '<h1 class="article-title margin-bottom-10" style="margin: 2%;">'. $taxonomy->name .'</h1>';
		}
	?>
	
	<div class="isotope-wrapper portfolio">
	
		<?php 	
			if ( have_posts() ) : while ( have_posts() ) : the_post();
			
				get_template_part('loop/content','portfolio');
		
			endwhile;	
			else : 
				
				get_template_part('loop/content','none');
				
			endif;
		?>
	
	</div>
	
	<?php
		echo function_exists('ebor_pagination') ? ebor_pagination() : posts_nav_link();
	?>
	
</section>