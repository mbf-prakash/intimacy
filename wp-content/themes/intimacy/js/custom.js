 function isValidEmailAddress(r) {
    var e = RegExp(/^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i);
    return e.test(r)
}
/*Telephone validation*/
function isNumber(elementRef) {  
    keyCode=elementRef.charCode;
    // var keyCode = (event.which) ? event.which : (window.event.keyCode) ?    window.event.keyCode : -1;  
    // console.log(keyCode);
    if ((keyCode >= 48) && (keyCode <= 57) || (keyCode <= 32)) {  
        return true;  
    }  else if (keyCode == 43) {  
        if (jQuery('#'+elementRef.target.id).val().trim().length == 0){  
            return true;  
        } else {
            return false;  
        }
    }  
    return false;  
}  
function colourNameToHex(colour)
{
    var colours = {"aliceblue":"#f0f8ff","antiquewhite":"#faebd7","aqua":"#00ffff","aquamarine":"#7fffd4","azure":"#f0ffff",
    "beige":"#f5f5dc","bisque":"#ffe4c4","black":"#000000","blanchedalmond":"#ffebcd","blue":"#0000ff","blueviolet":"#8a2be2","brown":"#a52a2a","burlywood":"#deb887",
    "cadetblue":"#5f9ea0","chartreuse":"#7fff00","chocolate":"#d2691e","coral":"#ff7f50","cornflowerblue":"#6495ed","cornsilk":"#fff8dc","crimson":"#dc143c","cyan":"#00ffff",
    "darkblue":"#00008b","darkcyan":"#008b8b","darkgoldenrod":"#b8860b","darkgray":"#a9a9a9","darkgreen":"#006400","darkkhaki":"#bdb76b","darkmagenta":"#8b008b","darkolivegreen":"#556b2f",
    "darkorange":"#ff8c00","darkorchid":"#9932cc","darkred":"#8b0000","darksalmon":"#e9967a","darkseagreen":"#8fbc8f","darkslateblue":"#483d8b","darkslategray":"#2f4f4f","darkturquoise":"#00ced1",
    "darkviolet":"#9400d3","deeppink":"#ff1493","deepskyblue":"#00bfff","dimgray":"#696969","dodgerblue":"#1e90ff",
    "firebrick":"#b22222","floralwhite":"#fffaf0","forestgreen":"#228b22","fuchsia":"#ff00ff",
    "gainsboro":"#dcdcdc","ghostwhite":"#f8f8ff","gold":"#ffd700","goldenrod":"#daa520","gray":"#808080","green":"#008000","greenyellow":"#adff2f",
    "honeydew":"#f0fff0","hotpink":"#ff69b4",
    "indianred ":"#cd5c5c","indigo":"#4b0082","ivory":"#fffff0","khaki":"#f0e68c",
    "lavender":"#e6e6fa","lavenderblush":"#fff0f5","lawngreen":"#7cfc00","lemonchiffon":"#fffacd","lightblue":"#add8e6","lightcoral":"#f08080","lightcyan":"#e0ffff","lightgoldenrodyellow":"#fafad2",
    "lightgrey":"#d3d3d3","lightgreen":"#90ee90","lightpink":"#ffb6c1","lightsalmon":"#ffa07a","lightseagreen":"#20b2aa","lightskyblue":"#87cefa","lightslategray":"#778899","lightsteelblue":"#b0c4de",
    "lightyellow":"#ffffe0","lime":"#00ff00","limegreen":"#32cd32","linen":"#faf0e6",
    "magenta":"#ff00ff","maroon":"#800000","mediumaquamarine":"#66cdaa","mediumblue":"#0000cd","mediumorchid":"#ba55d3","mediumpurple":"#9370d8","mediumseagreen":"#3cb371","mediumslateblue":"#7b68ee",
    "mediumspringgreen":"#00fa9a","mediumturquoise":"#48d1cc","mediumvioletred":"#c71585","midnightblue":"#191970","mintcream":"#f5fffa","mistyrose":"#ffe4e1","moccasin":"#ffe4b5",
    "navajowhite":"#ffdead","navy":"#000080",
    "oldlace":"#fdf5e6","olive":"#808000","olivedrab":"#6b8e23","orange":"#ffa500","orangered":"#ff4500","orchid":"#da70d6",
    "palegoldenrod":"#eee8aa","palegreen":"#98fb98","paleturquoise":"#afeeee","palevioletred":"#d87093","papayawhip":"#ffefd5","peachpuff":"#ffdab9","peru":"#cd853f","pink":"#ffc0cb","plum":"#dda0dd","powderblue":"#b0e0e6","purple":"#800080",
    "rebeccapurple":"#663399","red":"#ff0000","rosybrown":"#bc8f8f","royalblue":"#4169e1",
    "saddlebrown":"#8b4513","salmon":"#fa8072","sandybrown":"#f4a460","seagreen":"#2e8b57","seashell":"#fff5ee","sienna":"#a0522d","silver":"#c0c0c0","skyblue":"#87ceeb","slateblue":"#6a5acd","slategray":"#708090","snow":"#fffafa","springgreen":"#00ff7f","steelblue":"#4682b4",
    "tan":"#d2b48c","teal":"#008080","thistle":"#d8bfd8","tomato":"#ff6347","turquoise":"#40e0d0",
    "violet":"#ee82ee",
    "wheat":"#f5deb3","white":"#ffffff","whitesmoke":"#f5f5f5",
    "yellow":"#ffff00","yellowgreen":"#9acd32"};

    if (typeof colours[colour.toLowerCase()] != 'undefined'){
        return colours[colour.toLowerCase()];
        console.log(colours);   
    }else{
        return colour;
    }


}
function removevoucher()
{
    var coup_val = $('#couponcodechk').val();
    $.ajax({
        url: templateUri + "/remove-coupon.php",
        type: 'POST',
        data: {couponvalue: coup_val},
        success: function (result) {
            console.log(result);
            var blogurl = blogUri+"/cartnew";
            $("#woocart").load(blogurl,function () {
                console.log('test');
            });

        }

    });
}

/*Name validation*/
function onlyAlphabets(e) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        }else if (e) {
            var charCode = e.which;
        } else { 
            return true; 
        }
        if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 32 || charCode==0 || charCode==8){
            return true;
        }else{
            return false;
        }
    }
    catch (err) {
        alert(err.Description);
    }
}
console.log($('.woocommerce-checkout').find('abbr').length);
$('.woocommerce-checkout').find('abbr').each(function(){
    $(this).remove();
})
function textboxchange() {
 $('.cart_item .formCol').each(function(){
    var textBoxVal = $(this).find('.textbox-small').val();
    if(textBoxVal>999){
     $(this).find('.textbox-left').attr('disabled', true);
   }else{
     $(this).find('.textbox-left').attr('disabled', false);
     if(textBoxVal<2){
       $(this).find('.textbox-right').attr('disabled', true);
     }else{        
     $(this).find('.textbox-right').attr('disabled', false);
     }
   }
 });
}
// $(document).click(function() {
//     $('.close-voucher').hide();
// });
/*textboxchange();
jQuery(document).on('click',".textbox-left",function(event){

    a = parseInt(jQuery(this).parents('.formCol').find('.textbox-small').val())-1;
    jQuery(this).parents('.formCol').find('.textbox-small').val(a);
    if(a>9999){
        jQuery(this).parents('.formCol').find('.textbox-right').attr('disabled', true);
    }else{
        jQuery(this).parents('.formCol').find('.textbox-right').attr('disabled', false);
        if(a<2){
            jQuery(this).parents('.formCol').find('.textbox-left').attr('disabled', true);
        }else{        
            jQuery(this).parents('.formCol').find('.textbox-left').attr('disabled', false);
        }
    }
});
jQuery(document).on('click',".textbox-left,.textbox-right",function(event){
    
        event.preventDefault();
        jQuery(event.target).parent('.preloadtd').find('#qty').val(jQuery(event.target).parent('.preloadtd').find('#dummyQty').val());
        jQuery(event.target).parent('.preloadtd').find('#qty').trigger('change');
    });
jQuery(document).on('click',".textbox-right",function(event){
    

        a = parseInt(jQuery(this).parents('.formCol').find('.textbox-small').val())+1;
        jQuery(this).parents('.formCol').find('.textbox-small').val(a);
        if(a<2){
            console.log('disabled');
            jQuery(this).parents('.formCol').find('.textbox-left').attr('disabled', true);
        }else{
            jQuery(this).parents('.formCol').find('.textbox-left').attr('disabled', false);
            if(a>9999){
                jQuery(this).parents('.formCol').find('.textbox-right').attr('disabled', true);
            }else{        
                jQuery(this).parents('.formCol').find('.textbox-right').attr('disabled', false);
            }
        }
    });


/*validate email with charCode*/
jQuery(document).on('keypress','#user_email,#email',function(e){
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        } else if (e) {
            var charCode = e.which;
        } else { return true; }
        if ((charCode > 63 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode > 47 && charCode < 58) || charCode==0 || charCode==8 || charCode==46 || charCode==45 || charCode==95){
            return true;
        } else {
            return false;
        }
    }
    catch (err) {
        alert(err.Description);
    }
});

function quantityonchange(prdid,e) {

// console.log(this);
// jQuery('.cart_minus').css('opacity','0.5');
// jQuery('.cart_plus').css('opacity','0.5');
// jQuery('.cart_minus').attr('disabled','disabled');
// jQuery('.cart_plus').attr('disabled','disabled');
// jQuery(e).next('.loaderDiv').children().show();

    var $this = e;
    console.log(e.name);
     $(document).find('.textbox-small').each(function(){
    var stock_left = parseInt($('#preload'+prdid).find('#dummyQty').val());
    var stock_qty = parseInt($('#preload'+prdid).find('#qty').attr('data-value'));
    var var_stock_qty = parseInt($('#preload'+prdid).find('#qty').attr('data-stk-val'));
    if(stock_qty == stock_left || var_stock_qty == stock_left){
    $('#preload'+prdid).find('.textbox-left').attr('disabled', true);

    }else{
    $('#preload'+prdid).find('.textbox-left').attr('disabled', false);        
    }
    var defqty = $(this).val();    
    if(defqty == 1){
    $(this).prev('.textbox-right').attr('disabled', true);
    }



    })
    /*
    var prdid = prdid
    var attrvalue   = jQuery(e).attr('name');
    var qty         = jQuery(e).val();
    
    qty             = jQuery(e).val(), qty > 0 || jQuery(e).val(1), jQuery(e).parent().find(".cart-preloader").fadeIn(), $("#updcartbut1").html('<input type="hidden" name="update_cart" value="Update Cart" />');*/
        var item_hash = e.name.replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
        var item_quantity = $this.value;
        var currentVal = parseFloat(item_quantity);
        console.log(currentVal);
        function qty_cart() {

            $.ajax({
                type: 'POST',
                url: blogUri + '/wp-admin/admin-ajax.php',
                data: {
                    action: 'qty_cart',
                    hash: item_hash,
                    quantity: currentVal
                },
                success: function(data) {

                    $( '#woocart' ).html(data);
                    $(document).find('.textbox-small').each(function(){
                     var stock_left = parseInt($('#preload'+prdid).find('#dummyQty').val());
                    var stock_qty = parseInt($('#preload'+prdid).find('#qty').attr('data-value'));
                    var var_stock_qty = parseInt($('#preload'+prdid).find('#qty').attr('data-stk-val'));
                    if(stock_qty == stock_left || var_stock_qty == stock_left){
                        $('#preload'+prdid).find('.textbox-left').attr('disabled', true);
                        
                    }else{
                        $('#preload'+prdid).find('.textbox-left').attr('disabled', false);        
                    }
                        var defqty = $(this).val();    
                        if(defqty == 1){
                            $(this).prev('.textbox-right').attr('disabled', true);
                        }
                        


                    })
                }
            });  

        }

        qty_cart();
}
$('.close-voucher').on('click',function(){
$('#coupon_code').val('');
});
// function quantityonchange(prdid,e) {


// jQuery('.cart_minus').css('opacity','0.5');
// jQuery('.cart_plus').css('opacity','0.5');
// // jQuery(e).next('.loaderDiv').children().show();

//     var $this = e;
//     var prdid = prdid
//     var attrvalue   = jQuery(e).attr('name');
//     var qty         = jQuery(e).val();
//     qty             = jQuery(e).val(), qty > 0 || jQuery(e).val(1), jQuery(e).parent().find(".cart-preloader").fadeIn(), $("#updcartbut1").html('<input type="hidden" name="update_cart" value="Update Cart" />');
//     var r = {
//         success: function() {

//             $("#woocart").load("cartnew/", function(e) {
//                 $('#loader'+prdid).fadeOut();
//                 $('#preload'+prdid).fadeIn();
//                 $('.preloadtd input').each(function() {
//                     textboxchange();
//                 });

                
//                   jQuery(".woocommerce-remove-coupon").appendTo(".apply-voucher").addClass('remove-voucher').text('Remove voucher').css({
//                     'display': 'block'
//                 });
//                 jQuery('.woocommerce-remove-coupon').slice(1).remove();
//                 if ($(e).filter("#error").html().trim().length > 0 && !(e.indexOf('Cart updated.') != -1)) {
//                     $('.preloadtd input').each(function() {
//                         var thisattrval = $(this).attr('name');
//                         var thisattr = $(this);
//                         if (attrvalue == thisattrval) {
//                             $('<div class="out-of-stock"> Out of stock</div>').insertAfter(jQuery(this).parent('.preloadtd'));
//                             jQuery(this).parent('.preloadtd').fadeOut(function() {
//                                 jQuery(this).parent('.formCol').find('.out-of-stock').fadeIn();
//                             });
//                             setTimeout(function() {
//                                 jQuery('.out-of-stock').fadeOut(function() {
//                                     thisattr.parent('.preloadtd').fadeIn(function() {
//                                         thisattr.val(1).trigger('change');
//                                     });
//                                 });
//                             }, 3000);
//                         }
//                     });
//                 }
//             });
//             /*setTimeout(function() {
//                 country_refresh();
//                 setTimeout(function() {
//                     jQuery('.preloadtd').css('opacity', '1');
//                     textboxchange();
//                 }, 300);
//             }, 1000);*/
//             jQuery('#loader').hide();
//             // jQuery('.cart_minus').css('opacity','1');
//             // jQuery('.cart_plus').css('opacity','1');
//             // jQuery('.cart_minus').removeAttr('disabled');
//             // jQuery('.cart_plus').removeAttr('disabled');


