<?php

/*WP Job Manager add 1 field*/
add_filter( 'submit_job_form_fields', 'frontend_add_salary_field' );
function frontend_add_salary_field( $fields ) {
    $fields['job']['job_salary'] = array(
        'label'       => __( 'Salary ($)', 'job_manager' ),
        'type'        => 'text',
        //'options'    =>  array('', 'alabama' => 'Alabama', 'alaska' => 'Alaska', 'arizona' => 'Arizona', 'arkansas' => 'Arkansas', 'california' => 'California', 'colorado' => 'Colorad'),
        'required'    => true,
        'placeholder' => 'e.g. 20000',
        'priority'    => 7
    );
    return $fields;
}

add_filter( 'job_manager_job_listing_data_fields', 'admin_add_salary_field' );

function admin_add_salary_field( $fields ) {
    $fields['_job_salary'] = array(
        'label'       => __( 'Salary ($)', 'job_manager' ),
        'type'        => 'text',
        //'options'    =>  array('', 'alabama' => 'Alabama', 'alaska' => 'Alaska', 'arizona' => 'Arizona', 'arkansas' => 'Arkansas', 'california' => 'California', 'colorado' => 'Colorad'),
        'placeholder' => 'e.g. 20000',
        'description' => ''
    );
    return $fields;
}

add_action( 'single_job_listing_meta_end', 'display_job_salary_data' );

function display_job_salary_data() {
    global $post;

    $salary = get_post_meta( $post->ID, '_job_salary', true );

    if ( $salary ) {
        echo '<li>' . __( 'Salary:' ) . ' $' . esc_html( $salary ) . '</li>';
    }
}
/*/WP Job Manager add 1 field*/