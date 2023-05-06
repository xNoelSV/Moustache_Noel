<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet" type="text/css">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="../JS/Reserva/JSReserva.js"></script>
    <script type="text/javascript" src="../JS/cerrarSession.js"></script>
    <script type="text/javascript" src="../JS/volverArriba.js"></script>
    <script language="JavaScript" type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<?php
include("../PHP/Reserva/ComprobarReserva.php");
include("../PHP/Reserva/CodigoReserva1.php");
?>

<body class="text-center" data-hasqtip="0">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg text-bg-dark p-3 sticky-top">
        <div class="container-fluid">
            <a href="paginaPrincipal.php" class="d-flex align-items-center mb-lg-0 me-3 text-white text-decoration-none">
                <img class="" src="../IMG/LogoSinFondo.png" width="75" height="50">
            </a>
            <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav col-12 col-lg-auto me-lg-auto mb-2 me-auto justify-content-center mb-md-0">
                    <li class="nav-item"><a href="paginaPrincipal.php" class="nav-link px-3 text-white subrayadoNav">Home</a></li>
                    <li class="nav-item"><a href="Servicios.php" class="nav-link px-3 text-white subrayadoNav">Servicios</a></li>
                    <li class="nav-item"><a href="Reserva1.php" class="nav-link px-3 text-white subrayadoNav">Reserva</a></li>
                    <?php if (isset($_SESSION['esAdmin'])) { ?><li class="nav-item"><a href="PanelAdministrador.php" class="nav-link px-3 text-white subrayadoNav">Panel de administrador</a></li><?php } ?>
                    <?php if (isset($_SESSION['esAdmin'])) { ?><li class="nav-item"><a href="ListadoReservas.php" class="nav-link px-3 text-white subrayadoNav">Listado de reservas</a></li><?php } ?>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['Nombre']; ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                        <li><a class="dropdown-item" href="ModificarUsuario.php">Modificar usuario</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" onclick="cerrarSession()">Cerrar sessión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- TÍTULO DE LA PÁGINA -->
    <div class="container-fluid mt-5">
        <h1 class="display-5">Paso 1.</h1>
        <h1>Elige un servicio</h1>
        <img src="../IMG/separadorDeTexto.png" class="img-fluid" height="75" width="250"/>
    </div>

    <!-- SERVICIOS -->
    <form method="POST">
        <div class="container-fluid mt-5">
            <div class="row row-cols-1 row-cols-md-2 mb-3">
                <div class="col">
                    <div class="card mb-4 w-75 mx-auto box2 border-0"
                        style=" background-color: #e8d1b5;box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;">
                        <img src="../IMG/Servicios1.jpg" class="card-img-top mb-3">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Corte de pelo</h2>
                            <p class="card-text mb-4">Ofrecemos una amplia variedad de estilos de corte de pelo, desde
                                los
                                más clásicos hasta los más modernos, para que puedas encontrar el que mejor se adapte a
                                ti.
                                Además, nos aseguramos de que cada corte de pelo venga con un lavado y acondicionamiento
                                del
                                cabello, para que puedas salir sintiéndote y luciendo mejor que nunca.</p>

                            <input type="submit" name="ReservaPelo" class="w-100 btn btn-lg btn-warning fw-medium"
                                value="21.50€" />
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 w-75 mx-auto box2 border-0"
                        style="background-color: #e8d1b5; box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;">
                        <img src="../IMG/Servicios2.jpg" class="card-img-top mb-3">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Retocado de barba</h2>
                            <p class="card-text mb-4">Ofrecemos una amplia variedad de servicios de cuidado personal
                                para la
                                barba, desde recortes y estilismos hasta afeitados completos. Además, utilizamos los
                                mejores
                                productos de cuidado de la piel y de la barba para asegurarnos de que tu piel y barba
                                estén
                                siempre bien hidratadas y protegidas.</p>
                            <input type="submit" name="ReservaBarba" class="w-100 btn btn-lg btn-warning fw-medium"
                                value="11.50€" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- BOTÓN "VOLVER ARRIBA" -->
    <button class="btn btn-dark" onclick="topFunction()" id="volverArriba" title="Ir arriba"
        style="position: fixed; bottom: 20px; right: 30px; z-index: 99;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up"
            viewBox="0 0 16 16">
            <path
                d="M3.204 11h9.592L8 5.519 3.204 11zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659z" />
        </svg>
    </button>

</body>

</html>