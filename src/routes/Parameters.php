<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/Enlace', function() use ($app) {
    $this->map(['GET'], 's', function(Request $request, Response $response){
        $Controller = new ControllerEnlaces();
        $response = $Controller->SelectAll();

        if ($response === false) {
            PrintJson::print(404);
        } else if (is_array($response)) {
            PrintJson::print($response[0], 'Inscription', 'data', $response[1]);
        } else {
            PrintJson::print($response);
        }
    });
});
