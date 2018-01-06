<?php
/**
 * Content for job submission (`[submit_job_form]`) shortcode.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-submit.blade.php.
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

global $job_manager;
?>
<?php
if ( isset( $resume_edit ) && $resume_edit ) : ?>
    <div class="col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-3 no-padding">
        <div class="form-info">
            <div class="emoji">
                ℹ️
            </div>
            <div class="content-text">
                <p>Vous êtes en train d'éditer une offre déjà existante.</p>
                <a class="btn btn-psm-green" href="?new=1&key=<?php  _e($resume_edit) ?> ">Créer une nouvelle offre</a>
            </div>
        </div>
    </div>
<?php endif; ?>
<form action="<?php echo esc_url( $action ); ?>" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">
    <div class="col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-3 form-offer">

        <?php do_action( 'submit_job_form_start' ); ?>

        <?php /*if ( apply_filters( 'submit_job_form_show_signin', true ) ) :

            get_job_manager_template( 'account-signin.php' );

        endif; */?>

        <?php if ( job_manager_user_can_post_job() || job_manager_user_can_edit_job( $job_id ) ) : ?>

            <!-- Job Information Fields -->
            <?php do_action( 'submit_job_form_job_fields_start' ); ?>
            <div class="row <?php echo esc_attr( $key ); ?>">
                <div class="col-8 offset-lg-2">
                    <h3>Informations sur le stage</h3>
                </div>
            </div>

            <?php foreach ( $job_fields as $key => $field ) : ?>
                <div class="row <?php echo esc_attr( $key ); ?>">
                    <div class="col-12 col-md-4 offset-md-1 col-xl-3 offset-xl-2">
                        <label class="" for="<?php echo esc_attr( $key ); ?>">
                            <?php echo $field['label'] . apply_filters( 'submit_job_form_required_label', $field['required'] ? '<span style="color:#B81C23"> *</span>' : ' <small>' . __( '(optional)', 'wp-job-manager' ) . '</small>', $field ); ?>

                        </label>
                    </div>
                    <div class="col-12 col-md-6 col-xl-5 <?php echo $field['required'] ? 'required-field' : ''; ?>">
                        <?php get_job_manager_template( 'form-fields/' . $field['type'] . '-field.php', array( 'key' => $key, 'field' => $field ) ); ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php do_action( 'submit_job_form_job_fields_end' ); ?>
    </div>
    <div class="col-12 col-md-10 offset-md-1 offset-lg-1 col-xl-8 form-compagny">
        <!-- Company Information Fields -->
        <?php if ( $company_fields ) : ?>
            <div class="row <?php echo esc_attr( $key ); ?>">
                <div class="col-8 offset-lg-2">
                    <h3><?php _e( 'Détails de l\'entreprise', 'wp-job-manager' ); ?></h3>
                </div>
            </div>


            <?php do_action( 'submit_job_form_company_fields_start' ); ?>

            <?php foreach ( $company_fields as $key => $field ) : ?>
                <div class="row <?php echo esc_attr( $key ); ?>">
                    <div class="col-12 col-md-4 offset-md-1 col-xl-3 offset-xl-2">
                        <label for="<?php echo esc_attr( $key ); ?>"><?php echo $field['label'] . apply_filters( 'submit_job_form_required_label', $field['required'] ? '' : ' <small>' . __( '(optional)', 'wp-job-manager' ) . '</small>', $field ); ?></label>
                    </div>
                    <div class="col-12 col-md-6 col-xl-5 <?php echo $field['required'] ? 'required-field' : ''; ?>">
                        <?php get_job_manager_template( 'form-fields/' . $field['type'] . '-field.php', array( 'key' => $key, 'field' => $field ) ); ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php do_action( 'submit_job_form_company_fields_end' ); ?>
        <?php endif; ?>

        <?php do_action( 'submit_job_form_end' ); ?>

        <input type="hidden" name="job_manager_form" value="<?php echo $form; ?>" />
        <input type="hidden" name="job_id" value="<?php echo esc_attr( $job_id ); ?>" />
        <input type="hidden" name="step" value="<?php echo esc_attr( $step ); ?>" />
        <div class="col-12 col-sm-6 offset-sm-3 col-md-6 offset-md-6 col-lg-4 offset-lg-8">
            <input type="submit" name="submit_job" class="btn btn-psm-green" value="<?php echo esc_attr( $submit_button_text ); ?>" />
        </div>

    </div>
    <?php else : ?>

        <?php do_action( 'submit_job_form_disabled' ); ?>

    <?php endif; ?>
</form>
