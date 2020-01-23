<?php
/**********
Template Name: Homepage
**********/
?>
<?php
get_header();
?>
    <!-- Banner section starts here -->
    <section class="hero-banner">
      <?php  if ( $banner = get_page_by_path( 'homepage', OBJECT, 'page' ) ){
  $banner_image = get_post_meta( $banner->ID, '_banner_image', true );
  $video = get_post_meta( $banner->ID, '_banner_link', true );

  ?>
        <div class="homeVideo">
            <iframe style="border:0;" allow=autoplay></iframe>
            <div class="playerOverlay" data-video="<?php echo $video;?>" id="playerOverlay">
                <img alt="images" class="playBanner" src="<?php echo $banner_image;?>" />
                <div class="playDescription">
                    <img alt="" src="<?php echo get_bloginfo('template_url'); ?>/images/play-button.png" />
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="hero-banner-caption">
            <div class="container">
                <div class="hero-banner-content wow fadeInUp" data-wow-delay="0.1s">
                    <p><span><?php echo apply_filters('the_content', $post->post_content);?></span></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner section ends here -->

    <!-- Product listing section starts here -->
    <section class="product-listing">
        <div class="container">
            <div class="center-heading">
                <h2>What's Trending</h2>
            </div>
            <div class="row">
               <?php $chkd_prods = get_post_meta( $post->ID, 'show_in_product', true );
                        $product_cat_args = array(
                          'post_type' => 'product',
                          'orderby'    => 'menu_order',
                          'order' => 'ASC',
                          'numberposts'=>-1

                         );
                        $products = get_posts($product_cat_args);
            foreach ($products as $key => $product) {
                if (!in_array($product->ID, $chkd_prods)) {
                    continue;
                }
                $feat_image = wp_get_attachment_url(get_post_thumbnail_id($product));
                $secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
                            ?>                      <div class="col-3">
                                                            <a href="<?php echo get_permalink($product->ID); ?>" class="card thumbnail-wrapper no-effect wow fadeInUp" data-wow-delay="0.1s">
                                                                                    <img src="<?php echo $feat_image; ?>" alt="productimg" />
                                                                                <?php if($secondry_Image !=''){?>
                                                                                    <span class="product-additional">
                                                                                      <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
                                                                                    </span>
                                                                                <?php } ?>
                                                                                <div class="card-content">
                                                                                    <h5><?php echo $product->post_title; ?></h5>
                                                                                   <?php
                                                        $var = new WC_Product_Variable( $product->ID );
                                                        $variations = $var->get_available_variations();
                                                            $variation_product_id = $variations [0]['variation_id'];
                                                        if(count($variations) != 0){
                                                            $variation_product = new WC_Product_Variation( $variation_product_id );
                                                            $var_reg_prc = $variation_product->regular_price;
                                                            $var_sal_prc = $variation_product->sale_price;

                                                        ?>
                                                        <h4><?php if($var_sal_prc!=''){ ?><span class="unitprice">₹<?php echo $var_reg_prc; ?>.00</span>
					                                    	₹<span><?php echo $var_sal_prc; ?>.00<?php }else{ ?> ₹<?php echo $var_reg_prc;?>.00 <?php } ?></span></h4>
                                                        <?php

                                                         }else{

                                                            $reg_prc = get_post_meta( $product->ID, '_regular_price', true);
                                                            $sal_prc = get_post_meta( $product->ID, '_sale_price', true);
                                                            $price_show = $sal_prc == ''?$reg_prc:$sal_prc;
                                                            ?>
                                                            <h4>

                                                            <?php if($sal_prc!=''){ ?>
                                                            ₹<span class="unitprice"><?php echo $reg_prc; ?></span>
                                                             ₹<span><?php echo $sal_prc; ?><?php }else{ ?> ₹<?php echo $reg_prc; } ?>
                                                            </span>
                                                            </h4>
                                                        <?php } ?>
                                                                </div>
                                                            </a>
                                                    </div>
            <?php } ?>
            </div>
        </div>
    </section>
    <!-- Product listing section ends here -->
    <!-- New arrival section starts here -->
    <?php
    $showInHome3 = get_post_meta($post->ID, 'show_in_home3', true);

    $headLine = get_post_meta( $post->ID, '_head_line', true );
    $trioLink = get_post_meta( $post->ID, '_trio_link', true );
    $trioImg = get_post_meta( $post->ID, '_trioImg', true );

    $headLine1 = get_post_meta( $post->ID, '_head_line1', true );
    $trioLink1 = get_post_meta( $post->ID, '_trio_link1', true );
    $trioImg1 = get_post_meta( $post->ID, '_trioImg1', true );

    $headLine2 = get_post_meta( $post->ID, '_head_line2', true );
    $trioLink2 = get_post_meta( $post->ID, '_trio_link2', true );
    $trioImg2 = get_post_meta( $post->ID, '_trioImg2', true );
    ?>
    <?php if ($showInHome3 != "no") {?>
    <section class="mob-fluid">
        <div class="container">
            <div class="center-heading">
                <h2>Collections</h2>
            </div>
            <div class="card-row">
                <div class="card-col wow zoomIn">
                    <img src="<?php echo $trioImg;?>" alt="">
                    <div class="card-col-content">
                        <a href="<?php echo $trioLink;?>" class="button button-secondary"><?php echo $headLine;?></a>
                    </div>
                </div>
                <div class="card-col wow zoomIn">
                    <img src="<?php echo $trioImg1;?>" alt="">
                    <div class="card-col-content">
                        <a href="<?php echo $trioLink1;?>" class="button button-secondary"><?php echo $headLine1;?></a>
                    </div>
                </div>
                <div class="card-col wow zoomIn">
                    <img src="<?php echo $trioImg2;?>" alt="">
                    <div class="card-col-content">
                        <a href="<?php echo $trioLink2;?>" class="button button-secondary"><?php echo $headLine2;?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
    <!-- New arrival section ends here -->
    <?php
    $showInHome1 = get_post_meta($post->ID, 'show_in_home1', true);
    $singleLink = get_post_meta( $post->ID, '_single_link', true );
    $singleBtn = get_post_meta( $post->ID, '_single_btn', true );
    $singleImg = get_post_meta( $post->ID, '_singleImg', true );
    $singleheadLine = get_post_meta( $post->ID, 'singleheadLine', true );
    $singleDescription = get_post_meta( $post->ID, 'singleDescription', true );
    $showInHome2 = get_post_meta($post->ID, 'show_in_home2', true);
    $doubleheadLine = get_post_meta( $post->ID, 'double_head_line', true );
    $doubleLink = get_post_meta( $post->ID, '_double_link', true );
    $doublebtn = get_post_meta( $post->ID, '_double_btn', true );
    $doubleImg = get_post_meta( $post->ID, '_doubleImg', true );
    $doubleDescription = get_post_meta( $post->ID, 'double_description', true );
    $doublebtn1 = get_post_meta( $post->ID, '_double_btn1', true );
    $doubleheadLine1 = get_post_meta( $post->ID, 'double_head_line1', true );
    $doubleLink1 = get_post_meta( $post->ID, '_double_link1', true );
    $doubleImg1 = get_post_meta( $post->ID, '_doubleImg1', true );
    $doubleDescription1 = get_post_meta( $post->ID, 'double_description1', true );



    ?>
    <!-- tile section starts here -->
    <section class="tile mob-fluid">
        <div class="container">
            <div class="center-heading">
                <h2>Moments</h2>
            </div>
            <div class="tile-row">
            <?php if ($showInHome1 != "no") {?>

                <div class="tile-col one-col card-opacity wow fadeIn" data-wow-delay="0.1s">
                    <img src="<?php echo $singleImg;?>" alt="largebanner" />
                    <div class="tile-col-content">
                        <div class="wow fadeInUp" data-wow-delay="0.3s">
							<a href="<?php echo $singleLink;?>" class="no-effect"><h2><?php echo $singleheadLine;?></h2></a>
                            <p> <?php echo $singleDescription;?></p>
                            <a href="<?php echo $singleLink;?>" class="button button-tertiary button-small"><?php echo $singleBtn;?></a>
                        </div>
                    </div>
                </div>
            <?php  } ?>
            <?php if ($showInHome2 != "no") {?>
                <div class="tile-col two-col">
                    <div class="tile-img card-opacity wow fadeIn" data-wow-delay="0.1s">
                        <img src="<?php echo $doubleImg;?>" alt="">
                        <div class="tile-col-content">
                            <div class="wow fadeInUp" data-wow-delay="0.3s">
								<a href="<?php echo $doubleLink;?>" class="no-effect"><h2><?php echo $doubleheadLine;?></h2></a>
                                <p><?php echo $doubleDescription;?></p>
                                <a href="<?php echo $doubleLink;?>" class="button button-tertiary button-small"><?php echo $doublebtn;?></a>
                            </div>
                        </div>
                    </div>
                    <div class="tile-img card-opacity wow fadeIn" data-wow-delay="0.1s">
                        <img src="<?php echo $doubleImg1;?>" alt="">
                        <div class="tile-col-content">
                            <div class="wow fadeInUp" data-wow-delay="0.3s">
								<a href="<?php echo $doubleLink1;?>" class="no-effect"><h2><?php echo $doubleheadLine1;?></h2></a>
                                <p><?php echo $doubleDescription1;?></p>
                                <a href="<?php echo $doubleLink1;?>" class="button button-tertiary button-small"><?php echo $doublebtn1;?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php  } ?>
            </div>
        </div>
    </section>
    <!-- tile section ends here -->
<?php get_footer();?>
