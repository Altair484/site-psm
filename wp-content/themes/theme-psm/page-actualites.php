<?php
/*
* Template Name: Blog
*/

get_header();
$max_post_per_page = get_option( 'posts_per_page' );
$wp_query = new WP_Query(array(
	'posts_per_page' => $max_post_per_page,
	'paged' => $paged,
	'page' => $page
));

if ($paged > $wp_query->max_num_pages){
	$wp_query->set_404();
	status_header( 404 );
	get_template_part( 404 );
	exit();
}
?>
<section id="page-news-section-news">
	<div class="row">
		<?php

		while ($wp_query->have_posts()) : $wp_query->the_post();
			if ($wp_query->current_post  < $max_post_per_page){
				get_template_part( 'template-parts/news/news', 'thumb' );
			} else {
				break;
			}?>
		<?php endwhile; ?>
	</div>
	<div class="row">
		<nav class="w-100 d-flex justify-content-center align-items-center">
		<?php if ($paged > 1) { ?>
			<?php previous_posts_link('&laquo; Précédent'); ?>&nbsp;
			<?php next_posts_link('Suivant &raquo;'); ?>&nbsp;
		<?php } else if ($paged == $wp_query->max_num_pages) { ?>
			<?php previous_posts_link('&laquo; Précédent'); ?>
		<?php } else { ?>
			<?php next_posts_link('Suivant &raquo;'); ?>&nbsp;
		<?php } ?>
		</nav>
	</div>


	<?php wp_reset_postdata(); ?>
</section>
<?php get_footer() ?>
