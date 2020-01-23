<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( );
global $product;
global $woocommerce;
$slug = basename(get_permalink());
$cart_url = $woocommerce->cart->get_cart_url();
/* Get variation attribute based on product ID */
$product = new WC_Product_Variable( $post->ID );
// var_dump($product->get_type());
$variations = $product->get_available_variations();?>
<div style="display: none;"><?php var_dump($variations);?></div>
<?php 
$var_attributes = $product->get_variation_attributes();
// var_dump($var_attributes);
// var_dump($variations);
$var_data = [];
    $attachment_ids = $product->get_gallery_attachment_ids();

// echo "<pre>";
// print_r($variations);
// exit();
// var_dump($product->get_children());
$var_arr = array();
foreach ($product->get_available_variations() as $key => $value) {
$var_id = $value['variation_id'];
$var_arr[$var_id] = $value['attributes'];

}
$variation_min_price = $product->get_variation_price('min');
$variation_max_price = $product->get_variation_price('max');
if($variation_min_price != $variation_max_price){
	$price_prod = $variation_min_price;
}else{
	$price_prod = $variations['display_price'];
}
$_reg_price = get_post_meta($post->ID, '_regular_price', true);
$prodShort = get_post_meta( $post->ID, '_prodShort', true );
$prod_brand = get_post_meta($post->ID, 'prod_brand', true);
$manuFact = get_post_meta( $post->ID, '_manufac_name', true );
$brandName = get_post_meta( $post->ID, '_brand_name', true );
$brandLink = get_post_meta( $post->ID, '_brand_link', true );
// $products = new WC_Product($item['variation_id']);
$sku = get_post_meta( $item['variation_id'], '_sku', true );

// $sku = $products->get_sku();
// var_dump($sku);
?>
<div class="product-wrap">
<div class="container section-start nomobile">
			    	<div class="row">
			    		<div class="col-12">
		    				<div class="breadcrumbs clearfix">
								<ul>
									 <?php
								        if (function_exists('bcn_display')) {
								            bcn_display();
								      }?>
								</ul>
							</div>

			    		</div>
			    	</div>
			    </div>
<div class="container generic-container">
<div class="row">
<div class="col-11 space-add">
<div class="row">
<div class="col-6">
<div class="product">
<div class="descview">
 <a href="<?php echo $brandLink;?>" class="product-brandlink"><?php echo $brandName;?></a>
 <h1><?php echo $product->name; ?></h1>
 <?php
foreach ($variations as $key => $variation) {
	 $var_attr=$variation['attributes'];
	 $color_attr=$var_attr['attribute_colour'];
	 $size_attr=$var_attr['attribute_size'];
	 $fit_attr=$var_attr['attribute_fit'];
 $sku = get_post_meta( $variation['variation_id'], '_sku', true );          
	?>
<!-- <div class="sku_number product-reference" data-fit="<?php echo $fit_attr; ?>" data-clr="<?php echo $color_attr;?>" data-size="<?php echo $size_attr;?>"><strong>Model: </strong><span><?php echo $sku;?></span></div> -->
<?php } ?>
<!--  <div class="product-reference"><strong>Manufacturer: </strong><span><?php echo $manuFact;?></span></div> -->
</div>
<?php echo apply_filters('the_content', $product->short_description);?>
<?php
foreach ($variations as $key => $variation) {
	 // var_dump($variation);
$var_attr=$variation['attributes'];
$color_attr=$var_attr['attribute_colour'];
$size_attr=$var_attr['attribute_size'];
$fit_attr=$var_attr['attribute_fit'];
$pre_attr=$var_attr['attribute_preference'];
$var_val = wc_get_product($variation['variation_id']);
$var_reg_prc = $var_val->get_regular_price();
$var_sal_prc = $var_val->get_sale_price();
$var_quantity = $var_val->get_stock_quantity();
?>



<div class="product-cost product-cost-var <?php echo $color_attr;?> <?php echo $size_attr;?>" data-id="<?php echo $variation['variation_id']; ?>" data-stck="<?php echo $var_quantity;?>" data-fit="<?php echo $fit_attr; ?>" data-clr="<?php echo $color_attr;?>" data-size="<?php echo $size_attr;?>" data-pre="<?php echo $pre_attr;?>">




<?php if($var_sal_prc!=''){ ?>
<div class="product-size-text">Price</div>
<span class="rupee unitprice">₹<?php echo $var_reg_prc; ?>.00</span>₹<?php echo $var_sal_prc; ?>.00

<?php }else{?>
<div class="product-size-text">Price</div>
₹<?php echo $var_reg_prc;?>.00
<?php } ?>
</div>
<?php } ?> 
<div class="color-pick">
<?php
foreach ($product->get_variation_attributes() as $attr_key => $var_atts) {
$attr_low = strtolower($attr_key);
$attr_tax = 'attribute_'.str_replace(' ', '-', $attr_low);
if($attr_tax=='attribute_size'){
	continue;
}
if($attr_tax=='attribute_fit'){
	continue;
}
if ($attr_tax=='attribute_colour') {
	# code...
}
if($attr_tax=='attribute_preference'){
	continue;
}
?>
 <div class="product-size-text"><?php echo $attr_key; ?></div>
 <div class="d-flex">
<?php foreach ($var_atts as $key => $var_att) { ?>
		 <a href="javascript:void(0)" data-colour="<?php echo $var_att;  ?>" class="color_attr">
				 <div class="color-pad-bg" style="background-color: <?php echo color_name_to_hex($var_att);  ?>"></div>
		 </a>
		 <?php } ?>
 </div>
<?php } ?>
</div>
<div class="product-size">
 <div class="product-divide">
		 <div class="form-row select-row select-noscroll remove-space">
		 	<?php
