<?php
////DEVELOPMENT

$ip_dev_list=array(

"24.233.171.239",

"50.150.224.239",

"69.199.224.182",

"70.193.242.191",

"67.191.69.246",
"66.194.205.202",
"67.63.46.146",
"73.46.150.58",
"76.1.168.85",
"50.248.63.153",
"108.199.142.133"

);
/*
if ( ! in_array(getenv("REMOTE_ADDR") , $ip_dev_list) ){

	header('Location: http://expeditiongoodlife.com/coming-soon/');

	// Make sure that code below does not get executed when we redirect. 

	exit;

}
*/
?>
<?php
/**
 * Displays the head section of the theme
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 0.1
 *
 
 
 * @version 1.10.3
 */
?><!DOCTYPE html>
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="ie9"> <![endif]-->
<!--[if gt IE 9]> <html <?php language_attributes(); ?>> <![endif]-->
<!--[if !IE]> <!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

        <?php pm_add_apple_icons( 'iphone_icon' ); ?>
        <?php pm_add_apple_icons( 'iphone_retina_icon', '114x114' ); ?>
        <?php pm_add_apple_icons( 'ipad_icon', '72x72' ); ?>
        <?php pm_add_apple_icons( 'ipad_retina_icon', '144x144' ); ?>
        <link rel="shortcut icon" href="<?php echo pm_get_option( 'favicon' ); ?>">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KNMZJWB');</script>
<!-- End Google Tag Manager -->

        <?php wp_head(); ?>

    </head>
    <body <?php body_class(  ); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KNMZJWB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        <div class="pace-overlay"></div>
        <?php pm_create_nav(); ?>
        <div id="content" role="main">
        <?php if(!is_front_page()){
		?>
		 
         <?php
		 $categories = get_the_category();
$category_id = $categories[0]->cat_ID;

		 ?>
         <div class="category-<?php echo $category_id;?>">
        <div id="mastbanner"   >
        
        <div class="container vCenter"><a href='http://www.expeditiongoodlife.com'><img id="eglCircle" src="http://www.expeditiongoodlife.com/wp-content/uploads/2015/12/egl-circle2.png" /></a></div>
        </div>
        </div>
        
        
        
        <?php
		}
		?>