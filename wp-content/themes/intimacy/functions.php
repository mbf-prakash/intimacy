<?php

show_admin_bar(false);

// remove_action('wp_head', 'print_emoji_detection_script', 7);
// remove_action('wp_print_styles', 'print_emoji_styles');
// remove_filter( 'woocommerce_coupon_code', 'strtolower' );
// remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
// remove_action( 'admin_print_styles', 'print_emoji_styles' );

function my_default_image_size () {
    return 'full';
}
add_action( 'wp_print_styles',     'my_deregister_styles', 100 );

function my_deregister_styles()    {

   wp_deregister_style( 'dashicons' );

}
function remove_default_scripts( ){
      wp_deregister_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'remove_default_scripts');
function remove_post_custom_fields() {
    remove_meta_box( 'postcustom' , 'page' , 'normal' );
}
add_action( 'admin_menu' , 'remove_post_custom_fields' );
if ( ! function_exists( 'page_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
    function page_setup() {

    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain( 'sample', get_template_directory() . '/languages' );

    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support( 'automatic-feed-links' );

    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );


    add_theme_support( 'custom-logo');


    add_theme_support( 'widgets' );



    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
    }
    endif; // page_setup
    add_action( 'after_setup_theme', 'page_setup' );

/*  File Configurations Backend */
    include('lib/config.php');
    include('inc/additional_functions.php');
    include('inc/site_settings.php');
    include('inc/template.php');

/*  Menu Backend */
    add_theme_support( 'menus' );

/********************
To get all menus
********************/
function get_menu($menuName){
   $mainMenuArgs = array(
   'order' => 'ASC',
   'post_type' => 'nav_menu_item',
   'post_status' => 'publish',
   'output' => ARRAY_A,
   'output_key' => 'menu_order',
   'nopaging' => true,
   'update_post_term_cache' => false,
   'menu_item_parent' => 0
   );
   $menuItems = wp_get_nav_menu_items($menuName, $mainMenuArgs);
   return $menuItems;
}
/*
 * ** Dropdown menu
 */
function dropDownMenu($menu_type) {
    $menu_args = array(
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'post_type' => 'nav_menu_item',
        'post_status' => 'publish',
        'output' => ARRAY_A,
        'output_key' => 'menu_order',
        'nopaging' => true,
        'update_post_term_cache' => false
    );
    $main_menu_array = wp_get_nav_menu_items($menu_type, $menu_args);
    $tot_main_menu = count($main_menu_array);
       if ($tot_main_menu != 0) {
        foreach ($main_menu_array as $key => $home_menu) {
            $parent_menu = $home_menu->menu_item_parent;
            $menu_title = $home_menu->title;
            $menu_id = $home_menu->ID;
            $menu_url = (!empty($home_menu->url)) ? $home_menu->url : get_permalink($menu_id);
            $menu_target = ($home_menu->target == "_blank") ? "target='_blank'" : '';
            $menu_parent_id = $home_menu->menu_item_parent;
            if ($parent_menu == 0) {

              if(get_permalink()==$home_menu->url){
                          $cls_act = 'active';
                        }else{
                          $cls_act = '';
                        }
                      if(is_tax('product_cat')){
                        $categories = get_the_terms( get_the_ID(), 'product_cat' ); 
                        $cls_act = $categories[0]->name == $home_menu->title?'active':''; 
                    }
                         if ( is_singular( 'product' ) ) {
                        global $post;
                        $terms = get_the_terms( $post->ID, 'product_cat' );
                        $categories = get_the_terms( get_the_ID(), 'product_cat' ); 
                        foreach ($terms as $term) {
                            $product_cat = $term->name;
                        }
                          if($product_cat == $home_menu->title){
                            $cls_act = 'active';
                          }else if($categories[0]->name == $home_menu->title){
                            $cls_act = 'active';
                          }
                          else{
                            $cls_act = '';
                          }

                        }
                ?>
                <li>
                    <a class="<?php echo $cls_act; ?> nosub-nav" href="<?php print $menu_url; ?>" title="<?php print $menu_title; ?>" <?php print $menu_target; ?>>
                    <?php print $menu_title; ?>
                    </a>
                    <?php
                    $menuid =($_SERVER['HTTP_HOST'] == "176.32.230.44" ) ? 806 : 401;
                    if ($menu_id == $menuid) {
                        ourProjectsSubMenu();
                    } else {
                        customSubmenu($menu_id, $main_menu_array, $menu_title);
                    }
                    ?>
                </li>
                <?php
            }
        }
    }
}



function ourProjectsSubMenu() {
    $term_args = array(
                    "orderby" => "term_order",
                    "hide_empty" => 0,
                    "order" => 'ASC',
        );
    $proj_cats = get_terms('projects_cat', $term_args);
    $total_proj_cats = count($proj_cats);
    if ($total_proj_cats > 0) { ?>
    <div class="subMenu">
            <ul>
                <?php foreach ($proj_cats as $proj_cat) {
                     $option_name = 'projects_cat_category_campaign_' . $proj_cat->term_id;
                        $category_custom_order = get_option( $option_name );
                        if($category_custom_order != "yes") {
                    ?>
                    <li>
                        <a href="<?php echo get_term_link( $proj_cat ); ?>"><?php echo $proj_cat->name; ?></a>
                    </li>
                <?php }
                }
                ?>
            </ul>
    </div>
    <?php
    }
}

function customSubmenu($menuVal, $menu_items, $current_menu_title) {
    $submenu_count = 0;
    foreach ($menu_items as $item) {
        if ($item->menu_item_parent == $menuVal) {
            $submenu_count++;
        }
    }
    if ($submenu_count != 0) {
        // echo '<div class="sub-nav">';
        print '<ul class="sub-nav">';
        foreach ($menu_items as $subitem) {
            $subtarget = "";
            if ($subitem->menu_item_parent == $menuVal) {
                if ($subitem->target == "_blank") {
                    $subtarget = "target='_blank'";
                }
                ?>
                <li>
                    <a href="<?php echo $subitem->url; ?>" title="<?php echo $subitem->title; ?>" <?php echo $subtarget; ?>>
                <?php echo $subitem->title; ?>
                    </a>
                    <?php
                        customSecSubmenu($subitem->ID, $menu_items, $subitem->title);
                    ?>
                </li> <?php
            }
        }
        print "</ul>";
        // echo '</div>';
    }
}
function customSecSubmenu($subMenuID, $subItems, $subitem_title){
    $subitem_count == 0;
    foreach ($subItems as $sub_item) {
        if ($sub_item->menu_item_parent == $subMenuID) {
            $subitem_count++;
        }
    }
    if ($subitem_count != 0) {
        echo '<div class="sub-nav">';
        print '<ul>';
        foreach ($subItems as $sub_item) {
            $subtarget = "";
            if ($sub_item->menu_item_parent == $subMenuID) {
                if ($sub_item->target == "_blank") {
                    $subtarget = "target='_blank'";
                }
                ?>
                <li>
                    <a href="<?php echo $sub_item->url; ?>" title="<?php echo $sub_item->title; ?>" <?php echo $subtarget; ?>>
                <?php echo $sub_item->title; ?>
                    </a>

                </li> <?php
            }
        }
        print "</ul>";
        echo '</div>';
    }

}
/********************
To Get Product Price
********************/
function proddet_prc_chg(){
  $prod_id = $_POST['product_id'];
  $var_id = $_POST['variation_id'];
  $qty = $_POST['quantity'];
  $prod_det = wc_get_product( $prod_id );
  if($prod_det->is_type( 'simple' )) {
    $price = price_show($prod_id);
    $tot_price = $price * $qty;
    echo 'simple|'.$tot_price;
  }else
  if($prod_det->is_type( 'variable' )){
    if($var_id =='' || $var_id==0 ){
      $variation_min_price = $prod_det->get_variation_price('min');

      $variation_max_price = $prod_det->get_variation_price('max');
      if($variation_min_price != $variation_max_price){
        $price_prod = $variation_min_price.'-'.$variation_max_price;
      }else{
        $price_prod = $variable_product1['display_price'];
      }
    }else{
      $variable_product1 = new WC_Product_Variation( $var_id );
      $regular_price = $variable_product1->regular_price;
      $sales_price = $variable_product1->sale_price;
      if($sales_price == ''){
       echo 'variation|'.$regular_price * $qty;
      }else{
        echo 'variation|'.$sales_price * $qty;
      }
    }

  }
  exit();
}
add_action('wp_ajax_proddet_prc', 'proddet_prc_chg');
add_action('wp_ajax_nopriv_proddet_prc', 'proddet_prc_chg');

/*******
*    For Excerpt
*******/
add_post_type_support('page', 'excerpt');

/*******
*  For Search Functionality
*******/
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetch(){
        var searchData = jQuery('#search-tag').val();
        console.log(searchData);
    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: { action: 'data_fetch', search: jQuery('#search-tag').val() },
        success: function(data) {
            jQuery('#search-result').html( data );
        }
    });

}
</script>

