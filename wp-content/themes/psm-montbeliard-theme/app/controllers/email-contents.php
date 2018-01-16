<?php

namespace App;

use Sober\Controller\Controller;

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
                            <p>Une nouvelle offre de stage, CDI ou CDD a été déposée sur le site <a href="'. site_url().'">'. get_bloginfo() .'</a><br/>
                               L\'offre n\'est pas encore visible sur le site et demande une modération de votre part. Vous avez la possibilité d\'accepter ou non cette publication.<br/>
                               Pour ce faire, merci de vous connecter <a href="'.$redirection.'" target="_blank">ici</a></a>
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
                            <p>Merci d\'avoir choisi PSM pour le dépôt de votre offre !</p>
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
