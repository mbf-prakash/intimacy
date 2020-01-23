<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
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
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



//wc_print_notices(); ?>
<div class="container">
				<div class="form-wrap sub-wrap">
					<div class="subwrap">
						<div class="row">
							<div class="col-5 register center-block">
<div class="form-wrap">
<form method="post" class="woocommerce-ResetPassword lost_reset_password">
<h1>Forgot Password</h1>
	<p><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Forget your password? Please enter your email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p>
	<div class="form-row">
		<label class="floating-item" data-error="Please enter your email address">
		<input class="floating-item-input input-item validate validate-email" type="text" name="user_login" id="email" value="" />
		<span class="floating-item-label">EMAIL</span>
		</label>
	</div>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_lostpassword_form' ); ?>

	<div class="form-row">
		<input type="hidden" name="wc_reset_password" value="true" />
		<button type="submit" id="lostpassword" class="button button-primary" value="<?php esc_attr_e( 'Reset Password', 'woocommerce' ); ?>" />Submit</button>
	</div>
	<?php wp_nonce_field( 'lost_password' ); ?>

</form>
</div>
</div>
</div>
</div>
</div>