<?php
// Get modernizr

// add_action("wp_enqueue_scripts", "my_announcements_notification");
// function my_announcements_notification() {
// wp_enqueue_script('announcements_notification', '/' . PLUGINDIR . '/kk-announcements.php', null ,false,true);
//
// }

add_action("wp_enqueue_scripts", "my_jquery_enqueue");
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
 }

add_action( 'wp_enqueue_scripts', 'enqueue_modernizr' );
function enqueue_modernizr() {
  wp_register_script( 'modernizr_custom', get_stylesheet_directory_uri() . '/js/lib/modernizr.custom.js');
  wp_enqueue_script( ['modernizr_custom'] );
}

// Get bower components and any dependencies
add_action( 'wp_enqueue_scripts', 'enqueue_bower' );
function enqueue_bower(){
  wp_enqueue_style( 'bootstrap_css', get_stylesheet_directory_uri() . '/bower_components/bootstrap/dist/css/bootstrap.min.css', false, null );
  wp_register_script( 'jquery_bower', get_stylesheet_directory_uri() . '/bower_components/jquery/dist/jquery.min.js');
  wp_register_script( 'bootstrap_js', get_stylesheet_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js', array('jquery_bower'), null );
  wp_enqueue_style( 'fontawesome_css', get_stylesheet_directory_uri() . '/bower_components/font-awesome/css/font-awesome.min.css', false, null);
  wp_register_script( 'underscore_js', get_stylesheet_directory_uri() . '/bower_components/underscore/underscore-min.js', false, null );
  wp_register_script( 'isotope_js', get_stylesheet_directory_uri() . '/bower_components/isotope/dist/isotope.pkgd.min.js', false, null );
  wp_register_script( 'scrollMonitor_js', get_stylesheet_directory_uri() . '/bower_components/scrollMonitor/scrollMonitor.js', false, null );
  wp_register_script( 'moment_js', get_stylesheet_directory_uri() . '/bower_components/moment/min/moment.min.js', false, null );
  wp_register_script( 'node_dateformat_js', get_stylesheet_directory_uri() . '/bower_components/node-dateformat/lib/dateformat.js', false, null );
  wp_enqueue_script( ['jquery_bower', 'bootstrap_js', 'underscore_js', 'isotope_js', 'scrollMonitor_js', 'moment_js', 'node_dateformat_js'] );
}

// Get jquery Royal Slider
add_action( 'wp_enqueue_scripts', 'enqueue_royalslider' );
function enqueue_royalslider() {
  wp_enqueue_style( 'royalslider-css', get_stylesheet_directory_uri() . '/royalslider-js/royalslider.css' );
  wp_enqueue_style( 'royalslider-css-rs-default', get_stylesheet_directory_uri() . '/royalslider-js/skins/default/rs-default.css' );
  wp_enqueue_style( 'royalslider-css', get_stylesheet_directory_uri() . '/royalslider-js/royalslider.css' );
  wp_enqueue_script( 'royalslider-min-js', get_stylesheet_directory_uri() . '/royalslider-js/jquery.royalslider.min.js', array('jquery_bower') );
}

// Get Panorama Viewer
add_action( 'wp_enqueue_scripts', 'enqueue_panorama_viewer' );
function enqueue_panorama_viewer() {
  // wp_enqueue_script( 'jquery-panorama-viewer-js', get_stylesheet_directory_uri() . '/panorama-viewer/js/jquery.panorama_viewer.js', array('jquery_bower') );
  wp_enqueue_style( 'panorama-viewer-css', get_stylesheet_directory_uri() . '/panorama-viewer/css/panorama_viewer.css' );
  // wp_enqueue_script( 'classie-js', get_stylesheet_directory_uri() . '/panorama-viewer/js/classie.js', false, null, true );
}

// Get the parent theme's style.css
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/style.min.css' );
}

// Get built CoffeeScript
add_action( 'wp_enqueue_scripts', 'enqueue_coffeescript' );
function enqueue_coffeescript() {
}

