<?php

/*
Plugin Name: Ebor Portfolio
Plugin URI: http://www.madeinebor.com
Description: A Portfolio Post Type & Taxonomy for Your Theme.
Version: 1.0
Author: TommusRhodus
Author URI: http://www.madeinebor.com
*/	

// Set-up Action and Filter Hooks
register_uninstall_hook(__FILE__, 'ebor_cpt_delete_plugin_options');
add_action('admin_init', 'ebor_cpt_init' );
add_action('admin_menu', 'ebor_cpt_add_options_page');

//RUN ON THEME ACTIVATION
register_activation_hook( __FILE__, 'ebor_cpt_activation' );

// Delete options table entries ONLY when plugin deactivated AND deleted
function ebor_cpt_delete_plugin_options() {
	delete_option('ebor_cpt_display_options');
}

// Flush rewrite rules on activation
function ebor_cpt_activation() {
	flush_rewrite_rules(true);
}

// Init plugin options to white list our options
function ebor_cpt_init(){
	register_setting( 'ebor_cpt_plugin_display_options', 'ebor_cpt_display_options', 'ebor_cpt_validate_display_options' );
}

// Add menu page
function ebor_cpt_add_options_page() {
	add_utility_page('Ebor Portfolio Options Page', 'Ebor Portfolio', 'manage_options', __FILE__, 'ebor_cpt_render_form');
}

//ADD Portfolio ACTIONS
add_action( 'init', 'register_portfolio' );
add_action( 'init', 'create_portfolio_taxonomies' );

// Render the Plugin options form
function ebor_cpt_render_form() { ?>
	
	<div class="wrap">
	
		<!-- Display Plugin Icon, Header, and Description -->
		<?php screen_icon('ebor-cpt'); ?>
		<h2><?php _e('Ebor Portfolio Settings','ebor'); ?></h2>
		<?php echo '<p>' . __('Welcome to <b>Ebor Custom Post Types</b>, our custom post type plugin letting you take your content everywhere.','ebor') . '</p>'; ?>
		<b>When you make any changes in this plugin, be sure to visit <a href="options-permalink.php">Your Permalink Settings</a> & click the 'save changes' button to refresh & re-write your permalinks, otherwise your changes will not take effect properly.</b>
		
		<div class="wrap">
		
				<!-- Beginning of the Plugin Options Form -->
				<form method="post" action="options.php">
					<?php 
						settings_fields('ebor_cpt_plugin_display_options');
						$displays = get_option('ebor_cpt_display_options'); 
					?>
					
					<table class="form-table">
						<tr valign="top">
								<label><b>Enter the URL slug you want to use for the portfolio post type. DO-NOT: use numbers, spaces, capital letters or special characters.</b><br />
								<input type="text" size="30" name="ebor_cpt_display_options[portfolio_slug]" value="<?php echo $displays['portfolio_slug']; ?>" placeholder="portfolio" />
								 <br />e.g Entering 'portfolio' will result in www.website.com/portfolio becoming the URL to your portfolio.<br />
								 <b>If you change this setting, be sure to visit <a href="options-permalink.php">Your Permalink Settings</a> & click the 'save changes' button to refresh & re-write your permalinks.</b></label>
						</tr>
					</table>
					
					<?php submit_button('Save Options'); ?>
					
				</form>
		
		</div>

	</div>
<?php }

//VALIDATE POST TYPE INPUTS
function ebor_cpt_validate_display_options($input) {
	if( get_option('ebor_cpt_display_options') ){
		$displays = get_option('ebor_cpt_display_options');
	foreach ($displays as $key => $value) {
		if(isset($input[$key])){
			$input[$key] = wp_filter_nohtml_kses($input[$key]);
		}
	}
	}
	return $input;
}

function register_portfolio() {

	$displays = get_option('ebor_cpt_display_options');
	if( $displays['portfolio_slug'] ){ 
		$slug = $displays['portfolio_slug']; 
	} else { 
		$slug = 'portfolio'; 
	}
	
	//HERE'S AN ARRAY OF LABELS FOR PORTFOLIOS
	    $labels = array( 
	        'name' => __( 'Portfolio', 'ebor' ),
	        'singular_name' => __( 'Portfolio', 'ebor' ),
	        'add_new' => __( 'Add New', 'ebor' ),
	        'add_new_item' => __( 'Add New Portfolio', 'ebor' ),
	        'edit_item' => __( 'Edit Portfolio', 'ebor' ),
	        'new_item' => __( 'New Portfolio', 'ebor' ),
	        'view_item' => __( 'View Portfolio', 'ebor' ),
	        'search_items' => __( 'Search Portfolios', 'ebor' ),
	        'not_found' => __( 'No portfolios found', 'ebor' ),
	        'not_found_in_trash' => __( 'No portfolios found in Trash', 'ebor' ),
	        'parent_item_colon' => __( 'Parent Portfolio:', 'ebor' ),
	        'menu_name' => __( 'Portfolio', 'ebor' ),
	    );
	
	//AND HERE'S AN ARRAY OF ARGUMENTS TO DEFINE PORTFOLIOS FUNCTIONALITY
	    $args = array( 
	        'labels' => $labels,
	        'hierarchical' => false,
	        'description' => __('Portfolio entries for the ebor Theme.', 'ebor'),
	        'supports' => array( 'title', 'editor', 'thumbnail', 'post-formats', 'comments' ),
	        'taxonomies' => array( 'portfolio-category' ),
	        'public' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'menu_position' => 5,
	        
	        'show_in_nav_menus' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => false,
	        'has_archive' => true,
	        'query_var' => true,
	        'can_export' => true,
	        'rewrite' => array( 'slug' => $slug ),
	        'capability_type' => 'post'
	    );
	
	    register_post_type( 'portfolio', $args );
	}
	
	//ADD PORTFOLIO TAXONOMY
	function create_portfolio_taxonomies(){
		$labels = array(
		    'name' => _x( 'Portfolio Categories','ebor' ),
		    'singular_name' => _x( 'Portfolio Category','ebor' ),
		    'search_items' =>  __( 'Search Portfolio Categories','ebor' ),
		    'all_items' => __( 'All Portfolio Categories','ebor' ),
		    'parent_item' => __( 'Parent Portfolio Category','ebor' ),
		    'parent_item_colon' => __( 'Parent Portfolio Category:','ebor' ),
		    'edit_item' => __( 'Edit Portfolio Category','ebor' ), 
		    'update_item' => __( 'Update Portfolio Category','ebor' ),
		    'add_new_item' => __( 'Add New Portfolio Category','ebor' ),
		    'new_item_name' => __( 'New Portfolio Category Name','ebor' ),
		    'menu_name' => __( 'Portfolio Categories','ebor' ),
		  ); 	
		
		// Now register the taxonomy
		
		  register_taxonomy('portfolio-category', array('portfolio'), array(
		    'hierarchical' => true,
		    'labels' => $labels,
		    'show_ui' => true,
		    'show_admin_column' => true,
		    'query_var' => true,
		    'rewrite' => true,
		  ));
}