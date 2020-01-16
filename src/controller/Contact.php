<?php

class ControllerContact {
  public $model;

  public function __construct()
  {
    $this->model = new ModelContact();
  }
  public function SelectAll () {
    
    $response = $this->model->SelectAll();
    return GetResponse::CrontrollerResponse($response);

  }
  public function Insert($request) {
    
    $response = $this->model->Insert($request);
    return GetResponse::CrontrollerResponse($response);
    
  }
}