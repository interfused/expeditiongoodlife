<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php echo ( is_home() || is_front_page() ) ? bloginfo('name') : wp_title('| ', true, 'right'); ?></title>
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
		</section>
	
	</div>
</header>

<header id="mobile-logo">

	<?php if( get_option('mobile_custom_logo') ) : ?>
		<img src="<?php echo get_option('mobile_custom_logo'); ?>" alt="<?php echo get_option('custom_logo_alt_text'); ?>" class="retina" />
	<?php else : ?>
		<?php echo bloginfo('title'); ?>
	<?php endif; ?>
	
</header>