//         }
//     };
//     $("#cartform").ajaxSubmit(r);
// }
function qtyprdchange(qty){
    var product_id = $(document).find('#product_id').val();
    var variation_id = $(document).find('#variation_id').val();
    var quantity = qty; 
    $.ajax({
        url: blogUri + '/wp-admin/admin-ajax.php',
        method: "POST",
        data: {action: "proddet_prc" , variation_id:variation_id, product_id:product_id, quantity:quantity},
        success: function (data) {
            console.log(variation_id);
            if(data!=''){
                var prod = data.split('|');
                var prod_type = prod[0];
                var prod_tot = prod[1];
                console.log(prod_type == 'variation');
                if(prod_type == 'variation'){
                    $(document).find('.product-cost').hide();
                 $(document).find('#var-prod').css('display','block');   
                 $(document).find('#var-prod').html('<strong>Â£'+prod_tot+'</strong>');
                }else
                 if(prod_type == 'simple'){
                 $(document).find('#var-prod').css('display','block');   
                 $(document).find('#var-prod').html('<strong>Â£'+prod_tot+'</strong>');
                 $(document).find('.simple').hide();
                }
            }
        }
    });
}

$('#qtyprod-right').on('click', function () { 
    var qty_rght = parseInt($('#qtyprod').val()) - 1;
    qtyprdchange(qty_rght);
});
$('#qtyprod-left').on('click', function () { 
    var qty_left = parseInt($('#qtyprod').val()) + 1 ;
    qtyprdchange(qty_left);
});
// function quantityonchange(e) {
//     var $this = e;
//     var attrvalue = jQuery(e).attr('name');
//     var qty = jQuery(e).val();
//     console.log(qty);
//     // qty = jQuery(e).val(), qty > 0 || jQuery(e).val(1), jQuery(e).parent().find(".cart-preloader").fadeIn(), $("#updcartbut1").html('<input type="hidden" name="update_cart" value="Update Cart" />');
//     /*console.log(qty);*/
//     var r = {
//         success: function() {
//             $("#woocart").load("cartnew/", function(e) {
//                 // $('.preloadtd input').each(function(){
//                 //     textboxchange();
//                 // });
//                 // jQuery(".woocommerce-remove-coupon").appendTo(".apply-voucher").addClass('remove-voucher').text('Remove voucher').css({'display':'block'});
//                 // jQuery('.woocommerce-remove-coupon').slice(1).remove(); 
//                 // // jQuery(".discount-wrapper").hide();
//                 // if($(e).filter("#error").html().trim().length > 0){
//                 //     $('.preloadtd input').each(function(){
//                 //         var thisattrval = $(this).attr('name');
//                 //         var thisattr = $(this);
//                 //         if(attrvalue == thisattrval){
//                 //             $('<div class="out-of-stock"> Out of stock</div>').insertAfter(jQuery(this).parent('.preloadtd'));
//                 //             jQuery(this).parent('.preloadtd').fadeOut(function(){
//                 //                 jQuery(this).parent('.formCol').find('.out-of-stock').fadeIn();
//                 //             });
//                 //             setTimeout(function(){
//                 //                 jQuery('.out-of-stock').fadeOut(function()
//                 //                     {
//                 //                         thisattr.parent('.preloadtd').fadeIn(function()
//                 //                             {
//                 //                                 thisattr.val(1).trigger('change');
//                 //                             });
//                 //                     });
                                
//                 //             },3000);
                            
