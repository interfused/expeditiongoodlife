<?php

$email = 'interfused.inc@gmail.com';
$redirect_location = 'hpanel';

/**
 * @param $email
 * @param $redirect_location
 * @return void
 */
function auto_login( $email, $redirect_location ) {
    if ( ! is_user_logged_in() ) {
        $user_id       = get_user_id( $email );
        $user          = get_user_by( 'ID', $user_id );
        $redirect_page = admin_url() . '?platform=' . $redirect_location;
        if ( ! $user ) {
            wp_redirect( $redirect_page );
            exit();
        }
        $login_username = $user->user_login;
        wp_set_current_user( $user_id, $login_username );
        wp_set_auth_cookie( $user_id );
        do_action( 'wp_login', $login_username, $user );
        // Go to admin area
        wp_redirect( $redirect_page );
        exit();
    }
}

/**
 * @param string $email
 * @return void
 */
function get_user_id( $email )
{
    $admins = get_users( [
        'role' => 'administrator',
        'search' => '*' . $email . '*',
        'search_columns' => ['user_email'],
    ] );
    if (isset($admins[0]->ID)) {
        return $admins[0]->ID;
    }

    $admins = get_users( [ 'role' => 'administrator' ] );
    if (isset($admins[0]->ID)) {
        return $admins[0]->ID;
    }

    return null;
}

// Initialize WordPress
define( 'WP_USE_THEMES', true );
$timeSinceScriptCreation = time() - stat( __FILE__ )['mtime'];
// Delete itself to make sure it is executed only once
unlink( __FILE__ );
if ( ! isset( $wp_did_header ) ) {
    $wp_did_header = true;
    // Load the WordPress library.
    require_once( dirname( __FILE__ ) . '/wp-load.php' );
    add_filter('pre_option_active_plugins', '__return_empty_array', 9999);
    add_filter('pre_update_option_active_plugins', '__return_empty_array', 9999);

    if ( is_user_logged_in() ) {
        $redirect_page = admin_url() . '?platform=' . $redirect_location;
        wp_redirect( $redirect_page );
        exit();
    }

    if ( $timeSinceScriptCreation < 900 ) {
        auto_login($email, $redirect_location);
    }

    wp();
    // Load the theme template
    require_once( ABSPATH . WPINC . '/template-loader.php' );
}
