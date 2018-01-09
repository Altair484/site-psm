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

class master_psm extends Controller
{
    public function get_programme_master_1(){
        $filter_dev_school_subjects = array(
            'orderby' => 'title',
            'order'   => 'ASC',
            'post_type' => 'school-subject',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'formation',
                    'field' => 'slug',
                    'terms' => 'master-1-psm',
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
                    'terms' => 'master-1-psm',
                ),
                array(
                    'taxonomy' => 'school-subject-cat',
                    'field'    => 'slug',
                    'terms'    => 'gestion-de-projets',
                ),
            ),
        );

        $filter_communication_school_subjects = array(
            'orderby' => 'title',
            'order'   => 'ASC',
            'post_type' => 'school-subject',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'formation',
                    'field' => 'slug',
                    'terms' => 'master-1-psm',
                ),
                array(
                    'taxonomy' => 'school-subject-cat',
                    'field'    => 'slug',
                    'terms'    => 'communication',
                ),
            ),
        );

        $wp_query['school-subject-dev'] = new WP_Query($filter_dev_school_subjects);
        $wp_query['school-subject-project-managment'] = new WP_Query($filter_project_managment_school_subjects);
        $wp_query['school-subject-communication'] = new WP_Query($filter_communication_school_subjects);

        return $wp_query;
    }

    public function get_programme_master_2(){
        $filter_dev_school_subjects = array(
            'orderby' => 'title',
            'order'   => 'ASC',
            'post_type' => 'school-subject',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'formation',
                    'field' => 'slug',
                    'terms' => 'master-2-psm',
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
                    'terms' => 'master-2-psm',
                ),
                array(
                    'taxonomy' => 'school-subject-cat',
                    'field'    => 'slug',
                    'terms'    => 'gestion-de-projets',
                ),
            ),
        );

        $filter_communication_school_subjects = array(
            'orderby' => 'title',
            'order'   => 'ASC',
            'post_type' => 'school-subject',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'formation',
                    'field' => 'slug',
                    'terms' => 'master-2-psm',
                ),
                array(
                    'taxonomy' => 'school-subject-cat',
                    'field'    => 'slug',
                    'terms'    => 'communication',
                ),
            ),
        );

        $wp_query['school-subject-dev'] = new WP_Query($filter_dev_school_subjects);
        $wp_query['school-subject-project-managment'] = new WP_Query($filter_project_managment_school_subjects);
        $wp_query['school-subject-communication'] = new WP_Query($filter_communication_school_subjects);

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