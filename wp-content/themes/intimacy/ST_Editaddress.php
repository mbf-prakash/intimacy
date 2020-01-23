<?php 
/**********
Template Name:Edit address
**********/
get_header();

?>
<?php 
$customer_id = get_current_user_id();
$firstname = get_user_meta( $customer_id, 'first_name', true );
$lastname = get_user_meta( $customer_id, 'last_name', true );
?>
<section class="myaccount-section">
<div class="container section-start nomobile">
				<div class="row">
					<div class="col-12">

			<div class="breadcrumbs clearfix nomobile">
				<ul>
					<li><a href="<?php echo get_site_url().'/'; ?>" title="Home">Home</a></li>
					<li><a href="#"><?php echo $post->post_title; ?></a></li>
				</ul>
			</div>
					</div>
				</div>
			</div>

<div class="container generic-container">
	<div class="row myaccount-heading">
		<div class="col-8">


	<div class="no-desc back-catagory"><a href="<?php echo get_site_url().'/my-account'; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i>My Account</a></div>
							<h1><?php echo $post->post_title; ?></h1>
							<?php echo apply_filters('the_content', $post->post_content); ?>
		</div>
	</div>
<div class="row formWrap main-content">
					<div class="col-3 myaccount-tab">
						<div class="myaccount-sidetab" >
							<ul>
								<li class="active" value="#details">My details</li>
								<li value="#order">My orders</li>
								<li onclick="location.href = '<?php echo get_bloginfo('url').'/my-account/?tab=address' ?>';">My address book</li>
								<li value="#address">Edit Address</li>
							</ul>
						</div>
					</div>
