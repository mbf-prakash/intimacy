<?php
$load_url = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
include $load_url[0] . 'wp-load.php';
global $wpdb;
$table = $wpdb->prefix . "newsletter";
$mailid = (isset($_POST["email"]) && $_POST["email"]!="") ? $_POST["email"] : '';
$fname  = sanitize_text_field($_POST['fname']);
$lname  = sanitize_text_field($_POST['lname']);
$sql = "SELECT * FROM ".$table." WHERE email = '".$mailid."',fname = '".$fname."' and lname = '".$lname."'";
$mylink = $wpdb->get_row( $sql );
$admin_message = wpautop(get_option('newsletter_msg'));
if($mylink->id == "")
    {
        $wpdb->insert(
			$table,
			array(
				'email' => $mailid,
        'fname' => $fname,
        'lname' => $lname,
				'posted_date' => date("Y-m-d h:i:s")
			),
			array(
				'%s',
				'%s'
			)
		);
		    // $listID = get_option('listid');
        // $apiKey = get_option('mailchimb');
        // $base64Api = base64_encode("user:{$apiKey}");
        // $authKey = json_encode("user:".$apiKey);
        // $memberID = md5(strtolower($mailid));
        // $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
        // $email_json  = array('email_address' =>  $mailid,'merge_fields' => array('FNAME' =>  $fname,'LNAME' =>  $lname),"status"=>"subscribed");
        // $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => $url,
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => "",
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 30,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => "PUT",
        //   CURLOPT_POSTFIELDS => json_encode($email_json),
        //   CURLOPT_HTTPHEADER => array(
        //     "Authorization: Basic ".$base64Api,
        //     "Cache-Control: no-cache",
        //     "Content-Type: application/json"
        //     // "Postman-Token: b72556ca-b8fb-f6a9-4c88-6dbd8013e761"
        //   ),
        // ));
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        // curl_close($curl);

		if ($wpdb->insert_id) {
		    $message = ' <html>
                    <body>
                        <div style="max-width:560px;font-size:14px">
                            <p>
                              '. $admin_message .'<br /><br />
                            </p>
                        </div>
                    </body>
                </html> ';
        $subject = "We got your message!";
        $to = $mailid;
        $from = "Intimacy <hello@22eleven.co>";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        $headers .= "From: " . $from . "\r\n";
        wp_mail($to, $subject, $message, $headers);
	echo 1;
	     }
    }
    else
    {
        echo 2;
    }
