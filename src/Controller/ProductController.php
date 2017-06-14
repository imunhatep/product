<?php
namespace Product\Controller;

use Product\Repository\CategoryRepositoryTest;
use Product\Request\RequestInterface;
use Product\Request\Session;
use Product\Response\Response;

class ProductController extends BaseController
{
    function indexAction(RequestInterface $request): Response
    {
        /** @var Session $session */
        $session = $request->getSession();

        $categoryRepo = new CategoryRepositoryTest;

        return $this->render(
            'product.html.twig',
            [
                'categories' => $categoryRepo->getAll(),
                'comments'   => []
            ]
        );
    }
}
