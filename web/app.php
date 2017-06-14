<?php
require_once '../vendor/autoload.php';

use Product\Request\Request;
use Product\Controller\ProductController;
use Product\Controller\ContactsController;
use Product\Routing\Router;

$loader = new Twig_Loader_Filesystem('../src/Resources/view');

$twigConfig = getenv('ENV') === 'prod'
    ? ['cache' => '../var/cache',]
    : [];

$twig = new Twig_Environment($loader, $twigConfig);

$request = Request::createFromGlobals();
$router = new Router(
    $twig,
    [
        '/'         => ProductController::class,
        '/products' => ProductController::class,
        '/contacts' => ContactsController::class
    ]
);

$response = $router->dispatch($request);
//$response = (new ProductController($twig))->indexAction($request);
//$response = (new ContactsController($twig))->indexAction($request);

echo (string)$response;
