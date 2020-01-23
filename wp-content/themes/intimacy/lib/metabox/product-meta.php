<?php
/*** Metabox for page, post ***/

add_action("add_meta_boxes", "add_page_settings_product_meta_box");
add_action("save_post", "save_page_settings_product_meta_box", 10, 3);

function add_page_settings_product_meta_box($post){

	add_meta_box("product-meta-box", "Product Options", "product_page_settings_box_markup", array('product'), "normal", "high", null);
}

function product_page_settings_box_markup($post){
	wp_nonce_field(basename(__FILE__), "page-settings-nonce");

	$manuFact = get_post_meta( $post->ID, '_manufac_name', true );
    $brandName = get_post_meta( $post->ID, '_brand_name', true );
	$brandLink = get_post_meta( $post->ID, '_brand_link', true );
	get_template_part('inc/upload-scripts');

	echo '<style type="text/css"> .page_settings_tbl td, .page_settings th{ padding: 7px 0px; } .page_settings textarea{ width: 25em;} </style>';
	echo '<table width="100%" class="page_settings" style="text-align: left;">';
    echo get_admin_input('text', '_manufac_name', 'Manufacturer', $manuFact , '');
    echo get_admin_input('text', '_brand_name', 'Brand Name', $brandName , '');
	echo get_admin_input('text', '_brand_link', 'Brand link', $brandLink , '');
	echo '</table>';

}

function save_page_settings_product_meta_box( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	if ( in_array($_POST['post_type'], array('product')) ) {

		if ( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	}

	$fields = array( '_manufac_name','_brand_name','_brand_link');

	foreach( $fields as $field ) {
		if(isset($_POST[$field])){
			$value = ( $_POST[$field] );
			update_post_meta( $post_id, $field, $value );
		}
	}

}

?>