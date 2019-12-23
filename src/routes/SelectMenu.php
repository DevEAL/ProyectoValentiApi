<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/Menu', function() use ($app) {

    $this->map(['GET'], 's', function(Request $request, Response $response){
      
        $this->logger->info("llego POST '/Menus' route");
        
        $controller = new ControllerMenu();
        $controller_rsp = $controller->Menu($request);
  
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