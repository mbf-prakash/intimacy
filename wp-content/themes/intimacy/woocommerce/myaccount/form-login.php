<?php
/**
* Login Form
*
* This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
*
* HOWEVER, on occasion WooCommerce will need to update template files and you
* (the theme developer) will need to copy the new files to your theme to
* maintain compatibility. We try to do this as little as possible, but it does
* happen. When this occurs the version of the template file will be bumped and
* the readme will list any important changes.
*
* @see     https://docs.woocommerce.com/document/template-structure/
* @package WooCommerce/Templates
* @version 3.5.0
*/

if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly.
}

?>

<?php 
  $parseurl = wp_get_referer();
$referer_url = parse_url($parseurl);
$path_str = explode('/', $referer_url['path']);
$path_arr = array_filter($path_str);
$path = end($path_arr);

?>



<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>


<?php endif; ?>

	<?php 
$id = get_the_ID();
$template = get_post_meta( $id, '_wp_page_template', true ); ?>
<?php if($template == 'ST-Login.php'){
?>

<form method="post" class="login">
<div class="form-wrap">

<?php do_action( 'woocommerce_login_form_start' ); ?>
<!-- login starts here -->
		<div class="form-row">
				<!-- <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide"> -->
				<label class="floating-item" data-error="Please enter your email address">
				<input type="text" name="username" id="email" class="floating-item-input input-item validate validate-email" maxlength="100" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
				<span class="floating-item-label">EMAIL</span>
				</label>
				<!-- <span class="error-message" id="error_email"> </span> -->
				<!-- </p> -->
		</div>
	<div class="form-row remove-space">
			<!-- <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide"> -->
			<label class="floating-item" data-error="Please enter a password"><?php// _e( 'Password', 'woocommerce' ); ?>
			<input type="password" class="floating-item-input input-item validate" name="password" id="password" value="" />
			<span class="floating-item-label">PASSWORD</span>
			</label>
			<!-- <span class="error-message" id="error_password"> </span> -->
			<!-- </p> -->
	</div>

<?php do_action( 'woocommerce_login_form' ); ?>
			<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="forgot underline"><?php _e( 'Forgot your password?', 'woocommerce' ); ?></a>

			<div class="form-row remove-space">
			<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
			<!-- 	 -->
			<button class="button button-primary" name="login" id="sign_in" value="?php esc_attr_e( 'Login', 'woocommerce' ); ?>"> <?php esc_attr_e( 'Login', 'woocommerce' ); ?> </button>
			<?php
			if($path!=''){
			?>
			<input type="hidden" name="chk_redirect" value="<?php echo $path;  ?>" />
			

		<?php } ?>
			</div>
<p>If you don't have an account <i class="fa fa-frown-o" aria-hidden="true"></i>, please click <a class="underline join" href="<?php echo get_bloginfo('url'); ?>/join-us/" >Join Us</a></p>


			<?php do_action( 'woocommerce_login_form_end' ); ?>
			<!-- login ends here -->
</div>
			</form>
<?php } ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
<?php if($template == 'ST-Register.php'){ ?>
	<form method="post" class="register_btn tests">
<div class="form-wrap">
		<?php do_action( 'woocommerce_register_form_start' ); ?>

		<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

			<input type="hidden" name="username" id="first-name" class="floating-item-input input-item" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" onkeydown="alphabet(event);" onkeypress="return blockSpecialChar(event)"/>
		<?php endif; ?>
		<?php do_action( 'woocommerce_register_form_end' ); ?>
		<div class="form-row">
		<!-- <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide"> -->
			<label class="floating-item" data-error="Please enter your email address">

			<input type="text" class="floating-item-input input-item validate validate-email" maxlength="100" name="email" id="email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
			<span class="floating-item-label">EMAIL</span>
	        </label>
	        <!-- <span class="error-message" id="error_email"> </span> -->
		<!-- </p> -->
        </div>
   <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
   <div class="form-row btm-reduce">
			<!-- <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide"> -->
				<label class="floating-item" data-error="Please enter a password">
				<input type="password" autocomplete="false" class="floating-item-input input-item validate" name="password" id="password_reg" value="" />
				<span class="floating-item-label">PASSWORD</span>
			<!-- </p> -->
			</label>
			<!-- <span class="error-message" id="error_password"> </span> -->
    </div>
    
				<div class="form-row btm-reduce">
						         	<div class="checkboxradio-row">
								      	<input class="checkboxradio-item checkboxradio-invisible input-email-active" id="checkbox1" name="newsletter" type="checkbox">
								      	<label class="checkboxradio-label checkbox-label" for="checkbox1">I would like to opt in to receive your marketing communications.</label>
						         	</div>
					       		</div>
				       		<?php endif; ?>
		<div class="form-row remove-space">
			<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
			<button class="button button-primary" id="register_btn" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" >
			<?php esc_attr_e( 'Register', 'woocommerce' ); ?></button>
			<?php
			if($path!=''){
			?>
			<input type="hidden" name="chk_redirect" value="<?php echo $path;  ?>" />
			

		<?php } ?>
		</div>
	</div>
	</form>
<?php } ?>




</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
		
