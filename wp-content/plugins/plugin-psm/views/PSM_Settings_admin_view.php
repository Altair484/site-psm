<?php
include_once(dirname(__FILE__) . '/../class/PSM_Settings_class.php');

if(isset($_POST['PSM_Settings_update'])){
    $PSM_Settings = new PSM_Settings_class();
    $PSM_Settings->set_values($_POST);
}else if(isset($_POST['PSM_Settings_reset'])){
    $PSM_Settings_Reset = new PSM_Settings_Default_Settings();
    $PSM_Settings_Reset->set_default_values();
}

?>

<div id="wp-content">
    <div class="wrap">
        <h1>Configuration des paramètres su site PSM</h1>
        <div id="icon-options-general" class="icon32"> <br>
        </div>
        <?php if(isset($_POST['PSM_Settings_update'])){?>
            <div id="message" class="updated below-h2">
                <p>Mise à jour effectuée</p>
            </div>
        <?php } else if(isset($_POST['PSM_Settings_reset'])){?>
            <div id="message" class="updated below-h2">
                <p>Tous les paramètres ont été réinitialisés</p>
            </div>
        <?php }?>
        <div class="metabox-holder">
            <!--PSM_Settings Form Managment-->
            <form method="post" action="">
                <table class="form-table">
                    <!-- Activate custom login page-->
                    <tr>
                        <td colspan="2">
                            <h2><strong>Réglages page de connexion</strong></h2>
                            <p>Administrez les paramètres de la page de connexion</p>
                        </td>
                    </tr>

                    <tr>
                        <td scope="row" style="font-weight: 500">
                            <label for="init_custom_login_page_admin">Activer la page de connexion personalisée</label>
                        </td>
                        <td>
                            <input type="checkbox" id="init_custom_login_page_admin" name="init_custom_login_page_admin" class="regular-text"
                            <?php get_option('init_custom_login_page_admin') == 'true' ? _e('checked') : _e('') ?> value="true" />
                            <p class="description">En cas de problème avec cette page de connexion, décochez simplement cette case en attendant une solution technique.</p>
                        </td>
                    </tr>
                    <!-- END Activate custom login page-->

                    <!-- Activate custom ldap filter on login page-->
                    <tr>
                        <td scope="row" style="font-weight: 500">
                            <label for="activate_login_ldap_filter">Activer le filtre LDAP</label>
                        </td>
                        <td>
                            <input type="checkbox" id="activate_login_ldap_filter" name="activate_login_ldap_filter" class="regular-text"
                            <?php  get_option('activate_login_ldap_filter') == 'true' ? _e('checked') : _e('') ?> value="true" />
                            <p class="description">Seules les personnes possédant un compte universitaire peuvent se connecter.</p>
                        </td>
                    </tr>
                    <!-- END Activate custom ldap filter on login page-->

                    <!-- Activate brute force protection-->
                    <tr>
                        <td scope="row" style="font-weight: 500">
                            <label for="activate_login_brute_force_protection">Activer la protection anti force brute</label>
                        </td>
                        <td>
                            <input type="checkbox" id="activate_login_brute_force_protection" name="activate_login_brute_force_protection" class="regular-text"
                            <?php  get_option('activate_login_brute_force_protection') == 'true' ? _e('checked') : _e('') ?> value="true" />
                            <p class="description">Limitez les tentatives de connexions pour protéger le site. <a href="https://fr.wikipedia.org/wiki/Attaque_par_force_brute">Qu'est ce qu'une attaque force brute?</a></p>
                        </td>
                    </tr>
                    <!-- End brute force protection-->

                    <!-- Activate custom register page-->
                    <tr>
                        <td colspan="2">
                            <h2><strong>Réglages page d'inscription</strong></h2>
                            <p>Administrez les paramètres de la page de d'inscription</p>
                        </td>
                    </tr>

                    <tr>
                        <td scope="row" style="font-weight: 500">
                            <label for="activate_user_register_custom_page">Activer la page d'inscription personalisée</label>
                        </td>
                        <td>
                            <input type="checkbox" id="activate_user_register_custom_page" name="activate_user_register_custom_page" class="regular-text"
                            <?php get_option('activate_user_register_custom_page') == 'true' ? _e('checked') : _e('') ?> value="true" />
                            <p class="description">En cas de problème avec cette page d'inscription, décochez simplement cette case en attendant une solution technique.</p>
                        </td>
                    </tr>
                    <!-- END Activate custom register page-->

                    <!-- Activate custom ldap filter on register page-->
                    <tr>
                        <td scope="row" style="font-weight: 500">
                            <label for="activate_user_register_ldap_filter">Activer le filtre LDAP</label>
                        </td>
                        <td>
                            <input type="checkbox" id="activate_user_register_ldap_filter" name="activate_user_register_ldap_filter"
                            <?php  get_option('activate_user_register_ldap_filter') == 'true' ? _e('checked') : _e('') ?> value="true" />
                            <p class="description">Seules les personnes possédant un compte universitaire peuvent s'inscrire.</p>
                        </td>
                    </tr>
                    <!-- END Activate custom ldap filter on login page-->

                    <!-- Register key -->
                    <tr>
                        <td scope="row" style="font-weight: 500">
                            <label for="user_register_key">Clé d'inscription</label>
                        </td>
                        <td>
                            <input style="min-width:200px" type="text" id="user_register_key" name="user_register_key" value="<?php echo get_option('user_register_key') ?>"/>
                            <p class="description">Le champ ci-dessus est la clé d'inscription nécessaire aux personnels ou étudiants désirant s'inscrire sur le site. <br />
                                Celle-ci  doit être communiquée par mail et renouvelée chaque début d'année scolaire.</p>
                        </td>
                    </tr>
                    <!-- END Register key -->

                    <!-- Comments-->
                    <tr>
                        <td colspan="2">
                            <h2><strong>Commentaires</strong></h2>
                        </td>
                    </tr>

                    <tr>
                        <td scope="row" style="font-weight: 500">
                            <label for="activate_comments_managment">Activer la gestion des commentaires</label>
                        </td>
                        <td>
                            <input type="checkbox" id="activate_comments_managment" name="activate_comments_managment"
                                <?php  get_option('activate_comments_managment') == 'true' ? _e('checked') : _e('') ?> value="true" />
                            <p class="description">Si cette case est côchée,vous pourrez gérer les commentaires existant depuis l'administration. <br />
                            Cependant, il n'est pas prévu que les visiteurs puissent en poster.</p>
                        </td>
                    </tr>

                    <!-- Comments -->

                    <!-- Users rights-->
                    <tr>
                        <td colspan="2">
                            <h2><strong>Droits des utilisateurs</strong></h2>
                            <h4>Comptes éditeurs</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="activate_editor_access_to_job_offer">Activer l'accès aux offres de stages ou emploi</label>
                        </td>
                        <td>
                            <input type="checkbox" id="activate_editor_access_to_job_offer" name="activate_editor_access_to_job_offer"
                                <?php  get_option('activate_editor_access_to_job_offer') == 'true' ? _e('checked') : _e('') ?> value="true" />
                            <p class="description">En cochant cette case les comptes éditeurs peuvent valider, consulter, modifier et supprimer les offres de stage ou emploi de la rublrique "Postes".</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="activate_editor_access_to_school_subjects">Activer l'accès aux matières et contenus de formation</label>
                        </td>
                        <td>
                            <input type="checkbox" id="activate_editor_access_to_school_subjects" name="activate_editor_access_to_school_subjects"
                                <?php  get_option('activate_editor_access_to_school_subjects') == 'true' ? _e('checked') : _e('') ?> value="true" />
                            <p class="description">En cochant cette case les comptes éditeurs peuvent valider, consulter, modifier et supprimer les élements de la rubrique "Pédagogie".</p>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="activate_editor_access_to_projects">Activer l'accès aux projets rhizomes/pfe</label>
                        </td>
                        <td>
                            <input type="checkbox" id="activate_editor_access_to_projects" name="activate_editor_access_to_projects"
                                <?php  get_option('activate_editor_access_to_projects') == 'true' ? _e('checked') : _e('') ?> value="true" />
                            <p class="description">En cochant cette case les comptes éditeurs peuvent valider, consulter, modifier et supprimer les élements de la rubrique "Projets".</p>
                        </td>
                    </tr>

                    <!-- Plugins-->
                    <tr>
                        <td colspan="2">
                            <h2><strong>Plugins</strong></h2>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="activate_automatic_plugin_updates">Les plugins se mettent à jour automatiquement</label>
                        </td>
                        <td>
                            <input type="checkbox" id="activate_automatic_plugin_updates" name="activate_automatic_plugin_updates"
                                <?php  get_option('activate_automatic_plugin_updates') == 'true' ? _e('checked') : _e('') ?> value="true" />
                            <p class="description">En cochant cette case les plugins se metteront à jour automatiquement.</p>
                        </td>
                    </tr>

                    <!-- END Student rights-->

                    <!-- Theme-->
                    <!--<tr>
                        <td colspan="2">
                            <h2><strong>Thème</strong></h2>
                        </td>
                    </tr>

                    <tr>
                        <td scope="row" style="font-weight: 500">
                            <label for="activate_comments_managment">Réinitialiser les paramètres du thème</label>
                        </td>
                        <td>
                            <input type="checkbox" id="reset_theme_mods" name="reset_theme_mods" value="1" onclick="resetThemeMods()">
                            <p class="description">Si cette case est cochée, tous les paramètres <u>personnalisables</u> du site seront remis à zéro (images, textes, titres...).</p>
                            <p style="color: red;" class="description"><span class="dashicons dashicons-warning"></span> Cette action est irréversible</p>
                        </td>
                    </tr>-->

                    <!-- End Theme -->


                    <tr>
                        <th scope="row">&nbsp;</th>
                        <td style="padding-top:10px;  padding-bottom:10px;">
                           <input type="submit" name="PSM_Settings_update" value="Enregistrer" class="button-primary" />
                            <input type="submit" name="PSM_Settings_reset" value="Restaurer les paramètres par défaut" class="button-default" onclick="resetForm()"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!--Loading Jquery for the form-->
<script>
    function resetThemeMods() {
        confirm("Êtes-vous sûr de vouloir réinitialiser la personnalisation du thème ?\n" +
            "Pour que votre demande soit confirmée, n'oubliez pas d'enregistrer.");
    }
    function resetForm() {
        confirm("Êtes-vous sûr de vouloir réinitialiser les valeurs par défaut?");
    }
</script>
<?php //wp_enqueue_script('script-jquery', get_template_directory_uri() ."/../../../wp-content/plugins/PSM_Settings/assets/js/jquery-3.2.1.min.js", array('jquery'), null, true); ?>
<?php //wp_enqueue_script('script', get_template_directory_uri() ."/../../../wp-content/plugins/PSM_Settings/assets/js/script.js", array('jquery'), null, true); ?>
