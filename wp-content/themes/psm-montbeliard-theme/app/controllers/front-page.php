<?php

namespace App;

use Sober\Controller\Controller;
use WP_Query;

//Protect the file to direct Access wia url
if ( ! defined( 'ABSPATH' )) {
    header('Location: http://tinyurl.com/ydek4vj2');
    exit; // Exit if accessed directly
}
class FrontPage extends Controller
{
    public static function get_three_news(){
        $args = array(
            'showposts' => '3',
            'post_type'   => 'post'
        );
        $query = new WP_Query( $args );


        while ( $query->have_posts() ) {
            $query->the_post();
            include \App\template_path(locate_template('views/partials/content-news.blade.php'));
        }
        /* Restore original Post Data */
        wp_reset_query();
        wp_reset_postdata();
    }
}
