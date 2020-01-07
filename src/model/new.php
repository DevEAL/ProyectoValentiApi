<?php

class ModelNew {
  public $table;
  public function __construct()
  {
    $this->table = "eal_boletin";
  }

  public function SelectAll(){
    return CRUD::Select($this->table, '*', "eal_active= 1");
  }

  public function Select($id){
    return CRUD::Select($this->table, '*', "ideal_boletin = {$id} AND eal_active= 1");
  }

  public function Insert($request){
    
    $body = $request->getParsedBody();

    $img = $body['urlimg'];
    $pdf = $body['urlpdf'];

    // elimino los campos inecesarios
    unset($body['urlimg']);
    unset($body['urlpdf']);

    if (CRUD::Insert($this->table, $body)) {
      if (Subir::SubirImg($img,$body['poster'])) {
        return Subir::Documento1($pdf,$body['articulo']);
      } else {
        return false;
      }
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