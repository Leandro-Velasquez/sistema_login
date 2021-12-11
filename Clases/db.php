<?php
    class Db{
        private $host = "localhost:3307";
        private $dbname = "sistema_login";
        private $user = "root";
        private $password = "";
        private $pdo;

        public function __construct()
        {
            try{
                $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->password);
            }
            catch(PDOException $e) {
                die("error connecting to database: " . $e->getMessage());
            }
            catch(Exception $e){
                die("generic error: " . $e->getMessage());
            }
        }

        public function searchUserNameAndEmail($userName, $email) {
            $sql = $this->pdo->prepare("SELECT userName, email FROM usuarios WHERE userName = :u AND email = :e");

            $sql->bindParam(":u", $userName);
            $sql->bindParam(":e", $email);

            $sql->execute();

            $date = $sql->fetch(PDO::FETCH_ASSOC);

            //Si existe nos va retornar un array asociativo con los datos, en caso que no exista nos va devolver false
            return $date;
        }

        public function searchUserName($userName) {
            $sql = $this->pdo->prepare("SELECT userName FROM usuarios WHERE userName = :u");

            $sql->bindParam(":u", $userName);

            $sql->execute();

            $date = $sql->fetch(PDO::FETCH_ASSOC);

            return $date;
        }

        public function searchEmail($email) {
            $sql = $this->pdo->prepare("SELECT email FROM usuarios WHERE email = :e");

            $sql->bindParam(":e", $email);

            $sql->execute();

            $date = $sql->fetch(PDO::FETCH_ASSOC);

            return $date;
        }

        //Methods GET
        public function getId($email) {
            $sql = $this->pdo->prepare("SELECT id FROM usuarios WHERE email=:e");

            $sql->bindParam(":e", $email);

            $sql->execute();

            $date = $sql->fetch(PDO::FETCH_ASSOC);

            return $date?$date['id']:null;
        }

        public function getUserName($email) {
            $sql = $this->pdo->prepare("SELECT userName FROM usuarios WHERE email=:e");

            $sql->bindParam(":e", $email);

            $sql->execute();

            $date = $sql->fetch(PDO::FETCH_ASSOC);

            return $date?$date['userName']:null;
        }

        public function getPassword($email){
            $sql = $this->pdo->prepare("SELECT password FROM usuarios WHERE email=:e");

            $sql->bindParam(":e", $email);

            $sql->execute();

            $date = $sql->fetch(PDO::FETCH_ASSOC);

            return $date;
        }

        public function getDatos($userName, $password){
            //Obtiene un registro en base al nombre de usuario y contraseña
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

        public function getNewPasswordWithEmailAndToken($email, $token) {
            $sql = $this->pdo->prepare("SELECT new_password FROM recuperar WHERE email=:e AND token=:t");

            $sql->bindParam(":e", $email);
            $sql->bindParam(":t", $token);

            $sql->execute();

            $date = $sql->fetch(PDO::FETCH_ASSOC);

            return $date;
        }

        //Methods SET
        public function setPassword($email, $newPassword){
            $pswMd5 = md5($newPassword);

            $sql = $this->pdo->prepare("UPDATE usuarios SET password=:p WHERE email=:e");

            $sql->bindParam(":p", $pswMd5);
            $sql->bindParam(":e", $email);

            $sql->execute();
        }

        public function insert($firstName, $lastName, $userName, $password, $email){
            $sql = $this->pdo->prepare("INSERT INTO usuarios (firstName, lastName, userName, password, email) VALUES (:f, :l, :u, :p, :e)");

            $sql->bindParam(":f", $firstName);
            $sql->bindParam(":l", $lastName);
            $sql->bindParam(":u", $userName);
            $sql->bindParam(":p", $password);
            $sql->bindParam(":e", $email);

            $sql->execute();
        }

        public function insertIntoRecoveryTable($email, $newPassword, $token) {
            $sql = $this->pdo->prepare("INSERT INTO recuperar (email, new_password, token) VALUES (:e, :np, :t)");

            $sql->bindParam(":e", $email);
            $sql->bindParam(":np", $newPassword);
            $sql->bindParam(":t", $token);

            $sql->execute();
        }

        public function deleteRow($email){
            $sql = $this->pdo->prepare("DELETE FROM recuperar WHERE email=:e");

            $sql->bindParam(":e", $email);

            $sql->execute();
        }
    }











?>