<?php
/**
 * Loads all theme specific admin backend functionality
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */

function pm_activate_theme( $theme ) {
    // if no swatches are installed then install the default swatches
    // remove old default swatches
    $swatches = get_posts( array(
        'post_type'      => 'pm_swatch',
        'meta_key'       => THEME_SHORT . '_default_swatch',
        'posts_per_page' => '-1'
    ));

    if( empty( $swatches ) ) {
        update_option( THEME_SHORT . '_install_swatches', true );
    }

    $catalog = array(
        'width'     => '700',
        'height'    => '',
        'crop'      => 0
    );

    $single = array(
        'width'     => '700',
        'height'    => '',
        'crop'      => 0
    );

    $thumbnail = array(
        'width'     => '90',
        'height'    => '',
        'crop'      => 0
    );

    // Image sizes
    update_option( 'shop_catalog_image_size', $catalog );       // Product category thumbs
    update_option( 'shop_single_image_size', $single );         // Single product image
    update_option( 'shop_thumbnail_image_size', $thumbnail );   // Image gallery thumbs
}
add_action( 'after_switch_theme', 'pm_activate_theme' );

function pm_admin_init() {
    $need_to_install = get_option( THEME_SHORT . '_install_swatches' );
    if( $need_to_install ) {
        pm_install_default_swatches();
        // remove install flag
        delete_option( THEME_SHORT . '_install_swatches' );
    }
    // install the mega menu posts
    pm_install_mega_menu_posts();

    // Check if plugin is active to remove update message nag
    if ( is_plugin_active('LayerSlider/layerslider.php') ) {
        remove_action('after_plugin_row_'.LS_PLUGIN_BASE, 'layerslider_plugins_purchase_notice' );
    }
}
add_action( 'admin_init', 'pm_admin_init' );


/**
 * Installs mega menu posts
 *
 * @return void
 * @author
 **/
function pm_install_mega_menu_posts() {

    $menus = get_posts( array( 'post_type' => 'pm_mega_menu' ) );
    if( count( $menus ) === 0 ) {
        // Create post object
        $my_post = array(
          'post_title'    => 'Mega Menu',
          'post_content'  => '',
          'post_status'   => 'publish',
          'post_type'     => 'pm_mega_menu'
        );

        // Insert the post into the database
        wp_insert_post( $my_post );
    }

    $menus = get_posts( array( 'post_type' => 'pm_mega_columns' ) );
    if( count( $menus ) === 0 ) {
        $columns = array(
            'col-md-3'  => __('One Quarter Column (1/4)', 'my_theme-admin-td'),
            'col-md-4'  => __('One Third Column (1/3)', 'my_theme-admin-td'),
        );

        foreach( $columns as $content => $title ) {
            // Create post object
            $column_post = array(
              'post_title'    => $title,
              'post_content'  => $content,
              'post_status'   => 'publish',
              'post_type'     => 'pm_mega_columns'
            );

            // Insert the post into the database
            wp_insert_post( $column_post );
        }
    }
}

function pm_check_default_colours_compiled() {
    $theme_options = get_option( THEME_SHORT . '-options' );
    $default_css = get_option( THEME_SHORT . '-default-css' );
    // if default options have been set and we have no compiled css
    if( $theme_options !== false && $default_css === false ) {
        if( pm_get_option('default_css_default_button_text') !== false ) {
            // compile default colours
            pm_create_default_colour_css();
        }
    }
}
add_action( 'admin_init', 'pm_check_default_colours_compiled' );


function pm_create_logo_css() {
    // get swatch mixins & variables
    $header_sass = pm_file_get_contents( 'assets/scss/bootstrap/_interfused-variables.scss' );
    $header_sass .= pm_file_get_contents( 'assets/scss/theme/_compass-mixins.scss' );
    $header_sass .= pm_file_get_contents( 'assets/scss/theme/_mixins.scss' );

    $element_height = 24;
    $navbar_height = pm_get_option( 'navbar_height' );
    $navbar_scrolled = pm_get_option( 'navbar_scrolled' );
    $navbar_sub_width = pm_get_option( 'navbar_sub_width' );


    $header_sass .= "@include header-setup(
        {$element_height}px,   // Line height of the navbar
        {$navbar_height}px,    // Navigation bar height
        {$navbar_scrolled}px,  // Navigation bar height after scrolling
        {$navbar_sub_width}px  // Width of the sub menus
    );";

    $css = pm_compile_sass_to_css( $header_sass );

    update_option( THEME_SHORT . '-header-css', $css );
}
add_action( 'pm-options-updated-' . THEME_SHORT . '-general', 'pm_create_logo_css' );

