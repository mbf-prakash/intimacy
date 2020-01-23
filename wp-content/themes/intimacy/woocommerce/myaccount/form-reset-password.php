					
	<div class="container">
				<div class="form-wrap sub-wrap">
					<div class="subwrap">
						
						
						<div class="row">
<div class="col-5 center-block">
<form method="post" class="woocommerce-ResetPassword lost_reset_password lost_pass">
<h1>Reset password</h1>
	<p><?php echo apply_filters( 'woocommerce_reset_password_message', __( 'Enter a new password below.', 'woocommerce') ); ?></p>
   <div class="form-row">
		<label class="floating-item" data-error="Please enter a new password">
		<input type="password" class="floating-item-input input-item validate" name="password_1" id="password" />
		<span class="floating-item-label">NEW PASSWORD</span>
		</label>
	</div>
	<div class="form-row">
		<label class="floating-item" data-error="Please enter a new password">
		<input type="password" class="floating-item-input input-item validate" name="password_2" id="password_2" />
		<span class="floating-item-label">CONFIRM PASSWORD</span>
		</label>

	</div>
<div class="error-pass" id="passwordmis-err" style="display: none;">Password is mismatched</div>
									     
	<input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
	<input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />

	<div class="clear"></div>

	<?php do_action( 'woocommerce_resetpassword_form' ); ?>

	<div class="form-row remove-space">
		<input type="hidden" name="wc_reset_password" value="true" />
		<button type="submit" class="button button-primary" id="reset_password" value="<?php esc_attr_e( 'Save', 'woocommerce' ); ?>" />Reset Password</button>
	</div>
	<?php wp_nonce_field( 'reset_password' ); ?>
</form>
</div>
</div>
</div>
</div>
	</div>
