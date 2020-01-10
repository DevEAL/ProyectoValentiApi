<?php

class ModelContact {

    public function SelectAll() {
        $db = new Entity('eal_contact');
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

        $id = CRUD::InsertId('eal_contact', $body);
        
        $asunto = 'Contacto '. $body['subject'] . " ". $id;

        $template = CrearHTML::Html($body, $asunto);

        if (empty($template)) {
            return array( 'template' => 'Template error' );
        } else {
            if (SendMail::EnviarCorreo($asunto, $template)) {
                return true;
            } else {
                return array( 'email' => 'Error de envio de correo' );
            }
        }
    }
}