<?php 
	/*
	Template Name: Homepage
	*/
	get_header();
	the_post();
?>

<section id="content" class="clearfix">
	
	<article id="page-<?php the_ID(); ?>" <?php post_class('home-article'); ?>>
	
		<?php 
			the_content(); 
			
			if( get_the_content() && get_option('homepage_portfolio', '1') == '1' || get_the_content() && get_option('homepage_blog', '1') == '1' )
				echo '<div class="content-break"></div>';
		?>
		
	</article>
			
		<div class="isotope-wrapper portfolio">
		
			<?php
				/**
				 * Show Portfolio on Homepage?
				 */
				if( get_option('homepage_portfolio', '1') == '1' ) :
				
					$homepage_args = array(
						'post_type' => 'portfolio',
						'posts_per_page' => '-1',
						'meta_query' => array(
							array(
								'key' => '_ebor_featured',
								'value' => 'on',
							)
						)
					);
					$portfolio_query = new WP_Query( $homepage_args );
					
					if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
					
						get_template_part('loop/content','portfolio');
						
					endwhile;	
					else : 
						
						get_template_part('loop/content','none');
						
					endif;
					wp_reset_query();
				
				endif;
			?>
				
			<?php
				/**
				 * Show Blog on Homepage?
				 */
				if( get_option('homepage_blog', '1') == '1' ) :
				
					$blog_homepage_args = array(
						'post_type' => 'post',
						'posts_per_page' => '-1',
						'meta_query' => array(
							array(
								'key' => '_ebor_featured',
								'value' => 'on',
							)
						)
					);
					$blog_query = new WP_Query( $blog_homepage_args );
					
					if ( $blog_query->have_posts() ) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
					
						get_template_part('loop/content','main');
						
					endwhile;	
					else : 
						
						get_template_part('loop/content','none');
						
					endif;
					wp_reset_query();
					
				endif;
			?>
	
		</div>
	
</section>

<?php	
	get_footer();