<?php

/**
 * Ebor Framework
 * Custom Functions
 * @since version 1.0
 * @author TommusRhodus
 */
 
/**
 * Portfolio Unlimited
 *
 * Uses pre_get_posts to provide secondary portfolio post pagination conrols seperate from the main blog controls
 *
 * @since 1.0.0
 */
 
function ebor_portfolio_unlimited( $query ) {
    if ( is_post_type_archive('portfolio') && !( is_admin() ) && $query->is_main_query() || is_tax('portfolio-category') && !( is_admin() ) && $query->is_main_query() ) {
        $query->set( 'posts_per_page', get_option('portfolio_posts_per_page','8') );
    }
    return;
}
add_action( 'pre_get_posts', 'ebor_portfolio_unlimited' );

/**
 * Ebor Load Favicons
 * Prints Custom Favicons to wp_head()
 * @since version 1.0
 * @author TommusRhodus
 */
function ebor_load_favicons() {
	if ( get_option('144_favicon') !='' )
		echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . get_option('144_favicon') . '">';
	
	if ( get_option('114_favicon') !='' )
		echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . get_option('114_favicon') . '">';
		
	if ( get_option('72_favicon') !='' )
		echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . get_option('72_favicon') . '">';
		
	if ( get_option('mobile_favicon') !='' )
		echo '<link rel="apple-touch-icon-precomposed" href="' . get_option('mobile_favicon') . '">';
		
	if ( get_option('custom_favicon') !='' )
		echo '<link rel="shortcut icon" href="' . get_option('custom_favicon') . '">';
}
add_action('wp_head', 'ebor_load_favicons', 10);

/**
 * Add post thumbnail column
 * @since version 1.0
 * @author TommusRhodus
 */
function tcb_add_post_thumbnail_column($cols){
  $cols['tcb_post_thumb'] = __('Featured Image','ebor_starter');
  return $cols;
}
add_filter('manage_posts_columns', 'tcb_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'tcb_add_post_thumbnail_column', 5);

/**
 * Display Post Thumbnail Column
 * @since version 1.0
 * @author TommusRhodus
 */
function tcb_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'tcb_post_thumb':
      if( function_exists('the_post_thumbnail') )
        echo the_post_thumbnail( 'admin-list-thumb' );
      else
        echo 'Not supported in theme';
      break;
  }
}
add_action('manage_posts_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);

/**
 * HEX to RGB Converter
 *
 * Converts a HEX input to an RGB array.
 * @param $hex - the inputted HEX code, can be full or shorthand, #ffffff or #fff
 * @since 1.0.0
 * @return string
 */
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

/**
 * Portfolio taxonomy terms output.
 *
 * Checks that terms exist in the portfolio-category taxonomy, then returns a comma seperated string of results.
 * @todo Allow for taxonomy input for differing taxonmoies through the same function.
 * @since 1.0.0
 * @return string
 */
function ebor_the_simple_terms() {
	global $post;
	if( get_the_terms($post->ID,'portfolio-category') !='' ) {
		$terms = get_the_terms($post->ID,'portfolio-category','',', ','');
		$terms = array_map('_simple_cb', $terms);
		return implode(' / ', $terms);
	}
}

/**
 * Term name return
 *
 * Returns the Pretty Name of a term array
 * @param $t - the term array object
 * @since 1.0.0
 * @return string
 */
function _simple_cb($t) {  return $t->name; }

/**
 * Portfolio taxonomy terms output.
 *
 * Checks that terms exist in the portfolio-category taxonomy, then returns a space seperated string of results.
 * @todo Allow for taxonomy input for differing taxonmoies through the same function.
 * @since 1.0.0
 * @return string
 */
function ebor_the_isotope_terms() {
	global $post;
	if( get_the_terms($post->ID,'portfolio-category') ) {
		$terms = get_the_terms($post->ID,'portfolio-category','','','');
		$terms = array_map('_isotope_cb', $terms);
		return implode(' ', $terms);
	}
}

/**
 * Term Slug Return
 *
 * Returns the slug of a term array
 * @param $t - the term array object
 * @since 1.0.0
 * @return string
 */
function _isotope_cb($t) {  
	return $t->slug; 
}

/**
 * Portfolio taxonomy terms output.
 *
 * Checks that terms exist in the portfolio-category taxonomy, then returns a comma seperated string of results.
 * @todo Allow for taxonomy input for differing taxonmoies through the same function.
 * @since 1.0.0
 * @return string
 */
function ebor_the_simple_terms_links() {
	global $post;
	if( get_the_terms($post->ID,'portfolio-category') !='' ) {
		$terms = get_the_terms($post->ID,'portfolio-category','',', ','');
		$terms = array_map('_simple_link', $terms);
		return implode(', ', $terms);
	}
}

/**
 * Term name return
 *
 * Returns the Pretty Name of a term array
 * @param $t - the term array object
 * @since 1.0.0
 * @return string
 */
function _simple_link($t) {  
	return '<a href="'.get_term_link( $t, 'portfolio-category' ).'">'.$t->name.'</a>'; 
}

/**
 * Ebor Framework
 * Custom Pagination
 * @since version 1.0
 * @author TommusRhodus
 */
function ebor_pagination($pages = '', $range = 2){
	$showitems = ($range * 2)+1;
	
	global $paged;
	if(empty($paged)) $paged = 1;
	
	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;
			if(!$pages) {
				$pages = 1;
			}
	}
	
	$output = '';
	
	if(1 != $pages){
		$output .= "<div class='pagination'><ul>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) $output .= "<li><a href='".get_pagenum_link(1)."'>".__('First','ebor_starter')."</a></li>";
		
		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				$output .= ($paged == $i)? "<li class='active'><a href='".get_pagenum_link($i)."'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
			}
		}
	
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) $output .= "<li><a href='".get_pagenum_link($pages)."'>".__('Last','ebor_starter')."</a></li>";
		$output.= "</ul></div>";
	}
	
	return $output;
}

