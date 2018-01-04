<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return '<a href="' . get_permalink() . '">' . __('&nbsp;[&hellip;]', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Tell WordPress how to find the compiled path of comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );
    return template_path(locate_template(["views/{$comments_template}", $comments_template]) ?: $comments_template);
});

//Page nav class
add_filter('next_posts_link_attributes', function() {
    return 'class="btn btn-psm"';
});
add_filter('previous_posts_link_attributes', function() {
    return 'class="btn btn-psm"';
});

/**
 * Get nav items to do specific modifications on each items in navbar
 */
add_filter( 'wp_get_nav_menu_items',function( $items) {
    foreach( $items as $item )
    {
        if( 'Master' == $item->title){
            $item->url .= '?formation=m1';
        }

        if((is_page('master') || is_page('licence')) && 'Formations' == $item->title){
            $item->classes = 'current-menu-item';
        }

        if((is_page('connexion') || is_page('inscription')) && 'dropdownLogs' == $item->classes[0]){
            $item->classes = 'current-menu-item';
        }
    }
    return $items;
}, 11, 3 );

/**
 * Redirections
 */








