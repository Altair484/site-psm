<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();

//var_dump($wp_query);
?>

<section  id="page-news-single-section-news">
    <article>
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="row header" style="background-image: url('<?php echo get_stylesheet_directory_uri().'/assets/img/1920-300-city-1.jpg'?>');">
            <div class="filter"></div>
            <div class="header-content">
                <h1><?php the_title()?></h1>
                <p class="date"><?php echo get_the_date() ?>
                <p class="author"><?php _e(get_the_author_meta( 'first_name' ). ' ' . get_the_author_meta( 'last_name' ))?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-7 offset-xl-1 content">
                <?php edit_post_link(); ?>
                <?php the_content() ?>
                <?php
                the_post_navigation( array(
                    'prev_text' => '<span class="btn btn-psm"><i class="fa fa-arrow-left"></i> %title</span>',
                    'next_text' => '<span class="btn btn-psm">%title <i class="fa fa-arrow-right"></i></span>',
                    'screen_reader_text' => __( 'Continuez de lire' ),
                ) ); ?>
            </div>
            <div class="col-12 col-lg-4 col-xl-3 sidebar">
                <?php the_post_thumbnail() ?>
                <div class="post-tags">
                    <?php
                    $posttags = get_the_tags();
                    if ($posttags) {
                        foreach($posttags as $key => $value) {
                            if ($key <= 8) {?>
                                <span class="tag"><i class="fa fa-tag"></i> <?php echo $value->name; ?></span>
                            <?php }
                        }
                    }?>
                </div>
                <div class="other-news">
                    <h3>Autres articles</h3>
                    <?php echo do_shortcode('[wpb-random-posts]');?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </article>
</section>


<?php get_footer();

