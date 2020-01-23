<?php

/*********
* Template Name: Shop all
**********/
define(‘WP_MEMORY_LIMIT’, ‘1024M’);
define( ‘WP_MAX_MEMORY_LIMIT’, ‘2000M’ );
 get_header();
?>
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
<div class="container generic-container">
<div class="row shop-all">
<div class="col-7">
<div class="no-desc back-catagory"><a href="<?php echo get_site_url().'/'; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i>Home</a></div>
<h1><?php echo $post->post_title; ?></h1>
<?php echo apply_filters('the_content', $post->post_content); ?>
</div>
<div class="col-5">
<div class="filter-wrapper drop-js">
<label data-error="Please select an  Country" class="floating-item">Sort by</label>
<div class="drop-links form-wrap1 prod-sort">
<div class="desktop-drop"><h2>Shop All</h2></div>
<ul class='sort_menu'>
<li class="head">Shop All</li>
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
</div>

<div class="container">
<div class="allarea">
<div class="row" id='productid'>
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

// echo '<pre>';
// print_r($variation); 
// $post_parent[]=$variation->post_parent;
$variation_data=$variation->post_excerpt;

$attr_tax = str_replace(' -', ',', $variation_data);
$attr_variation=explode(",",$variation_data); 

  
$color_value[]=$attr_variation[0];

$size_value[]=$attr_variation[1];
$fit_value[]=$attr_variation[2]; 
}


//$array_sizes=array_count_values($size_value);
//print_r($array_sizes); 
//  foreach( $array_sizes as $key=>$valuesdata){
//     echo '<pre>';  print_r($valuesdata); 
//  }
// $colorDate = str_replace(':', ',', $size_value);
//    var_dump(count($size_value)); 
// print_r($color_value); 
$colorvalues=array_unique($color_value); 
//  echo '<pre>'; print_r($colorvalues);
$size_values=array_unique($size_value); 

$fit_value=array_unique($fit_value); 


$colorDate = str_replace(':', ',', $colorvalues);
$sizeDates= str_replace(':', ',', $size_values);
//var_dump($sizeDates); 
$fitDate = str_replace(':', ',', $fit_value);
//    print_r($fitDate);
?>
<?php
// print_r($colorvalues);?>

<div class="col-3">
<div class="drop-links form-wrap prod-filter">
<div class="mobile-drop"><h2>Filter by type</h2></div>
<div class="head"><h3>Filter by</h3></div>
<div class="accordion-row-blk">
 <h4>Size</h4>
<div class="accordion-content active viewmore-wrapper">
<?php 

foreach($sizeDates as $sizeDatesvalue){ 

$size=explode(",",$sizeDatesvalue); 
//print_r($size); 
//$size_datevalue=$size[1]; 
$size_datevalues[]=$size[1]; 
}
sort($size_datevalues);
$size_datevalues_data=count($size_datevalues); 
$indexsize=1; 
foreach($size_datevalues as $size_datevalue)
{
    $viewmoreclasssize='filter-item hidden';
    if($size_datevalue === null){

    }else{
    if($indexsize<=5)
  {
    $viewmoreclasssize='filter-item';
  }
?>
<div class="checkboxradio-row <?php echo $viewmoreclasssize; ?> ">
<?php 
$sizedatevalue=trim($size_datevalue);
$sizedatevalue=strtolower($sizedatevalue);         
?>
<input class="checkboxradio-item checkboxradio-invisible input-email-active" id="<?php echo $sizedatevalue; ?>" value="<?php echo $sizedatevalue; ?>" name="newsletters" type="checkbox">
<label class="checkboxradio-label checkbox-label" style="text-transform: uppercase;" for="<?php echo $sizedatevalue; ?>"><?php echo $sizedatevalue; ?></label>

</div> 
<?php }
$indexsize ++;
}?>
<div class="viewmore-option">
+ <span><?php echo $size_datevalues_data;?></span> more
</div>
</div>
<h4>Color</h4>
<div class="accordion-content viewmore-wrapper">
  <div class="color-variant-block">
<?php 
// print_r($colorDate); 
$colorDated=count($colorDate); 
//print_r($colorDated);
foreach($colorDate as $key =>$colorDates){

$color=explode(",",$colorDates); 
//var_dump($color);
$color_datevalue[]=$color[1];

}

