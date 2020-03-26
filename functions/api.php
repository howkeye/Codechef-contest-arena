<?php
include 'auth.php';
function make_api_request_with_path($path){
    $oauth_details['access_token']= $_SESSION['access_token']; 
    echo $_SESSION['access_token']."-----";


    $path = "https://api.codechef.com".$path; 
    
    $response = make_api_request($oauth_details, $path);
    
    return $response;
}

function get_json($path){

$data_json= json_decode( make_api_request_with_path( $path)); 
//echo $data_json->status;

//$fp = fopen('results.json', 'w');
//fwrite($fp, make_api_request_with_path( $path) );
//fclose($fp);

if($data_json->status!="OK" ){
    echo $_SESSION['access_token']." ".$_SESSION['refresh_token'];
    var_dump($data_json)."<br>";
    echo "error make request for refress token <br>";
    main(0);
    $data_json= make_api_request_with_path($path); 
    //$t=$t-1;
    //echo "<br>".$data_json->status;
  }

//  echo "<BR>".$_SESSION['access_token']."<BR>";
return $data_json;
}

function run_code($body){
  $oauth_details['access_token']= $_SESSION['access_token']; 
  echo $_SESSION['access_token']."-----";

  
  $path = "https://api.codechef.com/ide/run/"; 
  
  $response = make_api_post_request($oauth_details, $path,$body);
  
  return $response;
}


var_dump( run_code('/ide/run/')) ;
//var_dump( make_api_request_with_path('/language/') );


