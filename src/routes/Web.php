<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/Web', function() use ($app) {

  $this->map(['GET'], '/Avances', function(Request $request, Response $response){

    $this->logger->info("llego Get '/Web/Avances' routes");
    $Controller = new ControllerWeb();
    $response = $Controller->SelectAvance();

    GetResponse::Response($response, 'avances');
        
  });
  $this->map(['GET'], '/Boletines', function(Request $request, Response $response){
      
    $this->logger->info("llego POST '/Web/Boletines' route");
    
    $controller = new ControllerWeb();
    $response = $controller->SelectBoletin($request);

    GetResponse::Response($response, 'Boletines');

  });  
});