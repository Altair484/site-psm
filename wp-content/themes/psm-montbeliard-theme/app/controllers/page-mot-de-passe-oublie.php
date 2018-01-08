<?php

namespace App;

use wpdb;
use Sober\Controller\Controller;

class Mot_de_passe_oublie extends Controller
{
    public static function forgot_password(){

        $error = '';
        $success = '';

        // check if we're in reset form
        if( isset( $_POST['action'] ) && 'reset' == $_POST['action'] )
        {
            $email = trim($_POST['user_email']);

            if( empty( $email ) ) {
                $error = 'Entrez une adresse e-mail valide';
            } else if( ! is_email( $email ) || ! email_exists( $email )) {
                $error = 'Adresse e-mail invalide';
            } else {

                $random_password = wp_generate_password( 12, false );
                $user = get_user_by( 'email', $email );

                $update_user = wp_update_user( array (
                        'ID' => $user->ID,
                        'user_pass' => $random_password
                    )
                );

                // if  update user return true then lets send user an email containing the new password
                if( $update_user ) {

                    {{ \App\Email_contents::password_lost_email($email,$random_password); }}
                    $success = 'Vérifiez vos mails pour obtenir votre nouveau mot de passe';

                } else {
                    $error = 'Quelque chose d\'anormal est survenu.';
                }

            }

            if( ! empty( $error ) )
                echo '<div class="form-errors"><div class="emoji">😯</div><div class="content-text"><p>'.$error.'</p></div></div>';

            if( ! empty( $success ) )
                echo '<div class="form-success"><div class="emoji">😉</div><div class="content-text"><p>'.$success.'</p></div></div>';
        }
    }
}