/**
 * Ebor Framework
 * Comments Template
 * @since version 1.0
 * @author TommusRhodus
 */
function ebor_themes_custom_comment($comment, $args, $depth) { 
	$GLOBALS['comment'] = $comment; 
?>

	<li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
	  	  <?php 
	  	  		echo get_avatar( $comment->comment_author_email, 70 ); 
	  	  ?>
	  	  <div class="comment-content">
			  <h4 class="margin-bottom-10">
			  	<a href="<?php echo get_comment_author_url(); ?>" rel="nofollow" target="_blank"><?php echo get_comment_author(); ?></a> 
			  	<span class="meta"><?php echo get_comment_date(); ?></span>
			  	<span class="meta"><?php echo get_comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span>
			  </h4>
		        <?php 
		      		$text = get_comment_text();
		      		echo wpautop( $text );
		      		if ($comment->comment_approved == '0') : 
		      	?>
		      		<p><em><?php _e('Your comment is awaiting moderation.', 'ebor_starter') ?></em></p>
		        <?php 
		      		endif; 
		      	?>
	      </div>
	</li>
	
<?php }

add_action('init','wpgo_add_google_maps_docs');
/**
 * Registers The Google Maps & The Google Drive oEmbed handlers.
 * Google Maps & Google Drive does not support oEmbed.
 *
 * @see WP_Embed::register_handler()
 * @see wp_embed_register_handler()
 *
 */
function wpgo_add_google_maps_docs() {
	wp_embed_register_handler( 'googlemaps', '#https?://maps.google.com/(maps)?.+#i', 'wpgo_embed_handler_googlemaps' );
	wp_embed_register_handler( 'googledocs', '#https?://docs.google.com/(document|spreadsheet|presentation)/.*#i', 'wpgo_embed_handler_googledrive' );
}

