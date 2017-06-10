<?php
namespace Product\Controller;

use Product\Request\Request;
use Product\Response\Response;

class ContactsController extends BaseController
{
    function indexAction(Request $request): Response
    {
        return $this->render(
            'contacts.html.twig',
            [
                'name'  => 'Test name',
                'phone' => '1234345345'
            ]
        );
    }
}
