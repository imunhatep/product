<?php
namespace Product\Controller;

use Product\Repository\CategoryRepositoryTest;
use Product\Request\Request;
use Product\Response\Response;

class ContactsController extends BaseController
{
    function indexAction(Request $request): Response
    {
        return $this->render(
            'contacts.html.twig',
            [
                'categories' => (new CategoryRepositoryTest)->getAll(),
                'name'       => 'Test name',
                'phone'      => '1234345345'
            ]
        );
    }
}
