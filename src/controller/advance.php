<?php

class ControllerAdvance{

  public $model;

  public function __construct()
  {
    $this->model = new ModelAdvance();
  }
  public function SelectAll($request) {

    $body=$request->getHeaders();

    $token = $body['HTTP_AUTHORIZATION'][0];

    if (Token::__validar($token)) {

      $response = $this->model->SelectAll();
      
      return GetResponse::CrontrollerResponse($response);
    } else {
      $response = array("error" => "Session caducada");
      return array(210, $response);
    }
  }

  public static function Select($request, $id){
    $body=$request->getHeaders();

    $token = $body['HTTP_AUTHORIZATION'][0];

    if (Token::__validar($token)) {
      $modelAdvance = new ModelAdvance();
      $response = $modelAdvance->Select($id);
      
      return GetResponse::CrontrollerResponse($response);
    } else {
      $response = array("error" => "Session caducada");
      return array(210, $response);
    }
  }

  public static function Insert($request){
    $body=$request->getHeaders();

    $token = $body['HTTP_AUTHORIZATION'][0];

    if (Token::__validar($token)) {

      $modelAdvance = new ModelAdvance();
      $response = $modelAdvance->Insert($request);
      
      return GetResponse::CrontrollerResponse($response);
    } else {
      $response = array("error" => "Session caducada");
      return array(210, $response);
    }
  }
  
  public static function Update($request, $id){
    $body=$request->getHeaders();

    $token = $body['HTTP_AUTHORIZATION'][0];

    if (Token::__validar($token)) {

      $modelAdvance = new ModelAdvance();
      $response = $modelAdvance->Update($request, $id);
      
      return GetResponse::CrontrollerResponse($response);
    } else {
      $response = array("error" => "Session caducada");
      return array(210, $response);
    }
  }

  public static function Delete($request, $id){
    $body=$request->getHeaders();

    $token = $body['HTTP_AUTHORIZATION'][0];

    if (Token::__validar($token)) {

      $modelAdvance = new ModelAdvance();
      $response = $modelAdvance->Delete($id);
      
      return GetResponse::CrontrollerResponse($response);
    } else {
      $response = array("error" => "Session caducada");
      return array(210, $response);
    }
  }
}