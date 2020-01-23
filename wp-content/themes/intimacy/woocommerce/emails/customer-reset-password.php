<?php
/**
 * Customer Reset Password email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<html>
              <body>
                    <div style="max-width:560px;font-size:14px;">
						<p style="text-transform:capitalize"><?php printf( esc_html__( 'Hey %s,', 'woocommerce' ), esc_html( $user_login ) ); ?>
						<p><?php echo wpautop(get_option('forgot_password')); ?></p>
						<p>Please 
							<a class="link" href="<?php echo esc_url( add_query_arg( array( 'key' => $reset_key, 'id' => $user_id ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) ) ); ?>" style="color:#262626"><?php // phpcs:ignore ?>
								<b><?php esc_html_e( 'click here', 'woocommerce' ); ?></b>
								</a>on the link to reset your password.</p>
	<p>If the request was not made by you, please ignore this mail.</p>

<p>Please feel free to contact 044-44442151 or drop us a mail at ecom@naiduhall.co.in if you still have any queries.</p>

					</div>
				</body>
</html>
