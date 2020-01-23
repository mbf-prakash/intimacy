<?php
/*** Metabox for page, post ***/

add_action("add_meta_boxes", "add_page_settings_common_meta_box");
add_action("save_post", "save_page_settings_common_meta_box", 10, 3);

function add_page_settings_common_meta_box($post){
	if(get_page_template_slug( $post->ID ) != "index.php") {
	add_meta_box("common-meta-box", "Right Nav", "common_page_settings_box_markup", array('page'), "normal", "high", null);
}
}

function common_page_settings_box_markup($post){
	if(get_page_template_slug( $post->ID ) != "index.php") {
	wp_nonce_field(basename(__FILE__), "page-settings-nonce");

	$rightnav = get_post_meta( $post->ID, '_right_nav', true );
	
	get_template_part('inc/upload-scripts');

	echo '<style type="text/css"> .page_settings_tbl td, .page_settings th{ padding: 7px 0px; } .page_settings textarea{ width: 25em;} </style>';
	echo '<table width="100%" class="page_settings" style="text-align: left;">';
	echo get_admin_input('editor', '_right_nav', 'Content', $rightnav , '');
	echo '</table>';
	}
}

function save_page_settings_common_meta_box( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	if ( in_array($_POST['post_type'], array('page')) ) {

		if ( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	}

	$fields = array( '_right_nav');

	foreach( $fields as $field ) {
		if(isset($_POST[$field])){
			$value = ( $_POST[$field] );
			update_post_meta( $post_id, $field, $value );
		}
	}

}
?>