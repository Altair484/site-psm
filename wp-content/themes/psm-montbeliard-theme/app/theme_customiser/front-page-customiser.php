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
     * HOMEPAGE - PANNEL SECTIONS SELECT
    /* ---------------------------------------------- */

    $wp_customize->add_panel( 'home_page_sections_panel', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Page d\'accueil', 'textdomain' ),
        'description' => __( 'Description of what this panel does.', 'textdomain' ),
    ) );

    $wp_customize->add_section( 'Sandbox', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Sandbox', 'textdomain' ),
        'description' => '',
    ) );

    /**---------------------------------------------- /*
     * HOMEPAGE - SECTIONS
    /* ---------------------------------------------- */

    $wp_customize->add_section( 'home_page_welcome_section', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Slider principal', 'textdomain' ),
        'description' => '',
        'panel' => 'home_page_sections_panel',
    ) );

    $wp_customize->add_section( 'home_page_presentation_section', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Presentation', 'textdomain' ),
        'description' => '',
        'panel' => 'home_page_sections_panel',
    ) );

    $wp_customize->add_section( 'home_page_formations_section', array(
        'priority' => 12,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Formations', 'textdomain' ),
        'description' => '',
        'panel' => 'home_page_sections_panel',
    ) );

    $wp_customize->add_section( 'home_page_projects_section', array(
        'priority' => 13,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Projets', 'textdomain' ),
        'description' => '',
        'panel' => 'home_page_sections_panel',
    ) );

    $wp_customize->add_section( 'home_page_news_section', array(
        'priority' => 14,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Actualités', 'textdomain' ),
        'description' => '',
        'panel' => 'home_page_sections_panel',
    ) );

    $wp_customize->add_section( 'home_page_professional_section', array(
        'priority' => 15,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Espace Professionel', 'textdomain' ),
        'description' => '',
        'panel' => 'home_page_sections_panel',
    ) );

    /**---------------------------------------------- /*
     * HOMEPAGE - WELCOME SECTION FIELDS
    /* ---------------------------------------------- */

    //Image Licence
    $wp_customize->add_setting( 'home_page_welcome_section_img', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => \App\App::get_image_page_header('batiment-psm', 'jpg'),
    ));

    //Image Licence control
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'home_page_welcome_section_img', array(
        'label' => 'Image de fond',
        'section' => 'home_page_welcome_section',
        'settings' => 'home_page_welcome_section_img'
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_welcome_section_img', [
        'selector' => '.home_page_welcome_section_img',
        'render_callback' => function () {
            return get_theme_mod('home_page_welcome_section_img');
        }
    ]);

    $defaultSliderTitles = array(
        'Berceau d\'idées innovantes', 'Des compétences de leader', 'Partager, valoriser, réussir', 'La qualité avant tout'
    );
    $defaultSliderTexts = array(
        'Les plus grandes innovations naissent d\'idées simples. Les étudiants de PSM sont encouragés à '.
        'cultiver leur créativité et leur imagination, à voir le monde avec un regard novateur et à '.
        'concevoir des produits et services multimédia répondant aux besoins et aux demandes d’aujourd’hui '.
        'et de demain.',

        'L’expérience prépare mieux que la théorie aux défis du monde actuel. Chez PSM, nous formons '.
        'des chefs de projet complets et polyvalents en confrontant nos étudiants à des expériences '.
        'concrètes. À la sortie, ils seront capables de concevoir, réaliser et promouvoir des projets '.
        'multimédia complexes et innovants.',

        'Savoir composer, gérer et travailler dans une équipe de professionnels aux profils différents '.
        'est une compétence fondamentale dans le secteur du multimédia. En étant confrontés à de '.
        'nombreux projets collectifs, les étudiants de PSM apprennent à valoriser les compétences '.
        'spécifiques de chaque membre d’une équipe, à partager et à communiquer pour mieux réussir.',

        'Un produit ou un service de qualité est un produit qui sait répondre aux besoins et aux '.
        'attentes de ses cibles. Pour cette raison, PSM tient particulièrement à cœur d’enseigner '.
        'aux professionnels du multimédia de demain à bien observer et analyser le marché, à concevoir '.
        'et à réaliser des produits et des services visant à proposer la meilleure expérience '.
        'utilisateur possible.',
    );

    for ( $count = 1; $count <= 4; $count++ ) {
        //Title
        $wp_customize->add_setting('home_page_welcome_section_slide_'. $count .'_title', array(
            'default' => $defaultSliderTitles[$count-1],
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        //Control Title
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_page_welcome_section_slide_'. $count .'_title', array(
            'type' => 'text',
            'section' => 'home_page_welcome_section',
            'settings' => 'home_page_welcome_section_slide_'. $count .'_title',
            'label' => 'Titre du slide n°'. $count,
        )));

        //Text
        $wp_customize->add_setting('home_page_welcome_section_slide_'. $count .'_text', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => $defaultSliderTexts[$count-1],
            'transport' => 'postMessage',
        ));

        //Control Text
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_page_welcome_section_slide_'. $count .'_text', array(
            'type' => 'textarea',
            'section' => 'home_page_welcome_section',
            'settings' => 'home_page_welcome_section_slide_'. $count .'_text',
            'label' => 'Texte du slide n°'. $count,
        )));
    }

    // Little pencils logo pointer shortcuts
    $wp_customize->selective_refresh->add_partial('home_page_welcome_section_slide_1_title', [
        'selector' => '.home_page_welcome_section_slide_1_title',
        'render_callback' => function () {
            return get_theme_mod('home_page_welcome_section_slide_1_title');
        }
    ]);

    $wp_customize->selective_refresh->add_partial('home_page_welcome_section_slide_2_title', [
        'selector' => '.home_page_welcome_section_slide_2_title',
        'render_callback' => function () {
            return get_theme_mod('home_page_welcome_section_slide_2_title');
        }
    ]);

    $wp_customize->selective_refresh->add_partial('home_page_welcome_section_slide_3_title', [
        'selector' => '.home_page_welcome_section_slide_3_title',
        'render_callback' => function () {
            return get_theme_mod('home_page_welcome_section_slide_3_title');
        }
    ]);

    $wp_customize->selective_refresh->add_partial('home_page_welcome_section_slide_4_title', [
        'selector' => '.home_page_welcome_section_slide_4_title',
        'render_callback' => function () {
            return get_theme_mod('home_page_welcome_section_slide_4_title');
        }
    ]);

    $wp_customize->selective_refresh->add_partial('home_page_welcome_section_slide_1_text', [
        'selector' => '.home_page_welcome_section_slide_1_text',
        'render_callback' => function () {
            return get_theme_mod('home_page_welcome_section_slide_1_text');
        }
    ]);

    $wp_customize->selective_refresh->add_partial('home_page_welcome_section_slide_2_text', [
        'selector' => '.home_page_welcome_section_slide_2_text',
        'render_callback' => function () {
            return get_theme_mod('home_page_welcome_section_slide_2_text');
        }
    ]);

    $wp_customize->selective_refresh->add_partial('home_page_welcome_section_slide_3_text', [
        'selector' => '.home_page_welcome_section_slide_3_text',
        'render_callback' => function () {
            return get_theme_mod('home_page_welcome_section_slide_3_text');
        }
    ]);

    $wp_customize->selective_refresh->add_partial('home_page_welcome_section_slide_4_text', [
        'selector' => '.home_page_welcome_section_slide_4_text',
        'render_callback' => function () {
            return get_theme_mod('home_page_welcome_section_slide_4_text');
        }
    ]);

    /**---------------------------------------------- /*
     * HOMEPAGE - PRESENTATION SECTION FIELDS
    /* ---------------------------------------------- */

    //Title
    $wp_customize->add_setting( 'home_page_presentation_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'PASSIONNÉS ET SUPER MOTIVÉS !',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_presentation_section_title', array(
        'type' => 'text',
        'section' => 'home_page_presentation_section',
        'settings' => 'home_page_presentation_section_title',
        'label' => 'Titre section présentation',
    )));

    //Text
    $wp_customize->add_setting( 'home_page_presentation_section_text', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' =>
            'Chez PSM, votre <b>passion</b> sera la clé de votre réussite. Que vous ayez un profil de graphiste, communicant, '.
            'développeur, informaticien, ou que vous soyez tout simplement <b>motivé</b> et passionné par <b>l’innovation</b>, le '.
            'multimédia et les nouvelles technologies, nous allons vous transmettre les <b>outils</b> et les <b>expériences</b> '.
            'nécessaires à faire de vous un professionnel qualifié dans votre domaine de prédilection. '.
            'Vous visez <b>l’excellence</b> pour la poursuite de vos études en <b>BAC+3</b> ou en <b>Master</b> ? PSM pourrait être la '.
            'réponse : venez découvrir nos <b>formations</b> et nos <b>modalités d’admission</b>. ',
        'transport' => 'postMessage',
    ));

    //Control Text
    $wp_customize->add_control( new Wysiwyg_editor_custom_control($wp_customize, 'home_page_presentation_section_text', array(
        'section' => 'home_page_presentation_section',
        'settings' => 'home_page_presentation_section_text',
        'label' => 'Texte section présentation'
    )));

    //Admission licence link
    $wp_customize->add_setting( 'home_page_presentation_section_admission_licence_link', array(
        'default' => 'http://formations.univ-fcomte.fr/ws?_profil=ufc&_cmd=getFormation&_oid=CDM-KPROG8&_onglet=admission&_redirect=voir_fiche_program',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url'
    ) );

    //Admission licence link control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_presentation_section_admission_licence_link', array(
        'label'    => __( 'Url de la page d\'admission licence', 'textdomain' ),
        'settings' => 'home_page_presentation_section_admission_licence_link',
        'section'  => 'home_page_presentation_section',
        'input_attrs' => array(
            'placeholder' => __( 'ex: http://site/admission' ),
        ),
        'type' => 'textarea',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_presentation_section_admission_licence_link', [
        'selector' => '.home_page_presentation_section_admission_licence_link',
        'render_callback' => function () {
            return get_theme_mod('home_page_presentation_section_admission_licence_link');
        }
    ]);

    //Admission master link
    $wp_customize->add_setting( 'home_page_presentation_section_admission_master_link', array(
        'default' => 'http://formations.univ-fcomte.fr/ws?_profil=ufc&_cmd=getFormation&_oid=CDM-KPROG107&_onglet=admission&_redirect=voir_fiche_program',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url'
    ) );

    //Admission master link control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_presentation_section_admission_master_link', array(
        'label'    => __( 'Url de la page d\'admission master', 'textdomain' ),
        'settings' => 'home_page_presentation_section_admission_master_link',
        'section'  => 'home_page_presentation_section',
        'input_attrs' => array(
            'placeholder' => __( 'ex: http://site/admission' ),
        ),
        'type' => 'textarea',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_presentation_section_admission_master_link', [
        'selector' => '.home_page_presentation_section_admission_master_link',
        'render_callback' => function () {
            return get_theme_mod('home_page_presentation_section_admission_master_link');
        }
    ]);

    //Apply link
    $wp_customize->add_setting( 'home_page_presentation_section_apply_link', array(
        'default' => 'https://scolarite.univ-fcomte.fr/ecandidat/',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url'
    ) );

    //Apply link control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_presentation_section_apply_link', array(
        'label'    => __( 'Url de la page de candidature', 'textdomain' ),
        'settings' => 'home_page_presentation_section_apply_link',
        'section'  => 'home_page_presentation_section',
        'input_attrs' => array(
            'placeholder' => __( 'ex: http://site/admission' ),
        ),
        'type' => 'textarea',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_presentation_section_apply_link', [
        'selector' => '.home_page_presentation_section_apply_link',
        'render_callback' => function () {
            return get_theme_mod('home_page_presentation_section_apply_link');
        }
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_presentation_section_title', [
        'selector' => '.home_page_presentation_section_title',
        'render_callback' => function () {
            return get_theme_mod('home_page_presentation_section_title');
        }
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_presentation_section_text', [
        'selector' => '.home_page_presentation_section_text',
        'render_callback' => function () {
            return get_theme_mod('home_page_presentation_section_text');
        }
    ]);

    /**---------------------------------------------- /*
     * HOMEPAGE - FORMATIONS SECTION FIELDS
    /* ---------------------------------------------- */

    //Image Licence
    $wp_customize->add_setting( 'home_page_formations_section_img_1', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri(). '/../dist/images/formations/Licence3-psm.jpg',
    ));

    //Image Licence
    $wp_customize->add_setting( 'home_page_formations_section_img_2', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri(). '/../dist/images/formations/Master1-psm.jpg',
    ));

    //Image Licence
    $wp_customize->add_setting( 'home_page_formations_section_img_3', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri(). '/../dist/images/formations/Master2-psm.jpg',
    ));

    for ( $count = 1; $count <= 3; $count++ ) {

        //Image Licence control
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'home_page_formations_section_image_'. $count .'_controller', array(
            'label' => 'Image',
            'section' => 'home_page_formations_section',
            'settings' => 'home_page_formations_section_img_'. $count
        )));
    }

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_formations_section_img_1', [
        'selector' => '.home_page_formations_section_img_1'
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_formations_section_img_2', [
        'selector' => '.home_page_formations_section_img_2'
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_formations_section_img_3', [
        'selector' => '.home_page_formations_section_img_3'
    ]);

    /**---------------------------------------------- /*
     * HOMEPAGE - PROJECTS SECTION NEWS
    /* ---------------------------------------------- */

    //NEWS Page Dropdown Settings
    $wp_customize->add_setting( 'home_page_news_section_news_page', array(
        'default'           => '',
        'sanitize_callback' => 'absint'
    ) );

    //Projet Rhizome Page control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_news_section_news_page', array(
        'label'    => __( 'Page des actualités', 'textdomain' ),
        'settings' => 'home_page_news_section_news_page',
        'section'  => 'home_page_news_section',
        'type' => 'dropdown-pages',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_news_section_news_page', [
        'selector' => '.home_page_news_section_news_page'
    ]);


    /**---------------------------------------------- /*
     * HOMEPAGE - PROJECTS SECTION FIELDS
    /* ---------------------------------------------- */

    //Title
    $wp_customize->add_setting( 'home_page_projects_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Des formations orientées projet',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_projects_section_title', array(
        'type' => 'text',
        'section' => 'home_page_projects_section',
        'settings' => 'home_page_projects_section_title',
        'label' => 'Titre section projets',
    )));

    //Text
    $wp_customize->add_setting( 'home_page_projects_section_text', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' =>  'Les <b>projets multimédia</b> sont le pain quotidien des étudiants de PSM. Chaque année, ils sont amenés à '.
                      'réaliser un vrai projet d’<b>équipe</b>, en totale autonomie et dans des <b>conditions réelles</b> (et cela, en '.
                      'plus des projets spécifiques aux unités d’enseignements).<br /> '.
                      'Ces <b>expériences concrètes</b>, en plus d’être extrêmement formatrices et valorisantes, aboutissent souvent '.
                      'à des résultats remarquables.<br /> '.
                      'Découvrez les projets réalisés au fil des années par nos étudiant dans la section dédiée de ce site !',
        'transport' => 'postMessage',
    ));

    //Control Text
    $wp_customize->add_control( new Wysiwyg_editor_custom_control($wp_customize, 'home_page_projects_section_text', array(
        'section' => 'home_page_projects_section',
        'settings' => 'home_page_projects_section_text',
        'label' => 'Texte section projets'
    )));

    //Projet Rhizome Page Dropdown Settings
    $wp_customize->add_setting( 'home_page_projects_section_rhizome_page', array(
        'default'           => '',
        'sanitize_callback' => 'absint'
    ) );

    //Projet Rhizome Page control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_projects_section_rhizome_page', array(
        'label'    => __( 'Page des projets rhizomes', 'textdomain' ),
        'settings' => 'home_page_projects_section_rhizome_page',
        'section'  => 'home_page_projects_section',
        'type' => 'dropdown-pages',
    )));

    //Projet PFE Page Dropdown Settings
    $wp_customize->add_setting( 'home_page_projects_section_pfe_page', array(
        'default'           => '',
        'sanitize_callback' => 'absint'
    ) );

    //Projet Rhizome Page control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_projects_section_pfe_page', array(
        'label'    => __( 'Page des projets de fin d\'études', 'textdomain' ),
        'settings' => 'home_page_projects_section_pfe_page',
        'section'  => 'home_page_projects_section',
        'type' => 'dropdown-pages',
    )));

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_projects_section_title', [
        'selector' => '.home_page_projects_section_title',
        'render_callback' => function () {
            return get_theme_mod('home_page_projects_section_title');
        }
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_projects_section_text', [
        'selector' => '.home_page_projects_section_text',
        'render_callback' => function () {
            return get_theme_mod('home_page_projects_section_text');
        }
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_projects_section_rhizome_page', [
        'selector' => '.home_page_projects_section_rhizome_page'
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_projects_section_pfe_page', [
        'selector' => '.home_page_projects_section_pfe_page'
    ]);

    /**---------------------------------------------- /*
     * HOMEPAGE - professional SECTION FIELDS
    /* ---------------------------------------------- */

    //Title
    $wp_customize->add_setting( 'home_page_professional_section_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Des formations orientées projet',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_professional_section_title', array(
        'type' => 'text',
        'section' => 'home_page_professional_section',
        'settings' => 'home_page_professional_section_title',
        'label' => 'Titre section projets',
    )));

    //Text
    $wp_customize->add_setting( 'home_page_professional_section_text', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'La force de PSM est la <b>réussite</b> de ses étudiants dans le monde du travail. Pour atteindre ce but, '.
                     'nous misons sur la <b>qualité</b> des enseignements, sur la <b>polyvalence</b> des compétences des étudiants et '.
                     'sur des <b>expériences professionnelles</b> réellement valorisantes pour leurs profils.<br /> '.
                     'Les stages de Licence 3 et de Master 2 visent à favoriser l’insertion professionnelle et le <b>recrutement</b> '.
                     'immédiat de nos diplômés.<br /> '.
                     'Vous êtes un professionnel et vous souhaitez soumettre une offre de stage / emploi à nos étudiants ? '.
                     'Un formulaire est disponible pour vous dans la section <a href="#">Espace Pro</a>.',
        'transport' => 'postMessage',
    ));

    //Control Text
    $wp_customize->add_control( new Wysiwyg_editor_custom_control($wp_customize, 'home_page_professional_section_text', array(
        'section' => 'home_page_professional_section',
        'settings' => 'home_page_professional_section_text',
        'label' => 'Texte section projets'
    )));

    //Projet professional Page Dropdown Settings
    $wp_customize->add_setting( 'home_page_professional_section_link_page_pro', array(
        'default'           => '',
        'sanitize_callback' => 'absint'
    ) );

    //Projet professional Page control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_professional_section_link_page_pro', array(
        'label'    => __( 'Page des projets professionals', 'textdomain' ),
        'settings' => 'home_page_professional_section_link_page_pro',
        'section'  => 'home_page_professional_section',
        'type' => 'dropdown-pages',
    )));
    
    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_professional_section_title', [
        'selector' => '.home_page_professional_section_title',
        'render_callback' => function () {
            return get_theme_mod('home_page_professional_section_title');
        }
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_professional_section_text', [
        'selector' => '.home_page_professional_section_text',
        'render_callback' => function () {
            return get_theme_mod('home_page_professional_section_text');
        }
    ]);

    // Little pencil logo pointer shortcut
    $wp_customize->selective_refresh->add_partial('home_page_professional_section_link_page_pro', [
        'selector' => '.home_page_professional_section_link_page_pro'
    ]);
});


/**
 * Live preview modifications
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_controls_enqueue_scripts', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

// Button link PDF
/*$wp_customize->add_setting( 'home_page_presentation_section_admission_file', array(
    'default' => get_template_directory_uri(). '/../dist/images/pdf/admission.pdf'
) );

//Button link PDF
$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'home_page_presentation_section_admission_file', array(
    'label'    => __( 'Fichier d\'admission', 'textdomain' ),
    'settings' => 'home_page_presentation_section_admission_file',
    'section'  => 'home_page_presentation_section',
    'type' => 'upload',
    //mime_type doc : https://developer.mozilla.org/fr/docs/Web/HTTP/Basics_of_HTTP/MIME_types
    'mime_type' => 'application/pdf'
)));

// Little pencil logo pointer shortcut
$wp_customize->selective_refresh->add_partial('home_page_presentation_section_admission_file', [
    'selector' => '.home_page_presentation_section_admission_file'
]);*/
