<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de reservas</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet" type="text/css" />

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../JS/ListadoReservas/JSListadoReservas.js"></script>
    <script type="text/javascript" src="../JS/cerrarSession.js"></script>
    <script language="JavaScript" type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<?php
include("../PHP/ListadoReservas/CodigoListadoReservas.php");
?>

<body class="text-center" data-hasqtip="0">

    <!-- NAV BAR 2 -->
    <header class="p-3 text-bg-dark">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="paginaPrincipal.php" class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
                    <img class="" src="../IMG/LogoSinFondo.png" width="75" height="50">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 me-3 ms-3 justify-content-center mb-md-0">
                    <li><a href="paginaPrincipal.php" class="nav-link px-3 text-white subrayadoNav">Home</a></li>
                    <li><a href="Servicios.php" class="nav-link px-3 text-white subrayadoNav">Servicios</a></li>
                    <li><a <?php if (isset($_SESSION['Nombre'])) { ?> href="Reserva1.php" <?php } else { ?> href="Login.php" <?php } ?> class="nav-link px-3 text-white subrayadoNav">Reserva</a></li>
                    <?php if (isset($_SESSION['esAdmin'])) { ?><li><a href="PanelAdministrador.php" class="nav-link px-3 text-white subrayadoNav">Panel de administrador</a></li><?php } ?>
                    <?php if (isset($_SESSION['esAdmin'])) { ?><li><a href="ListadoReservas.php" class="nav-link px-3 text-white subrayadoNav">Listado de reservas</a></li><?php } ?>
                </ul>

                <?php if (!isset($_SESSION['Nombre'])) { ?>
                    <div class="text-end">
                        <button type="button" class="btn btn-outline-light me-2" onclick="window.location.href='Login.php';">Iniciar sesión</button>
                        <button type="button" class="btn btn-warning" onclick="window.location.href='Alta.php';">Regístrate</button>
                    </div>
                <?php } else { ?>
                    <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['Nombre']; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="ModificarUsuario.php">Modificar usuario</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" onclick="cerrarSession()">Cerrar sessión</a></li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    </header>

    

</body>

</html>