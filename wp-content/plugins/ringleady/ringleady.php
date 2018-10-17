<?php
/*
Plugin Name: Ringlead Email Plugin
Plugin URI: http://mvnp.com
Description: I created this plugin to send ringlead retUrl WordPress email goodness
Version: 1.0
Author: Jon Hayes
Author URI: http://mvnp.com
*/


// This is to check if the request is coming from a specific URL




//echo ('everywhere');

add_action("wp_enqueue_scripts", "sharefloorplan_notification");
add_filter ("wp_mail_content_type", "my_awesome_mail_content_type");
function my_awesome_mail_content_type() {
	return "text/html";
}

function sharefloorplan_notification() {
  //  echo ($_SERVER['SCRIPT_NAME']);

 $pagetoshare = '';
 $fromemail = '';
 $message   = '';
        // sanitize form values
     //   $name = sanitize_text_field( $_POST["cf-name"] );

    if(isset($_GET["to"])){
    		$toemail = sanitize_email( $_GET["to"] );
    }
    if(isset($_GET["from"])){
		    $fromemail = sanitize_email($_GET["from"]);
				$headers[] = "Cc:$fromemail";

    }



    if(isset($_GET["pagetoshare"])){
    		$pagetoshare = esc_textarea($_GET["pagetoshare"]);
    }
    if(isset($_GET["short-message"])){
    		$message = esc_textarea(  $_GET["short-message"] );
    }
    		$from_email = "Ward Village <kekilohana@wardvillage.com>";
	ob_start();
   if ( $_GET["pagetoshare"] ==  get_site_url().'/residence-guide/#floor-plans'){
		 		$subject = "Kekilohana at 998 Halekauwila - Floo Plan";
        $heroimage = get_site_url().'/wp-content/uploads/2016/03/30620-hdr-a.jpg';
        $pagetoshare = get_site_url().'/wp-content/uploads/2016/03/Ke-Kilohana-Floor-Plans.pdf';
        $viewbtn  = get_site_url().'/wp-content/uploads/2016/03/viewfloorplans.png';
				$bdmessage = 'Take a peek at the floor plans';
				include('email_header.php');
   }
   else
   {
				$subject = "Take a Peek at This Home";
				$heroimage = get_site_url().'/wp-content/uploads/2016/03/30620-hdr-g.jpg';
				$viewbtn  = get_site_url().'/wp-content/uploads/2016/03/viewhome.png';
				$bdmessage = 'Take a peek at this home';
				include('email_header.php');
   }
    ?>



  <tr>
      <td align="center" bgcolor="#F2F3F3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr><td colspan="3" height="40px"></tr>
          <tr>
            <td width="10%">&nbsp;</td>
            <td width="80%">

              <div class="mktEditable" id="MAIN_HEADLINE"><h1 style="font-family: Arial, sans-serif, 'Sans Serif'; color: #f2ba36; font-size: 32px; line-height: 1em; font-weight: 900;"><a href="<? echo $pagetoshare?>" style="font-family: Arial, sans-serif, 'Sans Serif'; color: #f2ba36; font-size: 32px;  font-weight: 900; text-decoration:none;">Look Into Your Future</a></h1></div>
          </td>
            <td width="10%">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><img src="http://pages.wardvillage.com/rs/632-VRC-098/images/yellow_div.jpg" style="width:100%; display:block; max-width:95px;" alt=""/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <div class="mktEditable" id="SUB_TITLE" style="font-family: Arial, sans-serif, 'Sans Serif';"><p style="font-size:18px;">Take a peek at this home <? echo $fromemail ?> shared with you.</h2></div>
              <div class="mktEditable" id="PARAGRAPH_1" style="font-family: Arial, sans-serif;"><p style="font-size:18px;"><? echo $message ?><br/><br/><a href="<? echo $pagetoshare ?>" class="button_sliding"><img src="<? echo $viewbtn ?>" style="display:block;" ></a></p></div>

            </td>
            <td>&nbsp;</td>
          </tr>

          <tr>
            <td height="41">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table></td>
    </tr>

<?php
	include("email_footer.php");

	$message = ob_get_contents();
	ob_end_clean();


     if(isset($toemail)){
      wp_mail($toemail,$subject, $message,$headers);

         }



}


?>