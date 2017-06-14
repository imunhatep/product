<?php
namespace Product\Controller;

use Product\Response\Response;

abstract class BaseController
{
    /** @var \Twig_Environment  */
    private $twig;

    function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    protected function render(string $template, array $data = []): Response
    {
        return new Response($this->twig->render($template, $data));
    }
}
