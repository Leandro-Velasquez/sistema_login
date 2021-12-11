<?php
    require "Clases/db.php";

    if(isset($_GET['e']) && isset($_GET['t'])){
        $db = new Db();
        $email = $_GET['e'];
        $token = $_GET['t'];

        $newPassword = $db->getNewPasswordWithEmailAndToken($email, $token)['new_password'];
        $db->setPassword($email, $newPassword);

        $db->deleteRow($email);

        session_start();
        $_SESSION["cambioPassword"] = true;
        header("Location: index.php");
        die();
    }
    else{
        header("Location: index.php");
        die();
    }
?>