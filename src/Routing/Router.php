<?php
namespace Product\Routing;

use Product\Request\Request;
use Product\Response\Response;

class Router
{
    private $routes;
    private $twig;

    function __construct(\Twig_Environment $twig, array $routes = [])
    {
        $this->twig = $twig;
        $this->routes = $routes;
    }

    function addRoute(string $path, string $context)
    {
        $this->routes[$path] = $context;

        return $this;
    }

    function dispatch(Request $request): Response
    {

        $scriptName = $request->getServer('PATH_INFO');

        $parts = explode('/', trim($scriptName, '/'));
        $context = '/' . (reset($parts) ?? '');

        if(!array_key_exists($context, $this->routes)){
            throw new \Exception('Route not found');
        }

        $controller = new $this->routes[$context]($this->twig);

        return call_user_func_array([$controller, 'indexAction'], [$request]);
    }
}
