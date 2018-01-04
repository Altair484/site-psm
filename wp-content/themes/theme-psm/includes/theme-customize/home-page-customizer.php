<?php

function home_page_customizer( $wp_customize ) {

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
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Presentation', 'textdomain' ),
        'description' => '',
        'panel' => 'home_page_sections_panel',
    ) );

    $wp_customize->add_section( 'home_page_formations_section', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Section - Formations', 'textdomain' ),
        'description' => '',
        'panel' => 'home_page_sections_panel',
    ) );

    /**---------------------------------------------- /*
     * HOMEPAGE - WELCOME SECTION FIELDS / CONTROLLERS
    /* ---------------------------------------------- */

    /* SLIDE 1 */
    //Title
    $wp_customize->add_setting( 'home_page_welcome_section_slide_1_title', array(
        'default' => 'Berceau d’idées innovantes',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_welcome_section_slide_1_title_controller', array(
        'type' => 'text',
        'section' => 'home_page_welcome_section',
        'settings' => 'home_page_welcome_section_slide_1_title',
        'label' => 'Titre du slide n°1',
        /*'description' => '',*/
    )));

    //Text
    $wp_customize->add_setting( 'home_page_welcome_section_slide_1_text', array(
        'default' => 'Les plus grandes innovations naissent d\'idées simples. Les étudiants de PSM sont encouragés à '.
        'cultiver leur créativité et leur imagination, à voir le monde avec un regard novateur et à '.
        'concevoir des produits et services multimédia répondant aux besoins et aux demandes d’aujourd’hui '.
        'et de demain.',
    ) );

    //Control Text
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_welcome_section_slide_1_text_controller', array(
        'section' => 'home_page_welcome_section',
        'settings' => 'home_page_welcome_section_slide_1_text',
        'label' => 'Texte du slide n°1',
        'type' => 'textarea',
    )));

    /* SLIDE 2 */
    //Title
    $wp_customize->add_setting( 'home_page_welcome_section_slide_2_title', array(
        'default' => 'Des compétences de leader',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_welcome_section_slide_2_title_controller', array(
        'type' => 'text',
        'section' => 'home_page_welcome_section',
        'settings' => 'home_page_welcome_section_slide_2_title',
        'label' => 'Titre du slide n°2',
        /*'description' => '',*/
    )));

    //Text
    $wp_customize->add_setting( 'home_page_welcome_section_slide_2_text', array(
        'default' => 'L’expérience prépare mieux que la théorie aux défis du monde actuel. Chez PSM, nous formons '.
                     'des chefs de projet complets et polyvalents en confrontant nos étudiants à des expériences '.
                     'concrètes. À la sortie, ils seront capables de concevoir, réaliser et promouvoir des projets '.
                     'multimédia complexes et innovants.',
    ) );

    //Control Text
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_welcome_section_slide_2_text_controller', array(
        'section' => 'home_page_welcome_section',
        'settings' => 'home_page_welcome_section_slide_2_text',
        'label' => 'Texte du slide n°2',
        'type' => 'textarea',
    )));

    /* SLIDE 3 */
    //Title
    $wp_customize->add_setting( 'home_page_welcome_section_slide_3_title', array(
        'default' => 'Partager, valoriser, réussir',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_welcome_section_slide_3_title_controller', array(
        'type' => 'text',
        'section' => 'home_page_welcome_section',
        'settings' => 'home_page_welcome_section_slide_3_title',
        'label' => 'Titre du slide n°3',
        /*'description' => '',*/
    )));

    //Text
    $wp_customize->add_setting( 'home_page_welcome_section_slide_3_text', array(
        'default' => 'Savoir composer, gérer et travailler dans une équipe de professionnels aux profils différents '.
                     'est une compétence fondamentale dans le secteur du multimédia. En étant confrontés à de '.
                     'nombreux projets collectifs, les étudiants de PSM apprennent à valoriser les compétences '.
                     'spécifiques de chaque membre d’une équipe, à partager et à communiquer pour mieux réussir.',
    ) );

    //Control Text
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_welcome_section_slide_3_text_controller', array(
        'section' => 'home_page_welcome_section',
        'settings' => 'home_page_welcome_section_slide_3_text',
        'label' => 'Texte du slide n°3',
        'type' => 'textarea',
    )));

    /* SLIDE 4 */
    //Title
    $wp_customize->add_setting( 'home_page_welcome_section_slide_4_title', array(
        'default' => 'La qualité avant tout',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    //Control Title
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_welcome_section_slide_4_title_controller', array(
        'type' => 'text',
        'section' => 'home_page_welcome_section',
        'settings' => 'home_page_welcome_section_slide_4_title',
        'label' => 'Titre du slide n°4',
        /*'description' => '',*/
    )));

    //Text
    $wp_customize->add_setting( 'home_page_welcome_section_slide_4_text', array(
        'default' => 'Un produit ou un service de qualité est un produit qui sait répondre aux besoins et aux '.
                     'attentes de ses cibles. Pour cette raison, PSM tient particulièrement à cœur d’enseigner '.
			    	 'aux professionnels du multimédia de demain à bien observer et analyser le marché, à concevoir '.
					 'et à réaliser des produits et des services visant à proposer la meilleure expérience '.
					 'utilisateur possible.'
    ) );

    //Control Text
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'home_page_welcome_section_slide_4_text_controller', array(
        'section' => 'home_page_welcome_section',
        'settings' => 'home_page_welcome_section_slide_4_text',
        'label' => 'Texte du slide n°4',
        'type' => 'textarea',
    )));

    /**---------------------------------------------- /*
     * HOMEPAGE - WELCOME PRESENTATION FIELDS / CONTROLLERS
    /* ---------------------------------------------- */

    /**---------------------------------------------- /*
     * HOMEPAGE - WELCOME FORMATIONS FIELDS / CONTROLLERS
    /* ---------------------------------------------- */
    //Image Licence
    $wp_customize->add_setting( 'home_page_formations_section_img_1', array('default' => get_stylesheet_directory_uri(). '/assets/img/960-960-city-1.jpg'));

    //Image Licence control
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'home_page_formations_section_image_1_controller', array(
        'label' => 'Image',
        'section' => 'home_page_formations_section',
        'settings' => 'home_page_formations_section_img_1'
    )));

    //Image Master 1
    $wp_customize->add_setting( 'home_page_formations_section_img_2', array('default' => get_stylesheet_directory_uri(). '/assets/img/960-960-city-2.jpg'));

    //Image Master 1 Control
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'home_page_formations_section_image_2_controller', array(
        'label' => 'Image',
        'section' => 'home_page_formations_section',
        'settings' => 'home_page_formations_section_img_2'
    )));

    //Image Master 2
    $wp_customize->add_setting( 'home_page_formations_section_img_3', array('default' => get_stylesheet_directory_uri(). '/assets/img/960-960-city-3.jpg'));

    //Image Master 2 Control
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'home_page_formations_section_image_3_controller', array(
        'label' => 'Image',
        'section' => 'home_page_formations_section',
        'settings' => 'home_page_formations_section_img_3'
    )));
}

