<?php

    namespace Model;

    class Manager {
        protected function dbConnect() {
            try {
                $db = new \PDO(DB_DSN, DB_USER, DB_PASS, DB_OPTIONS);
            } catch (Exception $e) { 
                die('Erreur : ' . $e->getMessage()) or die(print_r($db->errorinfo()));
            }

            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);

            return $db;
        }
    }