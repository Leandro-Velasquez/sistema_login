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
    <link rel="stylesheet" href="estilos/styles.css?3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
</head>
<body>
    <nav class="nav">
        <ul class="menu">
            <li class="menu__item"><a class="menu__a" href="">Item 1</a></li>
            <li class="menu__item"><a class="menu__a" href="">Item 2</a></li>
            <li class="menu__item"><a class="menu__a" href="">Item 3</a></li>
            <li class="menu__item"><a class="menu__a" href="">Item 4</a></li>
            <li class="menu__item menu__item--container-bars-menu">
                <i id="btn-menu" class="fas fa-bars"></i>
                <ul class="menu-bars">
                    <li class="menu-bars__item"><a class="menu-bars__a" href="login.php">signed in as <br> <?php echo '<span class="menu-bars__span">' . $user . '</span>'; ?></a></li>
                    <li class="menu-bars__item"><a class="menu-bars__a" href="">Item 1</a></li>
                    <li class="menu-bars__item"><a class="menu-bars__a" href="">Item 2</a></li>
                    <li class="menu-bars__item"><a class="menu-bars__a" href="">Item 3</a></li>
                    <li class="menu-bars__item"><a class="menu-bars__a" href="log_out.php">Sign Out</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    
    <script src="scripts.js"></script>
</body>
</html>