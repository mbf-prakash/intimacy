<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$customer_id= get_current_user_id();
//wc_print_notices(); ?>
<?php if($_REQUEST['op']!='g'){?>
<?php /* if ($customer_id == "") { ?>
<ul id="tab-shopping" class="clearfix  tabsw">
    <li class="active" data-url="<?php echo get_bloginfo('url') ?>/cart/" id="shopcart">Shopping Bag</li>
    <li class="active" data-url="<?php echo get_bloginfo('url') ?>/checkout?order=c" id="delinfo">Checkout method</li>
    <li <?php if($_REQUEST['op'] != ""){?> class="active" <?php } ?> id="ordconf">Delivery Information</li>
    <li id="ordrec">Order Confirmation</li>
</ul>
<?php }else{ ?>
<ul id="tab-shopping" class="clearfix tab-shopping_comfirm tabsw">
    <li class="active" data-url="<?php echo get_bloginfo('url') ?>/cart/" id="shopcart">Shopping Bag</li>
    <li data-url="<?php echo get_bloginfo('url') ?>/checkout?order=c" class="active" id="ordconf">Delivery Information</li>
    <li id="ordrec">Order Confirmation</li>
</ul>
<?php } */ ?>
<?php } ?>
<?php do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}
?>

<div class="form-wrap">
<form name="checkout" method="post" class="checkout address_form woocommerce-checkout" style="
<?php  if ($_REQUEST['op']=='g' || ($_REQUEST['op']!='g' && $customer_id != "")){?>display: block<?php } ?>" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
<?php if ( $post = get_page_by_path( 'your-delivery-address', OBJECT, 'page' ) ){
        $footerCont = apply_filters('the_content', $post->post_content);
        ?>


      <?php } ?>

	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		
				<?php do_action( 'woocommerce_checkout_billing' ); ?>

				<?php do_action( 'woocommerce_checkout_shipping' ); ?>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	<div class="form-row open-test">
<h1 id="order_review_heading" ><?php _e( 'Choose a payment option', 'woocommerce' ); ?></h1>
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
	

	




	</div>
</form>
</div>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
