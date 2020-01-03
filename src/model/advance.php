<?php

class ModelAdvance {
  public $table;
  public function __construct()
  {
    $this->table = "eal_contenido";
  }

  public function SelectAll(){
    return CRUD::Select($this->table, '*', "eal_active= 1");
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