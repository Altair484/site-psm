<?php

namespace App;

use Sober\Controller\Controller;

//Protect the file to direct Access wia url
if ( ! defined( 'ABSPATH' )) {
    header('Location: http://tinyurl.com/ydek4vj2');
    exit; // Exit if accessed directly
}
class Email_contents extends Controller
{
    private function get_sender(){
        return $sender = get_option('name');
    }

    private function get_header($userEmail){
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: '. Email_contents::get_sender() .' < '.$userEmail.'>' . "\r\n";
        return $headers;
    }

    private function get_signature(){
        $signature = '<p>- L\'équipe pédagogique et administrative du Master et Licence PSM.<br/>
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
                            Votre mot de passe : Vous seul le savez</p>
                            <p>Grâce à ce compte, vous aurez le droit de :</p>
                            <p>★ Publier des essais d\'articles qui ensuite pourront être approbés par les modérateurs du site.
                            C\'est pour vous l\'occasion de parler de l\'actualité de PSM, d\'une technologie vue en cours ou de ce qui vous passionne dans le multimédia.
                            Ceux qui s\'investiront à une rédaction de contenu validée par les modérateurs seront répompensés avec un bonus* de moyenne (~0.2 points).</p>
                            <p>★ Consulter les offres de stages/CDD/CDI. Vous aurez accès a un espace privilégié où les anciens de PSM et les entreprises déposeront leurs offres.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>'. Email_contents::get_signature() .'</td>
                    </tr>
                </table>
            </body>
        </html>';
        $headers = Email_contents::get_header($userEmail);

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
                            <p>Votre nouveau mot de passe est: '.$random_password.'<br/>
                            Pour le modifier, rendez-vous sur votre <a href="'.$redirection.'" target="_blank">espace personnel.</a></p>
                        </td>
                    </tr>
                    <tr>
                        <td>'. Email_contents::get_signature() .'</td>
                    </tr>
                </table>
            </body>
        </html>';

        $headers = Email_contents::get_header($userEmail);

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
                            <p>La formation Produits et Services Multimédia du département Multimédia de Montbéliard vous remercie d\'avoir déposé l\'offre : <b>'. get_the_title($post) .'</b><br/>
                            Votre offre est soumise à modération et sera visible par les étudiants après validation. Lorsque celle-ci sera acceptée, vous recevrez une notification par email<br/>
                            A compter de ce moment, l\'offre expirera dans un mois.</p>
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
                            <p>Une nouvelle offre de stage, CDI ou CDD a été déposée sur le site <a href="'. site_url().'">'. get_bloginfo() .'</a><br/>
                               L\'offre n\'est pas encore visible sur le site et demande une modération de votre part. Vous avez la possibilité d\'accepter ou non cette publication.<br/>
                               Pour se faire, merci de vous connecter ici <a href="'.$redirection.'" target="_blank">ici</a></a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>'. Email_contents::get_signature() .'</td>
                    </tr>
                </table>
            </body>
        </html>';

        //Envoie le mail à l'administrateur
        wp_mail(get_option('admin_email'), $subject, $messageForAdmin, $headers);

        //Envoi du mail à tous les contributeurs
        $args = array(
            'role' => 'Editor',
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
                            <p>Bonjour '. $name.',</p>
                            <p>Votre offre, <b>'.$post->post_title.'</b> vient juste d\'être approuvée sur <a href="'. site_url() . '" target="_blank">'. site_url() . '</a> et sera valide pendant une durée de <b>30 jours</b> jusqu\'au <b>'.$date_expire.'</b>.</p>
                            <p>Nous vous remercions d\'avoir choisi PSM pour le dépôt de votre offre.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>'. Email_contents::get_signature() .'</td>
                    </tr>
                </table>
            </body>
        </html>';
        $headers = Email_contents::get_header($email);
        wp_mail($email, $subject, $message,$headers);
    }
}


