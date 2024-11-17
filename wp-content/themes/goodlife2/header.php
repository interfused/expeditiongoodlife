<?php
/*
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
"76.1.168.85"

);

if ( ! in_array(getenv("REMOTE_ADDR") , $ip_dev_list) ){

	header('Location: http://expeditiongoodlife.com/coming-soon/');

	// Make sure that code below does not get executed when we redirect. 

	exit;

}
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php echo ( is_home() || is_front_page() ) ? bloginfo('name') : wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="mobile-header">
	<i class="fa fa-bars fa-2x"></i>
</header>
	
<header id="main-header">
	<div id="scroller">
	
		<section id="logo">
			<a class="brand" href="<?php echo home_url(); ?>">
				<?php if( get_option('custom_logo') ) : ?>
					<img src="<?php echo get_option('custom_logo'); ?>" alt="<?php echo get_option('custom_logo_alt_text'); ?>" class="retina" />
				<?php else : ?>
					<?php echo bloginfo('title'); ?>
				<?php endif; ?>
			</a>
			<p><?php echo bloginfo('description'); ?></p>
		</section>
		
		<nav id="main-nav">
			<?php
				wp_nav_menu('theme_location=primary');
			?>
		</nav>
		
		<?php get_sidebar(); ?>
	
	</div>
</header>

<header id="mobile-logo">

	<?php if( get_option('mobile_custom_logo') ) : ?>
		<img src="<?php echo get_option('mobile_custom_logo'); ?>" alt="<?php echo get_option('custom_logo_alt_text'); ?>" class="retina" />
	<?php else : ?>
		<?php echo bloginfo('title'); ?>
	<?php endif; ?>
	
</header>