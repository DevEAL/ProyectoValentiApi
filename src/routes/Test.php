<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/Test', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("llego '/Test' route");
    
    $rsp = array('greeting' => 'hello Test');
    PrintJson::print(200, 'Hello', 'Test', $rsp);
});