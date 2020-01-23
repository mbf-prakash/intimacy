<?php

$load_url = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
include $load_url[0] . 'wp-load.php';
$product_val = $_POST['product_val'];
$category_val=$_POST['category_val'];

//print_r($sort_value); 

$temp = preg_replace("/[^a-zA-Z 0-9]+/", " ", $product_val );
$productsort_array=explode(" ",$temp);
$product_val_id=array_filter($productsort_array);



?>

<?php
$product_cat_args = array('post_type' => 'product',
                                 'orderby'    => 'menu_order',
                              'order' => 'ASC',
			      'numberposts'=>-1,
                              'tax_query' =>  array(
                                      array(
                                          'taxonomy' => 'product_cat',
                                          'field' => 'id',
                                          'terms' => $category_val
                                          )
                              )
                              );
$products = get_posts($product_cat_args);



?>

 
     <?php	
     $index=0;
     foreach ($products as $product) {
        if(in_array($product->ID, $product_val_id)){
            continue;
          }
         //echo 'dd'; 
         if($index== 4){
             break;
       }
       $array_remain_prod[]=$product->ID;
                 $feat_image = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
		 		$secondry_Image=MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-image', $product->ID);

?>
 
<div class="col-3 productsort " data-sortvalue ="<?php echo $product->ID; ?>" id="<?php echo $product->ID; ?>" >	

                             <a href="<?php echo get_permalink($product->ID); ?>" class="card no-effect thumbnail-wrapper">
                                     <div class="image">
                                             <img src="<?php echo $feat_image; ?>" alt="productimg" />
										 <?php if($secondry_Image !=''){?>
                                                   <span class="product-additional">
                                                     <img src="<?php echo $secondry_Image; ?>" alt="productimg" />
                                                   </span>
                                               <?php } ?>
                                     </div>
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
                      <?php 
                      $index++;
                      } 
                      
                      
                      ?>
                    
             
<?php 
$json_data = json_encode($array_remain_prod); 
?>
</div>

<?php echo "~".$json_data; ?>