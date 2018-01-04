<article class="news col-12 col-sm-6 col-xl-3 no-padding">
    <div class="thumbnail">
        <figure>
            <a href="<?php the_permalink()?>">
                <?php
                $default_img = get_stylesheet_directory_uri().'/assets/img/960-540-abstract-'. rand(1,6).'.jpg';
                if (has_post_thumbnail()) {
                    echo(the_post_thumbnail());
                } else {
                    echo('<img src="'. $default_img.'">');
                }
                ?>
            </a>
        </figure>
        <span class="line"></span>
    </div>
    <div class="text-news-container col-12">
        <h3><?php the_title() ?></h3>
        <p class="date"><?php echo get_the_date() ?></p>
        <p class="excerpt"><?php echo get_the_excerpt() ?></p>
    </div>
</article>