function pm_update_permalinks() {
    //Ensure the $wp_rewrite global is loaded
    global $wp_rewrite;
    //Call flush_rules() as a method of the $wp_rewrite object
    $wp_rewrite->flush_rules();
}
add_action( 'pm-options-updated-' . THEME_SHORT . '-post-types', 'pm_update_permalinks' );

/**
 * Compiles all swatches into mixins and into CSS
 *
 * @return void
 **/
function pm_compile_swatch_scss( $post_id, $force_file_save = false ) {
    // get swatch mixins & variables
    $swatch_sass = pm_file_get_contents( 'assets/scss/bootstrap/_interfused-variables.scss' );
    $swatch_sass .= pm_file_get_contents( 'assets/scss/theme/_compass-mixins.scss' );
    $swatch_sass .= pm_file_get_contents( 'assets/scss/theme/_mixins.scss' );

    $swatches_option = get_option( THEME_SHORT . '-swatch-list', array() );
    $swatches_files = get_option( THEME_SHORT . '-swatch-files', array() );

    // get get the swatch
    $swatch = get_post( $post_id );

    // are we enableing the swatch
    if( get_post_meta( $swatch->ID, THEME_SHORT . '_status', true ) === 'enabled' ) {
        $swatch_sass .= pm_create_swatch_scss_mixin( 'swatch-' . $swatch->post_name, 'color-swatch', array(
            get_post_meta( $swatch->ID, THEME_SHORT . '_text', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_header', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_link', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_link_hover', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_link_active', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_icon', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_icon_background', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_background', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_background_inverse', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_background_complimentary', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_form_background', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_form_text', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_form_placeholder', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_form_active', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_primary_button_background', true ),
            get_post_meta( $swatch->ID, THEME_SHORT . '_primary_button_text', true ),
            pm_calculate_scss_opacity( get_post_meta( $swatch->ID, THEME_SHORT . '_primary_button_icon_colour', true ), get_post_meta( $swatch->ID, THEME_SHORT . '_primary_button_icon_alpha', true ) ),
        ));

        // compile the sass
        $swatches_option[$swatch->post_name] = pm_compile_sass_to_css( $swatch_sass );

        // is the save to file option on?
        if( pm_get_option( 'swatch_css_save' ) !== 'head' ) {
            $url = wp_nonce_url('post.php?post=' . $post_id, 'edit');
            if (false === ($creds = request_filesystem_credentials($url, '', false, false, null) ) ) {
                return; // stop processing here
            }

            // now we have some credentials, try to get the wp_filesystem running
            if ( ! WP_Filesystem($creds) ) {
                // our credentials were no good, ask the user for them again
                request_filesystem_credentials($url, $method, true, false, $form_fields);
                return true;
            }

            global $wp_filesystem;

            // get the upload directory and make a the swatches.css file
            $upload_dir = $wp_filesystem->wp_themes_dir();
            $filename = trailingslashit( $upload_dir . THEME_SHORT . '/assets/css' ) . $swatch->post_name . '.css';

            // by this point, the $wp_filesystem global should be working, so let's use it to create a file
            global $wp_filesystem;
            if ( ! $wp_filesystem->put_contents( $filename, $swatches_option[$swatch->post_name], FS_CHMOD_FILE) ) {
                wp_die( __('error saving ' . $filename . ' file!', 'my_theme-admin-td') );
            }

            $swatches_files[$swatch->post_name] = $swatch->post_name . '.css';
        }
    }
    else {
        unset( $swatches_option[$swatch->post_name] );
        unset( $swatches_files[$swatch->post_name] );
    }

    // save the css to the db
    update_option( THEME_SHORT . '-swatch-list', $swatches_option );
    update_option( THEME_SHORT . '-swatch-files', $swatches_files );
}

