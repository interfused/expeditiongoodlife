<?php 
	get_header();
	
	get_template_part('loop/loop', get_option('blog_layout','main'));
	
	get_footer();