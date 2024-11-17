<?php 
	get_header();
	the_post();
?>

<section id="content" class="clearfix">
<h3>{This should be a paleo cooking/recipes single blog post}</h3>
	<article id="post-<?php the_ID(); ?>" <?php post_class('swatch1'); ?>>

		<?php 
			if( is_active_sidebar('blog') && get_post_meta( $post->ID, '_ebor_disable_sidebar', true ) !=='on' )
				echo '<div id="wtf" class="two_thirds">';
				
			//	the_post_thumbnail();
				
			the_title('<h1 class="article-title margin-bottom-10">','</h1>');
			get_template_part('loop/loop','meta');
			echo '<div id="steps">';
			the_content();
			echo '</div>';
			wp_link_pages();
			the_tags(__('Tags: ', 'ebor_starter'), ', ', '');
			
			get_template_part('loop/loop','postnav'); 
			
			if( comments_open() )
				//comments_template();
				do_shortcode('[fbcomments]');
				?>
                
                <?php
			if( is_active_sidebar('blog') && get_post_meta( $post->ID, '_ebor_disable_sidebar', true ) !=='on' ){
				echo '</div>';
				get_sidebar('blog');
			}
		?>
	
	</article>

</section>

<?php 
	get_footer();