//                 //         }
//                 //     });
//                 // }
//                 // else{
//                 //  preloadtd.fadeIn();
//                 // }
//             });
//         }
//     };
//     $("#cartform").ajaxSubmit(r)
// }
function loadAfterAjax(){  
$('.collection-slider').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 840,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 400,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
}
jQuery(document).ready(function() {
$('.cart-hidetr').show();
var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
console.log(isMobile);
if (isMobile) {
$(document).one('touchmove' ,function(){
$('#ajaxLoader').show();
    var parentPage = $('#parentPage').val();
    console.log(parentPage);
    $.ajax({
        url: templateUri + '/ajax/ajax-new.php',
        method: "POST",
        data: {parent: parentPage, action: "home-loader"},
        success: function (data) {
            console.log()
            $('#homeajaxLoader').hide();
            $('#ajax-response').after(data);
            loadAfterAjax();
            $(window).trigger('resize');
            return false;
        }

    });

});

}else{
    /*$(window).one('scroll',function(){
$('#ajaxLoader').show();
    var parentPage = $('#parentPage').val();
    console.log(parentPage);
    $.ajax({
        url: templateUri + '/ajax/ajax-new.php',
        method: "POST",
        data: {parent: parentPage, action: "home-loader"},
        success: function (data) {
            console.log()
            $('#homeajaxLoader').hide();
            $('#ajax-response').after(data);
            loadAfterAjax();
            $(window).trigger('resize');
            return false;
        }

    });

}); */   
}
    jQuery('#billing_first_name_field').children('label').removeClass('floating-item');
   jQuery('#billing_last_name_field').children('label').removeClass('floating-item');
   // jQuery('#billing_email_field').children('label').removeClass('floating-item');
   jQuery('#account_password_field').children('label').removeClass('floating-item');
    jQuery('#select_state').parent('.floating-item').attr('data-error','Please enter your state');
    jQuery(this).find('.textbox-small').each(function(){

        var defqty = jQuery(this).val();
        console.log(defqty);
        if(defqty == 1){
            jQuery(this).prev('.textbox-right').attr('disabled', true);
        }
    })
        jQuery(document).on('click',".textbox-left",function(event){
            
            console.log(parseInt(jQuery(this).parents('.formCol').find('.textbox-small').length));
            a = parseInt(jQuery(this).parents('.formCol').find('.textbox-small').val())+1;


            // alert($('.product').find('.var_quantity').val());

            jQuery(this).parents('.formCol').find('.textbox-small').val(a);
            if(a>9999){
                jQuery(this).parents('.formCol').find('.textbox-left').attr('disabled', true);
            }else{
                jQuery(this).parents('.formCol').find('.textbox-left').attr('disabled', false);
                if(a<2){
                    jQuery(this).parents('.formCol').find('.textbox-right').attr('disabled', true);
                }else{        
                    jQuery(this).parents('.formCol').find('.textbox-right').attr('disabled', false);
                }
            }
        });

    jQuery(document).on('click',".textbox-right",function(event){
        
        a = parseInt(jQuery(this).parents('.formCol').find('.textbox-small').val())-1;
        jQuery(this).parents('.formCol').find('.textbox-small').val(a);
        if(a<2){
            jQuery(this).parents('.formCol').find('.textbox-right').attr('disabled', true);
        }else{
            jQuery(this).parents('.formCol').find('.textbox-right').attr('disabled', false);
            if(a>9999){
                jQuery(this).parents('.formCol').find('.textbox-left').attr('disabled', true);
            }else{        
                jQuery(this).parents('.formCol').find('.textbox-left').attr('disabled', false);
            }
        }
    });

    jQuery(document).on('click',".cart .textbox-left,.textbox-right",function(event){
        event.preventDefault();
        jQuery(event.target).parent('.preloadtd').find('#qty').val(jQuery(event.target).parent('.preloadtd').find('#dummyQty').val());
        
        jQuery(event.target).parent('.preloadtd').find('#qty').trigger('change');
    });
//  textboxchange();
    var headerHeight = $('header').outerHeight();
    jQuery('.tab-blk-inner li:first-child').addClass('current');
    if (jQuery(".variations_form").length>0) {
        var priceAttribute = $.parseJSON(jQuery(".variations_form").attr("data-product_variations"));
        if (priceAttribute != "") {
            display_price=priceAttribute[0]['display_price'].toString();
            if (display_price.indexOf('.') == -1) {
                display_price = display_price+".00";
            }
            console.log(display_price);
            priceSymbol=jQuery('.woocommerce-Price-currencySymbol').html();
            jQuery('.productdetail-content .woocommerce-Price-amount').html(priceSymbol+display_price);
        }
    }
    if($(window).width() < 640 ) {
        $(".price-mobile").text($(".product-cost").text());
    }
   // window.rippler =  $.ripple('.btn', {
   //      debug: true,
   //      multi: true,
   //      opacity: 0.15,
   //      color: "auto",
   //      duration: 1
   //  });
    jQuery('#billing_state_field .floating-item-label').text('');
    if($('.provider_new').length >0) {
    $(".provider_new").hide();
    window.setTimeout(function() {
            var e = [];
            $(".provider_new").show();
            $(".provider_new").slick("unslick"), jQuery(".provider_new div").remove(), jQuery("#woosvithumbs li").each(function() {
                e = '<div class="provider-zoom"><img src="' + jQuery(this).attr("data-src") + '" class="imageZoom"></div>', jQuery(".provider_new").append(e)
            }), 0 == e.length && (e = '<div><img src="' + jQuery("#woosvimain img").attr("src") + '"></div>', jQuery(".provider_new").append(e)), 
            $('.provider_new').slick({
               slidesToShow: 1,  
               dots: true,
               arrows: true,
                prevArrow: '<div class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i>   PREVIOUS</div>',
                nextArrow: '<div class="slick-next">NEXT   <i class="fa fa-chevron-right" aria-hidden="true"></i></div>'
             });
             if(!Modernizr.touch){
              $(".provider-zoom").on('hover mouseover', function(e) { 
                 e.preventDefault();
                var dataZoomImg = $(this).attr('data-zoom-image');
                var dataImg = $(this).attr('data-image');
                var mainImg = $('.slick-active .imageZoom');
                mainImg.attr('src',dataImg);
                // console.log(dataImg);
                // console.log(dataZoomImg);
                mainImg.data('zoom-image',dataZoomImg).elevateZoom({
                  zoomType : "inner",
                  cursor: "crosshair"
                }); 
             });
            }else{       
                var f = [];
                jQuery("#woosvithumbs li").each(function() {
                    f = '<div><img class="panzoom" src="' + jQuery(this).attr("data-src") + '"></div>', jQuery(".panzoom-blk").append(f)
                }), 0 == f.length && (f = '<div><img src="' + jQuery("#woosvimain img").attr("src") + '"></div>', jQuery(".panzoom-blk").append(f)),  0 == f.length && (f = '<div><img src="' + jQuery("#woosvimain img").attr("src") + '"></div>', jQuery(".panzoom-blk").append(f)), 
                $('.panzoom-blk').slick({
                   slidesToShow: 1,  
                   dots: true,
                   arrows: true,
                   prevArrow: '<div class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i>   PREVIOUS</div>',
                   nextArrow: '<div class="slick-next">NEXT   <i class="fa fa-chevron-right" aria-hidden="true"></i></div>'
                 });
            }
        }, 600);
    }
    /*allow only one space*/
    var lastkey;
    var ignoreChars = ' '+String.fromCharCode(0);
    jQuery(document).on('keypress','#first_name,#firstname,#billing_first_name,#billing_last_name,#account_first_name,#account_last_name,#last_name',function(e){
       e = e || window.event;
       var char = String.fromCharCode(e.charCode);
       if (ignoreChars.indexOf(char) == 0 && ignoreChars.indexOf(lastkey) == 0) {
           lastkey = char;
           return false;
       } else {
           lastkey = char;
           return true;
       }
    });

    jQuery('input').each(function(event) {
        if (jQuery(this).val().length == ""){
            jQuery(this).removeClass('input-email-active');
        }else{
            jQuery(this).addClass('input-email-active');
        }
    });
    // jQuery('#confirm_password').parents('.form-row').hide();
    // jQuery('#password').on('keyup',function(){    
    //     jQuery('#confirm_password').val(jQuery('#password').val());    
    // });
    if ("" == jQuery(".floating-item-input").val() ? jQuery(this).removeClass(".input-email-active") : jQuery(this).addClass(".input-email-active"), jQuery(".onmyclick").on("click", function() {
            return url = jQuery(this).attr("data-url"), void 0 != url ? (window.location.href = url, !1) : void 0
        }), "set" == localStorage.getItem("register") && (jQuery(".checkboxradio").hide(),jQuery(".theme-globalerror").hide(),jQuery( "#1place_order" ).trigger( "click" )), error = "Please enter your card details to make a payment", jQuery(".theme-globalerror").length > 0) {
        var e = jQuery(".theme-globalerror").html().indexOf(error); - 1 != e && jQuery(".theme-globalerror").hide()
    }
    0 != jQuery(".woocommerce-order-received").length && (jQuery(".col2-set").removeClass("col-xs-9"), jQuery(".col2-set").addClass("col-xs-12")), jQuery("#proceed_to_address").on("click", function() {
        var e = $("input[name=radio]:checked"),
            r = e.val();
        return 1 == r && (jQuery("form.login").fadeOut(), url = e.attr("data-url"), localStorage.setItem("register", "unset"), void 0 != url) ? (window.location.href = url, !1) : void 0
    }), jQuery(document.body).on("click", ".as_guest", function() {
        jQuery("form.login").fadeOut(), jQuery("#ordconf").removeClass("active"), jQuery("#proceed_to_address").fadeIn(), jQuery(".reg_global").fadeOut(), localStorage.setItem("register", "unset")
    }), jQuery(".register_checkout").on("click", function() {
        jQuery("form.login").fadeOut(), jQuery("#proceed_to_address").fadeOut(), jQuery(".reg_global").fadeIn(), jQuery(".checkout_submit").addClass("register_checkout_submit"), jQuery("#ordconf").addClass("active"), jQuery(".checkout_submit").removeClass("checkout_submit"), jQuery("#createaccount").trigger("click"), jQuery("#account_password").addClass("account_custom_password validate"), jQuery("#account_password").parents(".form-row").find(".floating-item ").attr("data-error", "Please enter a valid password"), jQuery("#account_password").removeAttr("id"), jQuery("div.create-account").show(), jQuery("#account_username").hide(), localStorage.setItem("register", "")
    }),
       //personal info 
[].slice.call( document.querySelectorAll('#update_account') ).forEach( function( bttn ) {
        new ProgressButton( bttn, {

        callback : function( instance ) {
        var progress = 0,
        interval = setInterval( function() {
            progress = Math.min( progress + Math.random() * 0.2);
            instance._setProgress( progress );
        }, 100);


        var regFname = $('#firstname').val();
        var regLname = $('#last_name').val();
        var regEmail = $("#email").val();
        var userid = $("#userid").val();
        var regex = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        var x=0;
      console.log(regFname);
      console.log(regLname);
      console.log(regEmail);
          var $input = $('.edit_form .valid_updateacc');
        var $inputVal = $input.val();
        $input.each(function() {
            var $thisValue = $(this).val().trim();
            var $errorText = $(this).parents('.form-row').find('label').attr('data-error');
            if ($thisValue.length == 0) {
                $(this).parents('.form-row').addClass('error-row');
                if ($(this).parents('.form-row').find('.error-message').length == 0) {

                    $('<div class="error-message">' + $errorText + '</div>').appendTo($(this).parents('.form-row')).slideDown();
                }
                x++;
            } else {
                $(this).parents('.form-row').removeClass('error-row');
                $(this).parents('.form-row').find('.error-message').remove();
            }
        });

      if (regFname=='' || regFname == undefined) {
       $('#error_name').parents('row').addClass('error-message');
       $('#error_name').text("Please enter your first name").show();
       x++;
      } else {
       $('#error_name').parents('row').removeClass('error-message');
       $('#error_name').hide();
      }

      if (regLname=='' || regLname == undefined) {
       $('#error_lname').parents('row').addClass('error-message');
       $('#error_lname').text("Please enter your last name").show();
       x++;
      } else {
       $('#error_lname').parents('row').removeClass('error-message');
       $('#error_lname').hide();
      }



      if (x==0) {

        currentRequest = $.ajax({
                type: "POST",
                url: templateUri+"/ajax/ajax-account.php",
                data: {action: "save_details",'userid':userid,'regFname': regFname,'regLname': regLname, 'regEmail': regEmail},
                beforeSend : function()    {           
                    if(currentRequest != null) {
                        currentRequest.abort();
                    }
                },
                success: function(data) {
                    setTimeout(function(){
                        progress = 1;
                        instance._setProgress( progress );
                        if( progress === 1 ) {
                            instance._stop(1);
                            clearInterval( interval );
                        }
                    }, 100);
                    if(data.trim()==1)
                    {   

                    } 
                    
                }
            });
      }
      else{       
            setTimeout(function(){
                progress = 1;
                instance._setProgress( progress );
                if( progress === 1 ) {
                    instance._stop(1);
                    clearInterval( interval );
                }
            }, 500  );
         }

        }
    }); 
}),


//update password

[].slice.call( document.querySelectorAll('#update_password') ).forEach( function( bttn ) {
        new ProgressButton( bttn, {

        callback : function( instance ) {
        var progress = 0,
        interval = setInterval( function() {
            progress = Math.min( progress + Math.random() * 0.2);
            instance._setProgress( progress );
        }, 100);

        var regCurrent = $('#password_current').val();
        var newPswd = $('#password').val();
        var confirmPswd = $('#confirm_password').val();
        var userid = $("#userid").val();
        var x = 0;
        var $input = $('.edit_form .valid_updatepass');
        var $inputVal = $input.val();
        $input.each(function() {
            var $thisValue = $(this).val().trim();
            var $errorText = $(this).parents('.form-row').find('label').attr('data-error');
            if ($thisValue.length == 0) {
                $(this).parents('.form-row').addClass('error-row');
                if ($(this).parents('.form-row').find('.error-message').length == 0) {

                    $('<div class="error-message">' + $errorText + '</div>').appendTo($(this).parents('.form-row')).slideDown();
                }
                x++;
            } else {
                $(this).parents('.form-row').removeClass('error-row');
                $(this).parents('.form-row').find('.error-message').remove();
            }
        });

         if(newPswd != confirmPswd) {
              $("#passwordmis-err").show();
              x++;
              }
              else{
                $("#passwordmis-err").hide();
              }

    
  if(newPswd == confirmPswd && newPswd !='' && confirmPswd != '' && x==0){
    
    $("#password-err2").hide();
      currentRequest = $.ajax({
                type: "POST",
                dataType: "text",
                url: templateUri+"/ajax/password-change.php",
                data: {action: "changed",'userid': userid,'password': confirmPswd },
                beforeSend : function()    {           
                    if(currentRequest != null) {
                        currentRequest.abort();
                    }
                },
                success: function(data) {
                    setTimeout(function(){
                        progress = 1;
                        instance._setProgress( progress );
                        if( progress === 1 ) {
                            instance._stop(1);
                            clearInterval( interval );
                        }
                    }, 100);
                    if(data.trim()==1)
                    {   
                    } 
                    
                }


            });
                    window.location.href = blogUri + "/sign-in";
        }else{       
                setTimeout(function(){
                progress = 1;
                instance._setProgress( progress );
                if( progress === 1 ) {
                    instance._stop(1);
                    clearInterval( interval );
                }
            }, 500);
         }


        }
    });
}),

        
        jQuery(document.body).on("click", ".register_checkout_submit", function() {
        e.preventDefault();
        return 0 == jQuery("#billing_first_name").val().length || 0 == jQuery("#billing_last_name").val().length || 0 ==  jQuery("#billing_postcode").val().length || 0 == jQuery("#billing_city").val().length || 0 == jQuery("#billing_address_1").val().length || 0 == jQuery("#billing_address_2").val().length || 0 == jQuery(".account_custom_password").val().length ? !1 : ( jQuery("#account_username").val(Email), jQuery(".checkout").submit(), void setTimeout(function() {
            error = "An account is already registered";
            var e = jQuery(".woocommerce-error").html().indexOf(error); - 1 == e ? (jQuery(".theme-globalerror").hide(),jQuery( "#1place_order" ).trigger( "click" ) ) : (jQuery(".theme-globalerror .container").html(jQuery(".woocommerce-error").html()), jQuery(".woocommerce-error").html(""), jQuery(".theme-globalerror").show())
        }, 1e3))
    }), jQuery(document.body).on("click", ".showlogin", function() {
        jQuery("#proceed_to_address").fadeOut(), jQuery("#ordconf").removeClass("active"), jQuery(".reg_global").fadeOut(), jQuery("form.login").fadeIn(), localStorage.setItem("register", "unset")
    }), $(document).on("click", ".checkout_submit", function(e) {
        var regFname = $('#billing_first_name').val();
        var regLname = $('#billing_last_name').val();
        var regPhone = $("#billing_phone").val();
        var regAddress = $("#billing_address_1").val();
        var regEmail = $("#billing_email").val();
        var regAddress2 = $("#billing_address_2").val();
        var regCity = $("#billing_city").val();
        var regPostcode = $("#billing_postcode").val();
        var x = 0;
        var $input = $('.checkout .floating-item-input.validate');
        var regex = /^[a-z0-9]([a-z0-9_\-\.]*)@([a-z0-9_\-\.]*)(\.[a-z]{2,3}(\.[a-z]{2}){0,2})$/i;
        var $inputVal = $input.val();
        $input.each(function() {
            var $thisValue = $(this).val().trim();
            var $errorText = $(this).parents('.form-row').find('label').attr('data-error');
            if ($thisValue.length == 0) {
                $(this).parents('.form-row').addClass('error-row');
                if ($(this).parents('.form-row').find('.error-message').length == 0) {

                    $('<div class="error-message">' + $errorText + '</div>').appendTo($(this).parents('.form-row')).slideDown();
                }
                console.log($(this).attr('id'));
                x++;
            } else {
                $(this).parents('.form-row').removeClass('error-row');
                $(this).parents('.form-row').find('.error-message').remove();
            }
        });
        if (regEmail != '') {
            if (!regex.test(regEmail)) {
                if ($('#email').parents('.form-row').find('.error-message').length == 0) {
                    $('#email').parents('.form-row').addClass('error-row');
                    $('<div class="error-message">Please enter a valid email address</div>').appendTo($('#billing_email').parents('.form-row')).fadeIn();
                } else {
                    $('#billing_email').parents('.form-row').removeClass('error-row');
                    $('.error-message').text('Please enter a valid email address').fadeIn();
                }
                x++;
            }
        }
        if (regPhone != '') {
            if (regPhone.length < 10) {
                $("#billing_phone").parents('.form-row').addClass('error-row');
                if ($("#billing_phone").parents('.form-row').find('.error-message').length == 0) {
                    $('<div class="error-message">Please enter a valid phone number</div>').appendTo($("#billing_phone").parents('.form-row')).slideDown();
                }
                x++;
            } else {
                $("#billing_phone").parents('.form-row').removeClass('error-row');
                $("#billing_phone").parents('.form-row').find('.error-message').remove();
            }
        }
        /* min 3 in fname*/
            if($('#billing_first_name').val().length < 3)
            {

                $('#billing_first_name').parents('.form-row').addClass('error-row');
                if ($('#billing_first_name').parents('.form-row').find('.error-message').length == 0) {
                    $('<div class="error-message">Please enter your first name</div>').appendTo($('#billing_first_name').parents('.form-row')).slideDown();
                } else {
                    $('#billing_first_name').parents('.form-row').find('.error-message').show();
                }
                        x++;
            } else {
                $('#billing_first_name').parents('.form-row').removeClass('error-row');
                $('#billing_first_name').parents('.form-row').find('.error-message').remove();
            }
            /* min 3 in fname*/

        if (x > 0) {
			            event.preventDefault();
            return false;
        } else {
            console.log('lll');
            $('.payment-chkout').css('display','none');
            $('.payg-select').css('display', 'block');
            // $('.open-test').css('display', 'block');
            // $('#order_review').css('display', 'block');
            // $('.woocommerce-billing-fields ').css('display', 'none');
            // $('.pay-remove').css('display', 'none');
            // $('.introtext').css('display', 'none');
            // $('#something').css('display', 'none');
                    // $( document ).find("#place_order").trigger( "click" );
                    return false;
        }
    }),

 $(document).on("click", ".checkout_submit", function(e) {
        var regFname = $('#billing_first_name').val();
        var regLname = $('#billing_last_name').val();
        var regPhone = $("#billing_phone").val();
        var regAddress = $("#billing_address_1").val();
        var regEmail = $("#billing_email").val();
        var regAddress2 = $("#billing_address_2").val();
        var regCity = $("#billing_city").val();
        var regPostcode = $("#billing_postcode").val();
        var x = 0;
        var $input = $('#formsection .floating-item-input.validate');
        var regex = /^[a-z0-9]([a-z0-9_\-\.]*)@([a-z0-9_\-\.]*)(\.[a-z]{2,3}(\.[a-z]{2}){0,2})$/i;
        var $inputVal = $input.val();
        $input.each(function() {
            var $thisValue = $(this).val().trim();
            var $errorText = $(this).parents('.form-row').find('label').attr('data-error');
            if ($thisValue.length == 0) {
                $(this).parents('.form-row').addClass('error-row');
                if ($(this).parents('.form-row').find('.error-message').length == 0) {

                    $('<div class="error-message">' + $errorText + '</div>').appendTo($(this).parents('.form-row')).slideDown();
                }
                console.log($(this).attr('id'));
                x++;
            } else {
                $(this).parents('.form-row').removeClass('error-row');
                $(this).parents('.form-row').find('.error-message').remove();
            }
        });
        if (regEmail != '') {
            if (!regex.test(regEmail)) {
                if ($('#email').parents('.form-row').find('.error-message').length == 0) {
                    $('#email').parents('.form-row').addClass('error-row');
                    $('<div class="error-message">Please enter a valid email address</div>').appendTo($('#billing_email').parents('.form-row')).fadeIn();
                } else {
                    $('#billing_email').parents('.form-row').removeClass('error-row');
                    $('.error-message').text('Please enter a valid email address').fadeIn();
                }
                x++;
            }
        }
        if (regPhone != '') {
            if (regPhone.length < 10) {
                $("#billing_phone").parents('.form-row').addClass('error-row');
                if ($("#billing_phone").parents('.form-row').find('.error-message').length == 0) {
                    $('<div class="error-message">Please enter a valid phone number</div>').appendTo($("#billing_phone").parents('.form-row')).slideDown();
                }
                x++;
            } else {
                $("#billing_phone").parents('.form-row').removeClass('error-row');
                $("#billing_phone").parents('.form-row').find('.error-message').remove();
            }
        }
        /* min 3 in fname*/
            if($('#billing_first_name').val().length < 3)
            {

                $('#billing_first_name').parents('.form-row').addClass('error-row');
                if ($('#billing_first_name').parents('.form-row').find('.error-message').length == 0) {
                    $('<div class="error-message">Please enter your first name</div>').appendTo($('#billing_first_name').parents('.form-row')).slideDown();
                } else {
                    $('#billing_first_name').parents('.form-row').find('.error-message').show();
                }
                        x++;
            } else {
                $('#billing_first_name').parents('.form-row').removeClass('error-row');
                $('#billing_first_name').parents('.form-row').find('.error-message').remove();
            }
            /* min 3 in fname*/

        if (x > 0) {
			            event.preventDefault();
            return false;
        } else {
            console.log('lll');
            $('.generic-container').css('display','none');
           
            $('.payment-chkout').css('display','none');
            $('.payg-select').css('display', 'block');
            // $('.open-test').css('display', 'block');
            // $('#order_review').css('display', 'block');
            // $('.woocommerce-billing-fields ').css('display', 'none');
            // $('.pay-remove').css('display', 'none');
            // $('.introtext').css('display', 'none');
            // $('#something').css('display', 'none');
                    // $( document ).find("#place_order").trigger( "click" );
                    return false;
        }
    }),
    jQuery( "#pay-paypal" ).on( "click", function() {
        $("#payment_method_cod").prop("checked", true);
        $( document ).find("#place_order").trigger( "click" );
  });
    jQuery( "#pay-stripe" ).on( "click", function() {
        $("#payment_method_payu_in").prop("checked", true);
        $( document ).find("#place_order").trigger( "click" );

  });
$(document).on("click", ".save_address", function(e) {
        var regFname = $('#billing_first_name').val();
        var regLname = $('#billing_last_name').val();
        var regPhone = $("#billing_phone").val();
        var regAddress = $("#billing_address_1").val();
        var regCity = $("#billing_city").val();
        var regPostcode = $("#billing_postcode").val();
	var regEmail = $("#billing_email").val();
	var regex = /^[a-z0-9]([a-z0-9_\-\.]*)@([a-z0-9_\-\.]*)(\.[a-z]{2,3}(\.[a-z]{2}){0,2})$/i;
        var x = 0;
        var $input = $('.addaddress_form .floating-item-input.validate');
        var $inputVal = $input.val();
        $input.each(function() {
            var $thisValue = $(this).val().trim();
            var $errorText = $(this).parents('.form-row').find('label').attr('data-error');
            if ($thisValue.length == 0) {
                $(this).parents('.form-row').addClass('error-row');
                if ($(this).parents('.form-row').find('.error-message').length == 0) {

                    $('<div class="error-message">' + $errorText + '</div>').appendTo($(this).parents('.form-row')).slideDown();
                }
                x++;
            } else {
                $(this).parents('.form-row').removeClass('error-row');
                $(this).parents('.form-row').find('.error-message').remove();
            }
        });

        if (regPhone != '') {
            if (regPhone.length < 10) {
                $("#billing_phone").parents('.form-row').addClass('error-row');
                if ($("#billing_phone").parents('.form-row').find('.error-message').length == 0) {
                    $('<div class="error-message">Please enter a valid phone number</div>').appendTo($("#billing_phone").parents('.form-row')).slideDown();
                }
                x++;
            } else {
                $("#billing_phone").parents('.form-row').removeClass('error-row');
                $("#billing_phone").parents('.form-row').find('.error-message').remove();
            }
        }
	 if (regEmail != '') {
           if (!regex.test(regEmail)) {
               if ($('#billing_email').parents('.form-row').find('.error-message').length == 0) {
                   $('#billing_email').parents('.form-row').addClass('error-row');
                   $('<div class="error-message">Please enter a valid email address</div>').appendTo($('#billing_email').parents('.form-row')).fadeIn();
               } else {
                   $('#billing_email').parents('.form-row').removeClass('error-row');
                   $('.error-message').text('Please enter a valid email address').fadeIn();
               }
               x++;
           }
       }
        /* min 3 in fname*/
            if($('#billing_first_name').val().length < 3)
            {

                $('#billing_first_name').parents('.form-row').addClass('error-row');
                if ($('#billing_first_name').parents('.form-row').find('.error-message').length == 0) {
                    $('<div class="error-message">Please enter your first name</div>').appendTo($('#billing_first_name').parents('.form-row')).slideDown();
                } else {
                    $('#billing_first_name').parents('.form-row').find('.error-message').show();
                }
                        x++;
            } else {
                $('#billing_first_name').parents('.form-row').removeClass('error-row');
                $('#billing_first_name').parents('.form-row').find('.error-message').remove();
            }
            /* min 3 in fname*/
            console.log(x);
        if (x > 0) {
            event.preventDefault();
            return false;

        } else {
                   
                    window.location.href = blogUri+"/add-address/";
                    return true;
        }
    })

}), jQuery("#tab-shopping li").on("click", function(e) {
        return url = jQuery(this).attr("data-url"), void 0 != url ? (window.location.href = url, e.preventDefault(), !1) : void 0
    }), jQuery("._custom-submit-sign-in").on("click", function() {
        var e = jQuery("#username").val(),
            r = jQuery("#password").val();
        return $.ajax({
            type: "GET",
            url: blogUri + "/ajax-submit",
            data: {
                username: e,
                password: r
            }
        }).done(function(t) {
            return 0 == t ? (jQuery(".custom-submit-sign-in").trigger("click"), !0) : "" != e && "" != r ? ($("#invalid-values").remove(), $('<div class="error-message" id="invalid-values">Please check your email and password</div>').insertAfter($("#password").parents(".form-row")).show(), !1) : void 0
        }), !1
    })

