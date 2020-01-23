<?php 
/**********
Template Name:Checkout
**********/
if (is_wc_endpoint_url( 'order-received' )){

get_header();
?>
<div class="container section-start nomobile">
				<div class="row">
					<div class="col-12">
					</div>
				</div>
			</div>
<div class="container generic-container">
					<div class="row">
						<div class="col-12">
							<h1>Thank you</h1>
							<?php echo apply_filters('the_content', $post->post_content); ?>
						</div>
					</div>
				</div>
<br>
<?php get_footer(); ?>
<?php 
}else{
get_header('checkout');
?>
<?php if(!is_user_logged_in()){
$the_slug = 'choose-a-payment-option';
$args = array(
  'name'        => $the_slug,
  'post_type'   => 'page',
  'post_status' => 'publish',
  'numberposts' => 1
);
$my_posts = get_posts($args);

	?>
<div class="container generic-container">
		            <div class="row sub-wrap">
						<div class="col-5 register center-block">
							<div class="no-desc back-catagory">
							<a href="<?php echo get_bloginfo('url'); ?>/cart">
								<i class="fa fa-angle-left" aria-hidden="true"></i>back to shopping bag
							</a>
						</div>
				    			<?php echo apply_filters('the_content', $post->post_content); ?>
						</div>
					</div>
				</div>


				<div class="container payg-select generic-container">
	<div class="row sub-wrap payment">
		<div class="col-6 center-block">
			<div class="no-desc back-catagory">
							<a href="<?php echo get_bloginfo('url'); ?>/checkout">
								<i class="fa fa-angle-left" aria-hidden="true"></i>Checkout
							</a>
						</div>
			<h1><?php echo $my_posts[0]->post_title; ?></h1>
			<p><?php echo do_shortcode(wpautop($my_posts[0]->post_content)); ?></p>
			<button class="button button-stripe button-large" id="pay-stripe">
				ONLINE PAYMENT
			</button>
			<button class="button button-paypal button-large" id="pay-paypal">
		    CASH ON DELIVERY
			</button>
			
		</div>
	</div>
</div>
			<?php } else{ 

				$the_slug = 'choose-a-payment-option';
$args = array(
  'name'        => $the_slug,
  'post_type'   => 'page',
  'post_status' => 'publish',
  'numberposts' => 1
);
$my_posts = get_posts($args);
				?>


<?php  
 $cust_id = get_current_user_id();
$existing_addresses=get_user_meta($cust_id, 'multi_address', 'true');
        if (is_array($existing_addresses) && count($existing_addresses) >= 1) { ?>

				<section class="myaccount-section  error-remove payment-chkout">
					<div class="container section-start nomobile">
				<div class="row">
					<div class="col-12">
			<div class="breadcrumbs clearfix nomobile">
				<ul>
					<li><a href="<?php echo get_site_url().'/'; ?>" title="Home">Home</a></li>
					<li><a href="#">Checkout</a></li>
				</ul>
			</div>
					</div>
				</div>
			</div>



			<div class="container generic-container multiple_add">
				<div class="row myaccount-heading">


					<div class="col-7">

						<div class="no-desc back-catagory">
							<a href="<?php echo get_bloginfo('url'); ?>/cart">
								<i class="fa fa-angle-left" aria-hidden="true"></i>back to shopping bag
							</a>
						</div>
					    <?php if ( $post = get_page_by_path( 'checkout', OBJECT, 'page' ) ){
					      $footerCont = wp_strip_all_tags(get_the_excerpt());
					      ?>
					    <h1><?php echo $post->post_title; ?></h1>
					    <p><?php echo $footerCont; ?></p>
					    <?php } ?>
					</div>
					 <div class="col-4 add_new_btn">
                              <button class="button button-primary formsection_trigger  button-large" href="javascript:void(0);"> 
                                <i class="fa fa-plus"></i>
                                Add new address
                              </button>
                  </div>

				</div>
						<?php echo apply_filters('the_content',wpautop($post->post_content)); ?>


			</div>
		</section>
		<div class="container payg-select generic-container">
	<div class="row sub-wrap  payment">
		<div class="col-6 center-block">
			<div class="no-desc back-catagory">
							<a href="<?php echo get_bloginfo('url'); ?>/checkout">
								<i class="fa fa-angle-left" aria-hidden="true"></i>Checkout
							</a>
						</div>
			<h1><?php echo $my_posts[0]->post_title; ?></h1>
			<p><?php echo do_shortcode(wpautop($my_posts[0]->post_content)); ?></p>
			<button class="button button-stripe button-large" id="pay-stripe">
				ONLINE PAYMENT
			</button>
			<button class="button button-paypal button-large" id="pay-paypal">
		    CASH ON DELIVERY
			</button>
		</div>
	</div>
</div>
			<?php }else{ ?>



<div class="container generic-container single_add">
		            <div class="row sub-wrap">
						<div class="col-5 register center-block">

						<div class="no-desc back-catagory">
							<a href="<?php echo get_bloginfo('url'); ?>/cart">
								<i class="fa fa-angle-left" aria-hidden="true"></i>back to shopping bag
							</a>
						</div>
					    <?php if ( $post = get_page_by_path( 'your-delivery-address', OBJECT, 'page' ) ){
					      $footerCont = wp_strip_all_tags(get_the_excerpt());
					      ?>
					    <h1><?php echo $post->post_title; ?></h1>
					    <div class="introtext">
					    <?php echo $footerCont; ?>
					    </div>
					    <?php } ?>

					    <?php if ( $post = get_page_by_path( 'checkout', OBJECT, 'page' ) ){ ?>

						<?php echo apply_filters('the_content',wpautop($post->post_content)); ?>
					<?php } ?>
					</div>


				</div>


			</div>
</div>
		<div class="container payg-select generic-container">
	<div class="row sub-wrap  payment">
		<div class="col-6 center-block">
			<div class="no-desc back-catagory">
							<a href="<?php echo get_bloginfo('url'); ?>/checkout">
								<i class="fa fa-angle-left" aria-hidden="true"></i>Checkout
							</a>
						</div>
			<h1><?php echo $my_posts[0]->post_title; ?></h1>
			<p><?php echo do_shortcode(wpautop($my_posts[0]->post_content)); ?></p>
			<button class="button button-stripe button-large" id="pay-stripe">
				ONLINE PAYMENT
			</button>
			<button class="button button-paypal button-large" id="pay-paypal">
		    CASH ON DELIVERY
			</button>
		</div>
	</div>
</div>


			<?php } } ?>
<?php get_footer(); }?>


