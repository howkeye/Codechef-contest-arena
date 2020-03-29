<?php
session_start();
use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;
use \slim\Http\Response  as Response;
use Michelf\MarkdownExtra;







//require __DIR__.'/functions/auth.php';
include __DIR__.'/functions/api.php';
include __DIR__.'/functions/code_decoder.php';
//include __DIR__.'/templates/problem.php';
//main();
require 'vendor/autoload.php';





$app = new \Slim\App([
    'settings'=>[
        'displayErrorDetails'=>true,
    ]
]);


$container = $app->getContainer();

$container['view'] = function ($container) {

    $view = new \Slim\Views\Twig('templates', [
        'cache' => 'cache'
    ]);
     
    

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));
    

    return $view;
};


$app->get('/', function ($request, $response) {
    if(isset($_SESSION['access_token']))
       $flag=1;
    else $flag=0;
    return $this->view->render($response, 'home.twig', [
        'flag'=> $flag,
    ]); 
    //echo "AJBAN";
})->setName('profile');


$app->get('/auth', function (Request $request, Response $response, $args) {
    main(1);
  //  main(0);
    //$response->getBody()->write("Hello world!");
   // return $app->redirect('/con', 301);

}); 


/*$app->get('/logout', function() use ($app){
    echo "Initial: ".memory_get_usage()." bytes \n";
    echo "Peak: ".memory_get_peak_usage()." bytes \n";
    session_unset();
    session_destroy();
    //header("location: https:/www.google.com");
    return $app->redirect('../new',302);
});*/

$app->get('/logout',function(Request $request, Response $response) {
    session_unset();
    session_destroy();
    $response = $response->withRedirect('/',303);
    return $response;
});

$app->get('/problems', function ($request, $response) {
    $contestCode=$_GET['contestCode'];
    $contestCode=decode_contest_code($contestCode);
    $contest_data= get_json("/contests/". $contestCode);
    
    $isParent=$contest_data->result->data->content->isParent;
     
    if ($isParent==1){
        $wrap= [
            'contest'=> $contest_data->result->data->content->name,
            'subcontests'=> $contest_data->result->data->content->children
         ];
    return $this->view->render($response, 'subcontest.twig', [
        'wrap'=> $wrap, 
      
    ]); 

    }
   
    $problems=$contest_data->result->data->content->problemsList;
      for ($i=0;$i<count($problems);$i++){

        $problem_data= get_json("/contests/". $contestCode."/problems/".$problems->problemCode."/");
        $problemName=$problem_data->result->data->content->problemName;
        $problemNames []=$problemName;
      }
      var_dump($problemNames);


   //  echo var_dump($problems[0]);
  
         $wrap= [
            'contest'=> $contest_data->result->data->content->name,
            'problems'=> $problems
         ];
    return $this->view->render($response, 'problems.twig', [
        'wrap'=> $wrap, 
      
    ]); 
  

  

})->setName('Problems'.' | '.$_GET['contestcode']);


$app->get('/problem/{conCode}/{probCode}', function ($request, $response, array $args) {
    $problem_data= get_json("/contests/". $args['conCode']."/problems/".$args['probCode']."/"   );
   // echo "<br>/contests/". $args['conCode']."/problems/".$args['probCode']."/<br>" ;
 //  $problem_data= get_json("/contests/LTIME81A/problems/CORTREE "  );
   // var_dump($problem_data);

   // echo "<Br>".$args['conCode']." ".$args['probCode'];

   $problemStat=$problem_data->result->data->content;  
 // var_dump($problemStat);
   // echo " ============ <br> =======";
  $problemStatBody=MarkdownExtra::defaultTransform($problemStat->body);  
  
 //var_dump( $problemStat->Body );
 $body['language']="ajhgvab";
 $body['language']=$_GET['language'];
 $body['sourceCode']=$_GET['Code'];
 $body['input']=$_GET['input'];
 echo $_GET['language']." AHGAV ";
 $runner_output=run_code($body);
 //var_dump($body);
 

 $link=json_decode($runner_output);
 $link=$link->result->data->link;
 echo "<br> link is: " .$link."<br>";
 $url='/ide/status?link='.$link;
 var_dump($url);
 $submission=get_json($url); 

 $submission=$submission->result->data;
 var_dump( $submission  );

         
         
         if(isset($_GET['submit']))
         $output=" Can't Submit Your code feature not implemented";
         
         $wrap= [
            'contest'=> $args['conCode'],
            'problem'=> $problemStat->problemName,
            'problemStat'=>$problemStatBody,
            'output'=>$output,
            'body'=>$body,
            'result'=>$submission
            
         ];

 //problem($wrap);
 return $this->view->render($response, 'problem.twig', [
   'wrap'=> $wrap,]);   

  

})->setName('Problems');




$app->run();
