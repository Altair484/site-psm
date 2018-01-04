<?php

//Check if the admin has activated the custom login page
$activate_custom_login_page = get_option( 'init_custom_login_page_admin');

if ($activate_custom_login_page == 'true') {

	//Include the Anti Brute Force Class
	require_once('AntiBruteForce.php');


	//Setting a global variable
	global $deny_login;
	$deny_login = AntiBruteForce::bruteCheck();

	/**
	 * Overriding login_init
	 * When a user try to get wp-login?action=login, redirect to our custom login page
	 */
	function redirect_custom_login_page()
	{
		$page = basename($_SERVER['REQUEST_URI']);

		//When the loaded page is wp-login.php we redirect the visitor to the custom login page
		if ($page == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
			//redirect to home_url/connexion/?login=blank
			wp_redirect(home_url() . "/connexion");
			exit;
		}
	}

	add_action('login_init', 'redirect_custom_login_page');


	/** Overriding authenticate
	 * Additional validation/authentication any time a user logs in to WordPress.
	 * ->Add an url argument when login fails
	 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/authenticate
	 */
	function override_authenticate($user, $username, $password)
	{
		if ($username == "" || $password == "") {
			AntiBruteForce::bruteCheck(true);
			//redirect to home_url/connexion/?login=blank
			wp_redirect(esc_url(add_query_arg('login', 'blank', home_url() . "/connexion")));
			exit;
		}
	}

	add_filter('authenticate', 'override_authenticate', 1, 3);


	/**Overriding wp_login_failed
	 * Fires after a user login has failed.
	 * ->Add an url argument when login and password missmatch
	 * @link https://developer.wordpress.org/reference/hooks/wp_login_failed/
	 */
	function override_wp_login_failed()
	{
		AntiBruteForce::bruteCheck(true);
		//redirect to home_url/connexion/?login=failed
		wp_redirect(esc_url(add_query_arg('login', 'failed', home_url() . "/connexion")));
		exit;
	}

	add_action('wp_login_failed', 'override_wp_login_failed');


	/**Overriding wp_logout
	 * Log the current user out, by destroying the current user session.
	 * ->Add an url argument when the user log off
	 */
	function override_wp_logout()
	{
		//redirect to home_url/connexion/?login=false
		wp_redirect(esc_url(add_query_arg('login', 'false', home_url() . "/connexion")));
		exit;
	}

	add_action('wp_logout', 'override_wp_logout');


	/** Custom function
	 *  Gather the login errors by checking the url parameters
	 */

	add_filter('get_login_errors', 'get_login_errors');
	function get_login_errors()
	{
		global $login_errors;
		$login_errors = new WP_Error();

		$page_showing = basename($_SERVER['REQUEST_URI']);
		if (strpos($page_showing, 'failed') !== false) {
			$login_errors->add('login-invalid-username', 'Login ou mot de passe incorrect.');
		} elseif (strpos($page_showing, 'blank') !== false) {
			$login_errors->add('login-blank-field', 'Veuillez remplir tous les champs.');
		}

		return $login_errors;
	}


	/*function override_wp_login() {
	}
	add_action('wp_login', 'override_wp_login');*/
}

?>
