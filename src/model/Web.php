<?php

class ModelWeb {
  public $table;
  public function __construct()
  {
    $this->table = "eal_contenido";
  }

  public function SelectAvance(){
    // Declaro los campos a extraer
    $columns = ["EC.ideal_contenido", "EC.eal_img", "EC.eal_dataInicio", "EC.eal_message", "EC.eal_idcategoria", "EC.eal_active", "ECA.eal_name"];
    
    // columnas a comparar
    $inner = "EC.eal_idcategoria = ECA.ideal_categoria";
    // return CRUD::SelectInner("{$this->table} As EC", $columns, "EC.eal_active= 1", "eal_categoria As ECA", $inner);
    $data = [];
    for ($i=1; $i <= 4 ; $i++) {
      
      $rep = CRUD::SelectInner("{$this->table} As EC", $columns, "EC.eal_active= 1  AND EC.eal_idcategoria={$i}", "eal_categoria As ECA", $inner);

      $data += [ "Elemento {$i}" => $rep];
      print_r($data);
      
    }
    return $data;
    // return CRUD::SelectInner("{$this->table} As EC", $columns, "EC.eal_active= 1", "eal_categoria As ECA", $inner);
  }

  public function SelectBoletin(){
    return CRUD::Select("eal_boletin", '*', "eal_active= 1");
  }
}