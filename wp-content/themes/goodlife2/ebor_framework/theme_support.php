<?php

/**
 * Ebor Framework
 * Theme Support
 * @since version 1.0
 * @author TommusRhodus
 */

/**
 * Load Theme Support on Init
 */
function ebor_starter_add_editor_styles() {
	/**
	 * Add WP Editor Styling
	 */
    add_editor_style( 'editor-style.css' );
    
    /**
     * Set Content Width
     */
    if ( ! isset( $content_width ) ) $content_width = 1180;
}
add_action( 'init', 'ebor_starter_add_editor_styles', 10 );

/**
 * Load Theme Support after_theme_setup
 */
function ebor_starter_add_theme_support() {
	/**
	 * Add post thumbnail (featured image) support
	 */
	add_theme_support( 'post-thumbnails' );
	
	/**
	 * Image Sizes used in the theme
	 */
	add_image_size( 'admin-list-thumb', 60, 60, true );
	
	/**
	 * Add Custom Background Support and Set Default
	 */
	add_theme_support( 'custom-background', array( 'default-color' => '1c1c1c' ) );
	
	/**
	 * Add feed link support
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/**
	 * Add html5 support
	 */
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );
	
	/**
	 * Load Translation Files
	 */
	load_theme_textdomain('ebor_starter', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'ebor_starter_add_theme_support', 10 );