<?php

class ModelContact {

    public function SelectAll() {
        $db = new Entity('pt_contact');
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

        $db = new Entity('pt_contact');
         try {
            $arrayBody = array(
                'pt_name' => "'{$body['pt_name']}'",
                'pt_email' => "'{$body['pt_email']}'",
                'pt_phone' => "'{$body['pt_phone']}'",
                'pt_message' => "'{$body['pt_message']}'",
            );

            $db->Insert($arrayBody);
            $id = $db->execute_id();

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