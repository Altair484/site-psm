<?php
namespace App;

//Protect the file to direct Access wia url
if ( ! defined( 'ABSPATH' )) {
    header('Location: http://tinyurl.com/ydek4vj2');
    exit; // Exit if accessed directly
}

$activate_custom_login_page = get_option( 'init_custom_login_page_admin');
$activate_user_register_custom_page = get_option( 'activate_user_register_custom_page');

if ($activate_custom_login_page == 'true' || $activate_user_register_custom_page == 'true' ) {
    /**
     * Use the university CAS filter to allow only students or teachers to access the register form
     * See PHP CAS Documentation : https://wiki.jasig.org/display/casc/phpcas
     */
    add_filter('cas_portail', function() {
        //CAS FILTER
        //1) You need to download phpCas with composer : $composer require jasig/phpcas
        //2) You need to set up autoloads in composer.json after PSR4, next to App\\ add : "Cas\\" : "vendor/jasig/phpcas/cource/cas"
        //If there is some issues, they are wrtitten in the log file
        \phpCAS::setDebug('cas.log');
        //Connexion with the fcomte cas
        \phpCAS::client(CAS_VERSION_3_0, 'cas.univ-fcomte.fr', 443, 'cas/');
        //No SSL valisation
        \phpCAS::setNoCasServerValidation();
        //Require the user to sign in with the cas form in order to continue
        \phpCAS::forceAuthentication();
        $usernameCas = \phpCAS::getUser();

        return ($usernameCas);
    });
}