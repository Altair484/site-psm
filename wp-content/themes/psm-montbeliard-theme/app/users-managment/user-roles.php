<?php

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

        //Give rights to manage jobs offers
        $role->add_cap('edit_job_listing');
        $role->add_cap('read_job_listing');
        $role->add_cap('delete_job_listing');
        $role->add_cap('edit_job_listings');
        $role->add_cap('edit_others_job_listings');
        $role->add_cap('publish_job_listings');
        $role->add_cap('read_private_job_listings');
        $role->add_cap('delete_job_listings');
        $role->add_cap('delete_private_job_listings');
        $role->add_cap('delete_published_job_listings');
        $role->add_cap('delete_others_job_listings');
        $role->add_cap('edit_private_job_listings');
        $role->add_cap('edit_published_job_listings');
    }
    
    $role_contributor = get_role('contributor');

    //Remove access to companies
    $role_contributor->remove_cap( 'edit_compagny');
    $role_contributor->remove_cap( 'edit_compagnies' );
    $role_contributor->remove_cap( 'edit_other_compagnies' );
    $role_contributor->remove_cap( 'publish_compagnies' );
    $role_contributor->remove_cap( 'read_compagny' );
    $role_contributor->remove_cap( 'read_private_compagnies' );
    $role_contributor->remove_cap( 'delete_compagny' );

    //Remove access to projects
    $role_contributor->remove_cap( 'edit_project');
    $role_contributor->remove_cap( 'edit_projects' );
    $role_contributor->remove_cap( 'edit_other_projects' );
    $role_contributor->remove_cap( 'publish_projects' );
    $role_contributor->remove_cap( 'read_project' );
    $role_contributor->remove_cap( 'read_private_projects' );
    $role_contributor->remove_cap( 'delete_project' );

    //Remove access to school-subjects
    $role_contributor->remove_cap( 'edit_school-subject');
    $role_contributor->remove_cap( 'edit_school-subjects' );
    $role_contributor->remove_cap( 'edit_other_school-subjects' );
    $role_contributor->remove_cap( 'publish_school-subjects' );
    $role_contributor->remove_cap( 'read_school-subject' );
    $role_contributor->remove_cap( 'read_private_school-subjects' );
    $role_contributor->remove_cap( 'delete_school-subject' );

    //Remove rights to manage jobs offers
    $role_contributor->remove_cap('edit_job_listing');
    $role_contributor->remove_cap('read_job_listing');
    $role_contributor->remove_cap('delete_job_listing');
    $role_contributor->remove_cap('edit_job_listings');
    $role_contributor->remove_cap('edit_others_job_listings');
    $role_contributor->remove_cap('publish_job_listings');
    $role_contributor->remove_cap('read_private_job_listings');
    $role_contributor->remove_cap('delete_job_listings');
    $role_contributor->remove_cap('delete_private_job_listings');
    $role_contributor->remove_cap('delete_published_job_listings');
    $role_contributor->remove_cap('delete_others_job_listings');
    $role_contributor->remove_cap('edit_private_job_listings');
    $role_contributor->remove_cap('edit_published_job_listings');


    /*global $wp_roles;
    $role = $wp_roles->roles;
    $role = get_role('contributor');
    var_dump($role);*/
    if(current_user_can('contributor')){
        add_action('admin_menu', function() {
            remove_menu_page('wpcf7');
        });
       ;
    }
}
