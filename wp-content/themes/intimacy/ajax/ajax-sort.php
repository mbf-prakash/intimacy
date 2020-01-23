<?php

$load_url = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
include $load_url[0] . 'wp-load.php';
$sort_ord_value = $_POST['sort'];

$sort_ord=$_POST['sort_ord'];
//print_r($sort_value); 

$temp = preg_replace("/[^a-zA-Z 0-9]+/", " ", $sort_ord_value );
$sort_array=explode(" ",$temp);
$product_id=array_filter($sort_array);



switch ($sort_ord) {
   


    case 'price_high':
?>
<div class="row imageshowdata">
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
  # code...
  if(!in_array($product->ID, $product_id)){
    continue;
   }
 
  $array_remain_prodvalue[]=$product->ID;
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


sort($var_attributescolordata['Colour']);
//   
$var_arr_imp_colordata =  array();
foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
$color_values= str_replace(" ","",$vardatavalue);  
$var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);


$var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
}
// var_dump($var_arr_imp_colordata['color']); 
$term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
// if(count($term_product)<1){
// continue;
// }
$terms_arr=str_replace(" ","", $term_product);

$term_strs=  implode(" ",$terms_arr);
$term_str=strtolower($term_strs);

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);


?>
<div class="col-4  thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
data-sortvalue="<?php echo $product->ID; ?>" id="<?php echo $product->ID; ?>">                         

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
<h2><?php echo $product->post_title; ?></h2>
<?php
$var = new WC_Product_Variable( $product->ID );
$variations = $var->get_available_variations();
$variation_product_id = $variations [0]['variation_id'];
if(count($variations) != 0){
$variation_product = new WC_Product_Variation( $variation_product_id );
$var_reg_prc = $variation_product->regular_price;
$var_sal_prc = $variation_product->sale_price;

$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');
//var_dump(round($variation_max_price));
?>
<h4>From ₹<span><?php echo round($variation_max_price); ?></span></h4>
<?php

}?>
</div>
</a>
</div>
<?php


}
$json_data = json_encode($array_remain_prodvalue); 
?>
</div>
</div>
<?php //echo "~".$json_data; ?>

<?php 
break;
case 'price_low':
?>
<div class="row imageshowdata">
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

    

$index = 0;
foreach ($products_vals as $key => $product) {
  # code...
  if(!in_array($product->ID, $product_id)){
    continue;
   }
  
  $array_remain_prodvalue[]=$product->ID;
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


sort($var_attributescolordata['Colour']);
//   
$var_arr_imp_colordata =  array();
foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
$color_values= str_replace(" ","",$vardatavalue);  
$var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);


$var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
}
// var_dump($var_arr_imp_colordata['color']); 
$term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
// if(count($term_product)<1){
// continue;
// }
$terms_arr=str_replace(" ","", $term_product);

$term_strs=  implode(" ",$terms_arr);
$term_str=strtolower($term_strs);

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
?>
<div class="col-4  thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
data-sortvalue="<?php echo $product->ID; ?>" id="<?php echo $product->ID; ?>">                         

<a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect zoom-in">
<div class="banner-card-image">
<img src="<?php echo $feat_image;?>" alt="productimg" />
<?php if($secondry_Image !=''){?>
   <span class="product-additional">
     <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
   </span>
<?php } ?>
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
$variation_min_price = $products->get_variation_price('min');
$variation_max_price = $products->get_variation_price('max');
//var_dump(round($variation_max_price));
?>
<h4>From ₹<span><?php echo round($variation_min_price); ?></span></h4>
<?php

}?>
</div>
</a>
</div>
<?php


}
$json_datas = json_encode($array_remain_prodvalue); 
?>
</div>
</div>
<?php //echo "~".$json_datas; ?>
<?php
break;
case 'name_asc':
?>
<div class="row imageshowdata">
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
  
    

$index = 0;
foreach ($products as $key => $product) {
  # code...
  if(!in_array($product->ID, $product_id)){
    continue;
   }
 
  $array_remain_prodvalue[]=$product->ID;
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


sort($var_attributescolordata['Colour']);
//   
$var_arr_imp_colordata =  array();
foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
$color_values= str_replace(" ","",$vardatavalue);  
$var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);


