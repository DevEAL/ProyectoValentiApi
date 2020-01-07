<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/New', function() use ($app) {
  $this->map(['GET', 'PUT','DELETE'], '/{id}', function(Request $request, Response $response){
    
    $controller = new ControllerNew();
    switch($request->getMethod()){
      case 'GET':
        $this->logger->info("llego GET'/New' route");
        $response = $controller->Select($request,$request->getAttribute('id'));
    
        GetResponse::Response($response, 'New');

      break;
      case 'PUT':
        $this->logger->info("llego PUT '/New' route");
        $response = $controller->Update($request,$request->getAttribute('id'));
    
        GetResponse::Response($response, 'New');

      break;
      case 'DELETE':
        $this->logger->info("llego DEL '/New' route");
        $response = $controller->Delete($request,$request->getAttribute('id'));
            
        GetResponse::Response($response, 'New');

      break;
    }
  });

  $this->map(['GET'], 's', function(Request $request, Response $response){
        
        
    $this->logger->info("llego Get '/New' routes");
    $Controller = new ControllerNew();
    $response = $Controller->SelectAll($request);

    GetResponse::Response($response, 'New');
        
  });

  $this->map(['POST'], '', function(Request $request, Response $response){
      
    $this->logger->info("llego POST '/New' route");
      
    $controller = new ControllerNew();
    $response = $controller->Insert($request);

    GetResponse::Response($response, 'NewCreate');

  });  
});