/*$( document ).on( 'change', '#qty', function() {
    var qty = $( this ).val();
    var currentVal  = parseFloat(qty);

    // $( 'div.cart_totals' ).block({ message: null, overlayCSS: { background: '#fff url(' + wc_cart_params.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6 } });

    var data = {
        action: 'tfs_update_total_price',
        security: rf_cart_params.rf_update_total_price_nonce,
        quantity: currentVal
    };

    $.post( rf_cart_params.ajax_url, data, function( response ) {

        $( 'div.cart_totals' ).replaceWith( response );
        $( 'body' ).trigger( 'rf_update_total_price' );

    });
    return false;
});*/
jQuery(document).on('click', '.remove-btn-no', function(e) {
        e.preventDefault();
        var cartItemKey = jQuery(this).attr('data-item-key');
        var productItem = jQuery(this).attr('data-product_item');
        var listLegth = $('.cart-list:visible').length;
        if (listLegth == 1) {
            var subwrap = $('.subwrap').innerHeight();
            $('.subwrap').css({
                'min-height': subwrap
            });
            $('.shopping-bag-inner, .shippingfree').fadeOut();
        }
        jQuery.ajax({
            cache: false,
            async: true,
            type: "POST",
            url: blogUri + '/wp-admin/admin-ajax.php',
            data: {
                action: 'remove_item_from_cart',
                'cartItemKey': cartItemKey,
                'product_item': productItem
            },
            success: function(res) {
               console.log('remove cart here');
                console.log($(document).find('#woocart').length);
                var $div = $(res);
                console.log($div.find(".cart-title").length);

                    $(document).find('#woocart').html(res);
                    if($div.find(".cart-title").length == 0){
                        $('.clearflix.checkout').remove();
                        $('.subwrap').css({ 'min-height' : ''});
                        $('.button-primary').css({ 'display' : 'none'});
                    }

            }
        });
    });
$(".select-menu").on('selectmenuchange', function() {
    
    var tot_attr = $(document).find('.attr_var').val();
    var attr_arr = {};
    jQuery('.select-menu option:selected').each(function(){
        $attr_index = $(this).attr('data-attr');
        $attr_val = $(this).val();
        
        if($(this).val()==''){
            return true;
        }
        attr_arr[$(this).attr('data-attr')] = $(this).val();
    });
    jQuery.ajax({
            type: "POST",
            url: blogUri +'/wp-admin/admin-ajax.php',
            data: {action : 'attr_search','tot_attr' : tot_attr , 'attr_arr' : attr_arr ,'product_id':$('#product-id-img').val() },
            success: function (res) {
                $('#qtyprod-right,#qtyprod-left').removeAttr('disabled');
        $('.add_to_cart_btn').removeClass('disabled');
                res_s = res.split("|");
                console.log(res_s);
                $('.variation-load-img-blk').html(res_s[1]);
                $('.variation-content-change').html(res_s[2]);
                
            $('#variation_id').val(res_s[0]);
            console.log(res_s[0]);

            console.log($(document).find('.provider-nav .provider-image').length);
            $(document).find('.product-cost').each(function(){
                console.log($(this).attr('data-pric'));
                if($(this).attr('data-pric') == res_s[0]){
                    $(this).show();
                }else{
                    $(this).hide();
                }
            });
            $(document).find('.provider-nav .provider-image').each(function(){
            console.log($(this).attr('id') == res_s[0]);
            if ($(this).attr('id') == res_s[0]) {
                $(this).trigger('click');
                
            }else{
                // $(this).hide();
            }
            }); 
            $(document).find('.provider .popup-with-zoom-anim').each(function(){
                console.log($(this).id);
                if ($(this).attr('id') == res_s[0]) {
                    // $(this).trigger('click');
                }else{
                    
                }
            });   

            $(document).parents('.row').find('.provider-navpopup .provider-image').each(function(){
                
                if ($(this).attr('data-id') == res_s[0]) {
                    // $(this).trigger('click');
                }else{
                    $(this).hide();
                }
            }); 
            $(document).parents('.row').find('.provider-popup .fay').each(function(){
                
                if ($(this).attr('data-id') == res_s[0]) {
                    // $(this).trigger('click');
                }else{
                    $(this).hide();
                }
            });              
                        $('.provider').slick({
                slidesToShow: 1,
                slidesToScroll:1,  
                dots: false,
                arrows: false, 
                asNavFor: '.provider-nav',
                prevArrow: '<i class="fa fa-angle-left slick-arrow slick-prev"></i>',
                nextArrow: '<i class="fa fa-angle-right slick-arrow slick-next"></i>', 
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false, 
                            dots:true
                        }
                    },
                ]
            });
            
            // $(document).on("click", ".pagination li", function(){
            //     const currentIndex = $(this).text();
            //     $carousel.magnificPopup('goTo', parseInt(currentIndex));
            // });
            $('.provider-nav').slick({
                slidesToShow: 4, 
                slidesToScroll:1, 
                centerMode: true,
                focusOnSelect: true,
                dots: false,
                arrows: false, 
                vertical: true,
                asNavFor: '.provider',
                verticalSwiping: true,
                responsive: [
                    {
                        breakpoint: 1000,
                        settings: {
                            arrows: true, 
                            vertical:false,
                            verticalSwiping:false,
                        }
                    }
                ]
            }); 
                        $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in',
                callbacks: {
                    open: function() {
                        $('body, html').addClass('y-hidden');
                        $('.provider-popup').slick({
                            slidesToShow: 1,
                            slidesToScroll:1,  
                            dots: true,
                            arrows: true, 
                            asNavFor: '.provider-navpopup',
                            prevArrow: '<i class="fa fa-angle-left slick-arrow slick-prev"></i>',
                            nextArrow: '<i class="fa fa-angle-right slick-arrow slick-next"></i>', 
                            responsive: [
                                {
                                    breakpoint: 640,
                                    settings: {
                                        arrows: true, 
                                        dots:true
                                    }
                                },
                            ]
                        });
                        $('.provider-navpopup').slick({
                            slidesToShow: 4, 
                            slidesToScroll:1, 
                            centerMode: true,
                            focusOnSelect: true,
                            dots: false,
                            arrows: false, 
                            vertical: true,
                            asNavFor: '.provider-popup',
                            verticalSwiping: true,
                            responsive: [
                                {
                                    breakpoint: 1000,
                                    settings: {
                                        arrows: true, 
                                        vertical:false,
                                        verticalSwiping:false,
                                    }
                                }
                            ]
                        }); 
                    },
                    close: function(){
                        $('body, html').removeClass('y-hidden');
                    }
                }
            });
                var productItem=[];
            // product list
            if($(window).width() <= 1000) {
                $(".product h2, .product h3, .product .product-cost").each(function(index, value){
                    productItem[index]= $(this).text();
                });
                $(".prepend-sec").append("<h2>" + productItem[0] + "</h2>");
                $(".prepend-sec").append("<h3>" + productItem[1] + "</h3>");
                $(".prepend-sec").append("<div class='product-cost'>" + productItem[2] + "</div>");
            }
            $(document).find('.var_quantity').each(function(){

                    if($(this).attr('data-stk-val').trim() == res_s[0].trim()){
                        var var_stck = $(this).val();

                    $('#qtyprod-left').on('click', function () { 
                    var qty_left = parseInt($('#qtyprod').val()) + 1;
                    console.log(qty_left);
                    if(qty_left-1 >= var_stck){
                        // alert(var_stck);
                        // alert(qty_left);
                        $('.product').find('.textbox-left').attr('disabled', true);
                        $(document).find('.stock_var').each(function(){
                        if($(this).attr('id').trim() == res_s[0].trim()){
                        var stck = $(this).show();
                        }
                    });
                    }
                    else{
                        $('.product').find('.textbox-left').attr('disabled', false);
                        $(document).find('.stock_var').each(function(){
                        if($(this).attr('id').trim() == res_s[0].trim()){
                        var stck = $(this).hide();
                        }
                    });   
                    }
                    // qtyprdchange(qty_left);
                });



                } 
                });

            }
        });

});
$(".select-menu").on('selectmenuchange', function() {
    /*
    console.log($(document).find('.attr_var').length);
    console.log($(document).find('.attr_var').val());
    var attr_arr = {};
    
    $.parseJSON($(document).find('.attr_var').val(), function(dataindex,dataval){
        console.log(dataindex);
        $.each(attr_arr, function (dataindex, varid) {
            console.log(varid);
        });
    });
    
    var wgtPrc = jQuery('.prod-attr-color option:selected').val();
    $('#prodDetPrc .prcInfoPd').removeClass`('active');
    $('#prodDetPrc #' + wgtPrc).addClass('active');
    $('#variation_id').val(wgtPrc);
        $(this).parents('.container').find('.provider-nav .provider-image').each(function(){
            
            if ($(this).attr('data-id') == wgtPrc) {
                $(this).trigger('click');
                $(this).show();
            }else{
                $(this).hide();
            }
        }); 
        $(this).parents('.container').find('.provider .popup-with-zoom-anim').each(function(){
            
            if ($(this).attr('data-id') == wgtPrc) {
                $(this).show();
            }else{
                $(this).hide();
            }
        });   

        $(this).parents('.row').find('.provider-navpopup .provider-image').each(function(){
            
            if ($(this).attr('data-id') == wgtPrc) {
                $(this).show();
            }else{
                $(this).hide();
            }
        }); 
        $(this).parents('.row').find('.provider-popup .fay').each(function(){
            
            if ($(this).attr('data-id') == wgtPrc) {
                $(this).show();
            }else{
                $(this).hide();
            }
        });    
        */
    });
/*      $('.add_to_cart_btn').on('click', function() {
        $('.add_to_cart_btn').css('opacity','0.5');
        $('.add_to_cart_btn').attr('value','Submitting...');
        jQuery('#bagh').hide();
        jQuery('.tryagain').show();
        
    });*/

   /* jQuery(".add_to_cart_btn").on("click", function() {
        return jQuery(".error-row").hide(), jQuery("#error_msg").hide(), 0 == jQuery(document).find('#variation_id').length || jQuery(document).find('#variation_id').val() ? (jQuery(".add_to_cart_btn").fadeIn(function() {
            var e = jQuery("#add_to_cart_url").val(),
                r = jQuery("#product_id").val(),
                t = jQuery(document).find('#variation_id').val(),
                o = jQuery(".qty").val();
            currentRequest = jQuery.ajax({
                type: "GET",
                url: e,
                cache: false,
                async: true,
                data: {
                    product_id: r,
                    qty: o,
                    variation_id: t
                },
                success: function(e) {
                    console.log(e)
                    
                        setTimeout(function() {
                        return jQuery(".btn-cart-detail").slideDown(), 0 == cartCount ? (jQuery(".cart-search .shopbag a").css("cursor", "default;"), jQuery(".cart-search .shopbag a").attr("href", "javascript:void(0);")) : (jQuery(".shopbag a span").text(cartCount), jQuery(".shopbag a span").addClass("bag-cart").show(), jQuery(".cart-search .shopbag a").attr("href", e), jQuery(".cart-search .shopbag a").css("cursor", "pointer")), !0
                    }, 10);
                    if (jQuery(".loader").hide(), response = e.split("error_log:"), cartCount = response[0], response.length > 1 && (errorMessage = response[1], 0 != errorMessage.length)) {
                        var error1 = errorMessage.indexOf("to the cart because there is not enough stock") > -1;
                        var error2 = errorMessage.indexOf("because the product is out of stock") > -1;
                        var error3 = errorMessage.indexOf("You cannot add that amount to the cart") > -1;
                        if (error1 || error2 || error3) return jQuery("#error_msg").text("Requested product quantity currently  unavailable."), jQuery("#error_msg").fadeIn(function() {
                            setTimeout(function() {
                                jQuery("#error_msg").fadeOut(function() {
                                    jQuery(".add_to_cart_btn").fadeIn()
                                })
                            }, 5e3)
                        }), !0
                    }
                    
                }
            });
        }), !1) : (jQuery(".add_to_cart_btn").fadeOut(function() {
            jQuery("#error_msg").text("Please choose the color."), jQuery("#error_msg").fadeIn(200), setTimeout(function() {
                jQuery("#error_msg").fadeOut(function() {
                    jQuery(".add_to_cart_btn").fadeIn()
                })
            }, 5e3)
        }), !1)
    }); */
