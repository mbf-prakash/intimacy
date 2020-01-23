<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

 	$current_user=get_current_user_id();
    global $current_user;
	get_currentuserinfo();
$customer_id = get_current_user_id();
$firstname = get_user_meta( $customer_id, 'first_name', true );
$lastname = get_user_meta( $customer_id, 'last_name', true );
?>


<div class="container section-start nomobile">
				<div class="row">
					<div class="col-12">
			<div class="breadcrumbs clearfix nomobile">
				<ul>
					<li><a href="<?php echo get_site_url().'/'; ?>" title="Home">Home</a></li>
					<li><a href="#">My Account</a></li>
				</ul>
			</div>
					</div>
				</div>
			</div>

<div class="container generic-container">
	<div class="row myaccount-heading">
		<div class="col-8">

			<div class="no-desc back-catagory"><a href="<?php echo get_site_url().'/'; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i>Home</a></div>

			<h1>My Account</h1>
			<?php if ( $intro = get_page_by_path( 'my-account', OBJECT, 'page' ) ){
	  $intro_text = get_post_meta( $intro->ID, '_maintxt', true );?>
				<p><?php echo $intro_text;?></p>
			<?php } ?>
		</div>
	</div>



<div class="row formWrap main-content">
					<div class="col-3 myaccount-tab">
						<div class="myaccount-sidetab" >
							<ul>
								<li class="active" value="#details">My details</li>
								<li value="#order">My orders</li>
								<li value="#address">My address book</li>
							</ul>
						</div>
					</div>
					<div class="col-9 myaccount-form ">
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
						               <!--    <input type="hidden" name="account_display_name" value="<?php echo esc_attr( $current_user->first_name ); ?>" >  -->
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

							                <button type="submit" class="button button-tertiary update_account progress-button"  data-style="shrink" data-horizontal id="update_account" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"> <span class="content"> <?php esc_attr_e( 'Save', 'woocommerce' ); ?></span><span class="progress"><span class="progress-inner"></span></span></button>

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
						<div class="myaccount-subform" id="address">
						<?php
							$cust_id = get_current_user_id();
							$existing_addresses = get_user_meta($cust_id, 'multi_address', 'true');


							// var_dump(count($existing_addresses));
							// exit();
							if (isset($_POST['data-key'])) {
							  $deleteKey = $_POST['data-key'];
							  $cust_id = get_current_user_id();
							  $existing_addresses = get_user_meta($cust_id, 'multi_address', 'true');
							  foreach ($existing_addresses as $key => $value) {
							    if ($key == $deleteKey) {
							      $show_div = 1;
							      unset($existing_addresses[$deleteKey]);
							    }
							  }
							  // var_dump($existing_addresses);
							  update_user_meta( $cust_id, 'multi_address', $existing_addresses );
							}
							if (isset($_POST['newDefault'])) {
							  $newDefaultValue = $_POST['def-address'];
							  $defaultDelete = $_POST['newDefault'];
							  $cust_id = get_current_user_id();
							  $existing_addresses = get_user_meta($cust_id, 'multi_address', 'true');
							  $existing_addresses[$newDefaultValue]['is_default'] = '1';
							  foreach ($existing_addresses as $key => $value) {
							    if ($key == $defaultDelete) {
							      $show_div = 1;
							      unset($existing_addresses[$defaultDelete]);
							    }
							  }
							  update_user_meta( $cust_id, 'multi_address', $existing_addresses );
							}
						?>
						<div class="accord">My address book</div>
							<div class="subformtab">
							<h2>My address book</h2>
								<div class="row" >
									<div class="col-8">
										 <?php if ( $post = get_page_by_path( 'your-delivery-address', OBJECT, 'page' ) ){
                    $footerCont = apply_filters('the_content', $post->post_content);
                    ?>
                          <?php } ?>
                    <?php echo $footerCont; ?>

									</div>
									<div class="col-4 add-address-btn">
									<?php 
					                    if (count($existing_addresses) < 6) {
					                    ?>
					                    <div class="form-row remove-space">
					                              <button class="button button-primary add_address button-large" href="<?php echo get_bloginfo('url').'/add-address'; ?>"> 
					                                <i class="fa fa-plus"></i>
					                                Add new address
					                              </button>
					                          </div>
					                    <?php 
					                    }
					                  ?>
									</div>
								</div>
								<div class="row address-card-con">
									<?php
					                  foreach ($existing_addresses as $key => $value) { ?>
					                  <div class="col-4">
					                    <div class="myaccount-address-card">
					                     <h3><?php echo $value['first_name'].' '.$value['last_name']; ?></h3>
											<p><?php echo $value['address1']; ?>,<br/> 
												<?php echo $value['address2']; ?>,<br/><?php echo $value['city']; ?> <?php echo $value['postcode']; ?>,<br/><?php echo $value['county']; ?>,<br/> <?php echo "India"; ?>.
											</p>
											<a class="no-effect" href="tel:<?php echo $value['phone_number']; ?>"><?php echo $value['phone_number']; ?></a>
					                              <div class="myaccount-address-btn button-group">  
					                                <button class="button button-primary" onclick="location.href = '<?php echo get_bloginfo('url').'/edit-address?key='.$key; ?>';">edit</button>
					                                

					                  <form action="" class="deleteForm" method="post">
					                  <input type="hidden" class="data-key" name="data-key">
					                  </form>   
					                  <button class="button button-tertiary deleteButton" data-key='<?php echo $key; ?>' data-id="delete-address" >delete</button>

					                              </div>
					                    </div>
					                  </div>
					                <?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
