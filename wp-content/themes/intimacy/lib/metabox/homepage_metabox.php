<?php
/*** Metabox for page, post ***/

add_action("add_meta_boxes", "add_page_settings_custom_meta_box");
add_action("save_post", "save_page_settings_custom_meta_box", 10, 3);

function add_page_settings_custom_meta_box($post){
	if(get_page_template_slug( $post->ID ) == "index.php") {
	add_meta_box("banner-meta-box", "Banner Options", "banner_page_settings_box_markup", array('page'), "normal", "high", null);
}
}

function banner_page_settings_box_markup($post){
	if(get_page_template_slug( $post->ID ) == "index.php") {
	wp_nonce_field(basename(__FILE__), "page-settings-nonce");

	$logo = get_post_meta( $post->ID, '_uplogo', true );
	$banner_image = get_post_meta( $post->ID, '_banner_image', true );
	$video = get_post_meta( $post->ID, '_banner_link', true );
    $notify = get_post_meta( $post->ID, '_notify', true );
	$banner_content = get_post_meta( $post->ID, '_banner_content', true );
	get_template_part('inc/upload-scripts');

	echo '<style type="text/css"> .page_settings_tbl td, .page_settings th{ padding: 7px 0px; } .page_settings textarea{ width: 25em;} </style>';
	echo '<table width="100%" class="page_settings" style="text-align: left;">';
	echo get_admin_input('up_image', '_uplogo', 'Logo Image', $logo , '');
  echo get_admin_input('editor', '_notify', 'Notification Bar', $notify , '');
  echo get_admin_input('up_image', '_banner_image', 'Banner Image', $banner_image , '');
	echo get_admin_input('text', '_banner_link', 'Banner Video url', $video , '');
	echo '</table>';
	}
}