<?php }

add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){
$allPostTypes=array('product');

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['search'] ), 'post_type' => $allPostTypes ) );
    echo '<div class="search-scroll">';

    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>
          <div class="search-content">
                <a class="no-effect" href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a>
          </div>
        <?php endwhile;
        wp_reset_postdata();
    endif;
echo "</div>";
    die();
}

function woocommerce_register_form( $args = array() ) {
    $defaults = array(
        'message'  => '',
        'redirect' => '',
        'hidden'   => false
    );
                    $args = wp_parse_args( $args, $defaults  );

    wc_get_template( 'global/form-register.php', $args );
}
function custom_override_checkout_fields_ek( $fields ) {
unset($fields['billing']['billing_company']);
//unset($fields['billing']['billing_address_2']);
// unset($fields['billing']['billing_state']);
unset($fields['billing']['billing_address_1']['placeholder']);

//  unset($fields['billing']['billing_country']['label']);
$order = array(
        "billing_first_name",
        "billing_last_name",
	    "billing_email",
		"billing_address_1",
		"billing_address_2",
        "billing_city",
	    "billing_postcode",
        "billing_state",
        "billing_country",
	    "billing_phone",
    );
    foreach($order as $field)
    {
        $ordered_fields[$field] = $fields["billing"][$field];
    }

    $fields["billing"] = $ordered_fields;
return $fields;
}

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields_ek', 99 );
// For billing email and phone - Make them not required
add_filter( 'woocommerce_billing_fields', 'filter_billing_fields', 20, 1 );
function filter_billing_fields( $billing_fields ) {
    // Only on checkout page
    if( ! is_checkout() ) return $billing_fields;

    $billing_fields['billing_state']['required'] = false;

    return $billing_fields;
}

