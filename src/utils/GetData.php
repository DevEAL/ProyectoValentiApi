<?php
/**
 * clase CRUD para consultas genericas.
 * @author Yesid Parada <yesid.parada.granados@gmail.com>
 */
class CRUD{
  /**
   *la propiedad fetch funciona para elegir el método de codificación de la petición
  */
  public static function Select($table, $columns, $condition, $fetch = "all") {
    
    $db = new Entity($table);
    
    try {
      $db->select($columns)
         ->where($condition);
      $sth = $db->execute();

      if ($fetch == "all" ){
        $response = $sth->fetchAll(PDO::FETCH_ASSOC);
      } else {
        $response = $sth->fetch(PDO::FETCH_OBJ);
      }

      return $response;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public static function SelectInner($table, $columns, $condition, $table2, $conditionInner, $fetch = "all") {
    $db = new Entity($table);
    
    try {
      $db->select($columns)
         ->inner_join($table2, $conditionInner)
         ->where($condition);
      $sth = $db->execute();

      if ($fetch == "all" ){
        $response = $sth->fetchAll(PDO::FETCH_ASSOC);
      } else {
        $response = $sth->fetch(PDO::FETCH_OBJ);
      }

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