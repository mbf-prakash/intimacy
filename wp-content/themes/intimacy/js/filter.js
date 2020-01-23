/**********
* Sort By Functionality
***********/
$('.sort_menu li span').on('click', function(){

  $(this).addClass('active');
    var sort=$('#my-json').val();
   $(document).find('#Allcategories .row').addClass('loadershow');
    var attr_val=  $(this).attr('data-value');
	$.ajax({
        type: "POST",
        dataType: "html",   
        url: templateUri+"/ajax/ajax-sortfiter.php",
        data: {action: "sort_ord", sort_ord : attr_val},
        success: function(data) {
			$('#Allcategories').html(data);

        }
	});
});


// $(document).ready(function() {

// 	var max_length = 15;
	
// 	$(".loadMore .thumbnail").each(function (i) {
// 	i++;
// 	if(i == max_length) {
// 	$(".loadMore #Allcategories").append(' <button onclick="filter()" class="button button-primary loadmoreimage">Load more</button>')   
// 	}
// 	if(i > max_length) {
// 	$(this).hide();
// 	}
	
	
// 	});
// 	});


$('input[type=checkbox]'). click(function(){
 
 if($('input[type=checkbox]').is(':checked')){


	}else{
		$(document).find('.row.text').show();
		$(document).find('.noshow .imageshowdata').hide();
	}
});

// console.log($('.allarea input[type="checkbox"]').is(':checked'))


//sorting size and style and fit filter
var  sortProdIdVal=[];
var $filterCheckboxes = $('input[type="checkbox"]');

$filterCheckboxes.on('change', function() {

		  var selectedFilters = {};
	
		     $filterCheckboxes.filter(':checked').each(function() {
			 var ischecked= $(this).is(':checked');
			if (!selectedFilters.hasOwnProperty(this.name) ) {
				selectedFilters[this.name] = [];
			}

			if($(this).is(':checked')){
				selectedFilters[this.name].push(this.value);
			}else{
				var id_val = this.value;
				selectedFilters = jQuery.grep(selectedFilters, function(value) {
					return value != id_val;
				});


			}


});
var $filteredResults = $('.imagevalue');
	$.each(selectedFilters, function(name, filterValues) {
		$filteredResults = $filteredResults.filter(function() {
			var matched = false,
				currentFilterValues = $(this).data('value').split(' ');
			// loop over each category value in the current .flower's data-category
			$.each(currentFilterValues, function(_, currentFilterValue) {
				if ($.inArray(currentFilterValue, filterValues) != -1) {
					matched = true;
					return false;
				}
				else{
					
				}
			});
			// if matched is true the current .flower element is returned
			return matched;
		});
	});
	var  sortProdIdVal=[];
	$('.imagevalue').hide().filter($filteredResults).show();
	$.each($filteredResults,function(index,value){
		currentFilterValues = $(this).data('sortvalue');
		if(currentFilterValues!=''){
			sortProdIdVal.push(currentFilterValues);
		}else{
			var id_val = this.value;
			sortProdIdVal = jQuery.grep(sortProdIdVal, function(value) {
				return value != id_val;
			});
		}
	});
	var mysort_json =unique(sortProdIdVal);
 if(mysort_json ==""){
		$('.productnotmatching').show();
	  }else{
		$('.productnotmatching').hide();
	  }
	console.log(mysort_json);
	myJSON = JSON.stringify(mysort_json);
	$('#my-json').val(myJSON);
	});

var sortProdIdVals=[];
$(document).ready(function() {

$('.thumbnail').each(function(){
		currentFilterValues = $(this).data('sortvalue');
		if(currentFilterValues!=''){
			sortProdIdVals.push(currentFilterValues);
		}else{
			var id_val = this.value;
			sortProdIdVals = jQuery.grep(sortProdIdVals, function(value) {
				return value != id_val;
			});
		}
	
	});
	var mysort_jsons =unique(sortProdIdVals);
	console.log(mysort_jsons);
	myJSONs = JSON.stringify(mysort_jsons);
	$('#my-jsons').val(myJSONs);
	});
var objvalue=[];


// function filter(){


//console.log($('.allarea input[type="checkbox"]').is(':checked'));


	
	


// var fitersortProdIdVals=[];
// $(document).ready(function() {

// $('.sortfilter').each(function(){
// 		filtercurrentFilterValues = $(this).data('sortvalue');
// 		if(currentFilterValues!=''){
// 			fitersortProdIdVals.push(filtercurrentFilterValues);
// 		}else{
// 			var id_val = this.value;
// 			fitersortProdIdVals = jQuery.grep(fitersortProdIdVals, function(value) {
// 				return value != id_val;
// 			});
// 		}
	
// 	});
// 	var filtermysort_jsons =unique(fitersortProdIdVals);
// 	console.log(filtermysort_jsons);
// 	myJSONs = JSON.stringify(filtermysort_jsons);
// 	$('#filtermy-jsons').val(filtermysort_jsons);
// 	});

