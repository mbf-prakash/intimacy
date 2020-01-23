<?php	
$load_url = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
include $load_url[0] . 'wp-load.php';
global $wpdb;
global $woocommerce;
$cart_url = $woocommerce->cart->get_cart_url();	
	$productid = $_REQUEST['product_id']; 
	$quantity = $_REQUEST['qty']?$_REQUEST['qty']:1;
	$provar = $_REQUEST['variation_id'];
	$cartadd = WC()->cart->add_to_cart($productid, $quantity, $provar,null,null);


    echo WC()->cart->get_cart_contents_count();
	$errors=wc_get_notices( 'error' );
	foreach ($errors as $error) {
		echo 'error_log:'.$error;
	}
?>