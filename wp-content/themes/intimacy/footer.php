<!-- Footer section starts here -->
<div class="scroll-top"><a href="#" class="scroll-btn no-effect"><i class="fa fa-chevron-up" aria-hidden="true"></i></a></div>
<footer>
    <div class="container">
        <div class="row">
    <?php
        if ( $footer = get_page_by_path( 'footer', OBJECT, 'page' ) ){
            $footerCont = apply_filters('the_content', $footer->post_content);
          ?>
          <?php echo $footerCont; ?>
        <?php } ?>
        </div>
    </div>
</footer>
<!-- Footer section ends here -->
  </div>
    </div>
</div>
<script type="text/javascript">


( function( window ) {

'use strict';
function classReg( className ) {
return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
hasClass = function( elem, c ) {
  return elem.classList.contains( c );
};
addClass = function( elem, c ) {
  elem.classList.add( c );
};
removeClass = function( elem, c ) {
  elem.classList.remove( c );
};
}
else {
hasClass = function( elem, c ) {
  return classReg( c ).test( elem.className );
};
addClass = function( elem, c ) {
  if ( !hasClass( elem, c ) ) {
    elem.className = elem.className + ' ' + c;
  }
};
removeClass = function( elem, c ) {
  elem.className = elem.className.replace( classReg( c ), ' ' );
};
}

function toggleClass( elem, c ) {
var fn = hasClass( elem, c ) ? removeClass : addClass;
fn( elem, c );
}

var classie = {
// full names
hasClass: hasClass,
addClass: addClass,
removeClass: removeClass,
toggleClass: toggleClass,
// short names
has: hasClass,
add: addClass,
remove: removeClass,
toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
// AMD
define( classie );
} else {
// browser global
window.classie = classie;
}

})( window );
	
</script>
<script type="text/javascript">
  var cartUrl="http://uat.intimacy.co.in/cart/";

	
</script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/app.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/wow.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/custom.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/validation.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/filter.js"></script>
<script>
$(document).ready(function(){

$('.addaddress_form label').removeClass('floating-item');
});

</script>
<?php if(is_wc_endpoint_url('order-pay')){
?>

<script type="text/javascript">
  $(document).ready(function(){
	$('body').addClass('loader');
	  //$(".loader").show();
	  $(document).find('#submit_payu_in_payment_form').trigger("click");
  });
</script>
<?php
} 

?>
<?php if(is_wc_endpoint_url('order-received')){
?>

<script type="text/javascript">
  $(document).ready(function(){
$('.woocommerce').parents('.row').removeClass('row');
  });
</script>
<?php
} 

?>
<?php wp_footer(); ?>
</body>
</html>
