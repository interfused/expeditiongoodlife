<?php 
	/*
	Template Name: Maintenance
	*/
	get_header('maintenance');
	the_post();
?>

<section id="content" class="clearfix">
	
	<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php the_content(); ?>
	
	</article>
	
	<i class="fa fa-cog fa-spin"></i>
	
</section>

<?php	
	get_footer();