$color_datevalues = array_filter($color_datevalue);    

sort($color_datevalues);
  
$color_datevaluesd=array_unique($color_datevalues); 

?>

<?php
    $index=1;                                    
foreach($color_datevaluesd as $key =>$color_datevalue){ 
$color_datevalue=trim($color_datevalue);
$colordata_values=str_replace(" ","",$color_datevalue);
// print_r($colordata_values);
$colour_value=strtolower($colordata_values);    
if($color_datevalue==='NULL'){

}else{ 
//  var_dump($color_datevalue);
    $viewmoreclass='filter-item hidden';
  if($index<=5)
  {
    $viewmoreclass='filter-item';
  }
?>
                                     
      <div class="color-variant-item   <?php echo $viewmoreclass; ?> ">
     
      <input style="display:none;" class="checkboxradio-item coloritemsort checkboxradio-invisible input-email" id="<?php echo $colour_value; ?>" value="<?php echo   $colour_value;?>" name="color" type="checkbox">

          <a href="javascript:void(0);" class="no-effect color-filter-value" style="background-color:<?php echo color_name_to_hex($color_datevalue);?>">
          </a>
          
          <span class="color-filter"><?php echo  $color_datevalue;?></span>
      </div>                                                

<?php }
$index++;
}?>
</div>
<div class="viewmore-option">
+ <span><?php echo $colorDated;?></span> more
</div>
</div>
<h4>Fit</h4>
<div class="accordion-content">
<?php 
//print_r($colorDate); 
foreach($fitDate as $fitDates){

$fit=explode(",",$fitDates); 

$fit_datevalues[]=$fit[1]; 
}
sort(array_filter($fit_datevalues));  
$fit_data=array_unique($fit_datevalues);
unset($fit_data[5]);
unset($fit_data[8]);
foreach($fit_data as $fit_datevalue)  {  
//var_dump($fit_datevalue);
if($fit_datevalue === null  ){
  continue;
}

if($fit_datevalue === 'Printer'){
  continue;
}
else{
?>  
<div class="checkboxradio-row fit">
<?php 
$fitedatevalue=trim($fit_datevalue);
$fit_value_data=strtolower($fitedatevalue);
?>
<input class="checkboxradio-item checkboxradio-invisible input-email-active" id="<?php echo $fit_value_data; ?>" value="<?php echo $fit_value_data;?>" name="fitdatavalue" type="checkbox">
<label class="checkboxradio-label checkbox-label" for="<?php echo $fit_value_data; ?>"><?php echo $fitedatevalue; ?></label>
</div> 
<?php }

}?>
</div>
<h4>Style</h4>
<div class="accordion-content">
<?php
$terms = get_terms( 'product_tag' );
foreach($terms as $tagvalue){

$tagstylevalue=str_replace(" ","", $tagvalue->name);
$tagvalue_name=strtolower($tagstylevalue);
// var_dump($tagstylevalue); 

?>
<div class="checkboxradio-row">
<input class="checkboxradio-item checkboxradio-invisible input-email-active" value="<?php echo $tagvalue_name;?>" id="<?php echo $tagvalue_name;?>" name="tagvaluedata" type="checkbox">
<label class="checkboxradio-label checkbox-label" for="<?php echo $tagvalue_name;?>"><?php echo $tagvalue->name;?></label>
</div> 
<?php }?>
</div>
</div>
</div>
</div>



<div class="col-9 product-listing loadMore">
<div class="productnotmatching"  style="display:none;">
<p>  We're sorry! We couldn't find a match to the product you're looking for right now.  ¯\_(ツ)_/¯</p>

</div>
<div id="Allcategories" class="noshow">
<div class="row showimage">
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


</div>
</div>
</div>
</div>
<span class="filtererrormessage" style="display:none;">Products unavailable with your selected filters</span>
<input id="my-json" type="hidden" value="" />
<input id="my-jsons" type="hidden" value="" />

<div class="scroll-top"><a href="#" class="scroll-btn no-effect"><i class="fa fa-chevron-up" aria-hidden="true"></i></a></div>
</div>
</div>
</div>
</div>

<?php get_footer();?>