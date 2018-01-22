<?php
//Front fields
add_filter( 'submit_job_form_fields', function($fields) {
    //Job fields (FRONT)
    $fields['job']['job_type']['priority'] = 1;

    $fields['job']['job_location']['label'] = 'Ville du poste';
    $fields['job']['job_location']['priority'] = 2;
    $fields['job']['job_location']['placeholder'] = 'Ex: "Paris"';
    $fields['job']['job_location']['description'] = null;
    $fields['job']['job_location']['required'] = true;

    $fields['job']['job_duration'] = array (
        'label'       => __( 'Durée', 'job_manager' ),
        'type'        => 'select',
        'options'    =>  array(
            '',
            'Pour un contrat de 2 mois' => 'Pour un contrat de 2 mois',
            'Pour un contrat de 4 mois' => 'Pour un contrat de 4 mois',
            'Pour un contrat de 6 mois' => 'Pour un contrat de 6 mois',
            'Pour un contrat de plus de 6 mois' => 'Pour un contrat de plus de 6 mois',
        ),
        'placeholder' => '',
        'description' => '',
        'required' => true,
        'priority' => 3,
    );

    $fields['job']['job_concerned_students'] = array (
        'label'       => __( 'Public concerné', 'job_manager' ),
        'type'        => 'select',
        'options'    =>  array(
            '',
            'Licence 3 et Master 2 PSM' => 'Licence 3 et Master 2 PSM',
            'Licence 3 PSM uniquement' => 'Licence 3 PSM uniquement',
            'Master 2 PSM uniquement' => 'Master 2 PSM uniquement',
        ),
        'placeholder' => '',
        'description' => '',
        'required' => true,
        'priority' => 4,
    );

    $fields['job']['job_title']['priority'] = 5;
    $fields['job']['job_title']['placeholder'] = 'Ex: "Assistant chef de projets"';

    $fields['job']['job_salary'] = array(
        'label'       => __( 'Salaire net (€)', 'job_manager'),
        'type'        => 'number',
        'required'    => false,
        'placeholder' => 'Ex : 1.000€',
        'priority'    => 6
    );

    $fields['job']['job_profile'] = array(
        'label'       => __( 'Profil recherché', 'job_manager' ),
        'type'        => 'wp-editor',
        'placeholder' => 'Ex: Assistant chef de projets polyvalent communication/développement-web',
        'description' => '',
        'required' => true,
        'priority' => 7,
    );

    $fields['job']['job_description']['priority'] = 8;

    $fields['job']['job_description']['label'] = 'Missions de l\'offre';

    $fields['job']['application']['priority'] = 9;
    $fields['job']['application']['type'] = 'email';
    $fields['job']['application']['placeholder'] = 'Ex: "vous@votredomaine.com"';

    $fields['job']['job_in_charge_of']= array(
        'label'       => __( 'Nom du responsable du stage', 'job_manager'),
        'type'        => 'text',
        'required'    => false,
        'placeholder' => 'Ex: "Nom Prénom" ou "Nom"',
        'priority'    => 10
    );

    //Compagny Fields (FRONT)
    unset($fields['company']['company_tagline']);
    unset($fields['company']['company_video']);
    unset($fields['company']['company_twitter']);
    unset($fields['company']['company_logo']);
    $fields['company']['company_name']['placeholder'] = 'Ex: Votre entreprise';
    $fields['company']['company_website']['type'] = 'url';
    $fields['company']['company_website']['placeholder'] = 'Ex: http://votredomaine.com';
    $fields['company']['compagny_adress']= array(
        'label'       => __( 'Adresse de l\'entreprise', 'job_manager'),
        'type'        => 'text',
        'required'    => true,
        'placeholder' => 'Ex: "54, Chemin Du Lavarin Sud"',
        'priority'    => 3
    );
    $fields['company']['compagny_cp']= array(
        'label'       => __( 'Code postal de l\'entreprise', 'job_manager'),
        'type'        => 'number',
        'required'    => true,
        'placeholder' => 'Ex: "06800"',
        'priority'    => 4
    );

    $fields['company']['compagny_city']= array(
        'label'       => __( 'Ville de l\'entreprise', 'job_manager'),
        'type'        => 'text',
        'required'    => true,
        'placeholder' => 'Ex: "CAGNES-SUR-MER"',
        'priority'    => 5
    );
    //var_dump($fields);
    return $fields;

});

