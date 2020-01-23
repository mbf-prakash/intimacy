<?php
global $_POST;
$load_url = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
include $load_url[0].'wp-load.php';
$userdata = get_user_by('login', $username);
$password = sanitize_text_field($_POST['current_password']);
$userid = sanitize_text_field($_POST['userid']);
$user = get_userdata( $userid );
if( $user ){
$password = sanitize_text_field($_POST['current_password']);;
$hash     = $user->data->user_pass;
if ( wp_check_password( $password, $hash ) ){
  echo 1;
}else if($password ==''){
echo 3;
}
else{
  echo 2;
}
}
?>