// Get concatenated javascript
add_action( 'wp_enqueue_scripts', 'enqueue_custom_script' );
function enqueue_custom_script() {
  wp_register_script( 'lib_js', get_stylesheet_directory_uri() . '/lib.min.js', false, null, true );
  wp_register_script( 'validation_js', get_stylesheet_directory_uri() . '/validation.js', false, null, true);
  wp_register_script( 'main_js', get_stylesheet_directory_uri() . '/main.min.js', false, null, true );
  wp_register_script( 'boostraptoolkit_js', get_stylesheet_directory_uri() . '/js/bootstrap-toolkit.js', array('bootstrap_js'), null );

  wp_enqueue_script( ['lib_js', 'validation_js', 'boostraptoolkit_js'] );
}
// Options Page Hooks
add_filter( 'timber_context', 'mytheme_timber_context'  );

function mytheme_timber_context( $context ) {
    $context['option'] = get_fields('option');
    return $context;
}

/**
     * Add theme support for the Eventbrite API plugin.
     * See: https://wordpress.org/plugins/eventbrite-api/
     */
add_action( 'after_setup_theme', 'themeslug_setup' );
function themeslug_setup() {
      add_theme_support( 'eventbrite' );
}

// This adds all the post types to the main post query for the blog so all post types will show up
add_action( 'pre_get_posts', 'add_custom_post_types_to_query' );
function add_custom_post_types_to_query() {
  // if ( is_home() && $query->is_main_query() ) {
  //   $query->set( 'post_type', array( 'post', 'units', 'floors' ) );
  // }
  // return $query;
}

add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');