<div class="col-7 myaccount-form ">
	<div class="myaccount-subform active" id="details">
		 <div class="accord active">My Details</div>
		<div class="subformtab active" >
		<h2 class="active">My Details</h2>
			<div class="brand-block myaccount">
				<h3>Personal Information</h3>
			</div>
			<div class="row brand-block-tab">
				<div class="col-4">
					<?php if ( $introOne = get_page_by_path( 'my-account', OBJECT, 'page' ) ){
						$intro_text_one = get_post_meta( $introOne->ID, '_personatxt', true );?>
						<p><?php echo $intro_text_one;?></p>
					<?php } ?>									</div>
				<div class="col-8 input-adjust">
					 <form class="woocommerce-EditAccountForm edit-account edit_form form-wrap" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >
					<div class="account-names d-flex" > 
	                <?php do_action( 'woocommerce_edit_account_form_start' ); ?>
	                  <div class="form-row acc-name">
	                    <label class="floating-item" data-error="Please enter your Firstname">
	                      <input type="text" id="firstname" class="floating-item-input input-item validate valid_updateacc input-email-active" name="account_first_name" value="<?php echo $firstname; ?>" autocomplete="off" maxlength="75" onkeypress="return onlyAlphabets(event, this)"/>
	                      <span class="floating-item-label">First name</span>
	                    </label>
	                  </div>

	                  <div class="form-row acc-name">
	                    <label class="floating-item" data-error="Please enter your Lastname">
	                      <input type="text" id="last_name" class="floating-item-input input-item validate valid_updateacc input-email-active" name="account_last_name" value="<?php echo $lastname; ?>" autocomplete="off" maxlength="75" onkeypress="return onlyAlphabets(event, this)"/>
	                      <span class="floating-item-label">Last name</span>
	                    </label>
	                  </div>
	             <!--      <input type="hidden" name="account_display_name" value="<?php echo esc_attr( $current_user->first_name ); ?>" >  -->
	                <div class="form-row acc-name remove-space">
	                  <label class="floating-item" data-error="Please enter your Email">
	                    <input type="text" id="email" class="floating-item-input input-item valid_updateacc" name="account_email" value="<?php echo esc_attr( $current_user->user_email ); ?>" readonly="readonly" maxlength="100"/>
	                    <span class="floating-item-label">Email</span>
	                  </label>
	                </div>
	                </div>
	            </form>
					  <div class="clear"></div>

		                <div class="form-row">
											<input type="hidden" id="userid" class="floating-item-input input-item valid_updateacc" name="userid" value="<?php echo $customer_id; ?>" readonly="readonly" maxlength="100"/>

		                <button type="submit" class="button button-tertiary update_account progress-button"  data-style="shrink" data-horizontal id="update_account" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><span class="content"> <?php esc_attr_e( 'Save', 'woocommerce' ); ?></span><span class="progress"><span class="progress-inner"></span></span></button>

		                  <input type="hidden" name="action" value="save_account_details" />
		                </div>
					</div>
				</div>

			<div class="brand-block myaccount">
				<h3>Password</h3>
			</div>
			<div class="row brand-block-tab">
				<div class="col-4">
					<?php if ( $introTwo = get_page_by_path( 'my-account', OBJECT, 'page' ) ){
						$intro_text_two = get_post_meta( $introTwo->ID, '_passwordtxt', true );?>
						<p><?php echo $intro_text_two;?></p>
					<?php } ?>
				</div>
				<div class="col-4 input-adjust">
					 <form class="woocommerce-EditAccountForm edit-account edit_form form-wrap" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >
					 <div class="form-row">  
				        <label class="floating-item" data-error="Please enter your current password">
				        <input type="password" autocomplete="off" onblur="checkPassword()" class="floating-item-input input-item validate valid_updatepass" name="password_current" id="current_password"/ value="">
				        <span class="floating-item-label">CURRENT PASSWORD</span>
				        </label>
				                   <div class="error-messages" id="password-err" style="display: none;">Please enter a valid password</div>

				      </div>

				      <div class="form-row" id="password1" >
				        <label class="floating-item" data-error="Please enter your new password">
				        <input type="password" autocomplete="off" class="floating-item-input input-item validate valid_updatepass" name="password_1" id="password" />
				        <span class="floating-item-label">NEW PASSWORD</span>
				                   <span class="password-icon active"><i class="fa fa-eye toggle-password" aria-hidden="true"></i></span>

				          </label>
				      </div>
				       <div class="form-row  remove-space" id="password2">
				        <label class="floating-item" data-error="Please confirm your password">
				        <input type="password" autocomplete="off" class="floating-item-input input-item validate valid_updatepass" name="password_2" id="confirm_password" />
				        <span class="floating-item-label">CONFIRM PASSWORD</span>
				                    <span class="password-icon active"><i class="fa fa-eye toggle-password" aria-hidden="true"></i></span>

				        </label>

				       <div class="error-messages" id="passwordmis-err" style="display: none;">Password is mismatched</div>
				      </div>
					<div class="form-row ">
	              		<button class="button button-tertiary update_password progress-button" id="update_password" name="save_account_details" data-style="shrink" data-horizontal id="check_password"><span class="content"> <?php esc_attr_e( 'Save', 'woocommerce' ); ?></span><span class="progress"><span class="progress-inner"></span></span></button>

	            	</div>
	            </form>

				</div>
			</div>
			<div class="brand-block myaccount">
				<h3>Newsletter preferences</h3>
			</div>
			<div class="row brand-block-tab">
				<div class="col-4 last-para ">
					<?php if ( $introThree = get_page_by_path( 'my-account', OBJECT, 'page' ) ){
						$intro_text_three = get_post_meta( $introThree->ID, '_newslettertxt', true );?>
						<p><?php echo $intro_text_three;?></p>
					<?php } ?>
				</div>
				<div class="col-7">
					<div class="checkboxradio-row">
      <input class="checkboxradio-item checkboxradio-invisible input-email-active" id="checkbox1" name="newsletter" type="checkbox" checked="checked">
      <label class="checkboxradio-label checkbox-label" for="checkbox1">Subscribe to stay informed on our special offers.
</label>
    </div>
    <div class="form-row remove-space">
          <button class="button button-tertiary progress-button" id="newsletter" data-style="shrink" data-horizontal><span class="content"> <?php esc_attr_e( 'Save', 'woocommerce' ); ?></span><span class="progress"><span class="progress-inner"></span></span></button>

      </div>
				</div>
			</div>
		</div>
	</div>
	<div class="myaccount-subform" id="order">
		<div class="accord">My orders</div>
		<div class="subwrap subformtab">
		<!-- <h2>My orders</h2> -->
              <?php if ( $post = get_page_by_path( 'order-history', OBJECT, 'page' ) ){
        $footerCont = apply_filters('the_content', $post->post_content);
        ?>
<h2><?php echo $post->post_title; ?></h2>
<?php } ?>

