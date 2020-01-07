<?php

class ControllerUser{

  public $model;

  public function __construct()
  {
    $this->model = new ModelUser();
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
      $modelUser = new ModelUser();
      $response = $modelUser->Select($id);
      
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

      $modelUser = new ModelUser();
      $response = $modelUser->Insert($request);
      
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

      $modelUser = new ModelUser();
      $response = $modelUser->Update($request, $id);
      
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

      $modelUser = new ModelUser();
      $response = $modelUser->Delete($id);
      
      return GetResponse::CrontrollerResponse($response);
    } else {
      $response = array("error" => "Session caducada");
      return array(210, $response);
    }
  }
}