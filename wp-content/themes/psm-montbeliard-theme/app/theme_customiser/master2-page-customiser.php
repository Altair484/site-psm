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
     * MASTER 2 - PANNEL SECTIONS SELECT
    /* ---------------------------------------------- */

    $wp_customize->add_panel( 'master2_page_sections_panel', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Page Master 2', 'textdomain' ),
        'description' => __( 'Administrez le contenu de la page Master', 'textdomain' ),
    ) );

    /**---------------------------------------------- /*
     * MASTER 2 PAGE - SECTIONS
    /* ---------------------------------------------- */

    $wp_customize->add_section( 'master2_page_presentation_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Présentation', 'textdomain' ),
        'description' => '',
        'panel' => 'master2_page_sections_panel',
    ) );

    $wp_customize->add_section( 'master2_page_programme_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Programme', 'textdomain' ),
        'description' => 'Pour modifier les matières, unités d\'enseignement et descriptifs, rendez-vous <a href="'. admin_url().'edit.php?post_type=school-subject'.'">ici</a>',
        'panel' => 'master2_page_sections_panel',
    ) );

    $wp_customize->add_section( 'master2_page_projects_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Projets', 'textdomain' ),
        'description' => '',
        'panel' => 'master2_page_sections_panel',
    ) );

    /**---------------------------------------------- /*
     * MASTER 2  - PRESENTATION SECTION FIELDS
    /* ---------------------------------------------- */

    //Title
    $wp_customize->add_setting( 'master2_page_presentation_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Le master en bref',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master2_page_presentation_section_title', array(
        'type' => 'text',
        'section' => 'master2_page_presentation_section',
        'settings' => 'master2_page_presentation_section_title',
        'label' => 'Titre de la section "Présentation"',
    )));

    //Text
    $wp_customize->add_setting( 'master2_page_presentation_section_text', array(
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
    $wp_customize->add_control( new Wysiwyg_editor_custom_control($wp_customize, 'master2_page_presentation_section_text', array(
        'section' => 'master2_page_presentation_section',
        'settings' => 'master2_page_presentation_section_text',
        'label' => 'Texte de la section "Présentation"'
    )));

    //Admission link
    $wp_customize->add_setting( 'master2_page_presentation_section_admission_link', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url'
    ) );

    //Button link control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master2_page_presentation_section_admission_link', array(
        'label'    => __( 'Url de la page d\'admission', 'textdomain' ),
        'settings' => 'master2_page_presentation_section_admission_link',
        'section'  => 'master2_page_presentation_section',
        'input_attrs' => array(
            'placeholder' => __( 'ex: http://site/admission.pdf' ),
        ),
        'type' => 'url',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master2_page_presentation_section_title', [
        'selector' => '.master2_page_presentation_section_title',
        'render_callback' => function () {
            return get_theme_mod('master2_page_presentation_section_title');
        }
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master2_page_presentation_section_text', [
        'selector' => '.master2_page_presentation_section_text',
        'render_callback' => function () {
            return get_theme_mod('master2_page_presentation_section_text');
        }
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master2_page_presentation_section_admission_link', [
        'selector' => '.master2_page_presentation_section_admission_link',
        'render_callback' => function () {
            return get_theme_mod('master2_page_presentation_section_admission_link');
        }
    ]);

    /**---------------------------------------------- /*
     * MASTER 2 PAGE - PROGRAMME
    /* ---------------------------------------------- */
    //Title
    $wp_customize->add_setting( 'master2_page_programme_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Programme',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master2_page_programme_section_title', array(
        'type' => 'text',
        'section' => 'master2_page_programme_section',
        'settings' => 'master2_page_programme_section_title',
        'label' => 'Titre de la section "Programmes"',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master2_page_programme_section_title', [
        'selector' => '.master2_page_programme_section_title',
        'render_callback' => function () {
            return get_theme_mod('master2_page_programme_section_title');
        }
    ]);

    /**---------------------------------------------- /*
     * MASTER 2 PAGE - PROJETS
    /* ---------------------------------------------- */
    //Title
    $wp_customize->add_setting( 'master2_page_projects_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Des formations orientées projets !',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master2_page_projects_section_title', array(
        'type' => 'text',
        'section' => 'master2_page_projects_section',
        'settings' => 'master2_page_projects_section_title',
        'label' => 'Titre de la section "Projets"',
    )));

    //Text
    $wp_customize->add_setting( 'master2_page_projects_section_text', array(
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
    $wp_customize->add_control( new Wysiwyg_editor_custom_control($wp_customize, 'master2_page_projects_section_text', array(
        'section' => 'master2_page_projects_section',
        'settings' => 'master2_page_projects_section_text',
        'label' => 'Texte de la section "Projets"'
    )));


    //Projet Projet fin d'études Page Dropdown Settings
    $wp_customize->add_setting( 'master2_page_projects_section_link_page_pfe', array(
        'default'           => '1868',
        'sanitize_callback' => 'absint'
    ) );

    //Projet Projet fin d'études Page control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master2_page_projects_section_link_page_pfe', array(
        'label'    => __( 'Page des projets', 'textdomain' ),
        'settings' => 'master2_page_projects_section_link_page_pfe',
        'section'  => 'master2_page_projects_section',
        'type' => 'dropdown-pages',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master2_page_projects_section_link_page_pfe', [
        'selector' => '.master2_page_projects_section_link_page_pfe',
        'render_callback' => function () {
            return get_theme_mod('master2_page_projects_section_link_page_pfe');
        }
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master2_page_projects_section_title', [
        'selector' => '.master2_page_projects_section_title',
        'render_callback' => function () {
            return get_theme_mod('master2_page_projects_section_title');
        }
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master2_page_projects_section_text', [
        'selector' => '.master2_page_projects_section_text',
        'render_callback' => function () {
            return get_theme_mod('master2_page_projects_section_text');
        }
    ]);
});