/**
 * Saves all swatch css to swatch_css option for injecting into all pages
 *
 * @param int $post_id The ID of the swatch post.
 */
function pm_save_swatch( $post_id ) {
    // If this isn't a 'swatch' post, don't update it.
    if( isset( $_POST['post_type'] ) && 'pm_swatch' === $_POST['post_type'] ) {
        pm_compile_swatch_scss( $post_id );
    }
}
add_action( 'save_post', 'pm_save_swatch', 12 );

/**
 * Handles removing a swatch when it is deleted
 *
 * @return void
 **/
function pm_delete_swatch( $post_id ){

    // We check if the global post type isn't ours and just return
    global $post_type;
    if ( $post_type === 'pm_swatch' ) {
        // get the swatch that is to be elimiated
        $swatch = get_post( $post_id );
        // get the swatch lists
        $swatches_option = get_option( THEME_SHORT . '-swatch-list', array() );
        $swatches_files = get_option( THEME_SHORT . '-swatch-files', array() );
        // remove it from the swatch options / files arrays
        unset( $swatches_option[$swatch->post_name] );
        unset( $swatches_files[$swatch->post_name] );
        // update the swatch list and file list
        update_option( THEME_SHORT . '-swatch-list', $swatches_option );
        update_option( THEME_SHORT . '-swatch-files', $swatches_files );

        // try to delete the css file
        $url = wp_nonce_url('post.php?post=' . $post_id, 'delete');
        if (false === ($creds = request_filesystem_credentials($url, '', false, false, null) ) ) {
            return; // stop processing here
        }

        // now we have some credentials, try to get the wp_filesystem running
        if ( ! WP_Filesystem($creds) ) {
            // our credentials were no good, ask the user for them again
            request_filesystem_credentials($url, $method, true, false, $form_fields);
            return true;
        }

        global $wp_filesystem;

        // get the upload directory and make a the swatches.css file
        $upload_dir = $wp_filesystem->wp_themes_dir();
        $filename = trailingslashit( $upload_dir . THEME_SHORT . '/assets/css' ) . $swatch->post_name . '.css';

        // by this point, the $wp_filesystem global should be working, so let's use it to create a file
        global $wp_filesystem;
        if ( ! $wp_filesystem->delete( $filename ) ) {
            wp_die( __('error deleting ' . $filename . ' file!', 'my_theme-admin-td') );
        }


    }

}
add_action( 'before_delete_post', 'pm_delete_swatch' );


/**
 * Saves all color set to the post meta data.
 *
 * @param int $post_id The ID of the color set post.
 */
function pm_save_color_set( $post_id ) {
    // If this isn't a 'color set' post, don't update it.
    if( isset( $_POST['post_type'] ) && 'pm_color_bundle' === $_POST['post_type'] ) {

        for ($i=1; $i<=10; $i++){
            if( get_post_meta( $post_id, THEME_SHORT . '_status_'.$i, true ) === 'enable' ) {
                $colors[] = get_post_meta( $post_id, THEME_SHORT . '_set_color_'.$i, true );
            }
        }
        update_post_meta($post_id, THEME_SHORT . '_color_set', $colors);
    }
}
add_action( 'save_post', 'pm_save_color_set', 13 );

function pm_create_swatch_scss_mixin( $class, $mixin_name, $params ) {
    $mixin = '';
    if( '' != $class ) {
        $mixin .= '.' . $class . ', [class*="swatch-"] .' . $class . ' { ';
    }
    $mixin .= '@include ' . $mixin_name;
    $mixin .= '(' . implode( ',', $params ) . ')';
    if( '' != $class ) {
        $mixin .= '}';
    }
    return $mixin;
}

function pm_compile_sass_to_css( $sass ) {
    $css = '';
    if( !class_exists( 'scssc' ) ) {
        require PM_THEME_DIR . 'vendor/leafo/scssphp/scss.inc.php';
    }
    $scss = new scssc();
    $scss->setFormatter( 'scss_formatter_compressed' );

    if( !empty( $sass ) ) {
        try {
            $css = $scss->compile( $sass );
        } catch (Exception $e) {

        }
    }
    return $css;
}

