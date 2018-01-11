<?php

//Protect the file to direct Access wia url
if ( ! defined( 'ABSPATH' )) {
    header('Location: http://tinyurl.com/ydek4vj2');
    exit; // Exit if accessed directly
}
/**
 * Register Porject Post Type
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
add_action( 'init', 'codex_project_init' );
function codex_project_init() {
	$labels = array(
		'name'               => _x( 'Projets', 'post type general name'),
		'singular_name'      => _x( 'Projet', 'post type singular name'),
		'menu_name'          => _x( 'Projets', 'admin menu'),
		'name_admin_bar'     => _x( 'Projets', 'add new on admin bar'),
		'add_new'            => _x( 'Ajouter un projet', 'add new'),
		'add_new_item'       => __( 'Ajouter un projet'),
		'new_item'           => __( 'Nouveau projet'),
		'edit_item'          => __( 'Éditer un projet'),
		'view_item'          => __( 'Voir une projet'),
		'all_items'          => __( 'Tous les projets'),
		'search_items'       => __( 'Rechercher un projet'),
		'parent_item_colon'  => __( 'Projets parents'),
		'not_found'          => __( 'Pas de projets'),
		'not_found_in_trash' => __( 'Aucun projet trouvée dans la corbeille')
	);

	$args = array(
		'labels'             => $labels, //An array of labels for this post type
		'description'        => __( 'Description.'), //A short descriptive summary of what the post type is.
		'public'             => false, // Hide to visitors search engine
		'publicly_queryable' => false, // Whether queries can be performed on the front end as part of parse_request()
		'show_ui'            => true, // Show in admin
		'show_in_menu'       => true, // Show in menus
		'query_var'          => true, // Showing the post page for visitors
		'rewrite'            => array( 'slug' => 'project' ), // Post type slug rewrite

		/*This part is needed to edit users rights*/
		'capabilities' => array(
			'edit_post' => 'edit_project',
			'edit_posts' => 'edit_projects',
			'edit_others_posts' => 'edit_other_projects',
			'publish_posts' => 'publish_projects',
			'read_post' => 'read_project',
			'read_private_posts' => 'read_private_projects',
			'delete_post' => 'delete_project'
		),
		'map_meta_cap' => true, // Set to `false`, if users are not allowed to edit/delete existing posts
		/*End*/
		'has_archive'        => false, // Enables post type archives
		'hierarchical'       => false, // Parents to be specified
		'menu_position'      => null,  // Position in admin (5 - below Posts, 10 - below Media, 15 - below Links...)
		'menu_icon'          => 'dashicons-media-interactive', //icon
		'supports'           => array( 'title', 'editor', 'thumbnail')
	);
	register_post_type( 'project', $args );
}

/**
 * Meta box - Custom project post meta managment
 */
add_action('add_meta_boxes','init_project_metabox');
function init_project_metabox(){
	//Initialisation Meta-box
	add_meta_box('info_project', 'Informations sur les projets', 'info_project', 'project', 'side');
}

//Creating form with recieved data outpout
function info_project($post){
	$site_web  = get_post_meta($post->ID,'_project_web_site',true);
	$year  = get_post_meta($post->ID,'_project_year',true);
    $video  = get_post_meta($post->ID,'_project_video',true);
	?>
	<label for="site_web">Site web</label>
	<input id="site_web" style="width: 100%;" name="site_web" value="<?php echo $site_web;?>">
    <label for="site_web">Url vidéo</label>
    <input id="video" style="width: 100%;" name="video" value="<?php echo $video;?>">
	<label for="project_year">Année de sortie</label>
	<select id="project_year" style="width: 100%;" name="project_year" value="<?php echo $year;?>">
		<?php
		for($i = (date('Y')-5) ; $i <= (date('Y')+1); $i++){ ?>
			<option value='<?php _e($i)?>' <?php $year == $i ? _e('selected') : ''; ?>><?php _e($i) ?></option>";
		<?php }?>
	</select>
	<?php
}