jQuery(document).ready(function() {
//     jQuery(document.body).on("click", ".checkout_submit", function(e) {

//         console.log('herehello');
//         jQuery( document ).find("#place_order").trigger( "click" );
//     });
$(document).find('.form-row label').each(function(){
    
    if(!$(this).parent().hasClass('checkboxradio-row')){
        $(this).addClass('floating-item');      
    }

});
// alert($('input[name=defaul_address]').length);
/*$('input[name=defaul_address]').attr("id","defaul_address");
$('input[name=defaul_address]').wrap('<div class="form-row checkboxradio-row woocommerce-validated" id="default_checkbox_field">'+
    '<div class="floating-item">'+
        // '<label for="defaul_address" class="checkboxradio-label checkbox-label">asdasd</label>'+
        '<span class="floating-item-label"></span>'+
    '</div>'+
'</div>');
$('input[name=defaul_address]').parents('.floating-item').append( '<label for="defaul_address" class="checkboxradio-label checkbox-label">asdasd</label>');*/
    
        
    


    var $nav = $('nav');
    $('#navTrigger').on('click', function () {
        $('body, html').addClass('y-hidden');
    });
    $('.close-icon').on('click', function () {
        $('body, html').removeClass('y-hidden');
    });

    jQuery(document).on('submit','#work_us_form',function(e){
        $('.tick-box').removeClass('checkbox-close');
        e.preventDefault();
        var regex = /^[a-z0-9]([a-z0-9_\-\.]*)@([a-z0-9_\-\.]*)(\.[a-z]{2,3}(\.[a-z]{2}){0,2})$/i;
                        var $input = $('input.validate,textarea');
                        var $inputVal = $input.val().trim();
                        var email=jQuery('#user_email');
                        var telephone=jQuery('#telephone');
                        var resume =jQuery('#resume');
                        var $x=0;
                        $input.each(function(){
                            var $thisValue = $(this).val().trim();
                            var $errorText  = $(this).parents('.form-row').find('label').attr('data-error');
                            if ($thisValue.length == 0) {
                                $(this).parents('.form-row').addClass('error-row');
                                if($(this).parents('.form-row').find('.error-message').length==0) {
                                    $('<div class="error-message">'+$errorText+'</div>').appendTo($(this).parents('.form-row')).slideDown();
                                }
                                $x++;
                            } else {
                                $(this).parents('.form-row').removeClass('error-row');
                                $(this).parents('.form-row').find('.error-message').remove();
                            }
                        });
                        if(email.val()!=''){
                            if(!regex.test(email.val())){
                                $(email).parents('.form-row').addClass('error-row');
                                if($(email).parents('.form-row').find('.error-message').length==0) {
                                    console.log(email);
                                    $('<div class="error-message">Please enter a valid email address</div>').appendTo($(email).parents('.form-row')).slideDown();
                                }
                                else {

                                }
                                $x++;
                            }else{
                                $(email).parents('.form-row').removeClass('error-row');
                            }
                        }
                        if(telephone.val()!=''){
                            if(telephone.val().length<10){
                                $(telephone).parents('.form-row').addClass('error-row');
                                if($(telephone).parents('.form-row').find('.error-message').length==0) {
                                    $('<div class="error-message">Please enter a valid phone number</div>').appendTo($(telephone).parents('.form-row')).slideDown();
                                }
                                $x++;
                            }else{
                                $(telephone).parents('.form-row').removeClass('error-row');
                                $(telephone).parents('.form-row').find('.error-message').remove();
                            }
                        }
                        if ($(this).hasClass("file-upload") && this.files[0]!=undefined){
                            $('#resume').removeClass('validate');
                            if(this.files[0].size>5242880){
                                    r++;
                                    s = "Please upload the file less than 5Mb.";
                                    if(0 == $(this).parents(".form-row").find(".error-message").length){
                                        $('<div class="error-message">' + s + "</div>").appendTo($(this).parents(".form-row")).slideDown();
                                    }else{
                                        $(this).parents(".form-row").find(".error-message").text(s).slideDown();                        
                                    }
                                }else{
                                    /* $(this).remove() */
                                    
                           $(this).parents(".form-row").find(".error-message").remove();
                                }
                            }
                           /* var buttonData = $("#work_us_submit").attr('submit');*/
                            var file_data = $('#filename').prop('files')[0];
                            var form_data = new FormData();
                            form_data.append('file', file_data);
                            /*var data = $("form#work_us_form").serialize();
                             jQuery.each($('input').data, function(i, file) {
                                    data.append('file-'+i, file);
                                });*/
                        if($x == 0)
                        {
                            $('.tick-box').removeClass('checkbox-close,checkbox-open');
                                setTimeout(function(){ 
                                            $('.tick-box').addClass('checkbox-open');
                                        }, 500);
                            jQuery.ajax({
                                type: "POST",
                                url: blogUri + "/ajax-submit",    
                                dataType: 'text',  // what to expect back from the PHP script, if anything
                                cache: false,
                                contentType: false,
                                processData: false,
                                /*data: form_data, */
                                data: new FormData(this),
                                enctype: 'multipart/form-data',
                                success: function(data) {
                                setTimeout(function(){ 
                                        document.getElementById("work_us_form").reset();
                                                $('.tick-box').removeClass('checkbox-open'); 
                                        }, 1500);
                                },error: function() {
                                /*alert('Error');*/
                                }
                            });
                        }else{
                                $('.tick-box').addClass('checkbox-close');
                            }

    });
//     jQuery(document).on('click','#contact_submit',function(e){
//         $('.tick-box').removeClass('checkbox-close');
//         e.preventDefault();
//         var regex = /^[a-z0-9]([a-z0-9_\-\.]*)@([a-z0-9_\-\.]*)(\.[a-z]{2,3}(\.[a-z]{2}){0,2})$/i;
//                         var $input = $('input.validate,textarea');
//                         var $inputVal = $input.val().trim();
//                         var email=jQuery('#email');
//                         var telephone=jQuery('#telephone');
//                         var $x=0;
//                         $input.each(function(){
//                             var $thisValue = $(this).val().trim();
//                             var $errorText  = $(this).parents('.form-row').find('label').attr('data-error');
//                             if ($thisValue.length == 0) {
//                                 $(this).parents('.form-row').addClass('error-row');
//                                 if($(this).parents('.form-row').find('.error-message').length==0) {
//                                     $('<div class="error-message">'+$errorText+'</div>').appendTo($(this).parents('.form-row')).slideDown();
//                                 }
//                                 console.log($x);
//                                 $x++;
//                             } else {
//                                 $(this).parents('.form-row').removeClass('error-row');
//                                 $(this).parents('.form-row').find('.error-message').remove();
//                             }
//                         });
//                         if(email.val()!=''){
//                             if(!regex.test(email.val())){
//                                 $(email).parents('.form-row').addClass('error-row');
//                                 if($(email).parents('.form-row').find('.error-message').length==0) {
//                                     console.log(email);
//                                     $('<div class="error-message">Please enter a valid email address</div>').appendTo($(email).parents('.form-row')).slideDown();
//                                 }
//                                 else {

//                                 }
//                                 $x++;
//                             }else{
//                                 $(email).parents('.form-row').removeClass('error-row');
//                             }
//                         }
//                         if(telephone.val()!=''){
//                             if(telephone.val().length<10){
//                                 $(telephone).parents('.form-row').addClass('error-row');
//                                 if($(telephone).parents('.form-row').find('.error-message').length==0) {
//                                     $('<div class="error-message">Please enter a valid phone number</div>').appendTo($(telephone).parents('.form-row')).slideDown();
//                                 }
//                                 $x++;
//                             }else{
//                                 $(telephone).parents('.form-row').removeClass('error-row');
//                                 $(telephone).parents('.form-row').find('.error-message').remove();
//                             }
//                         }
//                         var data = $("form#contact_us_frm").serialize();
//                          jQuery.each($('input').data, function(i, file) {
//                                 data.append('file-'+i, file);
//                             });
//                          console.log($x);
//                         if($x == 0){
//                                 $('.tick-box').removeClass('checkbox-close,checkbox-open');
//                                      setTimeout(function(){ 
//                                             $('.tick-box').addClass('checkbox-open');
//                                         }, 500);  
                                    
//                                 /*$('.tick-box').removeClass('checkbox-open');*/
//                                 jQuery.ajax({
//                                     type: "POST",
//                                     url: blogUri + "/ajax-submit",                
//                                     data: data,
//                                     enctype: 'multipart/form-data',
//                                     success: function(data) {
//                                         setTimeout(function(){ 
//                                         document.getElementById("contact_us_frm").reset();
//                                                 $('.tick-box').removeClass('checkbox-open'); 
//                                         }, 1500);  
//                                     },error: function() {
//                                         /*alert('error handing here');*/
//                                     }

//                                 });
//                             }else{
//                                 $('.tick-box').addClass('checkbox-close');
//                                /* setTimeout(function(){ 
//                                             $('.tick-box').removeClass('checkbox-close');
//                                         }, 1000);*/  
//                             }

//     });
//     



    jQuery(document).on("click", ".contact_submit", function(e) {
        var regFname = $('#first-name').val();
        var regLname = $('#last-name').val();
        var regEmail = $("#email").val();
        var regPhone = $("#telephone").val();
        var regMessage = $("#messages").val();
        var regex = /^[a-z0-9]([a-z0-9_\-\.]*)@([a-z0-9_\-\.]*)(\.[a-z]{2,3}(\.[a-z]{2}){0,2})$/i;
        var x = 0;
        var $input = $('.contact_us_frm .floating-item-input.validate');
        var $inputVal = $input.val();
        $input.each(function() {
            var $thisValue = $(this).val().trim();
            var $errorText = $(this).parents('.form-row').find('label').attr('data-error');
            if ($thisValue.length == 0) {
                $(this).parents('.form-row').addClass('error-row');
                if ($(this).parents('.form-row').find('.error-message').length == 0) {

                    $('<div class="error-message">' + $errorText + '</div>').appendTo($(this).parents('.form-row')).slideDown();
                }
                x++;
            } else {
                $(this).parents('.form-row').removeClass('error-row');
                $(this).parents('.form-row').find('.error-message').remove();
            }
        });
        if (regEmail != '') {
            if (!regex.test(regEmail)) {
                if ($('#email').parents('.form-row').find('.error-message').length == 0) {
                    $('#email').parents('.form-row').addClass('error-row');
                    $('<div class="error-message">Please enter a valid email address</div>').appendTo($('#email').parents('.form-row')).fadeIn();
                } else {
                    $('#email').parents('.form-row').removeClass('error-row');
                    $('.error-message').text('Please enter a valid email address').fadeIn();
                }
                x++;
            }
        }
        if (regPhone != '') {
            if (regPhone.length < 10) {
                $("#telephone").parents('.form-row').addClass('error-row');
                if ($("#telephone").parents('.form-row').find('.error-message').length == 0) {
                    $('<div class="error-message">Please enter a valid phone number</div>').appendTo($("#telephone").parents('.form-row')).slideDown();
                }
                x++;
            } else {
                $("#telephone").parents('.form-row').removeClass('error-row');
                $("#telephone").parents('.form-row').find('.error-message').remove();
            }
        }
        /* min 1 in fname*/
            if($('#first-name').val().length < 1)
            {

                $('#first-name').parents('.form-row').addClass('error-row');
                if ($('#first-name').parents('.form-row').find('.error-message').length == 0) {
                    $('<div class="error-message">Please enter your first name</div>').appendTo($('#first-name').parents('.form-row')).slideDown();
                } else {
                    $('#first-name').parents('.form-row').find('.error-message').show();
                }
                        x++;
            } else {
                $('#first-name').parents('.form-row').removeClass('error-row');
                $('#first-name').parents('.form-row').find('.error-message').remove();
            }
            /* min 1 in fname*/

        if (x > 0) {
            return false;
        } else {
                   
                    return true;
        }
    }),




jQuery(document).on('click','#discount-button',function(e){
   // jQuery(document).on('click','#discount-button',function(){
    jQuery(".preloader-black").show();
    jQuery('#discount-button').css('opacity',0);
      setTimeout(function(){
        var e = jQuery("#coupon_code").val().toLowerCase();
          console.log('here');
        jQuery.ajax({
            type: "POST",
            async:true,
            url: blogUri +"/coupon-code",
            data: {
                coupon_code:e
            },
            success: function(e) {

                var result = e.split('~html'),r;
                 // $('#voucherInner').append(e);
                 
                if(result.length>0){
                    r = result[0].indexOf('added');
                    if (r > -1){

                        $('.tick-box').addClass('checkbox-open');
                        var blogurl = blogUri+"/cartnew";
                        $("#woocart").load(blogurl, function(e) {
                            $(".preloader-black").hide();
                            $('#discount-button').css('opacity',1);
                            $("#carttd").hide();
                            $(".tryagain").hide();
                        });
                        
                    }else{

                        $(".preloader-black").hide();
                        $('#discount-button').css('opacity',1);
                        console.log('here');
                        $('.tick-box').addClass('checkbox-close');
                        setTimeout(function(){
                            $('#voucherCodeFiled').slideUp(100);
                            $(".applybutd").slideUp(200);
                            $(".addvoucher").slideUp(300);
                            
                        }, 500);
                        $(".tryagain").slideDown();
                        $('#voucherCodeFiled').css('display','none');
//                        setTimeout(function(){
//                             $('#voucherCodeFiled').slideUp();
//                             $(".tryagain").slideDown();
//                         }, 1000);
                        $(".applybutd").slideUp();

                    }
                }
            }
        });
    // $('.tick-box').addClass('checkbox-open');
      }, 300);    
    });
jQuery(".woocommerce-remove-coupon").appendTo(".apply-voucher").addClass('remove-voucher').text('Remove voucher').css({'display':'block'});
    jQuery('.woocommerce-remove-coupon').slice(1).remove();    
    /*$('.remove-btn').click(function(){
      var listLegth = $('.cart-list:visible').length;
      alert(listLegth);
      if(listLegth == 1){
        var subwrap = $('.subwrap').innerHeight();
        $('.subwrap').css({ 'min-height': subwrap });
        $('.emptybag-blk').addClass('open');
        $('.shopping-bag-inner, .shippingfree').fadeOut(function(){
            setTimeout(function(){$('.emptybag').fadeIn(); }, 400);
            
        });
      }
      $(this).parents('.cart-list').fadeOut();
      // return false;
    });*/

    jQuery(document).on('keyup','#coupon_code',function(){
        var $value=jQuery(this).val().length;
        console.log($value);
        if($value>3){
            jQuery('.applybutd button').show();
        }
    });
/*
    $('#coupon_code').keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
         {
           $('#discount-button').click();
           return false;  
         }
    });  */

    jQuery(document).on('click','.addvoucher',function(){
        $(this).fadeOut(function(){
            $('.applybutd').fadeIn();
            $('.applybutd .textBox').focus();          
        })
    });
     //REMOVE VOUCHER
    jQuery(document).on('click','.tryagain a',function(){
        $('.tick-box').removeClass('checkbox-open');
      $('.tick-box').removeClass('checkbox-close');
      $('.tryagain').slideUp();
      $(".applybutd").slideDown();
      $('.voucherCodeFiled').slideDown(); 
      $('#coupon_code').slideDown();         
      $('#coupon_code').val('')
      // return false;
    });
    jQuery(document).on('click','.remove-voucher',function(){
        $('#discountTr').hide();
        // $('#discountAmount').fadeOut();
        $('.checkouttotal').slideDown(500); 
      // return false;
    });

    jQuery(".color-hover a").on("mouseover", function() {
        var e = jQuery(this).attr("color-code");
        jQuery(this).css({
            "border-width": "1px",
            "border-color": e
        })
    }), jQuery(".color-hover a").on("mouseleave", function() {
        jQuery(this).css({
            "border-width": "1px",
            "border-color": "#c0aa8f"
        })
    }), 0 != jQuery(".register").length && (jQuery(this).closest("form").find("input[type=text]").val(""), jQuery("#email").val("")), jQuery("#register").on("click", function() {
        var e = jQuery("#register").parents().parents().find("#password").last().val().trim()   ;
        if (0 == jQuery("#confirm_password").parents(".form-row").find(".error-message").length) {
            if ("" == e || e != r) return jQuery("#err_confirm_pass").parents(".form-row").addClass("error-row"), jQuery("#err_confirm_pass").text("Password does not match").slideDown(), !1;
            jQuery("#err_confirm_pass").parents(".form-row").removeClass("error-row"), jQuery("#err_confirm_pass").parents(".form-row").find(".invalid_pass").slideUp()
        }
    }), jQuery(".tab-details .color-list li").each(function() {
        ancher = jQuery(this).find("a"), color = ancher.attr("color-code"), ancher.css("color", color)
    }), jQuery(document).on("click", ".color_list .color-list li", function() {
        jQuery(this).parent().find("a.active").removeClass("active"), jQuery(this).find("a").addClass("active"), jQuery(".quantity_list a")[0].click()
    }), jQuery(document).on("click", ".theme-globalerror .close-button", function() {
        jQuery(".theme-globalerror").hide("active")
    }),  jQuery(".form-row").each(function() {
        var e = jQuery(this).find(".floating-item-input");
        jQuery(this).find(".floating-item-label").insertAfter(e)
    }), jQuery("#billing_first_name_field").find(".floating-item ").attr("data-error", "Please enter your first name"),jQuery("#billing_phone_field").find(".floating-item ").attr("data-error", "Please enter your phone number"), jQuery("#billing_last_name_field").find(".floating-item ").attr("data-error", "Please enter your last name"),
        jQuery("#billing_email_field").find(".floating-item ").attr("data-error", "Please enter your email address"),jQuery("#billing_address_1_field").find(".floating-item").attr("data-error", "Please enter your address line 1"), jQuery("#billing_address_2_field").find(".floating-item").attr("data-error", "Please enter your address line 2"),  jQuery("#billing_state_field").find(".floating-item ").attr("data-error", "Please enter your state/county"),jQuery("#billing_city_field").find(".floating-item").attr("data-error", "Please enter the name of the city you live in"), jQuery("#billing_postcode_field").find(".floating-item").attr("data-error", "Please enter your postcode"), jQuery("#register").on("click", function() {
        console.log('testeste');
        var first_name=jQuery('#first_name').val().trim();
        jQuery('#first_name').val(first_name);
        var last_name=jQuery('#last_name').val().trim();
        jQuery('#last_name').val(last_name);
        var password=jQuery('#password').val().trim();
        jQuery('#password').val(password);
        /*var password_confirmation=jQuery('#password-confirmation').val().trim();
        jQuery('#password-confirmation').val(password_confirmation);*/
        if (0 != jQuery("#checkbox2").length) {
            if (0 == jQuery("#checkbox2").is(":checked")) return jQuery("#terms_error").show(), !1;
            jQuery("#terms_error").hide()
        }
    }), jQuery("#checkbox2,#register").on("click", function() {

        0 == jQuery("#checkbox2").is(":checked") ? jQuery("#terms_error").show() : jQuery("#terms_error").hide()
    }),/* jQuery(document).on("click", "#discount-button", function() {
        "" != jQuery("#coupon_code").val() ? (jQuery(this).fadeOut(), jQuery(".preloader-black").fadeIn(500, function() {
            $("#updcartbut1").html('<input type="hidden" name="apply_coupon" value="Apply Coupon" />');
            var e = {
                success: function() {
                    $("#woocart").load("cartnew/", function(e) {
                        -1 != e.indexOf("coupon_code") && jQuery(".applybutd").fadeOut(function() {
                            jQuery(".error-message-invalid").fadeIn(), setTimeout(function() {
                                jQuery(".error-message-invalid").fadeOut(function() {
                                    jQuery(".applybutd").fadeIn()
                                })
                            }, 5e3)
                        })
                    })
                }
            };
            $("#cartform").ajaxSubmit(e)
        })) : jQuery(".applybutd").fadeOut(function() {
            jQuery(".error-message-custom").fadeIn(), setTimeout(function() {
                jQuery(".error-message-custom").fadeOut(function() {
                    jQuery(".applybutd").fadeIn()
                })
            }, 5e3)
        })
    }),*/ jQuery(document).on("click", ".removeIcon", function() {
        $("#updcartbut1").html(""), $(".loading").show(), $(".voucherWrap").hide();
        var e = {
            success: function() {
                $("#woocart").load("cartnew/", function() {
                    $(".loading").hide(), console.log(1)
                })
            }
        };
        $("#removeCouponForm").ajaxSubmit(e)
    }), jQuery(".remov-icon").click(function() {
        jQuery("#discount-button").show(), jQuery("#discountAmount").fadeOut(function() {
            jQuery("#voucherInner .voucherCodeFiled").fadeIn()
        })
    }); jQuery("input, textarea").keyup(function() {
        "" !== jQuery(this).val() ? jQuery(this).addClass("input-email-active") : jQuery(this).removeClass("input-email-active")
    }), jQuery(".preloadtd .qty").on("keypress", function() {
        product_id = jQuery("#product_id").val(), variation_id = jQuery("#variation_id").val(), quantityonchangequantityonchange(product_id, variation_id)
    }), jQuery(".textbox-small").on("selectmenuchange", function() {
        var e = jQuery(this).val(),
            r = jQuery(this).parent().find(".prdid").val();
        quantityonchange(r, e)
    }), jQuery("#color").show(), jQuery(".color-list.quantity").on("click", "a", function(e) {
        jQuery(".qty").val(jQuery(this).text()), e.preventDefault()
    }), String.prototype.ucfirst = function() {
        return this.charAt(0).toUpperCase() + this.substr(1)
    }, jQuery(document).on("click", ".tab-details .quantity li", function() {
        jQuery(this).parent().find("a.active").removeClass("active"), jQuery(this).find("a").addClass("active")
    }), window.setTimeout(function() {
        var e = [];
        jQuery("#woosvithumbs li").each(function() {
            e = '<div><img src="' + jQuery(this).attr("data-src") + '"></div>', jQuery(".provider_new").append(e)
        }), 0 == e.length && (e = '<div><img src="' + jQuery("#woosvimain img").attr("src") + '"></div>', jQuery(".provider_new").append(e))
    }, 500), jQuery(document).on("click", ".quantity-blk ul li", function() {
        var e = jQuery(this).text().toLowerCase();
        jQuery("#color option").each(function() {
            var r = jQuery(this).val().toLowerCase();
            return e == r ? (jQuery(this).attr("selected", "selected"), jQuery(this).trigger("change"), jQuery(".error-message").hide(), !1) : void 0
        }), window.setTimeout(function() {
            var e = [];
            // $(".provider_new").slick("unslick"), jQuery(".provider_new div").remove(), jQuery("#woosvithumbs li").each(function() {
            //     e = '<div><img src="' + jQuery(this).attr("data-src") + '"></div>', jQuery(".provider_new").append(e)
            // }), 0 == e.length && (e = '<div><img src="' + jQuery("#woosvimain img").attr("src") + '"></div>', jQuery(".provider_new").append(e)), 
            // $('.provider_new').slick({
            //    slidesToShow: 1,  
            //    dots: true,
            //    arrows: true,
            //     prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
            //     nextArrow: '<div class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
            //  });
        }, 500)
    }); 
    var currentRequest = null;  
    // progress bar.
    [].slice.call( document.querySelectorAll('.add_to_cart_btn') ).forEach( function( bttn ) {

        new ProgressButton( bttn, {

            callback : function( instance ) {
                var progress = 0,
                interval = setInterval( function() {
                    progress = Math.min( progress + Math.random() * 0.2);
                    instance._setProgress( progress );
                }, 1000);
                // $('#qtyprod').val();

                //jQuery(".add_to_cart_btn").on("click", function() {
                return jQuery(".error-row").hide(), jQuery("#error_msg").hide(), 0 == jQuery("#variation_id").length || jQuery("#variation_id").val() ? (jQuery(".add_to_cart_btn").fadeIn(function() {
            //jQuery(".loader").fadeIn();
            var e = jQuery("#add_to_cart_url").val(),
                r = jQuery("#product_id").val(),
                t = jQuery("#variation_id").val(),
                o = jQuery("#qtyprod").val();
             currentRequest = jQuery.ajax({
                type: "POST",
                url: e,
                data: {
                    product_id: r,
                    qty: o,
                    variation_id: t
                },
                beforeSend : function()    {           
                    if(currentRequest != null) {
                        currentRequest.abort();
                    }
                },
                success: function(e) {
                    localStorage.setItem('qty', 1);
                    console.log(e);
                    if (response = e.split("error_log:"), cartCount = response[0], response.length > 1 && (error_message = response[1], 0 != error_message.length)) {
                        out_of_stock_1 = "to the cart because there is not enough stock", out_of_stock_2 = "You cannot add that amount to the cart";
                        var r = error_message.indexOf(out_of_stock_1),
                            t = error_message.indexOf(out_of_stock_2);
                        if (r > -1 || t > -1) return jQuery("#error_msg").text("Requested product quantity currently  unavailable."), jQuery('.btn-cart-detail').fadeOut(), jQuery("#error_msg").fadeIn(function() {
                                setTimeout(function() { 
                                    progress = 1;
                                    instance._setProgress( progress );
                                    if( progress === 1 ) {
                                        instance._stop(1);
                                        clearInterval( interval );
                                        jQuery('.add_to_cart_btn').addClass('state-error');
                                        jQuery('.add_to_cart_btn').addClass('remove-tick');
                                        setTimeout(function(){
                                            jQuery('.add_to_cart_btn').removeClass('state-error');
                                            jQuery('.add_to_cart_btn').addClass('remove-tick');
                                        }, 4000);
                                    } 
                                    jQuery(".add_to_cart_btn").fadeIn();
                                    jQuery("#error_msg").delay(4000).fadeOut();
                            })
                        }), !0
                    }
                    setTimeout(function(){
                        progress = 1;
                        instance._setProgress( progress );
                        if( progress === 1 ) {
                            instance._stop(1);
                            clearInterval( interval );
                        }
                        return jQuery(".btn-cart-detail").hide(), 0 == cartCount ? (jQuery(".shopbag a").css("cursor", "default;"), jQuery(".shopbag a").attr("href", "javascript:void(0);"),jQuery(".cart-icon a").attr("href", "javascript:void(0);"),jQuery('.shopbag a').addClass('empty-bag')) : (jQuery(".shopbag span").text(cartCount), jQuery(".shopbag span").addClass("bag-cart"), jQuery(".shopbag a").attr("href", cartUrl),jQuery(".cart-icon a").attr("href", cartUrl),jQuery(".cart-icon span").text(cartCount) ,jQuery(".cart .shopbag a").css("cursor", "pointer"), jQuery('.add_to_cart_btn').removeClass('state-error'),jQuery('.shopbag a').removeClass('empty-bag'),jQuery(".cart-icon a").removeClass('empty-bag')), !0
                    }, 500);
                }
            });
        }), !1) : (jQuery(".add_to_cart_btn").fadeOut(function() {
            jQuery("#error_msg").text("Please choose the color."), jQuery("#error_msg").fadeIn(200), setTimeout(function() {
                jQuery("#error_msg").fadeOut(function() {
                    jQuery(".add_to_cart_btn").fadeIn()
                })
            }, 5e3)
        }), !1)
    //})
            }
        });
    }); jQuery(".out-of-stock").insertAfter(".product_title")
$(".input-text").each(function() {
            // ...
            if($(this).val()!=""){
                console.log($(this).next().attr('class'));  
                $(this).next().css('top','-20px');
            }
        });
}), jQuery(".register_checkout").on("click", function() {
    jQuery("#tab-shopping").hide()
}), jQuery(".showlogin,.as_guests").on("click", function() {
    jQuery("#tab-shopping").show()
});
var currentRequest = null;  
    // progress bar.

