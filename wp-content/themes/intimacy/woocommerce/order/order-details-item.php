<?php
/**
 * Order Item Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-item.php.
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
}

if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
	return;
}
?>

<!-- <table class="cart-table order-table" width="100%" border="0" cellpadding="15"> -->
<tr class="clearfix cart-list" style="border-bottom: 1px solid;">
	<td>
		<div class="clearfix cart-list-blk">

		<?php
			$is_visible        = $product && $product->is_visible();
			$product_permalink = apply_filters( 'woocommerce_order_item_permalink', $is_visible ? $product->get_permalink( $item ) : '', $item, $order );
			$orderId=$item['product_id'];
			if($item['variation_id']!=''){

				$prodShort = get_post_meta( $orderId, '_prodShort', true ).''.array_values($product->get_variation_attributes())[0];
				$prodShortone = get_post_meta( $orderId, '_prodShort', true ).''.array_values($product->get_variation_attributes())[1];
				$prodShorttwo = get_post_meta( $orderId, '_prodShort', true ).''.array_values($product->get_variation_attributes())[2];
			}else{
				$prodShort = get_post_meta( $orderId, '_prodShort', true );
			}
			$price_details = $product->get_price();


$var_fit_htm = $prodShorttwo == ''?'':"/ <span> ".$prodShorttwo."</span>";

			echo apply_filters( 'woocommerce_order_item_name', $product_permalink ? sprintf( '<div class="cart-title"><a  class="proTitle" href="%s"><h2>%s</h2><div class="cart-variant"><h3><div class="color-pad-bg noicon" style="background-color: '.color_name_to_hex($prodShort).'"></div> <span> '.$prodShort.' </span>/ <span>'.$prodShortone.' </span>'.$var_fit_htm.'</h3>
		                                	</div></a></div>', $product_permalink, $product->get_title()) : $item['name'], $item, $is_visible );



			do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order );

			$order->display_item_meta( $item );
			$order->display_item_downloads( $item );

			do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $order );
		?>
			<?php $item_id = ( !empty( $item['variation_id'] ) ) ? $item['variation_id'] : '';
				if ( !empty( $item_id ) ) {
					$variations = get_variation_data_from_variation_id( $item_id );
				} 
				$variations=explode(':', $variations);?>
			<!-- <span class="product-size">/<?php echo $variations[1];?></span> -->
		 </div>
	</td>
	<?php /*<td>
			<?php
				$total = intval($item['line_subtotal']);
				$item_qty = intval($item['qty']);
				$unit_price = number_format($total/$item_qty,0,'.','');
				$currency = get_woocommerce_currency();
				$string = get_woocommerce_currency_symbol( $currency );
				echo apply_filters( 'woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf( '<span class="woocommerce-Price-currencySymbol">%s</span>%s',$string,$unit_price ) . '</strong>', $item );
			?>
	</td> */?>
	<td class="formCol" data-title="<?php _e( 'Quantity', 'woocommerce' ); ?>">
		<div class="preloadtd"><?php echo apply_filters( 'woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf( ' %s', $item['qty'] ) . '</strong>', $item );?></div>
	</td>
	<td class="product-subtotal sub-total" data-title="<?php _e( 'Unit Price', 'woocommerce' ); ?>" > <span class="rupee">₹<?php echo $price_details; ?></span>
	</td>
	<td class="sub-total" data-title="<?php _e( 'Total price', 'woocommerce' ); ?>">
		<?php echo $order->get_formatted_line_subtotal( $item ); ?>
	</td>
</tr>

<?php if ( $show_purchase_note && $purchase_note ) : ?>
<tr class="product-purchase-note">
	<td colspan="3"><?php echo wpautop( do_shortcode( wp_kses_post( $purchase_note ) ) ); ?></td>
</tr>


<!-- </table>
 --><?php endif; ?>
