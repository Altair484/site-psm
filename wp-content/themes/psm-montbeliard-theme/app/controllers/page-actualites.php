<?php
namespace App;

use WP_Query;
use Sober\Controller\Controller;

//Protect the file to direct Access wia url
if ( ! defined( 'ABSPATH' )) {
    header('Location: http://tinyurl.com/ydek4vj2');
    exit; // Exit if accessed directly
}
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