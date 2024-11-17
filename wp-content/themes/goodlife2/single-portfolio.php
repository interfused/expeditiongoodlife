<?php 
	get_header();
	the_post();
	
	/**
	 * Get post attachments
	 */
	$attachments = get_post_meta( $post->ID, '_ebor_image_list', true );
?>

<section id="content" class="clearfix">
	
	<article id="portfolio-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php if( $attachments && !( post_password_required() ) ) : ?>
			<div class="two_thirds">
				<?php 
					foreach ( $attachments as $attachment ){
						$resized_image = aq_resize($attachment, '702', '9999', 0);
						echo '<a href="'.$attachment.'" class="portfolio-lightbox-image view" rel="gallery">
								<img src="'.$resized_image.'" alt="'.get_the_title().'" />
							  </a>';
					}
				?>
			</div>
			
			<div class="one_third last">
		<?php endif; ?>
		
			<?php 
				the_title('<h1 class="article-title">','</h1>');
				the_content( get_option('blog_continue', 'Continue Reading &rarr;') );
				wp_link_pages();
				echo ebor_the_simple_terms_links();
				get_template_part('loop/loop','postnav'); 
			?>
			
		<?php if( $attachments && !( post_password_required() ) ) : ?>
			</div>
			<div class="clear"></div><!--clear floats-->
		<?php endif; ?>
		
	</article>

</section>

<?php	
	get_footer();