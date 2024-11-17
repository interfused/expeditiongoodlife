<?php
/**
 * Main functions file
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 0.1
 *
 
 
 * @version 1.10.3
 */

// create defines
define( 'THEME_NAME', 'My Company' );
define( 'THEME_SHORT', 'my-company' );

define( 'PM_THEME_DIR', get_template_directory() . '/' );
define( 'PM_THEME_URI', get_template_directory_uri() . '/' );

// include extra theme specific code
include PM_THEME_DIR . 'inc/frontend.php';
include PM_THEME_DIR . 'inc/woocommerce.php';
include PM_THEME_DIR . 'bbpress/interfused/InterfusedBBPress.php';
include PM_THEME_DIR . 'inc/MyCompanyBBPress.php';
include PM_THEME_DIR . 'vendor/interfused/interfused-framework/inc/InterfusedTheme.php';
include PM_THEME_DIR . 'vendor/interfused/interfused-mega-menu/interfused-mega-menu.php';

global $pm_theme;
$pm_theme = new InterfusedTheme(
    array(
        'text_domain'       => 'my_theme-td',
        'admin_text_domain' => 'my_theme-admin-td',
        'min_wp_ver'        => '3.4',
        'sidebars' => array(
            'sidebar' => array( 'Sidebar', '' ),
        ),
        'widgets' => array(
            'Swatch_twitter' => 'swatch_twitter.php',
            'Swatch_social'   => 'swatch_social.php',
            'Swatch_wpml_language_selector'  => 'swatch_wpml_language_selector.php',
        ),
        'shortcodes' => false,
    )
);

include PM_THEME_DIR . 'inc/custom-posts.php';
include PM_THEME_DIR . 'inc/options/shortcodes/shortcodes.php';
include PM_THEME_DIR . 'inc/options/widgets/default_overrides.php';

if( is_admin() ) {
    include PM_THEME_DIR . 'inc/backend.php';
    include PM_THEME_DIR . 'inc/options/shortcodes/create-shortcode-options.php';
    include PM_THEME_DIR . 'inc/theme-metaboxes.php';
    include PM_THEME_DIR . 'inc/visual-composer-extend.php';
    include PM_THEME_DIR . 'inc/visual-composer.php';
    include PM_THEME_DIR . 'inc/one-click-import.php';
    include PM_THEME_DIR . 'vendor/interfused/interfused-one-click/inc/InterfusedOneClick.php';
    include PM_THEME_DIR . 'vendor/interfused/interfused-typography/interfused-typography.php';
    include PM_THEME_DIR . 'vendor/interfused/interfused-updater/interfused-updater.php';
    include PM_THEME_DIR . 'vendor/interfused/interfused-plugins/interfused-plugins.php';
}

// MOVE THIS FUNCTION INTO THEME SWITCHER
function pm_check_for_blog_switcher( $name ) {
    if( isset( $_GET['blogstyle'] ) ) {
        $name = $_GET['blogstyle'];
    }
    return $name;
}
add_filter( 'pm_blog_type', 'pm_check_for_blog_switcher' );

function scriptless_share_fn($atts){
	global $post;
	
	$pageTitle=get_the_title();
	$pageURL=get_permalink();
	$twitterHandle='goodlifequest';

	$pinImgSrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );

	if ( has_post_thumbnail( $post->ID ) ) {
		$shareImg= $pinImgSrc[0];
	} else {
		$shareImg= get_bloginfo('template_url') . '/images/facebook-default.jpg';

	} 
	
	$html='<div class="scriptlesssocialsharing">';
	$html .='<h3>Enjoy this post? Share with a friend!</h3>';
	$html .='<div class="scriptlesssocialsharing-buttons">';
	///TWITTER
	$html .='<a href="https://twitter.com/intent/tweet?text='.$pageTitle.'&amp;url='.$pageURL.'&amp;via='.$twitterHandle.'" target="_blank" class="button twitter" sl-processed="1"><span class="sss-name">Twitter</span></a>';
	
	//FACEBOOK
	$html.='<a href="http://www.facebook.com/sharer/sharer.php?u='.$pageURL.'" target="_blank" class="button facebook" sl-processed="1"><span class="sss-name">Facebook</span></a>';
	
	//GOOGLE PLUS
	$html .='<a href="https://plus.google.com/share?url='.$pageURL.'" target="_blank" class="button google" sl-processed="1"><span class="sss-name">Google+</span></a>';
	
	//PINTEREST
	$html .='<a href="http://pinterest.com/pin/create/button/?url='.$pageURL.'&amp;description='.$pageTitle.'&amp;media='.$shareImg.'" target="_blank" class="button pinterest" sl-processed="1"><span class="sss-name">Pinterest</span></a>';
	
	//EMAIL
	$html .= '<a href="mailto:?subject='.$pageTitle.'&body=Hey%2C%0D%0A%0D%0AI%20wanted%20to%20share%20this%20post%20by%20Expedition%20Good%20Life%20with%20you.%0D%0A%0D%0A'.$pageURL.'%0D%0A%0D%0AEnjoy%21" class="button email">Email</a>';
	
	//PRINT
	$html .= '<a href="javascript:window.print()" class="button print">Print</a>';
	
	$html .='</div></div>';
	return $html;
}
add_shortcode('scriptless_share','scriptless_share_fn');
/////
function def_img_fn(){
	 

	global $post;


	$ogFacebook = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );

	if ( has_post_thumbnail( $post->ID ) ) {

		$html= $ogFacebook[0];

	} else {
$html='no default img';
		//echo get_bloginfo('template_url') . '/images/facebook-default.jpg';

	} 

