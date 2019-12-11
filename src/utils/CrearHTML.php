<?php

class CrearHTML {
    public static function Html($body, $titulo) {
        $HTMLStart =
            '
            <html>
              <head>
                <meta charset=utf-8"/>
              </head>
              <body>
            ';
        $HTMLBody =
            '
            <div>
              <h2>'.$titulo.'</h2>
            </div>
            <div>
              <p>Nombre: <span>'.$body['pt_name'].'</span></p>
              <p>Correo: <span>'.$body['pt_email'].'</span></p>
              <p>Celular: <span>'.$body['pt_phone'].'</span></p>
              <p>Mensaje: <span>'.$body['pt_message'].'</span></p>
            </div>
            ';
        $HTMLFinish =
            '
              </body>
            </html>
            ';
        $HTML = $HTMLStart . $HTMLBody . $HTMLFinish;

        return $HTML;
    }
}