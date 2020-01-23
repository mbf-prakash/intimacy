<?php 
/**********
Template Name:Register Page
**********/
if(is_user_logged_in() ){
  wp_redirect('my-account');          
}

get_header();
?>
<?php 
      $id = get_the_ID();
      $template = get_post_meta( $id, '_wp_page_template', true ); 
?>  
<?php do_action( 'woocommerce_before_customer_login_form' ); ?>
<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
<?php endif; ?>
    <div id="subPage" class="generic">
        <div class="container  generic-container">
            <div class="form-wrap main-blk sub-wrap">
                <div class="subwrap">
                    <div class="row">
                        <div class="col-7 register center-block">
							              <div class="breadcrumbs clearfix nomobile">
              <ul>
					<li><a href="<?php echo get_bloginfo('url'); ?>">Home</a></li>
				  <li><a><?php echo $post->post_title;?></a></li>
              </ul>
              </div>
							<div class="no-desc back-catagory">
						<a href="<?php echo get_bloginfo('url'); ?>">
							<i class="fa fa-angle-left" aria-hidden="true"></i>Home
						</a>
					</div><h1><?php echo $post->post_title; ?></h1> <?php echo apply_filters('the_content',$post->post_content ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();?>