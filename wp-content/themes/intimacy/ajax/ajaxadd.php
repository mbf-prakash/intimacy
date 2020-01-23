<?php
$load_url = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
include $load_url[0] . 'wp-load.php';
global $wpdb;
//  $address_key1 = $_GET['key'];
// var_dump($address_key1);

	$cust_id = get_current_user_id();
	$first_name = $_POST['firstname'];
	$last_name = $_POST['lastname'];
	$email_address = $_POST['email_address'];
	$phone_number = $_POST['phone_number'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$county = $_POST['county'];
	$postcode = $_POST['postcode'];
	$country=$_POST['country'];
	$default_add_check = '0';
	$existing_addresses = get_user_meta($cust_id, 'multi_address', 'true');


	$metas = array( 
	    'first_name'   => $first_name,
	    'last_name' => $last_name,
	    'email_address' => $email_address,
	    'phone_number' => $phone_number,
	    // 'is_default' => $default_add_check,
	    'address1'  => $address1 ,
	   	'address2'  => $address2 ,
	    'postcode'     => $postcode,
	    'city'=>$city,
	    'county'=>$county,
	    'country'=>$country
	);
	if (is_array($existing_addresses) && count($existing_addresses) >= 1) {
		$final_array = array();
		$i = sizeof($existing_addresses);
		$combined_addresses[$i]['first_name'] = $first_name;
		$combined_addresses[$i]['last_name'] = $last_name;
		$combined_addresses[$i]['email_address'] = $email_address;
		$combined_addresses[$i]['phone_number'] = $phone_number;
		// $combined_addresses[$i]['is_default'] = $default_add_check;
		$combined_addresses[$i]['city'] = $city;
		$combined_addresses[$i]['county'] = $county;
		$combined_addresses[$i]['address1'] = $address1;
		$combined_addresses[$i]['address2'] = $address2;
		$combined_addresses[$i]['postcode'] = $postcode;
		$combined_addresses[$i]['country']= $country;
		$final_array = array_merge($existing_addresses, $combined_addresses);
	} else {
		$combined_addresses[0] = $metas;
		$final_array = $combined_addresses;
	}
	if ($first_name != '') {
		update_user_meta( $cust_id, 'multi_address', $final_array );
		unset($_POST);
}
$response = array('firstname' =>$first_name ,'lastname' => $last_name,'email_address' => $email_address,'phone_number' => $phone_number,'address' => $address,'postcode' => $postcode ,'address_key' =>$i);


  echo json_encode($response);
?>



