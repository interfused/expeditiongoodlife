<?php
/**
 * Interfused.com
 *
 * :: *(TEMPLATE_NAME)*
 * :: *(COPYRIGHT)*
 * :: *(LICENCE)*
 */

function pm_fetch_custom_columns($column) {
    global $post;
    switch( $column ) {
        case 'menu_order':
            echo $post->menu_order;
            echo '<input id="qe_slide_order_"' . $post->ID . '" type="hidden" value="' . $post->menu_order . '" />';
        break;

        case 'featured-image':
            $editlink = get_edit_post_link( $post->ID );
            echo '<a href="' . $editlink . '">' . get_the_post_thumbnail( $post->ID, 'thumbnail' ) . '</a>';
        break;

        case 'slideshows-category':
            echo get_the_term_list( $post->ID, 'pm_slideshow_categories', '', ', ' );
        break;

        case 'service-category':
            echo get_the_term_list( $post->ID, 'pm_service_category', '', ', ' );
        break;

        case 'departments-category':
            echo get_the_term_list( $post->ID, 'pm_staff_department', '', ', ' );
        break;

        case 'job-title':
            echo get_post_meta( $post->ID, THEME_SHORT . '_position', true );
        break;

        case 'portfolio-category':
            echo get_the_term_list( $post->ID, 'pm_portfolio_categories', '', ', ' );
        break;

        case 'swatch-status':
            $status = get_post_meta( $post->ID, THEME_SHORT . '_status', true );
            if( $status === 'enabled' ) {
                echo '<h4 class="swatch-status enabled">Swatch Enabled</h4>';
            }
            else {
                echo '<h4 class="swatch-status disabled">Swatch Disabled</h4>';
            }
        break;
        case 'testimonial-group':
            echo get_the_term_list( $post->ID, 'pm_testimonial_group', '', ', ' );
        break;
        case 'testimonial-citation':
            echo get_post_meta( $post->ID, THEME_SHORT . '_citation', true );
        break;

        case 'swatch-preview':
            $header                 = get_post_meta( $post->ID, THEME_SHORT . '_header', true );
            $background             = get_post_meta( $post->ID, THEME_SHORT . '_background', true );
            $text                   = get_post_meta( $post->ID, THEME_SHORT . '_text', true );
            $icon                   = get_post_meta( $post->ID, THEME_SHORT . '_icon', true );
            $link                   = get_post_meta( $post->ID, THEME_SHORT . '_link', true );
            $link_hover             = get_post_meta( $post->ID, THEME_SHORT . '_link_hover', true );
            $foreground             = get_post_meta( $post->ID, THEME_SHORT . '_foreground', true );
            $overlay                = get_post_meta( $post->ID, THEME_SHORT . '_overlay', true );
            $form_background        = get_post_meta( $post->ID, THEME_SHORT . '_form_background', true );
            $form_text              = get_post_meta( $post->ID, THEME_SHORT . '_form_text', true );
            $form_active            = get_post_meta( $post->ID, THEME_SHORT . '_form_active', true );
            $form_button_background = get_post_meta( $post->ID, THEME_SHORT . '_primary_button_background', true );
            $form_button_text       = get_post_meta( $post->ID, THEME_SHORT . '_primary_button_text', true );
            ?>

            <div class="swatch-preview" style="background:<?php echo $background; ?>; padding: 24px; border: 1px solid #dfdfdf;">
                <h2 style="color:<?php echo $header; ?>; text-align:center;">This is how a title will look</h2>
                <p style="color:<?php echo $text; ?>; line-height: 1.5em;">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Perspiciatis, <a href="#" style="color:<?php echo $link; ?>;" onmouseover="this.style.color='<?php echo $link_hover; ?>'" onmouseout="this.style.color='<?php echo $link; ?>'">Links will look like this neque quis cumque nobis</a> dolore provident unde hic aspernatur porro accusantium.
                    Ratione odit iste ducimus excepturi cupiditate amet similique laborum molestiae!
                </p>
            </div>
        <?php
        break;

        default:
            // do nothing
        break;
    }
}
add_action( 'manage_posts_custom_column', 'pm_fetch_custom_columns' );

/**
 * Slideshow Custom Post
 */

