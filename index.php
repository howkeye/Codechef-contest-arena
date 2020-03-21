<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
include 'functions/auth.php';

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


$app->get('/hello/{name}', function ($request, $response, $args) {
    return $this->view->render($response, 'base.html', [
        'name' => $args['name']
    ]);
})->setName('profile');


$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write(
        "  Hello world!" 
    );
    return $response;
});

$app->get('/auth', function (Request $request, Response $response, $args) {
    main();
    //$response->getBody()->write("Hello world!");
    //return $response;
});




$app->run();
