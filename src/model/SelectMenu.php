<?php

class ModelMenu{

  public static function Menu($request){
    
    $db = new Entity('eal_menu');
    try {
      
      $db->select("eal_name")
         ->where("eal_active = 1");
      $sth = $db->execute();

      $response = $sth->fetchAll(PDO::FETCH_ASSOC);
      
      return $response;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }
}