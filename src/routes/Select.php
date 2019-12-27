<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/Select', function() use ($app) {

    $this->map(['GET'], '/{table}', function(Request $request, Response $response, array $args){
        
        $table = $args['table'];
        $this->logger->info("llego POST '/Select/{table}' route");
        
        $controller = new ControllerSelect();
        $controller_rsp = $controller->Select($request, $table);
  
        if($controller_rsp===false){
            PrintJson::print(403);
        }
        if(is_array($controller_rsp)){
            PrintJson::print($controller_rsp[0],'Create','data',$controller_rsp[1]);  
        }else{
            PrintJson::print($controller_rsp);  
        } 
      });  
});