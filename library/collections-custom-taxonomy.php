<?php
/*
    Custom Post Type for Artifacts, which represent
    individual pieces of stored and archived content
    such as audio files, videos, interviews, etc.
*/

add_action( 'init', 'register_taxonomy_collections' );

function register_taxonomy_collections() {

    $labels = array(
        'name' => _x( 'Collections', 'collections' ),
        'singular_name' => _x( 'Collection', 'collections' ),
        'search_items' => _x( 'Search Collections', 'collections' ),
        'popular_items' => _x( 'Popular Collections', 'collections' ),
        'all_items' => _x( 'All Collections', 'collections' ),
        'parent_item' => _x( 'Parent Collection', 'collections' ),
        'parent_item_colon' => _x( 'Parent Collection:', 'collections' ),
        'edit_item' => _x( 'Edit Collection', 'collections' ),
        'update_item' => _x( 'Update Collection', 'collections' ),
        'add_new_item' => _x( 'Add New Collection', 'collections' ),
        'new_item_name' => _x( 'New Collection', 'collections' ),
        'separate_items_with_commas' => _x( 'Separate collections with commas', 'collections' ),
        'add_or_remove_items' => _x( 'Add or remove collections', 'collections' ),
        'choose_from_most_used' => _x( 'Choose from the most used collections', 'collections' ),
        'menu_name' => _x( 'Collections', 'collections' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => false,
        'show_admin_column' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'collections', array('artifact'), $args );
}

require_once('custom-post-type-menu.php'); // Formats Custom Taxonomy

?>