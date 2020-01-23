<?php

$load_url = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
include $load_url[0] . 'wp-load.php';
$sort_ord = $_POST['sort_ord'];
$sort_value=$_POST['sort'];

//print_r($sort_value); 

$temp = preg_replace("/[^a-zA-Z 0-9]+/", " ", $sort_value );
$sort_array=explode(" ",$temp);
$product_id=array_filter($sort_array);


switch ($sort_ord) {
   


case 'new':

?>
<?php 
if(empty($product_id)){
  
?>
<div class="row text ">
<?php
$product_args = array(
'post_type' => 'product',
         'post_status' => 'publish',
      'numberposts'=>-1
       );
       $products_date = get_posts($product_args);
       //two variables using multisort id and date
       $prdc_date = array();
       $prdc_id_details = array();
       foreach ($products_date as $productdate) {
$prdc_date[$productdate->post_date] = $productdate->post_date;

$prdc_id_details[$productdate->ID] = $productdate->ID;  
}

array_multisort($prdc_date, SORT_DESC, $products_date, SORT_DESC, $prdc_id_details);


foreach ($products_date as $key => $product) {
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
    $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
    

   }
  
   $var_attributescolordata = $products->get_variation_attributes();

     
 
 sort($var_attributescolordata['color']);
//   print_r($var_attributescolordata['color']); 

   $var_arr_imp_colordata =  array();

   foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
    $color_values= str_replace(" ","",$vardatavalue);  
    $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
 $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
   }

   $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));



   
                    // if(count($term_product)<1){
                    // continue;
                    // }

                    $terms_arr=str_replace(" ","", $term_product);

                   
                    $term_strs=  implode(" ",$terms_arr);
                    $term_str=strtolower($term_strs);
                   // var_dump($term_str); 
//  echo '<pre>';   print_r($product->post_title);
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
//$product_name = get_post_meta($product->ID, 'post_title', true);

$_reg_price = get_post_meta($product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);?>
 <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	

            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
            <div class="banner-card-content">
                <h5><?php echo $product->post_title;?></h5>
                <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
        </a>
    </div>
<?php }?>
</div>

<?php
}
else{ 
    
   
    ?>
    <div class="row sortnew ">
                                    <?php
                                  $product_args = array(
                                    'post_type' => 'product',
                                             'post_status' => 'publish',
                                          'numberposts'=>-1
                                           );
                                           $products_date = get_posts($product_args);
                                           //two variables using multisort id and date
                                           $prdc_date = array();
                                           $prdc_id_details = array();
                                           foreach ($products_date as $productdate) {
                                   $prdc_date[$productdate->post_date] = $productdate->post_date;
                                   
                                   $prdc_id_details[$productdate->ID] = $productdate->ID;   
                                   }
                                   
                                   array_multisort($prdc_date, SORT_DESC, $products_date, SORT_DESC, $prdc_id_details);
                                   
                                 
                                   foreach ($products_date as $key => $product) {
                                    if(!in_array($product->ID,$product_id)){
                                        continue;
                                   }
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
                                        $color_values= str_replace(" ","",$vardatavalue);  
                                    $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
                                    $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
                                       }
                              
                                       $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));

                                  

                                       
                                                        // if(count($term_product)<1){
                                                        // continue;
                                                        // }
    
                                                        $terms_arr=str_replace(" ","", $term_product);
    
                                                       
                                                        $term_strs=  implode(" ",$terms_arr);
                                                        $term_str=strtolower($term_strs);
                                                       // var_dump($term_str); 
                                  //  echo '<pre>';   print_r($product->post_title);
                                    $feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
                                    $secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
                                    //$product_name = get_post_meta($product->ID, 'post_title', true);
                                   
                                    $_reg_price = get_post_meta($product->ID, '_regular_price', true);
                                    $sal_prc = get_post_meta( $product->ID, '_sale_price', true);?>
                                      <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
                                
            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
                                                <div class="banner-card-content">
                                                    <h5><?php echo $product->post_title;?></h5>
                                                    <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
                                            </a>
                                        </div>
                                   <?php }?>
                                    </div>
