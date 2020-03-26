<?php
session_start();
use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;
use \slim\Http\Response  as Response;
use Michelf\MarkdownExtra;







//require __DIR__.'/functions/auth.php';
include __DIR__.'/functions/api.php';
include __DIR__.'/latexparser.php';
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
    $contest_data= get_json("/contests/". $_GET['myCountry']."A");
    $problems=$contest_data->result->data->content->problemsList;  
   // echo " ============ <br> =======";  
   var_dump($problems[0]);
  
         $name=  $problems;
         echo $name;
         $wrap= [
            'contest'=> $_GET['myCountry']."A",
            'problems'=> $problems,
         ];
    return $this->view->render($response, 'problems.twig', [
        'wrap'=> $wrap,
      
    ]); 
  

  

})->setName('Problems'.' | '.$_GET['myCountry']);


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
  
 // var_dump( $problemStat->Body );
    
 $body['language']=$_GET['language'];
 $body['sourceCode']=$_GET['sourcecode'];
 $body['input']=$_GET['input'];
 //$runner_output=run_code($body);
 //var_dump($runner_output);

         
         
         if(isset($_GET['submit']))
         $output=" Can't Submit Your code feature not implemented";
         
         $wrap= [
            '#type' => 'inline_template',
            'contest'=> $args['conCode'],
            'problem'=> $problemStat->problemName,
            'problemStat'=>$problemStatBody,
            'output'=>$output,
            
         ];

 //problem($wrap);
  return $this->view->render($response, 'problem.twig', [
   'wrap'=> $wrap,]);  

  

})->setName('Problems');




$app->run();
