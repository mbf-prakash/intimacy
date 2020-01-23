<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notice( __( 'Password reset email has been sent.', 'woocommerce' ) );
?>



<div id="subPage" class="generic" style="opacity: 1;">
        <div class="container  generic-container login">
            <div class="main-blk form-wrap">
                <div class="subwrap">
                    <div class="row">
                        <div class="col-5 center-block">


<p><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'You will receive an email with a link to reset your password.', 'woocommerce' ) ); ?></p>


</div>

		
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>