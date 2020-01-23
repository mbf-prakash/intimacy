<?php
global $_POST;
$load_url = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
include $load_url[0].'wp-load.php';
$password = sanitize_text_field($_POST['password']);
$userid = sanitize_text_field($_POST['userid']);
// $result= wp_set_password( $password, $userid );
if ( wp_set_password( $password, $userid ) ){
   echo 1;
}else{
   echo 2;
}
?>
