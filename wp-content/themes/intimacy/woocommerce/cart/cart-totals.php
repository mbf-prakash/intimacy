<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$couponArray = WC()->cart->get_coupons();

?>


	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

		<?php 
			foreach ( WC()->cart->get_coupons() as $code => $coupon ) : 
						 if($coupon->discount_type=="percent"){
			$coupon_amount = $coupon->coupon_amount."%";
			}else{
			$coupon_amount= $coupon->coupon_amount;
			}	
		?>
			<tr id="discountTr" class="cart-hidetr shipping">
  <th><a href="javascript:void(0);" onclick="removevoucher()" class="no-effect" title="Remove this Voucher"><i class="fa fa-remove"></i></a>
                	Voucher Discount (<?php echo $coupon_amount; ?> off)<!-- : <span><?php echo $code; ?></span> --></th>

		<td data-title="Voucher Discount(<?php echo $coupon_amount; ?>)">
<a href="javascript:void(0);" class="no-desc no-effect" onclick="removevoucher()" title="Remove this Voucher"><i class="fa fa-remove"></i></a>
										<ul id="shipping_method" class="woocommerce-shipping-methods">
											<li>
											<input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping14" value="free_shipping:14" class="shipping_method input-email-active" checked="checked"><label for="shipping_method_0_free_shipping14">
											<span class="rupee"></span>  <?php  wc_cart_totals_coupon_html( $coupon ); ?>
											 <input type="hidden" name="couponcodechk" id="couponcodechk" value="<?php echo $code; ?>"></label>					</li>
										</ul>
									</td>	              





            </tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

			<tr class="shipping">
				<th><?php _e( 'Shipping', 'woocommerce' ); ?></th>
				<td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
			</tr>

		<?php endif; ?>

		

				<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<tr class="total-blk">
			<td><strong><?php _e( 'TOTAL', 'woocommerce' ); ?></strong></td>
			<td><span><?php wc_cart_totals_order_total_html(); ?></span></td>
		</tr>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>


