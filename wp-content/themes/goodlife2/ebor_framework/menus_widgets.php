<?php

/**
 * Ebor Framework
 * Menus & Widgets
 * @since version 1.0
 * @author TommusRhodus
 */
 
/**
 * Ebor Framework
 * Register theme menus
 * @since version 1.0
 * @author TommusRhodus
 */
function register_ebor_menus() {
  register_nav_menus( array(
  	'primary' => __( 'Standard Navigation', 'ebor_starter' )
  ) );
}
add_action( 'init', 'register_ebor_menus' );

/**
 * Ebor Framework
 * Register theme sidebars
 * @since version 1.0
 * @author TommusRhodus
 */
function ebor_register_sidebars() {

	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Header Sidebar', 'ebor_starter' ),
			'description' => __( 'Widgets to be displayed in the header sidebar.', 'ebor_starter' ),
			'before_widget' => '<div id="%1$s" class="sidebox widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="a-title widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'blog',
			'name' => __( 'Blog Sidebar', 'ebor_starter' ),
			'description' => __( 'Widgets to be displayed in the blog sidebar.', 'ebor_starter' ),
			'before_widget' => '<div id="%1$s" class="sidebox widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="a-title widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'page',
			'name' => __( 'Page With Sidebar, Sidebar', 'ebor_starter' ),
			'description' => __( 'Widgets to be displayed in the page with sidebar, sidebar.', 'ebor_starter' ),
			'before_widget' => '<div id="%1$s" class="sidebox widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

}
add_action( 'widgets_init', 'ebor_register_sidebars' );