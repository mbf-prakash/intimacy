<?php

    // create custom plugin settings menu
    add_action('admin_menu', 'site_create_template');
	function site_create_template() {
		$themepage = add_menu_page('Email Template', 'Email Template', 'administrator','commons-settings', 'template_settings_form');

		//call register settings function
		add_action( 'admin_init', 'template_site_settings' );
		add_action('admin_print_styles-' . $themepage, 'template_settings_admin_styles');
	}
	function template_site_settings(){
		$settings_val = array('contact_us_admin','contact_us_custom','newsletter_msg','after_register','forgot_password','order_complete');

		foreach($settings_val as $set )
			register_setting( 'common-settings-group', $set );
	}

	function template_settings_admin_styles(){
		wp_enqueue_style('jquery-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
		wp_enqueue_style('farbtastic');
		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_style('thickbox');
		//wp_enqueue_script('jquery');
		wp_enqueue_script('media-upload');
		wp_enqueue_media();
	}

	function template_settings_form(){
		get_template_part('inc/upload-scripts');

?>
		<div class="wrap">
		<p style="text-align: center;"><h2>Email Template Message</h2></p>
			<form class="site-setting-form" method="post" id="point-settings" name="common-settings" action="options.php">
				<?php settings_fields('common-settings-group');?>
					<div class="settings-container">
						<ul class='k2b-tabs'>
<!-- 					 		<li><a href="#k2b-tab1"> Site Options</a></li>
 -->						</ul>

						<div class="set_tab">
						<div class="tab-wrapper">
			              	<table class="form-table">
			                <?php
			                   	echo get_admin_input('editor', 'after_register', 'After Registration Message', get_option('after_register'), '');
			                   	echo get_admin_input('editor', 'forgot_password', 'Forgot password Message', get_option('forgot_password'), '');
			                   	echo get_admin_input('editor', 'order_complete', 'Order Complete Message', get_option('order_complete'), '');
			   					echo get_admin_input('editor', 'contact_us_custom', 'Contactus Customer Message', get_option('contact_us_custom'), '');
			   					echo get_admin_input('editor', 'contact_us_admin', 'Contactus Admin Message', get_option('contact_us_admin'), '');
			   					echo get_admin_input('editor', 'newsletter_msg', 'Newsletter Message', get_option('newsletter_msg'), '');
			                ?>
			                </table>
						
						</div>
						<br/>
					  	<p class="submit" style=" text-align: center;"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" name="submit-settings" /></p>
				</div><!-- settings-container -->
			</form>
		</div><!-- wrap -->
<?php }?>
