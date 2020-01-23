<?php
/**
 * Order details table shown in emails.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text_align = is_rtl() ? 'right' : 'left';

do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>

<style>
	a{
		color:#262626;
	}
	</style>
<div style="max-width:560px;font-size:14px">
	<p>
		<?php echo 'Hi '.$order->get_billing_first_name().','; ?>
	</p>
	<?php echo wpautop(get_option('order_complete')); ?>
</div>
<div style="color:black;font-size:18px;"><p><b>
	
	
	<?php
	if ( $sent_to_admin ) {
		$before = '<a class="link" href="' . esc_url( $order->get_edit_order_url() ) . '">';
		$after  = '</a>';
	} else {
		$before = '';
		$after  = '';
	}
	/* translators: %s: Order ID. */
	//echo wp_kses_post( $before . sprintf( __( 'Order No. %s', 'woocommerce' ) . $after , $order->get_order_number(), $order->get_date_created()->format( 'c' ), wc_format_datetime( $order->get_date_created() ) ) );
	?></b></p>
</div>

<div style="margin-bottom: 40px;font-size:14px;color:#262626">
	
	<table class="td" cellspacing="0" cellpadding="20" style="width:70%;  font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" border="0">
		<thead>
			<tr>
				<th class="td" scope="col" style="text-align:center;color:#262626"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
				<th class="td" scope="col" style="text-align:center;color:#262626"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
				<th class="td" scope="col" style="text-align:center;color:#262626"><?php esc_html_e( 'Price per unit', 'woocommerce' ); ?></th>
				<th class="td" scope="col" style="text-align:center;color:#262626"><?php esc_html_e( 'Total Price', 'woocommerce' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			echo wc_get_email_order_items( $order, array( // WPCS: XSS ok.
				'show_sku'      => $sent_to_admin,
				'show_image'    => false,
				'image_size'    => array( 32, 32 ),
				'plain_text'    => $plain_text,
				'sent_to_admin' => $sent_to_admin,
			) );
			?>
		</tbody>
		<tfoot>
			<?php
			$totals = $order->get_order_item_totals();
            $total_prc=$order->get_total();
            $tax= $total_prc - ($total_prc * (12/100));
            $tax_prc=$total_prc - $tax;
			?>	<tr><td class="td test" scope="row" colspan="3" style="text-align:right;color:#262626; border-top-width: 0px;"><span>Subtotal</span></td>
						<td class="td" style="text-align:center;color:#262626; border-top-width: 0px;"><span>₹<?php echo number_format($tax,2);?></span></td></tr>
				<tr><td class="td test" scope="row" colspan="3" style="text-align:right;color:#262626; border-top-width: 0px;"><span>GST Tax (12%)</span></td>
						<td class="td" style="text-align:center;color:#262626; border-top-width: 0px;"><span>₹<?php echo number_format($tax_prc,2);?></span></td></tr>
						<?php 
			if ( $totals ) {
				$i = 0;
				foreach ( $totals as $total ) {
					if($total["label"] == 'Payment method:' || $total["label"] == 'Subtotal:'){
						continue;
					}
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
					$total_lbl = str_replace(":","",$total["label"]); 
					$total['value'] = str_replace('via Flat rate','',$total['value']); 
					
					$i++;
					?>
					<tr>
						<?php if($total["label"] == 'Total:'){ ?>
						<td class="td test" scope="row" colspan="3" style="text-align:right;color:#262626; <?php echo ( 1 === $i ) ? 'border-top-width: 0px;' : ''; ?>"><strong><?php echo $total_lbl; ?></strong></td>
						<td class="td" style="text-align:center;color:#262626; <?php echo ( 1 === $i ) ? 'border-top-width: 0px;' : ''; ?>"><strong><?php echo $total['value']; ?></strong></td>
						<?php }else
						if($total["label"] == 'Discount:'){ ?>
						<td class="td test" scope="row" colspan="3" style="text-align:right; <?php echo ( 1 === $i ) ? 'border-top-width: 0px;' : ''; ?>">Voucher Discount (<?php echo $coupon_amount; ?> off)</td>
						<td class="td" style="text-align:center; <?php echo ( 1 === $i ) ? 'border-top-width: 0px;' : ''; ?>"><?php echo $total['value']; ?></td>
						<?php }else{ ?>
						<td class="td test" scope="row" colspan="3" style="text-align:right; <?php echo ( 1 === $i ) ? 'border-top-width: 0px;' : ''; ?>"><?php echo $total_lbl; ?></td>
						<td class="td" style="text-align:center; <?php echo ( 1 === $i ) ? 'border-top-width: 0px;' : ''; ?>"><?php echo $total['value']; ?></td>
						<?php } ?>
					</tr>
					<?php
				}
			}
			if ( $order->get_customer_note() ) {
				?>
				<tr>
					<th class="td" scope="row" colspan="2" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Note:', 'woocommerce' ); ?></th>
					<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php echo wp_kses_post( wptexturize( $order->get_customer_note() ) ); ?></td>
				</tr>
				<?php
			}
			?>
		</tfoot>
	</table>
</div>

<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text, $email ); 
?>