// remove permalink slug box from swatch edit pages
function pm_hide_permalink_from_swatch_edit() {
    global $post_type;
    if( $post_type == 'pm_swatch' ) {
        echo '<style type="text/css">#edit-slug-box,#view-post-btn,#post-preview,.updated p a{display: none;}</style>';
    }
}
add_action('admin_print_styles-post-new.php', 'pm_hide_permalink_from_swatch_edit');
// Style action for the post editting page
add_action('admin_print_styles-post.php', 'pm_hide_permalink_from_swatch_edit');


/**
 * Installs default swatch posts
 *
 * @return void
 **/
function pm_install_default_swatches_ajax() {
    header( 'Content-Type: application/json' );
    $resp = new stdClass();
    $resp->status = 'failed';
    if( isset( $_POST['nonce'] ) ) {
        if( wp_verify_nonce( $_POST['nonce'], 'install-defaults') ) {
            pm_install_default_swatches();
            $resp->status = 'ok';
        }
    }

    echo json_encode( $resp );
    die();
}
add_action( 'wp_ajax_install_default_swatches', 'pm_install_default_swatches_ajax' );


/**
 * Installs default swatch posts
 *
 * @return void
 **/
function pm_install_default_vc_templates_ajax() {
    header( 'Content-Type: application/json' );

    $resp = new stdClass();
    $resp->status = 'failed';
    if( isset( $_POST['nonce'] ) ) {
        if( wp_verify_nonce( $_POST['nonce'], 'install-default-vc') ) {
            $template_file = pm_file_get_contents( 'import/default-vc-templates.php' );
            $templates = unserialize( $template_file );
            update_option( 'wpb_js_templates', $templates );
            $resp->status = 'ok';
        }
    }

    echo json_encode( $resp );
    die();
}
add_action( 'wp_ajax_install_default_vc_templates', 'pm_install_default_vc_templates_ajax' );

/**
 * Installs default swatches
 *
 * @return void
 **/
function pm_install_default_swatches() {
    // remove old default swatches
    $old_swatches = get_posts( array(
        'post_type'      => 'pm_swatch',
        'meta_key'       => THEME_SHORT . '_default_swatch',
        'posts_per_page' => '-1'
    ));

    if( null !== $old_swatches ) {
        foreach( $old_swatches as $delete_post ) {
            wp_delete_post( $delete_post->ID );
        }
    }

    $default_swatches = include PM_THEME_DIR . 'inc/options/swatches/default-swatches.php';
    $swatch_colours = include PM_THEME_DIR . 'inc/options/swatches/swatch-fields.php';

    foreach( $default_swatches as $class => $swatch ) {
        $new_swatch_id = wp_insert_post( array(
            'post_title'  => $swatch['title'],
            'post_name'   => $class,
            'post_type'   => 'pm_swatch',
            'post_status' => 'publish'
        ));

        if( $new_swatch_id != 0 ) {
            $i = 0;
            foreach( $swatch_colours as $colour ) {
                add_post_meta( $new_swatch_id, THEME_SHORT . '_' . $colour, $swatch['colours'][$i] );
                $i++;
            }
            add_post_meta( $new_swatch_id, THEME_SHORT . '_default_swatch', true );
            add_post_meta( $new_swatch_id, THEME_SHORT . '_status', $swatch['status'] );
        }
        pm_compile_swatch_scss( $new_swatch_id );
    }

}

/**
 * Takes a option colour and opacity and returns valid scss
 *
 * @return rgba scss
 **/
function pm_calculate_scss_opacity( $colour, $opacity ) {
    return 'rgba(' . $colour . ',' . ( $opacity / 100 ) . ')';
}

/**
 * Builds the default css colours for the theme
 *
 * @return void
 **/
