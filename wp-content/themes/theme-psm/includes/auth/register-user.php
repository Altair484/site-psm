<?php

//Check if the admin has activated the custom register page
$activate_user_register_custom_page = get_option( 'activate_user_register_custom_page');

if ($activate_user_register_custom_page == 'true') {
	/**
	 * When a user try to get wp-login?action=register, redirect to our custom register page
	 */
	add_action('login_form_register', 'new_register_page');
	function new_register_page()
	{
		$location = get_site_url() . '/inscription';
		wp_redirect($location);
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
	 */
	add_action('init', 'create_new_user');
	function create_new_user()
	{
		if (!isset($_POST['djie3duhb3edub3u']) || !wp_verify_nonce($_POST['djie3duhb3edub3u'], 'create_user_form_submit')) {

		} else {
			global $reg_errors;
			$reg_errors = new WP_Error;

			$userName = ucfirst(strtolower(esc_attr($_POST['user_name'])));
			$userFirstName = ucfirst(strtolower(esc_attr($_POST['user_firstname'])));
			$userEmail = sanitize_email($_POST['user_email']);
			$userLogin = sanitize_user($_POST['user_login']);
			$userPassword = esc_attr($_POST['user_password']);
			$userPassword2 = esc_attr($_POST['user_password2']);
			$userFormation = sanitize_text_field($_POST['user_formation']);
			$registerKey = $_POST['auth_register_key'];

			if (empty($userName) || empty($userFirstName) || empty($userEmail) || empty($userLogin) || empty($userPassword) || empty($userPassword2) || empty($userFormation)) {
				$reg_errors->add('field', 'Un champ requis a été oublié');
			}

			if (preg_match('/[0-9]+/', $userName) || preg_match('/[0-9]+/', $userFirstName)) {
				$reg_errors->add('user_name_length', 'Votre nom ou prénom ne peuvent contenir de chiffres');
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
				$reg_errors->add('auth-register-key-missmatch', 'La clé d\'inscription n\'est pas valide. Veuillez consulter vos mails étudiants ou consulter la scolarité pour plus d\'informations.');
			}

			if (1 > count($reg_errors->get_error_messages())) {
				$userdata = array(
					'user_login' => $userLogin,
					'user_email' => $userEmail,
					'user_pass' => $userPassword,
					'first_name' => $userName,
					'last_name' => $userFirstName,
					'role' => 'contributor',
				);
				//Custom user fields
				$user_id = wp_insert_user($userdata);
				update_user_meta($user_id, 'user_formation', $userFormation);

				$location = get_site_url() . '/connexion';
				wp_redirect($location);
				exit;
			}
		}
	}
}

