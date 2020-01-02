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


    return CRUD::Insert($this->table, $body);
  }

  public function Update($request, $id){
    $body = $request->getParsedBody();

    return CRUD::Update($this->table, $body, $id);
  }

  public function Delete($id){
    return CRUD::Delete($this->table,$id);
  }
}