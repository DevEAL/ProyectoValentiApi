<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/Enlace', function() use ($app) {
    $this->map(['GET'], 's', function(Request $request, Response $response){
        $Controller = new ControllerEnlaces();
        $response = $Controller->SelectAll();

        GetResponse::Response($response, 'Parameters');

    });
});
