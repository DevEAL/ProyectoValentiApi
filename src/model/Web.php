<?php

class ModelWeb {
  public $table;
  public function __construct()
  {
    $this->table = "eal_contenido";
  }

  public function SelectAvance(){

    // url de localización 
    $path = CRUD::Select("eal_parameters", "eal_value as value", "eal_active= 1 AND eal_name='PathWeb'", "Obj");

    // Declaro los campos a extraer
    $columns = ["EC.ideal_contenido as id", "CONCAT('{$path->value}','',EC.eal_img) As img", "CONCAT(DATE_FORMAT(EC.eal_dataInicio, '%d/%m/%Y'),' - ', EC.eal_message) As mensaje ", "ECA.eal_name as title"];
    
    // columnas a comparar
    $inner = "EC.eal_idcategoria = ECA.ideal_categoria";
    $data = [];

    for ($i=1; $i <= 5 ; $i++) {
      
      $rep = CRUD::SelectInner("{$this->table} As EC", $columns, "EC.eal_active= 1  AND EC.eal_idcategoria={$i}", "eal_categoria As ECA", $inner);

      $data += [ "Elemento{$i}" => $rep];
      
    }
    return $data;
  }

  public function SelectBoletin(){

    // url de localización 
    $path = CRUD::Select("eal_parameters", "eal_value as value", "eal_active= 1 AND eal_name='PathWeb'", "Obj");
    
    // Declaro los campos a extraer
    $columns = ["eal_titulo As titulo", "eal_texto As texto", "CONCAT('{$path->value}','',eal_articulo) As Articulo", "CONCAT('{$path->value}','',eal_poster) As Poster"];
    
    return CRUD::Select("eal_boletin", $columns, "eal_active= 1");
  }
}