function pm_create_default_colour_css() {
    // get swatch mixins & variables
    $default_sass = pm_file_get_contents( 'assets/scss/bootstrap/_interfused-variables.scss' );
    $default_sass .= pm_file_get_contents( 'assets/scss/theme/_compass-mixins.scss' );
    $default_sass .= pm_file_get_contents( 'assets/scss/theme/_mixins.scss' );

    $default_sass .= pm_create_swatch_scss_mixin( '', 'color-defaults', array(
        // default button
        pm_get_option( 'default_css_default_button_text' ),
        pm_get_option( 'default_css_default_button_background' ),
        pm_get_option( 'default_css_default_button_background_hover' ),
        // warning button
        pm_get_option( 'default_css_warning_button_text' ),
        pm_get_option( 'default_css_warning_button_background' ),
        pm_get_option( 'default_css_warning_button_background_hover' ),
        // danger button
        pm_get_option( 'default_css_danger_button_text' ),
        pm_get_option( 'default_css_danger_button_background' ),
        pm_get_option( 'default_css_danger_button_background_hover' ),
        // success button
        pm_get_option( 'default_css_success_button_text' ),
        pm_get_option( 'default_css_success_button_background' ),
        pm_get_option( 'default_css_success_button_background_hover' ),
        // info button
        pm_get_option( 'default_css_info_button_text' ),
        pm_get_option( 'default_css_info_button_background' ),
        pm_get_option( 'default_css_info_button_background_hover' ),
        // button icons
        pm_get_option( 'default_css_button_icon' ),
        pm_calculate_scss_opacity( pm_get_option( 'default_css_button_icon_background' ), pm_get_option( 'default_css_button_icon_background_alpha' ) ),
        // overlays
        pm_get_option( 'default_css_overlay' ),
        pm_calculate_scss_opacity( pm_get_option( 'default_css_overlay_background' ), pm_get_option( 'default_css_overlay_background_alpha' ) ),
        // magnific
        pm_calculate_scss_opacity( pm_get_option( 'default_css_magnific_background' ), pm_get_option( 'default_css_magnific_background_alpha' ) ),
        pm_get_option( 'default_css_magnific_close_icon' ),
        pm_get_option( 'default_css_magnific_close_icon_background' ),
        // portfolio
        pm_get_option( 'default_css_portfolio_hover_text' ),
        pm_calculate_scss_opacity( pm_get_option( 'default_css_portfolio_hover_background' ), pm_get_option( 'default_css_portfolio_hover_background_alpha' ) ),
        pm_get_option( 'default_css_portfolio_hover_button_icon' ),
        // go to top
        pm_get_option( 'default_css_gototop_icon' ),
        pm_calculate_scss_opacity( pm_get_option( 'default_css_gototop_background' ), pm_get_option( 'default_css_gototop_background_alpha' ) ),
        // slideshow
        pm_get_option( 'default_css_slideshow_text' ),
        pm_calculate_scss_opacity( pm_get_option( 'default_css_slideshow_text_shadow' ), pm_get_option( 'default_css_slideshow_text_shadow_alpha' ) ),
        // loader colors
        pm_get_option( 'loader_color' ),
        pm_get_option( 'loader_bg' )
    ));

    $default_css = pm_compile_sass_to_css( $default_sass );

    // save the css
    update_option( THEME_SHORT . '-default-css', $default_css );
}
add_action( 'pm-options-updated-' . THEME_SHORT . '-default-colours', 'pm_create_default_colour_css' );

function pm_add_custom_mime_types($mimes){
    return array_merge($mimes,array (
        'webm' => 'video/webm',
        'zip'  => 'multipart/x-zip'
    ));
}
add_filter('upload_mimes','pm_add_custom_mime_types');

function pm_create_social_options(){
    $icons = include PM_THEME_DIR . 'inc/options/global-options/social-icons-options.php';
    $fields = array();
    foreach( $icons as $icon => $name ) {
        $fields[] =  array(
            'name'    => sprintf( __('%s URL', 'my_theme-admin-td'), $name ),
            'id'      => sprintf( __('%s', 'my_theme-admin-td'), $icon ),
            'type'    => 'text',
            'default' => '',
            'attr'    =>  array(
                'class'    => 'widefat',
            ),
        );
    }
    return $fields;
}

