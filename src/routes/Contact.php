<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/Contact', function() use ($app) {

    $this->map(['GET'], 's', function(Request $request, Response $response){
        $this->logger->info("llego Get '/Contacts' routes");
        $Controller = new ControllerContact();
        $response = $Controller->SelectAll();
        
        if ($response === false) {
            PrintJson::print(404);
        } else if (is_array($response)) {
            PrintJson::print($response[0], 'Contacts', 'data', $response[1]);
        } else {
            PrintJson::print($response);
        }
    });
    $this->map(['POST'], '', function(Request $request, Response $response){
      
      $this->logger->info("llego POST '/conexion' route");
      
      $controller = new ControllerContact();
      $controller_rsp = $controller->Insert($request);

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

