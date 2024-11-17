<?php

function ebor_custom_metaboxes( $meta_boxes ) {
	$prefix = '_ebor_'; // Prefix for all fields
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR PORTFOLIO POST TYPE /////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'portfolio_metabox',
		'title' => __('Additional Portfolio Item Details', 'ebor_starter'),
		'pages' => array('portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Feature this Portfolio on Homepage?','ebor_starter'),
				'desc' => __("Check to add this portfolio post to your homepage page template.", 'ebor_starter'),
				'id'   => $prefix . 'featured',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Attach files for the gallery',
				'desc' => 'Add your images here, they will be added to the post next to your post details.<br /><strong>Min Width 705px per image</strong>',
				'id' => $prefix . 'image_list',
				'type' => 'file_list',
			),
		)
	);
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR COMING SOON PAGE /////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'coming_soon_metabox',
		'title' => __('Coming Soon Date', 'ebor_starter'),
		'pages' => array('page'), // post type
		'show_on' => array( 'key' => 'page-template', 'value' => 'page_coming_soon.php' ),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Countdown Date',
				'desc' => 'The date the counter should count down to',
				'id' => $prefix . 'soon_date',
				'type' => 'text_date'
			),
		)
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR POSTS             ///////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'post_metabox',
		'title' => __('The Post Sidebar', 'ebor_starter'),
		'pages' => array('post'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Feature this Post on Homepage?','ebor_starter'),
				'desc' => __("Check to add this post to your homepage page template.", 'ebor_starter'),
				'id'   => $prefix . 'featured',
				'type' => 'checkbox',
			),
			array(
				'name' => __('Disable Post Sidebar','ebor_starter'),
				'desc' => __("Check to disable the sidebar on this post.", 'ebor_starter'),
				'id'   => $prefix . 'disable_sidebar',
				'type' => 'checkbox',
			),
		)
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'ebor_custom_metaboxes' );

// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'metabox/init.php' );
	}
}