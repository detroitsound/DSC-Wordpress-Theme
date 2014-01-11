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

/* Custom Fields on Post */

// Add the Meta Box
function add_artifact_metadata() {
    add_meta_box(
        'artifact_metadata', // $id
        'Artifact Metadata', // $title
        'show_artifact_metadata', // $callback
        'artifact', // $page
        'normal', // $context
        'high'); // $priority
}
add_action('add_meta_boxes', 'add_artifact_metadata');

//Add Datepicker
if(is_admin()) {
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('jquery-ui-custom', get_template_directory_uri().'/stylesheets/admin-styles.css');
}


// Field Array
$prefix = 'artifact_metadata_';
$artifact_metadata_fields = array(
    'type' => array(
        'label'=> 'Type of Material',
        'type'  => 'text',
        'desc' => 'Audio, Video, Photo, Text, ect.'
    ),
    'date' => array(
        'label' => 'Date',
        'type'  => 'date',
        'desc' => 'Date of Recording',
        'itemprop' => 'dateCreated'
    ),
    'related_names' => array(
        'label'=> 'Related Names',
        'type'  => 'text'
    ),
    'description' => array(
        'label'=> 'Description',
        'type'  => 'text',
        'desc' => 'Description of the material (ex. mp3, 1mins 30secs)'
    ),
    'rights' => array(
        'label'=> 'Rights Advisory',
        'type'  => 'text'
    ),
    'summary' => array(
        'label'=> 'Summary',
        'type'  => 'textarea'
    ),
    'notes' => array(
        'label'=> 'Notes',
        'type'  => 'textarea'
    ),
    'index' => array(
        'label'=> 'Index',
        'type'  => 'text'
    ),
    'cite' => array(
        'label'=> 'Cite As',
        'type'  => 'text',
        'desc' => 'MLA format for citation',
        'itemprop' => 'citation'
    ),
    'performer' => array(
        'label'=> 'Performer',
        'type'  => 'text',
        'itemprop' => 'creator'
    ),
    'source' => array(
        'label'=> 'Acquisition Source',
        'type'  => 'text'
    ),
    'subjects' => array(
        'label'=> 'Subjects',
        'type'  => 'text'
    ),
    'genre' => array(
        'label'=> 'Form/Genre',
        'type'  => 'text',
        'itemprop' => 'genre'
    ),
    'repository' => array(
        'label'=> 'Repository',
        'type'  => 'text'
    )

);

function print_artifact_metadata($id, $artifact_metadata_array) {
    global $artifact_metadata_fields;
    if ($artifact_metadata_fields[$id]['metadata']) {
        echo '<strong class="artifact-metadata" itemprop="'.$artifact_metadata_fields[$id]['metadata'].'">';
    }
    else {
        echo'<strong class="artifact-metadata">';
    }
    echo $artifact_metadata_fields[$id]['label'].':</strong>'.$artifact_metadata_array['artifact_metadata_'.$id][0];
}


// The Callback
function show_artifact_metadata() {
    global $artifact_metadata_fields, $post, $prefix;
    // Use nonce for verification
    echo '<input type="hidden" name="artifact_metadata_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($artifact_metadata_fields as $metadata => $metadata_values ) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $prefix.$metadata, true);
        // begin a table row with
        echo '<tr>
                <th><label for="'.$prefix.$metadata.'">'.$metadata_values['label'].'</label></th>
                <td>';
                switch($metadata_values['type']) {
                    // case items will go here

                    // text
                    case 'text':
                        echo '<input type="text" name="'.$prefix.$metadata.'" id="'.$prefix.$metadata.'" value="'.$meta.'" size="30" />';
                    break;

                    // textarea
                    case 'textarea':
                        echo '<textarea name="'.$prefix.$metadata.'" id="'.$prefix.$metadata.'">'.$meta.'</textarea>';
                    break;

                    case 'date':
                        echo '<input type="text" class="datepicker" name="'.$prefix.$metadata.'" id="'.$prefix.$metadata.'" value="'.$meta.'" size="30" />';
                    break;


                } //end switch
                if ($metadata_values['desc']) {
                    echo '<br /><span class="description">'.$metadata_values['desc'].'</span>';
                }
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}

// Save the Data
function save_artifact_metadata($post_id) {
    global $artifact_metadata_fields, $prefix;
    // verify nonce
    if (!wp_verify_nonce($_POST['artifact_metadata_nonce'], basename(__FILE__)))
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }

    // loop through fields and save the data
    foreach ($artifact_metadata_fields as $metadata => $metadata_values) {
        $old = get_post_meta($post_id, $prefix.$metadata, true);
        $new = $_POST[$prefix.$metadata];
        if ($new && $new != $old) {
            update_post_meta($post_id, $prefix.$metadata, $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $prefix.$metadata, $old);
        }
    } // end foreach
}
add_action('save_post', 'save_artifact_metadata');

function add_custom_scripts() {
    global $artifact_metadata_fields, $post;

    $output = '<script type="text/javascript">
                jQuery(function() {';

    foreach ($artifact_metadata_fields as $metadata => $metadata_values) { // loop through the fields looking for certain types
        if($metadata_values['type'] == 'date')
            $output .= 'jQuery(".datepicker").datepicker();';
    }

    $output .= '});
        </script>';

    echo $output;
}
add_action('admin_head','add_custom_scripts');
?>