add_action('customize_register', 'home_page_customizer');


/*
    $wp_customize->add_panel( 'panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Example Panel', 'textdomain' ),
	    'description' => __( 'Description of what this panel does.', 'textdomain' ),
	) );

	$wp_customize->add_section( 'section_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Example Section', 'textdomain' ),
	    'description' => '',
	    'panel' => 'panel_id',
	) );

	$wp_customize->add_setting( 'url_field_id', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'url_field_id', array(
	    'type' => 'url',
	    'priority' => 10,
	    'section' => 'section_id',
	    'label' => __( 'URL Field', 'textdomain' ),
	    'description' => '',
	) );

	$wp_customize->add_setting( 'email_field_id', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_email',
	) );

	$wp_customize->add_control( 'email_field_id', array(
	    'type' => 'email',
	    'priority' => 10,
	    'section' => 'section_id',
	    'label' => __( 'Email Field', 'textdomain' ),
	    'description' => '',
	) );

	$wp_customize->add_setting( 'password_field_id', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'password_field_id', array(
	    'type' => 'password',
	    'priority' => 10,
	    'section' => 'section_id',
	    'label' => __( 'Password Field', 'textdomain' ),
	    'description' => '',
	) );

	$wp_customize->add_setting( 'textarea_field_id', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_textarea',
	) );

	$wp_customize->add_control( 'textarea_field_id', array(
	    'type' => 'textarea',
	    'priority' => 10,
	    'section' => 'section_id',
	    'label' => __( 'Textarea Field', 'textdomain' ),
	    'description' => '',
	) );

	$wp_customize->add_setting( 'date_field_id', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => ''
	) );

	$wp_customize->add_control( 'date_field_id', array(
	    'type' => 'date',
	    'priority' => 10,
	    'section' => 'section_id',
	    'label' => __( 'Date Field', 'textdomain' ),
	    'description' => '',
	) );

	$wp_customize->add_setting( 'range_field_id', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'intval',
	) );

	$wp_customize->add_control( 'range_field_id', array(
	    'type' => 'range',
	    'priority' => 10,
	    'section' => 'section_id',
	    'label' => __( 'Range Field', 'textdomain' ),
	    'description' => '',
	    'input_attrs' => array(
	        'min' => 0,
	        'max' => 100,
	        'step' => 1,
	        'class' => 'example-class',
	        'style' => 'color: #0a0',
	    ),
	) );
*/
