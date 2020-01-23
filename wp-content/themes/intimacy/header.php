<!DOCTYPE html>
<html class="homebg" lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="user-scalable=no,initial-scale=1,maximum-scale=1.0" />
  <link rel="shortcut icon" href="http://uat.intimacy.co.in/wp-content/uploads/2019/07/logo-circle.png"/>
  <meta name="description" content="<?php if ( is_single() ) {
        echo get_post_meta($post->ID,'_su_description', true); 
    } else {
        echo bloginfo('name'); 
    }
    ?>" />
<meta name="keywords" content="<?php if ( is_single() ) {
        echo get_post_meta($post->ID,'_su_keywords', true); 
    } else {
        echo bloginfo('name'); 
    }
    ?>"/>
 
  <!-- <link rel="shortcut icon"href="img/nl-favicon.png"/> -->
  <title><?php bloginfo('name'); ?><?php if(wp_title('', false)) { echo ' |'; } ?><?php wp_title(''); ?> </title>
  <!-- modernizr included -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
  <style>
    body{
      background-color: #fff;
    }
/*    .render-blk{ opacity:0; }*/
  </style>
  <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/style.css">
  <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/app.css">
  <script>
     var templateUri = "<?php  echo get_bloginfo('template_url'); ?>";
     var blogUri = "<?php echo get_bloginfo('url'); ?>";
     var tmpl_url = '<?php echo TMPL_URL; ?>';
  </script>
<!--   <noscript>
    <style media="screen">
      .render-blk{ opacity: 1; }
    </style>
  </noscript> -->
</head>

<body>
<div class="render-blk">
  <?php
        if ( $notify = get_page_by_path( 'homepage', OBJECT, 'page' ) ){
          $notify_text = get_post_meta( $notify->ID, '_notify', true );
          ?>
    <!-- Notification bar starts here -->
   <!--  <div class="notification-bar">
      <div class="container"><?php echo $notify_text;?></div>
    </div> -->
    <!-- Notification bar ends here -->
    <?php } ?>
	
 <?php if(is_page() && !is_front_page()) {?>
        <div id="subPage">
    <?php }?>
<?php if( is_single() && !is_front_page() && !is_page()=="lost-password"){ ?>
              <div id="subPage">

<?php } ?>

