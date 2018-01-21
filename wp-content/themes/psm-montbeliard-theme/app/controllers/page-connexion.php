<?php
/**
 * Created by IntelliJ IDEA.
 * User: jeffj
 * Date: 01/12/2017
 * Time: 12:16
 */

namespace App;

use Sober\Controller\Controller;
use WP_Error;

define('MM_BRUTE_FILE', get_template_directory().'/../app/auth/brute.txt');
define('MM_BRUTE_WINDOW', 300);
define('MM_BRUTE_ATTEMPTS', 5);

//Protect the file to direct Access wia url
if ( ! defined( 'ABSPATH' )) {
    header('Location: http://tinyurl.com/ydek4vj2');
    exit; // Exit if accessed directly
}
class Connexion extends Controller
{
    /**
     * Creating the login form
     */

    public static function login_form(){

        if($_GET['redirection']){
            $redirect = $_GET['redirection'];
        }else{
            $redirect = home_url();
        }

        $form = wp_login_form( array(
            'redirect' => $redirect,
            'form_id' => 'login-form',
            'label_username' => __('Adresse mail ou nom d\'utilisateur'),
            'label_password' => __('Mot de passe'),
            'label_remember' => __('Se rappeler de moi'),
            'label_log_in' => __('Connexion'),
            'id_submit' => __('login_submit'),
            'remember' => true
        ));

        return $form;
    }
    /**
     * Redirect the vistor to the wordpress login page
     * @return bool
     */
    public function redirected_to_standart_register_form() {
        if( !function_exists('is_plugin_inactive') ) {
            include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        }
        if (get_option('init_custom_login_page_admin') == 'false' || is_plugin_inactive("plugin-psm/index.php")){
            wp_redirect(wp_login_url());
        }
    }

    /**
     * Get the login of the student after a successfull Cas authentification
     * @return String
     */
    public function cas_login_filter() {
        //Check if the administrator wants to use the LDAP filter
        if (get_option('activate_login_ldap_filter') == 'true'){
            apply_filters('cas_portail', '');
        }
    }

    /** Custom function
     *  Gather the login errors by checking the url parameters
     */

    function get_login_errors()
    {
        $login_errors = new WP_Error();

        $page_showing = basename($_SERVER['REQUEST_URI']);
        if (strpos($page_showing, 'failed') !== false) {
            $login_errors->add('login-invalid-username', 'Login ou mot de passe incorrect.');
        }
        return $login_errors;
    }

    public static function bruteCheck($failed_attempt = false) {

        $deny_login = false;
        if(!file_exists(MM_BRUTE_FILE)) touch(MM_BRUTE_FILE);
        $cache = unserialize(Connexion::fileToString(MM_BRUTE_FILE));
        if(!$cache) $cache = array();

        if($failed_attempt) {  //register the new failed attempt and timestamp
            if(!isset($cache[$_SERVER['REMOTE_ADDR']])) {
                $cache[$_SERVER['REMOTE_ADDR']] = array();
            }
            $cache[$_SERVER['REMOTE_ADDR']][] = time();
            if(count($cache[$_SERVER['REMOTE_ADDR']]) > MM_BRUTE_ATTEMPTS) array_shift($cache[$_SERVER['REMOTE_ADDR']]);
        }

        //get the number of failed attempts in the last 15 minutes
        if(!isset($cache[$_SERVER['REMOTE_ADDR']])) {
            $deny_login = false;
        } else {
            $attempts = $cache[$_SERVER['REMOTE_ADDR']];
            if(count($attempts) < MM_BRUTE_ATTEMPTS) {
                $deny_login = false;
            } else {
                if($attempts[0] + MM_BRUTE_WINDOW > time()) {
                    $deny_login = true;
                } else {
                    $deny_login = false;
                }
            }
        }

        //cleanup the cache so it doesn't get too large over time
        foreach($cache as $ip=>$attempts) {
            if($attempts) {
                if($attempts[count($attempts)-1] + MM_BRUTE_WINDOW < time()) {
                    unset($cache[$ip]);
                }
            }
        }

        Connexion::stringToFile(MM_BRUTE_FILE, serialize($cache));

        return $deny_login;
    }

    public static function fileToString($filename) {
        return file_get_contents($filename);
    }

    public static function stringToFile($filename, $data) {
        $file = fopen ($filename, "w");
        fwrite($file, $data);
        fclose ($file);
        return true;
    }

    public function get_trys()
    {
        Connexion::bruteCheck();
        $cache = unserialize(Connexion::fileToString(MM_BRUTE_FILE));
        $remaining_attempts = MM_BRUTE_ATTEMPTS - count($cache[$_SERVER['REMOTE_ADDR']]);
        return $remaining_attempts;
	}

    public function get_remaining_time () {
        $cache = unserialize(Connexion::fileToString(MM_BRUTE_FILE));
        $attempts = $cache[$_SERVER['REMOTE_ADDR']];
        $time_left = array(
            'time_left' => floor(($attempts[0] + MM_BRUTE_WINDOW - time())/60),
            'minutes_showing' => true,
            'secondes_showing' => false,
        );

        if($time_left['time_left'] == 0){
            $time_left['time_left'] = $attempts[0] + MM_BRUTE_WINDOW - time();
            $time_left['minutes_showing'] = false;
            $time_left['secondes_showing'] = true;
        }
        return $time_left;
    }
}

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
        Connexion::bruteCheck(true);
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
