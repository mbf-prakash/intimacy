<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
global $woocommerce;


$cart_url = wc_get_cart_url();
/* Get variation attribute based on product ID */
$product = new WC_Product_Variable( $post->ID );
$variations = $product->get_available_variations();

?>

<?php
//discountAmountwc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<form id="cartform" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>

 <table class="cart-table" width="100%" border="0" cellpadding="15">
	<thead>
		<tr >
			<!-- <th class="product-remove">&nbsp;</th>
			<th class="product-thumbnail">&nbsp;</th> -->
			<th class="product-name"><?php _e( 'Product Name', 'woocommerce' ); ?></th>
			<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
			<th class="product-price"><?php _e( 'Unit Price', 'woocommerce' ); ?></th>
                     	<th class="no-desc"><?php _e( 'Discounted Price', 'woocommerce' ); ?></th>
			<th class="product-subtotal"><?php _e( 'Amount', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$var_val='';
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
			$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) && $product_permalink!='' ) {

				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?> clearfix cart-list">

					<td class="product-name">
						<div class="clearfix cart-list-blk">
						<?php $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							$thumbnail = preg_replace( '/(width|height)=\"\d*\"\s/', "", $thumbnail );
							if ( ! $product_permalink ) {
								echo $thumbnail;
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
							}

							?>

							<!-- <a href="$product_permalink"><img src="<?php echo $imgsrc[0]; ?>" alt="images"></a> -->
						<?php

							if ( ! $product_permalink ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else
							if(!empty( $cart_item['variation_id'] )) {
								$item_id = $cart_item['variation_id'];
								$variation = wc_get_product($item_id);
								$variable_product = wc_get_product($cart_item['variation_id']);
								$regular_price = $variable_product->get_regular_price();
								$sale_price = $variable_product->get_sale_price();
								$var_stock_qty = $variable_product->get_stock_quantity();

								$price = $variable_product->get_price();
								$variation_title_pre =  $variation->get_formatted_name();
								$vt = explode('<span class="description">',$variation_title_pre);
								$prodShort = get_post_meta( $product_id, '_prodShort', true );

								//var_dump($vt); see the exploded array
								$variation_title = $vt[5].' '.$vt[6];

								$str =$vt[0];
								$test=explode('-',$str,2);
								$var_val= array_values($_product->get_variation_attributes())[0];
								$var_size = array_values($_product->get_variation_attributes())[1];
								$var_fit = array_values($_product->get_variation_attributes())[2];
								// $varid = $variation->get_formatted_name();
								// echo  '<div class="cart-title"><a href="'.WC()->cart->get_remove_url( $cart_item_key ).'" </a><a href="'.esc_url( $product_permalink ).'" class="proTitle"><h2>'.$_product->get_title().'</h2><h3>'.$prodShort.'</h3></a><p></div>';
							}else{

								$title = preg_match('~[0-9]+~', $_product->get_title());

								$var_title =  $title == ''?'':'number';


								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<div class="cart-title"><a href="'.WC()->cart->get_remove_url( $cart_item_key ).'" </a><a href="%s" class="proTitle"><h2 class="'.$var_title.'">'.$_product->get_title().'</h2><h3>'.$_product->get_short_description().'</h3></a>%s</div>', esc_url( $product_permalink )), $cart_item, $cart_item_key);
								

							}
							?>
							<?php $item_id = ( !empty( $cart_item['variation_id'] ) ) ? $cart_item['variation_id'] : '';




							?>
							<strong><?php //echo $variation->get_formatted_name(); ?></strong>
						<?php
							if ( ! $product_permalink ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								$prodShort = get_post_meta( $product_id, '_prodShort', true );
								
$var_fit_htm = $var_fit == ''?'':"<span> / ".$var_fit."</span>";

$title = preg_match('~[0-9]+~', $_product->get_title());

$var_title =  $title == ''?'':'number';


echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<div class="cart-title"><a href="'.WC()->cart->get_remove_url( $cart_item_key ).'" </a><a href="%s" class="proTitle">


	<h2 class="'.$var_title.'">'.$_product->get_title().'</h2>

	</a><div class="cart-variant"><h3><div class="color-pad-bg noicon" style="background-color: '.color_name_to_hex($var_val).'"></div> <span> '.$var_val.' </span>/ <span>'.$var_size.' </span>'.$var_fit_htm.'</h3></div></div>', esc_url( $product_permalink ) ), $cart_item, $cart_item_key );
							}
							?>
					<?php
					//var_dump($_product);

					//	echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<div class="cart-title"><a href="'.WC()->cart->get_remove_url( $cart_item_key ).'" </a><a href="%s" class="proTitle">%s</a></div>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key );
					?>


						</div>
						<a href="javascript:void(0)" title="Remove" class="remove-btn-no remove-btn" data-item-key = "<?php echo $cart_item_key ;?>" data-product_id = "<?php echo $cart_item['product_id'];?>" data-product_item = "<?php echo $cart_item_key ;?>" >Remove</a>

					</td>

					<td class="formCol" data-title="<?php _e( 'Quantity', 'woocommerce' ); ?>">
					<?php
						$qty=$cart_item['quantity'];
						$products = wc_get_product($product_id);
						$stock_qty = $products->get_stock_quantity();
						
								$product_quantity = sprintf( '
									<div class="preloadtd qtymodify" id="preload'.$product_id.'">
										<button class="textbox-right">-</button>
										<input style="display:none" onchange="quantityonchange('.$product_id.',this)" id="qty"  type="text" class="textbox-small" data-stk-val="'.$var_stock_qty.'"
										  data-value="'.$stock_qty.'" name="cart[%s][qty]" value="%d"  />
										<input id="dummyQty" type="text" readonly class="textbox-small"  value="%d"  /><button class="textbox-left" '.($var_stock_qty == $qty ?'disabled':'').' '.($stock_qty == $qty ?'disabled':'').'>+</button></div>', $cart_item_key,$qty,$qty );

							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
						?>

					</td>
					<td data-title="Unit Price" class="product-subtotal sub-total">
						<?php
						if(!empty( $cart_item['variation_id'] )) {
								$var_id = $cart_item['variation_id'];
								$var_val = wc_get_product($var_id);
								$var_reg_prc = $var_val->get_regular_price();
								$var_sal_prc = $var_val->get_sale_price();
								$var_prc = $var_sal_prc == ''?$var_reg_prc:$var_sal_prc;

								if($var_sal_prc !=''){
						?>

						<span class="rupee unitprice">₹<?php echo $var_reg_prc; ?>.00</span>
            			<span class="rupee">₹<?php echo $var_prc;?>.00</span>
            		<?php
            		}else{
            		?>
            			<span class="rupee">₹<?php echo  $var_reg_prc;?>.00</span>
            		<?php
            			}
            		?>
            		<?php }else{
            				$simpleid = $product_id;

            				$regular_price = $_product->get_regular_price();
							$sale_price = $_product->get_sale_price();
							if($sale_price != ''){
							?>
            			<span class="rupee unitprice">₹<?php echo $regular_price; ?></span>
            			<span class="rupee">₹<?php echo $sale_price; ?></span>
            		<?php }else{ ?>
            			<span class="rupee">₹<?php echo $regular_price; ?></span>
            		<?php } ?>
            		<?php }?>
					</td>
<?php if($sale_price){?>
<td data-title="Discounted Price" class="sub-total no-desc">
		<?php $disc_pric = $sale_price == ''?0:$sale_price; ?> 
                            <span class="rupee">₹<?php echo $disc_pric; ?></span>
                        </td>
					<?php }?>
					<td data-title="Total price" class="product-subtotal sub-total" >
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
						?>
					</td>
				</tr>
				<?php
			}
		}

		do_action( 'woocommerce_cart_contents' );
		if ( wc_coupons_enabled() ) {
					$couponArray = WC()->cart->get_coupons(); }
				$couponArray = WC()->cart->get_coupons();

			$coup_style = count($couponArray)!=0 ?'style="display:none"':''; 
		?>
		<tr class="checkouttotal" >
		  <td colspan="4" class="checkouttotaltd">
		     <table class="discount-wrapper fR structure" cellspacing="0" cellpadding="0" border="0" >
		       <tr <?php echo $coup_style; ?> >
			     <!-- <td id = "carttd" colspan="2" class="remove-pad">
			     <div class="common-discount">
			     <div class="clearfix" id="voucherInner">
				   <div class="search-shop voucherCodeFiled">
				<?php 
				if ( wc_coupons_enabled() ) {

						?>
				 	<div <?php echo $style; ?> class="addvoucher"><i class="fa fa-plus" aria-hidden="true"></i> Add a voucher code</div>
				  	<div class="btn-pos applybutd">
                  	<input type="text" name="coupon_code" class="textBox" id="coupon_code" maxlength="99" value=""  autocomplete="off"  />
               		<button type="button" class="button-primary btn button" id="discount-button" name="apply_coupon">Apply</button>
               		<div class="close-voucher"><i class="fa fa-times" aria-hidden="true"></i></div>
                  		<div class="tick-box"></div>
                      	<div class="preloader-black"></div>
						<?php do_action( 'woocommerce_cart_coupon' ); ?>
					  </div>
					  </div>
					  <div class="error-message-custom" style="display:none">Please enter a voucher code</div>
					  <div class="error-message-invalid" style="display:none">Invalid voucher code</div> -->
					  <?php //} //else if(count($couponArray)>0){?>
<!-- 	                  <div class="tryagain">Oops! This code is not valid. <a href="javascript:void(0)">Want to try again?</a></div> -->

				<?php } ?>
        	<?php	/*<input type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'woocommerce' ); ?>" /> */?>

				<?php do_action( 'woocommerce_cart_actions' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart' ); ?>
				       <!--  </div>
				     </div>
			       </td> -->
			     </tr>

				<div class="cart-collaterals">

					<?php do_action( 'woocommerce_cart_collaterals' ); ?>

				</div>
			  </table>
			</td>
		</tr>

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>
<?php do_action( 'woocommerce_after_cart_table' ); ?>
<div id="updcartbut1"></div>
</form>
<form  id="removeCouponForm" method="GET">
<?php
 if ( wc_coupons_enabled() ) {
 	if(count($couponArray)>0){
					$couponArray = WC()->cart->get_coupons(); ?>
 <input type="hidden" name="remove_coupon" readonly="" value="<?php echo key($couponArray); ?>" />

 <?php }
 } ?>
</form>
<?php do_action( 'woocommerce_after_cart' ); ?>
