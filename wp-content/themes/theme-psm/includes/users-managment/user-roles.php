<?php
//CREATE USER ROLE
/*$result = add_role(
    'basic_contributor',
    __( 'Basic Contributor' ),
    array(
        'read'         => true,  // true allows this capability
        'edit_posts'   => true,
        'delete_posts' => false, // Use false to explicitly deny
    )
);
if ( null !== $result ) {
    echo 'Yay! New role created!';
}
else {
    echo 'Oh... the basic_contributor role already exists.';
}

function add_roles_on_plugin_activation() {
    add_role( 'custom_role', 'Custom Subscriber', array( 'read' => true, 'level_0' => true ) );
}
register_activation_hook( __FILE__, 'add_roles_on_plugin_activation' );

//Delete USER ROLE
/*if( get_role('basic_contributor') ){
    remove_role( 'basic_contributor' );
}*/

add_action('init', 'compagny_capabilities');
function compagny_capabilities()
{
    $roles = array('editor','administrator');

    foreach($roles as $the_role) {
            $role = get_role($the_role);
            //Give acces to compagny custom post type
            $role->add_cap( 'edit_compagny');
            $role->add_cap( 'edit_compagnies' );
            $role->add_cap( 'edit_other_compagnies' );
            $role->add_cap( 'publish_compagnies' );
            $role->add_cap( 'read_compagny' );
            $role->add_cap( 'read_private_compagnies' );
            $role->add_cap( 'delete_compagny' );

            //Give access to projects
            $role->add_cap( 'edit_project');
            $role->add_cap( 'edit_projects' );
            $role->add_cap( 'edit_other_projects' );
            $role->add_cap( 'publish_projects' );
            $role->add_cap( 'read_project' );
            $role->add_cap( 'read_private_projects' );
            $role->add_cap( 'delete_project' );

            //Give access to school-subjects
            $role->add_cap( 'edit_school-subject');
            $role->add_cap( 'edit_school-subjects' );
            $role->add_cap( 'edit_other_school-subjects' );
            $role->add_cap( 'publish_school-subjects' );
            $role->add_cap( 'read_school-subject' );
            $role->add_cap( 'read_private_school-subjects' );
            $role->add_cap( 'delete_school-subject' );
    }


    global $wp_roles;
    $role = $wp_roles->roles;
    //$role = get_role('contributor');
    //var_dump($role);
}


