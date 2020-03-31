<?php
function take_user_to_codechef_permissions_page($config){

  $params = array('response_type'=>'code', 'client_id'=> $config['client_id'], 'redirect_uri'=> $config['redirect_uri'], 'state'=> 'xyz');
  header('Location: ' . $config['authorization_code_endpoint'] . '?' . http_build_query($params));

  echo "dieing.........";
  die();
}

function generate_access_token_first_time($config, $oauth_details){

  $oauth_config = array('grant_type' => 'authorization_code', 'code'=> $oauth_details['authorization_code'], 'client_id' => $config['client_id'],
                        'client_secret' => $config['client_secret'], 'redirect_uri'=> $config['redirect_uri']);
  $response = json_decode(make_curl_request($config['access_token_endpoint'], $oauth_config), true);
  $result = $response['result']['data'];

  $oauth_details['access_token'] = $result['access_token'];
  $oauth_details['refresh_token'] = $result['refresh_token'];
  $oauth_details['scope'] = $result['scope'];

  return $oauth_details;
}

function generate_access_token_from_refresh_token($config, $oauth_details){
  $oauth_config = array('grant_type' => 'refresh_token', 'refresh_token'=> $oauth_details['refresh_token'], 'client_id' => $config['client_id'],
      'client_secret' => $config['client_secret']);
  $response = json_decode(make_curl_request($config['access_token_endpoint'], $oauth_config), true);
  $result = $response['result']['data'];
  $oauth_details['access_token']=" value not changed";
  $oauth_details['access_token'] = $result['access_token'];
  $oauth_details['refresh_token'] = $result['refresh_token'];
  $oauth_details['scope'] = $result['scope'];
   
  return $oauth_details;

}

function make_api_request($oauth_config, $path){
  $headers[] = 'Authorization: Bearer ' . $oauth_config['access_token'];
 // $headers[] = ' link: '.$oauth_config['link'];
 // var_dump($headers);
  return make_curl_request($path, false, $headers);
}

function make_api_post_request($oauth_config, $path,$BODY){
  $headers[] = 'Authorization: Bearer ' . $oauth_config['access_token'];
 //  var_dump( $headers);
   //$body=[ 'language'=>"c++14",
      //  'input'=>"12339", 'sourceCode'=>"#include <bits/stdc++.h>"];
      $body=['language'=>$BODY['language'],
        'input'=>$BODY['input'],
         'sourceCode'=>$BODY['sourceCode']
      ];
  return make_curl_request($path, $body, $headers);
}




function make_curl_request($url, $post = FALSE, $headers = array())
{
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

  if ($post) {
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
  }

  $headers[] = 'content-Type: application/json';
  //var_dump($headers);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $response = curl_exec($ch);
  return $response;
}


function make_contest_problem_api_request($config,$oauth_details){
  $problem_code = "SALARY";
  $contest_code = "PRACTICE";
  $path = $config['api_endpoint']."contests/".$contest_code."/problems/".$problem_code;
  $response = make_api_request($oauth_details, $path);
  return $response;
}

function main($type){
  session_start();
      
  if($_SERVER["HTTP_HOST"]=="localhost:8000")    
  $config = array('client_id'=> '6a851fc4b68c40650d75f84b3f60986c',
  'client_secret' => 'af3dfdd8529a5e4f7e170bdbdce4c3a7',
  'api_endpoint'=> 'https://api.codechef.com/',
  'authorization_code_endpoint'=> 'https://api.codechef.com/oauth/authorize',
  'access_token_endpoint'=> 'https://api.codechef.com/oauth/token',
  'redirect_uri'=> 'http://localhost:8000/info.php',
  'website_base_uri' => 'http://localhost:8000');
  else
  $config = array('client_id'=> 'dcdca47e6f62384cf576c96b6f56995c',
  'client_secret' => '98e28d4777d1e36f05a5c7652f06fd89',
  'api_endpoint'=> 'https://api.codechef.com/',
  'authorization_code_endpoint'=> 'https://api.codechef.com/oauth/authorize',
  'access_token_endpoint'=> 'https://api.codechef.com/oauth/token',
  'redirect_uri'=> 'https://contestarenahowkeye.herokuapp.com/info.php',
  'website_base_uri' => 'https://contestarenahowkeye.herokuapp.com/');
 
  $oauth_details = array('authorization_code' => '',
      'access_token' => '',
      'refresh_token' => '');
  

  if($type==1){    
  if(isset($_GET['code'])){
      $oauth_details['authorization_code'] = $_GET['code'];
     $oauth_details = generate_access_token_first_time($config, $oauth_details);
   echo "access_token: ";
//   echo $oauth_details['access_token'];
   $_SESSION['access_token']=$oauth_details['access_token'];
   $_SESSION['refresh_token']=$oauth_details['refresh_token'];
       echo $_SESSION['access_token'];
       echo "<br>refresh Token: ";
       echo $_SESSION['refresh_token']." <br>";
    // $response = make_contest_problem_api_request($config, $oauth_details);
    
    // echo $response;
   // header("Location: /templates/contests.php");
  }
 else{
      take_user_to_codechef_permissions_page($config);
  } 
  }
  else 
  {   $oauth_details['access_token']=$_SESSION['access_token'];
      $oauth_details['refresh_token']=$_SESSION['refresh_token'];
      $oauth_details = generate_access_token_from_refresh_token($config, $oauth_details); 
      $_SESSION['access_token']=$oauth_details['access_token'];
      $_SESSION['refresh_token']=$oauth_details['refresh_token'];
     // echo "access_token ".$_SESSION['access_token'];
      //echo "<br>refresh Token: ";
     // echo $_SESSION['refresh_token'];
  }
}


function make_api_request_with_path($path,$link=false){
    $oauth_details['access_token']= $_SESSION['access_token']; 
  //  echo $_SESSION['access_token']."-----";
    if($link!=false)
    $oauth_details['link']=$link;


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
   // echo $_SESSION['access_token']." ".$_SESSION['refresh_token'];
    //var_dump($data_json)."<br>";
    //echo "error make request for refress token <br>";
    main(0);
    $data_json= json_decode(make_api_request_with_path($path)); 
    //$t=$t-1;
    //echo "<br>".$data_json->status;
  }

//  echo "<BR>".$_SESSION['access_token']."<BR>";
return $data_json;
}

function run_code($body){
  $oauth_details['access_token']= $_SESSION['access_token']; 
 // echo $_SESSION['access_token']."-----";

  
  $path = "https://api.codechef.com/ide/run/"; 
  
  $response = make_api_post_request($oauth_details, $path,$body);
  //echo "runcode function worked";
  return $response;
}
//main(0);
/*$body['language']="c++14";
$body['sourceCode']="AJHAV aca aec accac ac";
$body['input']="input";

var_dump($body);

$link=json_decode(run_code($body));
var_dump($link);
echo "<br> Link is:";
$link=$link->result->data->link;
var_dump ($link);
echo "<br>";

$url='/ide/status?link='.$link;
$submission=get_json($url); 

var_dump($submission ); 
*/