<?php
namespace MyApp\Controller;

class IndexController extends \Phalcon\Mvc\Controller
{
    public function index($body)
    {
        // Create a response
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json');

        $response->setJsonContent(array(
            'status' => 'OK',
            'body' => $body
        ));

        return $response;
    }
}
