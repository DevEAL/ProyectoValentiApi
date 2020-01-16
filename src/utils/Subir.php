<?php
/**
 * clase Subir los archivos multimedia de la pagina Web.
 * @author Yesid Parada <yesid.parada.granados@gmail.com>
 */
  class Subir {

    public static function SubirImg($img, $name){
      if (Subir::validarCarpeta()) {

        /*Retiro la cabecera de la imagen*/ 
        $img = str_replace("data:image/png;base64,","",$img);

        /* obtengo el path para almacenar la imagen*/
        $pathImg = CRUD::Select("eal_parameters", "eal_value as value", "eal_name = 'PathImg' AND eal_active = 1", "obj");
        
        $path = $pathImg->value.$name;
        
        if (file_put_contents( $path, base64_decode($img)) != false) {
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
      
    }
    public static function Documento1($img, $name){
      if (Subir::validarCarpeta()) {

        /*Retiro la cabecera de la imagen*/ 
        $img = str_replace("data:application/pdf;base64,","",$img);

        /* obtengo el path para almacenar la imagen*/
        $pathImg = CRUD::Select("eal_parameters", "eal_value as value", "eal_name = 'PathImg' AND eal_active = 1", "obj");
        
        $path = $pathImg->value.$name;
        
        if (file_put_contents( $path, base64_decode($img)) != false) {
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
      
    }
    public  static function Documento($name, $archivo){
      if(Subir::validarCarpeta()){
        if (move_uploaded_file($archivo, 'files/'.$name)) {
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
    }
    private static function validarCarpeta(){
      if (!file_exists("../files")) {
        mkdir("../files", 0777, true);
        return true;
      } else {
        return true;
      }
    }
  }
?>