/**
 * The Google Maps embed handler callback. Google Maps does not support oEmbed.
 *
 * @see WP_Embed::register_handler()
 * @see WP_Embed::shortcode()
 *
 * @param array $matches The regex matches from the provided regex when calling {@link wp_embed_register_handler()}.
 * @param array $attr Embed attributes.
 * @param string $url The original URL that was matched by the regex.
 * @param array $rawattr The original unmodified attributes.
 * @return string The embed HTML.
 */
function wpgo_embed_handler_googlemaps( $matches, $attr, $url, $rawattr ) {
	if ( ! empty( $rawattr['width'] ) && ! empty( $rawattr['height'] ) ) {
		$width  = (int) $rawattr['width'];
		$height = (int) $rawattr['height'];
	} else {
		list( $width, $height ) = wp_expand_dimensions( 425, 170, $attr['width'], $attr['height'] );
	}
	return apply_filters( 'embed_googlemaps', "<iframe width='{$width}' height='{$height}' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='{$url}&output=embed&iwloc=near'></iframe><div class='break-40'></div>" );
}

/**
 * The Google Drive embed handler callback. Google Drive does not support oEmbed.
 * Handles documents, spreadsheets, and presentations from Google Drive.
 *
 * @see WP_Embed::register_handler()
 * @see WP_Embed::shortcode()
 *
 * @param array $matches The regex matches from the provided regex when calling {@link wp_embed_register_handler()}.
 * @param array $attr Embed attributes.
 * @param string $url The original URL that was matched by the regex.
 * @param array $rawattr The original unmodified attributes.
 * @return string The embed HTML.
 */
function wpgo_embed_handler_googledrive( $matches, $attr, $url, $rawattr ) {
	if ( !empty($rawattr['width']) && !empty($rawattr['height']) ) {
		$width  = (int) $rawattr['width'];
		$height = (int) $rawattr['height'];
	} else {
		list( $width, $height ) = wp_expand_dimensions( 425, 344, $attr['width'], $attr['height'] );
	}

	$extra = '';
	if ( $matches[1] == 'spreadsheet' ) {
		$url .= '&widget=true';
	} elseif ( $matches[1] == 'document' ) {
		$url .= '?embedded=true';
	} elseif ( $matches[1] == 'presentation' ) {
		$url = str_replace( '/pub', '/embed', $url);
		$extra = 'allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"';
	}

	return apply_filters( 'embed_googledrive', "<iframe width='{$width}' height='{$height}' frameborder='0' src='{$url}' {$extra}></iframe>" );
}

class eborLikes {

    function __construct() 
    {	
		add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'));
		add_filter('body_class', array(&$this, 'body_class'));
		add_action('publish_post', array(&$this, 'setup_likes'));
		add_action('wp_ajax_ebor-likes', array(&$this, 'ajax_callback'));
		add_action('wp_ajax_nopriv_ebor-likes', array(&$this, 'ajax_callback'));
	}
	