function login_redirect() {
//   $parseurl = wp_get_referer();
// $referer_url = parse_url($parseurl);
// $path_str = explode('/', $referer_url['path']);
// $path_arr = array_filter($path_str);
// $path = end($path_arr);
// var_dump('expression');
$path_prev = $_POST['chk_redirect'];


if ( $path_prev == 'checkout' )
{
    wp_redirect('checkout');
}
else{
  wp_redirect('my-account');
}
    /*if (isset($_SESSION['referer_url'])) {
        wp_redirect($_SESSION['referer_url']);
    } else {
        wp_redirect('my-account');
    }*/
}
add_filter('woocommerce_login_redirect', 'login_redirect', 1100, 2);

/*******
Register Extra Fields
*******/
function wooc_extra_register_fields() {
    ?>
    <div class="form-row">
        <label class="floating-item" data-error="Please enter your first name">
        <input type="text" class="floating-item-input input-item validate" name="first_name" id="first_name" value="<?php if ( ! empty( $_POST['first_name'] ) ) echo esc_attr( $_POST['first_name'] ); ?>" autocomplete="off" maxlength="75" onkeypress="return onlyAlphabets(event, this)"   />
        <span class="floating-item-label">FIRST NAME</span>
        </label>
    </div>

    <div class="form-row">
        <label class="floating-item" data-error="Please enter your last name">
        <input type="text" class="floating-item-input input-item validate" name="last_name" id="last_name" value="<?php if ( ! empty( $_POST['last_name'] ) ) echo esc_attr( $_POST['last_name'] ); ?>" autocomplete="off" maxlength="75" onkeypress="return onlyAlphabets(event, this)"/>
        <span class="floating-item-label">LAST NAME</span>
        </label>
    </div>


    <?php
}
add_action( 'woocommerce_register_form_end', 'wooc_extra_register_fields' );
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );
function wooc_save_extra_register_fields( $customer_id ) {
    if ( isset( $_POST['first_name'] ) ) {
        // WordPress default first name field.
        update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['first_name'] ) );
    }

    if ( isset( $_POST['last_name'] ) ) {
        // WordPress default last name field.
        update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['last_name'] ) );
    }


}

/******
*Cart Quantity Ajax
******/
function ajax_qty_cart() {

    // Set item key as the hash found in input.qty's name
    $cart_item_key = $_POST['hash'];

    // Get the array of values owned by the product we're updating
    $threeball_product_values = WC()->cart->get_cart_item( $cart_item_key );

    // Get the quantity of the item in the cart
    $threeball_product_quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( "/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT)) ), $cart_item_key );

    // Update cart validation
    $passed_validation  = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $threeball_product_values, $threeball_product_quantity );

    // Update the quantity of the item in the cart
    if ( $passed_validation ) {
        WC()->cart->set_quantity( $cart_item_key, $threeball_product_quantity, true );
    }

    // Refresh the page
    echo do_shortcode( '[woocommerce_cart]' );

    die();

}

add_action('wp_ajax_qty_cart', 'ajax_qty_cart');
add_action('wp_ajax_nopriv_qty_cart', 'ajax_qty_cart');
// converts an html color name to a hex color value
// if the input is not a color name, the original value is returned
// http://wpCodeSnippets.info

