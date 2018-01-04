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
     * PROJETS PFE - PANNEL SECTIONS SELECT
    /* ---------------------------------------------- */

    $wp_customize->add_panel( 'projets_pfe_page_sections_panel', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Page Projets de fin d\'études', 'textdomain' ),
        'description' => __( 'Administrez le contenu de la page Projets de fin d\'études', 'textdomain' ),
    ) );

    /**---------------------------------------------- /*
     * PROJETS PFE PAGE - SECTIONS
    /* ---------------------------------------------- */

    $wp_customize->add_section( 'projets_pfe_page_header_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Entête', 'textdomain' ),
        'description' => '',
        'panel' => 'projets_pfe_page_sections_panel',
    ) );

    $wp_customize->add_section( 'projets_pfe_page_presentation_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Presentation', 'textdomain' ),
        'description' => '',
        'panel' => 'projets_pfe_page_sections_panel',
    ) );

    $wp_customize->add_section( 'projets_pfe_page_projets_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Projets', 'textdomain' ),
        'description' => '',
        'panel' => 'projets_pfe_page_sections_panel',
    ) );


    /**---------------------------------------------- /*
     * PROJETS PFE PAGE - HEADER SECTION FIELDS
    /* ---------------------------------------------- */
    //Image Licence
    $wp_customize->add_setting( 'projets_pfe_page_header_section_img', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => \App\App::get_image_page_header('projets_pfe', 'jpg'),
    ));

    //Image Licence control
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'projets_pfe_page_header_section_img', array(
        'label' => 'Image de bannière',
        'section' => 'projets_pfe_page_header_section',
        'settings' => 'projets_pfe_page_header_section_img'
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('projets_pfe_page_header_section_img', [
        'selector' => '.projets_pfe_page_header_section_img',
        'render_callback' => function () {
            return get_theme_mod('projets_pfe_page_header_section_img');
        }
    ]);

    //Title
    $wp_customize->add_setting( 'projets_pfe_page_header_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Projets de fin d\'études',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'projets_pfe_page_header_section_title', array(
        'type' => 'text',
        'section' => 'projets_pfe_page_header_section',
        'settings' => 'projets_pfe_page_header_section_title',
        'label' => 'Titre de la section "Entête"',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('projets_pfe_page_header_section_title', [
        'selector' => '.projets_pfe_page_header_section_title',
        'render_callback' => function () {
            return get_theme_mod('projets_pfe_page_header_section_title');
        }
    ]);

    //Sub Title
    $wp_customize->add_setting( 'projets_pfe_page_header_section_subtitle', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Master 2 PSM',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Sub Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'projets_pfe_page_header_section_subtitle', array(
        'type' => 'text',
        'section' => 'projets_pfe_page_header_section',
        'settings' => 'projets_pfe_page_header_section_subtitle',
        'label' => 'Sous titre de la section "Entête"',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('projets_pfe_page_header_section_subtitle', [
        'selector' => '.projets_pfe_page_header_section_subtitle',
        'render_callback' => function () {
            return get_theme_mod('projets_pfe_page_header_section_subtitle');
        }
    ]);


    /**---------------------------------------------- /*
     * PROJETS PFE PAGE - PRESENTATION SECTION FIELDS
    /* ---------------------------------------------- */
    //Title
    $wp_customize->add_setting( 'projets_pfe_page_presentation_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Lorem ipsum dolores',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'projets_pfe_page_presentation_section_title', array(
        'type' => 'text',
        'section' => 'projets_pfe_page_presentation_section',
        'settings' => 'projets_pfe_page_presentation_section_title',
        'label' => 'Titre de la section "Présentation"',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('projets_pfe_page_presentation_section_title', [
        'selector' => '.projets_pfe_page_presentation_section_title',
        'render_callback' => function () {
            return get_theme_mod('projets_pfe_page_presentation_section_title');
        }
    ]);

    //Text
    $wp_customize->add_setting( 'projets_pfe_page_presentation_section_text', array(
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
    $wp_customize->add_control( new Wysiwyg_editor_custom_control($wp_customize, 'projets_pfe_page_presentation_section_text', array(
        'section' => 'projets_pfe_page_presentation_section',
        'settings' => 'projets_pfe_page_presentation_section_text',
        'label' => 'Texte de la section "Présentation"'
    )));


    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('projets_pfe_page_presentation_section_text', [
        'selector' => '.projets_pfe_page_presentation_section_text',
        'render_callback' => function () {
            return get_theme_mod('projets_pfe_page_presentation_section_text');
        }
    ]);

    //Projet Projet fin d'études Page Dropdown Settings
    $wp_customize->add_setting( 'projets_pfe_page_presentation_section_link_page_master_1', array(
        'default'           => '4&formation=m2',
        'sanitize_callback' => 'absint'
    ) );

    //Projet Projet fin d'études Page control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'projets_pfe_page_presentation_section_link_page_master_1', array(
        'label'    => __( 'Page des projets', 'textdomain' ),
        'settings' => 'projets_pfe_page_presentation_section_link_page_master_1',
        'section'  => 'projets_pfe_page_presentation_section',
        'type' => 'dropdown-pages',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('projets_pfe_page_presentation_section_link_page_master_1', [
        'selector' => '.projets_pfe_page_presentation_section_link_page_master_1',
        'render_callback' => function () {
            return get_theme_mod('projets_rhizome_page_presentation_section_link_page_master_1');
        }
    ]);


    /**---------------------------------------------- /*
     * PROJETS PFE PAGE - PROJETS SECTION FIELDS
    /* ---------------------------------------------- */

    //Number years
    $wp_customize->add_setting( 'projets_pfe_page_projects_section_years_dropdown_list', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '6',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Number gratuated
    $yearNow = date('Y');
    $lastYear = date('Y')-1;
    $twoYearsAgo =date('Y')-2;
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'projets_pfe_page_projects_section_years_dropdown_list', array(
        'type' => 'number',
        'section' => 'projets_pfe_page_projets_section',
        'settings' => 'projets_pfe_page_projects_section_years_dropdown_list',
        'label' => 'Nombre d\'années à afficher dans la liste déroulante',
        'description' => 'Ex: Si le chiffre 3 est coché, les années ' . $yearNow . ', ' . $lastYear . ', ' . $twoYearsAgo .' seront affichées dans la liste déroulante.'
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('projets_pfe_page_projects_section_years_dropdown_list', [
        'selector' => '.projets_pfe_page_projects_section_years_dropdown_list',
        'render_callback' => function () {
            return get_theme_mod('projets_pfe_page_projects_section_years_dropdown_list');
        }
    ]);
});





