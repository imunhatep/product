<?php
namespace Product\Routing;

use Product\Controller\BaseController;
use Product\Controller\ContactsController;
use Product\Request\Request;
use Product\Response\Response;

class Router
{
    private $routes;
    private $twig;

    function __construct(\Twig_Environment $twig, array $routes = [])
    {
        $this->twig = $twig;

        foreach($routes as $path => $controller){
            $this->addRoute($path, $controller);
        }
    }

    function addRoute(string $path, string $controller)
    {
        $this->routes[$path] = $controller;

        return $this;
    }

    function dispatch(Request $request): Response
    {
        /** @var ContactsController $controller */
        $controller = $this->getController($request->getServer('PATH_INFO', $request->getServer('REQUEST_URI')));

        return call_user_func_array([$controller, 'indexAction'], [$request]);
    }

    private function getController(string $path): BaseController
    {
        $parts = explode('/', trim($path, '/'));
        $context = '/' . (reset($parts) ?? '');

        if (!array_key_exists($context, $this->routes)) {
            throw new \Exception('Route not found');
        }

        return new $this->routes[$context]($this->twig);
    }
}
