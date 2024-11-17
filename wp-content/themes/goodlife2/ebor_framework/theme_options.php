<?php 

/**
 * Ebor Framework
 * Theme Options
 * @since version 1.0
 * @author TommusRhodus
 */

add_action('customize_register', 'ebor_theme_customize');
function ebor_theme_customize($wp_customize) {
	
	/**
	 * Load custom theme customizer classes
	 * Textarea, Google Fonts Etc.
	 */
	require( "theme_options_classes.php" );
	
	/**
	 * Load custom fonts
	 */
	require( "theme_fonts.php" );
	
	/**
	 * Load theme fonts into variable
	 */
	$customFontFamilies = new Google_Font_Collection($fonts);
	
	/**
	 * Ebor Framework
	 * Homepage Section
	 * @since version 1.0
	 * @author TommusRhodus
	 */
	
	/**
	 * Create Homepage Section
	 */
	$wp_customize->add_section( 'homepage_settings', array(
		'title'          => 'Homepage Settings',
		'priority'       => 30,
	) );
	
	/**
	 * Homepage Portfolio Defaults
	 */
	$wp_customize->add_setting( 'homepage_portfolio', array(
	    'default' => 1,
	    'type' => 'option'
	) );
	
	/**
	 * Homepage Portfolio Controls
	 */
	$wp_customize->add_control( 'homepage_portfolio', array(
	    'label' => __('LAYOUT - Show Portfolio?', 'ebor_starter'),
	    'type' => 'checkbox',
	    'section' => 'homepage_settings',
	    'priority'       => 7,
	) );
	
	/**
	 * Homepage Blog Defaults
	 */
	$wp_customize->add_setting( 'homepage_blog', array(
	    'default' => 1,
	    'type' => 'option'
	) );
	
	/**
	 * Homepage Blog Controls
	 */
	$wp_customize->add_control( 'homepage_blog', array(
	    'label' => __('LAYOUT - Show Blog?', 'ebor_starter'),
	    'type' => 'checkbox',
	    'section' => 'homepage_settings',
	    'priority'       => 7,
	) );
	
	/**
	 * Ebor Framework
	 * Blog Section
	 * @since version 1.0
	 * @author TommusRhodus
	 */
	
	/**
	 * Create Blog Section
	 */
	$wp_customize->add_section( 'blog_settings', array(
		'title'          => 'Blog Settings',
		'priority'       => 35,
	) );
	
	//blog layout
	$wp_customize->add_setting('blog_layout', array(
	    'default' => 'main',
	    'type' => 'option'
	));
	
	//blog layout
	$wp_customize->add_control( 'blog_layout', array(
	    'label'   => __('Choose layout for Blog.', 'ebor_starter'),
	    'section' => 'blog_settings',
	    'type'    => 'select',
	    'priority' => 4,
	    'choices' => array(
	        'main' => 'Isotope Grid',
	        'alt' => 'Traditional Feed'
	    ),
	));
	
	//blog continue
	$wp_customize->add_setting( 'blog_continue', array(
	    'default'        => 'Continue Reading &rarr;',
	    'type' => 'option'
	) );
	
	//blog continue
	$wp_customize->add_control( 'blog_continue', array(
	    'label' => __('Blog "Continue Reading" Text', 'ebor_starter'),
	    'type' => 'text',
	    'section' => 'blog_settings',
	    'priority'       => 6,
	) );
	
	//index date
	$wp_customize->add_setting( 'index_meta', array(
	    'default' => 1,
	    'type' => 'option'
	) );
	
	//index date
	$wp_customize->add_control( 'index_meta', array(
	    'label' => __('META - INDEX - Show Meta Details?', 'ebor_starter'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 7,
	) );
		
	//index date
	$wp_customize->add_setting( 'single_meta', array(
	    'default' => 1,
	    'type' => 'option'
	) );
	
	//index date
	$wp_customize->add_control( 'single_meta', array(
	    'label' => __('META - SINGLE POST - Show Meta Details?', 'ebor_starter'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 7,
	) );
	
	///////////////////////////////////////
	//     PORTFOLIO SECTION            //
	/////////////////////////////////////
	
	//CREATE CUSTOM STYLING SUBSECTION
	$wp_customize->add_section( 'portfolio_settings', array(
		'title'          => 'Portfolio Settings',
		'priority'       => 36,
	) ); 
	
	/**
	 * portfolio_posts_per_page
	 */
	$wp_customize->add_setting( 'portfolio_posts_per_page', array(
	    'default' => '8',
	    'type' => 'option'
	) );
	
	/**
	 * Nav Margin Control
	 */
	$wp_customize->add_control( new Ebor_Customizer_Number_Control( $wp_customize, 'portfolio_posts_per_page', array(
	    'label' => __('GLOBAL - Posts Per Page for Portfolio', 'ebor_starter'),
	    'type' => 'number',
	    'section' => 'portfolio_settings',
	    'priority'       => 3,
	) ) );
	
	///////////////////////////////////////
	//     COLOURS SECTION              //
	/////////////////////////////////////
	
	//page wrapper
	$wp_customize->add_setting('footer_colour', array(
	    'default'           => '#f5f5f5',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'type' => 'option'
	));
	
	//page wrapper
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_colour', array(
	    'label'    => __('GLOBAL - Page Wrapper Background', 'ebor_starter'),
	    'section'  => 'colors',
	)));
	
	//highlight colour
	$wp_customize->add_setting('highlight_colour', array(
	    'default'           => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'type' => 'option'
	));
	
	//highlight colour
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'highlight_colour', array(
	    'label'    => __('GLOBAL - Highlight Colour', 'ebor_starter'),
	    'section'  => 'colors',
	)));
	
	//highlight hover colour
	$wp_customize->add_setting('light_headings_colour', array(
	    'default'           => '#e5e5e5',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'type' => 'option'
	));
	
	//highlight hover colour
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'light_headings_colour', array(
	    'label'    => __('GLOBAL - Light Headings', 'ebor_starter'),
	    'section'  => 'colors',
	)));
	
	//text colour
	$wp_customize->add_setting('text_colour', array(
	    'default'           => '#666666',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'type' => 'option'
	));
	
	//text colour
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'text_colour', array(
	    'label'    => __('GLOBAL - Text Colour', 'ebor_starter'),
	    'section'  => 'colors',
	)));
	
	//heading text colour
	$wp_customize->add_setting('heading_text_colour', array(
	    'default'           => '#1c1c1c',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'type' => 'option'
	));
	
	//hedaing text colour
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'heading_text_colour', array(
	    'label'    => __('GLOBAL - Headings Text Colour', 'ebor_starter'),
	    'section'  => 'colors',
	)));
	
	//meta colour
	$wp_customize->add_setting('meta_colour', array(
	    'default'           => '#a5a5a5',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'type' => 'option'
	));
	
	//meta colour
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'meta_colour', array(
	    'label'    => __('GLOBAL - Light Text', 'ebor_starter'),
	    'section'  => 'colors',
	)));
	
	//meta colour
	$wp_customize->add_setting('heading_link_colour', array(
	    'default'           => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'type' => 'option'
	));
	
	//meta colour
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'heading_link_colour', array(
	    'label'    => __('GLOBAL - Headings With Links', 'ebor_starter'),
	    'section'  => 'colors',
	)));
	
	//meta colour
	$wp_customize->add_setting('header_links_colour', array(
	    'default'           => '#1c1c1c',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'type' => 'option'
	));
	
	//meta colour
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_links_colour', array(
	    'label'    => __('HEADER - Header Links', 'ebor_starter'),
	    'section'  => 'colors',
	)));
	
	/**
	 * Ebor Framework
	 * Login Section
	 * @since version 1.0
	 * @author TommusRhodus
	 */
	
	/**
	 * Create Header Section
	 */
	$wp_customize->add_section( 'custom_login_section', array(
		'title'          => 'WP-Login Logo',
		'priority'       => 29,
	) );
	
	/**
	 * Custom Logo Default
	 */
	$wp_customize->add_setting('custom_login_logo', array(
	    'default'  => '',
	    'type' => 'option'
	
	));
	
	/**
	 * Custom Logo Control
	 */
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_login_logo', array(
	    'label'    => __('Custom Login Logo Upload', 'ebor_starter'),
	    'section'  => 'custom_login_section',
	    'priority'       => 1
	)));
	
	
	/**
	 * Ebor Framework
	 * Header Section
	 * @since version 1.0
	 * @author TommusRhodus
	 */
	
	/**
	 * Create Header Section
	 */
	$wp_customize->add_section( 'custom_logo_section', array(
		'title'          => 'Header Settings & Logos',
		'priority'       => 30,
	) );
	
	/**
	 * Custom Logo Default
	 */
	$wp_customize->add_setting('custom_logo', array(
	    'default'  => get_template_directory_uri() . '/img/logo.png',
	    'type' => 'option'
	
	));
	
	/**
	 * Custom Logo Control
	 */
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_logo', array(
	    'label'    => __('Custom Logo Upload', 'ebor_starter'),
	    'section'  => 'custom_logo_section',
	    'priority'       => 1
	)));
	
	/**
	 * Custom Logo Default
	 */
	$wp_customize->add_setting('custom_logo_retina', array(
	    'default'  => get_template_directory_uri() . '/img/logo@2x.png',
	    'type' => 'option'
	
	));
	
	/**
	 * Custom Logo Control
	 */
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_logo_retina', array(
	    'label'    => __('Retina Logo - Needs @2x on the file e.g logo@2x.png', 'ebor_starter'),
	    'section'  => 'custom_logo_section',
	    'priority'       => 1
	)));
	
	/**
	 * Custom Logo Alt Text Settings
	 */
	$wp_customize->add_setting( 'custom_logo_alt_text', array(
	    'default'        => 'Alt Text',
	    'type' => 'option'
	) );
	
	/**
	 * Custom Logo Alt Text Control
	 */
	$wp_customize->add_control( 'custom_logo_alt_text', array(
	    'label' => __('Custom Logo Alt Text', 'ebor_starter'),
	    'type' => 'text',
	    'section' => 'custom_logo_section',
	) );
	
	/**
	 * Custom Logo Default
	 */
	$wp_customize->add_setting('mobile_custom_logo', array(
	    'default'  => get_template_directory_uri() . '/img/logo_mobile.png',
	    'type' => 'option'
	
	));
	
	/**
	 * Custom Logo Control
	 */
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mobile_custom_logo', array(
	    'label'    => __('Mobile Custom Logo Upload', 'ebor_starter'),
	    'section'  => 'custom_logo_section',
	    'priority'       => 5
	)));
	
	/**
	 * Custom Logo Default
	 */
	$wp_customize->add_setting('mobile_custom_logo_retina', array(
	    'default'  => get_template_directory_uri() . '/img/logo_mobile@2x.png',
	    'type' => 'option'
	
	));
	
	/**
	 * Custom Logo Control
	 */
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mobile_custom_logo_retina', array(
	    'label'    => __('Mobile Retina Logo - Needs @2x on the file e.g logo@2x.png', 'ebor_starter'),
	    'section'  => 'custom_logo_section',
	    'priority'       => 6
	)));
	
	//copyright text
	$wp_customize->add_setting( 'copyright', array(
	    'default'        => 'Configure in "Appearance" => "Customise new" => "Footer"',
	    'type' => 'option'
	) );
	
	//copyright text
	$wp_customize->add_control( new Ebor_Customize_Textarea_Control( $wp_customize, 'copyright', array(
	    'label'   => __('Header Copyright Text', 'ebor_starter'),
	    'section' => 'custom_logo_section',
	    'settings'   => 'copyright',
	    'priority' => 8,
	) ) );
	
	
	/**
	 * Ebor Framework
	 * Custom Favicons
	 * @since version 1.0
	 * @author TommusRhodus
	 */
	 
	 /**
	  * Create the Favicon Section
	  */
	 $wp_customize->add_section( 'favicon_settings', array(
	 	'title'          => 'Favicons',
	 	'priority'       => 30,
	 ) );
	
	/**
	 * Custom Favicon Defaults
	 */
	$wp_customize->add_setting('custom_favicon', array(
		'default' => '',
		'type' => 'option'
	));
	
	/**
	 * Custom Favicon Upload Control
	 */
	$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'custom_favicon', array(
		'label'    => __('Custom Favicon Upload', 'ebor_starter'),
		'section'  => 'favicon_settings',
		'settings' => 'custom_favicon',
		'priority'       => 21,
	)));
	
	/**
	 * Custom Favicon Defaults
	 */
	$wp_customize->add_setting('mobile_favicon', array(
	    'default' => '',
	    'type' => 'option'
	));
	
	/**
	 * Custom Favicon Upload Control
	 */
	$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'mobile_favicon', array(
	    'label'    => __('Non-Retina Mobile Favicon Upload', 'ebor_starter'),
	    'section'  => 'favicon_settings',
	    'settings' => 'mobile_favicon',
	    'priority'       => 22,
	)));
	
	/**
	 * Custom Favicon Defaults
	 */
	$wp_customize->add_setting('72_favicon', array(
	    'default' => '',
	    'type' => 'option'
	));
	
	/**
	 * Custom Favicon Upload Control
	 */
	$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, '72_favicon', array(
	    'label'    => __('iPad Favicon (72x72px)', 'ebor_starter'),
	    'section'  => 'favicon_settings',
	    'settings' => '72_favicon',
	    'priority'       => 23,
	)));
	
	/**
	 * Custom Favicon Defaults
	 */
	$wp_customize->add_setting('114_favicon', array(
	   'default' => '',
	   'type' => 'option'
	));
	
	/**
	 * Custom Favicon Upload Control
	 */
	$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, '114_favicon', array(
	   'label'    => __('Retina iPhone Favicon (114x114px)', 'ebor_starter'),
	   'section'  => 'favicon_settings',
	   'settings' => '114_favicon',
	   'priority'       => 24,
	)));
	
	/**
	 * Custom Favicon Defaults
	 */
	$wp_customize->add_setting('144_favicon', array(
		'default' => '',
		'type' => 'option'
	));
	
	/**
	 * Custom Favicon Upload Control
	 */
	$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, '144_favicon', array(
		'label'    => __('Retina iPad Favicon (144x144px)', 'ebor_starter'),
		'section'  => 'favicon_settings',
		'settings' => '144_favicon',
		'priority'       => 25,
	)));


	/**
	 * Ebor Framework
	 * Custom Favicons
	 * @since version 1.0
	 * @author TommusRhodus
	 */
	
	/**
	 * Create Custom CSS Section
	 */
	$wp_customize->add_section( 'custom_css_section', array(
		'title'          => 'Custom CSS',
		'priority'       => 200,
	) ); 
	
	/**
	 * Custom CSS Defaults
	 */
	$wp_customize->add_setting( 'custom_css', array(
	  'default'        => '',
	  'type'           => 'option',
	) );
	
	/**
	 * Custom CSS Textarea
	 */
	$wp_customize->add_control( new Ebor_Customize_Textarea_Control( $wp_customize, 'custom_css', array(
	  'label'   => __('Custom CSS', 'ebor_starter'),
	  'section' => 'custom_css_section',
	  'settings'   => 'custom_css',
	) ) );
	
	/**
	 * Ebor Framework
	 * Font Section
	 * @since version 1.0
	 * @author TommusRhodus
	 */
	 
	/**
	 * Create Font SubSection
	 */
	$wp_customize->add_section( 'font_section', array(
		'title'          => 'Font Settings',
		'priority'       => 35,
	) );
	
	/**
	 * Headings Font Default
	 */ 
	$wp_customize->add_setting( 'heading_font', array(
	    'default' => 'Montserrat',
	    'type' => 'option'
	) );
	
	/**
	 * Heading Font Control
	 */ 
	$wp_customize->add_control( new Google_Font_Picker_Custom_Control( $wp_customize, 'heading_font', array(
	    'label'             => __( 'Headings Font', 'mytheme' ),
	    'section'           => 'font_section',
	    'settings'          => 'heading_font',
	    'choices'           => $customFontFamilies->getFontFamilyNameArray(),
	    'fonts'             => $customFontFamilies
	)));
	
	/**
	 * Body Font Default
	 */ 
	$wp_customize->add_setting( 'body_font', array(
	    'default' => 'Roboto Slab',
	    'type' => 'option'
	) );
	
	/**
	 * Body Font Control
	 */ 
	$wp_customize->add_control( new Google_Font_Picker_Custom_Control( $wp_customize, 'body_font', array(
	    'label'             => __( 'Body Font', 'mytheme' ),
	    'section'           => 'font_section',
	    'settings'          => 'body_font',
	    'choices'           => $customFontFamilies->getFontFamilyNameArray(),
	    'fonts'             => $customFontFamilies
	)));

}