foreach ($product->get_variation_attributes() as $attr_key => $var_atts) {
$attr_low = strtolower($attr_key);
$attr_tax = 'attribute_'.str_replace(' ', '-', $attr_low);
if($attr_tax=='attribute_colour'){
	continue;
}
if($attr_tax=='attribute_fit'){
	continue;
}
if($attr_tax=='attribute_preference'){
	continue;
}
if ($attr_tax=='attribute_size') {
}


?>
				 <div class="product-size-text">CHOOSE A <?php echo $attr_key; ?></div>
				 <select class="select-menu pdp-menu" name="selectmenu">
						<option></option>
						<?php $index = 1; foreach ($var_atts as $key => $var_att) { ?>
						<option <?php echo $index == 1 ? "selected" : ""; ?> value=<?php echo $var_att;  ?>><?php echo $var_att;  ?></option>
					<?php $index++; } ?>
				</select>
				<?php } ?>
		 </div>
 </div>
 <div class="product-divide">
    <div class="form-row select-row select-noscroll remove-space">
   <?php foreach ($product->get_variation_attributes() as $attr_key => $var_atts) {
$attr_low = strtolower($attr_key);
$attr_tax = 'attribute_'.str_replace(' ', '-', $attr_low);
if($attr_tax=='attribute_colour'){
	continue;
}
if($attr_tax=='attribute_size'){
	continue;
}
?>
    <div class="product-size-text">CHOOSE <?php echo $attr_key; ?></div>
       <select class="select-menu fit-menu" name="selectmenu">
			<option></option>
				<?php $idx = 1;  foreach ($var_atts as $key => $var_att) { ?>
				<option value=<?php echo $var_att;  ?> <?php echo $idx == 1 ? "selected" : ""; ?>><?php echo $var_att;  ?></option>
               <?php  $idx++; }?>
	   </select>
<?php } ?>
    </div>
</div>
</div>
<div class="size-guid"> 
   <a href="<?php echo get_site_url().'/size-chart/'; ?>">Size Guide</a>
</div>
<div class="product-size-text qty">QUANTITY</div>

<div class="product-cart">
 <div class="preloadtd cart-table formCol">
		 <button class="textbox-right" >-</button>
		 <input type="text" id="qtyprod" class="textbox-small qty"  maxlength="3" value="1" readonly>
		 <button class="textbox-left" id="qtyprod-left">+</button>
 </div>
<div class="">
<input type="hidden" id ="add_to_cart_url" name="add_to_cart_url" value="<?php echo get_bloginfo('template_url'); ?>/ajax/ajax_add_cart.php" />
<?php
$var_json = json_encode($var_arr);

?>
<input type="hidden" name="<?php echo absint( $product->id ); ?>" value='1'>
<input type="hidden" class="attr_var"  name="attr_var" value='<?php echo $var_json; ?>'>
<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->id ); ?>" />
<input type="hidden" name="cart-url" id='cart-url' value="<?php echo wc_get_cart_url(); ?>">
<input type="hidden" id ="product_id" name="product_id" value="<?php echo absint( $product->id ); ?>" />
<input type="hidden" id ="variation_id" name="variation_id" class="variation_id" value="0" />
<?php if ( ! $product->managing_stock() && ! $product->is_in_stock() ){ ?>
<!-- <p ><?php //_e( 'Out of stock', 'woocommerce' ); ?></p> -->
<?php } else {?>
<button class="setid button button-tertiary add_to_cart_btn progress-button " data-style="shrink" data-horizontal ><span class="content"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></span><span class="progress"><span class="progress-inner"></span></span></button>
<?php } ?>

 </div>
