
<?php

/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

include '../../../wp-config.php';
///global $wpdb;
$coup_val = strtolower($_POST['couponvalue']);
if(in_array($coup_val, WC()->cart->applied_coupons)){
       WC()->cart->remove_coupons($_POST['couponvalue']);
   }

?>