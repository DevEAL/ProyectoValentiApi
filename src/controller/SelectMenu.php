<?php

class ControllerMenu{
  public $model;
  public function __construct()
  {
    $this->model = new ModelMenu();
  }
  public function Menu($request) {

    $body=$request->getHeaders();

    $token = $body['HTTP_AUTHORIZATION'][0];

    if (Token::__validar($token)) {

      $response = $this->model->Menu($request);

      return GetResponse::CrontrollerResponse($response);

    } else {

      $response = array("error" => "Session caducada");
      return array(210, $response);
      
    }
  }
}