<?php } ?>
                                    <div class="row sortdata"  style='display:none;'>
                                    <?php
                                    $product_args = array(
                                        'post_type' => 'product',
                                                 'post_status' => 'publish',
                                              'numberposts'=>-1
                                               );
                                               $products_date = get_posts($product_args);
                                               //two variables using multisort id and date
                                               $prdc_date = array();
                                               $prdc_id_details = array();
                                               foreach ($products_date as $productdate) {
                                       $prdc_date[$productdate->post_date] = $productdate->post_date;
                                       
                                       $prdc_id_details[$productdate->ID] = $productdate->ID;   
                                       }
                                       
                                       array_multisort($prdc_date, SORT_DESC, $products_date, SORT_DESC, $prdc_id_details);
                                       
                                     
                                      
                              
                                 foreach($sizeDates as $sizeDatesvalues){ 
                                                
                                    $sizes=explode(",",$sizeDatesvalues); 
                                       //print_r($size); 
                                    //$size_datevalue=$size[1]; 
                                    $size_datevaluess[]=$sizes[1]; 
                              }
                                   sort($size_datevaluess);

                           // print_r($size_datevaluess);
                            
                                 
                                  //print_r($datavalue);
                                  foreach ($products_date as $key => $product) {
                                   // $available_variations = $product->get_available_variations($product->ID);
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
                                    $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
                                    

                                   }
                                  
                                   $var_attributescolordata = $products->get_variation_attributes();

                                     
                                 
                                 sort($var_attributescolordata['color']);
                            //   print_r($var_attributescolordata['color']); 

                                   $var_arr_imp_colordata =  array();

                                   foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
                                    $color_values= str_replace(" ","",$vardatavalue);  
                                    $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
                                   $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
                                   }
                          
                                   $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                                                    // if(count($term_product)<1){
                                                    // continue;
                                                    // }

                                                    $terms_arr=str_replace(" ","", $term_product);

                                                   
                                                    $term_strs=  implode(" ",$terms_arr);
                                                    $term_str=strtolower($term_strs);
                                   
                                    $feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
                                    $secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
                                    $_reg_price = get_post_meta($product->ID, '_regular_price', true);
                                    $sal_prc = get_post_meta( $product->ID, '_sale_price', true);
                            
                                    ?>


                                         <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
                                                <div class="banner-card-content">
                                                    <h5><?php echo $product->post_title;?></h5>
                                                    <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
                                            </a>
                                        </div>
                                   <?php }?>
                                  
                                    </div>
                                    
                                </div>

  

<?php
break;
case 'price_low':

?>
<?php 
if(empty($product_id)){
 
?>
<div class="row text ">
<?php
 $product_args = array(
    'post_type' => 'product',
             'post_status' => 'publish',
          'numberposts'=>-1
            );
            $products_vals = get_posts($product_args);
            //SORTING
    $prc_prd_val = array();
    foreach ($products_vals as $productval) {
    $products = new WC_Product_Variable( $productval->ID );
    $variations = $products->get_available_variations();
    
    
    if(count($variations) != 0){
    $variation_min_price = $products->get_variation_price('min');
    $variation_max_price = $products->get_variation_price('max');
    $price_show = $variation_min_price == ''?$variation_max_price:$variation_min_price;
    }else{
    $reg_prc = get_post_meta( $productval->ID, '_regular_price', true);
    $sal_prc = get_post_meta( $productval->ID, '_sale_price', true);
    $price_show = $sal_prc == ''?$reg_prc:$sal_prc;
    }
    $prc_prd_val[$productval->ID] = $price_show;    
    }   
    array_multisort($prc_prd_val, SORT_ASC, $products_vals);




foreach ($products_vals as $key => $product) {
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
        $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
        

       }
      
       $var_attributescolordata = $products->get_variation_attributes();

         
     
     sort($var_attributescolordata['color']);
//   print_r($var_attributescolordata['color']); 

       $var_arr_imp_colordata =  array();

       foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
        $color_values= str_replace(" ","",$vardatavalue);  
        $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
        $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
       }

       $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                        // if(count($term_product)<1){
                        // continue;
                        // }

                        $terms_arr=str_replace(" ","", $term_product);

                       
                        $term_strs=  implode(" ",$terms_arr);
                        $term_str=strtolower($term_strs);
                       // var_dump($term_str); 
// / echo '<pre>';   print_r($product->post_title);
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
//$product_name = get_post_meta($product->ID, 'post_title', true);

$_reg_price = get_post_meta($product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);?>
   <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
                                
            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
            <div class="banner-card-content">
                <h5><?php echo $product->post_title;?></h5>
                <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
        </a>
    </div>
