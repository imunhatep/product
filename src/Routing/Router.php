<?php
namespace Product\Routing;

use Product\Request\Request;

class Router
{
    private $request;
    private $routes;
    private $twig;

    function __construct(Request $request, \Twig_Environment $twig, array $routes = [])
    {
        $this->request = $request;
        $this->twig = $twig;
        $this->routes = $routes;
    }

    function addRoute(string $path, string $context)
    {
        $this->routes[$path] = $context;

        return $this;
    }

    function dispatch()
    {
        $scriptName = $this->request->getServer('SCRIPT_NAME');

        $parts = explode('/', trim($scriptName, '/'));
        array_pop($parts);

        $context = '/' . (reset($parts) ?? '');

        if(!array_key_exists($context, $this->routes)){
            throw new \Exception('Route not found');
        }

        $controller = new $this->routes[$context]($this->twig);

        return call_user_func_array([$controller, 'indexAction'], [$this->request]);
    }
}
