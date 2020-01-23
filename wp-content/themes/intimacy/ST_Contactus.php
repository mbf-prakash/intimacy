<?php 
/*******
Template Name:Contact us
*******/
get_header('sub');
global $wpdb;
if ($_POST['firstname'] != "" && $_POST['contactform'] == "") {
    $table = $wpdb->prefix . "contactus";
	$data['company']        = sanitize_text_field($_POST['company']);
    $data['firstname']        = sanitize_text_field($_POST['firstname']);
    $data['lastname']        = sanitize_text_field($_POST['lastname']);
    $data['email']            = sanitize_text_field($_POST['email']);
    $data['telephone']        = sanitize_text_field($_POST['telephone']);
    $data['message']          = $_POST['message'];
    $data['radio']          = $_POST['radiogroup'];
    $data['posted_date']      = date('Y-m-d H:i:s');
    $format = array('%s','%s','%s','%s','%s');
    $admin_message = get_option('contact_us_admin');
    $custom_message = wpautop(get_option('contact_us_custom'));
      if (isset( $_POST['contact_us_form'] ) && wp_verify_nonce($_POST['contact_us_form'], 'conactus_nonce') ) {
        $insert_contact = $wpdb->insert($table, $data, $format);
        $lastid = $wpdb->insert_id;
        if($lastid != "") { ?>
        <?php $message = '<html>
                    <body>
                    <div style="max-width:500px">
                       <p>Dear Admin,<br /><br />

                       '. $admin_message .'<br /><br />

                           ---- Message ----<br /><br />
                           I am a '.$data['radio'].'<br/>
                           First name - '. $data['firstname'] .' <br />
                           Last name -' .$data['lastname'] . '<br />
                           Email - ' . $data['email'] . ' <br />
                           Telephone - ' . $data['telephone'] . ' <br />
                           Your Message - 
  ' . $data['message'] . ' <br />
                            </p>
                        </div>
                    </body>
                </html>';?>
            <?php $senderMessage = '
                <html>
                    <body>
                        <div style="max-width:560px;font-size:14px;">
                            <p style="text-transform: capitalize;">Dear '. $data['firstname'] .',<p>
                              '. $custom_message .' </p>

                        </div>
                    </body>
                </html>';
          $from = "Intimacy <prakash@madebyfire.com>";
          $subject = "Intimacy Website: Enquiry";
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
          $headers .= "From: " .  $from."\r\n";
          $to = get_option('contact_us_email');
if (wp_mail($to, $subject, $message, $headers)) {
                    $to = $data['email'];
                    $subjectSender ="Intimacy - We got your message!";
          if (wp_mail($to, $subjectSender, $senderMessage, $headers)) {
          unset($_POST);
         ?>
         <script>window.location = "<?php echo home_url('/contact-us/thank-you/');?>"</script>
         <?php
          exit;
          }
}
        }
      }
    }
?>
    <div class="container section-start generic-container">
      <div class="row subwrap">
        <div class="col-7">
          <div class="breadcrumbs clearfix nomobile">
      <ul>
		  <li><a href="<?php echo get_site_url().'/'; ?>" title="Home">Home</a></li>
		  <li><a href="#"><?php echo $post->post_title;?></a></li>
			  </ul>
          </div>
			<div class="no-desc back-catagory"><a href="<?php echo get_site_url().'/'; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i>Home</a></div>
          <h1>
            <?php echo $post->post_title; ?>
          </h1>
          <div class="introtext">
            <?php echo apply_filters('the_content', $post->post_content); ?>
          </div>
          <form name="contact_us_frm" id="contact_us_frm" class="contact_us_frm" method="post" action="">
            <?php wp_nonce_field('conactus_nonce','contact_us_form'); ?>
            <div class="form-wrap">

              
                <div class="form-row remove-space checkboxradio">
                  <span class="radio_check">I am </span>
                  <div class="checkboxradio-row form-check-inline">
                    <input class="checkboxradio-item checkboxradio-invisible" name="radiogroup" id="radiobutton1" type="radio" value="Individual" checked/>
                    <label class="checkboxradio-label radio-label" for="radiobutton1">an Individual</label>
                  </div>
                  <div class="checkboxradio-row form-check-inline">
                    <input class="checkboxradio-item checkboxradio-invisible" name="radiogroup" id="radiobutton2" type="radio" value="Business">
                    <label class="checkboxradio-label radio-label" for="radiobutton2">a Business</label>
                  </div>
                
                </div>

              <div class="form-row company">
                  <label class="floating-item" data-error="Please enter your company name">
                    <input type="text" id="company" class="floating-item-input input-item  validate" name="company" value="" autocomplete="off" maxlength="75" onkeypress="return onlyAlphabets(event, this)">
                      <span class="floating-item-label">Company name</span>
                    </label>
              </div>
              <div class="form-row">
                <label class="floating-item" data-error="Please enter your first name">
                  <input type="text" id="first-name" class="floating-item-input input-item  validate" name="firstname" value="" autocomplete="off" maxlength="75" onkeypress="return onlyAlphabets(event, this)">
                    <span class="floating-item-label">First name</span>
                  </label>
                </div>
                <div class="form-row">
                  <label class="floating-item" data-error="Please enter your last name">
                    <input type="text" id="last-name" class="floating-item-input input-item  validate" name="lastname" value="" autocomplete="off" maxlength="75" onkeypress="return onlyAlphabets(event, this)">
                      <span class="floating-item-label">Last name</span>
                    </label>
                  </div>
                  <div class="form-row">
                    <label class="floating-item" data-error="Please enter your email address">
                      <input type="text" id="email" class="floating-item-input input-item  validate" name="email" value="" maxlength="100"/>
                      <span class="floating-item-label">Email</span>
                    </label>
                 </div>
                  <div class="form-row">
                    <label class="floating-item" data-error="Please enter your phone number">
                      <input type="text" name="telephone" id="telephone" class="floating-item-input input-item validate" onkeypress="return isNumber(event)" maxlength="12" value=""/>
                      <span class="floating-item-label">PHONE </span>
                    </label>
                  </div>
                  <div class="form-row">
                    <label class="floating-item" data-error="Please enter your message">
                      <textarea class="floating-item-input input-item validate  " name="message" id="messages" rows="7" value=""></textarea>
                      <span class="floating-item-label">Message</span>
                    </label>
                  </div>
                  <div class="form-row">
                    <button name="submit" id="contact_submit" class="button-submit button button-primary contact_submit">Send</button>
                  </div>
                  <div style="display: none;">
                    <input type="text" name="contactform" id="contactform" value="">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
<?php get_footer();?>
<script type="text/javascript">
  jQuery(document).ready(function() {
    $(document).find(".company").hide()
    $('#radiobutton2').on('click',function(){
        $(".company").show();
    });
    $('#radiobutton1').on('click',function(){
        $(".company").hide();
    });
  });
</script>         