return $html;
	}
add_shortcode('def_ft_img','def_img_fn');

///////

function share_w_counts_fn($atts){
	global $post;
	$postID=$post->ID;
	$postURL=get_permalink($postID);
	$postTitle=get_the_title($postID);
	$twitterHandle='goodlifequest';
	
	$pinImgSrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );

	if ( has_post_thumbnail( $post->ID ) ) {
		$shareImg= $pinImgSrc[0];
	} else {
	//	$shareImg= get_bloginfo('template_url') . '/images/facebook-default.jpg';
		$shareImg = 'http://www.expeditiongoodlife.com/wp-content/uploads/2015/12/egl-circle.png';
	} 
	/*
	*/
	$html='<div class="eglsharingWrapper"><ul class="list-inline">
<li><div id="eglsharing-'.$postID.'" class="eglsharing">
<div class="eglsh-total" id="eglsh-total" data-url="'.$postURL.'" data-title="Shares"></div>
</div>
</li>

<li>
<div class="eglsh-buttons">

';

$html .='<a href="https://twitter.com/intent/tweet?text='.$postTitle.'&amp;url='.$postURL.'&amp;via='.$twitterHandle.'" target="_blank" class="egl-share-btn twitter" sl-processed="1"><span class="sss-name"><i class="fa fa-twitter"></i> Share on Twitter</span></a>';
	
	//FACEBOOK
	$html.='<a href="http://www.facebook.com/sharer/sharer.php?u='.$postURL.'" target="_blank" class="egl-share-btn facebook" sl-processed="1"><span class="sss-name"><i class="fa fa-facebook"></i> Share on Facebook</span></a>';
	
	//GOOGLE PLUS
	$html .='<a href="https://plus.google.com/share?url='.$postURL.'" target="_blank" class="egl-share-btn google" sl-processed="1"><span class="sss-name"><i class="fa fa-google-plus"></i></span></a>';
	
	//PINTEREST
	$html .='<a href="http://pinterest.com/pin/create/button/?url='.$postURL.'&amp;description='.$postTitle.'&amp;media='.$shareImg.'" target="_blank" class="egl-share-btn pinterest" sl-processed="1"><span class="sss-name"><i class="fa fa-pinterest"></i></span></a>';
	
	//EMAIL
	$html .= '<a href="mailto:?subject='.$postTitle.'&body=Hey%2C%0D%0A%0D%0AI%20wanted%20to%20share%20this%20post%20by%20Expedition%20Good%20Life%20with%20you.%0D%0A%0D%0A'.$postURL.'%0D%0A%0D%0AEnjoy%21" class="egl-share-btn email" sl-processed="1"><span class="sss-name"><i class="fa fa-envelope"></i></span></a>';
	
	//PRINT
	$html .= '<a href="javascript:window.print()" class="egl-share-btn print" sl-processed="1"><span class="sss-name"><i class="fa fa-print"></i></span></a>';


$html .='</div>
</li>
</ul></div>';
return $html;
}

add_shortcode('share_w_counts','share_w_counts_fn');

function latest_author_posts_fn($atts){
	$html='
	?>
    <article style="background-image: url(http://www.expeditiongoodlife.com/wp-content/uploads/2015/12/juice-300x200.jpg)" class="post-related-post" id="post-1620">
    <h4>
        <a href="http://www.expeditiongoodlife.com/paleo-cooking/the-benefits-of-juicing/">
            The Benefits Of Juicing        </a>
                    <small>
                by                amanda            </small>
            </h4>
</article>
    <?php
	';
}

add_shortcode('latest_author_posts','latest_author_posts_fn');

// Issues with sharing posts on Facebook: http://www.passwordincorrect.com/issue-with-sharing-wordpress-posts-to-facebook/

// Add this chunk of code in your functions.php or anywhere else in your theme files.

// Register action for post status transitions
add_action( 'transition_post_status' , 'purge_future_post', 10, 3);

// Check if the new transition is publish, for correctness you could check if $old_status == 'pending', but I want that every post (which is published) is cached again (just to be sure). 
function purge_future_post( $new_status, $old_status, $post ) {
    if($new_status == 'publish') {
        purge_facebook_cache($post);
    }
}

// Ping Facebook to recache the URL.

function purge_facebook_cache($post_id) {
    $url = get_permalink($post_id);
    $fb_graph_url = "https://graph.facebook.com/?id=". urlencode($url) ."&scrape=true";
    $result = wp_remote_post($fb_graph_url);
}
 
function get_excerpt_by_id($post_id){
    $the_post = get_post($post_id); //Gets post ID
    $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
    $excerpt_length = 35; //Sets excerpt length by word count
    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

    if(count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, '…');
        $the_excerpt = implode(' ', $words);
    endif;

    $the_excerpt = '<p>' . $the_excerpt . '</p>';

    return $the_excerpt;
}

 
