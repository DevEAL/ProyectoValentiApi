<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/Contact', function() use ($app) {

  $this->map(['GET'], 's', function(Request $request, Response $response){

    $this->logger->info("llego Get '/Contacts' routes");
    $Controller = new ControllerContact();
    $response = $Controller->SelectAll();

    GetResponse::Response($response, 'Contacts');
        
  });
  $this->map(['POST'], '', function(Request $request, Response $response){
      
    $this->logger->info("llego POST '/conexion' route");
    
    $controller = new ControllerContact();
    $response = $controller->Insert($request);

    GetResponse::Response($response, 'ContactCreate');

  });  
});

