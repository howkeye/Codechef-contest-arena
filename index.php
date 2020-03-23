<?php
session_start();
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
include 'function/auth.php';
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
})->setName('profile');


$app->get('/auth', function (Request $request, Response $response, $args) {
    main(1);
  //  main(0);
    //$response->getBody()->write("Hello world!");
    return $app->redirect('/con', 301);

});

$app->get('/info', function (Request $request, Response $response, $args) {
    $response->getBody()->write(
        "  Hello world!" +$_GET['code']+$_GET['state']
    );
    return $response;
});





$app->run();