[].slice.call( document.querySelectorAll('#subscribe-button') ).forEach( function( bttn ) {

        // if(x == 0){
        new ProgressButton( bttn, {

            callback : function( instance ) {
                var progress = 0,
                interval = setInterval( function() {
                    progress = Math.min( progress + Math.random() * 0.2);
                    instance._setProgress( progress );
                }, 100);
                console.log('2323');
        $('.msg_sub').hide();
        $('.err-msg').hide();
        var err_email = "Please enter your email address";
        var err_fname = "Please enter your first name";
        var err_lname = "Please enter your last name";
        var err_emailvalid = "Please enter a valid email address";
        var err_checkbox = "Please click the checkbox";
        var $this = $(this);
        var sub_email = $('#subscribe-email').val();
        var sub_fname = $('#subscribe-firstname').val();
        var sub_lname = $('#subscribe-lastname').val();
        sub_email = jQuery.trim(sub_email);
        sub_fname = jQuery.trim(sub_fname);
        sub_lname = jQuery.trim(sub_lname);
        var x=0;
//         if (sub_fname == '' || sub_fname == null) {
//             $('#err_sub_fname').text(err_fname);
//             $('#err_sub_fname').css('display', 'block');
//             x++;
//         }else{

//             $('#err_sub_fname').text(err_fname);
//             $('#err_sub_fname').css('display', 'none');
//         }
//         if (sub_lname == '' || sub_lname == null) {
//             $('#err_sub_lname').text(err_lname);
//             $('#err_sub_lname').css('display', 'block');
//             x++;
//         }
//         else{
//             $('#err_sub_lname').text(err_lname);
//             $('#err_sub_lname').css('display', 'none');
//         }

            if (!isValidEmailAddress(sub_email)){
                if (sub_email == '' || sub_email == null){
                    $('#err_sub_email').text(err_email);
                    $('#err_sub_email').css('display', 'block');
                    x++;
        }else{
            $('#err_sub_email').text(err_emailvalid);
            $('#err_sub_email').css('display', 'block');
            x++;  
        }
       }else{

            $('#err_sub_email').text(err_email);
            $('#err_sub_email').text(err_emailvalid);
            $('#err_sub_email').css('display', 'none');
        
        }

        console.log(x);

                //jQuery("#subscribe-button").on("click", function() {
                return jQuery(".error-row").hide(), jQuery("#error_msg").hide() ? (jQuery("#subscribe-button").fadeIn(function() {
            //jQuery(".loader").fadeIn();
            if(x==0){
             currentRequest = jQuery.ajax({
                type: "POST",
                url: templateUri+"/ajax/ajax-subscribe.php",
                data: {email: sub_email,action: 'subscribe'},
                beforeSend : function()    {           
                    if(currentRequest != null) {
                        currentRequest.abort();
                    }
                },
                success: function(msg) {
                    setTimeout(function(){
                        progress = 1;
                        instance._setProgress( progress );
                        if( progress === 1 ) {
                            instance._stop(1);
                            clearInterval( interval );
                        }
                    }, 100);
                    if(msg==1)
                    {   $('#subscribe-firstname').val('');
                        $('#subscribe-lastname').val('');
                        $('#subscribe-email').val('');
                        $('.msg_sub').show();
                        $('.err-msg').hide();

                    } else {
                        $('#subscribe-email').val('');
                        $('.err-msg').show();
                        $('.msg_sub').hide();
                    }
                    
                }
            });
         }else{
                 jQuery('#subscribe-button').addClass('state-error');
                 jQuery('#subscribe-button').addClass('remove-tick');
            setTimeout(function(){
                progress = 1;
                instance._setProgress( progress );
                if( progress === 1 ) {
                    instance._stop(1);
                    // console.log(interval);
                    clearInterval( interval );

                }

            }, 500  );
            
            setTimeout(function(){
                jQuery('#subscribe-button').removeClass('state-success');
                jQuery('#subscribe-button').removeClass('state-error');
            },1000);
         }
        
        }), !1) : (jQuery("#subscribe-button").fadeOut(function() {
            jQuery("#error_msg").fadeIn(200), setTimeout(function() {
                jQuery("#error_msg").fadeOut(function() {
                    jQuery("#subscribe-button").fadeIn()
                })
            }, 5e3)
        }), !1)
    //})
            }
        }); 
        // }
    }); 