$labels = array(
    'name'               => __( 'Slideshow Images', 'my_theme-admin-td' ),
    'singular_name'      => __( 'Slideshow Image', 'my_theme-admin-td' ),
    'add_new'            => __( 'Add New', 'my_theme-admin-td' ),
    'add_new_item'       => __( 'Add New Image', 'my_theme-admin-td' ),
    'edit_item'          => __( 'Edit Image', 'my_theme-admin-td' ),
    'new_item'           => __( 'New Image', 'my_theme-admin-td' ),
    'view_item'          => __( 'View Image', 'my_theme-admin-td' ),
    'search_items'       => __( 'Search Images', 'my_theme-admin-td' ),
    'not_found'          => __( 'No images found', 'my_theme-admin-td' ),
    'not_found_in_trash' => __( 'No images found in Trash', 'my_theme-admin-td' ),
    'menu_name'          => __( 'Slider Images', 'my_theme-admin-td' )
);

$args = array(
    'labels'    => $labels,
    'public'    => false,
    'show_ui'   => true,
    'query_var' => false,
    'rewrite'   => false,
    'menu_icon' => 'dashicons-slides',
    'supports'  => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
);

// create custom post
register_post_type( 'pm_slideshow_image', $args );

// move featured image box on slideshow
function pm_move_slideshow_meta_box() {
    remove_meta_box( 'postimagediv', 'pm_slideshow_image', 'side' );
    add_meta_box('postimagediv', __('Slideshow Image', 'my_theme-admin-td'), 'post_thumbnail_meta_box', 'pm_slideshow_image', 'advanced', 'low');
}
add_action('do_meta_boxes', 'pm_move_slideshow_meta_box');

function pm_edit_columns_slideshow($columns) {
    $columns = array(
        'cb'                  => '<input type="checkbox" />',
        'title'               => __('Image Title', 'my_theme-admin-td'),
        'featured-image'      => __('Image', 'my_theme-admin-td'),
        'menu_order'          => __('Order', 'my_theme-admin-td'),
        'slideshows-category' => __('Slideshows', 'my_theme-admin-td'),
    );
    return $columns;
}
add_filter( 'manage_edit-pm_slideshow_image_columns', 'pm_edit_columns_slideshow' );


/* --------------------- SERVICES ------------------------*/

$labels = array(
    'name'               => __('Services', 'my_theme-admin-td'),
    'singular_name'      => __('Service', 'my_theme-admin-td'),
    'add_new'            => __('Add New', 'my_theme-admin-td'),
    'add_new_item'       => __('Add New Service', 'my_theme-admin-td'),
    'edit_item'          => __('Edit Service', 'my_theme-admin-td'),
    'new_item'           => __('New Service', 'my_theme-admin-td'),
    'all_items'          => __('All Services', 'my_theme-admin-td'),
    'view_item'          => __('View Service', 'my_theme-admin-td'),
    'search_items'       => __('Search Services', 'my_theme-admin-td'),
    'not_found'          => __('No Service found', 'my_theme-admin-td'),
    'not_found_in_trash' => __('No Service found in Trash', 'my_theme-admin-td'),
    'menu_name'          => __('Services', 'my_theme-admin-td')
);

// fetch service slug
$service_slug = trim( _x(pm_get_option( 'services_slug' ), 'URL slug', 'my_theme-admin-td' ));
if( empty($service_slug) ) {
    $service_slug = _x('our-services', 'URL slug', 'my_theme-admin-td');
}

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-flag',
    'supports'           => array( 'title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions' ),
    'rewrite'            => array( 'slug' => $service_slug, 'with_front' => true, 'pages' => true, 'feeds'=>false ),
);
register_post_type( 'pm_service', $args );

function pm_edit_columns_services($columns) {
   // $columns['featured_image']= 'Featured Image';
    $columns = array(
        'cb'             => '<input type="checkbox" />',
        'title'          => __('Service', 'my_theme-admin-td'),
        'featured-image' => __('Image', 'my_theme-admin-td'),
        'service-category'     => __('Category', 'my_theme-admin-td')
    );
    return $columns;
}
add_filter( 'manage_edit-pm_service_columns', 'pm_edit_columns_services' );

/* ------------------ TESTIMONIALS -----------------------*/

$labels = array(
    'name'               => __('Testimonial', 'my_theme-admin-td'),
    'singular_name'      => __('Testimonial', 'my_theme-admin-td'),
    'add_new'            => __('Add New', 'my_theme-admin-td'),
    'add_new_item'       => __('Add New Testimonial', 'my_theme-admin-td'),
    'edit_item'          => __('Edit Testimonial', 'my_theme-admin-td'),
    'new_item'           => __('New Testimonial', 'my_theme-admin-td'),
    'all_items'          => __('All Testimonial', 'my_theme-admin-td'),
    'view_item'          => __('View Testimonial', 'my_theme-admin-td'),
    'search_items'       => __('Search Testimonial', 'my_theme-admin-td'),
    'not_found'          => __('No Testimonial found', 'my_theme-admin-td'),
    'not_found_in_trash' => __('No Testimonial found in Trash', 'my_theme-admin-td'),
    'menu_name'          => __('Testimonials', 'my_theme-admin-td')
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-format-quote',
    'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions' )
);
register_post_type('pm_testimonial', $args);

