<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/Login', function() use ($app) {

  $this->map(['POST'], '', function(Request $request, Response $response){
      
    $this->logger->info("llego POST '/Login' route");
        
    $controller = new ControllerLogin();
    $response = $controller->Login($request);
  
    GetResponse::Response($response, 'Login');

  });  
});

