<?php
/**
 * clase GetResponse para la construccion de la respusta de la api.
 * @author Yesid Parada <yesid.parada.granados@gmail.com>
 */

class GetResponse{
  public static function Response($response, $title){
    if ($response === false) {
      return PrintJson::print(403);
    } else if (is_array($response)) {
      return PrintJson::print($response[0], "{$title}", 'data', $response[1]);
    } else {
      return PrintJson::print($response);
    }
  }
  
  /*Función para generar el array del controller */ 
  public static function CrontrollerResponse($response){
    if (empty($response)) {
      return 203;
    } elseif (is_array($response)) {
      return array(200, $response);
    } elseif ($response === false) {
      return 503;
    } else {
      return 201;
    }
  }
}