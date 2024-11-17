<?php 
	get_header();
	the_post();
?>

<section id="content" class="clearfix">
<h3>{This should be a DIY single blog post}</h3>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php 
			if( is_active_sidebar('blog') && get_post_meta( $post->ID, '_ebor_disable_sidebar', true ) !=='on' )
				echo '<div class="two_thirds">';
				
			the_title('<h1 class="article-title margin-bottom-10">','</h1>');
			get_template_part('loop/loop','meta');
			the_content();
			wp_link_pages();
			the_tags(__('Tags: ', 'ebor_starter'), ', ', '');
			
			get_template_part('loop/loop','postnav'); 
			
			if( comments_open() )
				comments_template();
				
			if( is_active_sidebar('blog') && get_post_meta( $post->ID, '_ebor_disable_sidebar', true ) !=='on' ){
				echo '</div>';
				get_sidebar('blog');
			}
		?>
	
	</article>

</section>

<?php 
	get_footer();