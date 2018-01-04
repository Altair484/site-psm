<?php
function wpb_rand_posts()
{
    $args = array(
        'post_type' => 'post',
        'orderby' => 'rand',
        'showposts' => 2,
    );

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post(); ?>
            <div class="thumbnail">
                <figure>
                    <a href="<?php echo get_the_permalink() ?>">
                        <?php $default_img = get_stylesheet_directory_uri().'/assets/img/960-540-abstract-'. rand(1,6).'.jpg';
                        if (has_post_thumbnail()) {
                            echo(the_post_thumbnail());
                        } else {
                            echo('<img src="'. $default_img.'">');
                        } ?>
                    </a>
                </figure>
                <span class="line"></span>
            </div>
            <a href="<?php the_permalink()?>"><h4><?php echo the_title(); ?></h4></a>
        <?php }
        wp_reset_postdata();
    } else {
        echo 'no posts found';
    }
}
add_shortcode('wpb-random-posts','wpb_rand_posts');
add_filter('widget_text', 'do_shortcode');
?>