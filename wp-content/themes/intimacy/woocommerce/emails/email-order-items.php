<?php
/**
 * Email Order Items
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-items.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

$text_align  = is_rtl() ? 'right' : 'left';
$margin_side = is_rtl() ? 'left' : 'right';

foreach ( $items as $item_id => $item ) :
	
$product       = $item->get_product();
	$sku           = '';
	$purchase_note = '';
	$image         = '';

	if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
		continue;
	}

	if ( is_object( $product ) ) {
		$sku           = $product->get_sku();
		$purchase_note = $product->get_purchase_note();
		$image         = $product->get_image( $image_size );
	}
 	$product = $item->get_product(); // Get the WC_Product object
	if($item['variation_id'] != 0){
		$prod_id = $item->get_product_id();
		$var_val = wc_get_product($item['variation_id']);
		$reg_prc = $var_val->get_regular_price();
		$sal_prc = $var_val->get_sale_price();
		$feat_image = wp_get_attachment_url(get_post_thumbnail_id($prod_id));
	}else{
		$reg_prc = get_post_meta( $item->get_product_id(), '_regular_price', true);
		$sal_prc = get_post_meta( $item->get_product_id(), '_sale_price', true);
		$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
	}
	$prodShort = get_post_meta( $item->get_product_id(), '_prodShort', true );
	$prodName = explode('-', $item->get_name());
	$varName = $prodName[1] !=''?' - '.$prodName[1]:'';
	
$product_permalink = apply_filters( 'woocommerce_order_item_permalink', $is_visible ? $product->get_permalink( $item ) : '', $item, $order );
			$orderId=$item['product_id'];
			if($item['variation_id']!=''){

				$prodShort = get_post_meta( $orderId, '_prodShort', true ).''.array_values($product->get_variation_attributes())[0];
				$prodShortone = get_post_meta( $orderId, '_prodShort', true ).''.array_values($product->get_variation_attributes())[1];
				$prodShorttwo = get_post_meta( $orderId, '_prodShort', true ).''.array_values($product->get_variation_attributes())[2];
			}

	?>
	<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>" style="border-top:1px solid #262626;">
		<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>;color:#262626; vertical-align: middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; word-wrap:break-word;">
		<?php

		// Show title/image etc.
		if ( $show_image ) {
			echo wp_kses_post( apply_filters( 'woocommerce_order_item_thumbnail', $image, $item ) );
		}

		// Product name.
		echo '<p style="margin:0px;"><b>'.$prodName[0].$varName.'</b></p>';

			echo '<p style="margin:0px;">'.$prodShort.'</p>';
			echo '<p style="margin:0px;">Size: '.$prodShortone.'</p>';

		// SKU.
		/*if ( $show_sku && $sku ) {
			echo wp_kses_post( ' (#' . $sku . ')' );
		}*/

		// allow other plugins to add additional product information here.
		do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order, $plain_text );

		wc_display_item_meta(
			$item,
			array(
				'label_before' => '<strong class="wc-item-meta-label" style="float: ' . esc_attr( $text_align ) . '; margin-' . esc_attr( $margin_side ) . ': .25em; clear: both">',
			)
		);
		
		// allow other plugins to add additional product information here.
		do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $order, $plain_text );

		?>
		</td>
		
		<td class="td" style="text-align:center; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;">
			<?php echo wp_kses_post( apply_filters( 'woocommerce_email_order_item_quantity', $item->get_quantity(), $item ) ); ?>
		</td>

		<td class="td" style="text-align:center; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;">
			<?php
				if($sal_prc!=''){
			?>
			<strike><?php echo '₹'.number_format($reg_prc,2); ?></strike>  <?php echo '₹'.number_format($sal_prc,2); ?>
			<?php }else{ ?>
			<?php echo '₹'.number_format($reg_prc,2);?>
			<?php } ?>
		</td>
		<td class="td" style="text-align:center; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;">
			<?php echo wp_kses_post( $order->get_formatted_line_subtotal( $item ) ); ?>
		</td>
	</tr>
	<?php

	if ( $show_purchase_note && $purchase_note ) {
		?>
		<tr>
			<td colspan="3" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;">
				<?php
				echo wp_kses_post( wpautop( do_shortcode( $purchase_note ) ) );
				?>
			</td>
		</tr>
		<?php
	}
	?>
<?php endforeach; ?>
