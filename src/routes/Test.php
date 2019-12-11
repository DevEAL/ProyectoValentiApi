<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/prueba', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("llego '/prueba' route");
    
    $rsp = array('greeting' => 'hello test');
    PrintJson::print(200, 'Hello', 'Test', $rsp);
});