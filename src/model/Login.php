<?php
class ModelLogin{
  public function Login($request){
    try {
      $body = $request->getParsedBody();

      $user = $body['user'];
      $password = md5($body['password']);

      $validar = self::validar($user, $password);

      if ($validar['status']) {
        
        // genero token de session
        $token = Token::__generar($user, $password);

        // actualizo el token 

        if (self::Insertar($token, $validar['id'])) {

          // Consulta de datos basicos

          $response = self::Select($validar['id']);

          if (empty($response)) {
            return array(
              "error" => "error de session"
            );
          } else {
            return $response;
          }
        } else {
          return array(
            "error" => "error de session"
          );
        }
      } else {
        return array(
          "error" => "error de datos"
        );
      }
      
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  private function validar($user, $password) {
    $db = new Entity('eal_user');

    try {
      $db
        ->select('ideal_user as id')
        ->where("eal_login = '{$user}' AND eal_password = '{$password}' AND eal_active = 1");
      $sth = $db->execute();

      $id = $sth->fetch(PDO::FETCH_OBJ);

      if (empty($id)) {
        return array( "status" => false);
      } else {
        return array( "status" => true, "id" => $id->id );
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  private function Insertar($token, $id){

    try {
      $update = array( "eal_token" => "'{$token}'");
      $db = new Entity('eal_user');

      $db
        ->update($update)
        ->where("ideal_user = {$id}");
      $db->execute();
      
      return true;
      
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  private function Select($id){
    try {

      $columns = ['eal_name','eal_idperfil','eal_token as token'];
      $db = new Entity('eal_user');

      $db
        ->select($columns)
        ->where("ideal_user = {$id}");
      
      $sth = $db->execute();

      $response = $sth->fetchAll(PDO::FETCH_ASSOC);

      return $response;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }
}