<?php

namespace App;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
    public static function get_three_news(){
        query_posts('showposts=2');
        if (have_posts()) {
            while (have_posts()) : the_post();
                include \App\template_path(locate_template('views/partials/content-news.blade.php'));
            endwhile;
        } else{
            _e('Aucun article trouvé.');
        }
    }
}
