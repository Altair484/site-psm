<?php

//LOGIN ADMIN SECTION DEFINITION
add_action('admin_init', 'admin_login_section');
function admin_login_section()
{
	add_settings_section(
		'login_section',
		__('Réglages page de connexion', 'textdomain'),
		'admin_login_section_callback',
		'general'
	);
}

function admin_login_section_callback( $args ) {
	echo '<p>Administrez les paramètres de la page de connexion</p>';
}

//USER REGISTER ADMIN SECTION DEFINITION
add_action('admin_init', 'admin_user_register_section');
function admin_user_register_section()
{
	add_settings_section(
		'user_register_section',
		__('Réglages page d\'inscription', 'textdomain'),
		'admin_user_register_section_callback',
		'general'
	);
}

function admin_user_register_section_callback( $args ) {
	echo '<p>Administrez les paramètres de la page de d\'inscription</p>';
}

//
//  LOGIN PAGE FIELDS
//

// LOGIN PAGE ACTIVATION
/**
 *  This function add a new field in Admin -> Réglages -> Général -> Réglages page de connexion
 *  Field : Activer la page de connexion personalisée
 *  If checked, this box will use our custom login page
 *  If not, wordpress will use it's traditionnal wp-login.php file for logins
 */
function init_custom_login_page_admin()
{
	register_setting('general', 'init_custom_login_page_admin', 'esc_attr');
	add_settings_field('init_custom_login_page_admin', '<label for="custom_login_page">'.__('Activer la page de connexion personalisée' , 'init_custom_login_page_admin' ).'</label>' , 'show_custom_login_activate_field', 'general', 'login_section');
}

/**
 * This function create an option set the default value of the field if it does not exist
 * Then try to get its value if the option is already stored into the database
 * Then write the input field in the administration
 */
function show_custom_login_activate_field()
{
	//If the option doesn't exist, we create it with the default value "true"
	if (!get_option( 'init_custom_login_page_admin')){
		add_option( 'init_custom_login_page_admin', 'true');
	}

	//If the option is empty, we set it's value to "false"
	if(get_option('init_custom_login_page_admin') == ''){
		update_option('init_custom_login_page_admin', 'false');
	};

	$value = get_option( 'init_custom_login_page_admin');?>
	<input type="checkbox" id="init_custom_login_page_admin" name="init_custom_login_page_admin" <?php $value == 'true' ? _e('checked') : _e('') ?> value="true" />
	<p class="description">En cas de problème avec cette page de connexion, décochez simplement cette case en attendant une solution technique.</p>
<?php }
add_filter('admin_init', 'init_custom_login_page_admin');


// LOGIN PAGE ACTIVATE LDAP FILTER
/**
 *  This function add a new field in Admin -> Réglages -> Général -> Réglages page de connexion
 *  Field : Activer le filtre LDAP
 *  If checked, users only users with university accounts can login
 *  If not, everyone can access to this page
 */
function activate_login_ldap_filter()
{
	register_setting('general', 'activate_login_ldap_filter', 'esc_attr');
	add_settings_field('activate_login_ldap_filter', '<label for="custom_login_page">'.__('Activer le filtre LDAP' , 'activate_login_ldap_filter' ).'</label>' , 'show_login_ldap_filter_field', 'general', 'login_section');
}

/**
 * This function create an option set the default value of the field if it does not exist
 * Then try to get its value if the option is already stored into the database
 * Then write the input field in the administration
 */
function show_login_ldap_filter_field()
{
	//If the option doesn't exist, we create it with the default value "true"
	if (!get_option( 'activate_login_ldap_filter')){
		add_option( 'activate_login_ldap_filter', 'true');
	}

	//If the option is empty, we set it's value to "false"
	if(get_option('activate_login_ldap_filter') == ''){
		update_option('activate_login_ldap_filter', 'false');
	};

	$value = get_option( 'activate_login_ldap_filter');?>
	<input type="checkbox" id="activate_login_ldap_filter" name="activate_login_ldap_filter" <?php $value == 'true' ? _e('checked') : _e('') ?> value="true" />
	<p class="description">Seules les personnes possédant un compte universitaire peuvent se connecter.</p>
<?php }
add_filter('admin_init', 'activate_login_ldap_filter');


// LOGIN PAGE ACTIVATE ANTI-BRUTE FORCE PROTECTION
/**
 *  This function add a new field in Admin -> Réglages -> Général -> Réglages page de connexion
 *  Field : Activer la protection anti brute force
 *  If checked, visitors only have few trys to enter their logins/passwords
 *  If not, no limitation
 */
function activate_login_brute_force_protection()
{
	register_setting('general', 'activate_login_brute_force_protection', 'esc_attr');
	add_settings_field('activate_login_brute_force_protection', '<label for="activate_login_brute_force_protection">'.__('Activer la protection anti force brute' , 'activate_login_brute_force_protection' ).'</label>' , 'show_brute_force_protection_field', 'general', 'login_section');
}

/**
 * This function create an option set the default value of the field if it does not exist
 * Then try to get its value if the option is already stored into the database
 * Then write the input field in the administration
 */
