<?php
class ModelLogin{
  public function Login($request){
    try {
      $body = $request->getParsedBody();

      $user = $body['user'];
      $password = $body['password'];

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
    $db = new Entity('gp_user');

    try {
      $db
        ->select('idgp_user as id')
        ->where("gp_login = '{$user}' AND gp_password = '{$password}' AND gp_active = 1");
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
      $update = array( "gp_token" => "'{$token}'");
      $db = new Entity('gp_user');

      $db
        ->update($update)
        ->where("idgp_user = {$id}");
      $db->execute();
      
      return true;
      
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  private function Select($id){
    try {

      $columns = ['gp_name','idgp_perfil','gp_token as token'];
      $db = new Entity('gp_user');

      $db
        ->select($columns)
        ->where("idgp_user = {$id}");
      
      $sth = $db->execute();

      $response = $sth->fetchAll(PDO::FETCH_ASSOC);

      return $response;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }
}