<?php
/*
Plugin Name:  KK-Announcements
Plugin URI: http://mvnp.com
Description: I created this plugin to popover announcements from ACF
Version: 1.0
Author: Jon Hayes
Author URI: http://mvnp.com
*/


// This is to check if the request is coming from a specific URL




//echo ('everywhere');

add_action("wp_enqueue_scripts", "announcements_notification",100);

function announcements_notification() {
wp_enqueue_script('annojscript', '/' . PLUGINDIR . '/kk-announcements/js/announcements.js');
if(isset($_GET["cookietestdate"])){
  $date_1 = date('Ymd', strtotime($_GET["cookietestdate"]));
  // echo ("<br>");echo ("<br>");echo ("<br>");
  // echo "wordpress site time: " . date( 'Y-m-d H:i:s', current_time( 'timestamp', 0 ) );
  // echo ("<br>");
  // echo (" url variable date time used to set date " . $date_1);
  // echo ($_GET["cookietestdate"]);
}
else {
  $date_1 = date( 'Ymd', current_time( 'timestamp', 0 ) );
  // echo ("<br>");echo ("<br>");echo ("<br>");
  // echo "wordpress site time: " . date( 'Y-m-d H:i:s', current_time( 'timestamp', 0 ) );
  // echo ("<br>");
  // echo (" wordpress date time used to set cookie " . $date_1);

}

//echo date('Ymd H:i:s', strtotime("now"));
//echo($date_1 );
//echo ('tz'. get_option('timezone_string'));

global $wpdb;

$rows = $wpdb->get_results($wpdb->prepare(
         "

          select  min(meta_value) as meta_value,  post_id ,  meta_key,  meta_id
          FROM {$wpdb->prefix}postmeta
          where meta_key LIKE '%s'  AND meta_value >= %s

          AND  post_id = (
            select MAX(post_id) AS post_id
            FROM  {$wpdb->prefix}postmeta
            where meta_key LIKE '%s'

          )







         ",
         'announcements_%_date', // meta_name: $ParentName_$RowNumber_$ChildName

         $date_1, // meta_value: 'type_3' for example
 'announcements_%_date' // meta_value: 'type_3' for example

     ));




// loop through the results
if( $rows )
{
 foreach( $rows as $row )
 {

//echo ($i);


preg_match('_([0-9]+)_', $row->meta_key, $matches);

$meta_key = 'announcements_' . $matches[0] . '_title';

$meta_date = 'announcements_' . $matches[0] . '_date';

$meta_body = 'announcements_' . $matches[0] . '_content';

$annodate = get_post_meta( $row->post_id, $meta_date, true );

$cookiedate =  date('m/d/Y 23:59', strtotime($annodate));


$annotitle = get_post_meta( $row->post_id, $meta_key, true );

$annobody = get_post_meta( $row->post_id, $meta_body, true );

$annodate = date('F, d', strtotime($annodate));


$datatoBePassed = array(
    'annodatejs'  => $annodate,
    'annotitlejs' =>  $annotitle,
    'annobodyjs' =>  $annobody,
    'cookiedate' => $cookiedate
);

wp_localize_script( "annojscript", 'phpvars', $datatoBePassed );


 } 

 }
 }


?>