$var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
}
// var_dump($var_arr_imp_colordata['color']); 
$term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
// if(count($term_product)<1){
// continue;
// }
$terms_arr=str_replace(" ","", $term_product);

$term_strs=  implode(" ",$terms_arr);
$term_str=strtolower($term_strs);

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
?>
<div class="col-4  thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
data-sortvalue="<?php echo $product->ID; ?>" id="<?php echo $product->ID; ?>">                         

<a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect zoom-in">
<div class="banner-card-image">
<img src="<?php echo $feat_image;?>" alt="productimg" />
<?php if($secondry_Image !=''){?>
   <span class="product-additional">
     <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
   </span>
<?php } ?>
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
<?php


}
$json_datas = json_encode($array_remain_prodvalue); 
?>
</div></div>
<?php// echo "~".$json_datas; ?>




<?php
break;
case 'name_desc':
?>
<div class="row imageshowdata">
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
  # code...
  if(!in_array($product->ID, $product_id)){
    continue;
   }

  $array_remain_prodvalue[]=$product->ID;
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


sort($var_attributescolordata['Colour']);
//   
$var_arr_imp_colordata =  array();
foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
$color_values= str_replace(" ","",$vardatavalue);  
$var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);


$var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
}
// var_dump($var_arr_imp_colordata['color']); 
$term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
// if(count($term_product)<1){
// continue;
// }
$terms_arr=str_replace(" ","", $term_product);

$term_strs=  implode(" ",$terms_arr);
$term_str=strtolower($term_strs);

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
?>
<div class="col-4  thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
data-sortvalue="<?php echo $product->ID; ?>" id="<?php echo $product->ID; ?>">                         

<a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect zoom-in">
<div class="banner-card-image">
<img src="<?php echo $feat_image;?>" alt="productimg" />
<?php if($secondry_Image !=''){?>
   <span class="product-additional">
     <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
   </span>
<?php } ?>
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
<?php


}
$json_datas = json_encode($array_remain_prodvalue); 
?>
</div>
<?php //echo "~".$json_datas; ?>
</div>

<?php //echo "~".$json_datas; ?>
<?php
break;
case 'name_asc':
?>
<div class="row imageshowdata">
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
  
    

$index = 0;
foreach ($products as $key => $product) {
  # code...
  if(!in_array($product->ID, $product_id)){
    continue;
   }
 
  $array_remain_prodvalue[]=$product->ID;
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


sort($var_attributescolordata['Colour']);
//   
$var_arr_imp_colordata =  array();
foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
$color_values= str_replace(" ","",$vardatavalue);  
$var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);


$var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
}
// var_dump($var_arr_imp_colordata['color']); 
$term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
// if(count($term_product)<1){
// continue;
// }
$terms_arr=str_replace(" ","", $term_product);

$term_strs=  implode(" ",$terms_arr);
$term_str=strtolower($term_strs);

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
?>
<div class="col-4  thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
data-sortvalue="<?php echo $product->ID; ?>" id="<?php echo $product->ID; ?>">                         

<a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect zoom-in">
<div class="banner-card-image">
<img src="<?php echo $feat_image;?>" alt="productimg" />
<?php if($secondry_Image !=''){?>
   <span class="product-additional">
     <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
   </span>
<?php } ?>
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
<?php


}
$json_datas = json_encode($array_remain_prodvalue); 
?>
</div></div>
<?php// echo "~".$json_datas; ?>




<?php
break;
case 'shop':
?>
<div class="row imageshowdata">
<?php
 $product_cat_args = array(
  'post_type' => 'product',
  'orderby'    => 'menu_order',
  'order' => 'ASC',
  'numberposts'=>-1
  
  );
$products = get_posts($product_cat_args);


 foreach ($products as $key => $product) {

 

  $array_remain_prodvalue[]=$product->ID;
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


sort($var_attributescolordata['Colour']);
//   
$var_arr_imp_colordata =  array();
foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
$color_values= str_replace(" ","",$vardatavalue);  
$var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);


