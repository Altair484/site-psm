<?php
/**
 * Class PSM_Settings_Default_Settings
 */
class PSM_Settings_Default_Settings
{
    /**
     * PSM_Settings_Default_Settings constructor.
     */
    public function __construct() {
        defined( 'ABSPATH') or die ( 'Hey, you cant access to this file, you silly human !');
    }

    /**
     * On the page index.php, an option is created only on plugin activation
     * Then, we delete this option to be sure this function will execute only one time
     */
    public static function load_plugin() {
        //On the page index.php, an option is created only on plugin activation
        //Then, we delete this option to be sure this function will execute only one time
        if ( is_admin() && get_option( 'Activated_Plugin' ) == 'PSM_Settings' ) {
            delete_option( 'Activated_Plugin' );
            //We set default values to settings
            PSM_Settings_Default_Settings::set_default_values();
        }
    }

    /**
     * This function set the default values for our plugin
     */
    public function set_default_values() {
        /* Page connextion */
        if (!get_option( 'init_custom_login_page_admin') ){
            add_option( 'init_custom_login_page_admin', 'true');
        }else{
            update_option( 'init_custom_login_page_admin', 'true');
        }

        if (!get_option( 'activate_login_ldap_filter') ){
            add_option( 'activate_login_ldap_filter', 'true');
        }else{
            update_option( 'activate_login_ldap_filter', 'false');
        }

        if (!get_option( 'activate_login_brute_force_protection') ){
            add_option( 'activate_login_brute_force_protection', 'true');
        }else{
            update_option( 'activate_login_brute_force_protection', 'true');
        }

        /* Page inscription */
        if (!get_option( 'activate_user_register_custom_page') ){
            add_option( 'activate_user_register_custom_page', 'true');
        }else{
            update_option( 'activate_user_register_custom_page', 'true');
        }

        if (!get_option( 'activate_user_register_ldap_filter') ){
            add_option( 'activate_user_register_ldap_filter', 'true');
        }else{
            update_option( 'activate_user_register_ldap_filter', 'true');
        }

        if (!get_option( 'user_register_key') ){
            add_option( 'user_register_key', 'iDcAc8kJ2fz)YmQv2QFhb0nu');
        }else{
            update_option( 'user_register_key', 'iDcAc8kJ2fz)YmQv2QFhb0nu');
        }

        /*Comments*/
        if (!get_option( 'activate_comments_managment') ){
            add_option( 'activate_comments_managment', 'false');
        }else{
            update_option( 'activate_comments_managment', 'false');
        }
    }
}
new PSM_Settings_Default_Settings();