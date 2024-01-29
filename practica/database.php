<?php
    class Database
    {
        /*
        private $host = 'ns1.hostingmax.net'; 
        private $dbname = 'interspace_pagina_web'; 
        private $username = 'interspace_interspace';
        private $password = 'Charly10072023'; 
        private $charset = "utf8";
        */
        private $hostname = "localhost";
        private $database = "test";
        private $username = "root";
        private $password = "";
        private $charset = "utf8";

        function conectar()
        {
            try{
                $conexion = "mysql:host=" . $this->hostname . "; dbname=" . $this->database . ";charset=" . $this->charset;
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => FALSE
                ];
                $pdo = new PDO($conexion, $this->username, $this->password,$options);
                return $pdo;
            }catch(PDOException $e){
                echo 'Error conexion: ' . $e->getMessage();
                exit;
            }
        }
    }
 ?>