<?php }?>
</div>
<?php }else{
echo 'dd22222';
?>
  <div class="row sortnew">
<?php
 $product_args = array(
    'post_type' => 'product',
             'post_status' => 'publish',
          'numberposts'=>-1
            );
            $products_vals = get_posts($product_args);
            //SORTING
    $prc_prd_val = array();
    foreach ($products_vals as $productval) {
    $products = new WC_Product_Variable( $productval->ID );
    $variations = $products->get_available_variations();
    
    
    if(count($variations) != 0){
    $variation_min_price = $products->get_variation_price('min');
    $variation_max_price = $products->get_variation_price('max');
    $price_show = $variation_min_price == ''?$variation_max_price:$variation_min_price;
    }else{
    $reg_prc = get_post_meta( $productval->ID, '_regular_price', true);
    $sal_prc = get_post_meta( $productval->ID, '_sale_price', true);
    $price_show = $sal_prc == ''?$reg_prc:$sal_prc;
    }
    $prc_prd_val[$productval->ID] = $price_show;    
    }   
    array_multisort($prc_prd_val, SORT_ASC, $products_vals);




foreach ($products_vals as $key => $product) {
    if(!in_array($product->ID,$product_id)){
        continue;
   }
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
        $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
        

       }
      
       $var_attributescolordata = $products->get_variation_attributes();

         
     
     sort($var_attributescolordata['color']);
//   print_r($var_attributescolordata['color']); 

       $var_arr_imp_colordata =  array();

       foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
        $color_values= str_replace(" ","",$vardatavalue);  
        $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
        $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
       }

       $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                        // if(count($term_product)<1){
                        // continue;
                        // }

                        $terms_arr=str_replace(" ","", $term_product);

                       
                        $term_strs=  implode(" ",$terms_arr);
 $term_str=strtolower($term_strs);
                       // var_dump($term_str); 
// / echo '<pre>';   print_r($product->post_title);
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
//$product_name = get_post_meta($product->ID, 'post_title', true);

$_reg_price = get_post_meta($product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);?>
  <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
        <a href="#">
            <div class="banner-card-image">
                <img src="<?php echo  $feat_image;?>" alt="productimg" />
            </div>
            <div class="banner-card-content">
                <h5><?php echo $product->post_title;?></h5>
                <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
        </a>
    </div>
<?php }?>
</div>
<?php }?>
<div class="row sortdata"  style='display:none;'>
                                    <?php
                                   $product_args = array(
                                    'post_type' => 'product',
                                             'post_status' => 'publish',
                                          'numberposts'=>-1
                                            );
                                            $products_vals = get_posts($product_args);
                                            //SORTING
                                    $prc_prd_val = array();
                                    foreach ($products_vals as $productval) {
                                    $products = new WC_Product_Variable( $productval->ID );
                                    $variations = $products->get_available_variations();
                                    
                                    
                                    if(count($variations) != 0){
                                    $variation_min_price = $products->get_variation_price('min');
                                    $variation_max_price = $products->get_variation_price('max');
                                    $price_show = $variation_min_price == ''?$variation_max_price:$variation_min_price;
                                    }else{
                                    $reg_prc = get_post_meta( $productval->ID, '_regular_price', true);
                                    $sal_prc = get_post_meta( $productval->ID, '_sale_price', true);
                                    $price_show = $sal_prc == ''?$reg_prc:$sal_prc;
                                    }
                                    $prc_prd_val[$productval->ID] = $price_show;    
                                    }   
                                    array_multisort($prc_prd_val, SORT_ASC, $products_vals);
                                
                                
                                
                                
                                
                                       
                                     
                                      
                              
                                 foreach($sizeDates as $sizeDatesvalues){ 
                                                
                                    $sizes=explode(",",$sizeDatesvalues); 
                                       //print_r($size); 
                                    //$size_datevalue=$size[1]; 
                                    $size_datevaluess[]=$sizes[1]; 
                              }
                                   sort($size_datevaluess);

                           // print_r($size_datevaluess);
                            
                                 
                                  //print_r($datavalue);
                                  foreach ($products_vals as $key => $product) {
                                   // $available_variations = $product->get_available_variations($product->ID);
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
                                    $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
                                    

                                   }
                                  
                                   $var_attributescolordata = $products->get_variation_attributes();

                                     
                                 
                                 sort($var_attributescolordata['color']);
                            //   print_r($var_attributescolordata['color']); 

                                   $var_arr_imp_colordata =  array();

                                   foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
                                    $color_values= str_replace(" ","",$vardatavalue);  
                                    $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
                                    $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
                                   }
                          
                                   $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                                                    // if(count($term_product)<1){
                                                    // continue;
                                                    // }

                                                    $terms_arr=str_replace(" ","", $term_product);

                                                   
                                                    $term_strs=  implode(" ",$terms_arr);
                                                    $term_str=strtolower($term_strs);
                                                   // var_dump($term_str); 
                                                  
                                   
                                    $feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
                                    $secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
                                    $_reg_price = get_post_meta($product->ID, '_regular_price', true);
                                    $sal_prc = get_post_meta( $product->ID, '_sale_price', true);
                            
                                    ?>

 <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
                                
            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
                                                <div class="banner-card-content">
                                                    <h5><?php echo $product->post_title;?></h5>
                                                    <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
                                            </a>
                                        </div>
                                   <?php }?>
                                  
                                    </div>
                                    
                                </div>
<?php

