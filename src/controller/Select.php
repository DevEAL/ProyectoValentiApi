<?php

class ControllerSelect{
  public $model;
  public function __construct()
  {
    $this->model = new ModelSelect();
  }
  public function Select($request, $table) {

    $body=$request->getHeaders();

    $token = $body['HTTP_AUTHORIZATION'][0];

    if (Token::__validar($token)) {

      $response = $this->model->Select($table);

      return GetResponse::CrontrollerResponse($response);

    } else {

      $response = array("error" => "Session caducada");
      return array(210, $response);
      
    }
  }
}