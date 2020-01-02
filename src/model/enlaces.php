<?php

class ModelEnlaces {

  public function SelectAll() {
    $db = new Entity('eal_parameters');
    try {
      $db->select('eal_value AS value')
         ->where('eal_name = "Email_contacto" AND eal_active = 1');
      $sth = $db->execute();

      $response = $sth->fetch(PDO::FETCH_ASSOC);
      return $response;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
  }
}