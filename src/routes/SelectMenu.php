<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/Menu', function() use ($app) {

    $this->map(['GET'], 's', function(Request $request, Response $response){
      
        $this->logger->info("llego POST '/Menus' route");
        
        $controller = new ControllerMenu();
        $response = $controller->Menu($request);
  
        GetResponse::Response($response, 'Menus');

      });  
});