function show_brute_force_protection_field()
{
	//If the option doesn't exist, we create it with the default value "true"
	if (!get_option( 'activate_login_brute_force_protection')){
		add_option( 'activate_login_brute_force_protection', 'true');
	}

	//If the option is empty, we set it's value to "false"
	if(get_option('activate_login_brute_force_protection') == ''){
		update_option('activate_login_brute_force_protection', 'false');
	};

	$value = get_option( 'activate_login_brute_force_protection'); ?>
	<input type="checkbox" id="activate_login_brute_force_protection" name="activate_login_brute_force_protection" <?php $value == 'true' ? _e('checked') : _e('') ?> value="true" />
	<p class="description">Limitez les tentatives de connexions pour protéger le site. <a href="https://fr.wikipedia.org/wiki/Attaque_par_force_brute">Qu'est ce qu'une attaque force brute?</a></p>
<?php }
add_filter('admin_init', 'activate_login_brute_force_protection');


//
//  USER REGISTER PAGE FIELDS
//

// USER REGISTER PAGE ACTIVATION
/**
 *  This function add a new field in Admin -> Réglages -> Général -> Réglages page d'inscription
 *  Field : Activer la page d'inscription personalisée
 *  If checked, this box will use our custom register page
 *  If not, wordpress will use it's traditionnal wp-login.php?action=register
 */
function activate_user_register_custom_page()
{
	register_setting('general', 'activate_user_register_custom_page', 'esc_attr');
	add_settings_field('activate_user_register_custom_page', '<label for="activate_user_register_custom_page">'.__('Activer la page d\'inscription personalisée' , 'activate_user_register_custom_page' ).'</label>' , 'show_user_register_custom_page_field', 'general', 'user_register_section');
}

/**
 * This function create an option set the default value of the field if it does not exist
 * Then try to get its value if the option is already stored into the database
 * Then write the input field in the administration
 */
function show_user_register_custom_page_field()
{
	//If the option doesn't exist, we create it with the default value "true"
	if (!get_option( 'activate_user_register_custom_page')){
		add_option( 'activate_user_register_custom_page', 'true');
	}

	//If the option is empty, we set it's value to "false"
	if(get_option('activate_user_register_custom_page') == ''){
		update_option('activate_user_register_custom_page', 'false');
	};

	$value = get_option( 'activate_user_register_custom_page');?>

	<input type="checkbox" id="activate_user_register_custom_page" name="activate_user_register_custom_page" <?php $value == 'true' ? _e('checked') : _e('') ?> value="true" />
	<p class="description">En cas de problème avec cette page de connexion, décochez simplement cette case en attendant une solution technique.</p>
<?php }
add_filter('admin_init', 'activate_user_register_custom_page');

// USER REGISTER LDAP FILTER
/**
 *  This function add a new field in Admin -> Réglages -> Général -> Réglages page de d'inscription
 *  Field : Activer le filtre LDAP
 *  If checked, users only users with university accounts can register
 *  If not, everyone can register
 */
function activate_user_register_ldap_filter()
{
	register_setting('general', 'activate_user_register_ldap_filter', 'esc_attr');
	add_settings_field('activate_user_register_ldap_filter', '<label for="auth_register_key">'.__('Activer le filtre LDAP' , 'auth_register_key' ).'</label>' , 'show_user_register_ldap_filter_field', 'general', 'user_register_section');
}

/**
 * This function create an option set the default value of the field if it does not exist
 * Then try to get its value if the option is already stored into the database
 * Then write the input field in the administration
 */
function show_user_register_ldap_filter_field()
{
	//If the option doesn't exist, we create it with the default value "true"
	if (!get_option( 'activate_user_register_ldap_filter')){
		add_option( 'activate_user_register_ldap_filter', 'true');
	}

	//If the option is empty, we set it's value to "false"
	if(get_option('activate_user_register_ldap_filter') == ''){
		update_option('activate_user_register_ldap_filter', 'false');
	};

	$value = get_option( 'activate_user_register_ldap_filter');?>

	<input type="checkbox" id="activate_user_register_ldap_filter" name="activate_user_register_ldap_filter" <?php $value == 'true' ? _e('checked') : _e('') ?> value="true" />
	<p class="description">Seules les personnes possédant un compte universitaire peuvent se connecter.</p>
<?php }
add_filter('admin_init', 'activate_user_register_ldap_filter');

// USER REGISTER KEY
/**
 *  This function add a new field in Admin -> Réglages -> Général -> Réglages page d'inscription
 *  Field : Clé d'inscription
 *  The register key is a protection to restrict registration to only trusted users.
 */
function register_auth_register_key_field()
{
	register_setting('general', 'auth_register_key', 'esc_attr');
	add_settings_field('auth_register_key', '<label for="auth_register_key">'.__('Clé d\'inscription' , 'auth_register_key' ).'</label>' , 'print_auth_register_key_field', 'general', 'user_register_section');
}

/**
 * This function create an option set the default value of the field if it does not exist
 * Then try to get its value if the option is already stored into the database
 * Then write the input field in the administration
 */
function print_auth_register_key_field()
{
	if (!get_option( 'auth_register_key')){
		add_option( 'auth_register_key', 'iDcAc8kJ2fz)YmQv2QFhb0nu');
	};
	$value = get_option( 'auth_register_key');

	echo '<input style="min-width:200px" type="text" id="auth_register_key" name="auth_register_key" value="' . $value . '"/>';
	echo '<p class="description">Le champ ci-dessus est la clé d\'inscription nécessaire aux personnels ou étudiants désirant s\'inscrire sur le site. <br />
		  Celle-ci  doit être communiquée par mail et renouvelée chaque début d\'année scolaire.</p>';
}
add_filter('admin_init', 'register_auth_register_key_field');



