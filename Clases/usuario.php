<?php
    class Usuario extends Db{
        public function login($username, $password){
            if($this->getDatos($username, $password)){
                header("Location: login.php");
            }
            else{
                ?>
                <h3 class="formulario__h3-invalid"><i class="fas fa-exclamation-triangle"></i> Invalid username or password</h3>
                <?php
            }
        }

        public function logOut(){

        }
    }













?>