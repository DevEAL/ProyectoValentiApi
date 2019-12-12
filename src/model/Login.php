<?php
class ModelLogin{
  public function Login($request){
    try {
      $body = $request->getParsedBody();
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }
}