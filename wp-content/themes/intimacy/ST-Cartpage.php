<?php
/**********
Template Name: Cart Page
**********/
?>
<?php get_header();?>
		<div class="container section-start nomobile">
			    	<div class="row">
			    		<div class="col-12">
		    				<div class="breadcrumbs clearfix">
								<ul>
									<li><a href="<?php echo get_site_url().'/'; ?>" title="Home">Home</a></li>
									<li><a href="#" title="SHOPPING BAG">SHOPPING BAG</a></li>
								</ul>
							</div>
			    		</div>
			    	</div>
			    </div>

		<div class="container generic-container">
	            <div class="subwrap cart">
					<div class="no-desc back-catagory">
						<a href="<?php echo get_bloginfo('url'); ?>">
							<i class="fa fa-angle-left" aria-hidden="true"></i>Home
						</a>
					</div>
					 <h1><?php echo $post->post_title; ?></h1>
					  <div id="woocart">
					  		<?php echo apply_filters('the_content',wpautop($post->post_content)); ?>
					  </div>
	                <div class="clearfix checkout">
						<?php if ( WC()->cart->get_cart_contents_count() != 0 ) :   ?>
						<a href="<?php echo esc_url( wc_get_checkout_url() ) ;?>">
							<button class="button button-primary fR"><?php echo __( 'Checkout', 'woocommerce' ); ?></button>
						</a>
						<?php endif; ?>
						<a href="<?php echo get_site_url().'/shop-all'; ?>" class="shopcontinue">Continue Shopping</a>
	                </div>
	            </div>
		</div>
<?php get_footer(); ?>