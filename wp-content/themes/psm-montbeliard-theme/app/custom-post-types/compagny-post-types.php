<?php
//Protect the file to direct Access wia url
if ( ! defined( 'ABSPATH' )) {
    header('Location: http://tinyurl.com/ydek4vj2');
    exit; // Exit if accessed directly
}

/**
 * Register Entreprises Post Type
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
/*add_action( 'init', 'codex_compagny_init' );
function codex_compagny_init() {
    $labels = array(
        'name'               => _x( 'Entreprises', 'post type general name'),
        'singular_name'      => _x( 'Entreprise', 'post type singular name'),
        'menu_name'          => _x( 'Entreprises', 'admin menu'),
        'name_admin_bar'     => _x( 'Entreprises', 'add new on admin bar'),
        'add_new'            => _x( 'Ajouter une entreprise', 'matiere'),
        'add_new_item'       => __( 'Ajouter une entreprise'),
        'new_item'           => __( 'Nouvelle entreprise'),
        'edit_item'          => __( 'Éditer une entreprise'),
        'view_item'          => __( 'Voir une entreprise'),
        'all_items'          => __( 'Toutes les entreprise'),
        'search_items'       => __( 'Rechercher une entreprise'),
        'parent_item_colon'  => __( 'Entreprises parentes'),
        'not_found'          => __( 'Pas de résultats'),
        'not_found_in_trash' => __( 'Aucune entreprise trouvée dans la corbeille')
    );

    $args = array(
        'labels'             => $labels, //An array of labels for this post type
        'description'        => __( 'Description.'), //A short descriptive summary of what the post type is.
        'public'             => false, // Hide to visitors search engine
        'publicly_queryable' => false, // Whether queries can be performed on the front end as part of parse_request()
        'show_ui'            => true, // Show in admin
        'show_in_menu'       => true, // Show in menus
        'query_var'          => true, // Showing the post page for visitors
        'rewrite'            => array( 'slug' => 'compagny' ), // Post type slug rewrite
        'capabilities' => array(
            'edit_post' => 'edit_compagny',
            'edit_posts' => 'edit_compagnies',
            'edit_others_posts' => 'edit_other_compagnies',
            'publish_posts' => 'publish_compagnies',
            'read_post' => 'read_compagny',
            'read_private_posts' => 'read_private_compagnies',
            'delete_post' => 'delete_compagny'
        ),
        'map_meta_cap' => true, // Set to `false`, if users are not allowed to edit/delete existing posts
        'has_archive'        => false, // Enables post type archives
        'hierarchical'       => false, // Parents to be specified
        'menu_position'      => null,  // Position in admin (5 - below Posts, 10 - below Media, 15 - below Links...)
        'menu_icon'          => 'dashicons-admin-multisite', //icon
        'supports'           => array( 'title', 'editor', 'thumbnail')
    );
    register_post_type( 'compagny', $args );
}*/

/**
 * Meta box - Custom compagny post meta managment
 */
/*add_action('add_meta_boxes','init_compagny_metabox');
function init_compagny_metabox(){
    //Initialisation Meta-box
    add_meta_box('info_client', 'Informations sur l\'entreprise', 'info_client', 'compagny', 'normal');
}*/

//Creating form with recieved data outpout
/*function info_client($post){
    $adresse  = get_post_meta($post->ID,'_compagny_adress',true);
    $mail     = get_post_meta($post->ID,'_compagny_mail',true);
    $phone      = get_post_meta($post->ID,'_compagny_phone',true);
    $website      = get_post_meta($post->ID,'_compagny_website',true);
    ?>
    <label for="adresse">Adresse complète</label>
    <textarea id="adresse" style="width: 100%;" name="adresse"><?php echo $adresse; ?></textarea>
    <label for="mail" style="display: block; padding-top: 10px">Email</label>
    <input id="mail" class="post_title" type="email" name="mail" value="<?php echo $mail; ?>" />
    <label for="phone" style="display: block; padding-top: 10px">Téléphone</label>
    <input id="phone" type="text" name="phone" value="<?php echo $phone; ?>" />
    <label for="site-web" style="display: block; padding-top: 10px">Site web</label>
    <input id="site" type="url" name="website" value="<?php echo $website; ?>" />
    <?php
}*/

//Saving form datas
/*add_action('save_post','save_metabox');
function save_metabox($post_id){
    if(isset($_POST['adresse'])){
        update_post_meta($post_id, '_compagny_adress', esc_textarea($_POST['adresse']));
    }
    if(isset($_POST['mail'])){
        update_post_meta($post_id, '_compagny_mail', is_email($_POST['mail']));
    }
    if(isset($_POST['phone'])){
        update_post_meta($post_id, '_compagny_phone', esc_html($_POST['phone']));
    }
    if(isset($_POST['website'])){
        update_post_meta($post_id, '_compagny_website', esc_html($_POST['website']));
    }
}*/


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

//Register a new compagny in compagny post-type
//Call this function in the wp-job job form register
// !!! To develop
/*function create_compagny_with_job_offer(){
    $compagny = get_page_by_title( 'Coca-cola', OBJECT, 'compagny' );

    if (!$compagny) {
        $new_compagny = array(
            'post_title' => 'Coca-cola',
            'post_content' => 'test',
            'post_type' => 'compagny',
            'post_status' => 'publish',
            'comment_status' => 'closed',
            'ping_status' => 'closed'
        );
        $post_id = wp_insert_post($new_compagny);
        add_post_meta($post_id, '_compagny_adress', '13 rue du ciment, 25000 montbéliard');
        add_post_meta($post_id, '_compagny_mail', 'arabasta@gmail.com');
        add_post_meta($post_id, '_compagny_phone', '0147200001');
        add_post_meta($post_id, '_compagny_website', 'http://fake.fr');
    }
}
add_action('init','create_compagny_with_job_offer');*/



