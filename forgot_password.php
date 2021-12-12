<?php
    require "Clases/db.php";
    require "Clases/recoverPassword.php";
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
            if(isset($_POST['email']) && isset($_POST['repeat_email'])){
                $email = $_POST['email'];
                $repeatEMail = $_POST['repeat_email'];
                $db = new Db();

                if($email == $repeatEMail){
                    if($db->searchEmail($email)){
                        $recuperar_psw = new RecoverPassword();
                        $recuperar_psw->sendEmail($email);
                    }
                    else{
                        ?>
                        <p class="formulario__p-invalid--registerAccount"><i class="fas fa-exclamation-triangle"></i> The email address is not registered</p>
                        <?php
                    }
                }
                else{
                    ?>
                    <p class="formulario__p-invalid--registerAccount"><i class="fas fa-exclamation-triangle"></i> The email addresses do not match</p>
                    <?php
                }
            }
        ?>
        <i class="far fa-user-circle"></i>
        <h2 class="formulario__h2 formulario__h2--forgot-password">Forgot Password</h2>
        <input class="formulario__input" name="email" type="text" placeholder="Email Address">
        <input class="formulario__input" name="repeat_email" type="text" placeholder="Repeat Email">
        <button class="formulario__button">Reset Password</button>
        <p class="formulario__p">or <a class="formulario__a" href="index.php">Login</a></p>
    </form>
</body>
</html>