break;
case 'price_high':
?>
<?php if(empty($product_id)){
    ?>

    <div class="row text ">
    <?php
$product_args = array(
'post_type' => 'product',
 'post_status' => 'publish',
'numberposts'=>-1
 );
            $products_vals = get_posts($product_args);
            //SORTING
    $prc_prd_val = array();
    foreach ($products_vals as $productval) {
    $products = new WC_Product_Variable( $productval->ID );
    $variations = $products->get_available_variations();
    
    
    if(count($variations) != 0){
    $variation_min_price = $products->get_variation_price('min');
    $variation_max_price = $products->get_variation_price('max');
    $price_show = $variation_max_price == ''?$variation_min_price:$variation_max_price;
    }else{
    $reg_prc = get_post_meta( $productval->ID, '_regular_price', true);
    $sal_prc = get_post_meta( $productval->ID, '_sale_price', true);
    $price_show = $sal_prc == ''?$reg_prc:$sal_prc;
    }
    $prc_prd_val[$productval->ID] = $price_show;    
    }   
    array_multisort($prc_prd_val, SORT_DESC, $products_vals);




foreach ($products_vals as $key => $product) {
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
        $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
        

       }
      
       $var_attributescolordata = $products->get_variation_attributes();

         
     
     sort($var_attributescolordata['color']);
//   print_r($var_attributescolordata['color']); 

       $var_arr_imp_colordata =  array();

       foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
        $color_values= str_replace(" ","",$vardatavalue);  
      $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
 $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
       }

       $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                        // if(count($term_product)<1){
                        // continue;
                        // }

                        $terms_arr=str_replace(" ","", $term_product);

                       
                        $term_strs=  implode(" ",$terms_arr);
                        $term_str=strtolower($term_strs);
                       // var_dump($term_str); 
// / echo '<pre>';   print_r($product->post_title);
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
//$product_name = get_post_meta($product->ID, 'post_title', true);

$_reg_price = get_post_meta($product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);?>
  <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
            <div class="banner-card-content">
                <h5><?php echo $product->post_title;?></h5>
                <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
        </a>
    </div>
<?php }?>
</div>
<?php
}else{


?>
  <div class="row sortnew">
<?php
$product_args = array(
'post_type' => 'product',
 'post_status' => 'publish',
'numberposts'=>-1
 );
            $products_vals = get_posts($product_args);
            //SORTING
    $prc_prd_val = array();
    foreach ($products_vals as $productval) {
    $products = new WC_Product_Variable( $productval->ID );
    $variations = $products->get_available_variations();
    
    
    if(count($variations) != 0){
    $variation_min_price = $products->get_variation_price('min');
    $variation_max_price = $products->get_variation_price('max');
    $price_show = $variation_max_price == ''?$variation_min_price:$variation_max_price;
    }else{
    $reg_prc = get_post_meta( $productval->ID, '_regular_price', true);
    $sal_prc = get_post_meta( $productval->ID, '_sale_price', true);
    $price_show = $sal_prc == ''?$reg_prc:$sal_prc;
    }
    $prc_prd_val[$productval->ID] = $price_show;    
    }   
    array_multisort($prc_prd_val, SORT_DESC, $products_vals);




foreach ($products_vals as $key => $product) {
    if(!in_array($product->ID,$product_id)){
        continue;
   }
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
        $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
        

       }
      
       $var_attributescolordata = $products->get_variation_attributes();

         
     
     sort($var_attributescolordata['color']);
//   print_r($var_attributescolordata['color']); 

       $var_arr_imp_colordata =  array();

       foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
        $color_values= str_replace(" ","",$vardatavalue);  
          $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
        $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
       }

       $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                        // if(count($term_product)<1){
                        // continue;
                        // }

                        $terms_arr=str_replace(" ","", $term_product);

                       
                        $term_strs=  implode(" ",$terms_arr);
                        $term_str=strtolower($term_strs);
                       // var_dump($term_str); 
// / echo '<pre>';   print_r($product->post_title);
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
//$product_name = get_post_meta($product->ID, 'post_title', true);

$_reg_price = get_post_meta($product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);?>
 <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
                                
            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
            <div class="banner-card-content">
                <h5><?php echo $product->post_title;?></h5>
                <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
        </a>
    </div>