$labels = array(
    'name'          => __( 'Groups', 'my_theme-admin-td' ),
    'singular_name' => __( 'Group', 'my_theme-admin-td' ),
    'search_items'  => __( 'Search Groups', 'my_theme-admin-td' ),
    'all_items'     => __( 'All Groups', 'my_theme-admin-td' ),
    'edit_item'     => __( 'Edit Group', 'my_theme-admin-td'),
    'update_item'   => __( 'Update Group', 'my_theme-admin-td'),
    'add_new_item'  => __( 'Add New Group', 'my_theme-admin-td'),
    'new_item_name' => __( 'New Group Name', 'my_theme-admin-td')
);

register_taxonomy(
    'pm_testimonial_group',
    'pm_testimonial',
    array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
        'query_var'    => true,
    )
);

function pm_edit_columns_testimonial($columns) {
   // $columns['featured_image']= 'Featured Image';
    $columns = array(
        'cb'                   => '<input type="checkbox" />',
        'title'                => __('Author', 'my_theme-admin-td'),
        'featured-image'       => __('Image', 'my_theme-admin-td'),
        'testimonial-citation' => __('Citation', 'my_theme-admin-td'),
        'testimonial-group'    => __('Group', 'my_theme-admin-td')
    );
    return $columns;
}
add_filter( 'manage_edit-pm_testimonial_columns', 'pm_edit_columns_testimonial' );


/* --------------------- STAFF ------------------------*/

$labels = array(
    'name'               => __('Staff', 'my_theme-admin-td'),
    'singular_name'      => __('Staff', 'my_theme-admin-td'),
    'add_new'            => __('Add New', 'my_theme-admin-td'),
    'add_new_item'       => __('Add New Staff', 'my_theme-admin-td'),
    'edit_item'          => __('Edit Staff', 'my_theme-admin-td'),
    'new_item'           => __('New Staff', 'my_theme-admin-td'),
    'all_items'          => __('All Staff', 'my_theme-admin-td'),
    'view_item'          => __('View Staff', 'my_theme-admin-td'),
    'search_items'       => __('Search Staff', 'my_theme-admin-td'),
    'not_found'          => __('No Staff found', 'my_theme-admin-td'),
    'not_found_in_trash' => __('No Staff found in Trash', 'my_theme-admin-td'),
    'menu_name'          => __('Staff', 'my_theme-admin-td')
);

// fetch portfolio slug
$staff_slug = trim( _x( pm_get_option( 'staff_slug' ), 'URL slug', 'my_theme-admin-td' )  );
if( empty($staff_slug) ) {
    $staff_slug = _x('staff', 'URL slug', 'my_theme-admin-td');
}

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-businessman',
    'supports'           => array( 'title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions' ),
    'rewrite' => array( 'slug' => $staff_slug, 'with_front' => true, 'pages' => true, 'feeds'=>false ),
);
register_post_type('pm_staff', $args);

$labels = array(
    'name'          => __( 'Departments', 'my_theme-admin-td' ),
    'singular_name' => __( 'Department', 'my_theme-admin-td' ),
    'search_items'  =>  __( 'Search Departments', 'my_theme-admin-td' ),
    'all_items'     => __( 'All Departments', 'my_theme-admin-td' ),
    'edit_item'     => __( 'Edit Department', 'my_theme-admin-td'),
    'update_item'   => __( 'Update Department', 'my_theme-admin-td'),
    'add_new_item'  => __( 'Add New Department', 'my_theme-admin-td'),
    'new_item_name' => __( 'New Department Name', 'my_theme-admin-td')
);

register_taxonomy(
    'pm_staff_department',
    'pm_staff',
    array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
    )
);

function pm_edit_columns_staff($columns) {
   // $columns['featured_image']= 'Featured Image';
    $columns = array(
        'cb'                   => '<input type="checkbox" />',
        'title'                => __('Name', 'my_theme-admin-td'),
        'featured-image'       => __('Image', 'my_theme-admin-td'),
        'job-title'            => __('Job Title', 'my_theme-admin-td'),
        'departments-category' => __('Department', 'my_theme-admin-td')
    );
    return $columns;
}
add_filter( 'manage_edit-pm_staff_columns', 'pm_edit_columns_staff' );


