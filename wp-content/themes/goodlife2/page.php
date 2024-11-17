<?php 
	get_header();
	the_post();
?>

<section id="content" class="clearfix">
	
	<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php 
			the_title('<h1 class="article-title remove-bottom">','</h1>');
			the_content();
			wp_link_pages();
		?>
		<div class="clear"></div><!--clear floats-->
		
	</article>
	
</section>
	
<?php	
	get_footer();