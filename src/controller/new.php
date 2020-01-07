<?php

class ControllerNew{

  public $model;

  public function __construct()
  {
    $this->model = new ModelNew();
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
      $modelNew = new ModelNew();
      $response = $modelNew->Select($id);
      
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

      $modelNew = new ModelNew();
      $response = $modelNew->Insert($request);
      
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

      $modelNew = new ModelNew();
      $response = $modelNew->Update($request, $id);
      
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

      $modelNew = new ModelNew();
      $response = $modelNew->Delete($id);
      
      return GetResponse::CrontrollerResponse($response);
    } else {
      $response = array("error" => "Session caducada");
      return array(210, $response);
    }
  }
}