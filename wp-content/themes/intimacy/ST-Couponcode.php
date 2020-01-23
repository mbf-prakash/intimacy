<?php 
/*******
Template Name:Ajax coupon
*******/

global $wpdb;
global $woocommerce;
if (isset($_POST['coupon_code'])){
	$coupon_code = $_POST['coupon_code'];
    WC()->cart->remove_coupons();
    $ret = WC()->cart->add_discount( $coupon_code ); 
}
$result = '';

foreach ( WC()->cart->get_coupons() as $code => $coupon ) : 
	if ($coupon->code==trim($coupon_code)) {
		$result='added';
	}else{
		$result='failed';
	}
	$ccode=esc_attr( sanitize_title( $code ) );
	if($coupon->discount_type=="percent"){
		$coupon_amount = $coupon->coupon_amount."%";
	}else{
		$coupon_amount= $coupon->coupon_amount;
	}

$result .='~html<div id="discountAmount">
                                    <table width="100%">
                                        <tbody>
                                        <tr><td id = "cartTotal" style="display:none">'.WC()->cart->get_cart_total().'</td></tr><tr>
                                            <td class="apply-voucher" data-title="Product Name">Discount ('.$coupon_amount.'  <span>'.$ccode.'</span>)</td>
                                            <td data-title="Quantity"><strong><span class="rupee"></span> '.wc_cart_totals_coupon_html( $coupon );
	// $result.='~html<tr class="voucherWrap cart-discount coupon-'.$ccode.'">
	        // <td class="apply-voucher">Discount ('.$coupon_amount.'- <span>'.$ccode.'</span>)</td>
	        // <td><strong><span class="rupee"></span> - <span id="totalPlace">'.wc_cart_totals_coupon_html( $coupon );
endforeach; 
echo $result;
?>