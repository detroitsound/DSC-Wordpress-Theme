<?php
/*
    Custom Taxonomy for Artifacts, which represent
    media formats such as audio files, videos,
    interviews, etc.
*/


add_action( 'init', 'register_taxonomy_formats' );

function register_taxonomy_formats() {

    $labels = array(
        'name' => _x( 'formats', 'formats' ),
        'singular_name' => _x( 'Format', 'formats' ),
        'search_items' => _x( 'Search formats', 'formats' ),
        'popular_items' => _x( 'Popular formats', 'formats' ),
        'all_items' => _x( 'All formats', 'formats' ),
        'parent_item' => _x( 'Parent Format', 'formats' ),
        'parent_item_colon' => _x( 'Parent Format:', 'formats' ),
        'edit_item' => _x( 'Edit Format', 'formats' ),
        'update_item' => _x( 'Update Format', 'formats' ),
        'add_new_item' => _x( 'Add New Format', 'formats' ),
        'new_item_name' => _x( 'New Format', 'formats' ),
        'separate_items_with_commas' => _x( 'Separate formats with commas', 'formats' ),
        'add_or_remove_items' => _x( 'Add or remove formats', 'formats' ),
        'choose_from_most_used' => _x( 'Choose from the most used formats', 'formats' ),
        'menu_name' => _x( 'formats', 'formats' ),
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

    register_taxonomy( 'formats', array('artifact'), $args );
}

?>