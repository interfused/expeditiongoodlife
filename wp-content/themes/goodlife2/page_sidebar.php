<?php 
	/*
	Template Name: Page With Sidebar
	*/
	get_header();
	the_post();
?>

<section id="content" class="clearfix">
	
	<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<div class="three_fourths">
		<?php 
			the_title('<h1 class="article-title remove-bottom">','</h1>');
			the_content();
			wp_link_pages();
		?>
		</div>
		
		<?php get_sidebar('page'); ?>
		
		<div class="clear"></div><!--clear floats-->
		
	</article>
	
</section>
	
<?php	
	get_footer();