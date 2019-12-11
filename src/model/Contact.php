<?php

class ModelContact {

    public function SelectAll() {
        $db = new Entity('gp_contact');
        try {
            $db->select('*');
            $sth = $db->execute();

            $response = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $response;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function Insert($request) {

        $body = $request->getParsedBody();

        $arrayBody = [];
        $arrayExecute = [];

        $db = new Entity('gp_contact');
         try {
             foreach ($body as $key => $value) {
                $arrayBody[$key] = ':' . $key;
                $arrayExecute[':' . $key] = $value;
             }

            $db->Insert($arrayBody);
            $id = $db->execute_id($arrayExecute);

            $asunto = 'Contacto' . $id;

            $template = CrearHTML::Html($body, $asunto);

            if (empty($template)) {
                return array( 'template' => 'Template error' );
            } else {
                if (SendMail::EnviarCorreo($asunto, $template)) {
                    return true;
                } else {
                    return array( 'email' => 'Template de envio de correo' );
                }
            }
         } catch (PDOException $e){
            echo $e->getMessage();
            return false;
         }
    }
}