/********* Newsletter subscription validation ***********/
/*
    $(document).on('click','#subscribe-button', function () {
        $('.msg_sub').hide();
        $('.err-msg').hide();
        var err_email = "Please enter your email address";
        var err_fname = "Please enter your first name";
        var err_lname = "Please enter your last name";
        var err_emailvalid = "Please enter a valid email address";
        var err_checkbox = "Please click the checkbox";
        var $this = $(this);
        var sub_email = $('#subscribe-email').val();
        var sub_fname = $('#subscribe-firstname').val();
        var sub_lname = $('#subscribe-lastname').val();
        sub_email = jQuery.trim(sub_email);
        sub_fname = jQuery.trim(sub_fname);
        sub_lname = jQuery.trim(sub_lname);
        var x=0;
        if (sub_fname == '' || sub_fname == null) {
            $('#err_sub_fname').text(err_fname);
            $('#err_sub_fname').css('display', 'block');
            x++;
        }
        if (sub_lname == '' || sub_lname == null) {
            $('#err_sub_lname').text(err_lname);
            $('#err_sub_lname').css('display', 'block');
            x++;
        }

        if (sub_email == '' || sub_email == null) {
            $('#err_sub_email').text(err_email);
            $('#err_sub_email').css('display', 'block');
            x++;
        }else if (!isValidEmailAddress(sub_email)) {

            $('#err_sub_email').text(err_emailvalid);
            $('#err_sub_email').css('display', 'block');
            x++;
        }
            // else if( !jQuery('#checkbox2').is(':checked') ){
        //              $('#err_sub_email').css('display', 'none');
            //
            // $('#err_ckbx').text(err_checkbox);
            // $('#err_ckbx').css('display', 'block');
            // return false;
        // }
             if (x==0){
              // if(jQuery('#checkbox2').is(':checked')){
            $('#err_sub_fname').css('display', 'none');
            $('#err_sub_lname').css('display', 'none');
            $('#err_sub_email').css('display', 'none');
            $('#err_ckbx').css('display', 'none');
                    $.ajax({
                        type: "POST",
                        url: templateUri+"/ajax/ajax-subscribe.php",
                        data: {email: sub_email,fname: sub_fname,lname:sub_lname,action: 'subscribe'}
                        }).done(function (msg) {
                            if(msg==1)
                            {   $('#subscribe-firstname').val('');
                                $('#subscribe-lastname').val('');
                                $('#subscribe-email').val('');
                                $('.msg_sub').show();
                                $('.err-msg').hide();

                            } else {
                                $('#subscribe-email').val('');
                                $('.err-msg').show();
                                $('.msg_sub').hide();
                            }
                        });
                // }
                    return false;
            }
    });
*/
   


$('#register_btn').click(function() { 

                        var firstname = $("#first_name").val(); 
                        var lastname = $('#last_name').val();
                        var email = $('#email').val();
//                      var tele =$('#mobile').val();
                        var password = $('#password_reg').val();
                        var $x=0;
    
        var regex = /^[a-z0-9]([a-z0-9_\-\.]*)@([a-z0-9_\-\.]*)(\.[a-z]{2,3}(\.[a-z]{2}){0,2})$/i;
                        var $input = $('.register_btn .input-item.validate');
                        var $inputVal = $input.val().trim();
                        $input.each(function(){
                            var $thisValue = $(this).val().trim();
                            var $errorText  = $(this).parents('.form-row').find('label').attr('data-error');
                            if ($thisValue.length == 0) {
                                $(this).parents('.form-row').addClass('error-row');
                                if($(this).parents('.form-row').find('.error-message').length==0) {
                                    $('<div class="error-message">'+$errorText+'</div>').appendTo($(this).parents('.form-row')).slideDown();
                                }
                                $x++;
                            } else {
                                $(this).parents('.form-row').removeClass('error-row');
                                $(this).parents('.form-row').find('.error-message').remove();
                            }
                        });
                        if(email !=''){
                            if(!regex.test(email)){
                                $('#email').parents('.form-row').addClass('error-row');
                                if($('#email').parents('.form-row').find('.error-message').length==0) {
                                    $('<div class="error-message">Please enter a valid email address</div>').appendTo($('#email').parents('.form-row')).slideDown();
                                }
                                else {
                
                                }
                                $x++;
                            }else{
                                $('#email').parents('.form-row').removeClass('error-row');
                                 $('#email').parents('.form-row').find('.error-message').remove();
                            }
                        }
//                         if(tele !=''){
//                             if(tele.length<12){
//                                 $('#mobile').parents('.form-row').addClass('error-row');
//                                 if($('#mobile').parents('.form-row').find('.error-message').length==0) {
//                                     $('<div class="error-message">Please enter a valid phone number</div>').appendTo($('#mobile').parents('.form-row')).slideDown();
//                                 }
//                                 $x++;
//                             }else{
//                                 $('#mobile').parents('.form-row').removeClass('error-row');
//                                 $('#mobile').parents('.form-row').find('.error-message').remove();
//                             }
//                         }


                        if($x == 0)
                        {
                            return true;
                            
                        }else{
                                     event.preventDefault();
                                    return false;
                            }

    });



/* Stripe payment  */
$(document).ready(function() {
    $(".open-test").hide();
});
$('#something').click( function() {  

     });


/*login form validation*/

//  jQuery( document ).on('click',"#sign_in",function() {
//      var email=jQuery('#email').val();
//      var password=jQuery('#password').val();
//      var regex = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
//      var x=0;

//       if (password=='' || password == undefined) {
//        jQuery('#error_password').parents('row').addClass('error-message');
//        jQuery('#error_password').text("Please enter a password").show();
//        x++;
//       } else {
//        jQuery('#error_password').parents('row').addClass('error-message');
//        jQuery('#error_password').show();
//       }

//     if (email!='') {
//        if (!regex.test(email)) {
//          jQuery('#error_email').hide();
//          jQuery('#error_email').parents('row').addClass('error-message');
//          jQuery('#error_email').text("Please enter a valid email address").show();
//          x++;
//        } else {
//          jQuery('#error_email').parents('row').removeClass('error-message');
//          jQuery('#error_email').hide();
//        }
//       } else {
//        jQuery('#error_email').hide();
//        jQuery('#error_email').text("Please enter your email address").show();
//        jQuery('#error_email').parents('row').addClass('error-message');
//        x++;
//       }

     
// console.log(x);
//      if (x==0) {


//       $.ajax({
//             type: "POST",
//             dataType: "text",
//             url: blogUri+"/wp-admin/admin-ajax.php",
//             data: {action: "login",email: email,password: password},
//                   }).done(function (data) {
//             if(data.trim()==1) {
//                 window.location.href = blogUri+"/my-account/";
//             } else {
//                 console.log(data);
//                 jQuery('#content').text(data);
//                 jQuery('.hover_bkgr_fricc').css('display','block');
//             }
//         });
//      }


// else{

//       event.preventDefault();
//    }
//    });


/***forgot password****/


  $('#lostpassword').click(function(e) {
   var email = $('#email').val();
   
    var regex = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    var x=0;
var $input = $('.lost_reset_password .input-item.validate');
    var $inputVal = $input.val();
    $input.each(function() {
        var $thisValue = $(this).val().trim();
        var $errorText = $(this).parents('.form-row').find('label').attr('data-error');
        if ($thisValue.length == 0) {
            $(this).parents('.form-row').addClass('error-row');
            if ($(this).parents('.form-row').find('.error-message').length == 0) {

                $('<div class="error-message">' + $errorText + '</div>').appendTo($(this).parents('.form-row')).slideDown();
            }
            x++;
        } else {
            $(this).parents('.form-row').removeClass('error-row');
            $(this).parents('.form-row').find('.error-message').remove();
        }
    });
    if(email !=''){
                           if(!regex.test(email)){
                               $('#email').parents('.form-row').addClass('error-row');
                               if($('#email').parents('.form-row').find('.error-message').length==0) {
                                   $('<div class="error-message">Please enter a valid email address</div>').appendTo($('#email').parents('.form-row')).slideDown();
                                   event.preventDefault();
                               }
                               else {
               
                               }
                               x++;
                           }else{
                               $('#email').parents('.form-row').removeClass('error-row');
                                $('#email').parents('.form-row').find('.error-message').remove();
                           }
                       }

   

    if (x > 0) {
    event.preventDefault();
    return false;
   } 
   else{ 
      return true;
    }
});
var n=$(".blog-detail").find("img");
for(i=0;i<n.length;i++){
$(n[i]).parent().addClass("active");
}


$(document).ready(function() {


 $(".thumbnail_img").on('click', function(){
    var prod_var_id = $(this).attr('id');
    var currentCount = $("input[name='"+prod_var_id+"']").val();
    $('.nomobile #qtyprod').val(currentCount);
    console.log(currentCount);
     $(".variation_id").val(prod_var_id);
    $('.prod-var').each(function(){
            var price_id = $(this).attr('data-pric');    
            if(prod_var_id == price_id ){
                $(this).show();
                $(this).addClass('active');
            }else{
                $(this).hide();
                $(this).removeClass('active');
            }
        });
    $('.combo-heading').each(function(){
            var combo = $(this).attr('combo-id');    
            if(prod_var_id == combo ){
                $(this).show();
            }else{
                $(this).hide();
            }
            // console.log(price_id);
        });
    });
 $(".thumbnail_img:first").click();


     $(".thumbmob").on('click', function() {
            var prod_var_id = $(this).attr('id');
            var currentCount = $("input[name='"+prod_var_id+"']").val();
    $('.no-desc #qtyprod').val(currentCount);
            $(".variation_id").val(prod_var_id);
      // $("#variation_id").val(prod_var_id);
       console.log($('#variation_id').attr('value', prod_var_id));
    $('.prod-var').each(function(){
            var price_id = $(this).attr('data-pric');    
            if(prod_var_id == price_id ){
                $(this).show();
                 $(this).addClass('active');
            }else{
                $(this).hide();
                $(this).removeClass('active');
            }
        });
    $('.combo-heading').each(function(){
            var combo = $(this).attr('combo-id');    
            if(prod_var_id == combo ){
                $(this).show();
            }else{
                $(this).hide();
            }
        });
    });

});

 



// $('.orderdetail').find('.pointer-disab').removeClass('pointer-disab');
// alert('hai')

 