<?php }?>
</div>
<?php }?>
<div class="row sortdata"  style='display:none;'>
                                    <?php
                                   $product_args = array(
                                    'post_type' => 'product',
                                     'post_status' => 'publish',
                                    'numberposts'=>-1
                                     );
                                                $products_vals = get_posts($product_args);
                                                //SORTING
                                        $prc_prd_val = array();
                                        foreach ($products_vals as $productval) {
                                        $products = new WC_Product_Variable( $productval->ID );
                                        $variations = $products->get_available_variations();
                                        
                                        
                                        if(count($variations) != 0){
                                        $variation_min_price = $products->get_variation_price('min');
                                        $variation_max_price = $products->get_variation_price('max');
                                        $price_show = $variation_max_price == ''?$variation_min_price:$variation_max_price;
                                        }else{
                                        $reg_prc = get_post_meta( $productval->ID, '_regular_price', true);
                                        $sal_prc = get_post_meta( $productval->ID, '_sale_price', true);
                                        $price_show = $sal_prc == ''?$reg_prc:$sal_prc;
                                        }
                                        $prc_prd_val[$productval->ID] = $price_show;    
                                        }   
                                        array_multisort($prc_prd_val, SORT_DESC, $products_vals);
                                    
                                    
                                    
                                    
                                   
                                
                                
                                
                                       
                                     
                                      
                              
                                 foreach($sizeDates as $sizeDatesvalues){ 
                                                
                                    $sizes=explode(",",$sizeDatesvalues); 
                                       //print_r($size); 
                                    //$size_datevalue=$size[1]; 
                                    $size_datevaluess[]=$sizes[1]; 
                              }
                                   sort($size_datevaluess);

                           // print_r($size_datevaluess);
                            
                                 
                                  //print_r($datavalue);
                                  foreach ($products_vals as $key => $product) {
                                   // $available_variations = $product->get_available_variations($product->ID);
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
                                    $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
                                    

                                   }
                                  
                                   $var_attributescolordata = $products->get_variation_attributes();

                                     
                                 
                                 sort($var_attributescolordata['color']);
                            //   print_r($var_attributescolordata['color']); 

                                   $var_arr_imp_colordata =  array();

                                   foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
                                    $color_values= str_replace(" ","",$vardatavalue);  
                                    $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
                                    $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
                                   }
                          
                                   $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                                                    // if(count($term_product)<1){
                                                    // continue;
                                                    // }

                                                    $terms_arr=str_replace(" ","", $term_product);

                                                    $term_strs=  implode(" ",$terms_arr);
                                                    $term_str=strtolower($term_strs);
                                                   // var_dump($term_str); 
                                                  
                                   
                                    $feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
                                    $secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
                                    $_reg_price = get_post_meta($product->ID, '_regular_price', true);
                                    $sal_prc = get_post_meta( $product->ID, '_sale_price', true);
                            
                                    ?>
 <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
                                
            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
                                                <div class="banner-card-content">
                                                    <h5><?php echo $product->post_title;?></h5>
                                                    <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
                                            </a>
                                        </div>
                                   <?php }?>
                                  
                                    </div>
                                    
                                </div>

   
<?php
break;
case 'name_asc':
?>

<?php 
if(empty($product_id)){
  
    ?>
<div class="row text">
<?php
$product_args = array(
'post_type' => 'product',
         'post_status' => 'publish',
      'numberposts'=>-1
        );
        $products = get_posts($product_args);
        //two variables using multisort id and alphabets order name
        $prdc_date = array();
        $prdc_id_details = array();
        foreach ($products as $productdate) {
$prdc_date[$productdate->post_date] = $productdate->post_title;

$prdc_id_details[$productdate->ID] = $productdate->ID;  
}

array_multisort($prdc_date, SORT_ASC, $products, SORT_ASC, $prdc_id_details);




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
        $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
        

       }
      
       $var_attributescolordata = $products->get_variation_attributes();

         
     
     sort($var_attributescolordata['color']);
//   print_r($var_attributescolordata['color']); 

       $var_arr_imp_colordata =  array();

       foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
        $color_values= str_replace(" ","",$vardatavalue);  
        $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
        $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
       
       }

       $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                        // if(count($term_product)<1){
                        // continue;
                        // }

                        $terms_arr=str_replace(" ","", $term_product);

                       
                        $term_strs=  implode(" ",$terms_arr);
                        $term_str=strtolower($term_strs);
                       // var_dump($term_str); 
// / echo '<pre>';   print_r($product->post_title);
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
//$product_name = get_post_meta($product->ID, 'post_title', true);

$_reg_price = get_post_meta($product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);?>
 <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
                                
            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
            <div class="banner-card-content">
                <h5><?php echo $product->post_title;?></h5>
                <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
        </a>
    </div>
