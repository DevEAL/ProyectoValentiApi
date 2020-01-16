<?php

class ModelAdvance {
  public $table;
  public function __construct()
  {
    $this->table = "eal_contenido";
  }

  public function SelectAll(){
    $columns = ["EC.ideal_contenido", "EC.eal_img", "EC.eal_dataInicio", "EC.eal_message", "EC.eal_idcategoria", "EC.eal_active", "ECA.eal_name"];
    $inner = "EC.eal_idcategoria = ECA.ideal_categoria";
    return CRUD::SelectInner("{$this->table} As EC", $columns, "EC.eal_active= 1", "eal_categoria As ECA", $inner);
  }

  public function Select($id){
    return CRUD::Select($this->table, '*', "ideal_contenido = {$id} AND eal_active= 1");
  }

  public function Insert($request){
    
    $body = $request->getParsedBody();

    $img = $body['url'];

    unset($body['url']);

    if (CRUD::Insert($this->table, $body)) {
      return Subir::SubirImg($img,$body['img']);
    } else {
      return false;
    }
  }

  public function Update($request, $id){
    $body = $request->getParsedBody();

    return CRUD::Update($this->table, $body, $id);
  }

  public function Delete($id){
    return CRUD::Delete($this->table,$id);
  }
}