/***************** PORTFOLIO *******************/

$labels = array(
    'name'               => __('Portfolio Items', 'my_theme-admin-td'),
    'singular_name'      => __('Portfolio Item', 'my_theme-admin-td'),
    'add_new'            => __('Add New', 'my_theme-admin-td'),
    'add_new_item'       => __('Add New Portfolio Item', 'my_theme-admin-td'),
    'edit_item'          => __('Edit Portfolio Item', 'my_theme-admin-td'),
    'new_item'           => __('New Portfolio Item', 'my_theme-admin-td'),
    'view_item'          => __('View Portfolio Item', 'my_theme-admin-td'),
    'search_items'       => __('Search Portfolio Items', 'my_theme-admin-td'),
    'not_found'          =>  __('No images found', 'my_theme-admin-td'),
    'not_found_in_trash' => __('No images found in Trash', 'my_theme-admin-td'),
    'parent_item_colon'  => '',
    'menu_name'          => __('Portfolio Items', 'my_theme-admin-td')
);

// fetch portfolio slug
$permalink_slug = trim( _x( pm_get_option( 'portfolio_slug' ), 'URL slug', 'my_theme-admin-td' ) );
if( empty($permalink_slug) ) {
    $permalink_slug = _x('portfolio', 'URL slug', 'my_theme-admin-td' );
}

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'query_var'          => true,
    'has_archive'        => true,
    'capability_type'    => 'post',
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-portfolio',
    'supports'           => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'comments' ),
    'rewrite' => array( 'slug' => $permalink_slug, 'with_front' => true, 'pages' => true, 'feeds'=>false ),
);

// create custom post
register_post_type( 'pm_portfolio_image', $args );

// Register portfolio taxonomy
$labels = array(
    'name'          => __( 'Categories', 'my_theme-admin-td' ),
    'singular_name' => __( 'Category', 'my_theme-admin-td' ),
    'search_items'  =>  __( 'Search Categories', 'my_theme-admin-td' ),
    'all_items'     => __( 'All Categories', 'my_theme-admin-td' ),
    'edit_item'     => __( 'Edit Category', 'my_theme-admin-td'),
    'update_item'   => __( 'Update Category', 'my_theme-admin-td'),
    'add_new_item'  => __( 'Add New Category', 'my_theme-admin-td'),
    'new_item_name' => __( 'New Category Name', 'my_theme-admin-td')
);

register_taxonomy(
    'pm_portfolio_categories',
    'pm_portfolio_image',
    array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
        'query_var'    => true,
    )
);

function pm_edit_columns_portfolio($columns) {
   // $columns['featured_image']= 'Featured Image';
    $columns = array(
        'cb'                 => '<input type="checkbox" />',
        'title'              => __('Item', 'my_theme-admin-td'),
        'featured-image'     => __('Image', 'my_theme-admin-td'),
        'menu_order'         => __('Order', 'my_theme-admin-td'),
        'portfolio-category' => __('Categories', 'my_theme-admin-td')
    );
    return $columns;
}
add_filter( 'manage_edit-pm_portfolio_image_columns', 'pm_edit_columns_portfolio' );

/* --------------------- SWATCHES ------------------------*/

$labels = array(
    'name'               => __('Swatches', 'my_theme-admin-td'),
    'singular_name'      => __('Swatch', 'my_theme-admin-td'),
    'add_new'            => __('Add New', 'my_theme-admin-td'),
    'add_new_item'       => __('Add New Swatch', 'my_theme-admin-td'),
    'edit_item'          => __('Edit Swatch', 'my_theme-admin-td'),
    'new_item'           => __('New Swatch', 'my_theme-admin-td'),
    'all_items'          => __('All Swatches', 'my_theme-admin-td'),
    'view_item'          => __('View Swatch', 'my_theme-admin-td'),
    'search_items'       => __('Search Swatch', 'my_theme-admin-td'),
    'not_found'          => __('No Swatch found', 'my_theme-admin-td'),
    'not_found_in_trash' => __('No Swatch found in Trash', 'my_theme-admin-td'),
    'menu_name'          => __('Swatches', 'my_theme-admin-td')
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'exclude_from_search'=> true,
    'menu_icon'          => 'dashicons-art',
    'supports'           => array( 'title' )
);
register_post_type('pm_swatch', $args);

/* --------------------- Color Bundles------------------------*/

