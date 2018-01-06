<?php
/**
 * Notice when job has been submitted.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-submitted.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @version     1.20.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_post_types;?>
    <style>#page_espace_pro_section_header,#page-espace-pro-section-info{ display: none }</style>
<?php switch ( $job->post_status ) :
	case 'publish' :
		printf( __( '%s listed successfully. To view your listing <a href="%s">click here</a>.', 'wp-job-manager' ), $wp_post_types['job_listing']->labels->singular_name, get_permalink( $job->ID ) );
	break;
	case 'pending' : ?>

        <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="form-success" style="max-width: 600px">
                <div class="emoji">
                    😄
                </div>
                <div class="content-text">
                    <p>Poste soumis avec succès. Votre poste sera visible après validation. </p>
                    <a class="btn btn-psm-green" style="padding-top: 15px" href="<?php echo site_url() ?>">Terminer</a>
                </div>
            </div>
        </div>

    <?php break;
	default :
		do_action( 'job_manager_job_submitted_content_' . str_replace( '-', '_', sanitize_title( $job->post_status ) ), $job );
	break;
endswitch;

do_action( 'job_manager_job_submitted_content_after', sanitize_title( $job->post_status ), $job );