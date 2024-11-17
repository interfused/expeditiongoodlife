<?php 

define('SUBPAT_NOTICE', '0'); 
define('SUBPAT_LIVE_MODE', '0');

/**
 * Ebor Framework
 * Queue Up Framework
 * @since version 1.0
 * @author TommusRhodus
 */
require_once ( "ebor_framework/init.php" );

/**
 * Please use a child theme if you need to modify any aspect of the theme, if you need to, you can add code
 * below here if you need to add extra functionality.
 * Be warned! Any code added here will be overwritten on theme update!
 * Add & modify code at your own risk & always use a child theme instead for this!
 */ 

//Gets post cat slug and looks for single-[cat slug].php and applies it
add_filter('single_template', create_function(
'$the_template',
'foreach( (array) get_the_category() as $cat ) {
if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
return TEMPLATEPATH . "/single-{$cat->slug}.php";
else if($cat->category_parent)
{
$parent = get_category($cat->category_parent);
if ( file_exists(TEMPLATEPATH . "/single-{$parent->slug}.php") )
return TEMPLATEPATH . "/single-{$parent->slug}.php";
}
}
return $the_template;' )
);

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

define(SINGLE_PATH, STYLESHEETPATH );
function my_single_template( $single ) {
	/*REF: 
	http://justintadlock.com/archives/2008/12/06/creating-single-post-templates-in-wordpress */
	
	global $wp_query, $post;
	
	//return locate_template( array( sprintf( "single-%d.php", absint( get_the_ID() ) ), $located_template ) );
	
	/* SPECIFIC FOR EGL 
	these posts IDs will use the recipes template regardless of how many categories they are in
	*/
	/*
	$special_posts_arr = array(580,604,626);
	if(in_array($post->ID , $special_posts_arr))
		return SINGLE_PATH . '/single-paleo-cooking.php';
		*/
		///USE NORMAL
		return $single;
}
///////////////

function my_single_template_backup($single){
	/*
	massive single template function
	REF: 
	http://justintadlock.com/archives/2008/12/06/creating-single-post-templates-in-wordpress */
	
	global $wp_query, $post;
	
	/**
	* Checks for single template by ID
	*/
	
	if(file_exists(SINGLE_PATH . '/single-' . $post->ID . '.php'))
		return SINGLE_PATH . '/single-' . $post->ID . '.php';
		
		/**
	* Checks for single template by category
	* Check by category slug and ID
	*/
	foreach((array)get_the_category() as $cat) :

		if(file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php'))
			return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';

		elseif(file_exists(SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php'))
			return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';

	endforeach;
	
	/**
	* Checks for single template by tag
	* Check by tag slug and ID
	*/
	$wp_query->in_the_loop = true;
	foreach((array)get_the_tags() as $tag) :

		if(file_exists(SINGLE_PATH . '/single-tag-' . $tag->slug . '.php'))
			return SINGLE_PATH . '/single-tag-' . $tag->slug . '.php';

		elseif(file_exists(SINGLE_PATH . '/single-tag-' . $tag->term_id . '.php'))
			return SINGLE_PATH . '/single-tag-' . $tag->term_id . '.php';

	endforeach;
	$wp_query->in_the_loop = false;
	
	/**
	* Checks for single template by author
	* Check by user nicename and ID
	*/
	$curauth = get_userdata($wp_query->post->post_author);

	if(file_exists(SINGLE_PATH . '/single-author-' . $curauth->user_nicename . '.php'))
		return SINGLE_PATH . '/single-author-' . $curauth->user_nicename . '.php';

	elseif(file_exists(SINGLE_PATH . '/single-author-' . $curauth->ID . '.php'))
		return SINGLE_PATH  . '/single-author-' . $curauth->ID . '.php';
		
		/**
	* Checks for default single post files within the single folder
	*/
	if(file_exists(SINGLE_PATH . '/single.php'))
		return SINGLE_PATH . '/single.php';

	elseif(file_exists(SINGLE_PATH . '/default.php'))
		return SINGLE_PATH . '/default.php';
		
		return $single;
}

add_filter( 'single_template', 'my_single_template' );