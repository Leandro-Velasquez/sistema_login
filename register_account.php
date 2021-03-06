<?php
    require "Clases/db.php";
    require "Clases/usuario.php";
    require "Clases/listaErrores.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register account</title>
    <link rel="stylesheet" href="estilos/styles.css?4">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
</head>
<body>
    <form class="formulario" method="POST">
    <?php
            if(isset($_POST["firstName"])){

                $usuario = new Usuario();
                $listaErrores = new listaErrores();

                $firstName = $_POST["firstName"];
                $lastName = $_POST["lastName"];
                $userName = $_POST["userName"];
                $password = $_POST["password"];
                $confpassword = $_POST["confpassword"];
                $email = $_POST["email"];

                $msg_errorUserName = null;
                $msg_errorEmail = null;
                $msg_errorPassword = null;

                if($listaErrores->checkAllIsValid($firstName, $lastName, $userName, $password, $email) && $password == $confpassword){
                    if($listaErrores->checkUserNameExists($userName)){
                        $msg_errorUserName = $listaErrores->checkUserNameReturnP($userName);
                    }
                    else if(!$listaErrores->checkEmailExists($email)){
                        $msg_errorEmail = $listaErrores->checkEmailReturnP($email);
                    }
                    else{
                        $usuario->toRegister($firstName, $lastName, $userName, $password, $email);
                        ?>
                        <p class="formulario__p-registered--registerAccount"><i class="fas fa-check"></i> The account was successfully registered</p>
                        <?php
                    }
                }
                else if($password != $confpassword){
                    $msg_errorPassword = '<p class="formulario__p-invalid--registerAccount"><i class="fas fa-exclamation-triangle"></i> Passwords do not match</p>';
                }
                else{
                    ?>
                        <p class="formulario__p-invalid--registerAccount"><i class="fas fa-exclamation-triangle"></i> do not leave empty fields</p>
                    <?php
                }
            }
        ?>
        <i class="far fa-user-circle"></i>
        <h2 class="formulario__h2 formulario__h2--registerAccount">Register Account</h2>
        <input class="formulario__input" name="firstName" type="text" placeholder="First Name">
        <input class="formulario__input" name="lastName" type="text" placeholder="Last Name">
        <div>
            <?php
                echo !empty($msg_errorUserName)?$msg_errorUserName:null;
            ?>
            <input class="formulario__input" name="userName" type="text" placeholder="Username">
        </div>
        <div>
            <?php
                echo !empty($msg_errorPassword)?$msg_errorPassword:null;
            ?>
            <input class="formulario__input" name="password" type="password" placeholder="Password">
        </div>
        <input class="formulario__input" name="confpassword" type="password" placeholder="Confirm Password">
        <div>
            <?php
                echo !empty($msg_errorEmail)?$msg_errorEmail:null;
            ?>
            <input class="formulario__input" name="email" type="text" placeholder="Email Address">
        </div>
        <button class="formulario__button">Register</button>
        <p class="formulario__p--registerAccount">or <a class="formulario__a--registerAccount" href="index.php">Login</a></p>
    </form>
</body>
</html>