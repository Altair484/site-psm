<?php
//Protect the file to direct Access wia url
if ( ! defined( 'ABSPATH' )) {
    header('Location: http://tinyurl.com/ydek4vj2');
    exit; // Exit if accessed directly
}

/** ==========================================================================
 * ACTIONS REGISTER PAGE
========================================================================== */
//If the custom register page is activated, then...
if( !function_exists('is_plugin_active') ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
if (get_option('activate_user_register_custom_page') == 'true' && is_plugin_active("plugin-psm/index.php")) {
    /**
     * Overriding login_form_register
     * When a user try to get wp-login?action=register, redirect to our custom wordpress register page
     */
    add_action('register_form', function () {
        $location = get_site_url() . '/inscription';
        wp_redirect($location);
    });
}



