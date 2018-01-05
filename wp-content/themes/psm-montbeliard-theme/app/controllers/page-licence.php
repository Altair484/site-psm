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

class licence_psm extends Controller
{
    public function get_programme_licence_3(){
        $filter_dev_school_subjects = array(
            'orderby' => 'title',
            'order'   => 'ASC',
            'post_type' => 'school-subject',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'formation',
                    'field' => 'slug',
                    'terms' => 'licence-3-psm',
                ),
                array(
                    'taxonomy' => 'school-subject-cat',
                    'field'    => 'slug',
                    'terms'    => 'developpement',
                ),
            ),
        );

        $filter_project_managment_school_subjects = array(
            'orderby' => 'title',
            'order'   => 'ASC',
            'post_type' => 'school-subject',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'formation',
                    'field' => 'slug',
                    'terms' => 'licence-3-psm',
                ),
                array(
                    'taxonomy' => 'school-subject-cat',
                    'field'    => 'slug',
                    'terms'    => 'gestion-de-projets',
                ),
            ),
        );

        //todo: Replace "others" with the right name
        $filter_others_school_subjects = array(
            'orderby' => 'title',
            'order'   => 'ASC',
            'post_type' => 'school-subject',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'formation',
                    'field' => 'slug',
                    'terms' => 'licence-3-psm',
                ),
                array(
                    'taxonomy' => 'school-subject-cat',
                    'field'    => 'slug',
                    //todo: Replace "autres" with the right name
                    'terms'    => 'autres',
                ),
            ),
        );

        $wp_query['school-subject-dev'] = new WP_Query($filter_dev_school_subjects);
        $wp_query['school-subject-project-managment'] = new WP_Query($filter_project_managment_school_subjects);
        //todo: Replace "others" with the right name
        $wp_query['school-subject-others'] = new WP_Query($filter_others_school_subjects);

        return $wp_query;
    }

    public function get_school_subjects_list(){
        $cat_school_subjects = get_terms(
            array(
                'taxonomy' => 'school-subject-cat',
                'hide_empty' => false,
            ));

        return $cat_school_subjects;
    }
}