</div>
<div class="stock_var"style="display: none;"><span>Out of stock</span></div>
</div>
</div>
<div class="col-6">
<div class="row">
<div class="col-10">
 <div class="product no-desc">
                    	<?php if (is_single() ){
					$breadRoot = get_the_terms($post->ID, 'product_cat');
					$arrowlink=$breadRoot[0]->term_id;
					$arrowname=$breadRoot[0]->name;
					?>
                    	<div class="no-desc back-catagory"><a href="<?php echo get_term_link($arrowlink); ?>"><i class="fa fa-angle-left" aria-hidden="true"></i><?php echo $arrowname; ?></a></div>
                    <?php } ?>
<!--                   	<a href="<?php echo get_permalink($prod_brand); ?>" class="product-brandlink"><?php echo strtoupper(get_the_title($prod_brand)); ?></a> -->
                    <h1><?php echo $product->name; ?></h1>
                      </div>
 <div class="provider provider-css">
	<?php foreach( $attachment_ids as $attachment_id ) {
           $image_link = wp_get_attachment_url( $attachment_id );?>
		 <a href="#" class="product-zoom">
				 <img src="<?php echo $image_link; ?>" data-zoom="<?php echo $image_link; ?>">
		 </a>
		<?php } ?>
 </div>
</div>
<div class="col-2">
 <div class="provider-nav providernav-css">
 	<?php foreach( $attachment_ids as $attachment_id ) {
           $image_link = wp_get_attachment_url( $attachment_id );?>
		 <div class="provider-image">
				 <img src="<?php echo $image_link; ?>">
		 </div>
		 <?php } ?>
 </div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- tabs start -->
<div class="row tabs">
<div class="col-10">
<?php echo apply_filters('the_content', $post->post_content);?>
</div>
</div>
<!-- tabs end -->
</div>
</div>
<?php $related_posts = MRP_get_related_posts( $post->ID, true, true );
if(is_array($related_posts)){
asort($related_posts);
}
if($related_posts != 0){?>
<div class="like-section white-bg product-listing">
<div class="container banner-card">
<h2>You may also like</h2>
<div class="row">
					<?php

					    $post_count= 0;
						foreach ($related_posts as $key => $related_post){
							$msg_name = get_post_meta($related_post->ID, 'msg_name', true);
	        				$titleTag = get_post_meta($related_post->ID, 'title_tag', true);
							$_reg_price_rel = get_post_meta($related_post->ID, '_regular_price', true);
							$iconImageID = MultiPostThumbnails::get_post_thumbnail_id('product', 'second-image', $related_post->ID);
	                        $featImage = wp_get_attachment_url(get_post_thumbnail_id($related_post->ID) );
							$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $related_post->ID);
	                        $prodShort = get_post_meta( $related_post->ID, '_prodShort', true );
	                        if($post_count==4){
	                        	break;
	                        }
				              
				            
						?>

	<div class="col-3">
<a href="<?php echo get_permalink($related_post->ID); ?>" class="thumbnail-wrapper">
<img src="<?php echo $featImage; ?>" alt="productimg" />
	<?php if($secondry_Image !=''){?>
	<span class="product-additional">
		<img src="<?php echo $secondry_Image; ?>" alt="productimg" />
	</span>
	<?php } ?>
<div class="card-content">
	<?php
							$var = new WC_Product_Variable( $related_post->ID );
							$variations = $var->get_available_variations();
							$variation_product_id = $variations [0]['variation_id'];
							$variation_product = new WC_Product_Variation( $variation_product_id );
							$var_reg_prc = $variation_product->regular_price;
							$var_sal_prc = $variation_product->sale_price;

	?>
<h5><?php echo $related_post->post_title; ?></h5>
<h4><span><?php if($var_sal_prc!=''){ ?>&nbsp;₹<?php echo $var_sal_prc; ?>.00<?php }else{ ?> ₹<?php echo $var_reg_prc;?>.00 <?php } ?></span></h4>
</div>
</a>
</div>

						<?php  
						$post_count++;
					}?>
					</div>
</div>
</div>
<?php } ?>

<?php get_footer();?>