function save_page_settings_custom_meta_box( $post_id ) {



	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	if ( in_array($_POST['post_type'], array('page','post','cpt-conditions')) ) {

		if ( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	}

	$fields = array( '_notify','_uplogo','_banner_link','_banner_content','_banner_image');

	foreach( $fields as $field ) {
		if(isset($_POST[$field])){
			$value = ( $_POST[$field] );
			update_post_meta( $post_id, $field, $value );
		}
	}

}

add_action("add_meta_boxes", "add_page_settings_custom_meta_box_double");
add_action("save_post", "save_page_settings_custom_meta_box_double", 10, 3);

function add_page_settings_custom_meta_box_double($post){
	if(get_page_template_slug( $post->ID ) == "index.php") {
	add_meta_box("double-meta-box", "DOUBLE Showcase", "banner_page_settings_box_markup_double", array('page'), "normal", "high", null);
}
}

function banner_page_settings_box_markup_double($post){
	if(get_page_template_slug( $post->ID ) == "index.php") {
	wp_nonce_field(basename(__FILE__), "page-settings-nonce");
	$orderHome2 = get_post_meta($post->ID, 'order_in_Home2', true);
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

<table>

         <tr>
            <td><label for="tax-order"><h3><b>Home page display</b></h3></label></td>
                <td style="left: 9%; position: relative;">
                    <select name="show_in_home2">
                        <option <?php if($showInHome2=="no"){ echo 'selected'; } ?> value="no">No</option>
                        <option <?php if($showInHome2=="yes"){ echo 'selected'; } ?> value="yes">Yes</option>                    </select>
                </td>
        </tr>
        </table>
        <table>

      <!--    <tr>
            <td><label for="home-order"><h3><b>Position</b></h3></label></td>
                <td style="left: 95%; position: relative;">
                    <select name="order_in_Home2">
                        <option <?php if($orderHome2=="1"){ echo 'selected'; } ?> value="1">1</option>
                        <option <?php if($orderHome2=="2"){ echo 'selected'; } ?> value="2">2</option>
                        <option <?php if($orderHome2=="3"){ echo 'selected'; } ?> value="3">3</option>
                    </select>
                </td>
        </tr> -->
        </table>

<?php
	echo '<style type="text/css"> .page_settings_tbl td, .page_settings th{ padding: 7px 0px; } .page_settings textarea{ width: 25em;} </style>';
	echo '<table width="100%" class="page_settings" style="text-align: left;">
	<h3>Double Card 1</h3>';

	echo get_admin_input('text', 'double_head_line', 'Headline', $doubleheadLine , '');
	echo get_admin_input('text', '_double_link', 'Link', $doubleLink , '');
		echo get_admin_input('text', '_double_btn', 'Button name', $doublebtn , '');

	echo get_admin_input('editor', 'double_description', 'Description', $doubleDescription , '');
	echo get_admin_input('up_image', '_doubleImg', 'Image', $doubleImg , '');

	echo '</table>';

		echo '<table width="100%" class="page_settings" style="text-align: left;">
	<h3>Double Card 2</h3>';

	echo get_admin_input('text', 'double_head_line1', 'Headline', $doubleheadLine1 , '');
	echo get_admin_input('text', '_double_link1', 'Link', $doubleLink1 , '');
			echo get_admin_input('text', '_double_btn1', 'Button name', $doublebtn1 , '');

	echo get_admin_input('editor', 'double_description1', 'Description', $doubleDescription1 , '');
	echo get_admin_input('up_image', '_doubleImg1', 'Image', $doubleImg1 , '');

	echo '</table>';


	}
}

function save_page_settings_custom_meta_box_double( $post_id ) {


	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	if ( in_array($_POST['post_type'], array('page','post')) ) {

		if ( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	}

	$fields = array( 'double_head_line','_double_link','double_description','_doubleImg','double_head_line1','double_description1','_double_link1','_doubleImg1','show_in_home2','order_in_Home2','_double_btn1','_double_btn');

	foreach( $fields as $field ) {
		if(isset($_POST[$field])){
			$value = ( $_POST[$field] );
			update_post_meta( $post_id, $field, $value );
		}
	}

}



add_action("add_meta_boxes", "add_page_settings_custom_meta_box_single");
add_action("save_post", "save_page_settings_custom_meta_box_single", 10, 3);

add_action("add_meta_boxes", "add_page_settings_custom_meta_box_single");
add_action("save_post", "save_page_settings_custom_meta_box_single", 10, 3);

function add_page_settings_custom_meta_box_single($post){
	if(get_page_template_slug( $post->ID ) == "index.php") {
	add_meta_box("single-meta-box", "SINGLE Showcase", "banner_page_settings_box_markup_single", array('page'), "normal", "high", null);
}
}

function banner_page_settings_box_markup_single($post){
	if(get_page_template_slug( $post->ID ) == "index.php") {
	wp_nonce_field(basename(__FILE__), "page-settings-nonce");
	$showInHome1 = get_post_meta($post->ID, 'show_in_home1', true);
	$singleLink = get_post_meta( $post->ID, '_single_link', true );
	$singleBtn = get_post_meta( $post->ID, '_single_btn', true );
	$singleImg = get_post_meta( $post->ID, '_singleImg', true );
	$singleheadLine = get_post_meta( $post->ID, 'singleheadLine', true );
	$singleDescription = get_post_meta( $post->ID, 'singleDescription', true );

?>

<table>

         <tr>
            <td><label for="tax-order"><h3><b>Home page display</b></h3></label></td>
                <td style="left: 9%; position: relative;">
                    <select name="show_in_home1">
                        <option <?php if($showInHome1=="no"){ echo 'selected'; } ?> value="no">No</option>
                        <option <?php if($showInHome1=="yes"){ echo 'selected'; } ?> value="yes">Yes</option>                    </select>
                </td>
        </tr>
        </table>


<?php

	echo '<style type="text/css"> .page_settings_tbl td, .page_settings th{ padding: 7px 0px; } .page_settings textarea{ width: 25em;} </style>';
	echo '<table width="100%" class="page_settings" style="text-align: left;">
	<h3>Single Card</h3>';

	echo get_admin_input('text', 'singleheadLine', 'Headline', $singleheadLine , '');
	echo get_admin_input('text', '_single_link', 'Link', $singleLink , '');
	echo get_admin_input('text', '_single_btn', 'Button name', $singleBtn , '');

	echo get_admin_input('editor', 'singleDescription', 'Description', $singleDescription , '');
	echo get_admin_input('up_image', '_singleImg', 'Image', $singleImg , '');

	echo '</table>';

	}
}

function save_page_settings_custom_meta_box_single( $post_id ) {



	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	if ( in_array($_POST['post_type'], array('page','post')) ) {

		if ( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	}

	$fields = array( '_single_link','_singleImg','singleheadLine','_single_btn','singleDescription','show_in_home1','order_in_Home1');

	foreach( $fields as $field ) {
		if(isset($_POST[$field])){
			$value = ( $_POST[$field] );
			update_post_meta( $post_id, $field, $value );
		}
	}

}

add_action("add_meta_boxes", "add_page_settings_custom_meta_box_trio");
add_action("save_post", "save_page_settings_custom_meta_box_trio", 10, 3);

function add_page_settings_custom_meta_box_trio($post){
	if(get_page_template_slug( $post->ID ) == "index.php") {
	add_meta_box("trio-meta-box", "Collection section", "banner_page_settings_box_markup_trio", array('page'), "normal", "high", null);
}
}

function banner_page_settings_box_markup_trio($post){
	if(get_page_template_slug( $post->ID ) == "index.php") {
	wp_nonce_field(basename(__FILE__), "page-settings-nonce");
	$showInHome3 = get_post_meta($post->ID, 'show_in_home3', true);
	$orderHome3 = get_post_meta($post->ID, 'order_in_Home3', true);

	$headLine = get_post_meta( $post->ID, '_head_line', true );
	$trioLink = get_post_meta( $post->ID, '_trio_link', true );
	$trioImg = get_post_meta( $post->ID, '_trioImg', true );
	$Description = get_post_meta( $post->ID, '_description', true );

	$headLine1 = get_post_meta( $post->ID, '_head_line1', true );
	$trioLink1 = get_post_meta( $post->ID, '_trio_link1', true );
	$trioImg1 = get_post_meta( $post->ID, '_trioImg1', true );
	$Description1 = get_post_meta( $post->ID, '_description1', true );

	$headLine2 = get_post_meta( $post->ID, '_head_line2', true );
	$trioLink2 = get_post_meta( $post->ID, '_trio_link2', true );
	$trioImg2 = get_post_meta( $post->ID, '_trioImg2', true );
	$Description2 = get_post_meta( $post->ID, '_description2', true );

?>
<table>

         <tr>
            <td><label for="tax-order"><h3><b>Home page display</b></h3></label></td>
                <td style="left: 9%; position: relative;">
                    <select name="show_in_home3">
                        <option <?php if($showInHome3=="no"){ echo 'selected'; } ?> value="no">No</option>
                        <option <?php if($showInHome3=="yes"){ echo 'selected'; } ?> value="yes">Yes</option>                    </select>
                </td>
        </tr>
        </table>

<?php
	echo '<style type="text/css"> .page_settings_tbl td, .page_settings th{ padding: 7px 0px; } .page_settings textarea{ width: 25em;} </style>';

	echo '<table width="100%" class="page_settings" style="text-align: left;">
	<h3>Card 1</h3>';

	echo get_admin_input('text', '_head_line', 'Headline', $headLine , '');
	echo get_admin_input('text', '_trio_link', 'Link', $trioLink , '');
	// echo get_admin_input('editor', '_description', 'Description', $Description , '');
	echo get_admin_input('up_image', '_trioImg', 'Image', $trioImg , '');

	echo '</table>';

		echo '<table width="100%" class="page_settings" style="text-align: left;">
	<h3>Card 2</h3>';

	echo get_admin_input('text', '_head_line1', 'Headline', $headLine1 , '');
	echo get_admin_input('text', '_trio_link1', 'Link', $trioLink1 , '');
	// echo get_admin_input('editor', '_description1', 'Description', $Description1 , '');
	echo get_admin_input('up_image', '_trioImg1', 'Image', $trioImg1 , '');

	echo '</table>';


		echo '<table width="100%" class="page_settings" style="text-align: left;">
	<h3>Card 3</h3>';

	echo get_admin_input('text', '_head_line2', 'Headline', $headLine2 , '');
	echo get_admin_input('text', '_trio_link2', 'Link', $trioLink2 , '');
	// echo get_admin_input('editor', '_description2', 'Description', $Description2 , '');
	echo get_admin_input('up_image', '_trioImg2', 'Image', $trioImg2 , '');

	echo '</table>';

	}
}

function save_page_settings_custom_meta_box_trio( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	if ( in_array($_POST['post_type'], array('page','post')) ) {

		if ( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	}

	$fields = array( '_head_line','_trio_link','_description','_trioImg','_head_line1','_description1','_trio_link1','_trioImg1','_head_line2','_description2','_trioImg2','_trio_link2','show_in_home3','order_in_Home3');

	foreach( $fields as $field ) {
		if(isset($_POST[$field])){
			$value = ( $_POST[$field] );
			update_post_meta( $post_id, $field, $value );
		}
	}

}

/**********Products Show in Homepage**********/

add_action('add_meta_boxes', 'add_home_products_meta');
function add_home_products_meta()

{
  if(get_page_template_slug( $post->ID ) == "index.php") {
    add_meta_box(
                'home_meta',
                'Show Products in Homepage',
                'display_home_products_meta',
                'page',
                'normal',
                'high');
}
}

function display_home_products_meta() {

  global $post;
   wp_nonce_field( 'home_products_meta_box', 'home_products_meta_box_nonce' );
  if(get_page_template_slug( $post->ID ) == "index.php") {

              $args = array(

                   'post_type'    => 'product',
                     'taxonomy'     => 'product_cat',
                     'order'    => 'ASC',
                     'orderby'      => 'term_order',
                     'hide_empty'   => '0',
                     'numberposts'  => -1
              );
             $all_categories = get_categories( $args );
             $term_prods = array();
              $chkd_prods = get_post_meta( $post->ID, 'show_in_product', true );

             foreach ($all_categories as $cat){
                // echo $cat->name;

                 $product_cat_args = array('post_type' => 'product',
                                            'orderby'    => 'menu_order',
                                            'order' => 'ASC',
                                            'numberposts'=>-1,
                                            'tax_query' =>  array(
                                                    array(
                                                        'taxonomy' => 'product_cat',
                                                        'field' => 'id',
                                                        'terms' => $cat->term_id
                                                        )
                                            )
                                            );
                $products = get_posts($product_cat_args);

             foreach ($products as $key => $prods) {
                  $term_prods[$cat->term_id] = $prods->ID;
                  if(in_array($prods->ID,$chkd_prods)){
                    // echo $prods->post_title;
                  }else{
                    echo '';
                  }

                }
              }
              ?>
              <div class="meta_productwrap" style="display: flex;">
              <?php
             foreach ($all_categories as $cat) {?>
               <div class="meta_product" style="width: 20%;">
              <h2><?php echo $cat->name; ?></h2>

              <?php
                $product_cat_args = array('post_type' => 'product',
                                            'orderby'    => 'menu_order',
                                            'order' => 'ASC',
                                            'numberposts'=>-1,
                                            'tax_query' =>  array(
                                                    array(
                                                        'taxonomy' => 'product_cat',
                                                        'field' => 'id',
                                                        'terms' => $cat->term_id
                                                        )
                                            )
                                            );
                $products = get_posts($product_cat_args);

                foreach ($products as $key => $prods) {
                  $term_prods[$cat->term_id][] = $prods->ID;
                }

            foreach ($products as $product) {

              $is_checked = in_array($product->ID, $chkd_prods) ? 'checked="checked"' : '';


              ?>

                 <p><input type="checkbox" name="show_in_product[]" <?php echo $is_checked; ?> value="<?php echo $product->ID; ?>" />

                 <?php echo $product->post_title; ?> </p>



<?php
// var_dump($term_prods);
}

?>
</div>
<?php
 }
 ?>
</div>
<?php

} }

?>

<?php

function home_products_save_meta_box_data( $post_id ) {


      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
      }

      if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
          return;
        }

      } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
          return;
        }
      }

        /*if ( isset( $_POST['show_in_product'] ) ) {
        } else {
            $my_data = 0;
        }*/
            $my_data =  $_POST['show_in_product'] ;
            $chkd_prods = get_post_meta( $post->ID, 'show_in_product', true );

      update_post_meta( $post_id, 'show_in_product', $my_data );
    }
    add_action( 'save_post', 'home_products_save_meta_box_data' );



add_action("add_meta_boxes", "add_page_settings_custom_meta_box");
add_action("save_post", "save_page_settings_custom_meta_box", 10, 3);


?>
