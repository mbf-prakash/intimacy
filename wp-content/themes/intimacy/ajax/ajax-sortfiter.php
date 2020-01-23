<?php

$load_url = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
include $load_url[0] . 'wp-load.php';
$sort_ord = $_POST['sort_ord'];
$sort_value=$_POST['sort_array'];

$sorts_limit=$_POST['sorts'];
//print_r($sort_value); 

$temp = preg_replace("/[^a-zA-Z 0-9]+/", " ", $sort_value );
$sort_array=explode(" ",$temp);
$product_id=array_filter($sort_array);


$temp_value = preg_replace("/[^a-zA-Z 0-9]+/", " ", $sorts_limit );
$sort_array_value=explode(" ",$temp_value);
$product_id_value=array_filter($sort_array_value);

//var_dump($product_id_value);

switch ($sort_ord) {



case 'price_high':

?>
<div class="row  ">
<div class="row item">
<?php 
$product_args = array(
  'post_type' => 'product',
  'post_status' => 'publish',
  'numberposts'=>-1
);
  $products_vals = get_posts($product_args);
  $prc_prd_val = array();
foreach ($products_vals as $productval) {
    //get variation product
    $products = new WC_Product_Variable( $productval->ID );
    $produt_name = $productval->post_title;
    $variation_min_price = $products->get_variation_price('min');
    $variation_max_price = $products->get_variation_price('max');
    $price_show = $variation_min_price == ''?$variation_max_price:$variation_min_price;     
    //associative array
    $prc_prd_val[$productval->ID] ['product_id']= $productval->ID;    
    $prc_prd_val[$productval->ID] ['price']= $price_show;
    $prc_prd_val[$productval->ID]['name']= $produt_name;
} 

foreach ($prc_prd_val as $key => $productval) { 

$product_high[] = $productval['price'];
}


array_multisort($product_high, SORT_DESC, $prc_prd_val);

$fp = fopen('/var/www/html/intimacy/wp-content/themes/intimacy/json/product_high.json', 'w');
fwrite($fp, json_encode($prc_prd_val));
fclose($fp);
$product_json = file_get_contents('/var/www/html/intimacy/wp-content/themes/intimacy/json/product_high.json');
$product_data = json_decode($product_json, true);

foreach ($product_data as $key => $product_json_val) {
  
foreach($sizeDates as $sizeDatesvalues){ 

$sizes=explode(",",$sizeDatesvalues); 
//print_r($size); 
//$size_datevalue=$size[1]; 
$size_datevaluess[]=$sizes[1]; 
}
sort($size_datevaluess);


$products = new WC_Product_Variable( $product_json_val['product_id'] );
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
$term_product = wp_get_post_terms($product_json_val['product_id'], 'product_tag',  array("fields" => "names"));
// if(count($term_product)<1){
// continue;
// }
$terms_arr=str_replace(" ","", $term_product);

$term_strs=  implode(" ",$terms_arr);
$term_str=strtolower($term_strs);

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product_json_val['product_id']));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product_json_val['product_id']);


?>

<div class="col-4  thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
data-sortvalue="<?php echo $product_json_val['product_id']; ?>">                         

<a href="<?php echo get_permalink($product_json_val['product_id']); ?>" class="card no-effect thumbnail-wrapper">
<div class="image">
<img src="<?php echo $feat_image;?>" alt="productimg" />

<?php if($secondry_Image !=''){?>
   <span class="product-additional">
     <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
   </span>
<?php } ?>
</div>
<div class="card-content">
<h5><?php echo $product_json_val['name'] ?></h5>

<h4>₹<span><?php echo $product_json_val['price'] ?></span></h4>

</div>
</a>
</div>

<?php } ?>
</div>


<?php
break;
case 'price_low':
?>

<div class="row  ">
<div class="row item">
<?php 
$product_args = array(
  'post_type' => 'product',
  'post_status' => 'publish',
  'numberposts'=>-1
);
  $products_vals = get_posts($product_args);
  $prc_prd_val = array();
foreach ($products_vals as $productval) {
    //get variation product
    $products = new WC_Product_Variable( $productval->ID );
    $produt_name = $productval->post_title;
    $variation_min_price = $products->get_variation_price('min');
    $variation_max_price = $products->get_variation_price('max');
    $price_show = $variation_min_price == ''?$variation_max_price:$variation_min_price;     
    //associative array
    $prc_prd_val[$productval->ID] ['product_id']= $productval->ID;    
    $prc_prd_val[$productval->ID] ['price']= $price_show;
    $prc_prd_val[$productval->ID]['name']= $produt_name;
} 

