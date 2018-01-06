<?php
/**
 * Job listing preview when submitting job listings.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-preview.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @version     1.27.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<style>
    #page-espace-pro-section-info{ display: none }
</style>

<form method="post" id="job_preview" action="<?php echo esc_url( $form->get_action() );?>">
    <div class="col-12 col-md-12 col-xl-6 offset-xl-1 no-padding">
        <div class="form-info">
            <div class="emoji">
                ℹ️
            </div>
            <div class="content-text">
                <p>Pour soumettre l'offre, cliquez sur "Poster"</p>
            </div>
        </div>
    </div>
    <?php get_job_manager_template_part( 'content-single', 'job_listing' ); ?>

    <input type="hidden" name="job_id" value="<?php echo esc_attr( $form->get_job_id() ); ?>" />
    <input type="hidden" name="step" value="<?php echo esc_attr( $form->get_step() ); ?>" />
    <input type="hidden" name="job_manager_form" value="<?php echo $form->get_form_name(); ?>" />
</form>
