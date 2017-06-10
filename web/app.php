<?php
require_once '../vendor/autoload.php';

use Product\Request\Request;
use Product\Controller\ProductController;

$loader = new Twig_Loader_Filesystem('../src/Resources/view');
$twig = new Twig_Environment( $loader, [ 'cache' => '../var/cache', ]);

$request = Request::createFromGlobals();

$response = (new ProductController($twig))->indexAction($request);

echo (string) $response;