foreach ($prc_prd_val as $key => $productval) { 

$product_high[] = $productval['price'];
}


array_multisort($product_high, SORT_ASC, $prc_prd_val);

$fp = fopen('/var/www/html/intimacy/wp-content/themes/intimacy/json/product_low.json', 'w');
fwrite($fp, json_encode($prc_prd_val));
fclose($fp);
$product_json = file_get_contents('/var/www/html/intimacy/wp-content/themes/intimacy/json/product_low.json');
$product_data = json_decode($product_json, true);

foreach ($product_data as $key => $product_json_val) {
  
foreach($sizeDates as $sizeDatesvalues){ 

$sizes=explode(",",$sizeDatesvalues); 
//print_r($size); 
//$size_datevalue=$size[1]; 
$size_datevaluess[]=$sizes[1]; 
}
sort($size_datevaluess);


$products = new WC_Product_Variable( $product_json_val['product_id'] );
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
$term_product = wp_get_post_terms($product_json_val['product_id'], 'product_tag',  array("fields" => "names"));
// if(count($term_product)<1){
// continue;
// }
$terms_arr=str_replace(" ","", $term_product);

$term_strs=  implode(" ",$terms_arr);
$term_str=strtolower($term_strs);

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product_json_val['product_id']));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product_json_val['product_id']);


?>

<div class="col-4  thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
data-sortvalue="<?php echo $product_json_val['product_id']; ?>">                         

<a href="<?php echo get_permalink($product_json_val['product_id']); ?>" class="card no-effect thumbnail-wrapper">
<div class="image">
<img src="<?php echo $feat_image;?>" alt="productimg" />

<?php if($secondry_Image !=''){?>
   <span class="product-additional">
     <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
   </span>
<?php } ?>
</div>
<div class="card-content">
<h5><?php echo $product_json_val['name'] ?></h5>

<h4>₹<span><?php echo $product_json_val['price'] ?></span></h4>

</div>
</a>
</div>

<?php } ?>
</div>


<?php
break;
case 'name_asc':
?>

<div class="row  ">
<div class="row item">
<?php 
$product_args = array(
  'post_type' => 'product',
  'post_status' => 'publish',
  'numberposts'=>-1
);
  $products_vals = get_posts($product_args);
  $prc_prd_val = array();
foreach ($products_vals as $productval) {
    //get variation product
    $products = new WC_Product_Variable( $productval->ID );
    $produt_name = $productval->post_title;
    $variation_min_price = $products->get_variation_price('min');
    $variation_max_price = $products->get_variation_price('max');
    $price_show = $variation_min_price == ''?$variation_max_price:$variation_min_price;     
    //associative array
    $prc_prd_val[$productval->ID] ['product_id']= $productval->ID;    
    $prc_prd_val[$productval->ID] ['price']= $price_show;
    $prc_prd_val[$productval->ID]['name']= $produt_name;
} 

foreach ($prc_prd_val as $key => $productval) { 

$product_ascname[] = $productval['name'];
}


array_multisort($product_ascname, SORT_ASC, $prc_prd_val);

$fp = fopen('/var/www/html/intimacy/wp-content/themes/intimacy/json/product_nameasc.json', 'w');
fwrite($fp, json_encode($prc_prd_val));
fclose($fp);
$product_json = file_get_contents('/var/www/html/intimacy/wp-content/themes/intimacy/json/product_nameasc.json');
$product_data = json_decode($product_json, true);

foreach ($product_data as $key => $product_json_val) {
  
foreach($sizeDates as $sizeDatesvalues){ 

$sizes=explode(",",$sizeDatesvalues); 
//print_r($size); 
//$size_datevalue=$size[1]; 
$size_datevaluess[]=$sizes[1]; 
}
sort($size_datevaluess);


$products = new WC_Product_Variable( $product_json_val['product_id'] );
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
$term_product = wp_get_post_terms($product_json_val['product_id'], 'product_tag',  array("fields" => "names"));
// if(count($term_product)<1){
// continue;
// }
$terms_arr=str_replace(" ","", $term_product);

$term_strs=  implode(" ",$terms_arr);
$term_str=strtolower($term_strs);

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product_json_val['product_id']));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product_json_val['product_id']);


?>

<div class="col-4  thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
data-sortvalue="<?php echo $product_json_val['product_id']; ?>">                         

<a href="<?php echo get_permalink($product_json_val['product_id']); ?>" class="card no-effect thumbnail-wrapper">
<div class="image">
<img src="<?php echo $feat_image;?>" alt="productimg" />

<?php if($secondry_Image !=''){?>
   <span class="product-additional">
     <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
   </span>
<?php } ?>
</div>
<div class="card-content">
<h5><?php echo $product_json_val['name'] ?></h5>

