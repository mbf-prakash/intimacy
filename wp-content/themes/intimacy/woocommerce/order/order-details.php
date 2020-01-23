<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}?>

<?php
$order = wc_get_order( $order_id );

$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
?>
<!-- Conversion Pixel - SALE_CONV - DO NOT MODIFY -->
<script src="https://secure.adnxs.com/px?id=850218&seg=8627404&other='<?php echo $order->get_total(); ?>'&t=1" type="text/javascript"></script>
<!-- End of Conversion Pixel -->

<?php if ( $show_customer_details ) : ?>
	<?php //wc_get_template( 'order/order-details-customer.php', array( 'order' =>  $order ) ); ?>
<?php endif; ?>

<?php 
$billing_address_1 = $order->get_billing_address_1();
$billing_address_2 = $order->get_billing_address_2();
$billing_city = $order->get_billing_city();
$billing_state = $order->get_billing_state();
$billing_postcode = $order->get_billing_postcode(); /*<h3><?php _e( 'Your Order', 'woocommerce' ); ?></h3> */ ?>

<table cellspacing="0" cellpadding="0" border="0" class="">
      <tr>
      <td>
		<?php
echo ''.$billing_address_1 .',  '. $billing_city . ',  '. $billing_state . ' '.$billing_postcode.'<br/>';
?>
</td>
</tr>
                </table>




<br><table class="cart-table discount-wrapper" width="100%" border="0" cellpadding="15" >
		<tr>
			<th class="product-name"><?php _e( 'Product Info', 'woocommerce' ); ?></th>
			<th class="product-name"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
			<th class="product-name"><?php _e( 'Unit Price', 'woocommerce' ); ?></th>
			<th class="product-name"><?php _e( 'Amount', 'woocommerce' ); ?></th>

		</tr>
	<tbody>
		<?php
			foreach( $order->get_items() as $item_id => $item ) {
				$product = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );

				wc_get_template( 'order/order-details-item.php', array(
					'order'			     => $order,
					'item_id'		     => $item_id,
					'item'			     => $item,
					'show_purchase_note' => $show_purchase_note,
					'purchase_note'	     => $product ? get_post_meta( $product->id, '_purchase_note', true ) : '',
					'product'	         => $product,
				) );
			}
		?>
		<?php do_action( 'woocommerce_order_items_table', $order ); ?>



<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>

<?php
$first_name = $order->get_billing_first_name();
$last_name = $order->get_billing_last_name();
$billing_phone = $order->get_billing_phone();
$billing_address_1 = $order->get_billing_address_1();
$billing_address_2 = $order->get_billing_address_2();
$billing_city = $order->get_billing_city();
$billing_state = $order->get_billing_state();
$billing_postcode = $order->get_billing_postcode();
$billing_country = $order->get_billing_country();
$discount_total = $order->get_discount_total();
$total = $order->get_total();
$shipping_total = $order->get_shipping_total();
$payment_method = $order->get_payment_method();

$used_coupons = $order->get_used_coupons();
$coupon_post_obj = get_page_by_title($used_coupons[0], OBJECT, 'shop_coupon');
    $coupon_id = $coupon_post_obj->ID;

    // Get an instance of WC_Coupon object in an array(necesary to use WC_Coupon methods)
    $coupons_obj = new WC_Coupon($coupon_id);

    if($coupons_obj->get_discount_type()=="percent"){
$coupon_amount = $coupons_obj->get_amount()."%";
}else{
$coupon_amount= $coupons_obj->get_amount();
}
?>



<tr class="checkouttotal">
                        <td colspan="4">
                            <table cellspacing="0" cellpadding="0" border="0" class="discount-wrapper fR">
								<tr></tr>
                               <?php if (!empty($used_coupons)) { ?>
								<tr></tr>
                                                                <tr class="woocommerce-shipping-totals shipping" id="discountTr">
									<th>Voucher Discount (<?php echo $coupon_amount; ?> off)<!-- <?php echo $used_coupons[0];?> --></th>
									<td data-title="Voucher Discount (<?php echo $coupon_amount; ?> off)">
										<ul id="shipping_method" class="woocommerce-shipping-methods">
											<li>
											<input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping14" value="free_shipping:14" class="shipping_method input-email-active" checked="checked"><label for="shipping_method_0_free_shipping14">-<span class="woocommerce-Price-currencySymbol">₹</span><?php echo number_format($discount_total,2); ?></label>					</li>
										</ul>
									</td>
								</tr>
<?php } ?>


 <?php if (!empty($shipping_total)) { ?>
								
                                <tr class="woocommerce-shipping-totals shipping">
									<th class="no-ship">Shipping</th>
									<td data-title="Shipping Amount">
										<ul id="shipping_method" class="woocommerce-shipping-methods">
											<li>
											<input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping14" value="free_shipping:14" class="shipping_method input-email-active" checked="checked"><label for="shipping_method_0_flat_rate13"><span class="woocommerce-Price-currencySymbol">₹</span><?php echo $shipping_total;?></label>					</li>
										</ul>
									</td>
								</tr>
<?php } ?>


  <tr class="total-blk">
									<td><strong>TOTAL</strong></td>
									<td>
										<ul id="shipping_method" class="woocommerce-shipping-methods">
											<li>
											<input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping14" value="free_shipping:14" class="shipping_method input-email-active" checked="checked"><label for="shipping_method_0_free_shipping14"><strong><span class="woocommerce-Price-currencySymbol">₹</span><?php echo $total;?> </strong></label>					</li>
										</ul>
									</td>
								</tr>
                            </table>
                        </td>
                    </tr>
                </table>

                </tbody>

                </div>