function color_name_to_hex($color_name)
{
    // standard 147 HTML color names
    $colors  =  array(
		'hot pink'=>'E55982',
		'dark tomato'=>'752329',
        'caramel'=>'262626',
        'jaguar'=>'F7B599',
        'aliceblue'=>'F0F8FF',
        'antiquewhite'=>'FAEBD7',
        'aqua'=>'00FFFF',
        'aquamarine'=>'7FFFD4',
        'azure'=>'F0FFFF',
        'beige'=>'F5F5DC',
        'bisque'=>'FFE4C4',
        'black'=>'2D2C2F',
        'blanchedalmond '=>'FFEBCD',
        'Blue'=>'0000FF',
		'blue black'=>'003366',
		'blue atoll'=>'203e4b',
		'blue atoll black'=>'203e4b',
		'black white'=>'E7E6DD',
		'white black'=>'E7E6DD',
		'wine'=>'722f37',
        'blueviolet'=>'8A2BE2',
		'black print'=>'383b3e',
        'brick red'=>'cb4154',
        'coffee brown'=>'6f4e37',
        'dark pink'=>'ff69b4',
        'brown'=>'A52A2A',
        'burlywood'=>'DEB887',
		'claret red'=>'6f2b28',
        'cadetblue'=>'5F9EA0',
        'chartreuse'=>'7FFF00',
        'chocolate'=>'D2691E',
        'coral'=>'E24666',
        'cornflowerblue'=>'6495ED',
        'cornsilk'=>'FFF8DC',
        'crimson'=>'DC143C',
        'cyan'=>'00FFFF',
		'dark purple'=>'622F53',
        'darkblue'=>'00008B',
        'darkcyan'=>'008B8B',
        'darkgoldenrod'=>'B8860B',
        'darkgray'=>'A9A9A9',
        'darkgreen'=>'006400',
		'red black'=>'990000',
        'darkgrey'=>'A9A9A9',
		'dark'=>'003366',
		'light'=>'eedd82',
        'darkkhaki'=>'BDB76B',
        'darkmagenta'=>'8B008B',
        'darkolivegreen'=>'556B2F',
        'darkorange'=>'FF8C00',
        'darkorchid'=>'9932CC',
        'darkred'=>'8B0000',
        'darksalmon'=>'E9967A',
        'darkseagreen'=>'8FBC8F',
        'darkslateblue'=>'483D8B',
        'darkslategray'=>'2F4F4F',
        'darkslategrey'=>'2F4F4F',
        'darkturquoise'=>'00CED1',
        'darkviolet'=>'9400D3',
		'dark skin'=>'B69574',
        'deeppink'=>'FF1493',
        'deepskyblue'=>'00BFFF',
        'dimgray'=>'696969',
        'dimgrey'=>'696969',
        'dodgerblue'=>'1E90FF',
		'fawn'=>'B09793',
        'firebrick'=>'B22222',
        'floralwhite'=>'FFFAF0',
        'forestgreen'=>'228B22',
        'fuchsia'=>'D33479',
        'gainsboro'=>'DCDCDC',
        'ghostwhite'=>'F8F8FF',
        'gold'=>'FFD700',
        'goldenrod'=>'DAA520',
        'gray'=>'808080',
        'green'=>'008000',
        'greenyellow'=>'ADFF2F',
        'grey'=>'808080',
		'grape'=>'622F53',
		'grey black print'=>'686D6C',
		'paradise pink'=>'e63e62',
		'purple print'=>'28282D',
        'honeydew'=>'F0FFF0',
        'hotpink'=>'E55982',
        'indianred'=>'CD5C5C',
        'indigo'=>'4B0082',
        'ivory'=>'FFFFF0',
        'khaki'=>'F0E68C',
        'lavender'=>'E6E6FA',
		'lake blue'=>'579da6',
        'lavenderblush'=>'FFF0F5',
        'lawngreen'=>'7CFC00',
        'lemonchiffon'=>'FFFACD',
        'lightblue'=>'ADD8E6',
        'lightcoral'=>'F08080',
        'lightcyan'=>'E0FFFF',
        'lightgoldenrodyellow'=>'FAFAD2',
        'lightgray'=>'D3D3D3',
        'lightgreen'=>'90EE90',
        'lightgrey'=>'D3D3D3',
        'lightpink'=>'FFB6C1',
        'lightsalmon'=>'FFA07A',
        'lightseagreen'=>'20B2AA',
        'lightskyblue'=>'87CEFA',
        'lightslategray'=>'778899',
        'lightslategrey'=>'778899',
        'lightsteelblue'=>'B0C4DE',
        'lightyellow'=>'FFFFE0',
        'lime'=>'00FF00',
        'limegreen'=>'32CD32',
        'linen'=>'FAF0E6',
        'magenta'=>'FF00FF',
        'maroon'=>'8C373E',
		'magic purple'=>'7851a9',
        'mediumaquamarine'=>'66CDAA',
        'mediumblue'=>'0000CD',
        'mediumorchid'=>'BA55D3',
        'mediumpurple'=>'9370D0',
        'mediumseagreen'=>'3CB371',
        'mediumslateblue'=>'7B68EE',
        'mediumspringgreen'=>'00FA9A',
        'mediumturquoise'=>'48D1CC',
        'mediumvioletred'=>'C71585',
        'midnightblue'=>'191970',
        'mintcream'=>'F5FFFA',
        'mistyrose'=>'FFE4E1',
        'moccasin'=>'FFE4B5',
        'navajowhite'=>'FFDEAD',
        'navy'=>'000080',
		'navy blue'=>'000080',
        'oldlace'=>'FDF5E6',
        'olive'=>'808000',
        'olivedrab'=>'6B8E23',
        'orange'=>'FFA500',
		'orange yellow'=>'ffae42',
        'orangered'=>'FF4500',
        'orchid'=>'DA70D6',
        'palegoldenrod'=>'EEE8AA',
        'palegreen'=>'98FB98',
        'paleturquoise'=>'AFEEEE',
        'palevioletred'=>'DB7093',
        'papayawhip'=>'FFEFD5',
        'peachpuff'=>'FFDAB9',
        'peru'=>'CD853F',
        'pink'=>'F7969E',
        'plum'=>'DDA0DD',
        'powderblue'=>'B0E0E6',
        'purple'=>'800080',
        'red'=>'FF0000',
		'raspberry'=>'b3446c',
        'rosybrown'=>'BC8F8F',
        'royalblue'=>'4169E1',
		'red print'=>'ff0000',
		'rose'=>'ff007f',
		'rose lilac'=>'fba0e3',
		'rose print'=>'fbcce7',
		'royal blue'=>'4169e1',
		'sandalwood'=>'b4946c',
		'soft pink'=>'ffb6c1',
        'saddlebrown'=>'8B4513',
        'salmon'=>'FA8072',
        'sandybrown'=>'F4A460',
        'seagreen'=>'2E8B57',
        'seashell'=>'FFF5EE',
        'sienna'=>'A0522D',
        'silver'=>'C0C0C0',
        'sky blue'=>'87CEEB',
        'slateblue'=>'6A5ACD',
        'slategray'=>'708090',
        'slategrey'=>'708090',
        'snow'=>'FFFAFA',
        'springgreen'=>'00FF7F',
        'steelblue'=>'4682B4',
		'skin'=>'FED29C',
        'tan'=>'D2B48C',
        'teal'=>'008080',
        'thistle'=>'D8BFD8',
        'tomato'=>'FF6347',
        'turquoise'=>'40E0D0',
        'turquoise blue'=>'40e0d0',
        'violet'=>'EE82EE',
        'wheat'=>'F5DEB3',
        'white'=>'FFFFFF',
        'whitesmoke'=>'F5F5F5',
        'yellow'=>'FFDA29',
        'yellowgreen'=>'9ACD32');

    $color_name = strtolower($color_name);
    if (isset($colors[$color_name]))
    {
        return ('#' . $colors[$color_name]);
    }
    else
    {
        return ($color_name);
    }
}


