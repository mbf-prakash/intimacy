<?php
/*********
* Template Name: Shop
**********/
get_header();
?>
<!-- banner card start -->
<div class="container section-start nomobile">
				<div class="row">
					<div class="col-12">
						<div class="breadcrumbs clearfix">
							<ul>
								<li><a href="<?php echo get_site_url().'/'; ?>" title="Home">Home</a></li>
								<li><a href="#">Shop all</a></li>
							</ul>
					</div>
					</div>
				</div>
			</div>
 <div class="container">
		 <div class="row shop-all">
				 <div class="col-7">
						 <div class="no-desc back-catagory"><a href="<?php echo get_site_url().'/'; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i>Home</a></div>
					 	
						 <h1>Shop All</h1>
						 <p>Explore our complete range of plastic-free, biodegradable, and low-waste products.</p>
				 </div>
				 <div class="col-5">
						 <div class="filter-wrapper drop-js">
								 <label data-error="Please select an  Country" class="floating-item">Sort by:</label>
								 <div class="drop-links form-wrap1 prod-sort">
										 <div class="desktop-drop"><h2>By type</h2></div>
										 <ul class='sort_menu'>
												 <li class="head">By type</li>
												 <li class="drop-item"><span data-value="shop">Shop All</span></li>
												 <li class="drop-item"><span data-value="new">Newest</span></li>
												 <li class="drop-item"><span data-value="price_low">Price (low to high)</span></li>
												 <li class="drop-item"><span data-value="price_high">Price (high to low)</span></li>
												 <li class="drop-item"><span data-value="name_asc">Name A-Z</span></li>
												 <li class="drop-item"><span data-value="name_desc">Name Z-A</span></li>
												 <span class="line"></span>
										 </ul>
								 </div>
						 </div>
				 </div>
		 </div>

		 <div class="banner-card">
				 <div class="allarea">
						 <div class="row">
								 <?php
$args = array(
   'post_type'     => 'product_variation',
   'post_status'   => array( 'private', 'publish' ),
   'numberposts'   => -1,
   'orderby'       => 'menu_order',
   'order'         => 'asc'
);
$variations = get_posts( $args );
   foreach ($variations as $variation) {
  
//echo '<pre>';
//print_r($variation); 
   // $post_parent[]=$variation->post_parent;
     $variation_data=$variation->post_excerpt;
  //var_dump($variation_data);
     $attr_tax = str_replace(' -', ',', $variation_data);
     $attr_variation=explode(",",$variation_data); 
  
        
 $color_value[]=$attr_variation[0]; 
 
 $size_value[]=$attr_variation[1];
 $fit_value[]=$attr_variation[2]; 
   }
 
 $array_sizes=array_count_values($size_value);
 //print_r($array_sizes); 
//  foreach( $array_sizes as $key=>$valuesdata){
//     echo '<pre>';  print_r($valuesdata); 
//  }
 $colorDate = str_replace(':', ',', $size_value);
//    var_dump(count($size_value)); 
  // print_r($color_value); 
   $colorvalues=array_unique($color_value); 
  // print_r($colorvalues);
   $size_values=array_unique($size_value); 
   
   $fit_value=array_unique($fit_value); 
 
   
   $colorDate = str_replace(':', ',', $colorvalues);
   $sizeDates= str_replace(':', ',', $size_values);
 //var_dump($sizeDates); 
   $fitDate = str_replace(':', ',', $fit_value);