<?php }?>
</div>
<?php }
else{
?>

<div class="row sortnew item">
<?php
$product_args = array(
'post_type' => 'product',
         'post_status' => 'publish',
      'numberposts'=>-1
        );
        $products = get_posts($product_args);
        //two variables using multisort id and alphabets order name
        $prdc_date = array();
        $prdc_id_details = array();
        foreach ($products as $productdate) {
$prdc_date[$productdate->post_date] = $productdate->post_title;

$prdc_id_details[$productdate->ID] = $productdate->ID;  
}

array_multisort($prdc_date, SORT_ASC, $products, SORT_ASC, $prdc_id_details);



foreach ($products as $key => $product) {
    if(!in_array($product->ID,$product_id)){
        continue;
   }
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
 $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
        

       }
      
       $var_attributescolordata = $products->get_variation_attributes();

         
     
     sort($var_attributescolordata['color']);
//   print_r($var_attributescolordata['color']); 

       $var_arr_imp_colordata =  array();

       foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
        $color_values= str_replace(" ","",$vardatavalue);  
        $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
      $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);

       }

       $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                        // if(count($term_product)<1){
                        // continue;
                        // }

                        $terms_arr=str_replace(" ","", $term_product);

                       
                        $term_strs=  implode(" ",$terms_arr);
                        $term_str=strtolower($term_strs);
                       // var_dump($term_str); 
// / echo '<pre>';   print_r($product->post_title);
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
//$product_name = get_post_meta($product->ID, 'post_title', true);
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
$_reg_price = get_post_meta($product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);?>
   <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
            <div class="banner-card-content">
                <h5><?php echo $product->post_title;?></h5>
                <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
        </a>
    </div>
<?php }?>
</div>
<?php }?>
<div class="row sortdata"  style='display:none;'>
                                    <?php
                                   $product_args = array(
                                    'post_type' => 'product',
                                             'post_status' => 'publish',
                                          'numberposts'=>-1
                                            );
                                            $products = get_posts($product_args);
                                            //two variables using multisort id and alphabets order name
                                            $prdc_date = array();
                                            $prdc_id_details = array();
                                            foreach ($products as $productdate) {
                                    $prdc_date[$productdate->post_date] = $productdate->post_title;
                                    
                                    $prdc_id_details[$productdate->ID] = $productdate->ID;  
                                    }
                                    
                                    array_multisort($prdc_date, SORT_ASC, $products, SORT_ASC, $prdc_id_details);
                              foreach($sizeDates as $sizeDatesvalues){ 
                                                
                                    $sizes=explode(",",$sizeDatesvalues); 
                                       //print_r($size); 
                                    //$size_datevalue=$size[1]; 
                                    $size_datevaluess[]=$sizes[1]; 
                              }
                                   sort($size_datevaluess);

                           // print_r($size_datevaluess);
                            
                                 
                                  //print_r($datavalue);
                                  foreach ($products as $key => $product) {
                                   // $available_variations = $product->get_available_variations($product->ID);
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
                        $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
                                    

                                   }
                                  
                                   $var_attributescolordata = $products->get_variation_attributes();

                                     
                                 
                                 sort($var_attributescolordata['color']);
                            //   print_r($var_attributescolordata['color']); 

                                   $var_arr_imp_colordata =  array();

                                   foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
                                    $color_values= str_replace(" ","",$vardatavalue);  
                                    $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
                                    $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
                                   }
                          
                                   $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                                                    // if(count($term_product)<1){
                                                    // continue;
                                                    // }

                                                    $terms_arr=str_replace(" ","", $term_product);

                                                   
                                                    $term_strs=  implode(" ",$terms_arr);
                                                    $term_str=strtolower($term_strs);
                                                   // var_dump($term_str); 
                                                  
                                   
                                    $feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
                                    $secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
                                    $_reg_price = get_post_meta($product->ID, '_regular_price', true);
                                    $sal_prc = get_post_meta( $product->ID, '_sale_price', true);
                            
                                    ?>


                                        <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
                                            <<a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
                                                <div class="banner-card-content">
                                                    <h5><?php echo $product->post_title;?></h5>
                                                    <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
                                            </a>
                                        </div>
                                   <?php }?>
                                  
                                    </div>
                                    
                                </div>
<?php
break;
 case 'name_desc':
?>
<?php 
if(empty($product_id)){
    ?>

<div class="row  sortnew item">
<?php

$product_args = array('post_type' => 'product',
         'post_status' => 'publish',
      'numberposts'=>-1
        );
        $products = get_posts($product_args);
        //two variables using multisort id and alphabets order name

        $prdc_date = array();
        $prdc_id_details = array();
        foreach ($products as $productdate) {
$prdc_date[$productdate->post_date] = $productdate->post_title;

$prdc_id_details[$productdate->ID] = $productdate->ID;  
}

array_multisort($prdc_date, SORT_DESC, $products, SORT_DESC, $prdc_id_details);




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
 $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
        

       }
      
       $var_attributescolordata = $products->get_variation_attributes();

         
     
     sort($var_attributescolordata['color']);
//   print_r($var_attributescolordata['color']); 

       $var_arr_imp_colordata =  array();

       foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
        $color_values= str_replace(" ","",$vardatavalue);  
        $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
        $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
       }

       $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                        // if(count($term_product)<1){
                        // continue;
                        // }

                        $terms_arr=str_replace(" ","", $term_product);

                       
                        $term_strs=  implode(" ",$terms_arr);
                        $term_str=strtolower($term_strs);
                       // var_dump($term_str); 
