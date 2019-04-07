<?php
add_action('init', 'register_post_types');
function register_post_types()
{
    register_post_type('events', array(
        'label' => null,
        'labels' => array(
            'name' => 'events',
            'singular_name' => 'event',
            'add_new' => 'add new event',
            'add_new_item' => 'add new event item',
            'edit_item' => 'edit event',
            'new_item' => 'new item event',
            'view_item' => 'view item event',
            'search_items' => 'search items',
            'not_found' => 'not found',
            'not_found_in_trash' => 'Not found in trash',
            'parent_item_colon' => '',
            'menu_name' => 'Events',
        ),
        'description' => '',
        'public' => true,
        'publicly_queryable' => null,
        'exclude_from_search' => null,
        'show_ui' => null,
        'show_in_menu' => null,
        'show_in_admin_bar' => null,
        'show_in_nav_menus' => null,
        'show_in_rest' => null,
        'rest_base' => null,
        'menu_position' => null,
        'menu_icon' => null,
        'hierarchical' => false,
        'supports' => array('title'),
        'taxonomies' => array('category'),
        'has_archive' => true,
        'query_var' => true,
        'rewrite' => true,
    ));

    register_post_type('news', array(
        'label' => null,
        'labels' => array(
            'name' => 'news',
            'singular_name' => 'news',
            'add_new' => 'add new news',
            'add_new_item' => 'add new news item',
            'edit_item' => 'edit news',
            'new_item' => 'new item news',
            'view_item' => 'view item news',
            'search_items' => 'search items',
            'not_found' => 'not found',
            'not_found_in_trash' => 'Not found in trash',
            'parent_item_colon' => '',
            'menu_name' => 'news',
        ),
        'description' => '',
        'public' => true,
        'publicly_queryable' => null,
        'exclude_from_search' => null,
        'show_ui' => null,
        'show_in_menu' => null,
        'show_in_admin_bar' => null,
        'show_in_nav_menus' => null,
        'show_in_rest' => null,
        'rest_base' => null,
        'menu_position' => null,
        'menu_icon' => null,
        'hierarchical' => false,
        'supports' => array('title', 'editor'),
        'taxonomies' => array(),
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
    ));
}

function get_custom_post_type_template($template)
{
    global $post;

    if ($post->post_type == 'events') {
        $template = dirname(__FILE__) . '/archive-events.php';
    }
    return $template;
}

add_filter("archive_template", "get_custom_post_type_template");

wp_enqueue_style ('theme-style', get_template_directory_uri().'/css/style.css');



