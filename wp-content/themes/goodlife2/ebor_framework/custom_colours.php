<?php 
	add_action('wp_head','ebor_custom_colours', 100);
	function ebor_custom_colours(){
	
	$heading_font = get_option('heading_font', 'Rufina');
	$body_font = get_option('body_font', 'Roboto');
	
	$highlight_colour = get_option('highlight_colour', '#ffffff');
	$light_heading_colour = get_option('light_headings_colour','#e5e5e5');
	$page_wrapper = get_option('footer_colour','#f5f5f5');
	$text_colour = get_option('text_colour','#666666');
	$heading_colour = get_option('heading_text_colour','#1c1c1c');
	$meta = get_option('meta_colour','#a5a5a5');
	$heading_link = get_option('heading_link_colour','#000000');
	$header_link = get_option('header_links_colour','#1c1c1c');
?>
	
<style type="text/css">
	
	body, input[type="text"], input[type="submit"], textarea, .portfolio-index-title, .date-title, .resp-easy-accordion h2.resp-accordion, .tp-caption.largeblackbg, .comment-content h4 {
		font-family: '<?php echo $body_font; ?>', sans-serif;
	}
	
	.tp-caption {
		font-family: '<?php echo $body_font; ?>', sans-serif !important;
	}
	
	h1, h2, h3, h4, h5, h6, .widget-title, h4 span.meta {
		font-family: '<?php echo $heading_font; ?>', sans-serif;
	}
	
	h1, h2, h3, h4, h5, h6, .article-wrapper .article-title a, .article-wrapper p a {
		color: <?php echo $heading_colour; ?>;
	}
	
	.article-title:after {
		background: <?php echo $heading_colour; ?>;
	}
	
	body {
		color: <?php echo $text_colour; ?>;
	}
	
	#main-header {
		background: <?php echo $page_wrapper; ?>;
	}
	
	.single article, .page article, .alt-article, input[type="text"], input[type="email"], input[type="submit"], textarea {
		color: <?php echo $meta; ?>;
	}
	
	h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, .article-wrapper .article-title a:hover, .article-wrapper p a:hover {
		color: <?php echo $heading_link; ?>;
	}
	
	a, .alt-article .article-wrapper .article-title a, .alt-article .article-wrapper p a, blockquote, .pagination a, .single article h1, .single article h2, .single article h3, .single article h4, .single article h5, .single article h6,
	.page article h1, .page article h2, .page article h3, .page article h4, .page article h5, .page article h6,
	.alt-article article h1, .alt-article article h2, .alt-article article h3, .alt-article article h4, .alt-article article h5, .alt-article article h6, .single a, .page a, .whoopsie-daisy-wrapper *, .search h1.article-title  {
		color: <?php echo $light_heading_colour; ?>;
	}
	
	input[type="text"], input[type="email"], input[type="submit"], textarea, pre, .pagination a, .clock, img.wpcf7-form-control.wpcf7-captchac {
		border: 2px solid <?php echo $light_heading_colour; ?>;
	}
	
	#mobile-header, #main-header ul ul, .postnav, hr, hr.big-hr, .post-meta {
		background: <?php echo $light_heading_colour; ?>;
	}
	
	table, table th, table td {
		border: 1px solid <?php echo $light_heading_colour; ?>;
	}
	
	a:hover, .single a:hover, .page a:hover, .single-portfolio a:hover, .alt-article .article-wrapper .article-title a:hover, .alt-article .article-wrapper p a:hover, pre, #content .isotope-wrapper.portfolio article h3, #content .isotope-wrapper.portfolio article .ebor-likes, #content .isotope-wrapper.portfolio article .ebor-lightbox, .blog-image-wrapper .ebor-likes, .blog-image-wrapper .ebor-lightbox, .clock {
		color: <?php echo $highlight_colour; ?>;
	}
	
	.article-wrapper, .postnav:hover, .resp-easy-accordion h2.resp-accordion, h2.resp-accordion, .resp-tabs-list li {
		background: <?php echo $highlight_colour; ?>;
	}
	
	#main-header a {
		color: <?php echo $header_link; ?>;
	}

	<?php echo get_option('custom_css'); ?>
	
</style>
	
<?php }

add_action('login_head','ebor_custom_admin');
function ebor_custom_admin(){
	if( get_option('custom_login_logo') )
		echo '<style type="text/css">
				.login h1 a { 
					background-image: url("'.get_option('custom_login_logo').'"); 
					background-size: auto 80px;
					width: 100%; 
				} 
			</style>';
}