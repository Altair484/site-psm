<?php
/**
 * Created by IntelliJ IDEA.
 * User: jeffj
 * Date: 01/12/2017
 * Time: 11:07
 */

namespace App;

use Sober\Controller\Controller;
use WP_Error;

class Inscription extends Controller
{
    /**
     * Redirect the vistor to the wordpress registration page
     * @return bool
     */
    public function redirected_to_standart_register_form() {
        if( !function_exists('is_plugin_inactive') ) {
            include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        }
        if (get_option('activate_user_register_custom_page') == 'false' || is_plugin_inactive("plugin-psm/index.php")){
            wp_redirect(wp_registration_url());
        }
    }

    /**
     * Get the login of the student after a successfull Cas authentification
     * @return String
     */
    public function usernameCas() {
        if (get_option('activate_user_register_ldap_filter') == 'true'){
            $usernameCas = apply_filters('cas_portail', '');
            return $usernameCas;
        }else{
            $usernameCas = "undefined";
            return $usernameCas;
        }
    }

    /**
     * Return All the formations names
     * @return array|int|WP_Error
     */
    public static function get_formation_names(){
        //Get formations informations (fpsm_terms/fpsm_terms_taxonomy)
        $formations = get_terms( array(
            'taxonomy' => 'formation',
            'hide_empty' => false,
        ));
        return $formations;
    }

    /**
     * Validation of visitors inputs fields during a new user registration
     *
     * Used filters functions :
     * ucfirst() : The first lettre is uppercase
     * strtolower() : The following is lowercase
     * esc_attr() : Encodes the <, >, &, ” and ‘
     * sanitize_email : Strips out all characters that are not allowable in an email.
     * sanitize_user : Removes tags, octets, entities, and if strict is enabled, will remove all non-ASCII characters. sanitize_user( $username, $strict )
     * sanitize_text_field : Checks for invalid UTF-8,Converts single < characters to entities, Strips all tags, Removes line breaks, tabs, and extra whitespace, Strips octets
     * @return WP_Error
     */
    public function validate_fields(){
        if (get_option('activate_user_register_custom_page') == 'true'){

            if (!isset($_POST['djie3duhb3edub3u']) || !wp_verify_nonce($_POST['djie3duhb3edub3u'], 'create_user_form_submit')) {
            } else {
                global $reg_errors;
                $reg_errors = new WP_Error;

                $userFirstName = ucfirst(mb_strtolower(esc_attr($_POST['user_first_name'])));
                $userLastName = ucfirst(mb_strtolower(esc_attr($_POST['user_last_name'])));
                $userEmail = sanitize_email($_POST['user_email']);
                $userLogin = sanitize_user($_POST['user_login']);
                $userPassword = esc_attr($_POST['user_password']);
                $userPassword2 = esc_attr($_POST['user_password2']);
                $userFormation = sanitize_text_field($_POST['user_formation']);
                $userStudiesPeriod = sanitize_text_field($_POST['user_studies_period']);
                $registerKey = $_POST['auth_register_key'];

                if (empty($userFirstName) || empty($userLastName) || empty($userEmail) || empty($userLogin) || empty($userPassword) || empty($userPassword2) || empty($userFormation)) {
                    $reg_errors->add('field', 'Un champ requis a été oublié');
                }

                if (preg_match('/[0-9]+/', $userFirstName) || preg_match('/[0-9]+/', $userLastName)) {
                    $reg_errors->add('user_name_length', 'Votre nom ou prénom ne peuvent contenir que des lettres');
                }

                if (6 > strlen($userLogin)) {
                    $reg_errors->add('user_login_length', 'Le login est trop court (au moins 6 carractères.)');
                }
                if (username_exists($userLogin)) {
                    $reg_errors->add('user_login', 'Ce login est déjà utilisé par un autre utilisateur.');
                }
                if (!validate_username($userLogin)) {
                    $reg_errors->add('user_login_invalid', 'Veuillez renseigner un login valide.');
                }
                if (!is_email($userEmail)) {
                    $reg_errors->add('email_invalid', 'Veuillez renseigner une adresse mail valide.');
                }

                if (email_exists($userEmail)) {
                    $reg_errors->add('email', 'Cet email est déjà utilisé par un autre utilisateur.');
                }
                if (5 > strlen($userPassword)) {
                    $reg_errors->add('password', 'La longueur du mot de passe doit être d\'au moins 5 carractères.');
                }

                if ($userPassword != $userPassword2) {
                    $reg_errors->add('password-missmatch', 'Les mots de passe ne correspondent pas.');
                }

                if ($registerKey != get_option('auth_register_key')) {
                    $reg_errors->add('auth-register-key-missmatch', 'La clé d\'inscription n\'est pas valide');
                }

                if (1 > count($reg_errors->get_error_messages())) {
                    $userdata = array(
                        'user_login' => $userLogin,
                        'user_email' => $userEmail,
                        'user_pass' => $userPassword,
                        'first_name' => $userFirstName,
                        'last_name' => $userLastName,
                        'role' => 'contributor',
                    );
                    //Custom user fields
                    $user_id = wp_insert_user($userdata);
                    update_user_meta($user_id, 'user_formation', $userFormation);
                    update_user_meta($user_id, 'user_studies_period', $userStudiesPeriod);

                    //Mail confirmation
                    \App\Email_contents::register_email($userFirstName, $userLastName, $userLogin, $userEmail);

                    $location = get_site_url() . '/connexion/?justRegistered=true';
                    wp_redirect($location);
                    exit;
                }else {
                    return $reg_errors;
                }
            }
        }
    }
}