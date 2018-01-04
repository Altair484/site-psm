<?php
/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.27.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;
?>
<div <?php job_listing_class("col-12 col-md-6 col-xl-4 offer"); ?> data-longitude="<?php echo esc_attr( $post->geolocation_lat ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_long ); ?>">
    <div class="offer-content">
        <h3><?php wpjm_the_job_title(); ?></h3>
        <p class="compagny"><?php the_company_name( '<strong>', '</strong> ' ); ?></p>
        <p class="location">
            <?php if ( get_option( 'job_manager_enable_types' ) ) { ?>
                <?php $types = wpjm_get_the_job_types(); ?>
                <?php if ( ! empty( $types ) ) : foreach ( $types as $type ) : ?>
                    <?php echo esc_html( $type->name ); ?>
                <?php endforeach; endif; ?>
            <?php } ?>-
            <?php the_job_location( false ); ?>
        </p>
        <div class="excerpt">
            <?php wpautop(the_excerpt()); ?>
        </div>
        <p class="date"><?php the_job_publish_date(); ?></p>
        <div class="btn-container">
            <a href="<?php the_job_permalink(); ?>" class="btn btn-psm-green">En savoir plus</a>
        </div>

    </div>
</div>



