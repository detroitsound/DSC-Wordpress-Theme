<?php
/*
    Custom Post Type for Artifacts, which represent
    individual pieces of stored and archived content
    such as audio files, videos, interviews, etc.
*/


add_action( 'init', 'register_cpt_artifact' );

function register_cpt_artifact() {

    $labels = array(
        'name' => _x( 'Artifacts', 'artifact' ),
        'singular_name' => _x( 'Artifact', 'artifact' ),
        'add_new' => _x( 'Add New', 'artifact' ),
        'add_new_item' => _x( 'Add New Artifact', 'artifact' ),
        'edit_item' => _x( 'Edit Artifact', 'artifact' ),
        'new_item' => _x( 'New Artifact', 'artifact' ),
        'view_item' => _x( 'View Artifact', 'artifact' ),
        'search_items' => _x( 'Search Artifacts', 'artifact' ),
        'not_found' => _x( 'No artifacts found', 'artifact' ),
        'not_found_in_trash' => _x( 'No artifacts found in Trash', 'artifact' ),
        'parent_item_colon' => _x( 'Parent Artifact:', 'artifact' ),
        'menu_name' => _x( 'Artifacts', 'artifact' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Pieces of the Detroit Sound Conservancy Collection',
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'comments', 'revisions' ),
        'taxonomies' => array( 'post_tag', 'formats', 'collections' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,

        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'artifact', $args );
}

?>