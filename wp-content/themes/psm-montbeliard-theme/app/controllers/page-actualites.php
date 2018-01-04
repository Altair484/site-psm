<?php
namespace App;

use WP_Query;
use Sober\Controller\Controller;

class Actualites extends Controller
{
    public function load_news(){
        global $paged;
        $max_post_per_page = get_option( 'posts_per_page' );
        $wp_query = new WP_Query(array(
            'posts_per_page' => $max_post_per_page,
            'paged' => $paged
        ));

        return $wp_query;
    }
}