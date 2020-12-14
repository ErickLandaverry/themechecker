<?php
/**
 * Template Name: API
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


//Set up Campaign Monitor API to grab $data from Mecury One
function callAPI($method, $url, $data){
  $curl = curl_init();
  switch ($method){
     case "POST":
        curl_setopt($curl, CURLOPT_POST, 1);
        if ($data)
           curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        break;
     case "PUT":
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        if ($data)
           curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
        break;
  }

  // OPTIONS ( url, headers, authentication ):
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    "Authorization: Basic U1RRY3RCSkZEV3lITnV0OTRad2UrdDZodVJSRnJoK0tjVUZDRjlyL0xQaUFVZVFRcjdNd2psWjZrRm15Rnk4bG1UZVE1R1lEYnNWVG1BbEYvRHhEQzEyMDJuRlQ2UW9NN0RNSTZVZXMzcG9LWlJmTkVRRWhjY0lWejdWNTlSc1VUcnNOejFiU1pSNjZpcWl1azdPb1JnPT06",
    "Content-Type: application/json"
  ));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

  // Execute cURL
  $result = curl_exec($curl);

  // Close cURL
  curl_close($curl);

  // END function and return value of $result
  return $result;
  
}

///// Display Campaign Monitor Results /////
//$curl = curl_init();

//curl_setopt_array($curl, array(
  //CURLOPT_URL => "https://api.createsend.com/api/v3.2/lists/ff7ec9212ee718ff3f04e5c70a30e152/active.json",
  //CURLOPT_RETURNTRANSFER => true,
  //CURLOPT_ENCODING => "",
  //CURLOPT_MAXREDIRS => 10,
  //CURLOPT_TIMEOUT => 0,
  //CURLOPT_FOLLOWLOCATION => true,
  //CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  //CURLOPT_CUSTOMREQUEST => "GET",
  //CURLOPT_POSTFIELDS =>"\n",
  //CURLOPT_HTTPHEADER => array(
    //"Authorization: Basic U1RRY3RCSkZEV3lITnV0OTRad2UrdDZodVJSRnJoK0tjVUZDRjlyL0xQaUFVZVFRcjdNd2psWjZrRm15Rnk4bG1UZVE1R1lEYnNWVG1BbEYvRHhEQzEyMDJuRlQ2UW9NN0RNSTZVZXMzcG9LWlJmTkVRRWhjY0lWejdWNTlSc1VUcnNOejFiU1pSNjZpcWl1azdPb1JnPT06",
    //"Content-Type: application/json"
  //),
//));

//$response = curl_exec($curl);

//curl_close($curl);
//echo $response;

///// End Display Campaign Monitor Results /////

// Set cURL from Mecury One
$curl = curl_init();

// Set up Mecury One cURL call
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://secure2.convio.net/mone/site/SRConsAPI?method=getGroupMembers&api_key=Q2F8xD8W4qAiXuYn&login_name=ao_api&login_password=arena_base_2019&v=1.0&response_format=json&group_id=48384",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  
));

/**** Set returned data to Variable ****/
$response = curl_exec($curl);

// Close cURL
curl_close($curl);

//echo $response;

/*** Set Variable as JSON Array ***/
$results = json_decode($response, true);


// For Each GetGroupMemberResponse
foreach($results as $result) {

  // For Each Member (an array of 1,000 objects)
  foreach($result as $member) {
    
    // For Each Member Item with a key
    foreach($member as $single_member => $key) {

     // Organize data returned into variables
     $name = $key['name']['first'] . " " . $key['name']['last'];
     $email = str_replace(' ','',$key['email']['primary_address']);


    // Map fields to Campaign Monitor. Build array using fields and store in variable
    $data['Subscribers'][] = array(
      'EmailAddress' => $email,
      'Name' => $name,
      'ConsentToTrack' => 'Yes',
      'QueueSubscriptionBasedAutoResponders'=> 'false',
      'RestartSubscriptionBasedAutoresponders' => 'true'
  
    );

    };

  };
 
};

// jsonify all data into variable
$json_encoded_data = json_encode($data);

// Fetch and POST info to api url
$result =  callAPI('POST', 'https://api.createsend.com/api/v3.2/subscribers/ff7ec9212ee718ff3f04e5c70a30e152/import.json', $json_encoded_data);

// Display Results
echo $result;