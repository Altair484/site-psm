<?php
/*
** Custom Login Page
*/

//Check if the administrator uses the custom login page
if (get_option('init_custom_login_page_admin') == 'false'){
	wp_redirect(wp_login_url());
}

//Check if the administrator wants to use the LDAP filter
if (get_option('activate_login_ldap_filter') == 'true'){
	apply_filters('cas_portail', '');
}

get_header();

//See login-user.php & AntiBruteForce.php
global $deny_login;
global $login_errors;

?>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<!-- Anti Brute force -->
<?php if($deny_login && get_option('activate_login_brute_force_protection') == 'true') {
	_e("Connexion bloquée. Réésayez dans " . (AntiBruteForce::getRemainingTime()) . ' minutes');
?>

<!-- Login form -->
<?php } elseif ( ! is_user_logged_in() ) { // Display WordPress login form:
	$args = array(
		'redirect' => admin_url(),
		'form_id' => 'login-form',
		'label_username' => __('Login'),
		'label_password' => __('Mot de passe'),
		'label_remember' => __('Se rappeler de moi'),
		'label_log_in' => __('Connexion'),
		'remember' => true
	);
	wp_login_form($args);?>

	<!-- Errors section -->
	<?php
		apply_filters( 'get_login_errors', 'get_login_errors');
		if (is_wp_error($login_errors)) {
			foreach ($login_errors->get_error_messages() as $error) {
				_e('<div>'.$error.'</div>');
			}
		}
	?>

	<!-- Trys left -->
	<?php if(!$deny_login && get_option('activate_login_brute_force_protection') == 'true') {
		_e('Tentatives restantes : ' . AntiBruteForce::getTrys());
	}
	?>

<!-- Already Logged in -->
<?php } else {
	wp_loginout( home_url() );
	echo " | ";
	wp_register('', '');
}
/*$mailResult = false;
$mailResult = wp_mail( 'jeff.jardon@gmail.com', 'test if mail works', 'hurray' );
echo $mailResult;*/

get_footer();?>

