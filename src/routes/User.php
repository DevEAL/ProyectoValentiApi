<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/User', function() use ($app) {
  $this->map(['GET', 'PUT','DELETE'], '/{id}', function(Request $request, Response $response){
    
    $controller = new ControllerUser();
    switch($request->getMethod()){
      case 'GET':
        $this->logger->info("llego GET'/User' route");
        $response = $controller->Select($request,$request->getAttribute('id'));
    
        GetResponse::Response($response, 'User');

      break;
      case 'PUT':
        $this->logger->info("llego PUT '/User' route");
        $response = $controller->Update($request,$request->getAttribute('id'));
    
        GetResponse::Response($response, 'User');

      break;
      case 'DELETE':
        $this->logger->info("llego DEL '/User' route");
        $response = $controller->Delete($request,$request->getAttribute('id'));
            
        GetResponse::Response($response, 'User');

      break;
    }
  });

  $this->map(['GET'], 's', function(Request $request, Response $response){
        
        
    $this->logger->info("llego Get '/User' routes");
    $Controller = new ControllerUser();
    $response = $Controller->SelectAll($request);

    GetResponse::Response($response, 'User');
        
  });

  $this->map(['POST'], '', function(Request $request, Response $response){
      
    $this->logger->info("llego POST '/User' route");
      
    $controller = new ControllerUser();
    $response = $controller->Insert($request);

    GetResponse::Response($response, 'UserCreate');

  });  
});