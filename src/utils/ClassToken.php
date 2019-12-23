<?php

require __DIR__. '/../../vendor/autoload.php';

use \Firebase\JWT\JWT;

class Token {
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

    return $encode = JWT::encode($arrayToken, self::$secret, self::$Hash[0]);
  }

  public static function __validar($token){
    try {
      $decode = JWT::decode($token, self::$secret,["HS256"]);
      $db = new Entity('eal_user');
      try {
        $db
          ->select('eal_name','eal_password')
          ->where("eal_login = '{$decode->User}' AND eal_token = '{$token}'");
        
        $sth = $db->execute();
        $response = $sth->fetch(PDO::FETCH_OBJ);

        $time = new DateTime();
        $timeNow = $time->getTimestamp();

        $resultTime = $decode->timeExpire - $timeNow;

        if (empty($response) && $resultTime <= 0) {
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

    $db = new Entity('eal_parameters');

    try {
      $db
        ->select('eal_value AS value')
        ->where("eal_name = 'Token_life'");

      $sth = $db->execute();

      $response = $sth->fetch(PDO::FETCH_OBJ);

      return $response->value;
      
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }
}