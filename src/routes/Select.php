<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/Select', function() use ($app) {

    $this->map(['GET'], '/{table}', function(Request $request, Response $response, array $args){
        
        $table = $args['table'];
        $this->logger->info("llego POST '/Select/{table}' route");
        
        $controller = new ControllerSelect();
        $response = $controller->Select($request, $table);
  
        GetResponse::Response($response, "Select {$table}");

      });  
});