<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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
 * @version 2.1.2
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

/** @global WC_Checkout $checkout */

?>


<script type="text/javascript">
        var templateUri = "<?php echo get_bloginfo('template_url'); ?>";
        var userid="<?php echo get_current_user_id(); ?>";
        var blogurl= "<?php echo get_bloginfo('url'); ?>";
</script>
<?php

$customer_id= get_current_user_id();
$editedlast=$_GET['editedlast'];
  $cust_id = get_current_user_id();
//wc_print_notices(); ?> 


<?php if(is_user_logged_in()){ ?>

<div class="col-9">


        <?php
                
        $existing_addresses=get_user_meta($cust_id, 'multi_address', 'true');
        if (is_array($existing_addresses) && count($existing_addresses) >= 1) { ?>
                <div class="row address-card-con">
                     <?php krsort($existing_addresses);
                    foreach ($existing_addresses as $key => $value) {
                    ?>

                    <div class="col-4 <?php echo $key;?> ">

          <div class="myaccount-address-card">
                        
                       <h3><?php echo $value['first_name'].' '.$value['last_name']; ?></h3>
                      <p><?php echo $value['address1']; ?>,<br/> <?php echo $value['city']; ?> <?php echo $value['postcode']; ?>,<br/><?php echo $value['county']; ?>,<br/> <?php echo "India"; ?>.
                      </p>
                      <a class="no-effect" href="tel:<?php echo $value['phone_number']; ?>"><?php echo $value['phone_number']; ?></a>

                      <div class="myaccount-address-btn button-group">  


                        <div class="checkboxradio addressradio">
                            <div class="checkboxradio-row">
                                <input class="checkboxradio-item checkboxradio-invisible " name="placement" id="chekout<?php echo $key; ?>" type="radio" value="<?php echo $value['first_name']."~".$value['last_name']."~".$value['email_address']."~".$value['phone_number']."~".$value['address1']."~".$value['address2']."~".$value['city']."~".$value['county']."~".$value['postcode']."~".$value['country']."~".$key; ?>" />
                                <label class="checkboxradio-label radio-label radiocheckbilling" for="chekout<?php echo $key; ?>"><span>Deliver to this address</span></label>
                            </div>
                        </div>

                              </div>

                    </div>

        </div>
             <?php } ?>
                </div>
            <?php } ?>


             <?php } ?>
</div>

<?php $customer_id= get_current_user_id();
//wc_print_notices(); ?>
<div class="<?php if(is_user_logged_in()){ ?> col-6 <?php }?>">
<div class="woocommerce-billing-fields title-head" id="formsection">

  <?php if(is_user_logged_in()){?>
    <?php if (is_array($existing_addresses) && count($existing_addresses) != 0) { ?>
<?php if ( $post = get_page_by_path( 'your-delivery-address', OBJECT, 'page' ) ){
                $footerCont = apply_filters('the_content', $post->post_content);
                ?>
              <h1><?php echo $post->post_title; ?></h1>
              <div class="introtext">
      <p><?php echo $footerCont; ?></p>
            </div>
              <?php } ?>
  <?php } } else{?>

    <?php if ( $post = get_page_by_path( 'your-delivery-address', OBJECT, 'page' ) ){
                $footerCont = apply_filters('the_content', $post->post_content);

                ?>
              <h1><?php echo $post->post_title; ?></h1>
              <?php } ?>
              <div class="introtext">
              <p>Already have an account? <a class="underline" href="<?php echo get_bloginfo('url'); ?>/sign-in/">Sign in</a> for a faster checkout or <a class="underline" href="<?php echo get_bloginfo('url'); ?>/join-us/">Join us</a> to create an account with us. </p>

            </div>

  <?php } ?>

<?php if ($customer_id == "") { ?>
<?php }else{ ?>
  <ul class="clearfix tabsw breadcrumbs breadcrumb-btm">
    <li class="active" data-url="<?php echo get_bloginfo('url') ?>/checkout?order=c" id="shopcart">Delivery Information</li>
    <li data-url="javascript:void(0)" class="active" id="ordconf">Payment</li>
    <li id="ordrec">All done</li>
</ul>
<?php } ?>
<div class="form-wrap">

   <?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>
        <?php foreach ( $checkout->checkout_fields['billing'] as $key => $field ) : ?>
        <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
        <?php endforeach; ?>

  <?php do_action('woocommerce_after_checkout_billing_form', $checkout ); ?>

  <?php if ( ! is_user_logged_in() && $checkout->enable_signup ) : ?>

    <?php if ( $checkout->enable_guest_checkout ) : ?>
<!-- 
      <p class="create-account">
        <input class="input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true) ?> type="checkbox" name="createaccount" value="1" /> <label for="createaccount" class="checkbox"><?php _e( 'Create an account?', 'woocommerce' ); ?></label>
      </p> -->

    <?php endif; ?>

    <?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>
    <?php if ( ! empty( $checkout->checkout_fields['account'] ) ) : ?>

      <div class="create-account">
        <?php foreach ( $checkout->checkout_fields['account'] as $key => $field ) : ?>

          <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

        <?php endforeach; ?>

        <div class="clear"></div>

      </div>

    <?php endif; ?>

    <?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>


  <?php endif; ?>
  <?php ?>

<!--      <button class="button button-primary new_add" style="display: none;"onclick="addaddress(blogurl,templateUri,userid);">Save to address book</button>  -->


<?php  
 $cust_id = get_current_user_id();
$existing_addresses=get_user_meta($cust_id, 'multi_address', 'true');
        if (is_array($existing_addresses) && count($existing_addresses) >= 1) { ?>

                   <input type="hidden" class="woocommerce-checkout" id="addresskey" name="addresskey" value="">
<input type="hidden" class="woocommerce-checkout" id="default_add_check" name="default_add_check" value="">
  <div class="form-row">
     <button type="submit" class="button-submit button button-primary single_add checkout_submit button-large" name="submit">PROCEED TO PAYMENT</button> 
    
    <?php } else{?>

                   <input type="hidden" class="woocommerce-checkout" id="addresskey" name="addresskey" value="">
<input type="hidden" class="woocommerce-checkout" id="default_add_check" name="default_add_check" value="">
  <div class="form-row">
     <button type="submit" class="button-submit button button-primary  checkout_submit button-large" name="submit" onclick="addaddress(blogurl,templateUri,userid)">PROCEED TO PAYMENT</button> 


    <?php } ?>
  </div>
</div>
</div>
<script type="text/javascript">
    jQuery('document').ready(function () {
    
        jQuery('#chekout<?php echo $editedlast; ?>').trigger('click');
       if('<?php echo $editedlast; ?>')
       {
            setTimeout(function(){
            $('html, body').animate({
                    scrollTop: $("#formsection").offset().top-30
                }, 1000);      
            },2000);

        }
       if('<?php echo $editedlast; ?>'=='0'){
            setTimeout(function(){
            $('html, body').animate({
                    scrollTop: $("#formsection").offset().top-30
                }, 1000);      
            },2000);

        }

$('.formsection_trigger').click(function(){

 jQuery('#chekout<?php echo $editedlast; ?>').prop('checked', false); 

$('[id^=chekout]').prop('checked', false); 


$('html, body').animate({
        scrollTop: $("#formsection").offset().top-30
    }, 1000); 
});
$('.radiocheckbilling').click(function(){
   $('html, body').animate({
        scrollTop: $("#formsection").offset().top-30
    }, 1000); 
});





});
   

</script>