<?php

class ModelEnlaces {

    public function SelectAll() {
        $db = new Entity('gp_parameters');
        try {
            $db->select('gp_value AS value')
            ->where('gp_name = "Email_contacto" AND gp_active = 1');
            $sth = $db->execute();

            $response = $sth->fetch(PDO::FETCH_ASSOC);
            return $response;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}