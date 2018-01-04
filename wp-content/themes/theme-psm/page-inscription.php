<?php
/*
** Custom User Register Page
*/
//Check if the administrator uses the custom register page
if (get_option('activate_user_register_custom_page') == 'false'){
	wp_redirect(wp_registration_url());
}

//Check if the administrator wants to use the LDAP filter
if (get_option('activate_user_register_ldap_filter') == 'true'){
	$usernameCas = apply_filters('cas_portail', '');
}

//Check if logged in
if ( !is_user_logged_in()) {
    get_header();

    //Get formations informations (fpsm_terms/fpsm_terms_taxonomy)
    $formations = get_terms( array(
        'taxonomy' => 'formation',
        'hide_empty' => false,
    ));
//Users logged can not acces to this page
} else {
    wp_redirect( home_url() ); exit;
}

if(get_option('users_can_register')) { ?>
    <form action="" method="post" name="user_registeration">
        <input type="text" placeholder="Nom"  name='user_name' required="" value="<?php isset($_POST['user_name']) ? _e(esc_attr($_POST['user_name'])): _e('') ?>">
        <input type="text" placeholder="Prénom" name='user_firstname' required="" value="<?php isset($_POST['user_firstname']) ? _e(esc_attr($_POST['user_firstname'])): _e('') ?>">
        <input type="text" placeholder="Email" name='user_email' required="" value="<?php isset($_POST['user_email']) ? _e(esc_attr($_POST['user_email'])): _e('') ?>">
        <input type="text" placeholder="Login"  name='user_login' required="" readonly value="<?php isset($_POST['user_login']) ? _e(esc_attr($_POST['user_login'])): _e($usernameCas) ?>">
        <input type="password" placeholder="Mot de passe" name='user_password' required="">
        <input type="password" placeholder="Mot de passe" name='user_password2' required="">
        <select name="user_formation">
            <?php
                for ( $i = 0; $i < count($formations); $i++ ) {
                    echo ' <option value="' . ($i+1) .'">' . $formations[$i]->name . '</option>';
                }
            ?>
        </select>
		<input type="text" placeholder="Clé d'inscription" name='auth_register_key' required="" value="<?php isset($_POST['auth_register_key']) ? _e(esc_attr($_POST['auth_register_key'])): _e('') ?>">
        <label class="hvr-skew-backward">
            <?php wp_nonce_field( 'create_user_form_submit', 'djie3duhb3edub3u' ); ?>
            <input type="submit" value="Submit" name="submit">
        </label>
    </form>
    <?php if (is_wp_error( $reg_errors )) {
        foreach ($reg_errors->get_error_messages() as $error) {
            echo '<div>'.$error.'</div>';
        }
    }else if(count($reg_errors) == 0 && isset($reg_errors)){
        echo '<p>Inscription réussie ! <a href="'. home_url() .'/connexion">Connectez vous</a></p>';
    }
}?>

