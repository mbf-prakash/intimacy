<?php
global $_POST;
$load_url = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
include $load_url[0].'wp-load.php';
$fname  = sanitize_text_field($_POST['regFname']);
$lname  = sanitize_text_field($_POST['regLname']);
$email  = sanitize_text_field($_POST['regEmail']);
$customer_id =sanitize_text_field($_POST['userid']);
update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['regFname'] ) );
update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['regLname'] ) );
?>