$var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
}
// var_dump($var_arr_imp_colordata['color']); 
$term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
// if(count($term_product)<1){
// continue;
// }
$terms_arr=str_replace(" ","", $term_product);

$term_strs=  implode(" ",$terms_arr);
$term_str=strtolower($term_strs);

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
?>
<div class="col-4  thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
data-sortvalue="<?php echo $product->ID; ?>" id="<?php echo $product->ID; ?>">                         

<a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect zoom-in">
<div class="banner-card-image">
<img src="<?php echo $feat_image;?>" alt="productimg" />
<?php if($secondry_Image !=''){?>
   <span class="product-additional">
     <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
   </span>
<?php } ?>
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
<?php


}
$json_datas = json_encode($array_remain_prodvalue); 
?>
</div>
<?php //echo "~".$json_datas; ?>
</div>




<?php
break;
case 'new':
?>
<div class="row imageshowdata">
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
  

    

$index = 0;
foreach ($products_date as $key => $product) {
  # code...
  if(!in_array($product->ID, $product_id)){
    continue;
   }
 
  $array_remain_prodvalue[]=$product->ID;
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


sort($var_attributescolordata['Colour']);
//   
$var_arr_imp_colordata =  array();
foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
$color_values= str_replace(" ","",$vardatavalue);  
$var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);


$var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
}
// var_dump($var_arr_imp_colordata['color']); 
$term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
// if(count($term_product)<1){
// continue;
// }
$terms_arr=str_replace(" ","", $term_product);

$term_strs=  implode(" ",$terms_arr);
$term_str=strtolower($term_strs);

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
?>
<div class="col-4  thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
data-sortvalue="<?php echo $product->ID; ?>" id="<?php echo $product->ID; ?>">                         

<a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect zoom-in">
<div class="banner-card-image">
<img src="<?php echo $feat_image;?>" alt="productimg" />
<?php if($secondry_Image !=''){?>
   <span class="product-additional">
     <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
   </span>
<?php } ?>
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
<?php


}
$json_datas = json_encode($array_remain_prodvalue); 
?>
</div>
<?php //echo "~".$json_datas; ?>

</div>

<?php }?>





<div class="row text" style='display:none;'>
 <?php                                  
$product_cat_args = array(
  'post_type' => 'product',
  'orderby'    => 'menu_order',
  'order' => 'ASC',
  'numberposts'=>-1
  
  );
  $products = get_posts($product_cat_args);
  $index = 0;
  foreach ($products as $key => $product) {
    # code...
   
   
   $array_remain_prod[]=$product->ID;
  
 
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


sort($var_attributescolordata['Colour']);
//   
$var_arr_imp_colordata =  array();
foreach($var_attributescolordata  as $varcolorkey=>$vardatavalue){
$color_values= str_replace(" ","",$vardatavalue);  
$var_arr_imp_colordata[$varcolorkey]= implode(' ',$color_values);


$var_arr_imp_colordata[$varcolorkey]=strtolower($var_arr_imp_colordata[$varcolorkey]);
}
// var_dump($var_arr_imp_colordata['color']); 
$term_product = wp_get_post_terms($product->ID, 'product_tag',  array("fields" => "names"));
// if(count($term_product)<1){
// continue;
// }
$terms_arr=str_replace(" ","", $term_product);

$term_strs=  implode(" ",$terms_arr);
$term_str=strtolower($term_strs);

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);
?>
<div class="col-4  thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
data-sortvalue="<?php echo $product->ID; ?>" id="<?php echo $product->ID; ?>">                         

<a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect zoom-in">
<div class="banner-card-image">
<img src="<?php echo $feat_image;?>" alt="productimg" />
<?php if($secondry_Image !=''){?>
   <span class="product-additional">
     <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
   </span>
<?php } ?>
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
<?php

  }
$json_datas = json_encode($array_remain_prodvalue); 
?>
</div></div>




