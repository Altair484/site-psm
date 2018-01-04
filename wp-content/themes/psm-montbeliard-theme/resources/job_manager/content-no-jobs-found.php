<?php
/**
 * Notice when no jobs were found in `[jobs]` shortcode.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-no-jobs-found.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.20.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php if ( defined( 'DOING_AJAX' ) ) : ?>
    <div class="job-manager-info">
        <p>Aucune offre ne correspond à votre recherche.</p>
    </div>
<?php else : ?>
    <div class="job-manager-info">
        <p>Aucune offre ne correspond à votre recherche.</p>
    </div>
<?php endif; ?>