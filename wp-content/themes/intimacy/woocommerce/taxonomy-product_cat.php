<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
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
?>
<?php get_header();
$curr_term_id = get_queried_object()->term_id;
$post_term=get_queried_object();
$product_cat_args = array('post_type' => 'product',
                                 'orderby'    => 'menu_order',
                              'order' => 'ASC',
			           'numberposts'=>-1,
                              'tax_query' =>  array(
                                      array(
                                          'taxonomy' => 'product_cat',
                                          'field' => 'id',
                                          'terms' => $curr_term_id
                                          )
                              )
                              );
$products = get_posts($product_cat_args);

?>
<div class="container section-start nomobile">
	<div class="row">
	<div class="col-12">
		<div class="no-desc back-catagory"><a href="<?php echo get_bloginfo('url'); ?>/shop-all/"><i class="fa fa-angle-left" aria-hidden="true"></i>Shop All</a></div>
	<div class="breadcrumbs clearfix">
								<ul>
									<?php
								        if (function_exists('bcn_display')) {
								            bcn_display();
								      }?>
								</ul>
	</div>
	<h1><?php echo $post_term->name; ?></h1>
	<?php echo wpautop($post_term->description); ?>
	</div>
	</div>
</div>

<div class="container section-start no-desc ">
				<div class="row shop-all">
					<div class="col-7">
						<div class="no-desc back-catagory"><a href="<?php echo get_bloginfo('url'); ?>/shop-all/"><i class="fa fa-angle-left" aria-hidden="true"></i>Shop All</a></div>
						
					<h1><?php echo $post_term->name; ?></h1>
					<?php echo wpautop($post_term->description); ?>
					</div>
				</div>
			</div>


<div class="container banner-card">

<div class="row">
<div class="col-12">
<div class="product-listing">
<div class="row">
<?php	

   $prc_prd_val = array();
foreach ($products as $productval) {
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


$fp = fopen('/var/www/html/intimacy/wp-content/themes/intimacy/json/product_cat.json', 'w');
fwrite($fp, json_encode($totalproduct));
fclose($fp);
$product_json = file_get_contents('/var/www/html/intimacy/wp-content/themes/intimacy/json/product_cat.json');
$product_data = json_decode($product_json, true);

foreach ($product_data as $key => $product_json_val) {
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($product_json_val['product_id']));
$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product_json_val['product_id']);

?>
<div class="col-3">

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
<?php get_footer();?>
