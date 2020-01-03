<?php

class ModelSelect{

  public static function Select($table){
    
    $db = new Entity($table);
    try {
      
      $db->select("eal_name as name, ideal_categoria as eal_idcategoria")
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