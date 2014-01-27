<?php
/*
    Custom Taxonomy for Artifacts, which represent
    media Formats such as audio files, videos,
    interviews, etc.
*/


add_action( 'init', 'register_taxonomy_formats' );

function register_taxonomy_formats() {

    $labels = array(
        'name' => _x( 'Formats', 'Formats' ),
        'singular_name' => _x( 'Format', 'Formats' ),
        'search_items' => _x( 'Search Formats', 'Formats' ),
        'popular_items' => _x( 'Popular Formats', 'Formats' ),
        'all_items' => _x( 'All Formats', 'Formats' ),
        'parent_item' => _x( 'Parent Format', 'Formats' ),
        'parent_item_colon' => _x( 'Parent Format:', 'Formats' ),
        'edit_item' => _x( 'Edit Format', 'Formats' ),
        'update_item' => _x( 'Update Format', 'Formats' ),
        'add_new_item' => _x( 'Add New Format', 'Formats' ),
        'new_item_name' => _x( 'New Format', 'Formats' ),
        'separate_items_with_commas' => _x( 'Separate Formats with commas', 'Formats' ),
        'add_or_remove_items' => _x( 'Add or remove Formats', 'Formats' ),
        'choose_from_most_used' => _x( 'Choose from the most used Formats', 'Formats' ),
        'menu_name' => _x( 'Formats', 'Formats' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => false,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'Formats', array('artifact'), $args );
}

?>