<?php add_action('init', 'create_moments', 0);

function create_moments() {
    $labels = array(
        'name' => _x('Moments', 'post type general name'),
        'singular_name' => _x('Moments', 'post type singular name'),
        'add_new' => _x('Add Moments', 'moments'),
        'add_new_item' => __('Add Moments'),
        'edit_item' => __('Edit Moments'),
        'new_item' => __('New Moments'),
        'view_item' => __('View Moments'),
        'search_items' => __('Search Moments'),
        'not_found' => __('No Moments found'),
        'not_found_in_trash' => __('No Moments found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'moment','with_front' => FALSE,),
        'capability_type' => 'post',
        'hierarchical' => true,
        'menu_position' => 7,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
    );

    register_post_type('moments', $args);
    //Register the case_studies_categories taxonomy.
    register_taxonomy("moments_categories", "moments", array("hierarchical" => true,
        "label" => "Moments Categories",
        "singular_label" => "Moments Categories",
        'rewrite' => array('slug' => 'moments','with_front' => FALSE,),
        "query_var" => true,
        "show_ui" => true
            )
    );

}
?>
