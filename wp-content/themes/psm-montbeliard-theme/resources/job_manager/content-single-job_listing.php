<?php
/**
 * Single job listing.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-single-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.28.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;
?>
<div class="row single_job_listing">
	<?php if ( get_option( 'job_manager_hide_expired_content', 1 ) && 'expired' === $post->post_status ) : ?>
		<div class="job-manager-info"><?php _e( 'This listing has expired.', 'wp-job-manager' ); ?></div>
	<?php else : ?>
        <div class="col-12 col-xl-6 offset-xl-1 job_listing_preview">
            <div class="row">
                <div class="col-12 no-padding">
                    <h1><?php _e( wpjm_the_job_title(), 'wp-job-manager' ); ?></h1>
                    <h2><?php _e( 'Profil recherché', 'wp-job-manager' ); ?></h2>
                    <div class="job_profile">
                        <?php echo(wpautop(get_post_meta($post->ID, '_job_profile', true))) ?>
                    </div>
                    <h2><?php _e( 'Missions de l\'offre', 'wp-job-manager' ); ?></h2>
                    <div class="job_description">
                        <?php wpjm_the_job_description(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4 modality_listing_preview">
            <h2><?php _e( 'Modalités', 'wp-job-manager' ); ?></h2>

            <table>
                <tr>
                    <td><i class="fa fa-briefcase"></i></td>
                    <td>
                        <p><strong> Type de contrat</strong>:
                            <?php wpjm_the_job_types() ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><i class="fa fa-map-marker"></i></td>
                    <td>
                        <p>
                            <strong>Lieu du poste</strong>:
                            <span><?php the_job_location() ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><i class="fa fa-clock-o"></i></td>
                    <td>
                        <p>
                            <strong>Durée</strong>:
                            <?php _e(get_post_meta($post->ID, '_job_duration', true)) ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><i class="fa fa-rocket"></i></i></td>
                    <td>
                        <p>
                            <strong> Nom de l'offre</strong>:
                            <span><?php wpjm_the_job_title() ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><i class="fa fa-graduation-cap"></i></i></td>
                    <td>
                        <p>
                            <strong> Public concerné</strong>:
                            <?php _e(get_post_meta($post->ID, '_job_concerned_students', true)) ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><i class="fa fa-eur"></i></td>
                    <td>
                        <p>
                            <strong> Rémunération</strong>:
                            <?php if(!empty(get_post_meta($post->ID, '_job_salary', true) ? _e(get_post_meta($post->ID, '_job_salary', true) . '€') : _e('Non renseigné') )) ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><i class="fa fa-envelope"></i></td>
                    <td>
                        <p>
                            <strong> Courriel de candidature</strong>:
                            <?php _e(get_post_meta($post->ID, '_application', true)) ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><i class="fa fa-user"></i></td>
                    <td>
                        <p>
                            <strong> Responsable de l'offre</strong>:
                            <span><?php _e(get_post_meta($post->ID, '_job_in_charge_of', true)) ?></span>
                        </p>
                    </td>
                </tr>
            </table>

            <h2><?php _e( 'Informations sur l\'entreprise', 'wp-job-manager' ); ?></h2>
            <table>
                <tr>
                    <td><i class="fa fa-user"></i></td>
                    <td>
                        <p>
                            <strong>Nom</strong>:
                            </span><?php the_company_name() ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><i class="fa fa-globe"></i></td>
                    <td>
                        <p><strong>Site</strong>:
                            <?php if( get_the_company_website() == ''): ?>
                                <span>Non renseigné</span>
                            <?php else : ?>
                                <a class="compagny-website" href="<?php _e(get_the_company_website()) ?>" target="_blank"><?php _e(get_the_company_website()) ?></a>
                            <?php endif ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><i class="fa fa-building"></i></td>
                    <td>
                        <p>
                            <strong>Adresse</strong>:
                            <span><?php _e(get_post_meta($post->ID, '_compagny_adress', true)) ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><i class="fa fa-map-o"></i></td>
                    <td>
                        <p>
                            <strong>Code Postal</strong>:
                            <?php _e(get_post_meta($post->ID, '_compagny_cp', true)) ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><i class="fa fa-map-marker"></i></td>
                    <td>
                        <p><strong>Ville</strong>:
                            <a href="https://www.google.com/maps?q=<?php _e(get_post_meta($post->ID, '_compagny_city', true)) ?>&zoom=14&size=512x512&maptype=roadmap&sensor=false" target="_blank">
                                <?php _e(get_post_meta($post->ID, '_compagny_city', true)) ?>
                            </a>
                       </p>
                    </td>
                </tr>
            </table>
        </div>

        <div class="col-12 col-xl-6 offset-xl-1 no-padding">
            <div class="row buttons-job-preview">
                <?php if ($post->post_status == 'preview') :?>
                    <div class="col-12 col-md-6 col-xl-4 offset-xl-1">
                        <input type="submit" name="continue" id="job_preview_submit_button" class="btn btn-psm-green" value="<?php echo apply_filters( 'submit_job_step_preview_submit_text', __( 'Poster', 'wp-job-manager' ) ); ?>" />
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 offset-xl-2">
                        <input type="submit" name="edit_job" class="btn btn-psm-green" value="<?php _e( 'Modifier', 'wp-job-manager' ); ?>" />
                    </div>
                <?php elseif ($post->post_status == 'publish'): ?>
                    <?php if ( candidates_can_apply() ) : ?>
                        <?php get_job_manager_template( 'job-application.php' ); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
	<?php endif; ?>
</div>