// / echo '<pre>';   print_r($product->post_title);
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
//$product_name = get_post_meta($product->ID, 'post_title', true);

$_reg_price = get_post_meta($product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);?>
    <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
                                
            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
            <div class="banner-card-content">
                <h5><?php echo $product->post_title;?></h5>
                <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
        </a>
    </div>
<?php }?>
</div>
<?php } else{?>
<div class="row  sortnew item">
<?php

$product_args = array('post_type' => 'product',
         'post_status' => 'publish',
      'numberposts'=>-1
        );
        $products = get_posts($product_args);
        //two variables using multisort id and alphabets order name

        $prdc_date = array();
        $prdc_id_details = array();
        foreach ($products as $productdate) {
$prdc_date[$productdate->post_date] = $productdate->post_title;

$prdc_id_details[$productdate->ID] = $productdate->ID;  
}

array_multisort($prdc_date, SORT_DESC, $products, SORT_DESC, $prdc_id_details);




foreach ($products as $key => $product) {
    if(!in_array($product->ID,$product_id)){
        continue;
   }
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
 $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
        

       }
      
       $var_attributescolordata = $products->get_variation_attributes();

         
     
     sort($var_attributescolordata['color']);
//   print_r($var_attributescolordata['color']); 

       $var_arr_imp_colordata =  array();

       foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
        $color_values= str_replace(" ","",$vardatavalue);  
        $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
        $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
       }

       $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                        // if(count($term_product)<1){
                        // continue;
                        // }

                        $terms_arr=str_replace(" ","", $term_product);

                       
                        $term_strs=  implode(" ",$terms_arr);
                        $term_str=strtolower($term_strs);
                       // var_dump($term_str); 
// / echo '<pre>';   print_r($product->post_title);
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
//$product_name = get_post_meta($product->ID, 'post_title', true);

$_reg_price = get_post_meta($product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);?>
   <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
                                
            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
            <div class="banner-card-content">
                <h5><?php echo $product->post_title;?></h5>
                <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
        </a>
    </div>
<?php }?>
</div>
<?php }?>
<div class="row sortdata"  style='display:none;'>
                                    <?php
                                   $product_args = array('post_type' => 'product',
                                   'post_status' => 'publish',
                                'numberposts'=>-1
                                  );
                                  $products = get_posts($product_args);
                                  //two variables using multisort id and alphabets order name
                          
                                  $prdc_date = array();
                                  $prdc_id_details = array();
                                  foreach ($products as $productdate) {
                          $prdc_date[$productdate->post_date] = $productdate->post_title;
                          
                          $prdc_id_details[$productdate->ID] = $productdate->ID;    
                          }
                          
                          array_multisort($prdc_date, SORT_DESC, $products, SORT_DESC, $prdc_id_details);
                          
                          
                          
                          
                          
                              foreach($sizeDates as $sizeDatesvalues){ 
                                                
                                    $sizes=explode(",",$sizeDatesvalues); 
                                       //print_r($size); 
                                    //$size_datevalue=$size[1]; 
                                    $size_datevaluess[]=$sizes[1]; 
                              }
                                   sort($size_datevaluess);

                           // print_r($size_datevaluess);
                            
                                 
                                  //print_r($datavalue);
                                  foreach ($products as $key => $product) {
                                   // $available_variations = $product->get_available_variations($product->ID);
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
                                    $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
                                    

                                   }
                                  
                                   $var_attributescolordata = $products->get_variation_attributes();

                                     
                                 
                                 sort($var_attributescolordata['color']);
                            //   print_r($var_attributescolordata['color']); 

                                   $var_arr_imp_colordata =  array();

                                   foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
                                    $color_values= str_replace(" ","",$vardatavalue);  
                                    $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
                                     $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
                                   }
                          
                                   $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                                                    // if(count($term_product)<1){
                                                    // continue;
                                                    // }

                                                    $terms_arr=str_replace(" ","", $term_product);

                                                   
                                                    $term_strs=  implode(" ",$terms_arr);
                                                    $term_str=strtolower($term_strs);
                                                   // var_dump($term_str); 
                                                  
                                   
                                    $feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
                                    $secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
                                    $_reg_price = get_post_meta($product->ID, '_regular_price', true);
                                    $sal_prc = get_post_meta( $product->ID, '_sale_price', true);
                            
                                    ?>


                                      <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
                                                <div class="banner-card-content">
                                                    <h5><?php echo $product->post_title;?></h5>
                                                    <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
                                            </a>
                                        </div>
                                   <?php }?>
                                  
                                    </div>
                                    
                                </div>

<?php
break;
 case 'shop':
?>