//Saving form datas
add_action('save_post','save_metabox_projects');
function save_metabox_projects($post_id){
	if(isset($_POST['site_web'])){
		update_post_meta($post_id, '_project_web_site', esc_url($_POST['site_web']));
	}
	if(isset($_POST['project_year'])){
		update_post_meta($post_id, '_project_year', esc_textarea($_POST['project_year']));
	}
    if(isset($_POST['video'])){
        update_post_meta($post_id, '_project_video', esc_url($_POST['video']));
    }
}

add_action( 'init', 'create_project_type_taxonomie' );
function create_project_type_taxonomie() {
	// Ajout d'une taxonomie de type catégorie (Formations)
	$labels = array(
		'name'              => _x( 'Type de projet', 'taxonomy general name' ),
		'singular_name'     => _x( 'Type de projet', 'taxonomy singular name' ),
		'search_items'      => __( 'Rechercher un type de projet' ),
		'all_items'         => __( 'Tout' ),
		'parent_item'       => __( 'Type de projet parente' ),
		'parent_item_colon' => __( 'Type de projet parente' ),
		'edit_item'         => __( 'Éditer le Type de projet' ),
		'update_item'       => __( 'Mettre à jour le Type de projet' ),
		'add_new_item'      => __( 'Ajouter un Type de projet' ),
		'new_item_name'     => __( 'Nouveau Type de projet' ),
		'menu_name'         => __( 'Type de projet' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'project' ),
	);
	register_taxonomy( 'project_type', array( 'project' ), $args );

    // Ajout d'une taxonomie de type catégorie (Formations)
    $labels = array(
        'name'              => _x( 'Thème de l\'année', 'taxonomy general name' ),
        'singular_name'     => _x( 'Thème de l\'année', 'taxonomy singular name' ),
        'search_items'      => __( 'Rechercher un Thème de l\'année' ),
        'all_items'         => __( 'Tout' ),
        'parent_item'       => __( 'Thème de l\'année parente' ),
        'parent_item_colon' => __( 'Thème de l\'année parente' ),
        'edit_item'         => __( 'Éditer le Thème de l\'année' ),
        'update_item'       => __( 'Mettre à jour le Thème de l\'année' ),
        'add_new_item'      => __( 'Ajouter un Thème de l\'année' ),
        'new_item_name'     => __( 'Nouveau Thème de l\'année' ),
        'menu_name'         => __( 'Thème de l\'année' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'project' ),
    );
    register_taxonomy( 'project_theme', array( 'project' ), $args );
}
/**
 * Adding custom post-meta collumn in the post-type list page
 */
/*add_filter('manage_compagny_posts_columns','filter_compagny_columns');
function filter_compagny_columns( $columns ) {
	$columns = array(
		'title' => 'Title',
		'adresse' => 'Adresse',
		'email' => 'Email',
		'phone' => 'Téléphone',
		'website' => 'Site web',
		//'thumb' => __('Thumb'),
		'date' => __( 'Date' )
	);

	return $columns;
}*/

/*add_action( 'manage_posts_custom_column','action_custom_columns_content', 10, 2);
function action_custom_columns_content ( $column_id, $post_id ) {
	//run a switch statement for all of the custom columns created
	switch( $column_id ) {
		case 'adresse':
			echo ($value = get_post_meta($post_id, '_compagny__adress', true )) ? $value : 'No Adress Given';
			break;
		case 'email':
			echo ($value = get_post_meta($post_id, '_compagny_email', true )) ? $value : 'No Email Given';
			break;
		case 'phone':
			echo ($value = get_post_meta($post_id, '_compagny_phone', true )) ? $value : 'No Phone Given';
			break;
		case 'website':
			echo ($value = get_post_meta($post_id, '_compagny_website', true )) ? $value : 'No WebsiteGiven';
			break;
	}
}*/
