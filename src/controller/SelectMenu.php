<?php

class ControllerMenu{
  public $model;
  public function __construct()
  {
    $this->model = new ModelMenu();
  }
  public function Menu($request) {

    $body=$request->getHeaders();

    $token = $body['HTTP_TOKEN'][0];

    if (Token::__validar($token)) {

      $response = $this->model->Menu($request);

      if (empty($response)) {
        return 203;
      } elseif (is_array($response)) {
        return array(200, $response);
      } elseif ($response === false) {
        return 503;
      } else {
        return 201;
      }
    } else {
      $response = array("error" => "Session caducada");
      return array(210, $response);
    }
  }
}