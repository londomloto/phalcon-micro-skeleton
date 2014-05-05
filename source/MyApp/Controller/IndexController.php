<?php
namespace MyApp\Controller;

class IndexController
{
    public static function index($name)
    {
        // Create a response
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json');

        $response->setJsonContent(array(
            'status' => 'OK',
            'body' => $name
        ));

        return $response;
    }
}
