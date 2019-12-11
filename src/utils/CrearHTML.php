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
              <p>Nombre: <span>'.$body['gp_name'].'</span></p>
              <p>Correo: <span>'.$body['gp_email'].'</span></p>
              <p>Celular: <span>'.$body['gp_subject'].'</span></p>
              <p>Mensaje: <span>'.$body['gp_message'].'</span></p>
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