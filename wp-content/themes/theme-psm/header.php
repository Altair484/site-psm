<!doctype html>
<!--[if IE 7]><html lang="fr-FR" class="ie7"><![endif]-->
<!--[if IE 8]><html lang="fr-FR" class="ie8"><![endif]-->
<!--[if IE 9]><html lang="fr-FR" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><html lang="fr-FR"><![endif]-->
<!--[if !IE]><html lang="fr-FR"><![endif]-->
<html <?php language_attributes();?> class="no-js no-svg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PSM</title>
    <!-- CSS -->
	<!-- Bootstrap core -->
	<!-- Font Awesome -->
	<!-- Custom styles -->
	<?php wp_head(); ?>
</head>
<body id="main-content">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<header class="header">
    <!-- Navigation Start -->
    <nav id="main-nav">
        <div class="burger" <?php if(is_admin_bar_showing()) {_e('style="top:46px;"');}; ?>>
            <a href="#" data-toggle="#main-nav" id="sidebar-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
        </div>
        <div id="sidebar" class="<?php if(is_home()||is_front_page() || is_page("master"))_e('is-home')?>" <?php if(is_admin_bar_showing()) {_e('style="top:32px;"');}; ?>>
            <div id="logo-psm-nav" >
                <img src="<?php _e(get_template_directory_uri().'/assets/img/svg/psm-logo.svg') ?>" alt="Logo du menu PSM">
            </div>
			<?php
            if ( !is_user_logged_in()) {
                wp_nav_menu(array(
                    'menu' => 'principal',
                    'depth' => 2,
                    'item_spacing' => ''
                ));
            }else{
                wp_nav_menu(array(
                    'menu' => 'principal-logged-in',
                    'depth' => 2,
                    'item_spacing' => ''
                ));
            }
            ;?>
        </div>
    </nav>
    <!-- Navigation End -->
</header>
<div class="container-fluid no-padding">


