<?php
/**
 * Created by IntelliJ IDEA.
 * User: jeffj
 * Date: 01/12/2017
 * Time: 12:16
 */

namespace App;

use Sober\Controller\Controller;
use App\Auth\AntiBruteForce;
use WP_Error;

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

    public function get_trys()
    {
        AntiBruteForce::bruteCheck();
        $cache = unserialize(AntiBruteForce::fileToString(MM_BRUTE_FILE));
        $remaining_attempts = MM_BRUTE_ATTEMPTS - count($cache[$_SERVER['REMOTE_ADDR']]);
        return $remaining_attempts;
	}

    public function get_remaining_time () {
        $cache = unserialize(AntiBruteForce::fileToString(MM_BRUTE_FILE));
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


    //Check if the administrator uses the custom login page
}
