<?php
add_action("add_meta_boxes", "add_page_settings_myacc_meta_box");
add_action("save_post", "save_page_settings_myacc_meta_box", 10, 3);

function add_page_settings_myacc_meta_box($post){
	if(get_page_template_slug( $post->ID ) == "ST-Myaccount.php") {
	add_meta_box("myacc-meta-box", "My Account Introtext Options", "myacc_page_settings_box_markup", array('page'), "normal", "high", null);
}
}

function myacc_page_settings_box_markup($post){
	if(get_page_template_slug( $post->ID ) == "ST-Myaccount.php") {
	wp_nonce_field(basename(__FILE__), "page-settings-nonce");

	$maintxt = get_post_meta( $post->ID, '_maintxt', true );
	$personatxt = get_post_meta( $post->ID, '_personatxt', true );
	$passwordtxt = get_post_meta( $post->ID, '_passwordtxt', true );
    $newslettertxt = get_post_meta( $post->ID, '_newslettertxt', true );
	// $myacc_content = get_post_meta( $post->ID, '_myacc_content', true );
	get_template_part('inc/upload-scripts');

	echo '<style type="text/css"> .page_settings_tbl td, .page_settings th{ padding: 7px 0px; } .page_settings textarea{ width: 25em;} </style>';
	echo '<table width="100%" class="page_settings" style="text-align: left;">';
	echo get_admin_input('editor', '_maintxt', 'Main Intro text', $maintxt , '');
  echo get_admin_input('editor', '_personatxt', 'Personal Information', $personatxt , '');
  echo get_admin_input('editor', '_passwordtxt', 'Change Password', $passwordtxt , '');
	echo get_admin_input('editor', '_newslettertxt', 'Newsletter', $newslettertxt , '');
	// echo get_admin_input('text', '_notify', 'Notification Bar', $notify , '');
	// echo get_admin_input('editor', '_myacc_content', 'myacc Content', $insta , '');



	echo '</table>';
	}
}

function save_page_settings_myacc_meta_box( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	if ( in_array($_POST['post_type'], array('page','post','cpt-conditions')) ) {

		if ( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	}

	$fields = array( '_maintxt','_personatxt','_passwordtxt','_newslettertxt');

	foreach( $fields as $field ) {
		if(isset($_POST[$field])){
			$value = ( $_POST[$field] );
			update_post_meta( $post_id, $field, $value );
		}
	}

}
?>
