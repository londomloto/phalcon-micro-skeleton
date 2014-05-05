<?php

$routes = include __DIR__ . '/routes.php';

foreach ($routes as $controllerName => $actions) {
    $collection = new \Phalcon\Mvc\Micro\Collection();

    $controller = '\\MyApp\\Controller\\' . ucfirst($controllerName) . 'Controller';
    $collection->setHandler(new $controller());

    foreach ($actions as $method => $action) {
        $collection->$method($action[0], $action[1]);
    }

    $app->mount($collection);
}

/**
 * Not found handler
 */
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, 'Not Found')->sendHeaders();
    $app->response->setContentType('application/json')->sendHeaders();
    echo json_encode(array(
        'status' => 'Not Found'
    ));
});