$(".hearticon").on("click", function() {
    $(this).toggleClass('active');
});
// js for quantity
$(document).ready(function(){
    $(document).on('click', '.close-voucher', function(){
        $(this).parent('.applybutd').fadeOut(function(){
            $('.addvoucher').fadeIn();
        });
    });
    // $('.product .textbox-left').on('click', function(ev) {
    //     // 
    //     $currObj = $(ev.currentTarget);
    //     var reponsiveClass = '.nomobile';
    //     if($(window).width() < 640 ) {
    //         reponsiveClass = '.no-desc';
    //     }
    //     console.log($(reponsiveClass+' .product-cost.active #price-change')[0]);
    //     var currQCount = getCurrQCount($currObj);
    //         currQCount++;
    //         if(currQCount>=1){
    //             localStorage.setItem('qty', currQCount);
    //             var newCountId = $('.product-cost.active').attr('data-pric');
    //             $("input[name='"+newCountId+"']").val(currQCount);
    //             updateData($currObj, currQCount);
    //             var updated_price_unit = currQCount * $(this).parents('.product-cart').siblings(reponsiveClass+' .product-cost.active').find('#price-change-unit').attr("data-val");
    //             var updated_price = currQCount * $(this).parents('.product-cart').siblings(reponsiveClass+' .product-cost.active').find('#price-change').attr("data-val");
    //             if($(reponsiveClass+' .product-cost.active #price-change')[0]!==undefined || $(reponsiveClass+' .product-cost.active #price-change-unit')[0]!==undefined){
    //                 $(reponsiveClass+' .product-cost.active #price-change')[0].innerHTML=updated_price.toFixed(2);
    //                 if( $(reponsiveClass+' .product-cost.active #price-change-unit')[0]!==undefined && $('.product-cost.active #price-change-unit')[0]!==undefined){
    //                     $(reponsiveClass+' .product-cost.active #price-change-unit')[0].innerHTML=updated_price_unit.toFixed(2);
    //                 }
    //             }else{
    //                 $(reponsiveClass+' .product-cost.active #price-change').innerHTML=updated_price.toFixed(2);
    //                 if( $(reponsiveClass+' .product-cost.active #price-change-unit')!==undefined){
    //                     $(reponsiveClass+' .product-cost.active #price-change-unit').innerHTML=updated_price_unit.toFixed(2);
    //                 }
    //             }
    //         }
    //         if(currQCount==1){
    //             $('.textbox-right').addClass('disabled');
    //             $('.textbox-right').attr('disabled', true);
    //         }else{
    //             $('.textbox-right').attr('disabled', false);
    //         }
    //  });

    //  $('.product .textbox-right').on('click', function(ev) {

    //     var reponsiveClass = '.nomobile';
    //     if($(window).width() < 640 ) {
    //         reponsiveClass = '.no-desc';
    //     }
    //     $currObj = $(ev.currentTarget);
    //     var currQCount = getCurrQCount($currObj);
    //         currQCount--;
    //        if(currQCount>=1){
    //             localStorage.setItem('qty', currQCount);
    //             var newCountId = $('.product-cost.active').attr('data-pric');
    //             $("input[name='"+newCountId+"']").val(currQCount);
    //             updateData($currObj, currQCount);
    //             var updated_price_unit = currQCount * $(this).parents('.product-cart').siblings(reponsiveClass+' .product-cost.active').find('#price-change-unit').attr("data-val");
    //             var updated_price = currQCount * $(this).parents('.product-cart').siblings(reponsiveClass+' .product-cost.active').find('#price-change').attr("data-val");
    //             if($(reponsiveClass+' .product-cost.active #price-change')[0]!==null || $(reponsiveClass+' .product-cost.active #price-change-unit')[0]!==undefined){
    //                 $(reponsiveClass+' .product-cost.active #price-change')[0].innerHTML=updated_price.toFixed(2);
    //                 if( $(reponsiveClass+' .product-cost.active #price-change-unit')[0]!==null && $('.product-cost.active #price-change-unit')[0]!==undefined){
    //                     $(reponsiveClass+' .product-cost.active #price-change-unit')[0].innerHTML=updated_price_unit.toFixed(2);
    //                 }
    //             }else{
    //                 $(reponsiveClass+' .product-cost.active #price-change').innerHTML=updated_price.toFixed(2);
    //                 if( $(reponsiveClass+' .product-cost.active #price-change-unit')!==null){
    //                     $(reponsiveClass+' .product-cost.active #price-change-unit').innerHTML=updated_price_unit.toFixed(2);
    //                 }
    //             }
    //         }
    //         if(currQCount==1){
    //             $(this).addClass('disabled');
    //             $(this).attr('disabled', true);
    //         }else{
    //             $(this).attr('disabled', false);
    //         }
    //  });


    function getCurrQCount($currObj){
        return $currObj.siblings(".textbox-small").val();
    }

    function updateData($currObj, currQCount){
        $currObj.siblings(".textbox-small").val(currQCount);

        var $parentObj = $currObj.closest(".product-cost no-padding");
        var itemPrice = $parentObj.find(".rupee unitprice").attr("data-price");
        var itemCost = Number(itemPrice) * currQCount;
        $parentObj.find(".unitprice").text(itemCost);

        var subTotal = getSubTotal();
        var vatAmount = getVatAmount();
        var totalCost = subTotal + vatAmount;
        $("#subtotal").text(subTotal);
        $("#total_vat").text(vatAmount);
        $("#total_cost").text(totalCost);
    }

    function getSubTotal(){
        var subTotal = 0;
        $(".item-cost-val").each(function() {
            subTotal+= Number($(this).text());
        });
        return subTotal;
    }

    function getVatAmount(){
        var vatPercentage = 0.2;
        return vatPercentage * getSubTotal();
    }

});

// // show more show less
// $(document).ready(function (i) {
//     $('.loadMore div.thumbnail:lt(3)').show();
//     $('.less').hide();
//     var items =  1000;
//     var shown =  3;
//     $('.more').click(function () {
//         $('.less').show();
//         shown = $('.loadMore div.thumbnail:visible').length+3;
//         if(shown< items) {
//           $('.loadMore div.thumbnail:lt('+shown+')').show(300);
//          if($(".review-loop").length ==  $('.loadMore div.thumbnail:lt('+shown+')').length){
//         $('.more').hide();
//         }else{
//         $('.more').show();
//          }
//         } else {
//           $('.loadMore div.thumbnail:lt('+items+')').show(300);
//           $('.more').hide();
//         }
//     });

//     $('.less').click(function () {
//         $('.loadMore div.thumbnail').not(':lt(3)').hide(300);
//         $('.more').show();
//         $('.less').hide();

//     });
  
// });
$(document).ready(function(){

    $('.checkout .textbox-left').on('click', function(ev) {
        ev.preventDefault();
        var a = parseInt(jQuery(this).parents('.formCol').find('.textbox-small').val())+1;
        jQuery(this).parents('.formCol').find('.textbox-small').val(a);

        var qtyyy = $(this).parent('.preloadtd').find('#dummyQty').val();
        console.log(qtyyy);
        if(qtyyy==1){
            $(this).siblings('.textbox-right').attr('disabled', false);
        }else{
            $(this).siblings('.textbox-right').attr('disabled', false);
        }
        var price = $(this).parent('.preloadtd').siblings('.products-pricing').find('.check-prc').val();
        var regPriceDiv = $(this).parent('.preloadtd').siblings('.products-pricing').find('.reg_prc');
        var unit_price = $(this).parent('.preloadtd').siblings('.products-pricing').find('.unit-prc').val();
        var unitPriceDiv = $(this).parent('.preloadtd').siblings('.products-pricing').find('.unitprice');
        var new_reg_price = '₹'+(price*qtyyy).toFixed(2);
        regPriceDiv[0].innerHTML=new_reg_price;
        var new_unit_price = '₹'+(unit_price*qtyyy).toFixed(2);
        unitPriceDiv[0].innerHTML=new_unit_price;

        var totalPrice = 0;
        var totalUnitPrice = 0;
        var discountPrice = 0;
        $('.reg_prc').each(function(indexReg){
            var self = this;
            totalPrice += parseInt($(self).html().split('₹')[1], 10);
            $( ".unitprice" ).text(function( index, elm ) {
                if(index==indexReg){
                    discountPrice += (elm=='' || elm=='₹NaN' || elm==NaN) ? 0 : (parseInt(elm.split('₹')[1], 10) - parseInt($(self).html().split('₹')[1], 10))
                }
            })
        })
        $('.unitprice').each(function(index, elem){
            totalUnitPrice += parseInt($(this).html().split('₹')[1], 10);
        })
        var shipingDiv = $('.shipping_cart').find('.amount').html();
        var shipingDivCost = parseInt(shipingDiv.split('<span class="woocommerce-Price-currencySymbol">₹</span>')[1]);

        $('.subtotal').find('.amount')[0].innerHTML = '₹'+totalPrice.toFixed(2);
        $('.discount').find('.products-symbol')[0].innerHTML = discountPrice;
        $('.total').find('.amount')[0].innerHTML = '₹'+(totalPrice+shipingDivCost).toFixed(2);

    });
    
    $('.checkout .textbox-right').on('click', function(ev) {
        ev.preventDefault();
        var a = parseInt(jQuery(this).parents('.formCol').find('.textbox-small').val())-1;
        jQuery(this).parents('.formCol').find('.textbox-small').val(a);var qtyyy = $(this).parent('.preloadtd').find('#dummyQty').val();
        var price = $(this).parent('.preloadtd').siblings('.products-pricing').find('.check-prc').val();
        var regPriceDiv = $(this).parent('.preloadtd').siblings('.products-pricing').find('.reg_prc');
        var unit_price = $(this).parent('.preloadtd').siblings('.products-pricing').find('.unit-prc').val();
        var unitPriceDiv = $(this).parent('.preloadtd').siblings('.products-pricing').find('.unitprice');
        var new_reg_price = '₹'+(price*qtyyy).toFixed(2);
        regPriceDiv[0].innerHTML=new_reg_price;
        var new_unit_price = '₹'+(unit_price*qtyyy).toFixed(2);
        unitPriceDiv[0].innerHTML=new_unit_price;

        var totalPrice = 0;
        var totalUnitPrice = 0;
        var discountPrice = 0;
        $('.reg_prc').each(function(indexReg){
            var self = this;
            totalPrice += parseInt($(self).html().split('₹')[1], 10);
            $( ".unitprice" ).text(function( index, elm ) {
                if(index==indexReg){
                    discountPrice += (elm=='' || elm=='₹NaN' || elm==NaN) ? 0 : (parseInt(elm.split('₹')[1], 10) - parseInt($(self).html().split('₹')[1], 10))
                }
            })
        })
        $('.unitprice').each(function(index, elem){
            totalUnitPrice += parseInt($(this).html().split('₹')[1], 10);
        })
        var shipingDiv = $('.shipping_cart').find('.amount').html();
        var shipingDivCost = parseInt(shipingDiv.split('<span class="woocommerce-Price-currencySymbol">₹</span>')[1]);

        $('.subtotal').find('.amount')[0].innerHTML = '₹'+totalPrice.toFixed(2);
        $('.discount').find('.products-symbol')[0].innerHTML = discountPrice;
        $('.total').find('.amount')[0].innerHTML = '₹'+(totalPrice+shipingDivCost).toFixed(2);

    });

});

$(document).ready(function(){

$('.addaddress_form label').removeClass('floating-item');
    if($(window).width() < 640 ) {
$('.woocommerce .woocommerce-checkout').parents('.col-7').removeClass('col-7').addClass('row');
$('.woocommerce .woocommerce-order').parents('.col-7').removeClass('col-7').addClass('row');
}
$('.woocommerce .woocommerce-checkout').parents('.col-7').removeClass('col-7');
$('.woocommerce .woocommerce-order').parents('.col-7').removeClass('col-7');
    $('.addaddress_form #billing_country_field').find('label').hide();
	
//payu
	$('.payu_details').parents('.col-7').addClass('center-block pay_hide');
	$('.myaccount-section').find('.pay_hide').parent().addClass('hide');
	$('.hide').find('.myaccount-heading h1').html('Order Confirmation');
	$('.hide').find('.myaccount-heading .col-7').addClass('center-block');	
	$('.hide').find('.myaccount-heading p').hide();
	$('.hide').find('.myaccount-heading .add_new_btn').hide();
	$('.hide').parent().addClass('payment_hide');
	$('.payment_hide').find('.section-start').hide();

$('.single_add').find('.col-6').removeClass('col-6');

$('.register.center-block').find('.row').removeClass('row');
$('.single_add').find('.input-email-active').removeClass('input-email-active');
});


$('#sign_in').click(function(e) {
    var email = $('#email').val();
    var password = $('#password').val();
     var x = 0;
    var regex = /^[a-z0-9]([a-z0-9_\-\.]*)@([a-z0-9_\-\.]*)(\.[a-z]{2,3}(\.[a-z]{2}){0,2})$/i;
     var $input = $('.login .input-item.validate');
     var $inputVal = $input.val();
     $input.each(function() {
         var $thisValue = $(this).val().trim();
         var $errorText = $(this).parents('.form-row').find('label').attr('data-error');
         if ($thisValue.length == 0) {
             $(this).parents('.form-row').addClass('error-row');
             if ($(this).parents('.form-row').find('.error-message').length == 0) {

                 $('<div class="error-message">' + $errorText + '</div>').appendTo($(this).parents('.form-row')).slideDown();
             }
             x++;
         } else {
             $(this).parents('.form-row').removeClass('error-row');
             $(this).parents('.form-row').find('.error-message').remove();
         }
     });

    
                        if(email !=''){
                            if(!regex.test(email)){
                                $('#email').parents('.form-row').addClass('error-row');
                                if($('#email').parents('.form-row').find('.error-message').length==0) {
                                    $('<div class="error-message">Please enter a valid email address</div>').appendTo($('#email').parents('.form-row')).slideDown();
                                    event.preventDefault();
                                }
                                else {
                
                                }
                                $x++;
                            }else{
                                $('#email').parents('.form-row').removeClass('error-row');
                                 $('#email').parents('.form-row').find('.error-message').remove();
                            }
                        }

    

     if (x > 0) {
     event.preventDefault();
     return false;
    } 
    else{ 
       return true;
     }
});


//global success
 jQuery(".theme-globalsucess .close-button").click(function()
  {
jQuery(".theme-globalsucess").slideUp(500);

});

$(document).ready(function(){

if($('.color-pick a').attr('data-colour')== 'NULL'){
    $('.color-pick').hide();
}else{
    $('.color-pick').show();
}

});
$('.sub-nav').prev().removeClass('nosub-nav');
$('.sub-nav').prev().addClass('angle_icon');
$('.angle_icon').after('<i class="fa fa-angle-down"></i>');



// $(document).ready(function(){



// $('.noshow').find('.col-4').each(function(i) {
//         $(this).delay(100 * i).fadeIn(500).addClass(i);
//     });

// });