<h4>₹<span><?php echo $product_json_val['price'] ?></span></h4>

</div>
</a>
</div>

<?php } ?>
</div>

<?php
break;
case 'name_desc':
?>

<div class="row  ">
<div class="row item">
<?php 
$product_args = array(
  'post_type' => 'product',
  'post_status' => 'publish',
  'numberposts'=>-1
);
  $products_vals = get_posts($product_args);
  $prc_prd_val = array();
foreach ($products_vals as $productval) {
    //get variation product
    $products = new WC_Product_Variable( $productval->ID );
    $produt_name = $productval->post_title;
    $variation_min_price = $products->get_variation_price('min');
    $variation_max_price = $products->get_variation_price('max');
    $price_show = $variation_min_price == ''?$variation_max_price:$variation_min_price;     
    //associative array
    $prc_prd_val[$productval->ID] ['product_id']= $productval->ID;    
    $prc_prd_val[$productval->ID] ['price']= $price_show;
    $prc_prd_val[$productval->ID]['name']= $produt_name;
} 

foreach ($prc_prd_val as $key => $productval) { 

$product_dscname[] = $productval['name'];
}


array_multisort($product_dscname, SORT_DESC, $prc_prd_val);

$fp = fopen('/var/www/html/intimacy/wp-content/themes/intimacy/json/product_namedsc.json', 'w');
fwrite($fp, json_encode($prc_prd_val));
fclose($fp);
$product_json = file_get_contents('/var/www/html/intimacy/wp-content/themes/intimacy/json/product_namedsc.json');
$product_data = json_decode($product_json, true);

foreach ($product_data as $key => $product_json_val) {
  
foreach($sizeDates as $sizeDatesvalues){ 

$sizes=explode(",",$sizeDatesvalues); 
//print_r($size); 
//$size_datevalue=$size[1]; 
$size_datevaluess[]=$sizes[1]; 
}
sort($size_datevaluess);


$products = new WC_Product_Variable( $product_json_val['product_id'] );
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
$term_product = wp_get_post_terms($product_json_val['product_id'], 'product_tag',  array("fields" => "names"));
// if(count($term_product)<1){
// continue;
// }
$terms_arr=str_replace(" ","", $term_product);

$term_strs=  implode(" ",$terms_arr);
$term_str=strtolower($term_strs);

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product_json_val['product_id']));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product_json_val['product_id']);


?>

<div class="col-4  thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
data-sortvalue="<?php echo $product_json_val['product_id']; ?>">                         

<a href="<?php echo get_permalink($product_json_val['product_id']); ?>" class="card no-effect thumbnail-wrapper">
<div class="image">
<img src="<?php echo $feat_image;?>" alt="productimg" />

<?php if($secondry_Image !=''){?>
   <span class="product-additional">
     <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
   </span>
<?php } ?>
</div>
<div class="card-content">
<h5><?php echo $product_json_val['name'] ?></h5>

<h4>₹<span><?php echo $product_json_val['price'] ?></span></h4>

</div>
</a>
</div>

<?php } ?>
</div>


<?php
break;
case 'shop':
?>

<div class="row  ">
<div class="row item">

<?php 
  $product_args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'orderby'    => 'menu_order',
    'order' => 'ASC',
    'numberposts'=>-1
     );
   $products_vals = get_posts($product_args);
   $prc_prd_val = array();
foreach ($products_vals as $productval) {
     //get variation product
  $products = new WC_Product_Variable( $productval->ID );
   $produt_name = $productval->post_title;
   $variation_min_price = $products->get_variation_price('min');
     $variation_max_price = $products->get_variation_price('max');
     $price_show = $variation_min_price == ''?$variation_max_price:$variation_min_price;     
     //associative array
  $prc_prd_val[$productval->ID] ['product_id']= $productval->ID;    
   $prc_prd_val[$productval->ID] ['price']= $price_show;
   $prc_prd_val[$productval->ID]['name']= $produt_name;
    } 
  
foreach ($prc_prd_val as $key => $product) {
 //json array declaration
$totalproduct[]=$product;

}


$fp = fopen('/var/www/html/intimacy/wp-content/themes/intimacy/json/product.json', 'w');
fwrite($fp, json_encode($totalproduct));
fclose($fp);
$product_json = file_get_contents('/var/www/html/intimacy/wp-content/themes/intimacy/json/product.json');
$product_data = json_decode($product_json, true);