	function enqueue_scripts()
	{
		wp_enqueue_script( 'ebor-likes', get_template_directory_uri() . '/ebor_framework/js/ebor-likes.js', array('jquery') );
		wp_localize_script('ebor-likes', 'ebor', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        ));
		wp_localize_script( 'ebor-likes', 'ebor_likes', array('ajaxurl' => admin_url('admin-ajax.php')) );
	}
	
	function setup_likes( $post_id ) 
	{
		if(!is_numeric($post_id)) return;
	
		add_post_meta($post_id, '_ebor_likes', '0', true);
	}
	
	function ajax_callback($post_id) 
	{

		$options = get_option( 'ebor_likes_settings' );
		if( !isset($options['add_to_posts']) ) $options['add_to_posts'] = '0';
		if( !isset($options['add_to_pages']) ) $options['add_to_pages'] = '0';
		if( !isset($options['add_to_other']) ) $options['add_to_other'] = '0';
		if( !isset($options['zero_postfix']) ) $options['zero_postfix'] = '';
		if( !isset($options['one_postfix']) ) $options['one_postfix'] = '';
		if( !isset($options['more_postfix']) ) $options['more_postfix'] = '';

		if( isset($_POST['likes_id']) ) {
		    // Click event. Get and Update Count
			$post_id = str_replace('ebor-likes-', '', $_POST['likes_id']);
			echo $this->like_this($post_id, $options['zero_postfix'], $options['one_postfix'], $options['more_postfix'], 'update');
		} else {
		    // AJAXing data in. Get Count
			$post_id = str_replace('ebor-likes-', '', $_POST['post_id']);
			echo $this->like_this($post_id, $options['zero_postfix'], $options['one_postfix'], $options['more_postfix'], 'get');
		}
		
		exit;
	}
	
	function like_this($post_id, $zero_postfix = false, $one_postfix = false, $more_postfix = false, $action = 'get') 
	{
		if(!is_numeric($post_id)) return;
		$zero_postfix = strip_tags($zero_postfix);
		$one_postfix = strip_tags($one_postfix);
		$more_postfix = strip_tags($more_postfix);		
		
		switch($action) {
		
			case 'get':
				$likes = get_post_meta($post_id, '_ebor_likes', true);
				if( !$likes ){
					$likes = 0;
					add_post_meta($post_id, '_ebor_likes', $likes, true);
				}
				
				if( $likes == 0 ) { $postfix = $zero_postfix; }
				elseif( $likes == 1 ) { $postfix = $one_postfix; }
				else { $postfix = $more_postfix; }
				
				return '<span class="ebor-likes-count">'. $likes .'</span> <span class="ebor-likes-postfix">'. $postfix .'</span>';
				break;
				
			case 'update':
				$likes = get_post_meta($post_id, '_ebor_likes', true);
				if( isset($_COOKIE['ebor_likes_'. $post_id]) ) return $likes;
				
				$likes++;
				update_post_meta($post_id, '_ebor_likes', $likes);
				setcookie('ebor_likes_'. $post_id, $post_id, time()*20, '/');
				
				if( $likes == 0 ) { $postfix = $zero_postfix; }
				elseif( $likes == 1 ) { $postfix = $one_postfix; }
				else { $postfix = $more_postfix; }
				
				return '<span class="ebor-likes-count">'. $likes .'</span> <span class="ebor-likes-postfix">'. $postfix .'</span>';
				break;
		
		}
	}
	
	function do_likes()
	{
		global $post;

        $options = get_option( 'ebor_likes_settings' );
		if( !isset($options['zero_postfix']) ) $options['zero_postfix'] = '';
		if( !isset($options['one_postfix']) ) $options['one_postfix'] = '';
		if( !isset($options['more_postfix']) ) $options['more_postfix'] = '';
		
		$output = '<i class="fa fa-heart-o"></i>';
  
  		$class = 'ebor-likes';
  		$title = __('Like this', 'ebor');
		if( isset($_COOKIE['ebor_likes_'. $post->ID]) ){
			$class = 'ebor-likes active';
			$title = __('You already like this', 'ebor');
			$output = '<i class="fa fa-heart"></i>';
		}
		
		return '<a href="#" class="'. $class .'" id="ebor-likes-'. $post->ID .'" title="'. $title .'">'.$output.'</a>';
	}
	
    function body_class($classes) {
        $options = get_option( 'ebor_likes_settings' );
        
        if( !isset($options['ajax_likes']) ) $options['ajax_likes'] = false;
        
        if( $options['ajax_likes'] ) {
        	$classes[] = 'ajax-ebor-likes';
    	}
    	return $classes;
    }
	
}
global $ebor_likes;
$ebor_likes = new eborLikes();

/**
 * Template Tag
 */
function ebor_likes()
{
	global $ebor_likes;
    echo $ebor_likes->do_likes(); 
	
}