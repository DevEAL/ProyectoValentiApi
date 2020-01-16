<?php

class ControllerLogin{
  public $model;

  public function __construct()
  {
    $this->model = new ModelLogin();
  }
  public function Login($request) {

    $response = $this->model->Login($request);

    if (empty($response)) {
        return 203;
    } elseif (is_array($response)) {
      if (isset($response['error'])) {
        return array(210, $response);
      } else {
        return array(200, $response);
      }
    } elseif ($response === false) {
        return 503;
    } else {
        return 201;
    }
  }
}