<?php 
/*******
Template Name:Ajax cart
*******/
global $woocommerce;
session_start();
?>
<div id="error" style="display:none;">
<?php wc_print_notices(); 
?>
</div>
<?php echo wc_clear_notices(); ?>
<div id="woocart">
  <?php echo apply_filters('the_content',wpautop($post->post_content)); ?>
</div>
<script type="text/javascript">
	    var testtt= "<?php  echo $amount2 = floatval( preg_replace( '#[^\d.]#', '', $woocommerce->cart->get_cart_total() ) ); ?>";
    (function($){

      $(document).ready(function(){
         if (testtt>40) {
          $('.woocommerce-shipping-totals.shipping #shipping_method li:nth-child(2)').hide();
        }else{
                    $('.woocommerce-shipping-totals.shipping #shipping_method li:nth-child(2)').show();

        }
      });
    })(jQuery);
</script>