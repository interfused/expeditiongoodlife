<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="wrapper" class="hfeed">
        <header id="header" role="banner">
            <div id="branding">
                <div id="site-title" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                    <?php
                    get_template_part('content-fragments/header/logo', 'img');
                    ?>
                </div>
                <div id="site-description" <?php if (!is_single()) {
                                                echo ' itemprop="description"';
                                            } ?>><?php bloginfo('description'); ?></div>
            </div>
            <nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                <?php wp_nav_menu(array('theme_location' => 'main-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>')); ?>

            </nav>
        </header>

        <?php
        $value = get_field('masthead_options_masthead_image');
        if (!empty($value)) {
        ?>
            <div class="masthead" style="background-image:url(<?php echo $value['url']; ?>);">
                <div class="container"><img class="logo" src="<?php echo get_stylesheet_directory_uri() . '/images/egl-circle2.png'; ?>" /></div>
            </div>
        <?php
        }
        ?>

        <header class="header">
            <h1 class="container entry-title" itemprop="name"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
        </header>
        <div id="container">
            <main id="content" role="main">