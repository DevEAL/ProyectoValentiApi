<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/Logout', function() use ($app) {

    $this->map(['POST'], '', function(Request $request, Response $response){
      
        $this->logger->info("llego POST '/Logout' route");
        
        $controller = new ControllerLogout();
        $response = $controller->Logout($request);
  
        GetResponse::Response($response, 'Logout');
 
      });  
});