function pm_file_get_contents( $path ) {
    ob_start();
    include PM_THEME_DIR . $path;
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

// turn off update nag from revolution slider
if( isset( $productAdmin ) ) {
    remove_action('admin_notices', array( $productAdmin, 'addActivateNotification' ) );
}

// add default font css to typography
function pm_default_typography_css( $css ) {
    return 'blockquote p {
  font-weight: 300;
}
.light {
  font-weight: 300 !important;
}
.hairline {
  font-weight: 200 !important;
}
.hairline strong {
    font-weight: 400;
}
h1, h2, h3, h4, h5, h6 {
  font-weight: 600;
}
.lead {
  font-weight: 300;
}
.lead strong {
    font-weight: 600;
}';
}
add_filter( 'pm_default_typography_css', 'pm_default_typography_css' );

function pm_render_system_status_page() {
    $status = new stdClass();

    // remove old default swatches
    $status->installed_swatches = get_posts( array(
        'post_type'      => 'pm_swatch',
        'meta_key'       => THEME_SHORT . '_status',
        'meta_value'     => 'enabled',
        'posts_per_page' => '-1'
    ));

    $status->swatch_writable = is_writable(PM_THEME_DIR . 'assets/css');
    $status->swatch_css_save = pm_get_option('swatch_css_save');
    $status->swatches_files = get_option( THEME_SHORT . '-swatch-files', array() );

    ob_start();
    include(PM_THEME_DIR . 'inc/system-status-page.php');
    $output = ob_get_contents();
    ob_end_clean();
    echo $output;
    die();
}
add_action(THEME_SHORT . '-system-status-before-page', 'pm_render_system_status_page');

/**
 * Installs default swatch posts
 *
 * @return void
 **/
function pm_save_all_swatches_ajax() {
    header( 'Content-Type: application/json' );
    $resp = new stdClass();
    $resp->status = 'failed';
    if( isset( $_POST['nonce'] ) ) {
        if( wp_verify_nonce( $_POST['nonce'], 'install-defaults') ) {
            $swatches = get_posts( array(
                'post_type'      => 'pm_swatch',
                'meta_key'       => THEME_SHORT . '_status',
                'meta_value'     => 'enabled',
                'posts_per_page' => '-1'
            ));

            foreach ($swatches as $swatch) {
                pm_compile_swatch_scss( $swatch->ID );
            }

            $resp->status = 'ok';
        }
    }

    echo json_encode( $resp );
    die();
}
add_action( 'wp_ajax_save_all_swatches', 'pm_save_all_swatches_ajax' );


/**
 * Saves all swatches when the theme updates
 *
 * @return void
 * @author
 **/
function pm_resave_swatches_update_complete()
{
    $swatches = get_posts(array(
        'post_type'      => 'pm_swatch',
        'meta_key'       => THEME_SHORT . '_status',
        'meta_value'     => 'enabled',
        'posts_per_page' => '-1'
    ));

    foreach ($swatches as $swatch) {
        pm_compile_swatch_scss($swatch->ID);
    }

    echo __('Auto saved all theme swatches.', 'my_theme-admin-td');
}
add_action('pm_upgrader_process_complete', 'pm_resave_swatches_update_complete');

// Deregistering post types
if ( ! function_exists( 'unregister_post_type' ) ) {

    function unregister_post_type( $post_type ) {
        global $wp_post_types;
        if ( isset( $wp_post_types[ 'vc_grid_item' ] ) ) {
            unset( $wp_post_types[ 'vc_grid_item' ] );
            return true;
        }
        return false;
    }
}

// Enabling the media upload of SVGs
function pm_cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

if ( pm_get_option('enable_svg') !== 'off') {
    add_filter('upload_mimes', 'pm_cc_mime_types');
}

// Remove Grid Elements option page for VC
add_action( 'admin_menu', 'adjust_the_wp_menu', 50 );

function adjust_the_wp_menu() {
    if ( defined('VC_PAGE_MAIN_SLUG') && class_exists('Vc_Grid_Item_Editor') ) {
        remove_submenu_page( VC_PAGE_MAIN_SLUG, 'edit.php?post_type=' . rawurlencode( Vc_Grid_Item_Editor::postType() ) );
    }
}