foreach ($product_data as $key => $product_json_val) {

foreach($sizeDates as $sizeDatesvalues){ 

$sizes=explode(",",$sizeDatesvalues); 
//print_r($size); 
//$size_datevalue=$size[1]; 
$size_datevaluess[]=$sizes[1]; 
}
sort($size_datevaluess);


$products = new WC_Product_Variable( $product_json_val['product_id'] );
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
$term_product = wp_get_post_terms($product_json_val['product_id'], 'product_tag',  array("fields" => "names"));
// if(count($term_product)<1){
// continue;
// }
$terms_arr=str_replace(" ","", $term_product);

$term_strs=  implode(" ",$terms_arr);
$term_str=strtolower($term_strs);

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product_json_val['product_id']));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product_json_val['product_id']);


?>
<div class="col-4  thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
data-sortvalue="<?php echo $product_json_val['product_id']; ?>">                         

<a href="<?php echo get_permalink($product_json_val['product_id']); ?>" class="card no-effect thumbnail-wrapper">
<div class="image">
<img src="<?php echo $feat_image;?>" alt="productimg" />

<?php if($secondry_Image !=''){?>
   <span class="product-additional">
     <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
   </span>
<?php } ?>
</div>
<div class="card-content">
<h5><?php echo $product_json_val['name'] ?></h5>

<h4>₹<span><?php echo $product_json_val['price'] ?></span></h4>

</div>
</a>
</div>


<?php } ?>
</div>
</div>

<?php
break;
case 'new':
?>

<div class="row  ">
<div class="row item">

<?php 
  $product_args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'orderby'    => 'date',
    'order' => 'DESC',
    'numberposts'=>-1
     );
   $products_vals = get_posts($product_args);
   $prc_prd_val = array();
foreach ($products_vals as $productval) {
     //get variation product
  $products = new WC_Product_Variable( $productval->ID );
   $produt_name = $productval->post_title;
   $variation_min_price = $products->get_variation_price('min');
     $variation_max_price = $products->get_variation_price('max');
     $price_show = $variation_min_price == ''?$variation_max_price:$variation_min_price;     
     //associative array
  $prc_prd_val[$productval->ID] ['product_id']= $productval->ID;    
   $prc_prd_val[$productval->ID] ['price']= $price_show;
   $prc_prd_val[$productval->ID]['name']= $produt_name;
    } 
  
foreach ($prc_prd_val as $key => $product) {
 //json array declaration
$totalproduct[]=$product;

}


$fp = fopen('/var/www/html/intimacy/wp-content/themes/intimacy/json/product.json', 'w');
fwrite($fp, json_encode($totalproduct));
fclose($fp);
$product_json = file_get_contents('/var/www/html/intimacy/wp-content/themes/intimacy/json/product.json');
$product_data = json_decode($product_json, true);

foreach ($product_data as $key => $product_json_val) {

foreach($sizeDates as $sizeDatesvalues){ 

$sizes=explode(",",$sizeDatesvalues); 
//print_r($size); 
//$size_datevalue=$size[1]; 
$size_datevaluess[]=$sizes[1]; 
}
sort($size_datevaluess);


$products = new WC_Product_Variable( $product_json_val['product_id'] );
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
$term_product = wp_get_post_terms($product_json_val['product_id'], 'product_tag',  array("fields" => "names"));
// if(count($term_product)<1){
// continue;
// }
$terms_arr=str_replace(" ","", $term_product);

$term_strs=  implode(" ",$terms_arr);
$term_str=strtolower($term_strs);

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product_json_val['product_id']));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product_json_val['product_id']);


?>
<div class="col-4  thumbnail imagevalue fitvalue colorvalue stylevalue <?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"  data-value="<?php echo  $var_arr_imp['Size'];?> <?php echo $var_arr_imp_colordata['Colour'];?> <?php echo $var_arr_imp_fit['Fit'];?> <?php echo $term_str; ?>"   data-color="<?php echo $var_arr_imp_colordata['Colour'];?>"  data-size="<?php echo  $var_arr_imp['Size'];?>" data-fit="<?php echo $var_arr_imp_fit['Fit'];?>" data-style="<?php echo $term_str; ?>"
data-sortvalue="<?php echo $product_json_val['product_id']; ?>">                         

<a href="<?php echo get_permalink($product_json_val['product_id']); ?>" class="card no-effect thumbnail-wrapper">
<div class="image">
<img src="<?php echo $feat_image;?>" alt="productimg" />

<?php if($secondry_Image !=''){?>
   <span class="product-additional">
     <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
   </span>
<?php } ?>
</div>
<div class="card-content">
<h5><?php echo $product_json_val['name'] ?></h5>

<h4>₹<span><?php echo $product_json_val['price'] ?></span></h4>

</div>
</a>
</div>


<?php } ?>
</div>
</div>
<?php break; } ?>