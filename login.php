<?php
    session_start();
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if(empty($user)){
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos/styles.css?1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
</head>
<body>
    <h1>Ha ingresado con exito</h1>
    <a class="formulario__a" href="log_out.php">Log Out</a>
</body>
</html>