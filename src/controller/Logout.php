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