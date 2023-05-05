<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet" type="text/css" />

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="../JS/Login/JSLogin.js"></script>
</head>

<?php
include("../PHP/Login/CodigoLogin.php");
?>

<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../IMG/MoustacheFondo.png") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    #zonaLogin {
        height: 100%;
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .form-signin {
        max-width: 350px;
        padding: 15px;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>

<body class="text-center" data-hasqtip="0">

    <!-- NAV BAR 2 -->
    <header class="p-3 text-bg-dark sticky-top">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="paginaPrincipal.php" class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
                    <img class="" src="../IMG/LogoSinFondo.png" width="75" height="50">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 me-3 ms-3 justify-content-center mb-md-0">
                    <li><a href="paginaPrincipal.php" class="nav-link px-3 text-white subrayadoNav">Home</a></li>
                    <li><a href="Servicios.php" class="nav-link px-3 text-white subrayadoNav">Servicios</a></li>
                    <li><a <?php if (isset($_SESSION['Nombre'])) { ?> href="Reserva1.php" <?php } else { ?> href="Login.php"
                            <?php }?> class="nav-link px-3 text-white subrayadoNav">Reserva</a></li>
                </ul>

                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2"
                        onclick="window.location.href='Login.php';">Iniciar sesión</button>
                    <button type="button" class="btn btn-warning"
                        onclick="window.location.href='Alta.php';">Regístrate</button>
                </div>
            </div>
        </div>
    </header>

    <!-- LOGIN -->
    <div id="zonaLogin">
        <main class="form-signin w-100 m-auto p-4 shadow-lg" style="background-color: #dec995; border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
            <form method="POST">
                <img class="mb-3" src="../IMG/LogoFijo.png" alt="" width="72" height="57">
                <h1 class="h3 mb-4 fw-normal">Inicie sesión por favor</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" name="emailLogin" id="correoLogin"
                        placeholder="name@example.com" value="<?php if($passVacio || $passwordIncorrecto || $emailIncorrecto){echo $email;}else{echo "";}?>">
                    <label for="floatingInput">Correo electrónico</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="passLogin" id="passLogin" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="container-fluid mb-5 text-left" id="containerMensajeError">
                    <?php
                    if ($camposVacios) {
                        echo "<p id='mensajeError'>* Ambos campos vacíos</p>";
                    } else if ($emailVacio == true) {
                        echo "<p id='mensajeError'>* Correo vacío</p>";
                    } else if ($passVacio == true) {
                        echo "<p id='mensajeError'>* Password vacío</p>";
                    } else if ($emailIncorrecto == true) {
                        echo "<p id='mensajeError'>* Email incorrecto. <a id='linkRedireccionAlta' name='linkRedireccionAlta' href='Alta.php?alta'>¡Regístrate!</a></p>";
                    } else if ($passwordIncorrecto == true) {
                        echo "<p id='mensajeError'>* Contraseña incorrecta</p>";
                    }
                    ?>
                </div>

                <input type="submit" class="w-75 btn btn-lg btn-warning" name="btnLogin" value="Sign in">
                <!-- onclick="validarUsuario()" -->
                <p class="mt-4 mb-1 text-muted">© 2017–2023</p>
            </form>
        </main>
    </div>

</body>

</html>