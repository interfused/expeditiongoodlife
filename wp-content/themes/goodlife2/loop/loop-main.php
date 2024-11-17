<section id="content" class="clearfix">

	<div class="isotope-wrapper portfolio">

		<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				
				get_template_part('loop/content','main');
			
			endwhile;	
			else : 
				
				get_template_part('loop/content','none');
				
			endif;
		?>
	
	</div>
	
	<div class="text-center">
		<?php echo function_exists('ebor_pagination') ? ebor_pagination() : posts_nav_link(); ?>
	</div>

</section>