$labels = array(
    'name'               => __('Color Bundles', 'my_theme-admin-td'),
    'singular_name'      => __('Color Bundle', 'my_theme-admin-td'),
    'add_new'            => __('Add New', 'my_theme-admin-td'),
    'add_new_item'       => __('Add New Color Bundle', 'my_theme-admin-td'),
    'edit_item'          => __('Edit Color Bundle', 'my_theme-admin-td'),
    'new_item'           => __('New Color Bundle', 'my_theme-admin-td'),
    'all_items'          => __('All Color Bundles', 'my_theme-admin-td'),
    'view_item'          => __('View Color Bundle', 'my_theme-admin-td'),
    'search_items'       => __('Search Color Bundle', 'my_theme-admin-td'),
    'not_found'          => __('No Color Bundle found', 'my_theme-admin-td'),
    'not_found_in_trash' => __('No Color Bundle found in Trash', 'my_theme-admin-td'),
    'menu_name'          => __('Color Bundles', 'my_theme-admin-td')
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-screenoptions',
    'supports'           => array( 'title' )
);
register_post_type('pm_color_bundle', $args);

function pm_edit_columns_swatch($columns) {
    $columns = array(
        'cb'             => '<input type="checkbox" />',
        'title'          => __('Swatch', 'my_theme-admin-td'),
        'swatch-preview' => __('Preview', 'my_theme-admin-td'),
        'swatch-status'  => __('Status', 'my_theme-admin-td'),
    );
    return $columns;
}
add_filter( 'manage_edit-pm_swatch_columns', 'pm_edit_columns_swatch' );


$labels = array(
    'name'               => __('Mega Menu', 'my_theme-admin-td'),
    'singular_name'      => __('Mega Menu', 'my_theme-admin-td'),
);

$args = array(
    'labels'             => $labels,
    'public'             => false,
    'publicly_queryable' => false,
    'show_ui'            => false,
    'show_in_menu'       => true,
    'query_var'          => false,
    'show_in_nav_menus'  => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
);
register_post_type( 'pm_mega_menu', $args );

$labels = array(
    'name'               => __('Mega Menu Columns', 'my_theme-admin-td'),
    'singular_name'      => __('Mega Menu Columns', 'my_theme-admin-td'),
);

$args = array(
    'labels'             => $labels,
    'public'             => false,
    'publicly_queryable' => false,
    'show_ui'            => false,
    'show_in_menu'       => false,
    'query_var'          => false,
    'show_in_nav_menus'  => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
);
register_post_type( 'pm_mega_columns', $args );

function pm_register_taxonomies() {
    // Register slideshow taxonomy
    $labels = array(
        'name'          => __( 'Slideshows', 'my_theme-admin-td' ),
        'singular_name' => __( 'Slideshow', 'my_theme-admin-td' ),
        'search_items'  => __( 'Search Slideshows', 'my_theme-admin-td' ),
        'all_items'     => __( 'All Slideshows', 'my_theme-admin-td' ),
        'edit_item'     => __( 'Edit Slideshow', 'my_theme-admin-td'),
        'update_item'   => __( 'Update Slideshow', 'my_theme-admin-td'),
        'add_new_item'  => __( 'Add New Slideshow', 'my_theme-admin-td'),
        'new_item_name' => __( 'New Slideshow Name', 'my_theme-admin-td')
    );

    register_taxonomy(
        'pm_slideshow_categories',
        'pm_slideshow_image',
        array(
            'hierarchical' => true,
            'labels'       => $labels,
            'show_ui'      => true,
            'query_var'    => false,
            'rewrite'      => false
        )
    );

    $labels = array(
        'name'          => __( 'Categories', 'my_theme-admin-td' ),
        'singular_name' => __( 'Category', 'my_theme-admin-td' ),
        'search_items'  => __( 'Search Categories', 'my_theme-admin-td' ),
        'all_items'     => __( 'All Categories', 'my_theme-admin-td' ),
        'edit_item'     => __( 'Edit Category', 'my_theme-admin-td'),
        'update_item'   => __( 'Update Category', 'my_theme-admin-td'),
        'add_new_item'  => __( 'Add New Category', 'my_theme-admin-td'),
        'new_item_name' => __( 'New Category Name', 'my_theme-admin-td')
    );

    register_taxonomy(
        'pm_service_category',
        'pm_service',
        array(
            'hierarchical' => true,
            'labels'       => $labels,
            'show_ui'      => true,
        )
    );
}
add_action( 'init', 'pm_register_taxonomies' );