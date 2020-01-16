<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/Advance', function() use ($app) {
  $this->map(['GET', 'PUT','DELETE'], '/{id}', function(Request $request, Response $response){
    
    $controller = new ControllerAdvance();
    switch($request->getMethod()){
      case 'GET':
        $this->logger->info("llego GET'/Advance' route");
        $response = $controller->Select($request,$request->getAttribute('id'));
    
        GetResponse::Response($response, 'Advance');

      break;
      case 'PUT':
        $this->logger->info("llego PUT '/Advance' route");
        $response = $controller->Update($request,$request->getAttribute('id'));
    
        GetResponse::Response($response, 'Advance');

      break;
      case 'DELETE':
        $this->logger->info("llego DEL '/Advance' route");
        $response = $controller->Delete($request,$request->getAttribute('id'));
            
        GetResponse::Response($response, 'Advance');

      break;
    }
  });

  $this->map(['GET'], 's', function(Request $request, Response $response){
        
        
    $this->logger->info("llego Get '/Advance' routes");
    $Controller = new ControllerAdvance();
    $response = $Controller->SelectAll($request);

    GetResponse::Response($response, 'Advance');
        
  });

  $this->map(['POST'], '', function(Request $request, Response $response){
      
    $this->logger->info("llego POST '/Advance' route");
      
    $controller = new ControllerAdvance();
    $response = $controller->Insert($request);

    GetResponse::Response($response, 'AdvanceCreate');

  });  
});