//Display fields in admin
add_filter( 'job_manager_job_listing_data_fields', function($fields)  {
    //Job fields (ADMIN)
    unset($fields['_job_author']);

    $fields['_job_location']['label'] = 'Ville du poste';
    $fields['_job_location']['placeholder'] = 'Ex: "Paris"';
    $fields['_job_duration'] = array (
        'label'       => __( 'Durée', 'job_manager' ),
        'type'        => 'select',
        'options'    =>  array(
            '',
            'Pour un contrat de 2 mois' => 'Pour un contrat de 2 mois',
            'Pour un contrat de 4 mois' => 'Pour un contrat de 4 mois',
            'Pour un contrat de 6 mois' => 'Pour un contrat de 6 mois',
            'Pour un contrat de plus de 6 mois' => 'Pour un contrat de plus de 6 mois',
        ),
        'placeholder' => '',
        'description' => '',
        'required' => true,
        'priority' => 2,
    );

    $fields['_job_concerned_students'] = array (
        'label'       => __( 'Public concerné', 'job_manager' ),
        'type'        => 'select',
        'options'    =>  array(
            '',
            'Licence 3 et Master 2 PSM' => 'Licence 3 et Master 2 PSM',
            'Licence 3 PSM uniquement' => 'Licence 3 PSM uniquement',
            'Master 2 PSM uniquement' => 'Master 2 PSM uniquement',
        ),
        'placeholder' => '',
        'description' => '',
        'required' => true,
        'priority' => 3,
    );

    $fields['_job_salary'] = array(
        'label'       => __( 'Salaire net (€)', 'job_manager' ),
        'type'        => 'text',
        'placeholder' => 'Ex: 1.000 €',
        'description' => '',
        'priority' => 99,
    );

    $fields['_job_profile'] = array(
        'label'       => __( 'Profil recherché', 'job_manager' ),
        'type'        => 'textarea',
        'placeholder' => 'Ex: Assistant chef de projets polyvalent communication/développement-web',
        'description' => '',
        'required' => true,
        'priority' => 5,
    );

    $fields['_application']['priority'] = 6;
    $fields['_application']['type'] = 'text';

    $fields['_job_in_charge_of']= array(
        'label'       => __( 'Nom du responsable du stage', 'job_manager'),
        'type'        => 'text',
        'required'    => false,
        'placeholder' => 'Ex: "Nom Prénom" ou "Nom"',
        'priority'    => 7
    );

    //Compagny fields (ADMIN)
    unset($fields['_company_tagline']);
    unset($fields['_company_twitter']);
    unset($fields['_company_video']);
    unset($fields['_company_logo']);
    $fields['_company_name']['placeholder'] = 'Ex: Votre entreprise';
    $fields['_company_name']['priority'] = 8;
    $fields['_company_website']['placeholder'] = 'Ex: http://votredomaine.com';
    $fields['_company_website']['type'] = 'url';
    $fields['_company_website']['priority'] = 9;
    $fields['_compagny_adress']= array(
        'label'       => __( 'Adresse de l\'entreprise', 'job_manager'),
        'type'        => 'text',
        'required'    => true,
        'placeholder' => 'Ex: "54, Chemin Du Lavarin Sud"',
        'priority'    => 10
    );
    $fields['_compagny_cp']= array(
        'label'       => __( 'Code postal de l\'entreprise', 'job_manager'),
        'type'        => 'text',
        'required'    => true,
        'placeholder' => 'Ex: "06800"',
        'priority'    => 11
    );

    $fields['_compagny_city']= array(
        'label'       => __( 'Ville de l\'entreprise', 'job_manager'),
        'type'        => 'text',
        'required'    => true,
        'placeholder' => 'Ex: "CAGNES-SUR-MER"',
        'priority'    => 12
    );
    $fields['_filled']['priority'] = 13;
    $fields['_featured']['priority'] = 14;
    $fields['_job_expires']['priority'] = 15;
    //var_dump($fields);
    return $fields;
});

add_action( 'single_job_listing_meta_end', function() {
    global $post;
    $salary = get_post_meta( $post->ID, '_job_salary', true );
    if ( $salary ) {
        echo '<li>' . __( 'Salary:' ) . ' $' . esc_html( $salary ) . '</li>';
    }
});

//Remove some default Plugins field
add_filter( 'submit_job_form_fields', function( $fields ) {
    // Unset any of the fields you'd like to remove - copy and repeat as needed
    //var_dump($fields);
    unset( $fields['company']['company_tagline'] );
    unset( $fields['company']['company_twitter'] );
    unset( $fields['company']['company_video'] );
    unset( $fields['company']['company_logo'] );
    //var_dump($fields);
    // And return the modified fields
    return $fields;
});

add_action( 'job_manager_job_submitted', function($post) {
    $name = get_post_meta($post,'_job_in_charge_of',true);
    $email = get_post_meta($post,'_application',true);
    if( 'job_listing' != get_post_type( $post ) ) {
        return;
    }
    {{ App\Email_contents::job_manager_offer_submited($post, $name, $email);}}
});

add_action('pending_to_publish', 'listing_published_send_email');
add_action('pending_payment_to_publish', 'listing_published_send_email');

function listing_published_send_email($post) {
    $name = get_post_meta($post->ID,'_job_in_charge_of',true);
    $email = get_post_meta($post->ID,'_application',true);
    if( 'job_listing' != get_post_type( $post ) ) {
        return;
    }

    $job_manager_submission_duration = get_option('job_manager_submission_duration',true);
    setlocale (LC_TIME, 'fr_FR.UTF-8','fra');
    $timestamp = time() ;
    $timestamp = strtotime('+'.$job_manager_submission_duration. 'days', $timestamp);
    update_post_meta($post->ID,'_job_expires',utf8_encode(strftime('%Y-%m-%d', $timestamp)));

    {{ App\Email_contents::job_manager_offer_accepted($post, $name, $email, utf8_encode(strftime('%A %d %m %Y, %H:%M', $timestamp)));}}
}


