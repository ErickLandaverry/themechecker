<?php
/**
 * Template Name: API Testing
 *
 * Template for displaying a blank page.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>


<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://secure2.convio.net/mone/site/SRConsAPI?method=getGroupMembers&api_key=Q2F8xD8W4qAiXuYn&login_name=ao_api&login_password=arena_base_2019&v=1.0&response_format=json&group_id=48384&fields=first_name,%20last_name,%20primary_email",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  
));

/**** Set Data to Variable ****/
$response = curl_exec($curl);
curl_close($curl);


/*** Set Variable as JSON Array ***/
$results = json_decode($response, true);


// For Each GetGroupMemberResponse
foreach($results as $result) {

  // For Each Member (an array of 1,000 objects)
  foreach($result as $member) {
    //var_dump($r);
    //var_dump( $member);
    // For Each Member Item with a key
    foreach($member as $single_member => $key) {
     //var_dump($single_member[name]);
     echo ('First: ' . $key[name][first] . "<br/>");
     echo ('Last: ' . $key[name][last] . "<br/>");
     echo ('Email: ' . $key[email][primary_address] . "<br/><br/>");
    
    }
    
  }
 
}


?>


