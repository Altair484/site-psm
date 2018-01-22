<?php

namespace App;

use Sober\Controller\Controller;

class Email_contents extends Controller
{
    private function get_sender(){
        return $sender = get_option('name');
    }

    private function get_header(){
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: '. Email_contents::get_sender() .' <contact@psm-montbeliard.fr>' . "\r\n";
        return $headers;
    }

    private function get_signature(){
        $signature = '<p>- L\'équipe pédagogique et administrative de la Licence et Master PSM.<br/>
                      Ceci est un message automatique, merci de ne pas y répondre.</p>
                      <p><a href="'. site_url() .'"></a></p>';
        return $signature;
    }

    public static function register_email($userFirstName, $userLastName, $userLogin, $userEmail){
        $subject = '['. get_bloginfo().']'.' Inscription réussie !';
        $message = '
        <html>
            <body>
                <table>
                    <tr>
                        <td>
                            <p>Bonjour '. $userFirstName . ' ' . $userLastName.',</p>
                            <p>Merci de vous être inscrit en tant qu\'étudiant sur le site de PSM.</p>
                            <p>Votre login : <b>'.$userLogin.'</b> ou <b>'.$userEmail.'</b>,<br/>
                            Votre mot de passe : Vous seul le savez !</p>
                            <p>Grâce à ce compte, vous aurez le droit de :</p>
                            <p>★ Proposer des brouillons d\'articles et les soumettre à une validation par les modérateurs du site. Ils pourront ensuite être publiés dans la section "Actualités" du site.
                            C\'est pour vous l\'occasion de parler de l\'actualité de PSM, d\'une technologie qui vous passionne particulièrement (vue en cours ou non) ou tout autre sujet en relation avec l\'univers du multimédia.
                            Ceux qui s\'investiront à une rédaction de contenu validée par les modérateurs seront récompensés avec un bonus* de moyenne (~0.2 points) !</p>
                            <p>★ Consulter des offres de stages/CDD/CDI adaptées aux étudiants de PSM. Vous aurez accès a un espace privilégié où les anciens de PSM et les entreprises déposeront leurs offres d\'emploi.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>'. Email_contents::get_signature() .'</td>
                    </tr>
                </table>
            </body>
        </html>';
        $headers = Email_contents::get_header();

        wp_mail($userEmail, $subject, $message, $headers);
    }

    public static function password_lost_email($userEmail, $random_password){
        $subject = '['. get_bloginfo().']'.' Votre nouveau mot de passe';
        $redirection = site_url().'/connexion/?redirection='. get_admin_url().'profile.php';
        $message = '
        <html>
            <body>
                <table>
                    <tr>
                        <td>
                            <p>Votre nouveau mot de passe provisoire est: '.$random_password.'<br/>
                            Pour le modifier, rendez-vous sur votre <a href="'.$redirection.'" target="_blank">espace personnel.</a></p>
                        </td>
                    </tr>
                    <tr>
                        <td>'. Email_contents::get_signature() .'</td>
                    </tr>
                </table>
            </body>
        </html>';

        $headers = Email_contents::get_header();

        wp_mail( $userEmail, $subject, $message, $headers );
    }

    public static function job_manager_offer_submited($post, $name, $email){
        $subject = '['. get_bloginfo().']'.' Votre offre a bien été envoyée !';
        $headers = Email_contents::get_header($email);
        //Message de mail pour l'entreprise
        $messageForOfferer = '
        <html>
            <body>
                <table>
                    <tr>
                        <td>
                            <p>Bonjour '. $name.',</p>
                            <p>La formation Produits et Services Multimédia de l\'UFR STGI de Montbéliard vous remercie d\'avoir déposé l\'offre "<b>'. get_the_title($post) .'</b>"<br/>
                            Votre proposition est soumise à modération et sera visible par les étudiants après validation. Lorsque celle-ci sera acceptée, vous recevrez un e-mail de notification.<br/>
                            L\'offre expirera dans un mois, à compter de ce moment.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>'. Email_contents::get_signature() .'</td>
                    </tr>
                </table>
            </body>
        </html>';

        wp_mail($email, $subject, $messageForOfferer, $headers);
        //Message de mail pour les administrateurs et les contributeurs
        $subject = '['. get_bloginfo().']'.' Une offre vient d\'être postée';
        $redirection = site_url().'/connexion/?redirection='. get_admin_url(). 'edit.php/?post_type=job_listing';
        $messageForAdmin = '
        <html>
            <body>
                <table>
                    <tr>
                        <td>
                            <p>Bonjour '. Email_contents::get_sender() .',</p>
                            <p>Une nouvelle offre de stage, CDI ou CDD a été déposée sur le site <a href="'. site_url().'">'. get_bloginfo() .'.</a><br/>
                               L\'offre n\'est pas encore visible sur le site et demande une modération de votre part. Vous avez la possibilité d\'accepter ou non cette publication.<br/>
                               Pour ce faire, merci de vous connecter <a href="'.$redirection.'" target="_blank">ici</a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>'. Email_contents::get_signature() .'</td>
                    </tr>
                </table>
            </body>
        </html>';

        //Envoi du mail à tous les éditeurs et admins
        $args = array(
            'role__in' => array('Administrator','Editor'),
            'orderby' => 'user_nicename',
            'order' => 'ASC'
        );
        $users = get_users($args);

        foreach ($users as $user) {
            wp_mail($user->user_email, $subject, $messageForAdmin, $headers);
        }
    }

