<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->group('/Api', function () use ($app) {
    $this->map(['GET'], '/Inscription', function(Request $request, Response $response){
        $Controller = new ControllerInscription();
        $response = $Controller->SelectAll();

        if ($response === false) {
            PrintJson::print(404);
        } else if (is_array($response)) {
            PrintJson::print($response[0], 'Inscription', 'data', $response[1]);
        } else {
            PrintJson::print($response);
        }
    });

    $this->map(['POST'], '/Inscription/Post', function(Request $request, Response $response){
        $Controller = new ControllerInscription();
        $response = $Controller->Insert($request);

        if ($response === false) {
            PrintJson::print(404);
        } else if (is_array($response)) {
            PrintJson::print($response[0], 'Create', 'data', $response[1]);
        } else {
            PrintJson::print($response);
        }
    });

    $this->map(['GET'], '/Contact', function(Request $request, Response $response){
        $Controller = new ControllerContact();
        $response = $Controller->SelectAll();

        if ($response === false) {
            PrintJson::print(404);
        } else if (is_array($response)) {
            PrintJson::print($response[0], 'Inscription', 'data', $response[1]);
        } else {
            PrintJson::print($response);
        }
    });

    $this->map(['POST'], '/Contact/Post', function(Request $request, Response $response){
        $Controller = new ControllerContact();
        $response = $Controller->Insert($request);

        if ($response === false) {
            PrintJson::print(404);
        } else if (is_array($response)) {
            PrintJson::print($response[0], 'Create', 'data', $response[1]);
        } else {
            PrintJson::print($response);
        }
    });

    $this->map(['GET'], '/Test', function(Request $request, Response $response){
        $rsp = array('greeting' => 'hello test');
        PrintJson::print(200, 'Hello', 'Test', $rsp);
    });

    $this->map(['GET'], '/enlaces', function(Request $request, Response $response){
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
