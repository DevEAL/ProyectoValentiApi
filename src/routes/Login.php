<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/Login', function() use ($app) {

    $this->map(['POST'], '', function(Request $request, Response $response){
      
        $this->logger->info("llego POST '/conexion' route");
        
        $controller = new ControllerLogin();
        $controller_rsp = $controller->Login($request);
  
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