<?php if(is_product_category() && !is_front_page() && !is_page()=="lost-password"){?>

<div id="subPage">
<?php } ?>
<?php if( is_page()=='shop' && !is_front_page() && (!end($request) == 'my-account' && !is_account_page() ) ){ ?>
   <div id="subPage">
              <div class="shop-wrap">

<?php } ?>
    <!-- Header section starts here -->
  <header>
        <div class="container">
            <div class="row">
              <?php
                if ( $logo = get_page_by_path( 'homepage', OBJECT, 'page' ) ){
                      $logo_meta = get_post_meta( $logo->ID, '_uplogo', true );
                      ?>

                      <div class="col-2 logo hide-onsearch1">
                          <a class="no-effect" href="<?php echo get_site_url().'/'; ?>">
                            <img class="hide-onsearch" src="<?php echo $logo_meta;?>" alt="logo-footer">
                          </a>
                      </div>
              <?php } ?>
                <div class="col-8 nav-menu hide-onsearch">
                              <ul class="clearfix ">
             
                      <?php if((is_page() || is_shop() || is_product_category() || is_single()) && !is_front_page()) {?>
                    <div class="no-desc">
                      <li><a href="<?php echo get_site_url().'/'; ?>" class="nosub-nav">Home</a></li>
                    </div>
              <?php } ?>
                    <div class="no-mobile">
                     <?php  
                     $headerMenus = dropDownMenu('mainmenu');
                     foreach ($headerMenus as $key => $headerLink) {?>
                     <?php } ?>
                     </div>
                      <div class="no-desc">
                     <?php  
                     $headerMenus = dropDownMenu('mobile_menu');
                     foreach ($headerMenus as $key => $headerLink) {?>
                     <?php } ?>
                     </div>
                <div class="no-desc">
                  <?php if(is_user_logged_in()){ ?>
                  <li><a class="nosub-nav" href="<?php echo get_bloginfo('url'); ?>/my-account/">My Account</a></li>
                  <li><a class="nosub-nav" href="<?php echo wp_logout_url(); ?>">Sign Out</a></li>
                  <?php }else{ ?> 
                  <li><a class="nosub-nav" href="<?php echo get_bloginfo('url'); ?>/sign-in/">Sign In</a></li>
                  <li><a class="nosub-nav" href="<?php echo get_bloginfo('url'); ?>/join-us/">Join Us</a></li>
                   <?php } ?>
                </div>
          </ul>
                </div>
                <div class="col-2 cart hide-onsearch">
                    <ul class="shopbag">
                        <li>
                          <a class="no-effect search-icon" href="#!">
                            <img class="img-normal" src="<?php echo get_bloginfo('template_url'); ?>/images/search.png" alt="search" />
                            <img class="img-hover" src="<?php echo get_bloginfo('template_url'); ?>/images/search-black.png" alt="search" />
                          </a>
                      </li>
                        <li class="carturl">
                          <?php
                                $ord_count = WC()->cart->cart_contents_count;
                                $cartUrl = wc_get_cart_url();
                                $ord_count_disp = $ord_count == 0?'0':$ord_count;
                                $cart_url = $ord_count != 0?$cartUrl:'javascript:void(0)';
                          ?>
                          <a  class="no-effect" href="<?php echo $cart_url; ?>">
                           <img class="img-normal" src="<?php echo get_bloginfo('template_url'); ?>/images/bag.png" alt="bag">
                           <img class="img-hover" src="<?php echo get_bloginfo('template_url'); ?>/images/bag-black.png" alt="bag" />
                          <span class="quantity"><?php echo $ord_count_disp; ?></span>
                          </a>
                        </li>
                       
                        <li class="drop no-mobile">
                           <a class="no-effect" href="<?php echo $cart_url; ?>">
                                <img class="img-normal" src="<?php echo get_bloginfo('template_url'); ?>/images/account.png" alt="account" />
                                <img class="img-hover" src="<?php echo get_bloginfo('template_url'); ?>/images/account-black.png" alt="account" />
                            </a>
                             <?php if(is_user_logged_in()){ ?>
                            <div class="dropbox">
                                <h6>YOUR ACCOUNT</h6>
                                <br>
                                <div class="button-group">
                                <a href="<?php echo get_bloginfo('url'); ?>/my-account/" class="button button-primary button-small">MY ACCOUNT</a>
                                <a href="<?php echo wp_logout_url(); ?>" class="button button-primary button-small">Logout</a>
                              </div>
                            </div>
                            <?php }else{?>
                              <div class="dropbox">
                                <h6>YOUR ACCOUNT</h6>
                                <br>
                                <div class="button-group">
                                <a href="<?php echo get_bloginfo('url'); ?>/sign-in/" class="button button-primary button-small">Sign in</a>
                                <a href="<?php echo get_bloginfo('url'); ?>/join-us/" class="button button-primary button-small">Join Us</a>
                              </div>
                            </div>
                            <?php }?>
                        </li>
                         
                        <!-- <li><a href="<?php echo get_bloginfo('url'); ?>/sign-in/">SIGN IN</a></li>
                        <li><a href="<?php echo get_bloginfo('url'); ?>/sign-up/">SIGN UP</a></li> -->
                         
                    </ul>
                </div>
                <div class="col-12 search-wrapper">
                    <div class="search-bar">
                        <div class="search-block">
                            <input type="text" name="search" class="search-box" id="search-tag"  placeholder="What would you like to search for today?" onkeypress="fetch()" >
                            <button type="submit" name="submit" class="search-submit"><img src="<?php echo get_bloginfo('template_url'); ?>/images/search-white.png" alt="search" /></button>
                            <div class="search-result" id="search-result">
                                
                            </div>
                        </div>
                        <div class="search-close">
                            <img src="<?php echo get_bloginfo('template_url'); ?>/images/close.png" alt="close" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menuToggle"  class="">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>
    <!-- Header section ends here -->
