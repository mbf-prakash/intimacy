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

function removevoucher()
{
    var coup_val = $('#couponcodechk').val();
    $.ajax({
        url: templateUri + "/remove-coupon.php",
        type: 'POST',
        data: {couponvalue: coup_val},
        success: function (result) {
            console.log(result);
            $("#woocart").load("cartnew/",function () {
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
/*resgister form validation*/

//  jQuery( document ).on('click',"#register_btn",function() {
//      var name=jQuery('#first_name').val();
//      var email=jQuery('#email').val();
//      var password=jQuery('#password').val();
//      var last_name=jQuery('#last_name').val();
//      // var cpassword=jQuery('#confirm_password').val();
//      var regex = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
//      var x=0;
//       if (name=='' || name == undefined) {
//        jQuery('#error_name').parents('row').addClass('error-message');
//        jQuery('#error_name').text("Please enter your first name").show();
//        x++;
//       } else {
//        jQuery('#error_name').parents('row').removeClass('error-message');
//        jQuery('#error_name').hide();
//       }

//       if (last_name=='' || last_name == undefined) {
//        jQuery('#error_lname').parents('row').addClass('error-message');
//        jQuery('#error_lname').text("Please enter your last name").show();
//        x++;
//       } else {
//        jQuery('#error_lname').parents('row').removeClass('error-message');
//        jQuery('#error_lname').hide();
//       }

//       if (password=='' || password == undefined) {
//        jQuery('#error_password').parents('row').addClass('error-message');
//        jQuery('#error_password').text("Please enter a password").show();
//        x++;
//       } else {
//        jQuery('#error_password').parents('row').removeClass('error-message');
//        jQuery('#error_password').hide();
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
//             data: {action: "register",name: first_name,last_name: last_name, email: email,password: password, cpassword: confirm_password},
//                   }).done(function (data) {
//             if(data.trim()==1) {
//                 window.location.href = blogUri+"/my-account/";
//             } else {
//                 console.log(data);
//                 jQuery('#content').text(data);
//                 jQuery('.hover_bkgr_fricc').css('display','block');
//             }
//         });
//       event.preventDefault();
//      }

// else{

//       event.preventDefault();
//    }
//    });




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



jQuery(document).on("click", "#update_account", function(e) {
        var regFname = $('#firstname').val();
        var regLname = $('#last_name').val();
        var regEmail = $("#email").val();
        var userid = $("#userid").val();
        var regex = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        var x=0;
      console.log(regFname);
      console.log(regLname);
      console.log(regEmail);

        if (regFname=='' || regFname == undefined) {
       jQuery('#error_name').parents('row').addClass('error-message');
       jQuery('#error_name').text("Please enter your first name").show();
       x++;
      } else {
       jQuery('#error_name').parents('row').removeClass('error-message');
       jQuery('#error_name').hide();
      }

      if (regLname=='' || regLname == undefined) {
       jQuery('#error_lname').parents('row').addClass('error-message');
       jQuery('#error_lname').text("Please enter your last name").show();
       x++;
      } else {
       jQuery('#error_lname').parents('row').removeClass('error-message');
       jQuery('#error_lname').hide();
      }
      if (x==0) {

        $.ajax({
            type: "POST",
            url: templateUri+"/ajax/ajax-account.php",
            data: {action: "save_details",'userid':userid,'regFname': regFname,'regLname': regLname, 'regEmail': regEmail}
                  }).done(function (data) {
                                   $('.woocommerce-notices-wrapper').html('<div class="theme-globalsucess" role="alert"><strong>Changes Saved Successfully.</strong><i class="fa fa-times-circle close-button"></i></div>');
            if(data.trim()==1) {
                window.location.href = blogUri+"/my-account/";
            } else {
                // console.log(data);
                // jQuery('#content').text(data);
                // jQuery('.hover_bkgr_fricc').css('display','block');
            }
        });
      event.preventDefault();
      }
});

//news letter
[].slice.call( document.querySelectorAll('#newsletter') ).forEach( function( bttn ) {
        new ProgressButton( bttn, {

        callback : function( instance ) {
        var progress = 0,
        interval = setInterval( function() {
            progress = Math.min( progress + Math.random() * 0.2);
            instance._setProgress( progress );
        }, 100);
      var chckboxVal=$('#checkbox1').prop('checked');
      var regFname = $('#firstname').val();
      var regLname = $('#last_name').val();
      var regEmail = $("#email").val();
      if(chckboxVal){
 currentRequest = $.ajax({
              type: "POST",
              dataType: "text",
              url: templateUri+"/ajax/ajax-subscribe.php",
              data: {action: "subscribed",'fname': regFname,'lname': regLname, 'email': regEmail},
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
});
//password check

$(".toggle-password").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $(this).parents('.floating-item').find('input');
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

//on blur ajax

function checkPassword(){
var checkpswd = $('#current_password').val();
var userid = $("#userid").val();
// if(checkpswd == ''){
//     $('#password-err').hide();
// }else{
//         $('#password-err').show();
// }

$.ajax({
      type: "POST",
      dataType: "text",
      url: templateUri+"/ajax/password-check.php",
      data: {action: "checked",'userid': userid,'current_password': checkpswd },
            }).done(function (data) {
            if(data ==3) {
            $("#password-err").hide();
            }
              if(data ==2) {
              $("#password-err").show();
              }
              else{
                $("#password-err").hide();
              }
  });
}

/*************************
* Product Details Page functionality for Price show
*************************/
$(document).ready(function() {
 
  if($('a.color_attr').length > 0){
    setTimeout(function() { 
        $('a.color_attr').first().click();
    }, 2000);
  }

    $(".color_attr").click(function(){
    var prod_colors = this.getAttribute('data-colour');
    var prod_size = $(document).find('#ui-id-1').val();
    var prod_fit = $(document).find('#ui-id-2').val();
   var bgWhite1 = $(this).find('.color-pad-bg').attr('style') == 'background-color: #FFFAFA';
        var bgWhite2 = $(this).find('.color-pad-bg').attr('style') == 'background-color: #FFFFFF';
        var bgWhite3 = $(this).find('.color-pad-bg').attr('style') == 'background-color: #FFFFFE';
        if(bgWhite1 || bgWhite2 || bgWhite3){
            $(this).parent().addClass("inverse");
        $(this).children('.color-pad-bg').addClass('inverse');  
        $(this).children('.color-pad-bg').addClass('active');   
        }else{
    $(this).children('.color-pad-bg').addClass('active');
            $(this).children('.color-pad-bg').removeClass('inverse');  

    }
    $(".color-pad-bg").not($(this).children('.color-pad-bg')).removeClass('active');
    $('.product-cost').each(function(){
      if($(this).attr('data-clr') == prod_colors && $(this).attr('data-size') == prod_size && $(this).attr('data-fit') == prod_fit){
        
        $(this).show(); 
        $(this).addClass('prodid');
        parseInt($('#qtyprod').val(1));
        $('.product').find('.textbox-left').attr('disabled', false);
        var stck_qty = $(document).find('.product-cost.prodid').attr('data-stck');
        if(stck_qty == 0){
          $('.product-cart').hide();
          $('.stock_var').show();
          $('.product-size-text.qty').hide();
        }else{
          $('.product-cart').show();
          $('.stock_var').hide();
          $('.product-size-text.qty').show();
        }
        
      }else if($(this).attr('data-clr') == prod_colors && $(this).attr('data-size') == prod_size && $(this).attr('data-fit') == ''  && $(this).attr('data-pre') == prod_fit){
        $(this).show(); 
        $(this).addClass('prodid');
        parseInt($('#qtyprod').val(1));
        $('.product').find('.textbox-left').attr('disabled', false);
        var stck_qty = $(document).find('.product-cost.prodid').attr('data-stck');
        if(stck_qty == 0){
          $('.product-cart').hide();
          $('.stock_var').show();
          $('.product-size-text.qty').hide();
        }else{
          $('.product-cart').show();
          $('.stock_var').hide();
          $('.product-size-text.qty').show();
        }

      }else if($(this).attr('data-clr') == prod_colors && $(this).attr('data-size') == prod_size && $(this).attr('data-fit') == '' && $(this).attr('data-pre') == ''){
		$(this).show(); 
        $(this).addClass('prodid');
        parseInt($('#qtyprod').val(1));
        $('.product').find('.textbox-left').attr('disabled', false);
        var stck_qty = $(document).find('.product-cost.prodid').attr('data-stck');
        if(stck_qty == 0){
          $('.product-cart').hide();
          $('.stock_var').show();
          $('.product-size-text.qty').hide();
        }else{
          $('.product-cart').show();
          $('.stock_var').hide();
          $('.product-size-text.qty').show();
        }
		
		}else if($(this).attr('data-clr') == prod_colors && $(this).attr('data-size') == prod_size && $(this).attr('data-pre') == prod_fit && $(this).attr('data-fit') == ''){
	    $(this).show(); 
        $(this).addClass('prodid');
        parseInt($('#qtyprod').val(1));
        $('.product').find('.textbox-left').attr('disabled', false);
        var stck_qty = $(document).find('.product-cost.prodid').attr('data-stck');
        if(stck_qty == 0){
          $('.product-cart').hide();
          $('.stock_var').show();
          $('.product-size-text.qty').hide();
        }else{
          $('.product-cart').show();
          $('.stock_var').hide();
          $('.product-size-text.qty').show();
        }	   
	  }else{
        
        $(this).hide();
        $(this).removeClass('prodid');
      }
    });
    $('.sku_number').each(function(){
      if($(this).attr('data-clr') == prod_colors && $(this).attr('data-size') == prod_size && $(this).attr('data-fit') == prod_fit){
        $(this).show();         
      }else{
        
        $(this).hide();
        $(this).removeClass('prodid');
      }
    });
   });
    $('.loader:first-child').click();
  $(".pdp-menu").on('selectmenuchange', function(){
      var prod_fit = $(document).find('#ui-id-2').val();
      var prod_colors = $(".color_attr").attr('data-colour');
      var prod_size = $(this).val();
      $('.product-cost').each(function(){
      if($(this).attr('data-clr') == prod_colors && $(this).attr('data-size') == prod_size && $(this).attr('data-fit') == prod_fit){
        $(this).show(); 
        $(this).addClass('prodid');
        parseInt($('#qtyprod').val(1));
          $('.product').find('.textbox-left').attr('disabled', false);
           var stck_qty = $(document).find('.product-cost.prodid').attr('data-stck');
        if(stck_qty == 0){
          $('.product-cart').hide();
          $('.stock_var').show();
        }else{
          $('.product-cart').show();
          $('.stock_var').hide();
        }

      }else if($(this).attr('data-clr') == '' && $(this).attr('data-size') == prod_size && $(this).attr('data-fit') == prod_fit){
        $(this).show(); 
        $(this).addClass('prodid');
        parseInt($('#qtyprod').val(1));
          $('.product').find('.textbox-left').attr('disabled', false);
           var stck_qty = $(document).find('.product-cost.prodid').attr('data-stck');
        if(stck_qty == 0){
          $('.product-cart').hide();
          $('.stock_var').show();
        }else{
          $('.product-cart').show();
          $('.stock_var').hide();
        }
      }else if($(this).attr('data-clr') == prod_colors && $(this).attr('data-size') == prod_size && $(this).attr('data-pre') == prod_fit){
         $(this).show(); 
        $(this).addClass('prodid');
        parseInt($('#qtyprod').val(1));
          $('.product').find('.textbox-left').attr('disabled', false);
           var stck_qty = $(document).find('.product-cost.prodid').attr('data-stck');
        if(stck_qty == 0){
          $('.product-cart').hide();
          $('.stock_var').show();
        }else{
          $('.product-cart').show();
          $('.stock_var').hide();
        }
      }else{
        $(this).hide();
        $(this).removeClass('prodid');
      }
    
    });
       $('.sku_number').each(function(){
      if($(this).attr('data-clr') == prod_colors && $(this).attr('data-size') == prod_size && $(this).attr('data-fit') == prod_fit){
        $(this).show();         
      }else{
        
        $(this).hide();
        $(this).removeClass('prodid');
      }
    });
  });

  $(".fit-menu").on('selectmenuchange', function(){
      var prod_size = $(document).find('#ui-id-1').val();
      var prod_colors = $(".color_attr").attr('data-colour');
      var prod_fit = $(this).val();
      $('.product-cost').each(function(){
      if($(this).attr('data-clr') == prod_colors && $(this).attr('data-size') == prod_size && $(this).attr('data-fit') == prod_fit){
        $(this).show(); 
        $(this).addClass('prodid');
        parseInt($('#qtyprod').val(1));
        $('.product').find('.textbox-left').attr('disabled', false);
         var stck_qty = $(document).find('.product-cost.prodid').attr('data-stck');
        if(stck_qty == 0){
          $('.product-cart').hide();
          $('.stock_var').show();
        }else{
          $('.product-cart').show();
          $('.stock_var').hide();
        }

      }else if ($(this).attr('data-clr') == '' && $(this).attr('data-size') == prod_size && $(this).attr('data-fit') == prod_fit){
        $(this).show(); 
        $(this).addClass('prodid');
        parseInt($('#qtyprod').val(1));
        $('.product').find('.textbox-left').attr('disabled', false);
         var stck_qty = $(document).find('.product-cost.prodid').attr('data-stck');
        if(stck_qty == 0){
          $('.product-cart').hide();
          $('.stock_var').show();
        }else{
          $('.product-cart').show();
          $('.stock_var').hide();
        }

      }else if ($(this).attr('data-clr') == prod_colors && $(this).attr('data-size') == prod_size && $(this).attr('data-pre') == prod_fit){
        $(this).show(); 
        $(this).addClass('prodid');
        parseInt($('#qtyprod').val(1));
        $('.product').find('.textbox-left').attr('disabled', false);
         var stck_qty = $(document).find('.product-cost.prodid').attr('data-stck');
        if(stck_qty == 0){
          $('.product-cart').hide();
          $('.stock_var').show();
        }else{
          $('.product-cart').show();
          $('.stock_var').hide();
        }

      }else{
        $(this).hide();
        $(this).removeClass('prodid');
      }
    
    });
       $('.sku_number').each(function(){
      if($(this).attr('data-clr') == prod_colors && $(this).attr('data-size') == prod_size && $(this).attr('data-fit') == prod_fit){
        $(this).show();         
      }else{
        
        $(this).hide();
        $(this).removeClass('prodid');
      }
    });
  });
  $(".setid").click(function(){
    var prodid = $(document).find('.prodid').attr('data-id');
    $("#variation_id").val(prodid);
  });
  $("#qtyprod-left").click(function(){
  var prodid = $(document).find('.prodid').attr('data-id');
  $("#variation_id").val(prodid);
  var stck_qty = $(document).find('.product-cost.prodid').attr('data-stck');
  var qty_left = parseInt($('#qtyprod').val());
  console.log(qty_left);
  console.log(stck_qty);
if(qty_left >= stck_qty ){
$('.preloadtd').find('#qtyprod-left').attr('disabled', true);
$('.stock_var').show();

}else{
  $('.product').find('.textbox-left').attr('disabled', false);
  $('.stock_var').hide();
}

});


  $(".textbox-right").click(function(){

  var stck_qty = $(document).find('.product-cost.prodid').attr('data-stck');
  var qty_left = parseInt($('#qtyprod').val())-1;
  if(qty_left != stck_qty ){
  $('.preloadtd').find('#qtyprod-left').attr('disabled', false);
  $('.stock_var').hide();

  }else{
  $('.product').find('.textbox-left').attr('disabled', true);
  $('.stock_var').show();
  }

});


});





$(".add_address").click(function(){

    window.location.href = blogUri+"/add-address/";

});


//relocation active tab

$(document).ready(function() {
    if (window.location.href.indexOf("?tab=address") > -1) {

        $('.myaccount-sidetab ul li').each(function(){

            if($(this).attr('value') == '#address'){
                $(this).addClass('active');

            }else{
                $(this).removeClass('active');
            }
        });

        $('.myaccount-form .myaccount-subform').each(function(){

            if($(this).attr('id') == 'address'){
                $(this).addClass('active');
                $(this).find('.accord').addClass('active');
                 $(this).find('.subformtab').addClass('active');

            }else{
                $(this).removeClass('active');
                $(this).find('.accord').removeClass('active');
                 $(this).find('.subformtab').removeClass('active');
            }
        });

       

    }
            if (window.location.href.indexOf("my-account/?tab=deleteAddress") > -1) {

        $('.myaccount-sidetab ul li').each(function(){

            if($(this).attr('value') == '#address'){
                $(this).addClass('active');

            }else{
                $(this).removeClass('active');
            }
        });

        $('.myaccount-form .myaccount-subform').each(function(){

            if($(this).attr('id') == 'address'){
                $(this).addClass('active');
                $(this).find('.accord').addClass('active');
                 $(this).find('.subformtab').addClass('active');

            }else{
                $(this).removeClass('active');
                $(this).find('.accord').removeClass('active');
                $(this).find('.subformtab').removeClass('active');
            }
        });

       
    }   

  });


$(document).ready(function() {
    if (window.location.href.indexOf("add-address") > -1) {

        $('.myaccount-sidetab ul li').each(function(){

            if($(this).attr('value') == '#address'){
                $(this).addClass('active');

            }else{
                $(this).removeClass('active');
            }
        });

        $('.myaccount-form .myaccount-subform').each(function(){


            if($(this).attr('id') == 'address'){
                $(this).addClass('active');
                $(this).find('.accord').addClass('active');
                 $(this).find('.subformtab').addClass('active');

            }else{
                $(this).removeClass('active');
                $(this).find('.accord').removeClass('active');
                 $(this).find('.subformtab').removeClass('active');

            }
        });

       

    }
            if (window.location.href.indexOf("edit-address") > -1) {

        $('.myaccount-sidetab ul li').each(function(){

            if($(this).attr('value') == '#address'){
                $(this).addClass('active');

            }else{
                $(this).removeClass('active');
            }
        });

        $('.myaccount-form .myaccount-subform').each(function(){

            if($(this).attr('id') == 'address'){
                $(this).addClass('active');
                $(this).find('.accord').addClass('active');
                 $(this).find('.subformtab').addClass('active');

            }else{
                $(this).removeClass('active');
                $(this).find('.accord').removeClass('active');
                $(this).find('.subformtab').removeClass('active');
            }
        });

       
    }   


 if (window.location.href.indexOf("view-order") > -1) {

        $('.myaccount-sidetab ul li').each(function(){

            if($(this).attr('value') == '#vieworder'){
                $(this).addClass('active');

            }else{
                $(this).removeClass('active');
            }
        });

        $('.myaccount-form .myaccount-subform').each(function(){

            if($(this).attr('id') == 'vieworder'){
                $(this).addClass('active');
                $(this).find('.accord').addClass('active');
                 $(this).find('.subformtab').addClass('active');

            }else{
                $(this).removeClass('active');
                $(this).find('.accord').removeClass('active');
                $(this).find('.subformtab').removeClass('active');
            }
        });

       
    }   



  });



  // multiple address

$('.formsection_trigger').click(function(){

        if($(this)){
            $('.single_add.checkout_submit').attr('onClick','addaddress(blogurl,templateUri,userid)');
        }else{
            $('.single_add.checkout_submit').removeAttr('onClick');
        }

        $('.woocommerce-checkout #billing_first_name').removeClass("input-email-active");
        $('.woocommerce-checkout #billing_last_name').removeClass("input-email-active");
        $('.woocommerce-checkout #billing_email').removeClass("input-email-active");
        $('.woocommerce-checkout #billing_address_1').removeClass("input-email-active");
        $('.woocommerce-checkout #billing_address_2').removeClass("input-email-active");
        $('.woocommerce-checkout #billing_city').removeClass("input-email-active");
        $('.woocommerce-checkout #select_state').removeClass("input-email-active");
        $('.woocommerce-checkout #billing_postcode').removeClass("input-email-active");
        $('.woocommerce-checkout #billing_phone').removeClass("input-email-active");
        $('.woocommerce-checkout #billing_first_name').val("");
        $('.woocommerce-checkout #billing_last_name').val("");
        $('.woocommerce-checkout #billing_email').val("");
        $('.woocommerce-checkout #billing_address_1').val("");
        $('.woocommerce-checkout #billing_address_2').val("");
        $('.woocommerce-checkout #billing_city').val("");
        $('.woocommerce-checkout #billing_state').val("");
        $('.woocommerce-checkout #billing_postcode').val("");
        $('.woocommerce-checkout #billing_phone').val("");
        if($('.ui-selectmenu-text.placeholder').html()=="County (Optional)"){
                $('.ui-selectmenu-text').show();

        }else{
             $('.ui-selectmenu-text').hide();
        }


});


$('input[type=radio][name=placement]').change(function() {
    var $this = $(this).val();

    const selectVal = $this;
    if(selectVal!=undefined) {
        const [first_name, last_name, email_address, phone_number, address1, address2, city, county, postcode] = selectVal.split('~');

        $('.woocommerce-checkout #billing_first_name').val(first_name);
        $('.woocommerce-checkout #billing_last_name').val(last_name);
        $('.woocommerce-checkout #billing_email').val(email_address);
        $('.woocommerce-checkout #billing_address_1').val(address1);
        $('.woocommerce-checkout #billing_address_2').val(address2);
        $('.woocommerce-checkout #billing_city').val(city);
        $('.woocommerce-checkout #billing_state').val(county);
        $('.woocommerce-checkout #billing_postcode').val(postcode);
        $('.woocommerce-checkout #billing_phone').val(phone_number);
    }
    $('.error-message').css("display","none");
});
$('input[type=radio][name=placement]').click(function() {
    var $this = $(this).val();
    const selectVal = $this;
    if(selectVal!=undefined) {
        const [first_name, last_name, email_address, phone_number, address1, address2, city, county, postcode, address_key] = selectVal.split('~');
        $('.woocommerce-checkout #billing_first_name').val(first_name);
        $('.woocommerce-checkout #billing_last_name').val(last_name);
        $('.woocommerce-checkout #billing_email').val(email_address);
        $('.woocommerce-checkout #billing_address_1').val(address1);
        $('.woocommerce-checkout #billing_address_2').val(address2);
        $('.woocommerce-checkout #billing_city').val(city);
        $('.woocommerce-checkout #billing_state').val(county);
        $('.woocommerce-checkout #billing_postcode').val(postcode);
        $('.woocommerce-checkout #billing_phone').val(phone_number);  
        $('.woocommerce-checkout #billing_first_name').addClass("input-email-active");
        $('.woocommerce-checkout #billing_last_name').addClass("input-email-active");
        $('.woocommerce-checkout #billing_email').addClass("input-email-active");
        $('.woocommerce-checkout #billing_address_1').addClass("input-email-active");
        $('.woocommerce-checkout #billing_address_2').addClass("input-email-active");
        $('.woocommerce-checkout #billing_city').addClass("input-email-active");  
        $('.woocommerce-checkout #select_state').addClass("input-email-active");
        $('.woocommerce-checkout #billing_postcode').addClass("input-email-active");
        $('.woocommerce-checkout #billing_phone').addClass("input-email-active");


        // alert($('#billing_state_field :selected').val() == county);
        $('.ui-selectmenu-text').show();
        $('#billing_state_field .ui-selectmenu-text').html(county);
        $('.ui-selectmenu-placeholder.placeholder').addClass('float-placeholder');
            $('.checkout_submit').removeAttr('onClick');



    }
    $('.error-message').css("display","none");
});

$(document).ready(function() {
        $('.multiple_add #billing_first_name').addClass("input-email-active");
        $('.multiple_add #billing_last_name').addClass("input-email-active");
        $('.multiple_add #billing_email').addClass("input-email-active");
        $('.multiple_add #billing_address_1').addClass("input-email-active");
        $('.multiple_add #billing_address_2').addClass("input-email-active");
        $('.multiple_add #billing_city').addClass("input-email-active");  
        $('.multiple_add #select_state').addClass("input-email-active");
        $('.multiple_add #billing_postcode').addClass("input-email-active");
        $('.multiple_add #billing_phone').addClass("input-email-active");

        $('.woocommerce-checkout #billing_first_name').val("");
        $('.woocommerce-checkout #billing_last_name').val("");
        $('.woocommerce-checkout #billing_email').val("");
        $('.woocommerce-checkout #billing_address_1').val("");
        $('.woocommerce-checkout #billing_address_2').val("");
        $('.woocommerce-checkout #billing_city').val("");
        $('.woocommerce-checkout #billing_state').val("");
        $('.woocommerce-checkout #billing_postcode').val("");
        $('.woocommerce-checkout #billing_phone').val("");
  $('.multiple_add #billing_address_2').addClass("input-email-active");
  
if($('input[type=radio][name=placement]:first').prop('checked', true)){

}
$('input[type=radio][name=placement]:first').prop('checked', true);

    var $this = $('input[type=radio][name=placement]:first').val();

    const selectVal = $this;
    if(selectVal!=undefined) {
        const [first_name, last_name, email_address, phone_number, address1, address2, city, county, postcode, address_key] = selectVal.split('~');
        $('.woocommerce-checkout #billing_first_name').val(first_name);
        $('.woocommerce-checkout #billing_last_name').val(last_name);
        $('.woocommerce-checkout #billing_email').val(email_address);
        $('.woocommerce-checkout #billing_address_1').val(address1);
        $('.woocommerce-checkout #billing_address_2').val(address2);
        $('.woocommerce-checkout #billing_city').val(city);
        $('.woocommerce-checkout #billing_state').val(county);
        $('.woocommerce-checkout #billing_postcode').val(postcode);
        $('.woocommerce-checkout #billing_phone').val(phone_number);
        $('#billing_state_field .ui-selectmenu-text').html(county);
        $('.ui-selectmenu-placeholder.placeholder').addClass('float-placeholder');

    }

});


//select menu county



$(function(){

$('.select-row').find('.ui-selectmenu-text').each(function () {

if($(this).html() != 'State (Optional)'){

$('.select-row').find('.ui-selectmenu-placeholder').addClass('float-placeholder');  

}
if($(this).html() == 'State (Optional)'){

    $('.select-row').find('.ui-selectmenu-placeholder').removeClass('float-placeholder');  
}


});


});


//delete address

$('.deleteButton').click(function(){
        var datakey = $(this).attr('data-key');
        $('.data-key').val(datakey);
        $('.deleteForm').submit();

});



//checkout page save address

function addaddress(blogurl="",templateUri,custid) {
        var regFname = $('#billing_first_name').val();
        var regLname = $('#billing_last_name').val();
        var regPhone = $("#billing_phone").val();
        var regAddress = $("#billing_address_1").val();
        var regAddress2 = $("#billing_address_2").val();
        var regCity = $("#billing_city").val();
        var regPostcode = $("#billing_postcode").val();
        var x = 0;
        var $input = $('.checkout .floating-item-input.validate');
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

        /* min 3 char in name*/
    if (x == 0) {
    var first_name = document.getElementById("billing_first_name").value;
    var last_name = document.getElementById("billing_last_name").value;
    var email_address = document.getElementById("billing_email").value;
    var phone_number = document.getElementById("billing_phone").value;
    var address1 = document.getElementById("billing_address_1").value;
    var address2 = document.getElementById("billing_address_2").value;
    var city =document.getElementById("billing_city").value;
    var country =document.getElementById("billing_country").value;
    var county =document.getElementById("billing_state").value;
    var postcode = document.getElementById("billing_postcode").value;

    
        $.ajax({
            type: "POST",
            data:{firstname:first_name,lastname:last_name,email_address:email_address,phone_number:phone_number,address1:address1,address2:address2,city:city,county:county,postcode:postcode,country:country},
            url: templateUri + '/ajax/ajaxadd.php',

            success: function(data) {
                    // location.reload();
                    obj = JSON.parse(data);
                    console.log(obj.address_key);
                    // window.location= blogurl+'/checkout/?editedlast='+obj.address_key;
            }
        });
        return true;
    } else {
        event.preventDefault();
        return false;
    }
    

}



$('.formsection_trigger').click(function(){

$('html, body').animate({
        scrollTop: $("#formsection").offset().top-30
    }, 1000); 
$('input[name="placement"]').prop('checked', false);

});

$('.radiocheckbilling').click(function(){
   $('html, body').animate({
        scrollTop: $("#formsection").offset().top-30
    }, 1000); 
});

/*****Filter *****/ 
function unique(list) {
    var result = [];
    $.each(list, function(i, e) {
        if ($.inArray(e, result) == -1) result.push(e);
    });
    return result;
}

//checkout save address
function addaddress(blogurl="",templateUri,custid) {
        var regFname = $('#billing_first_name').val();
        var regLname = $('#billing_last_name').val();
        var regPhone = $("#billing_phone").val();
        var regAddress = $("#billing_address_1").val();
        var regAddress2 = $("#billing_address_2").val();
        var regCity = $("#billing_city").val();
        var regPostcode = $("#billing_postcode").val();
        var x = 0;
        var $input = $('.checkout .floating-item-input.validate');
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

        /* min 3 char in name*/
    if (x == 0) {
    var first_name = document.getElementById("billing_first_name").value;
    var last_name = document.getElementById("billing_last_name").value;
    var email_address = document.getElementById("billing_email").value;
    var phone_number = document.getElementById("billing_phone").value;
    var address1 = document.getElementById("billing_address_1").value;
    var address2 = document.getElementById("billing_address_2").value;
    var city =document.getElementById("billing_city").value;
    var country =document.getElementById("billing_country").value;
    var county =document.getElementById("billing_state").value;
    var postcode = document.getElementById("billing_postcode").value;

    
        $.ajax({
            type: "POST",
            data:{firstname:first_name,lastname:last_name,email_address:email_address,phone_number:phone_number,address1:address1,address2:address2,city:city,county:county,postcode:postcode,country:country},
            url: templateUri + '/ajax/ajaxadd.php',

            success: function(data) {
                    // location.reload();
                    obj = JSON.parse(data);
                    console.log(obj.address_key);
                    // window.location= blogurl+'/checkout/?editedlast='+obj.address_key;
            }
        });
        return true;
    } else {
        event.preventDefault();
        return false;
    }
    

}


// load more


$(document).ready(function(){
	jQuery( "#pay-paypal" ).on( "click", function() {
        jQuery( '#payment_method_cod' ).click();
  });
	jQuery( "#pay-stripe" ).on( "click", function() {
        jQuery( '#payment_method_payu_in' ).click();
  });


 });



$(document).on("click", "#reset_password", function(e) {

        var regpassword = $("#password").val();
        var regCurrentpass = $("#password_2").val();
        var x = 0;
        var $input = $('.lost_pass .floating-item-input.validate');
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

                 if(regpassword != regCurrentpass) {
              $("#passwordmis-err").show();
              x++;
              }
              else{
                $("#passwordmis-err").hide();
              }

        if (x > 0) {
            event.preventDefault();
            return false;

        } else {
                                       return true;
        }
    })