//    print_r($fitDate);
  ?>

                <div class="container banner-card">
                    <div class="allarea">
                        <div class="row">
                            <div class="col-3">
                                <div class="drop-links form-wrap prod-filter">
                                    <div class="mobile-drop"><h2>Filter by type</h2></div>
                                    <div class="head"><h3>Filter by</h3></div>
                                    <div class="accordion-row-blk">
                                        <h4>Size</h4>
                                        <div class="accordion-content active">
                                            <?php 
                                            
                                            foreach($sizeDates as $sizeDatesvalue){ 
                                                
                                                  $size=explode(",",$sizeDatesvalue); 
                                                     //print_r($size); 
                                                  //$size_datevalue=$size[1]; 
                                                  $size_datevalues[]=$size[1]; 
                                            }
                                                 sort($size_datevalues);
                                               
                                                // print_r($size_datevalues); 
                                                 foreach($size_datevalues as $size_datevalue)
                                                 {
                                                ?>
                                               <div class="checkboxradio-row" id="checkout">
                                         <?php 
                                           $sizedatevalue=trim($size_datevalue);?>
                                                <input class="checkboxradio-item checkboxradio-invisible input-email-active" id="<?php echo $sizedatevalue; ?>" value="<?php echo $sizedatevalue; ?>" name="newsletters" type="checkbox">
                                                <label class="checkboxradio-label checkbox-label" for="<?php echo $sizedatevalue; ?>"><?php echo $sizedatevalue; ?></label>
                                            </div> 
                                            <?php }?>
                                          
                                        </div>
                                        <h4>Color</h4>
                                        <div class="accordion-content">
                                        <?php 
                                       //print_r($colorDate); 
                                       
                                         foreach($colorDate as $colorDates){
                                             
                                             $color=explode(",",$colorDates); 
                                           
                                                 $color_datevalues[]=$color[1]; 
                                                  }
                                                  sort($color_datevalues);
                                                  ?>
                                                       
                                     <?php foreach($color_datevalues as $color_datevalue){ 
                                         $color_datevalue=trim($color_datevalue);
                                         ?>  <a href="#" class="color-pad color-filter-value" id="<?php echo $color_datevalue;?>">
                                         <input type="hidden" class="colortext" name="color-data" value="<?php echo   $color_datevalue;?>">
                                       <div class="color-pad-bg"  style="background-color:<?php echo $color_datevalue;?> "></div>
                                       <span class="color-filter"><?php echo $color_datevalue;?></span>
                                   </a>
                                                <?php }?>
                                        </div>
                                        <h4>Fit</h4>
                                        <div class="accordion-content">
                                        <?php 
                                       //print_r($colorDate); 
                                         foreach($fitDate as $fitDates){
                                            
                                             $fit=explode(",",$fitDates); 
                                           
                                                 $fit_datevalues[]=$fit[1]; 
                                         }
                                         sort($fit_datevalues);    
                                         foreach($fit_datevalues as $fit_datevalue)  {        
                                       ?>  
                                       <div class="checkboxradio-row">
                                       <?php 
                                           $fitedatevalue=trim($fit_datevalue);?>
          <input class="checkboxradio-item checkboxradio-invisible input-email-active" id="<?php echo $fitedatevalue; ?>" value="<?php echo $fitedatevalue;?>" name="fitdatavalue" type="checkbox">
          <label class="checkboxradio-label checkbox-label" for="<?php echo $fitedatevalue; ?>"><?php echo $fitedatevalue; ?></label>
      </div> 
                                <?php }?>
                                        </div>
                                        <h4>Style</h4>
                                        <div class="accordion-content">
                                        <?php
                                            $terms = get_terms( 'product_tag' );
                                             foreach($terms as $tagvalue){
                                                 
                                                 $tagstylevalue=str_replace(" ","", $tagvalue->name);
                                                // var_dump($tagstylevalue); 
                                            
                                            ?>
                                            <div class="checkboxradio-row">
                                                <input class="checkboxradio-item checkboxradio-invisible input-email-active" value="<?php echo $tagstylevalue;?>" id="<?php echo $tagvalue->name;?>" name="tagvaluedata" type="checkbox">
                                                <label class="checkboxradio-label checkbox-label" for="<?php echo $tagvalue->name;?>"><?php echo $tagvalue->name;?></label>
                                            </div> 
                                             <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
								 <div class="col-9 product-listing">
										 <div id="Allcategories" class="noshow">
												 <div class="row">
													 <?php
													 $product_cat_args = array(
														 'post_type' => 'product',
														 'orderby'    => 'menu_order',
														 'order' => 'ASC',
														 'numberposts'=>-1

														);
													 $products = get_posts($product_cat_args);

							             foreach ($products as $key => $product) {
							             	foreach($sizeDates as $sizeDatesvalues){ 
                                                
                                    $sizes=explode(",",$sizeDatesvalues); 
                                       //print_r($size); 
                                    //$size_datevalue=$size[1]; 
                                    $size_datevaluess[]=$sizes[1]; 
                              }
                                   sort($size_datevaluess);


 $products = new WC_Product_Variable( $product->ID );
                                   $var_attributes = $products->get_variation_attributes();
                                   sort($var_attributes['Size']);
                                //   sort($var_attribute('fit'));
                                   
                                   $var_arr_imp =  array();
                                   foreach($var_attributes as $var_key => $var_attribute){
                                       $var_arr_imp[$var_key]= implode(' ',$var_attribute);
                                       $var_arr_imp[$var_key]=strtolower($var_arr_imp[$var_key]);
                                   }
                                   $var_attributesfit = $products->get_variation_attributes();
                                 
                                    
                                   $var_arr_imp_fit =  array();
                                   foreach($var_attributesfit as $var_key => $var_attributefit){
                                   
                                       $var_arr_imp_fit[$var_key]= implode(' ',$var_attributefit);
                                    
                                   }
                                  
                                   $var_attributescolordata = $products->get_variation_attributes();
                                     
                                 
                                 sort($var_attributescolordata['color']);
                            //   print_r($var_attributescolordata['color']); 
                                   $var_arr_imp_colordata =  array();
                                   foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
                                    $var_arr_imp_colordata[$varcolorkey]= implode(' ',$vardatavalue);
                                   }
                          
                                   $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                                                    // if(count($term_product)<1){
                                                    // continue;
                                                    // }
                                                    $terms_arr=str_replace(" ","", $term_product);
                                                   
                                                    $term_str=  implode(" ",$terms_arr);

                                   
														 $feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
													 ?>
														 <div class="col-4 imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  total-fiter="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['color'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>" >
																	<a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect zoom-in">
																		 <div class="banner-card-image">
																				 <img src="<?php echo $feat_image;?>" alt="productimg" />
																		 </div>
																		 <div class="banner-card-content">
																				 <h2><?php echo $product->post_title; ?></h2>
																				 <?php
	 					                                    $var = new WC_Product_Variable( $product->ID );
	 					                                    $variations = $var->get_available_variations();
	 					                                        $variation_product_id = $variations [0]['variation_id'];
	 					                                    if(count($variations) != 0){
	 					                                        $variation_product = new WC_Product_Variation( $variation_product_id );
	 					                                        $var_reg_prc = $variation_product->regular_price;
	 					                                        $var_sal_prc = $variation_product->sale_price;

	 					                                    ?>
	 					                                    <h4>From<?php if($var_sal_prc!=''){ ?>₹<span><?php echo $var_sal_prc; ?><?php }else{ ?> ₹<?php echo $var_reg_prc; } ?></span></h4>
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

										 <div class="row imgshow" style="display:none;">
												  		 <?php
													 $product_cat_args = array(
														 'post_type' => 'product',
														 'orderby'    => 'menu_order',
														 'order' => 'ASC',
														 'numberposts'=>-1

														);
													 $products = get_posts($product_cat_args);
							             foreach ($products as $key => $product) {
							             	foreach($sizeDates as $sizeDatesvalues){ 
                                                
                                    $sizes=explode(",",$sizeDatesvalues); 
                                       //print_r($size); 
                                    //$size_datevalue=$size[1]; 
                                    $size_datevaluess[]=$sizes[1]; 
                              }
                                   sort($size_datevaluess);


 $products = new WC_Product_Variable( $product->ID );
                                   $var_attributes = $products->get_variation_attributes();
                                   sort($var_attributes['Size']);
                                //   sort($var_attribute('fit'));
                                   
                                   $var_arr_imp =  array();
                                   foreach($var_attributes as $var_key => $var_attribute){
                                       $var_arr_imp[$var_key]= implode(' ',$var_attribute);
                                       $var_arr_imp[$var_key]=strtolower($var_arr_imp[$var_key]);
                                   }
                                   $var_attributesfit = $products->get_variation_attributes();
                                 
                                    
                                   $var_arr_imp_fit =  array();
                                   foreach($var_attributesfit as $var_key => $var_attributefit){
                                   
                                       $var_arr_imp_fit[$var_key]= implode(' ',$var_attributefit);
                                    
                                   }
                                  
                                   $var_attributescolordata = $products->get_variation_attributes();
                                     
                                 
                                 sort($var_attributescolordata['color']);
                            //   print_r($var_attributescolordata['color']); 
                                   $var_arr_imp_colordata =  array();
                                   foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
                                    $var_arr_imp_colordata[$varcolorkey]= implode(' ',$vardatavalue);
                                   }
                          
                                   $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                                                    // if(count($term_product)<1){
                                                    // continue;
                                                    // }
                                                    $terms_arr=str_replace(" ","", $term_product);
                                                   
                                                    $term_str=  implode(" ",$terms_arr);
														 $feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
													 ?>
														 <div class="col-4 ">
																	<a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect zoom-in">
																		 <div class="banner-card-image">
																				 <img src="<?php echo $feat_image;?>" alt="productimg" />
																		 </div>
																		 <div class="banner-card-content">
																				 <h2><?php echo $product->post_title; ?></h2>
																				 <?php
	 					                                    $var = new WC_Product_Variable( $product->ID );
	 					                                    $variations = $var->get_available_variations();
	 					                                        $variation_product_id = $variations [0]['variation_id'];
	 					                                    if(count($variations) != 0){
	 					                                        $variation_product = new WC_Product_Variation( $variation_product_id );
	 					                                        $var_reg_prc = $variation_product->regular_price;
	 					                                        $var_sal_prc = $variation_product->sale_price;

	 					                                    ?>
	 					                                    <h4>From<?php if($var_sal_prc!=''){ ?>₹<span><?php echo $var_sal_prc; ?><?php }else{ ?> ₹<?php echo $var_reg_prc; } ?></span></h4>
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
						 </div>
				 </div>
		 </div>
		 <div class="scroll-top"><a href="#" class="scroll-btn no-effect"><i class="fa fa-chevron-up" aria-hidden="true"></i></a></div>
 </div>
</div>
</div>
</div>

<?php get_footer(); ?>
