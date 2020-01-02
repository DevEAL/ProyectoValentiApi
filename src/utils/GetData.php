<?php
/**
 * clase CRUD para consultas genericas.
 * @author Yesid Parada <yesid.parada.granados@gmail.com>
 */
class CRUD{

  public static function Select($table, $columns, $condition) {
    
    $db = new Entity($table);
    
    try {
      $db->select($columns)
         ->where($condition);
      $sth = $db->execute();

      $response = $sth->fetchAll(PDO::FETCH_ASSOC);

      return $response;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public static function Insert($table, $body){
    
    $arrayBody = [];
    $arrayExecute = [];
    
    foreach ($body as $key => $value) {
      $arrayBody["eal_{$key}"] = ':' . "eal_{$key}";
      $arrayExecute[':' . "eal_{$key}"] = $value;
    }

    $db = new Entity($table);
    try {
      $db->Insert($arrayBody);
      $db->execute($arrayExecute);
  
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public static function InsertId($table, $body){

    $arrayBody = [];
    $arrayExecute = [];
    
    foreach ($body as $key => $value) {
      $arrayBody["eal_{$key}"] = ':' . "eal_{$key}";
      $arrayExecute[':' . "eal_{$key}"] = $value;
    }

    $db = new Entity($table);
    try {
      $db->Insert($arrayBody);
      $id = $db->execute_id($arrayExecute);
  
      return $id;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public static function Update($table, $body, $id){
    
    $arrayBody = [];
    $arrayExecute = [];
    
    foreach ($body as $key => $value) {
      $arrayBody["eal_{$key}"] = ':' . "eal_{$key}";
      $arrayExecute[':' . "eal_{$key}"] = $value;
    }

    $db = new Entity($table);
    try {
      $db->update($arrayBody)
         ->where(["id{$table}" => $id]);
      $db->execute($arrayExecute);
  
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public static function Delete($table, $id){
    $db = new Entity($table);
    try {
      $db->update(["eal_Active" => "0"])
         ->where(["id{$table}" => $id]);
      $sth = $db->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }
}