function new_mail_from($old) {
 return 'kekilohana@wardvillage.com';
}
function new_mail_from_name($old) {
 return 'Ward Village';
 }

 $url = explode('?', 'http://'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
 $ID = url_to_postid($url[0]);




 add_action( 'wp_enqueue_scripts', 'ajax_enqueue_scripts' );
 function ajax_enqueue_scripts() {
   wp_enqueue_script( 'occupy', get_stylesheet_directory_uri() .  '/js/occupy.js', false, '1.0', true );

  wp_localize_script( 'occupy', 'postoccupy', array(
    'ajax_url' => admin_url( 'admin-ajax.php' )
  ));


  wp_enqueue_script( 'searchLotteryNumber', get_stylesheet_directory_uri() . '/js/query-lottery-numbers.js', false, '1.0', true );

  wp_localize_script( 'searchLotteryNumber', 'getSearchLotteryNumber', array(
    'ajax_get_url' => admin_url( 'admin-ajax.php' )
  ));

 }

 add_action( 'wp_ajax_nopriv_post_occupy_add_occupy', 'post_occupy_add_occupy' );
 add_action( 'wp_ajax_post_occupy_add_occupy', 'post_occupy_add_occupy' );

 function post_occupy_add_occupy() {

   session_start();

  //  $conn = mysql_connect('localhost', 'root', 'root');
  //  mysql_select_db('hhkkphase2', $conn);

   if(isset($_POST['bookID']))
   {  $statusSwitch = $_POST['statusSwitch'];
       $bookID = $_POST['bookID'];

      // $result = mysql_query("Update selectiondatetime set occupied = '1' where packetnumber =  '$bookID'" ,$conn);

      global $wpdb;

      if ($statusSwitch == 1){
      $result =$wpdb->query($wpdb->prepare(
               "update reservedunits set occupied = 1 where residenceNumber =  %s
               " ,

              $bookID
           ));
         }
         if ($statusSwitch == 0){
         $result =$wpdb->query($wpdb->prepare(
                  "update reservedunits set occupied = 0 where residenceNumber =  %s
                  " ,

                 $bookID
              ));
            }

         echo $result;


   }


 }

 add_action( 'wp_ajax_nopriv_get_search_lottery_number', 'get_search_lottery_number' );
 add_action('wp_ajax_get_search_lottery_number', 'get_search_lottery_number');
 function get_search_lottery_number() {
  //  session_start();

   if (isset($_GET["searchNumber"])) {
     global $wpdb;
     $searchNumber = $_GET["searchNumber"];

    $result = $wpdb->get_row($wpdb->prepare("SELECT * FROM `lottery` WHERE lotteryNumber = %s", $searchNumber), ARRAY_A);

    if ($result) {
      $dateselection =$result['selectionDate'];
      $timeselection =$result['selectionTime'];
     echo "Lottery # | <span class='bold-text'>" . $result['lotteryNumber'] . "</span><br />".
       "Selecting | <span class='bold-text'>" . $result['selectionOrder'] . "</span><br />".
       "Schedule | <span class='bold-text'>"  . date( 'D',strtotime($dateselection)) . ", " . date( 'M d Y',strtotime($dateselection)) . " @ " .date('g:i a', strtotime($timeselection)) . "*</span> <br><span class='smbl'>*Home selection is at the <a class ='nofade' href='https://www.google.com/maps/place/1240+Ala+Moana+Blvd,+Honolulu,+HI+96814/@21.2924809,-157.8531922,17z/data=!3m1!4b1!4m2!3m1!1s0x7c006dfb62b666c9:0x7081b96e14bf6e7c' target='_blank'>IBM Building</a> please check in 15 minutes prior</span>";
     } else {
       echo "<span class='bold-text'>No lottery data available</span>";
     }

      die();
   }
 }

 add_action( 'wp_ajax_nopriv_get_all_lottery_number', 'get_all_lottery_number' );
 add_action('wp_ajax_get_all_lottery_number', 'get_all_lottery_number');
 function get_all_lottery_number() {
   global $wpdb;
   $results = $wpdb->get_results("SELECT * FROM `lottery` ORDER BY selectionOrder", ARRAY_A);

    echo('<div class="results_box" style="display:inline-block"><div class="results_table_wrapper"><table class="results_table"><tr><th>SELECTION ORDER</th><th>LOTTERY #</th></tr><tr> ');
   foreach ($results as $result) {

     echo "<tr><td class='lottery_number'>" . $result['selectionOrder'] . "</td><td class='packet_number'>" . $result['lotteryNumber'] . "</td></tr>";

      if ($result['selectionOrder'] %20 == 0 /*and  $result['selectionOrder'] %160 != 0 */){echo('</table></div> <div class="results_table_wrapper"><table  class="results_table"><tr><th>SELECTION ORDER</th><th>LOTTERY #</th></tr><tr>');}
          // if ($result['selectionOrder'] %160 == 0){ echo('</table></td> </div><div class="results_table_wrapper"><td valign="top"><table  class="results_table"><tr><th>SELECTION ORDER</th><th>LOTTERY #');}


   }
  die();
 }


//echo ('<br><br><br><br>'.get_the_ID() . $ID . $_SERVER["REQUEST_URI"]);




if ( $_SERVER["REQUEST_URI"] == '/hhkk-phase2/lottery/'){
  add_action( 'wp_enqueue_scripts', 'enqueue_socketsio' );
  function enqueue_socketsio(){


    wp_register_script( 'chat-list-js', get_stylesheet_directory_uri() . '/js/chat-list-js.js', false, '20160329', true );

  //importing chat-js.js file by usin gwp_enqueue_script function
  wp_enqueue_script( ['chat-list-js'] );

  //creating php array
  $data = array("id"=>get_current_user_id());

  // Passing above array to chat-js file

  wp_localize_script( "chat-list-js", "blog", $data );
  }

}

if ( $_SERVER["REQUEST_URI"] == '/hhkk-phase2/chat/'){

  add_action( 'wp_enqueue_scripts', 'enqueue_socketsio' );
  function enqueue_socketsio(){

    wp_register_script( 'chat-js', get_stylesheet_directory_uri() . '/js/chat-js.js', false, '20160329', true );


  //importing chat-js.js file by usin gwp_enqueue_script function
  wp_enqueue_script( ['chat-js'] );

  //creating php array
  $data = array("id"=>get_current_user_id());

  // Passing above array to chat-js file
  wp_localize_script( "chat-js", "blog", $data );

  }
}

// Functions for querying properties
// require('queries-floors.php');

// Extending Twig, for custom filters
require('custom-extensions.php');
