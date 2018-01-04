<?php
use App\Auth\AntiBruteForce;

/** ==========================================================================
 *ACTIONS CONNEXION PAGE
 ========================================================================== */
//If the custom login page is activated, then...
if( !function_exists('is_plugin_active') ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
if (get_option('init_custom_login_page_admin') == 'true' && is_plugin_active("plugin-psm/index.php")) {

    /**
     * Overriding login_init
     * When a user try to get wp-login?action=login, redirect to our custom login page
     */
    add_action('login_init', function() {
        if (get_option('init_custom_login_page_admin') == 'true') {
            $location = get_site_url() . '/connexion';
            wp_redirect($location);
        }
    });

    /**Overriding wp_login_failed
     * Fires after a user login has failed.
     * ->Add an url argument when login and password missmatch
     * @link https://developer.wordpress.org/reference/hooks/wp_login_failed/
     */

    add_action('wp_login_failed', function () {
        AntiBruteForce::bruteCheck(true);
        //redirect to home_url/connexion/?login=failed
        wp_redirect(esc_url(add_query_arg('login', 'failed', home_url() . "/connexion")));
        exit;
    });

    /**Overriding wp_logout
     * Log the current user out, by destroying the current user session.
     * ->Add an url argument when the user log off
     */
    add_action('wp_logout', function () {
        //redirect to home_url/connexion/?login=false
        wp_redirect(esc_url(add_query_arg('login', 'false', home_url() . "/connexion")));
        exit;
    });
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