<div class="row sortnew">
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
                                        $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
                                        
    
                                       }
                                      
                                       $var_attributescolordata = $products->get_variation_attributes();
    
                                         
                                     
                                     sort($var_attributescolordata['color']);
                                //   print_r($var_attributescolordata['color']); 
    
                                       $var_arr_imp_colordata =  array();
    
                                       foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
                                        $color_values= str_replace(" ","",$vardatavalue);  
                                    $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
                                        $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
                                       
                                       }
                              
                                       $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                                                        // if(count($term_product)<1){
                                                        // continue;
                                                        // }
    
                                                        $terms_arr=str_replace(" ","", $term_product);
    
                                                       
                                                        $term_str=  implode(" ",$terms_arr);
                                                       // var_dump($term_str); 
                                  //  echo '<pre>';   print_r($product->post_title);
                                    $feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
                                    //$product_name = get_post_meta($product->ID, 'post_title', true);
                                    $secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
                                    $_reg_price = get_post_meta($product->ID, '_regular_price', true);
                                    $sal_prc = get_post_meta( $product->ID, '_sale_price', true);?>
                                         <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
                                                <div class="banner-card-content">
                                                    <h5><?php echo $product->post_title;?></h5>
                                                    <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
                                            </a>
                                        </div>
                                   <?php }?>
                                    </div>


                                    <div class="row sortdata"  style='display:none;'>
                                    <?php
                                    $product_cat_args = array(
                                    'post_type' => 'product',
                                    'orderby'    => 'menu_order',
                                    'order' => 'ASC',
                                    'numberposts'=>-1
                                    
                                    );
                                  $products = get_posts($product_cat_args);
                                
                              //   print_r($sizeDates);

                                 foreach($sizeDates as $sizeDatesvalues){ 
                                                
                                    $sizes=explode(",",$sizeDatesvalues); 
                                       //print_r($size); 
                                    //$size_datevalue=$size[1]; 
                                    $size_datevaluess[]=$sizes[1]; 
                              }
                                   sort($size_datevaluess);

                           // print_r($size_datevaluess);
                            
                                 
                                  //print_r($datavalue);
                                   foreach ($products as $key => $product) {
                                   // $available_variations = $product->get_available_variations($product->ID);
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
                                    $var_arr_imp_fit[$var_key]=strtolower($var_arr_imp_fit[$var_key]);
                                    

                                   }
                                  
                                   $var_attributescolordata = $products->get_variation_attributes();

                                     
                                 
                                 sort($var_attributescolordata['color']);
                            //   print_r($var_attributescolordata['color']); 

                                   $var_arr_imp_colordata =  array();

                                   foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
                                    $color_values= str_replace(" ","",$vardatavalue);  
                                    $var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);
                            $var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);

                                   }
                          
                                   $term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
                                                    // if(count($term_product)<1){
                                                    // continue;
                                                    // }

                                                    $terms_arr=str_replace(" ","", $term_product);

                                                   
                                                    $term_strs=  implode(" ",$terms_arr);
                                                   $term_str=strtolower($term_strs);
                                                   // var_dump($term_str); 
                                                  
                                   
                                    $feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
                                    $secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
                                    $_reg_price = get_post_meta($product->ID, '_regular_price', true);
                                    $sal_prc = get_post_meta( $product->ID, '_sale_price', true);
                            
                                    ?>


                                        <div class="col-4 thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
			data-sortvalue="<?php echo $product->ID; ?>">	
            <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                    <div class="banner-card-image">
                                    <img src="<?php echo $feat_image;?>" alt="productimg" />
										<?php if($secondry_Image !=''){?>
										<span class="product-additional">
											<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
										</span>
										<?php } ?>
                                    </div>
                                                <div class="banner-card-content">
                                                    <h5><?php echo $product->post_title;?></h5>
                                                    <?php
$products = new WC_Product_Variable( $product->ID );
$variations = $products->get_available_variations();

if(count($variations) != 0){
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');

?>
<div id="" class="product-cost prod-list">From&nbsp;£<?php echo $variation_min_price; ?></div>
<?php

}else{

$reg_prc = get_post_meta( $product->ID, '_regular_price', true);
$sal_prc = get_post_meta( $product->ID, '_sale_price', true);
$price_show = $sal_prc == ''?$reg_prc:$sal_prc;
?>
<div class="product-cost simple">
<strong>
<?php if($sal_prc!=''){ ?>
<span class="rupee unitprice">&#163;<?php echo $reg_prc; ?></span>
£<?php echo $sal_prc; ?><?php }else{ ?> £<?php echo $reg_prc; } ?>
</strong>
</div>
<?php } ?>
</div>
                                            </a>
                                        </div>
                                   <?php }?>
                                  
                                    </div>
                                    
                                </div>
                                    
<?php
}?>

 