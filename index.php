<?php
session_start();
use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;
use \slim\Http\Response  as Response;









include __DIR__.'/functions/api.php';
include __DIR__.'/functions/code_decoder.php';
require 'vendor/autoload.php';





$app = new \Slim\App([
    'settings'=>[
        'displayErrorDetails'=>true,
    ]
]);


$container = $app->getContainer();

$container['view'] = function ($container) {

    $view = new \Slim\Views\Twig('templates' );
     
    

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));
    

    return $view;
};
$settings = $container['settings'];
$settings['timeout'] = 600;

$app->get('/', function ($request, $response) {
  if(isset($_SESSION['access_token']))
     $login=1;
  else $login=0;

   // var_dump($_SERVER["HTTP_HOST"]);
     $wrap= ['login'=>$login];
    return $this->view->render($response, 'home.twig', [
       'wrap'=>$wrap,
   ]); 

})->setName('profile');


$app->get('/auth', function (Request $request, Response $response, $args) {
   
    $response = $response->withRedirect('/auth.php',303);
    return $response;
 

}); 




$app->get('/logout',function(Request $request, Response $response) {
    session_unset();
    session_destroy();
    $response = $response->withRedirect('/',303);
    return $response;
});

$app->get('/problems', function ($request, $response) {
  if(isset($_SESSION['access_token']))
    $login=1;
  else $login=0;
  if($login==0)
  return $response->withRedirect('../',303);
  //  echo 

    $contestCode=$_GET['contestCode'];
    $contestCode=decode_contest_code($contestCode);
 
   

    $contest_data= get_json("/contests/". $contestCode);
 
    $problems=$contest_data->result->data->content->problemsList;
 
    $isParent=$contest_data->result->data->content->isParent;
   
    if ($isParent==1){
        $wrap= [
            'contest'=> $contest_data->result->data->content->name,
            'subcontests'=> $contest_data->result->data->content->children,
            'login'=>$login
         ];
    return $this->view->render($response, 'subcontest.twig', [
        'wrap'=> $wrap, 
        
    ]); 

    }
    $problems=$contest_data->result->data->content->problemsList;
    
    if($problems==NULL) {
      echo '<script type="text/javascript">
    alert(" Future/invalid  Contest !! ")
    window.location= "/"</script>';   
    
    }
 
     for ($i=0;$i<count($problems);$i++){
       
     //   echo "<br>/contests/". $contestCode."/problems/".$problems->problemCode;
       // echo "<br><br>";
       
    // var_dump($problems);
         
     //  $problem_data= get_json("/contests/". $contestCode."/problems/".$problems[$i]->problemCode."/");
       // var_dump($problem_data); 
        //$problemName=$problem_data->result->data->content->problemName;
      //  $problemNameCode [$i]['0']=$problemName;
        $problemNameCode[$i]['1']=$problems[$i]->problemCode;
        $problemNameCode[$i]['2']=$problems[$i]->accuracy;
        $problemNameCode[$i]['3']=$problems[$i]->successfulSubmissions;


      }
    

    $submission_data= get_json("/submissions/?contestCode=". $contestCode);
    
    $d=strtotime($contest_data->result->data->content->endDate);
    
    
  
         $wrap= [
            'contest'=> $contestCode,
            'contestName'=>$contest_data->result->data->content->name,
            'endDate'=>$d,
            'problems'=> $problemNameCode,
            'submission'=>$submission_data->result->data->content,
            
         ];
    return $this->view->render($response, 'problems.twig', [
        'wrap'=> $wrap, 
      
    ]); 
  

  

})->setName('Problems');


$app->get('/problem/{conCode}/{probCode}', function ($request, $response, array $args) {

  if(isset($_SESSION['access_token']))
     $login=1;
  else $login=0;
  if($login==0)
   return $response->withRedirect('/',303);

  $problem_data= get_json("/contests/". $args['conCode']."/problems/".$args['probCode']."/"   );
  //var_dump($problem_data);
  $problemStat=$problem_data->result->data->content;  
  //var_dump($problemStat);
 //MarkdownExtra::defaultTransform();  
  $Parsedown = new Parsedown();  
  $problemStatBody= $Parsedown->text($problemStat->body);
  //var_dump( $problemStatBody);
  
  $problemStatBody=str_replace("###", "<h3>",$problemStatBody ); 
  $problemStatBody=str_replace("&lt;br /&gt;", "<br>",$problemStatBody );
   

  # var_dump($problemStatBody);
  //$problemStatBody= $problemStat->body;
 
  $body['language']="ajhgvab";
  $body['language']=$_GET['language'];
  $body['sourceCode']=$_GET['Code'];
  $body['input']=$_GET['input'];

  //var_dump($body);
  
  $runner_output=run_code($body);
  //var_dump($runner_output);

  $link=json_decode($runner_output);
  $link=$link->result->data->link;
  

  

  $url='/ide/status?link='.$link;
 
  
  if(isset($_GET['Code'])){
    $submission=get_json($url); 
  
    $submission=$submission->result->data;
    $t=60;
    echo "<br>".date('h:i:s') . "<br>";
    while($t!=0 && $submission->output=="" && $submission->cmpinfo==""){
     
     /*
     It waits upto 25 sec to chech whether code is compiled or not.*/
      sleep(1);
      $t=$t-1;

    }
    echo date('h:i:s');
  }
         
         
  if(isset($_GET['submit']))
  $output=" Can't Submit Your code feature not implemented";
  
  $wrap= [
     'contest'=> $args['conCode'],
     'problem'=> $problemStat->problemName,
     'problemStat'=>$problemStatBody,
     'output'=>$output,
     'body'=>$body,
     'result'=>$submission,
     'login'=>$login,
     'languages'=>$problemStat->languagesSupported,
     
  ];


 return $this->view->render($response, 'problem.twig', [
   'wrap'=> $wrap,]);   

  

})->setName('Problems');




$app->run();
