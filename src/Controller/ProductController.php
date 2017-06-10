<?php
namespace Product\Controller;

use Product\Request\RequestInterface;
use Product\Response\Response;

class ProductController extends BaseController
{
    function indexAction(RequestInterface $request): Response
    {
        return $this->render('base.html.twig');
    }
}
