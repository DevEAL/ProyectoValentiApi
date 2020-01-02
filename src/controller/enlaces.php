<?php

class ControllerEnlaces {
  public $model;

  public function __construct()
  {
    $this->model = new ModelEnlaces();
  }
  public function SelectAll () {

    $response = $this->model->SelectAll();
    return GetResponse::CrontrollerResponse($response);
    
  }
}