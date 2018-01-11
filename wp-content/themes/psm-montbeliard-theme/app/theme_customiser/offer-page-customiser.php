<?php

namespace App;
use WP_Customize_Control;
use WP_Customize_Image_Control;
use WP_Customize_Upload_Control;
use App\theme_customiser\Wysiwyg_editor_custom_control;

//Protect the file to direct Access wia url
if ( ! defined( 'ABSPATH' )) {
    header('Location: http://tinyurl.com/ydek4vj2');
    exit; // Exit if accessed directly
}

/**
 * Theme customizer
 */

add_action('customize_register',  function( $wp_customize ) {

    /**---------------------------------------------- /*
     * OFFER - PANNEL SECTIONS SELECT
    /* ---------------------------------------------- */

    $wp_customize->add_panel( 'offer_page_sections_panel', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Page Offres', 'textdomain' ),
        'description' => __( 'Administrez le contenu de la page Offres', 'textdomain' ),
    ) );

    /**---------------------------------------------- /*
     * OFFER PAGE - SECTIONS
    /* ---------------------------------------------- */

    $wp_customize->add_section( 'offer_page_header_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Page Entête', 'textdomain' ),
        'description' => '',
        'panel' => 'offer_page_sections_panel',
    ) );

    /**---------------------------------------------- /*
     * OFFER PAGE - HEADER SECTION FIELDS
    /* ---------------------------------------------- */

    //Image Licence
    $wp_customize->add_setting( 'offer_page_header_section_img', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => \App\App::get_image_page_header('offer_page', 'jpg'),

    ));

    //Image Licence control
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'offer_page_header_section_img', array(
        'label' => 'Image de bannière',
        'section' => 'offer_page_header_section',
        'settings' => 'offer_page_header_section_img'
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('offer_page_header_section_img', [
        'selector' => '.offer_page_header_section_img',
        'render_callback' => function () {
            return get_theme_mod('offer_page_header_section_img');
        }
    ]);

    //Title
    $wp_customize->add_setting( 'offer_page_header_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Offres',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'offer_page_header_section_title', array(
        'type' => 'text',
        'section' => 'offer_page_header_section',
        'settings' => 'offer_page_header_section_title',
        'label' => 'Titre de la section "Entête"',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('offer_page_header_section_title', [
        'selector' => '.offer_page_header_section_title',
        'render_callback' => function () {
            return get_theme_mod('offer_page_header_section_title');
        }
    ]);

    //Sub Title
    $wp_customize->add_setting( 'offer_page_header_section_subtitle', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' =>  'Les dernières nouveautés de la formation',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Sub Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'offer_page_header_section_subtitle', array(
        'type' => 'text',
        'section' => 'offer_page_header_section',
        'settings' => 'offer_page_header_section_subtitle',
        'label' => 'Sous titre de la section "Entête"',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('offer_page_header_section_subtitle', [
        'selector' => '.offer_page_header_section_subtitle',
        'render_callback' => function () {
            return get_theme_mod('offer_page_header_section_subtitle');
        }
    ]);
});



