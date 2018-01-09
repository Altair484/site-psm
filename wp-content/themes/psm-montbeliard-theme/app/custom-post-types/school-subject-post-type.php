<?php

/**
 * Register Pédagogie Post Type
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
add_action( 'init', 'codex_school_subject_init' );
function codex_school_subject_init() {
    $labels = array(
        'name'               => _x( 'Unité d\'enseignement', 'post type general name'),
        'singular_name'      => _x( 'Unité d\'enseignement', 'post type singular name'),
        'menu_name'          => _x( 'Pédagogie', 'admin menu'),
        'name_admin_bar'     => _x( 'Matières', 'add new on admin bar'),
        'add_new'            => _x( 'Ajouter une unité d\'enseignement', 'school-subject'),
        'add_new_item'       => __( 'Ajouter une unité d\'enseignement'),
        'new_item'           => __( 'Nouvelle unité d\'enseignement'),
        'edit_item'          => __( 'Éditer une unité d\'enseignement'),
        'view_item'          => __( 'Voir une unité d\'enseignement'),
        'all_items'          => __( 'Toutes les unité d\'enseignement'),
        'search_items'       => __( 'Rechercher une unité d\'enseignement'),
        'parent_item_colon'  => __( 'Unité d\'enseignement parentes'),
        'not_found'          => __( 'Pas de résultats'),
        'not_found_in_trash' => __( 'Aucune matière trouvée dans la corbeille')
    );

    $args = array(
        'labels'             => $labels, //An array of labels for this post type
        'description'        => __( 'Description.'), //A short descriptive summary of what the post type is.
        'public'             => false, // Hide to visitors search engine
        'publicly_queryable' => false, // Whether queries can be performed on the front end as part of parse_request()
        'show_ui'            => true, // Show in admin
        'show_in_menu'       => true, // Show in menus
        'query_var'          => true, // Showing the post page for visitors
        'rewrite'            => array( 'slug' => 'school-subject' ), // Post type slug rewrite

        /*This part is needed to edit users rights*/
        'capabilities' => array(
            'edit_post' => 'edit_school-subject',
            'edit_posts' => 'edit_school-subjects',
            'edit_others_posts' => 'edit_other_school-subjects',
            'publish_posts' => 'publish_school-subjects',
            'read_post' => 'read_school-subject',
            'read_private_posts' => 'read_private_school-subjects',
            'delete_post' => 'delete_school-subject'
        ),
        'map_meta_cap' => true, // Set to `false`, if users are not allowed to edit/delete existing posts
        /*End*/

        'has_archive'        => false, // Enables post type archives
        'hierarchical'       => false, // Parents to be specified
        'menu_position'      => null,  // Position in admin (5 - below Posts, 10 - below Media, 15 - below Links...)
        'menu_icon'          => 'dashicons-welcome-learn-more', //icon
        'supports'           => array( 'title', 'editor', 'thumbnail')
    );
    register_post_type( 'school-subject', $args );
}

add_action( 'init', 'create_school_subject_taxonomies' );
function create_school_subject_taxonomies() {
    // Ajout d'une taxonomie de type catégorie (Formations)
    $labels = array(
        'name'              => _x( 'Formations', 'taxonomy general name' ),
        'singular_name'     => _x( 'Formation', 'taxonomy singular name' ),
        'search_items'      => __( 'Rechercher' ),
        'all_items'         => __( 'Tout' ),
        'parent_item'       => __( 'Formation parente' ),
        'parent_item_colon' => __( 'Formation parente' ),
        'edit_item'         => __( 'Éditer' ),
        'update_item'       => __( 'Mettre à jour' ),
        'add_new_item'      => __( 'Ajouter' ),
        'new_item_name'     => __( 'Nouveau' ),
        'menu_name'         => __( 'Formations' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'formation' ),
    );
    register_taxonomy( 'formation', array( 'school-subject' ), $args );

    // Ajout d'une taxonomie de type catégorie (Semestre)
    $labels = array(
        'name'              => _x( 'Catégorie de matière', 'taxonomy general name' ),
        'singular_name'     => _x( 'Catégorie de matière', 'taxonomy singular name' ),
        'search_items'      => __( 'Rechercher catégorie' ),
        'all_items'         => __( 'Toutes les catégories' ),
        'parent_item'       => __( 'Catégorie de matière parente' ),
        'parent_item_colon' => __( 'Catégorie de matière parent' ),
        'edit_item'         => __( 'Éditer catégorie de matière' ),
        'update_item'       => __( 'Mettre à jour la catégorie' ),
        'add_new_item'      => __( 'Ajouter une catégorie de matière' ),
        'new_item_name'     => __( 'Nouvelle catégorie de matière' ),
        'menu_name'         => __( 'Catégorie de matière' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'school-subject-cat' ),
    );
    register_taxonomy( 'school-subject-cat', array( 'school-subject' ), $args );
}