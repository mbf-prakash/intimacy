<?php
/**
 * Email Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-addresses.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.5.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text_align = is_rtl() ? 'right' : 'left';
$address    = $order->get_formatted_billing_address();
$shipping   = $order->get_formatted_shipping_address();
if($order->get_billing_address_2() !=''){

$billing_addr2 = $order->get_billing_address_2().',';
}
?>
<!-- <table id="addresses" cellspacing="0" cellpadding="0" style="width: 560px; font-size:14px; vertical-align: top; margin-bottom: 40px; padding:0;" border="0">
	<tr>
		<td style="text-align:<?php echo esc_attr( $text_align ); ?>; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; border:0; padding:0;" valign="top" width="50%">
			<h2><?php //esc_html_e( 'Shipping address', 'woocommerce' ); ?></h2>

			<div class="address">
				Name : <?php echo $order->get_billing_first_name().' '.$order->get_billing_last_name(); ?>
				<br/>
				Address : <?php echo $order->get_billing_address_1().','.$billing_addr2.$order->get_billing_city().','.'United Kingdom'; ?>
				
			</div>
		</td>
		<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && $shipping ) : ?>
			<td style="text-align:<?php echo esc_attr( $text_align ); ?>; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; padding:0;" valign="top" width="50%">
				<h2><?php esc_html_e( 'Shipping address', 'woocommerce' ); ?></h2>

				<address class="address"><?php echo wp_kses_post( $shipping ); ?></address>
			</td>
		<?php endif; ?>
	</tr>
</table> -->
<div style="width: 560px; font-size:14px;">
	
	<p>Thank you for choosing intimacy!</p>

<p>Your order will be delivered to you asap. Meanwhile please feel free to review your purchases and check your the status of your order on <a href="http://uat.intimacy.co.in/sign-in">Your profile</a>.</p> 
<p>Have questions or want to give us your feedback? </p>
<p>You can contact us anytime at 044-44442151 or ecom@naiduhall.co.in</p>
<p>Best regards,</p>
<p>Intimacy	
	</p>
</div>