<?php if ( $post = get_page_by_path( 'order-history', OBJECT, 'page' ) ){
        $footerCont = apply_filters('the_content', $post->post_content);
        ?>

    
        <p><?php echo $footerCont; ?> </p>
      
   <?php } ?>
			<?php
			/**
			 * My Orders - Deprecated
			 *
			 * @deprecated 2.6.0 this template file is no longer used. My Account shortcode uses orders.php.
			 */

			if ( ! defined( 'ABSPATH' ) ) {
			  exit;
			}

			$my_orders_columns = apply_filters( 'woocommerce_my_account_my_orders_columns', array(
			  'order-number'  => __( 'Order', 'woocommerce' ),
			  'order-date'    => __( 'Date', 'woocommerce' ),
			  'order-status'  => __( 'Status', 'woocommerce' ),
			  'order-total'   => __( 'Total', 'woocommerce' ),
			) );

			$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
			  'numberposts' => $order_count,
			  'meta_key'    => '_customer_user',
			  'meta_value'  => get_current_user_id(),
			  'post_type'   => wc_get_order_types( 'view-orders' ),
			  'post_status' => array_keys( wc_get_order_statuses() ),
			) ) );

			if ( $customer_orders ) : ?>

			  <!-- <h2><?php echo apply_filters( 'woocommerce_my_account_my_orders_title', __( 'Recent orders', 'woocommerce' ) ); ?></h2> -->

			  <table class="cart-table order-table" width="100%" border="0" cellpadding="15">

			    <thead class="order-design">
			      <tr>
			        <?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
			          <th class="<?php echo esc_attr( $column_id ); ?>  woocommerce-orders-table__header"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
			        <?php endforeach; ?>
			      </tr>
			    </thead>

			    <tbody>
			      <?php foreach ( $customer_orders as $customer_order ) :
			        $order      = wc_get_order( $customer_order );
			        $item_count = $order->get_item_count();
			        ?>
			        <tr class="clearfix cart-list">
			          <?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
			            <td class="<?php echo esc_attr( $column_id ); ?> product-subtotal sub-total" data-title="<?php echo esc_attr( $column_name ); ?>">
			              <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
			                <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

			              <?php elseif ( 'order-number' === $column_id ) : ?>
			                <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
			                  <?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?>
			                </a>

			              <?php elseif ( 'order-date' === $column_id ) : ?>
			                <time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

			              <?php elseif ( 'order-status' === $column_id ) : ?>
			                <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>

			              <?php elseif ( 'order-total' === $column_id ) : ?>
			                <?php
			                /* translators: 1: formatted order total 2: total order items */
			                printf( _n( '%1$s ', '%1$s', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count );
			                ?>

			              <?php elseif ( 'order-actions' === $column_id ) : ?>
			              
			              <?php endif; ?>
			            </td>
			          <?php endforeach; ?>
			        </tr>
			      <?php endforeach; ?>
			    </tbody>
			  </table>
			<?php endif; ?>

		</div>
	</div>

<div class="myaccount-subform active" id="address">
  <div class="accord active">Edit Address</div>

 <div class="subformtab active">
   <div class="no-desc back-catagory">
        <a onclick="location.href = '<?php echo get_bloginfo('url').'/my-account/?tab=address' ?>';">
          <i class="fa fa-angle-left" aria-hidden="true"></i>My address book
        </a>
      </div>

                <?php if ( $post = get_page_by_path( 'your-delivery-address', OBJECT, 'page' ) ){
        ?>
  <h2><?php echo $post->post_title; ?></h2>


      <?php } ?>

              <?php if ( $post = get_page_by_path( 'your-delivery-address', OBJECT, 'page' ) ){
        $footerCont = apply_filters('the_content', $post->post_content);
        ?>

        <div class="introtext"><?php echo $footerCont; ?></div>

      <?php } ?>
 <form method="post" class="addaddress_form" action="">
 <?php

 $address_key = $_GET['key'];

if(isset($_POST['save']) && $_POST['save'] !='') {
	$first_name = $_POST['firstname'];
	$last_name = $_POST['lastname'];
	$email_address = $_POST['email_address'];
	$phone_number = $_POST['phone_number'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$county = $_POST['county'];
	$postcode = $_POST['postcode'];
	$country=$_POST['country'];
	if ($_POST['checkgroup'] == 'set') {
		$default_add_check = '1';
	} else {
		$default_add_check = '0';
	}
	$cust_id = get_current_user_id();
	$existing_addresses = get_user_meta($cust_id, 'multi_address', 'true');
	$existing_addresses[$address_key]['first_name'] = $first_name;
	$existing_addresses[$address_key]['last_name'] = $last_name;
	$existing_addresses[$address_key]['email_address'] = $email_address;
	$existing_addresses[$address_key]['phone_number'] = $phone_number;
	// $existing_addresses[$address_key]['is_default'] = $default_add_check;
	$existing_addresses[$address_key]['address1'] = $address1;
	$existing_addresses[$address_key]['address2'] = $address2;
	$existing_addresses[$address_key]['city'] = $city;
	$existing_addresses[$address_key]['county'] = $county;
	$existing_addresses[$address_key]['postcode'] = $postcode;
	$existing_addresses[$address_key]['country'] = $country;

	delete_user_meta($cust_id, 'multi_address');
	if ($first_name != '' || $last_name != '') {
		update_user_meta( $cust_id, 'multi_address', $existing_addresses );
		unset($_POST);
		// $url = get_bloginfo('url').'/address-book';
		// wp_redirect( $url );
		echo "<script type=\"text/javascript\">";
       	echo "window.location='" . get_bloginfo('url') . "/my-account/?tab=address'";

        echo "</script>";
		exit;
	}
} else {
	$cust_id = get_current_user_id();
	$existing_addresses = get_user_meta($cust_id, 'multi_address', 'true');
	foreach ($existing_addresses as $key => $value) {
		if ($address_key == $key) {
			$first_name = $value['first_name'];
			$last_name = $value['last_name'];
			$email_address = $value['email_address'];
			$phone_number = $value['phone_number'];
			$address1 = $value['address1'];
			$address2 = $value['address2'];
			$city = $value['city'];
			$county = $value['county'];
			$postcode = $value['postcode'];
			$country=$value['country'];
		}
	}
}
?>
 <div class="form-wrap">
 <div class="form-row form-row" id="billing_first_name_field"><label for="billing_first_name" class="floating-item" data-error="Please enter your first name"></label><div class="floating-item" data-error="Please enter your first name"><input type="text" name="firstname" id="billing_first_name" class="floating-item-input input-item" value="<?php echo $first_name; ?>" maxlength="75" onkeypress="return apostrophe(event, this)"><span class="floating-item-label" >FIRST NAME</span></div></div>


<div class="form-row form-row floating-item " id="billing_last_name_field"><label for="billing_last_name" class="floating-item" data-error="Please enter your last name"></label><div class="floating-item" data-error="Please enter your last name"><input type="text" class="input-text floating-item-input input-item validate input-email-active" name="lastname" id="billing_last_name" placeholder="" value="<?php echo $last_name;?>" maxlength="75" onkeypress="return apostrophe(event, this)"><span class="floating-item-label" >LAST NAME</span></div></div><div class="clear"></div>
    
      <div class="form-row floating-item address-field " id="billing_address_1_field"><div class="floating-item" data-error="Please enter the your address line one"><input type="text" class="input-text floating-item-input input-item validate input-email-active" name="address1" id="billing_address_1" placeholder="" value="<?php echo $address1;?>" onkeypress="return apostrophespecial(event, this)"><label for="billing_address_1" class="floating-item-label floating-item"  data-error="Please enter the your address line one">ADDRESS LINE 1</label></div></div>

      	<div class="form-row floating-item address-field " id="billing_address_2_field"><div class="floating-item" data-error="Please enter the your address line two"><input type="text" class="input-text floating-item-input input-item input-email-active" name="address2" id="billing_address_2" placeholder="" value="<?php echo $address2;?>" onkeypress="return apostrophespecial(event, this)"><label for="billing_address_2" class="floating-item-label floating-item"  data-error="Please enter the your address line two">ADDRESS LINE 2 (OPTIONAL)</label></div></div>
	 
      <div class="form-row form-row floating-item address-field " id="billing_city_field"><div class="floating-item" data-error="Please enter the name of the city you live in"><input type="text" class="input-text floating-item-input input-item validate input-email-active" name="city" id="billing_city" placeholder="" value="<?php echo $city;?>" onkeypress="return apostrophespecial(event, this)"><label for="billing_city" class="floating-item-label floating-item"  data-error="Please enter the name of the city you live in">City</label><span class="floating-item-label">City</span></div></div>
    
      <div class="form-row form-row floating-item validate address-field " id="billing_postcode_field"><div class="floating-item" data-error="Please enter your postcode"><input type="text" class="input-text floating-item-input input-item validate input-email-active" name="postcode" id="billing_postcode" placeholder="" value="<?php echo $postcode;?>" onkeypress="return isNumber(event)"><label for="billing_postcode" class="floating-item-label floating-item"  data-error="Please enter your postcode">Postcode</label><span class="floating-item-label">Postcode</span></div></div>
    



     <?php


       $countyArray = ["Andra Pradesh", "Arunachal Pradesh","Assam","Bihar","Chhattisgarh","Goa","Gujarat","Haryana","Himachal Pradesh","Jammu and Kashmir","Jharkhand","Karnataka","Kerala","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Orissa","Punjab","Rajasthan","Sikkim","Tamil Nadu","Tripura","Uttaranchal","Uttar Pradesh","West Bengal","Andaman and Nicobar Islands","Chandigarh","Dadar and Nagar Haveli","Daman and Diu","Delhi","Lakshadeep","Pondicherry"];

?>
<div class="form-row form-row floating-item address-field" id="billing_state_field"><label for="billing_state-button" class="floating-item-label floating-item" data-error="Please enter your state/county"><span class="floating-item-label"></span></label>
              <div class="form-row select-row">
                <select name="county" id="billing_state" class="select-menu " data-placeholder="State (Optional)">
                <option value="">State (Optional)</option>
                  <?php
                foreach ($countyArray as $countykey => $value) { ?>

                          <option value="<?php echo $value;?>"<?php if($county==$value){ echo "selected";} ?> ><?php echo $value;?></option>
                <?php }?>





          </select>
          </div>
          </div>

      <div class="form-row form-row floating-item address-field " id="billing_country_field"><label for="billing_country-button" class="floating-item"></label><div><input type="text" class="input-text floating-item-input input-item input-email-active" id="defautl_country" placeholder="" value="India" onkeypress="return blockSpecialChar(event)" readonly=""><span class="floating-item-label" >Country</span><span class="floating-item-label">COUNTRY</span></div></div>
    
      <div class="form-row form-row form-row-wide  validate-phone" id="billing_phone_field"><label for="billing_phone" class="floating-item" data-error="Please enter your phone number"></label><div class="floating-item" data-error="Please enter your phone number"><input type="text" class="input-text floating-item-input input-item validate input-email-active" onkeypress="return isNumber(event)" maxlength="12" name="phone_number" id="billing_phone" value="<?php echo $phone_number;?>"><span class="floating-item-label" >Phone</span></div></div>
    
      <div class="form-row form-row form-row-wide  validate-email" id="billing_email_field"><label for="billing_email" class="floating-item" data-error="Please enter your email address"></label><div class="floating-item" data-error="Please enter your email address"><input type="email" class="input-text floating-item-input input-item validate input-email-active" name="email_address" id="billing_email" placeholder="" autocomplete="email username" value="<?php echo $email_address;?>"><span class="floating-item-label" >Email address</span></div></div>
        

        
    <div class="form-row"><button type="submit" class="button button-primary save_address" name="save" value="save"><?php esc_attr_e( 'Save Address', 'woocommerce' ); ?></button></div>



</div>
</form>
</div>
</div>


</div>


</div>
</div>
</section>
<?php get_footer();?>
