<?php
/*** Metabox for page, post ***/



add_action("add_meta_boxes", "add_page_settings_custom_meta_box");
add_action("save_post", "save_page_settings_custom_meta_box", 10, 3);

function add_page_settings_custom_meta_box($post){
	if(get_page_template_slug( $post->ID ) == "index.php") {
	add_meta_box("banner-meta-box", "Page Options", "banner_page_settings_box_markup", array('page'), "normal", "high", null);
}
}

function banner_page_settings_box_markup($post){
	if(get_page_template_slug( $post->ID ) == "index.php") {
	wp_nonce_field(basename(__FILE__), "page-settings-nonce");

	$imgExtra = get_post_meta( $post->ID, '_upimg', true );
	$imgBag = get_post_meta( $post->ID, '_upimg1', true );
	$imgBaglnk = get_post_meta( $post->ID, '_title_link', true );
	$logo = get_post_meta( $post->ID, '_uplogo', true );
	$insta = get_post_meta( $post->ID, '_insta', true );

	get_template_part('inc/upload-scripts');

	echo '<style type="text/css"> .page_settings_tbl td, .page_settings th{ padding: 7px 0px; } .page_settings textarea{ width: 25em;} </style>';
	echo '<table width="100%" class="page_settings" style="text-align: left;">';
		//echo get_admin_input('up_image', '_banner_image', 'Upload', $banner_image , '');
	echo get_admin_input('up_image', '_uplogo', 'Logo Image', $logo , '');
	echo get_admin_input('up_image', '_upimg', 'Mobile Banner Image', $imgExtra , '');
	echo get_admin_input('up_image', '_upimg1', 'Middle Banner Image', $imgBag , '');
	echo get_admin_input('text', '_title_link', 'Middle Banner Image Link', $imgBaglnk , '');
	echo get_admin_input('editor', '_insta', 'Instagram section', $insta , '');



	echo '</table>';
	}
}

function save_page_settings_custom_meta_box( $post_id ) {


	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	if ( in_array($_POST['post_type'], array('page','post','cpt-conditions')) ) {

		if ( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	}

	$fields = array( '_upimg1','_uplogo','_banner_title','_upimg','_insta','_title_link','section' );

	foreach( $fields as $field ) {
		if(isset($_POST[$field])){
			$value = ( $_POST[$field] );
			update_post_meta( $post_id, $field, $value );
		}
	}

}



// add_action("add_meta_boxes", "add_page_settings_custom_meta_box_sidebar");
// add_action("save_post", "save_page_settings_custom_meta_box_sidebar", 10, 3);

// function add_page_settings_custom_meta_box_sidebar(){
// 	add_meta_box("bannerds-meta-box", "Content Options", "banner_page_settings_box_markup_side", array('product'), "normal", "high", null);
// }

// function banner_page_settings_box_markup_side($post){
// 	wp_nonce_field(basename(__FILE__), "page-settings-nonce");


// 	$howTouse = get_post_meta( $post->ID, '_to_use', true );
// 	$prodShort = get_post_meta( $post->ID, '_prodShort', true );

// 	get_template_part('inc/upload-scripts');

// 	echo '<style type="text/css"> .page_settings_tbl td, .page_settings th{ padding: 7px 0px; } .page_settings textarea{ width: 25em;} </style>';
// 	echo '<table width="100%" class="page_settings" style="text-align: left;">';

// 	echo get_admin_input('editor', '_to_use', 'Secondary content', $howTouse , '');
// 	echo get_admin_input('textarea', '_prodShort', 'Product Short Description', $prodShort , '');


// 	echo '</table>';
// }

// function save_page_settings_custom_meta_box_sidebar( $post_id ) {

// 	if (!isset($_POST["page-settings-nonce"]) || !wp_verify_nonce($_POST["page-settings-nonce"], basename(__FILE__)))
//         return $post_id;

// 	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
// 		return $post_id;

// 	if ( in_array($_POST['post_type'], array('page')) ) {

// 		if ( !current_user_can( 'edit_page', $post_id ) )
// 			return $post_id;

// 	} else {

// 		if ( ! current_user_can( 'edit_post', $post_id ) )
// 		return $post_id;

// 	}

// 	$fields = array('_to_use','_prodShort');

// 	foreach( $fields as $field ) {
// 		if(isset($_POST[$field])){
// 			$value = ( $_POST[$field] );
// 			update_post_meta( $post_id, $field, $value );
// 		}
// 	}

// }


