<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema login</title>
    <link rel="stylesheet" href="estilos/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
</head>
<body>
    <form class="formulario" method="POST">
        <i class="far fa-user-circle"></i>
        <h2 class="formulario__h2">Sign In</h2>
        <input class="formulario__input" type="text" placeholder="Username">
        <input class="formulario__input" type="text" placeholder="Password">
        <button class="formulario__button">Login</button>
        <div class="formulario__div">
            <div>
                <input id="rememberMe" type="checkbox">
                <label for="rememberMe">Remember me</label>
            </div>
            <div>
                <a href="">Forgot password?</a>
            </div>
        </div>
        <p class="formulario__p">Not a member? <a class="formulario__a" href="">Create Account</a></p>
    </form>
</body>
</html>