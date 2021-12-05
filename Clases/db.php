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

        public function getDatos($userName, $password){
            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE userName=:u AND password=:p");

            $sql->bindParam(":u", $userName);
            $sql->bindParam(":p", $password);
            $sql->execute();

            //Comprobamos si alguna fila fue afectada por la ultima sentencia
            if($sql->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }
    }











?>