function sortfilter(){
	var attr_val=  $('#sortfilterdata').val();
	console.log(attr_val);
	var filter_val_data = $('#filtermy-jsons').val();
	console.log(filter_val_data);
	$.ajax({
        url: templateUri + "/ajax/filter-sortajax.php",
        type: 'POST',
        data:  {sorttype:attr_val, filtervaluedata:filter_val_data},
        success: function (result) {
			var product_id= result.split('~');
			var json_rsp_id = product_id[1];
			console.log(jQuery.type(product_id['1']));
		  var filter_vals=filter_val_data.split(',');
		  var product_ids=product_id['1'].split(',');

		  console.log(product_ids);
		  console.log(filter_vals); 
			// var json1 = JSON.stringify(filter_val);
			// var json11=jQuery.parseJSON(json1);
			// console.log(jQuery.type(json11)); 
			// var json2 = JSON.stringify(json_rsp_id);
			// var json12=jQuery.parseJSON(json2);
            // console.log(jQuery.type(json12));
			 var objvalue_id=$.merge(  filter_vals , product_ids );
			console.log(objvalue_id);
			//alert(JSON.stringify(filter_val) != JSON.stringify(json_rsp_id) ? 'not same' : ' same');
			//var objvalue = $.extend({},filter_val,json_rsp_id);
			$('#filtermy-jsons').val(objvalue_id);

			var last_list_item = $(document).find(".imagevalue:last").attr('id');
			$(document).find(".imagevalue:last").after(product_id['0']);
             $(document).find(".listItem:last");
 		}
 });
}



// var  sortProdIdVals=[];

// var sizemyarray=[];
// var $filterCheckboxesd = $('input[type="checkbox"]');

// $filterCheckboxesd.on('change', function() {

// 		  var selectedFiltersd = {};
	
// 		     $filterCheckboxes.filter(':checked').each(function() {
// 			 var ischecked= $(this).is(':checked');
// 			if (!selectedFiltersd.hasOwnProperty(this.name) ) {
// 				selectedFiltersd[this.name] = [];
// 			}

// 			if($(this).is(':checked')){
// 				selectedFiltersd[this.name].push(this.value);
// 			}else{
// 				var id_val = this.value;
// 				selectedFiltersd = jQuery.grep(selectedFiltersd, function(value) {
// 					return value != id_val;
// 				});
// 			}


// });
// var color =selectedFiltersd['color']; 



// var size =selectedFiltersd['size'];

// var fit =selectedFiltersd['fit'];

// var tag =selectedFiltersd['tag'];






// var mysort_sizevalue =unique(size);

// sort_sizevalue = JSON.stringify(mysort_sizevalue);
// console.log(sort_sizevalue);

// var mysort_colorvalue =unique(color);

// sort_colorvalue = JSON.stringify(mysort_colorvalue);
// console.log(sort_colorvalue);



// var mysort_fitvalue =unique(fit);

// sort_fitvalue = JSON.stringify(mysort_fitvalue);
// console.log(sort_fitvalue);



// var mysort_tagvalue =unique(tag);

// sort_tagvalue = JSON.stringify(mysort_tagvalue);
// console.log(sort_tagvalue);




// // console.log(sizemyarray); 
// // var fit =selectedFiltersd['fit']; 
// // var tag =selectedFiltersd['tag']; 

// $.ajax({
// 	type: "POST",
  
// 	 url: templateUri+"/ajax/ajax-sortfiterfile.php",
	
// 	data: {action: "sort_ord", color :sort_colorvalue,size:sort_sizevalue,fit:sort_fitvalue,tag:sort_tagvalue},
// 	success: function(data) {
// 	   console.log(data);
// 	//    setTimeout(function(){
// 	// 	$('#Allcategories').html(data);
// 	//    },2000); 
// //              setTimeout(function(){
// //          var newWidget = $(data); 
// //          $('#Allcategories').replaceWith(newWidget);
// //      },2000);
// 	//	console.log(data); 
// 		 //$('.product-listing').find('.imgshow').hide();
		

// 	}
// });

// });


$('.color-filter-value').click(function(){
    var Colorcheck =$(this).parent().find('input').click();

    if(Colorcheck.is(':checked')){
		var bgWhite1 = $(this).attr('style') == 'background-color:#E7E6DD';
    	var bgWhite2 = $(this).attr('style') == 'background-color:#FFFFFF';
		var bgWhite3 = $(this).attr('style') == 'background-color:#FFFF00';
		var bgWhite4 = $(this).attr('style') == 'background-color:#eedd82';
    	if(bgWhite1 || bgWhite2 || bgWhite3 || bgWhite4){
    	$(this).parent().addClass('inverse');	   	
    	}
    	    $(this).parent().addClass("active");

    }else{
    	$(this).parent().removeClass("active");
    }
});



