<?php

class ModelLogout{
  public function Logout($request){

    $body = $request->getParsedBody();
    $db = new Entity('eal_user');
    $update = array("eal_token" => "''");
    try {
      $db->update($update)
         ->where("eal_name = '{$body['name']}' and eal_login= '{$body['name']}'");
      $db->execute();

      return array("mensaje" => "Usuario Deslogueado");
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }
}