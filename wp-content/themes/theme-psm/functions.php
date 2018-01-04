<?php
/**
 * Scripts and Styles loads and more setup
 */
require_once(__DIR__ . '/includes/config/theme-setup.php');

/**
 * Custom Post Types
 */
require_once(__DIR__ . '/includes/post-type/projects-post-types.php');
require_once(__DIR__ . '/includes/post-type/compagny-post-types.php');
require_once(__DIR__ . '/includes/post-type/school-subject-post-type.php');

/**
 * wp-job-manager plugin - Customizing and overriding
*/
require_once(__DIR__ . '/includes/wp-job-manager/customize-wp-job-manager.php');

/**
 * Users Roles
 */
require_once(__DIR__ . '/includes/users-managment/user-roles.php');

/**
 * Theme administration
 */
require_once(__DIR__ . '/includes/theme-customize/home-page-customizer.php');

/**
 * Register and Login custom page
 */
require_once(__DIR__ . '/includes/auth/register-user.php');
require_once (__DIR__ . '/includes/auth/login-user.php');
require_once (__DIR__ . '/includes/auth/cas-filter.php');

/**
 * Widgets
 */
require_once(__DIR__ . '/includes/widgets/widgets.php');


add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn-psm"';
}






