<?php

class ModelUser {
  public $table;
  public function __construct()
  {
    $this->table = "eal_user";
  }

  public function SelectAll(){
    return CRUD::Select($this->table, '*', "eal_active= 1");
  }

  public function Select($id){
    return CRUD::Select($this->table, '*', "ideal_user = {$id} AND eal_active= 1");
  }

  public function Insert($request){
    
    $body = $request->getParsedBody();

    $body['password'] = md5($body['password']);

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