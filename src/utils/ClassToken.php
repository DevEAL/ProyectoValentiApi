<?php

require __DIR__. '/../../vendor/autoload.php';

use \Tuupola\Base62;
use \Firebase\JWT\JWT;

class ealToken {
  public static $secret = "EnAlgunLugarEstudioSecretKey";
  public static $Hash = ["HS256"];

  public static function __generar ($user, $password){
    $lifeToken = intval(self::__lifeToken());

    $time = new DateTime();
    $timeExpire = new DateTime();

    $timeExpire = $timeExpire->add(new DateInterval("PT{$lifeToken}H"));

    $arrayToken = array(
      "User" => $user,
      "password" => $password,
      "timeStart" => $time->getTimestamp(),
      "timeExpire"  => $timeExpire->getTimestamp()
    );

    return $encode = JWT::encode($arrayToken, self::$secret, self::$Hash);
  }

  public static function __validar($token){
    try {
      $decode = JWT::decode($token, self::$secret, self::$Hash);
      $db = new Entity('gp_user');
      try {
        $db
          ->select('gp_name','gp_password')
          ->where("gp_login = {$decode->User} AND gp_token={$token}");
        
        $sth = $db->execute();

        $response = $sth->fetch(PDO::FETCH_OBJ);

        if (empty($response)) {
          return false;
        } else {
          return true;
        }
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }

  public static function __delete(){
    return true;
  }

  public static function __lifeToken(){

    $db = new Entity('gp_parameters');

    try {
      $db
        ->select('gp_value AS value')
        ->where("gp_name = 'Token_life'");

      $sth = $db->execute();

      $response = $sth->fetch(PDO::FETCH_OBJ);

      return $response->value;
      
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }
}