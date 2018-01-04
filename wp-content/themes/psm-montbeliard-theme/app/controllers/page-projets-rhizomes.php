<?php
/**
 * Created by IntelliJ IDEA.
 * User: jeffj
 * Date: 09/12/2017
 * Time: 18:51
 */

namespace App;

use WP_Query;
use Sober\Controller\Controller;

class Projets_rhizomes extends Controller
{
    public function get_projects(){
        $args = array(
            'post_type' => 'project',
            'tax_query' => array(
            array (
                'taxonomy' => 'project_type',
                'field' => 'slug',
                'terms' => 'projets-rhizome',
            )
        ));

        $wp_query = new WP_Query($args);

        return $wp_query;
    }
}