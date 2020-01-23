<?php 
 /*******
Template Name: Moments
*******/
get_header();

 if ( $moment = get_page_by_path( 'homepage', OBJECT, 'page' ) ){
    $showInHome1 = get_post_meta($moment->ID, 'show_in_home1', true);
    $singleLink = get_post_meta( $moment->ID, '_single_link', true );
    $singleBtn = get_post_meta( $moment->ID, '_single_btn', true );
    $singleImg = get_post_meta( $moment->ID, '_singleImg', true );
    $singleheadLine = get_post_meta( $moment->ID, 'singleheadLine', true );
    $singleDescription = get_post_meta( $moment->ID, 'singleDescription', true );
    $showInHome2 = get_post_meta($moment->ID, 'show_in_home2', true);
    $doubleheadLine = get_post_meta( $moment->ID, 'double_head_line', true );
    $doubleLink = get_post_meta( $moment->ID, '_double_link', true );
    $doublebtn = get_post_meta( $moment->ID, '_double_btn', true );
    $doubleImg = get_post_meta( $moment->ID, '_doubleImg', true );
    $doubleDescription = get_post_meta( $moment->ID, 'double_description', true );
    $doublebtn1 = get_post_meta( $moment->ID, '_double_btn1', true );
    $doubleheadLine1 = get_post_meta( $moment->ID, 'double_head_line1', true );
    $doubleLink1 = get_post_meta( $moment->ID, '_double_link1', true );
    $doubleImg1 = get_post_meta( $moment->ID, '_doubleImg1', true );
    $doubleDescription1 = get_post_meta( $moment->ID, 'double_description1', true );
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
                            <h2><?php echo $singleheadLine;?></h2>
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
                                <h2><?php echo $doubleheadLine;?></h2>
                                <p><?php echo $doubleDescription;?></p>
                                <a href="<?php echo $doubleLink;?>" class="button button-tertiary button-small"><?php echo $doublebtn;?></a>
                            </div>
                        </div>
                    </div>
                    <div class="tile-img card-opacity wow fadeIn" data-wow-delay="0.1s">
                        <img src="<?php echo $doubleImg1;?>" alt="">
                        <div class="tile-col-content">
                            <div class="wow fadeInUp" data-wow-delay="0.3s">
                                <h2><?php echo $doubleheadLine1;?></h2>
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
<?php }
get_footer();?>
