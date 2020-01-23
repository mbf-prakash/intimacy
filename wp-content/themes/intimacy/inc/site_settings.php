<?php

    // create custom plugin settings menu
    add_action('admin_menu', 'site_create_content');
	function site_create_content() {
		$themepage = add_menu_page('Site Settings', 'Site Settings', 'administrator','common-settings', 'site_settings_form');

		//call register settings function
		add_action( 'admin_init', 'register_site_settings' );
		add_action('admin_print_styles-' . $themepage, 'site_settings_admin_styles');
	}
	function register_site_settings(){
		$settings_value = array('contact_us_email','instaUser','listid','mailchimb');

		foreach($settings_value as $set )
			register_setting( 'commons-settings-group', $set );
	}

	function site_settings_admin_styles(){
// 		wp_enqueue_style('jquery-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
		wp_enqueue_style('farbtastic');
// 		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_style('thickbox');
		//wp_enqueue_script('jquery');
		wp_enqueue_script('media-upload');
		wp_enqueue_media();
	}

	function site_settings_form(){
		get_template_part('inc/upload-scripts');

?>
		<div class="wrap">
		<p style="text-align: center;"><a href="<?php echo site_url(); ?>" target="_blank"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/logo-circle.png" style="text-align: center;height: 83px!important;"></a></p>
			<form class="site-setting-form" method="post" id="point-settings" name="common-settings" action="options.php">
				<?php settings_fields('commons-settings-group');?>
					<div class="settings-container">
						<ul class='k2b-tabs'>
					 		<li><a href="#k2b-tab1">Site Options</a></li>
						</ul>

						<div class="set_tab">
						<div id="k2b-tab1" class="tab-wrapper">
			              <h2>Admin mail</h2>
			              	<table class="form-table">
			                   <?php
			   							 echo get_admin_input('text', 'contact_us_email', 'Mail', get_option('contact_us_email'), '');
			                  ?>
			                </table>
			                 
						</div>
						</div>
						<br/>
					  	<p class="submit" style=" text-align: center;"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" name="submit-settings" /></p>
				</div><!-- settings-container -->
			</form>
		</div><!-- wrap -->
<?php }?>
