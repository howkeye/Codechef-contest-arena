<?php
session_start();



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
    return make_curl_request($path, false, $headers);
}

function make_api_post_request($oauth_config, $path,$BODY){
    $headers[] = 'Authorization: Bearer ' . $oauth_config['access_token'];
    $body[]=$BODY;
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

        
    $config = array('client_id'=> '6a851fc4b68c40650d75f84b3f60986c',
    'client_secret' => 'af3dfdd8529a5e4f7e170bdbdce4c3a7',
    'api_endpoint'=> 'https://api.codechef.com/',
    'authorization_code_endpoint'=> 'https://api.codechef.com/oauth/authorize',
    'access_token_endpoint'=> 'https://api.codechef.com/oauth/token',
    'redirect_uri'=> 'http://localhost:8000/info.php',
    'website_base_uri' => 'http://localhost:8000');
   
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
        echo "access_token ".$_SESSION['access_token'];
        echo "<br>refresh Token: ";
        echo $_SESSION['refresh_token'];
    }
}

//main(1);
//main(2);