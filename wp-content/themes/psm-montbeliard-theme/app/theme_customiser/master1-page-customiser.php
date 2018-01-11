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
     * MASTER 1 - PANNEL SECTIONS SELECT
    /* ---------------------------------------------- */

    $wp_customize->add_panel( 'master1_page_sections_panel', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Page Master 1', 'textdomain' ),
        'description' => __( 'Administrez le contenu de la page Master', 'textdomain' ),
    ) );

    /**---------------------------------------------- /*
     * MASTER 1 PAGE - SECTIONS
    /* ---------------------------------------------- */

    $wp_customize->add_section( 'master_page_header_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Vidéo You tube', 'textdomain' ),
        'description' => '',
        'panel' => 'master1_page_sections_panel',
    ) );

    $wp_customize->add_section( 'master1_page_presentation_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Présentation', 'textdomain' ),
        'description' => '',
        'panel' => 'master1_page_sections_panel',
    ) );

    $wp_customize->add_section( 'master1_page_programme_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Programme', 'textdomain' ),
        'description' => 'Pour modifier les matières, unités d\'enseignement et descriptifs, rendez-vous <a href="'. admin_url().'edit.php?post_type=school-subject'.'">ici</a>',
        'panel' => 'master1_page_sections_panel',
    ) );

    $wp_customize->add_section( 'master1_page_projects_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Projets', 'textdomain' ),
        'description' => '',
        'panel' => 'master1_page_sections_panel',
    ) );

    $wp_customize->add_section( 'master_page_testimony_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Témoignages', 'textdomain' ),
        'description' => '',
        'panel' => 'master1_page_sections_panel',
    ) );

    /**---------------------------------------------- /*
     * MASTER COMMONS - HEADER YOU TUBE
    /* ---------------------------------------------- */
    //Video ID
    $wp_customize->add_setting( 'master_page_header_section_video_id', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'rY1iA0ulO-0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Video ID controller
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master_page_header_section_video_id', array(
        'type' => 'text',
        'section' => 'master_page_header_section',
        'settings' => 'master_page_header_section_video_id',
        'label' => 'ID de la vidéo You tube',
        'description' => '<a href="https://docs.joeworkman.net/rapidweaver/stacks/youtube/video-id" target="_blank">Qu\'est ce que l\'id d\'une vidéo You Tube?</a>'
    )));
    
    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_header_section_video_id', [
        'render_callback' => function () {
            return get_theme_mod('master_page_header_section_video_id');
        }
    ]);
    
    //Page Title
    $wp_customize->add_setting( 'master_page_header_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Master Produits et Sercices Multimédia',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Page Title controller
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master_page_header_section_title', array(
        'type' => 'text',
        'section' => 'master_page_header_section',
        'settings' => 'master_page_header_section_title',
        'label' => 'Titre de la page "Master"',
    )));

    
    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_header_section_title', [
        'selector' => '.master-page-section-header-title',
        'render_callback' => function () {
            return get_theme_mod('master_page_header_section_title');
        }
    ]);

    /**---------------------------------------------- /*
     * MASTER 1  - PRESENTATION SECTION FIELDS
    /* ---------------------------------------------- */

    //Title
    $wp_customize->add_setting( 'master1_page_presentation_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Le master en bref',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master1_page_presentation_section_title', array(
        'type' => 'text',
        'section' => 'master1_page_presentation_section',
        'settings' => 'master1_page_presentation_section_title',
        'label' => 'Titre de la section "Présentation"',
    )));

    //Text
    $wp_customize->add_setting( 'master1_page_presentation_section_text', array(
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
    $wp_customize->add_control( new Wysiwyg_editor_custom_control($wp_customize, 'master1_page_presentation_section_text', array(
        'section' => 'master1_page_presentation_section',
        'settings' => 'master1_page_presentation_section_text',
        'label' => 'Texte de la section "Présentation"'
    )));

    //Admission link
    $wp_customize->add_setting( 'master1_page_presentation_section_admission_link', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url'
    ) );

    //Button link control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master1_page_presentation_section_admission_link', array(
        'label'    => __( 'Url de la page d\'admission', 'textdomain' ),
        'settings' => 'master1_page_presentation_section_admission_link',
        'section'  => 'master1_page_presentation_section',
        'input_attrs' => array(
            'placeholder' => __( 'ex: http://site/admission.pdf' ),
        ),
        'type' => 'url',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master1_page_presentation_section_title', [
        'selector' => '.master1_page_presentation_section_title',
        'render_callback' => function () {
            return get_theme_mod('master1_page_presentation_section_title');
        }
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master1_page_presentation_section_text', [
        'selector' => '.master1_page_presentation_section_text',
        'render_callback' => function () {
            return get_theme_mod('master1_page_presentation_section_text');
        }
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master1_page_presentation_section_admission_link', [
        'selector' => '.master1_page_presentation_section_admission_link',
        'render_callback' => function () {
            return get_theme_mod('master1_page_presentation_section_admission_link');
        }
    ]);

    /**---------------------------------------------- /*
     * MASTER 1 PAGE - PROGRAMME
    /* ---------------------------------------------- */
    //Title
    $wp_customize->add_setting( 'master1_page_programme_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Programme',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master1_page_programme_section_title', array(
        'type' => 'text',
        'section' => 'master1_page_programme_section',
        'settings' => 'master1_page_programme_section_title',
        'label' => 'Titre de la section "Programmes"',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master1_page_programme_section_title', [
        'selector' => '.master1_page_programme_section_title',
        'render_callback' => function () {
            return get_theme_mod('master1_page_programme_section_title');
        }
    ]);

    /**---------------------------------------------- /*
     * MASTER 1 PAGE - PROJETS
    /* ---------------------------------------------- */
    //Title
    $wp_customize->add_setting( 'master1_page_projects_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Des formations orientées projets !',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master1_page_projects_section_title', array(
        'type' => 'text',
        'section' => 'master1_page_projects_section',
        'settings' => 'master1_page_projects_section_title',
        'label' => 'Titre de la section "Projets"',
    )));

    //Text
    $wp_customize->add_setting( 'master1_page_projects_section_text', array(
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
    $wp_customize->add_control( new Wysiwyg_editor_custom_control($wp_customize, 'master1_page_projects_section_text', array(
        'section' => 'master1_page_projects_section',
        'settings' => 'master1_page_projects_section_text',
        'label' => 'Texte de la section "Projets"'
    )));


    //Projet Rhizomes Page Dropdown Settings
    $wp_customize->add_setting( 'master1_page_projects_section_link_page_rhizomes', array(
        'default'           => '1866',
        'sanitize_callback' => 'absint'
    ) );

    //Projet Rhizomes Page control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master1_page_projects_section_link_page_rhizomes', array(
        'label'    => __( 'Page des projets', 'textdomain' ),
        'settings' => 'master1_page_projects_section_link_page_rhizomes',
        'section'  => 'master1_page_projects_section',
        'type' => 'dropdown-pages',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master1_page_projects_section_link_page_rhizomes', [
        'selector' => '.master1_page_projects_section_link_page_rhizomes',
        'render_callback' => function () {
            return get_theme_mod('master1_page_projects_section_link_page_rhizomes');
        }
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master1_page_projects_section_title', [
        'selector' => '.master1_page_projects_section_title',
        'render_callback' => function () {
            return get_theme_mod('master1_page_projects_section_title');
        }
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master1_page_projects_section_text', [
        'selector' => '.master1_page_projects_section_text',
        'render_callback' => function () {
            return get_theme_mod('master1_page_projects_section_text');
        }
    ]);

    /**---------------------------------------------- /*
     * MASTER COMMONS - TESTIMONY
    /* ---------------------------------------------- */

    //Title
    $wp_customize->add_setting( 'master_page_testimony_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Ils sont passés par PSM',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master_page_testimony_section_title', array(
        'type' => 'text',
        'section' => 'master_page_testimony_section',
        'settings' => 'master_page_testimony_section_title',
        'label' => 'Titre de la section "Témoignages"',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_testimony_section_title', [
        'selector' => '.master_page_testimony_section_title',
        'render_callback' => function () {
            return get_theme_mod('master_page_testimony_section_title');
        }
    ]);

    /**
     * FIRST STUDENT
     */

    //Quote First Student
    $wp_customize->add_setting( 'master_page_testimony_section_quote_first_student', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '"Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla"',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control quote First Student
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master_page_testimony_section_quote_first_student', array(
        'type' => 'textarea',
        'section' => 'master_page_testimony_section',
        'settings' => 'master_page_testimony_section_quote_first_student',
        'label' => 'Citation de l\'étudiant n°1',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_testimony_section_quote_first_student', [
        'selector' => '.master_page_testimony_section_quote_first_student',
        'render_callback' => function () {
            return get_theme_mod('master_page_testimony_section_quote_first_student');
        }
    ]);

    //name First Student
    $wp_customize->add_setting( 'master_page_testimony_section_name_first_student', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'First Student Name',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control name First Student
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master_page_testimony_section_name_first_student', array(
        'type' => 'text',
        'section' => 'master_page_testimony_section',
        'settings' => 'master_page_testimony_section_name_first_student',
        'label' => 'Nom de l\'étudiant n°1',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_testimony_section_name_first_student', [
        'selector' => '.master_page_testimony_section_name_first_student',
        'render_callback' => function () {
            return get_theme_mod('master_page_testimony_section_name_first_student');
        }
    ]);

    //Work First Student
    $wp_customize->add_setting( 'master_page_testimony_section_work_first_student', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'First Student Work',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control work First Student
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master_page_testimony_section_work_first_student', array(
        'type' => 'text',
        'section' => 'master_page_testimony_section',
        'settings' => 'master_page_testimony_section_work_first_student',
        'label' => 'Travail de l\'étudiant n°1',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_testimony_section_work_first_student', [
        'selector' => '.master_page_testimony_section_work_first_student',
        'render_callback' => function () {
            return get_theme_mod('master_page_testimony_section_work_first_student');
        }
    ]);

    //Promo First Student
    $wp_customize->add_setting( 'master_page_testimony_section_promo_first_student', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'First Student promo',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control promo First Student
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master_page_testimony_section_promo_first_student', array(
        'type' => 'text',
        'section' => 'master_page_testimony_section',
        'settings' => 'master_page_testimony_section_promo_first_student',
        'label' => 'Promo de l\'étudiant n°1',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_testimony_section_promo_first_student', [
        'selector' => '.master_page_testimony_section_promo_first_student',
        'render_callback' => function () {
            return get_theme_mod('master_page_testimony_section_promo_first_student');
        }
    ]);

    //Image First Student
    $wp_customize->add_setting( 'master_page_testimony_section_image_first_student', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri(). '/../dist/images/user_graduated.png',
    ));

    //Image Master control
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'master_page_testimony_section_image_first_student', array(
        'label' => 'Image de l\'étudiant n°1',
        'section' => 'master_page_testimony_section',
        'settings' => 'master_page_testimony_section_image_first_student'
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_testimony_section_image_first_student', [
        'selector' => '.master_page_testimony_section_image_first_student',
        'render_callback' => function () {
            return get_theme_mod('master_page_testimony_section_image_first_student');
        }
    ]);



    /**
     * SECOND STUDENT
     */

    //Quote Second Student
    $wp_customize->add_setting( 'master_page_testimony_section_quote_second_student', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '"Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla"',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control quote Second Student
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master_page_testimony_section_quote_second_student', array(
        'type' => 'textarea',
        'section' => 'master_page_testimony_section',
        'settings' => 'master_page_testimony_section_quote_second_student',
        'label' => 'Citation de l\'étudiant n°2',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_testimony_section_quote_second_student', [
        'selector' => '.master_page_testimony_section_quote_second_student',
        'render_callback' => function () {
            return get_theme_mod('master_page_testimony_section_quote_second_student');
        }
    ]);

    //name Second Student
    $wp_customize->add_setting( 'master_page_testimony_section_name_second_student', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Second Student Name',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control name Second Student
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master_page_testimony_section_name_second_student', array(
        'type' => 'text',
        'section' => 'master_page_testimony_section',
        'settings' => 'master_page_testimony_section_name_second_student',
        'label' => 'Nom de l\'étudiant n°2',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_testimony_section_name_second_student', [
        'selector' => '.master_page_testimony_section_name_second_student',
        'render_callback' => function () {
            return get_theme_mod('master_page_testimony_section_name_second_student');
        }
    ]);

    //Work Second Student
    $wp_customize->add_setting( 'master_page_testimony_section_work_second_student', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Second Student Work',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control work Second Student
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master_page_testimony_section_work_second_student', array(
        'type' => 'text',
        'section' => 'master_page_testimony_section',
        'settings' => 'master_page_testimony_section_work_second_student',
        'label' => 'Travail de l\'étudiant n°2',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_testimony_section_work_second_student', [
        'selector' => '.master_page_testimony_section_work_second_student',
        'render_callback' => function () {
            return get_theme_mod('master_page_testimony_section_work_second_student');
        }
    ]);

    //Promo Second Student
    $wp_customize->add_setting( 'master_page_testimony_section_promo_second_student', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Second Student promo',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control promo Second Student
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master_page_testimony_section_promo_second_student', array(
        'type' => 'text',
        'section' => 'master_page_testimony_section',
        'settings' => 'master_page_testimony_section_promo_second_student',
        'label' => 'Promo de l\'étudiant n°2',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_testimony_section_promo_second_student', [
        'selector' => '.master_page_testimony_section_promo_second_student',
        'render_callback' => function () {
            return get_theme_mod('master_page_testimony_section_promo_second_student');
        }
    ]);

    //Image second Student
    $wp_customize->add_setting( 'master_page_testimony_section_image_second_student', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri(). '/../dist/images/user_graduated.png',
    ));

    //Image Master control
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'master_page_testimony_section_image_second_student', array(
        'label' => 'Image de l\'étudiant n°2',
        'section' => 'master_page_testimony_section',
        'settings' => 'master_page_testimony_section_image_second_student'
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_testimony_section_image_second_student', [
        'selector' => '.master_page_testimony_section_image_second_student',
        'render_callback' => function () {
            return get_theme_mod('master_page_testimony_section_image_second_student');
        }
    ]);

    /**
     * NUMBERS in MIDDLE BOTTOM hexagone
     */

    //Number graduated
    $wp_customize->add_setting( 'master_page_testimony_section_number_graduated', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '500',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Number gratuated
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master_page_testimony_section_number_graduated', array(
        'type' => 'number',
        'section' => 'master_page_testimony_section',
        'settings' => 'master_page_testimony_section_number_graduated',
        'label' => 'Nombre de diplômés',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_testimony_section_number_graduated', [
        'selector' => '.master_page_testimony_section_number_graduated',
        'render_callback' => function () {
            return get_theme_mod('master_page_testimony_section_number_graduated');
        }
    ]);

    //Number years
    $wp_customize->add_setting( 'master_page_testimony_section_number_years', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '15',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Number gratuated
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'master_page_testimony_section_number_years', array(
        'type' => 'number',
        'section' => 'master_page_testimony_section',
        'settings' => 'master_page_testimony_section_number_years',
        'label' => 'Nombre d\'années',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('master_page_testimony_section_number_years', [
        'selector' => '.master_page_testimony_section_number_years',
        'render_callback' => function () {
            return get_theme_mod('master_page_testimony_section_number_years');
        }
    ]);
});


