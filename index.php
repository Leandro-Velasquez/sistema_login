<?php
    require "Clases/db.php";
    require "Clases/usuario.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema login</title>
    <link rel="stylesheet" href="estilos/styles.css?2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
</head>
<body>
    <form class="formulario" method="POST">
        <?php
            if(isset($_POST["userName"])){
                $user = $_POST["userName"];
                $password = $_POST["password"];
                $usuario = new Usuario();
                $usuario->login($user, $password);
            }
            else if(isset($_SESSION["cambioPassword"])){
                ?>
                <p class="formulario__p-registered--registerAccount"><i class="fas fa-check"></i> A new password has been assigned, please log in with your new password</p>
                <?php
            }
        ?>
        <i class="far fa-user-circle"></i>
        <h2 class="formulario__h2">Sign In</h2>
        <input class="formulario__input" name="userName" type="text" placeholder="Username">
        <input class="formulario__input" name="password" type="password" placeholder="Password">
        <button class="formulario__button">Login</button>
        <div class="formulario__div">
            <div>
                <input id="rememberMe" type="checkbox">
                <label for="rememberMe">Remember me</label>
            </div>
            <div>
                <a href="forgot_password.php">Forgot password?</a>
            </div>
        </div>
        <p class="formulario__p">Not a member? <a class="formulario__a" href="register_account.php">Create Account</a></p>
    </form>
</body>
</html>