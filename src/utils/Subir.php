<?php
/**
 * clase Subir los archivos multimedia de la pagina Web.
 * @author Yesid Parada <yesid.parada.granados@gmail.com>
 */
  class Subir {
    public  static function Documento($name, $archivo){
      if(!file_exists('Doc')){
        mkdir('Doc', 0777, true);
        if (file_exists('Doc')) {
          if (move_uploaded_file($archivo, 'Doc/'.$name)) {
            return true;
          } else {
            return false;
          }
        }
      } else {
        if (move_uploaded_file($archivo, 'Doc/'.$name)) {
          return true;
        } else {
          return false;
        }
      }
    }
  }
?>