if ( ! function_exists( 'woocommerce_form_field' ) ) {

  /**
   * Outputs a checkout/address form field.
   *
   * @subpackage  Forms
   * @param string $key
   * @param mixed $args
   * @param string $value (default: null)
   * @todo This function needs to be broken up in smaller pieces
   */
  function woocommerce_form_field( $key, $args, $value = null ) {
    $defaults = array(
      'type'              => 'text',
      'label'             => '',
      'description'       => '',
      'placeholder'       => '',
      'maxlength'         => false,
      'required'          => false,
      'autocomplete'      => false,
      'id'                => $key,
      'class'             => array(),
      'label_class'       => array('floating-item'),
      'input_class'       => array(),
      'return'            => false,
      'options'           => array(),
      'custom_attributes' => array(),
      'validate'          => array(),
      'default'           => '',
    );

    $args = wp_parse_args( $args, $defaults );
    $args = apply_filters( 'woocommerce_form_field_args', $args, $key, $value );

    if ( $args['required'] ) {
      // $args['class'][] = 'validate-required';
      $args['class'][] = '';
      $required = '';
    } else {
      $required = '';
    }

    $args['maxlength'] = ( $args['maxlength'] ) ? 'maxlength="' . absint( $args['maxlength'] ) . '"' : '';

    $args['autocomplete'] = ( $args['autocomplete'] ) ? 'autocomplete="' . esc_attr( $args['autocomplete'] ) . '"' : '';

    if ( is_string( $args['label_class'] ) ) {
      $args['label_class'] = array( $args['label_class'] );
    }

    if ( is_null( $value ) ) {
      $value = $args['default'];
    }

    // Custom attribute handling
    $custom_attributes = array();

    if ( ! empty( $args['custom_attributes'] ) && is_array( $args['custom_attributes'] ) ) {
      foreach ( $args['custom_attributes'] as $attribute => $attribute_value ) {
        $custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
      }
    }

    if ( ! empty( $args['validate'] ) ) {
      foreach( $args['validate'] as $validate ) {
        $args['class'][] = 'validate-' . $validate;
      }
    }

    $field = '';
    $label_id = $args['id'];
    $field_container = '<div class="form-row %1$s" id="%2$s">%3$s</div>';

switch ( $args['type'] ) {
      case 'country' :

        $countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries();

        if ( 1 === sizeof( $countries ) ) {

            $field .= '<div><input type="text" class="input-text floating-item-input input-item ' . esc_attr( implode( ' ', $args['input_class'] ) ) .'"  id="defautl_country" placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . $args['maxlength'] . ' ' . $args['autocomplete'] . ' value="India" ' . implode( ' ', $custom_attributes ) . '  readonly /></div>';

          $field .= '<input type="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="' . current( array_keys($countries ) ) . '" ' . implode( ' ', $custom_attributes ) . ' class="country_to_state select-menu" />';

        } else {

          $field .= '<div><input type="' . esc_attr( $args['type'] ) . '" class="input-text floating-item-input input-item ' . esc_attr( implode( ' ', $args['input_class'] ) ) .'" name="' . esc_attr( $key ) . '" id="select_state" placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . $args['maxlength'] . ' ' . $args['autocomplete'] . ' value="India" ' . implode( ' ', $custom_attributes ) . '  readonly /></div>';


        }
        break;

         case 'state' :
        $countyArray = ["Andra Pradesh", "Arunachal Pradesh","Assam","Bihar","Chhattisgarh","Goa","Gujarat","Haryana","Himachal Pradesh","Jammu and Kashmir","Jharkhand","Karnataka","Kerala","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Orissa","Punjab","Rajasthan","Sikkim","Tamil Nadu","Tripura","Uttaranchal","Uttar Pradesh","West Bengal","Andaman and Nicobar Islands","Chandigarh","Dadar and Nagar Haveli","Daman and Diu","Delhi","Lakshadeep","Pondicherry"];
        $field .= '<div class="form-row select-row"> <select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="select-menu " data-placeholder="STATE">
                          <option value="">Click to select State</option>';
 foreach ($countyArray as $countykey => $county) {
            $field .= '<option value="' . esc_attr( $county ) . '" ' . selected( $value, $countykey, false ) . '>' . $county . '</option>';
          }
          $field .= '</select>';
          $field .= '</div>';
        break;
      case 'textarea' :

        $field .= '<div class="floating-item"><textarea name="' . esc_attr( $key ) . '" class="floating-item-input input-item  input-email-active' . esc_attr( implode( ' ', $args['input_class'] ) ) .'" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . $args['maxlength'] . ' ' . $args['autocomplete'] . ' ' . ( empty( $args['custom_attributes']['rows'] ) ? ' rows="5"' : '' ) . ( empty( $args['custom_attributes']['cols'] ) ? ' ' : '' ) . implode( ' ', $custom_attributes ) . '>'. esc_textarea( $value  ) .'</textarea></div>';

        break;
      case 'checkbox' :

        $field = '<label class="checkbox ' . implode( ' ', $args['label_class'] ) .'" ' . implode( ' ', $custom_attributes ) . '>
            <input type="' . esc_attr( $args['type'] ) . '" class="input-checkbox ' . esc_attr( implode( ' ', $args['input_class'] ) ) .'" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="1" '.checked( $value, 1, false ) .' /> '
             . $args['label'] . $required . '</label>';

        break;
      //case 'password' :

      case 'email' :
      $field .= '<div class= "floating-item"><input type="' . esc_attr( $args['type'] ) . '" class="input-text floating-item-input input-item validate' . esc_attr( implode( ' ', $args['input_class'] ) ) .'" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . $args['maxlength'] . ' ' . $args['autocomplete'] . ' value="' . esc_attr( $value ) . '" ' . implode( ' ', $custom_attributes ) . ' /></div>';
      break;
      // case 'tel' :
      // case 'number' :
      case 'text' :
        $field .= '<div class= "floating-item"><input type="' . esc_attr( $args['type'] ) . '" class="input-text floating-item-input input-item  ' . esc_attr( implode( ' ', $args['input_class'] ) ) .'" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . $args['maxlength'] . ' ' . $args['autocomplete'] . ' value="' . esc_attr( $value ) . '" ' . implode( ' ', $custom_attributes ) . ' /></div>';

        break;




         case 'tel' :
      case 'number' :

        $field .= '<div class= "floating-item"><input type="text" class="input-text floating-item-input input-item validate' . esc_attr( implode( ' ', $args['input_class'] ) ) .'" onkeypress="return isNumber(event)" maxlength="12" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="' . esc_attr( $value ) . '" ' . implode( ' ', $custom_attributes ) . ' /></div>';

        break;



      case 'select' :

        $options = $field = '';

        if ( ! empty( $args['options'] ) ) {
          foreach ( $args['options'] as $option_key => $option_text ) {
            if ( '' === $option_key ) {
              // If we have a blank option, select2 needs a placeholder
              if ( empty( $args['placeholder'] ) ) {
                $args['placeholder'] = $option_text ? $option_text : __( 'Choose an option', 'woocommerce' );
              }
              $custom_attributes[] = 'data-allow_clear="true"';
            }
            $options .= '<option value="' . esc_attr( $option_key ) . '" '. selected( $value, $option_key, false ) . '>' . esc_attr( $option_text ) .'</option>';
          }

          $field .= '<div class="floating-item"><select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class=" select '. esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . $args['autocomplete'] . '>
              ' . $options . '
            </select></div>';
        }

        break;
      case 'radio' :

        $label_id = current( array_keys( $args['options'] ) );

        if ( ! empty( $args['options'] ) ) {
          foreach ( $args['options'] as $option_key => $option_text ) {
            $field .= '<input type="radio" class="input-radio ' . esc_attr( implode( ' ', $args['input_class'] ) ) .'" value="' . esc_attr( $option_key ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '"' . checked( $value, $option_key, false ) . ' />';
            $field .= '<label for="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '" class="radio ' . implode( ' ', $args['label_class'] ) .'">' . $option_text . '</label>';
          }
        }

        break;
    }
    if ( ! empty( $field ) ) {
        $field_html = '';

        if ( $args['label'] && 'checkbox' !== $args['type'] ) {
          $field_html .= '<label for="' . esc_attr( $label_id ) . '" class="' . esc_attr( implode( ' ', $args['label_class'] ) ) . '">';
        }

        $field_html .= $field.'<span class="floating-item-label">'.$args['label'] . $required;

        if ( $args['description'] ) {
          $field_html .= '<span class="description" id="' . esc_attr( $args['id'] ) . '-description" aria-hidden="true">' . wp_kses_post( $args['description'] ) . '</span>';
        }

        $field_html .= '</span></label>';

        $container_class = esc_attr( implode( ' ', $args['class'] ) );
        $container_id    = esc_attr( $args['id'] ) . '_field';
        $field           = sprintf( $field_container, $container_class, $container_id, $field_html );
      }

      /**
       * Filter by type.
       */
      $field = apply_filters( 'woocommerce_form_field_' . $args['type'], $field, $key, $args, $value );

      /**
       * General filter on form fields.
       *
       * @since 3.4.0
       */
      $field = apply_filters( 'woocommerce_form_field', $field, $key, $args, $value );
    // $field = apply_filters( 'woocommerce_form_field_' . $args['type'], $field, $key, $args, $value );

    if ( $args['return'] ) {
      return $field;
    } else {
      echo $field;
    }
  }
}

function clean_checkout_fields_class_attribute_values( $field, $key, $args, $value ){
    if( is_checkout() ){
        // remove "form-row"
        $field = str_replace( array('<p class="form-row ', '<p class="form-row'), array('<p class="', '<p class="'), $field);
    }

    return $field;
}



add_action('wp_ajax_tfs_update_total_price', 'update_total_price');
add_action('wp_ajax_nopriv_tfs_update_total_price', 'update_total_price');
function update_total_price() {

    // Skip product if no updated quantity was posted or no hash on WC_Cart
    if( !isset( $_POST['hash'] ) || !isset( $_POST['quantity'] ) ){
        exit;
    }

    $cart_item_key = $_POST['hash'];

    if( !isset( WC()->cart->get_cart()[ $cart_item_key ] ) ){
        exit;
    }

    $values = WC()->cart->get_cart()[ $cart_item_key ];

    $_product = $values['data'];

    // Sanitize
    $quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( "/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT)) ), $cart_item_key );

    if ( '' === $quantity || $quantity == $values['quantity'] )
        exit;

    // Update cart validation
    $passed_validation  = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $values, $quantity );

    // is_sold_individually
    if ( $_product->is_sold_individually() && $quantity > 1 ) {
        wc_add_notice( sprintf( __( 'You can only have 1 %s in your cart.', 'woocommerce' ), $_product->get_title() ), 'error' );
        $passed_validation = false;
    }

    if ( $passed_validation ) {
        WC()->cart->set_quantity( $cart_item_key, $quantity, false );
    }

    // Recalc our totals
    WC()->cart->calculate_totals();
    woocommerce_cart_totals();
    exit;
}

function get_variation_data_from_variation_id( $itemId ) {
    $_product = new WC_Product_Variation( $itemId );
    $variationData = $_product->get_variation_attributes();
    $variationDetail = woocommerce_get_formatted_variation( $variationData, true );  // this will give all variation detail in one line
    return $variationDetail; // $variation_detail will return string containing variation detail which can be used to print on website
}
function remove_item_from_cart() {
     $cart = WC()->instance()->cart;
    $cartId = $_POST['cartItemKey'];
    $cartItemId = $cart->find_product_in_cart($cartId);
    if ($cartItemId) {
        $cart->set_quantity($cartItemId, 0);
        echo do_shortcode( '[woocommerce_cart]' );
    }
    // echo do_shortcode( '[woocommerce_cart]' );
    exit;
}
add_action('wp_ajax_remove_item_from_cart', 'remove_item_from_cart');
add_action('wp_ajax_nopriv_remove_item_from_cart', 'remove_item_from_cart');


// REMOVE POST META BOXES
function remove_my_post_metaboxes() {
remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Status Metabox
remove_meta_box( 'commentsdiv','post','normal' ); // Comments Metabox
remove_meta_box( 'postcustom','post','normal' ); // Custom Fields Metabox
remove_meta_box( 'postexcerpt','post','normal' ); // Excerpt Metabox
remove_meta_box( 'revisionsdiv','post','normal' ); // Revisions Metabox
remove_meta_box( 'trackbacksdiv','post','normal' ); // Trackback Metabox
}
add_action('admin_menu','remove_my_post_metaboxes');

/*Remove Default posttypes posts*/
        add_action('admin_menu','remove_default_post_type');

        function remove_default_post_type() {
            remove_menu_page('edit.php');
        }


add_filter('default_page_template_title', function() { return __('Subpage', 'your_text_domain'); });

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

add_filter( 'woocommerce_default_address_fields' , 'custom_get_default_address_fields' );
function custom_get_default_address_fields() {
        $fields = array(
            'first_name' => array(

                'label'    => __( 'FIRST NAME', 'woocommerce' ),
                'type'     => 'text',
                'label_class'    => array( 'floating-item' ),
                'custom_attributes' => array( "maxlength" => "75" ,"onkeypress" => "return onlyAlphabets(event, this)"  ),
                'required' => true,
            ),
           
            'last_name' => array(
                'label'    => __( 'LAST NAME', 'woocommerce' ),
                'required' => true,
                'class'    => array( 'floating-item' ),
                 'input_class'       => array( ' validate'),
                'custom_attributes' => array( "maxlength" => "75" ,"onkeypress" => "return onlyAlphabets(event, this)"  ),
                'clear'    => true
            ),
             
            'address_1' => array(
                'label'       => __( 'ADDRESS LINE 1', 'woocommerce' ),
                'type'     => 'text',
                'required'    => true,
                'input_class'       => array( ' validate'),
                'class'       => array( 'floating-item', 'address-field' )
            ),
           'address_2' => array(
                'label'       => __( 'ADDRESS LINE 2 (OPTIONAL)', 'woocommerce' ),
                'type'     => 'text',
                //'required'    => true,
                'input_class'       =>array( 'non-mandatory'),
                'class'       => array( 'floating-item', 'address-field')
            ),

            'city' => array(
                'label'       => __( 'CITY', 'woocommerce' ),
                'required'    => true,
                'class'       => array( 'floating-item', 'address-field' ),
                'input_class'       => array( 'validate'),
                'custom_attributes' => array("onkeypress" => "return onlyAlphabets(event, this)"  ),
            ),

            'postcode' => array(
                'label'       => __( 'POSTCODE ', 'woocommerce' ),
                'required'    => true,
                'class'       => array( 'floating-item validate', 'address-field' ),
                'input_class'       => array( 'validate'),
                'custom_attributes' => array("maxlength" => "6" ,"onkeypress" => "return isNumber(event)" ),
            ),

            'state' => array(
                // 'label'       => __( 'STATE (Optional)', 'woocommerce' ),
                'type'        => 'state',
                'required'    => true,
                'class'       => array( 'floating-item', 'address-field' ),
                'input_class'       =>array( 'non-mandatory'),
                'custom_attributes' => array("onkeypress" => "return blockSpecialChar(event)"  ),
            ),


                'country' => array(
                 'label'    => __( 'COUNTRY', 'woocommerce' ),
                'type'     => 'country',
                'required' => true,
                'custom_attributes' => array("onkeypress" => "return blockSpecialChar(event)"  ),
            ),

                'phone' => array(
                'label'    => __( 'TELEPHONE', 'woocommerce' ),
                'type'     => 'number',
                'required' => true,
                'input_class'       => array( 'validate'),
                'custom_attributes' => array( "maxlength" => "15" ,"onkeypress" => "return isNumber(event)"),
                'clear'    => true
            ),
        
        );
        return $fields;
    }



/*****After Logout redirections****/
add_action('wp_logout','logout_redirect');

function logout_redirect(){

    wp_redirect( home_url() );

    exit;

}

/***View order page thumbnail****/
add_filter( 'woocommerce_order_item_name', 'display_product_image_in_order_item', 20, 3 );
function display_product_image_in_order_item( $item_name, $item, $is_visible ) {
    // Targeting view order pages only
    if( is_wc_endpoint_url( 'view-order') || is_wc_endpoint_url( 'order-received') ) {
        $product   = $item->get_product(); // Get the WC_Product object (from order item)
        $thumbnail = $product->get_image(array( 77, 100)); // Get the product thumbnail (from product object)
        if( $product->get_image_id() > 0 )
            $item_name = '<a>' . $thumbnail . '</a>' . $item_name;
    }
    return $item_name;
}

/***order page pagination****/
add_filter( 'woocommerce_my_account_my_orders_query', 'custom_my_account_orders', 10, 1 );

function custom_my_account_orders( $args ) {
    $args['posts_per_page'] = 30;
    return $args;
}
/****
* Rewrite URL of products
*/
add_filter( 'rewrite_rules_array', function( $rules ) {
  $new_rules = array();
  $terms = get_terms( array(
    'taxonomy'   => 'product_cat',
    'post_type'  => 'product',
    'hide_empty' => false,
  ));
  if ( $terms && ! is_wp_error( $terms ) ) {
    $siteurl = esc_url( home_url( '/' ) );
    foreach ( $terms as $term ) {
      $term_slug = $term->slug;
      $baseterm = str_replace( $siteurl, '', get_term_link( $term->term_id, 'product_cat' ) );
      // rules for a specific category
      $new_rules[$baseterm .'?$'] = 'index.php?product_cat=' . $term_slug;
      // rules for a category pagination
      $new_rules[$baseterm . '/page/([0-9]{1,})/?$' ] = 'index.php?product_cat=' . $term_slug . '&paged=$matches[1]';
      $new_rules[$baseterm.'(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?product_cat=' . $term_slug . '&feed=$matches[1]';
    }
  }

  return $new_rules + $rules;
} );

/**
 * Flush rewrite rules when create new term
 * need for a new product category rewrite rules
 */
function imp_create_term() {
  flush_rewrite_rules(false);;
}
add_action( 'create_term', 'imp_create_term' );

add_filter( 'woocommerce_product_single_add_to_cart_text', 'custom_single_add_to_cart_text' );
function custom_single_add_to_cart_text() {
    return 'ADD TO BAG';
}

/********************
To Get secondary image for product
********************/
 add_theme_support('MultiPostThumbnails');
   if (class_exists('MultiPostThumbnails')) 
   {
  new MultiPostThumbnails(array(
      'label' => 'Secondary Featured Image',
      'id' => 'secondary-image',
      'post_type' => 'product'
          ));
  }
// if(is_wc_endpoint_url( 'order-pay' )) {
//     wp_enqueue_script('script', 'custom.js', array('jquery'), 1.1, true);
// }

// function aasort (&$array, $key) {
//     $sorter=array();
//     $ret=array();
//     reset($array);
//     foreach ($array as $ii => $va) {
//         $sorter[$ii]=$va[$key];
//     }
//     asort($sorter);
//     foreach ($sorter as $ii => $va) {
//         $ret[$ii]=$array[$ii];
//     }
//     $array=$ret;
// }



?>

