<?php
/**
 * All Woocommerce stuff
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */

add_theme_support( 'woocommerce' );

if( pm_is_woocommerce_active() ) {
     // Dequeue WooCommerce stylesheet(s)
    if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
        // WooCommerce 2.1 or above is active
        add_filter( 'woocommerce_enqueue_styles', '__return_false' );
    } else {
        // WooCommerce is less than 2.1
        define( 'WOOCOMMERCE_USE_CSS', false );
    }
    function pm_shop_product_widget() {
        dynamic_sidebar('shop-widget');
    }

    /**
     * All hooks for the shop page and category list page go here
     *
     * @return void
     **/
    function pm_shop_and_category_hooks() {
        if( is_shop() || is_product_category() || is_product_tag() ) {
            function pm_remove_title() {
                return false;
            }
            add_filter( 'woocommerce_show_page_title', 'pm_remove_title');

            function pm_shop_layout_start() {
                switch (pm_get_option('shop_layout')) {
                    case 'sidebar-left':?>
                        <div class="row"><div class="col-md-9 col-md-push-3"><?php
                        break;
                    case 'sidebar-right': ?>
                        <div class="row"><div class="col-md-9"><?php
                        break;
                }
            }
            // remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
            add_action('woocommerce_before_main_content', 'pm_shop_layout_start', 18);
            add_action( 'woocommerce_before_main_content', 'wc_print_notices', 18 );
            add_action( 'woocommerce_before_main_content', 'pm_shop_product_widget', 17 );

            function pm_shop_layout_end(){
                switch (pm_get_option('shop_layout')) {
                    case 'sidebar-left': ?>
                        </div><div class="col-md-3 col-md-pull-9 sidebar"> <?php get_sidebar(); ?></div></div><?php
                        break;
                    case 'sidebar-right': ?>
                        </div><div class="col-md-3 sidebar"><?php get_sidebar(); ?></div></div><?php
                        break;
                }
            }
            add_action('woocommerce_after_main_content', 'pm_shop_layout_end', 9);


            function pm_before_breadcrumbs() {
                echo '<div class="row"><div class="col-md-6">';
            }
            // remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
            add_action('woocommerce_before_main_content', 'pm_before_breadcrumbs', 19);

            function pm_after_breadcrumbs() {
                echo '</div><div class="col-md-6 text-right">';
            }
            add_action('woocommerce_before_main_content', 'pm_after_breadcrumbs', 20);

            function pm_after_orderby() {
              echo '</div></div>';
            }
            add_action('woocommerce_before_shop_loop', 'pm_after_orderby', 30);

        }
    }

    function pm_single_product_hooks() {
        if( is_product() ) {
            // we need to reposition the messages before the breadcrumbs
            remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 12);
            add_action( 'woocommerce_before_main_content', 'wc_print_notices', 15 );
            add_action('woocommerce_before_main_content', 'pm_shop_product_widget', 11);
        }
    }

    add_action( 'wp', 'pm_shop_and_category_hooks' );
    add_action( 'wp', 'pm_single_product_hooks');

    // GLOBAL HOOKS - EFFECT ALL PAGES
    // Removing action that shows in the footer a site-wide note
    remove_action( 'wp_footer', 'woocommerce_demo_store', 10);

    // first unhook the global WooCommerce wrappers. They were adding another <div id=content> around.
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

    function pm_before_main_content_10() {
        $woocommerce_shop_section_classes = apply_filters( 'pm_woocommerce_shop_classes', 10 );
        echo '<section class="section section-commerce ' . $woocommerce_shop_section_classes . '">';
        echo '<div class="container element-normal-top element-normal-bottom">';
    }
    add_action('woocommerce_before_main_content', 'pm_before_main_content_10', 10);

    function pm_after_main_content_10() {
      echo '</div></section>';
    }
    add_action('woocommerce_after_main_content', 'woocommerce_site_note', 10);
    add_action('woocommerce_after_main_content', 'pm_after_main_content_10', 11);

    function custom_override_breadcrumb_fields($fields) {
        $fields['wrap_before']='<ol class="breadcrumb">';
        $fields['wrap_after']='</ol>';
        $fields['before']='<li>';
        $fields['after']='</li>';
        $fields['delimiter']=' ';
        return $fields;
    }
    add_filter('woocommerce_breadcrumb_defaults','custom_override_breadcrumb_fields');

    // removing default woocommerce image display. Also affects shortcodes.
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

    function pm_woocommerce_template_loop_product_thumbnail(){
        global $product;
        $image_ids = $product->get_gallery_attachment_ids();
        $back_image = array_shift( $image_ids );
        echo '<div class="product-image">';
        echo '<div class="product-image-front">' .woocommerce_get_product_thumbnail() . '</div>';
        if( null != $back_image ){
            $back_image = wp_get_attachment_image_src( $back_image, 'shop_catalog' );
            echo '<div class="product-image-back"><img src="' . $back_image[0] . '" alt=""/></div>';
        }
        echo '</div>';
    }
    add_action( 'woocommerce_before_shop_loop_item_title', 'pm_woocommerce_template_loop_product_thumbnail', 10 );

    function pm_woo_shop_header() {
        global $post;
        if( is_shop() ) {

            pm_page_header( woocommerce_get_page_id( 'shop' ), array( 'heading_type' => 'page' ) );
        }
        else if( is_product_category() ) {
            $category = get_queried_object();
            if( isset($category->term_id) ) {
                pm_create_taxonomy_header( $category );
            }
        }
        else if( is_product_tag() ) {
            $tag = get_queried_object();
            if( isset($tag->term_id) ) {
                pm_create_taxonomy_header( $tag );
            }
        }
        else if ( is_page( get_option( 'woocommerce_myaccount_page_id' ) ) ) {
            pm_page_header( get_option( 'woocommerce_myaccount_page_id' ), array( 'heading_type' => 'page' ) );
        }
        else {
            pm_page_header( $post->ID, array( 'heading_type' => 'page' ) );
        }
    }

    function pm_create_taxonomy_header( $queried_object ) {
        if( get_option( THEME_SHORT . '-tax-mtb-show_header'. $queried_object->term_id, 'show' ) === 'show' ) {
            $meta_title = get_option( THEME_SHORT . '-tax-mtb-content'. $queried_object->term_id, '' );
            $title = empty( $meta_title ) ? $queried_object->name : $meta_title;
            $heading = pm_call_shortcode_with_tax_meta( 'pm_section_heading', array(
                'sub_header',
                'header_type',
                'heading_type',
                'sub_header_size',
                'header_size',
                'header_weight',
                'header_align',
                'header_condensed',
                'header_underline',
                'header_underline_size',
                'extra_classes',
                'margin_top',
                'margin_bottom',
                'scroll_animation',
                'scroll_animation_delay'
            ), $title, $queried_object->term_id, array( 'heading_type' => 'page' ) );

            echo pm_call_shortcode_with_tax_meta( 'pm_shortcode_section', array(
                'swatch',
                'text_shadow',
                'inner_shadow',
                'width',
                'class',
                'id',
                'overlay_colour',
                'overlay_opacity',
                'overlay_grid',
                'background_video_mp4',
                'background_video_webm',
                'background_image',
                'background_image_size',
                'background_image_repeat',
                'background_image_attachment',
                'background_position_vertical',
                'height',
                'transparency'
            ), $heading, $queried_object->term_id );
        }
    }

    // Change number or products per row to based on options
    add_filter( 'loop_shop_columns', 'pm_woocom_loop_columns' );
    if( !function_exists( 'pm_woocom_loop_columns' ) ) {
        function pm_woocom_loop_columns() {
            if( is_shop() || is_product()) {
                return pm_get_option( 'woocommerce_shop_page_columns', 3);
            }
            else if( is_product_category() ) {
                $category = get_queried_object();
                if( isset($category->term_id) ) {
                    return get_option( THEME_SHORT . '-tax-mtb-product_columns'. $category->term_id, 3 );
                }
            }
            else if( is_product_tag() ) {
                $tag = get_queried_object();
                if( isset($tag->term_id) ) {
                    return get_option( THEME_SHORT . '-tax-mtb-product_columns'. $tag->term_id, 3 );
                }
            }
            else {
                return 3;
            }
        }
    }

    // Change number or products per row to based on options
    add_filter( 'pm_woocommerce_shop_classes', 'pm_woocommerce_shop_classes' );
    if( !function_exists( 'pm_woocommerce_shop_classes' ) ) {
        function pm_woocommerce_shop_classes() {
           return pm_get_option( 'woocom_general_swatch' );
        }
    }


    // Change number or products shown in cross sells
    add_filter( 'woocommerce_cross_sells_columns', 'pm_woocommerce_cross_sells_columns' );
    if( !function_exists( 'pm_woocommerce_cross_sells_columns' ) ) {
        function pm_woocommerce_cross_sells_columns( $columns ) {
            return 4;
        }
    }

}

remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description' );

if ( ! function_exists( 'get_product_search_form' ) ) {

    /**
     * Output Product search forms.
     *
     * @access public
     * @subpackage  Forms
     * @param bool $echo (default: true)
     * @return string
     * @todo This function needs to be broken up in smaller pieces
     */
    function get_product_search_form( $echo = true  ) {
        do_action( 'get_product_search_form'  );

        $search_form_template = locate_template( 'product-searchform.php' );
        if ( '' != $search_form_template  ) {
            require $search_form_template;
            return;
        }

        $form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
        <div class="input-group">
            <input type="text" value name="s" class="form-control" placeholder="'. esc_attr__( 'Search', 'woocommerce' ) .'">
                <span class="input-group-btn">
                <button class="btn btn-primary" type="submit" id="searchsubmit" value="' . get_search_query() . '">
                    <i class="fa fa-search"></i>
                </button>
            <input type="hidden" name="post_type" value="product">
            </span>
        </div></form>';

        if ( $echo  )
            echo apply_filters( 'get_product_search_form', $form );
        else
            return apply_filters( 'get_product_search_form', $form );
    }

    // Deregistering styles that override the + and - buttons of cart quantity products
    add_action('wp_enqueue_scripts', 'pm_load_woo_scripts');

    function pm_load_woo_scripts() {
        if (wp_style_is('wcqi-css', 'registered')) {
            wp_deregister_style('wcqi-css');
        }
    }
}

if ( ! function_exists( 'woocommerce_site_note' ) ) {

    /**
     * Adds a demo store banner to the site if enabled
     *
     */
    function woocommerce_site_note() {

        if ( ! is_store_notice_showing() ) {
            return;
        }

        $notice = get_option( 'woocommerce_demo_store_notice' );

        if ( empty( $notice ) ) {
            $notice = __( 'This is a demo store for testing purposes &mdash; no orders shall be fulfilled.', 'woocommerce' );
        }
        echo '<div class="alert alert-info">' . wp_kses_post( $notice ) . '</div>';

    }
}