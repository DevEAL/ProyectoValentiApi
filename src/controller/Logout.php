<?php

class ControllerLogout{
  public $model;
  public function __construct()
  {
    $this->model = new ModelLogout();
  }
  public function Logout($request) {

    $body=$request->getHeaders();

    $token = $body['HTTP_AUTHORIZATION'][0];

    if (Token::__validar($token)) {

      $response = $this->model->Logout($request);
      return GetResponse::CrontrollerResponse($response);
      
    } else {
      $response = array("error" => "Session caducada");
      return array(210, $response);
    }
  }
}