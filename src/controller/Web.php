<?php

class ControllerWeb {
  public $model;

  public function __construct()
  {
    $this->model = new ModelWeb();
  }
  public function SelectAvance () {
    
    $response = $this->model->SelectAvance();
    return GetResponse::CrontrollerResponse($response);

  }
  public function SelectBoletin() {
    
    $response = $this->model->SelectBoletin();
    return GetResponse::CrontrollerResponse($response);
    
  }
}