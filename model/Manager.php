<?php
    namespace billet_simple\Model;

    class Manager {
        protected function dbConnect() {
            try { 
                $db = new \PDO('mysql:host=localhost;dbname=blog_ecrivain', 'root', 'root', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                //$db = new \PDO('mysql:host=db5000441005.hosting-data.io;dbname=blog_ecrivain', 'dbu598024', '5Février1949', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            } catch (Exception $e) { 
                die('Erreur : ' . $e->getMessage()) or die(print_r($db->errorinfo()));
            }

            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);

            return $db;
        }
    }