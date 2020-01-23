<?php add_action('init', 'create_location', 0);

function create_location() {
    $labels = array(
        'name' => _x('Store Location', 'post type general name'),
        'singular_name' => _x('Store Location', 'post type singular name'),
        'add_new' => _x('Add Store Location', 'location'),
        'add_new_item' => __('Add Store Location'),
        'edit_item' => __('Edit Store Location'),
        'new_item' => __('New Store Location'),
        'view_item' => __('View Store Location'),
        'search_items' => __('Search Store Location'),
        'not_found' => __('No Store Location found'),
        'not_found_in_trash' => __('No location found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'location','with_front' => FALSE,),
        'capability_type' => 'post',
        'hierarchical' => true,
        'menu_position' => 7,
        'menu_icon'=>'dashicons-media-document',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
    );

    register_post_type('location', $args);
    register_taxonomy("location_cat", "location", array("hierarchical" => true,
        "label" => "Store Location Categories",
        "singular_label" => "location",
        'rewrite' => array('slug' => 'location','with_front' => FALSE,),
        "query_var" => true,

        "show_ui" => true
            )
    );

}
?>