    public static function job_manager_offer_accepted($post, $name, $email, $date_expire){
        $subject = '['. get_bloginfo().']'.' Votre offre est en ligne !';

        $message = '
        <html>
            <body>
                <table>
                    <tr>
                        <td>
                            <p>Bonjour '. get_option('admin_email').',</p>
                            <p>Votre offre, <b>'.$post->post_title.'</b> vient juste d\'être approuvée sur <a href="'. site_url() . '" target="_blank">'. site_url() . '</a> et sera valide pendant une durée de <b>'. get_option('job_manager_submission_duration',true).' jours</b> jusqu\'au <b>'.utf8_encode($date_expire).'</b>.</p>
                            <p>Merci d\'avoir choisi PSM pour le dépôt de votre offre !</p>
                        </td>
                    </tr>
                    <tr>
                        <td>'. Email_contents::get_signature() .'</td>
                    </tr>
                </table>
            </body>
        </html>';
        $headers = Email_contents::get_header();
        wp_mail($email, $subject, $message,$headers);
    }

    public static function new_pending_post($new_status, $old_status, $post){
        $name = get_the_author_meta('first_name',$post->post_author);
        $lastName = get_the_author_meta('last_name',$post->post_author);
        $studentEmail = get_the_author_meta('email',$post->post_author);
        $redirection = site_url().'/connexion/?redirection='. get_admin_url(). 'post.php?post='.$post->ID.'&action=edit';

        if ( $new_status === "pending" && $post->post_type == 'post') {
            $subject = '['. get_bloginfo().']'.' Un nouvel article attend votre validation !';

            $message = '
                <html>
                    <body>
                        <table>
                            <tr>
                                <td>
                                    <p>Bonjour '. get_option('admin_email').',</p>
                                    <p>L\'utilisateur '. $name . ' '. $lastName.' vient de poster un article nommé <b>"'. $post->post_title .'"</b> et celui-ci requiert une relecture de votre part avant d\'être publié.</p>
                                    <p>Pour le consulter, rendez-vous <a href="'.$redirection.'" target="_blank">ici</a></p>
                                </td>
                            </tr>
                            <tr>
                                <td>'. Email_contents::get_signature() .'</td>
                            </tr>
                        </table>
                    </body>
                </html>';
            $headers = Email_contents::get_header();

            $args = array(
                'role__in' => array('Administrator','Editor'),
                'orderby' => 'user_nicename',
                'order' => 'ASC'
            );
            $users = get_users($args);
            foreach ($users as $user) {
                wp_mail($user->user_email, $subject, $message, $headers);
            }
        }
    }

    public static function pending_post_validated($new_status, $old_status, $post){
        if ( $new_status === "publish" && $old_status === "pending" && $post->post_type == 'post') {
            $name = get_the_author_meta('first_name',$post->post_author);
            $lastName = get_the_author_meta('last_name',$post->post_author);
            $studentEmail = get_the_author_meta('email',$post->post_author);
            $redirection = site_url().'/connexion/?redirection='. get_site_url(). '/?p='.$post->ID;

            $subject = '['. get_bloginfo().']'.' Votre article a été validé !';

            $message = '
            <html>
                <body>
                    <table>
                        <tr>
                            <td>
                                <p>Bonjour '. $name .' '. $lastName.',</p>
                                <p>Votre article<b>"'. $post->post_title .'"</b> vient d\'être approbé par les administrateurs du site PSM. Nous vous remercions pour votre travail.</p>
                                <p>Pour le consulter, rendez-vous <a href="'.$redirection.'" target="_blank">ici.</a></p>
                            </td>
                        </tr>
                        <tr>
                            <td>'. Email_contents::get_signature() .'</td>
                        </tr>
                    </table>
                </body>
            </html>';
            $headers = Email_contents::get_header();

            wp_mail($studentEmail, $subject, $message, $headers);
        }
    }
}

add_action( 'transition_post_status', function($new_status, $old_status, $post) {
    Email_contents::new_pending_post($new_status, $old_status, $post);
}, 10, 3);



add_action( 'transition_post_status',function( $new_status, $old_status, $post ) {
    Email_contents::pending_post_validated($new_status, $old_status, $post);
}, 'pending_post_status', 10, 3 );

// Function to change email address

add_filter( 'wp_mail_from',function( $original_email_address ) {
    return 'contact@psm-montbeliard.fr';
});

// Function to change sender name
add_filter( 'wp_mail_from_name',function($original_email_from ) {
    return 'Formation PSM';
});

