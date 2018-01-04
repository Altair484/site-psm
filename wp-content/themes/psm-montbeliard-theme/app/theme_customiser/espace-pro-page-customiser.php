<?php

namespace App;
use WP_Customize_Control;
use WP_Customize_Image_Control;
use WP_Customize_Upload_Control;
use App\theme_customiser\Wysiwyg_editor_custom_control;

/**
 * Theme customizer
 */

add_action('customize_register',  function( $wp_customize ) {

    /**---------------------------------------------- /*
     * ESPACE PRO - PANNEL SECTIONS SELECT
    /* ---------------------------------------------- */

    $wp_customize->add_panel( 'professional_page_sections_panel', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Page Espace Pro', 'textdomain' ),
        'description' => __( 'Administrez le contenu de la page Espace Pro', 'textdomain' ),
    ) );

    /**---------------------------------------------- /*
     * ESPACE PRO PAGE - SECTIONS
    /* ---------------------------------------------- */

    $wp_customize->add_section( 'professional_page_header_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Page Entête', 'textdomain' ),
        'description' => '',
        'panel' => 'professional_page_sections_panel',
    ) );

    $wp_customize->add_section( 'professional_page_presentation_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Page Entête', 'textdomain' ),
        'description' => '',
        'panel' => 'professional_page_sections_panel',
    ) );

    /**---------------------------------------------- /*
     * ESPACE PRO PAGE - HEADER SECTION FIELDS
    /* ---------------------------------------------- */

    //Image Licence
    $wp_customize->add_setting( 'professional_page_header_section_img', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => \App\App::get_image_page_header(),
    ));

    //Image Licence control
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'professional_page_header_section_img', array(
        'label' => 'Image de bannière',
        'section' => 'professional_page_header_section',
        'settings' => 'professional_page_header_section_img'
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('professional_page_header_section_img', [
        'selector' => '.professional_page_header_section_img',
        'render_callback' => function () {
            return get_theme_mod('professional_page_header_section_img');
        }
    ]);

    //Title
    $wp_customize->add_setting( 'professional_page_header_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Offres',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'professional_page_header_section_title', array(
        'type' => 'text',
        'section' => 'professional_page_header_section',
        'settings' => 'professional_page_header_section_title',
        'label' => 'Titre de la section "Entête"',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('professional_page_header_section_title', [
        'selector' => '.professional_page_header_section_title',
        'render_callback' => function () {
            return get_theme_mod('professional_page_header_section_title');
        }
    ]);

    //Sub Title
    $wp_customize->add_setting( 'professional_page_header_section_subtitle', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' =>  'Travaillez avec nos étudiants',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Sub Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'professional_page_header_section_subtitle', array(
        'type' => 'text',
        'section' => 'professional_page_header_section',
        'settings' => 'professional_page_header_section_subtitle',
        'label' => 'Sous titre de la section "Entête"',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('professional_page_header_section_subtitle', [
        'selector' => '.professional_page_header_section_subtitle',
        'render_callback' => function () {
            return get_theme_mod('professional_page_header_section_subtitle');
        }
    ]);

    /**---------------------------------------------- /*
     * ESPACE PRO PAGE - PRESENTATION SECTION FIELDS
    /* ---------------------------------------------- */


    //Title
    $wp_customize->add_setting( 'professional_page_presentation_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Lorem ipsum dolores',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'professional_page_presentation_section_title', array(
        'type' => 'text',
        'section' => 'professional_page_presentation_section',
        'settings' => 'professional_page_presentation_section_title',
        'label' => 'Titre de la section "Présentation"',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('professional_page_presentation_section_title', [
        'selector' => '.professional_page_presentation_section_title',
        'render_callback' => function () {
            return get_theme_mod('professional_page_presentation_section_title');
        }
    ]);

    //Text
    $wp_customize->add_setting( 'professional_page_presentation_section_text', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod'.
            'tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,'.
            'quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo'.
            'consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie'.
            'consequat, vel illum dolore eu feugiat nulla facilisis.',
        'transport' => 'postMessage',
    ));

    //Control Text
    $wp_customize->add_control( new Wysiwyg_editor_custom_control($wp_customize, 'professional_page_presentation_section_text', array(
        'section' => 'professional_page_presentation_section',
        'settings' => 'professional_page_presentation_section_text',
        'label' => 'Texte de la section "Présentation"'
    )));


    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('professional_page_presentation_section_text', [
        'selector' => '.professional_page_presentation_section_text',
        'render_callback' => function () {
            return get_theme_mod('professional_page_presentation_section_text');
        }
    ]);
});



