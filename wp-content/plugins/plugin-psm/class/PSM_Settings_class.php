<?php

/**
 * Class PSM_Settings_class
 */
class PSM_Settings_class
{
    /**
     * Constructor of the class PSM_Settings_class
     * First of all if this file is not loaded with ABSPATH, we remove access to this class
     * Then, we use the add_filter to order wordpress to execute the following functions
     *
     */
    public function __construct() {
        defined( 'ABSPATH') or die ( 'Hey, you cant access to this file, you silly human !');
        //Will show the <meta type="description"> tag in html if activated
        add_filter('init', array($this,'automatic_plugins_update'),1 );
    }

    /**
     * Function always called when wordpress init
     */
    public function automatic_plugins_update(){
        if(get_option('activate_automatic_plugin_updates') == 'true'){
            add_filter( 'auto_update_plugin', '__return_true' );
        }
    }

    public function set_values($values) {

        /* Page connexion */
        if (isset($values['init_custom_login_page_admin'])){
            update_option('init_custom_login_page_admin', $values['init_custom_login_page_admin']);
        }else{
            update_option('init_custom_login_page_admin', 'false');
        }

        if (isset($values['activate_login_ldap_filter'])){
            update_option('activate_login_ldap_filter', $values['activate_login_ldap_filter']);
        }else{
            update_option('activate_login_ldap_filter', 'false');
        }

        if (isset($values['activate_login_brute_force_protection'])){
            update_option('activate_login_brute_force_protection', $values['activate_login_brute_force_protection']);
        }else{
            update_option('activate_login_brute_force_protection', 'false');
        }

        /* Page inscription */
        if (isset($values['activate_user_register_custom_page'])){
            update_option('activate_user_register_custom_page', $values['activate_user_register_custom_page']);
        }else{
            update_option('activate_user_register_custom_page', 'false');
        }

        if (isset($values['activate_user_register_ldap_filter'])){
            update_option('activate_user_register_ldap_filter', $values['activate_user_register_ldap_filter']);
        }else{
            update_option('activate_user_register_ldap_filter', 'false');
        }

        if (isset($values['user_register_key'])){
            update_option('user_register_key', $values['user_register_key']);
        }else{
            update_option('user_register_key', 'false');
        }

        /*Comments*/
        if (isset($values['activate_comments_managment'])){
            update_option('activate_comments_managment', $values['activate_comments_managment']);
        }else{
            update_option('activate_comments_managment', 'false');
        }

        /*Theme*/
        if (isset($values['reset_theme_mods'])){
            remove_theme_mods();
        }

        /*Users rights*/
        /*Editor -> Wp_job*/
        if (isset($values['activate_editor_access_to_job_offer'])){
            update_option('activate_editor_access_to_job_offer', $values['activate_editor_access_to_job_offer']);
        }else{
            update_option('activate_editor_access_to_job_offer', 'false');
        }

        /*Editor -> School subjects*/
        if (isset($values['activate_editor_access_to_school_subjects'])){
            update_option('activate_editor_access_to_school_subjects', $values['activate_editor_access_to_school_subjects']);
        }else{
            update_option('activate_editor_access_to_school_subjects', 'false');
        }

        /*Editor -> School subjects*/
        if (isset($values['activate_editor_access_to_projects'])){
            update_option('activate_editor_access_to_projects', $values['activate_editor_access_to_projects']);
        }else{
            update_option('activate_editor_access_to_projects', 'false');
        }


        /*Plugins*/
        if (isset($values['activate_automatic_plugin_updates'])){
            update_option('activate_automatic_plugin_updates', $values['activate_automatic_plugin_updates']);
        }else{
            update_option('activate_automatic_plugin_updates', 'false');
        }
    }
}
new PSM_Settings_class();