<?php
    class Db{
        private $pdo;

        public function __construct($host, $dbname, $user, $password)
        {
            try{
                $this->pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $password);
            }
            catch(PDOException $e) {
                die("error connecting to database: " . $e->getMessage());
            }
            catch(Exception $e){
                die("generic error: " . $e->getMessage());
            }
        }
    }











?>