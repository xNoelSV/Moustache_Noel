<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet" type="text/css" />

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../JS/Servicios/JSServicios.js"></script>
    <script type="text/javascript" src="../JS/Servicios/Carroussel.js"></script>
    <script type="text/javascript" src="../JS/cerrarSession.js"></script>
    <script type="text/javascript" src="../JS/volverArriba.js"></script>
    <script language="JavaScript" type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<?php
include("../PHP/Servicios/CodigoServicios.php");
?>

<style>
    #thumbnails img {
        width: 100px;
        height: 100px;
    }
</style>

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
                    <li class="nav-item"><a <?php if (isset($_SESSION['Nombre'])) { ?> href="Reserva1.php" <?php } else { ?> href="Login.php" <?php } ?> class="nav-link px-3 text-white subrayadoNav">Reserva</a></li>
                    <?php if (isset($_SESSION['esAdmin'])) { ?><li class="nav-item"><a href="PanelAdministrador.php" class="nav-link px-3 text-white subrayadoNav">Panel de administrador</a></li><?php } ?>
                    <?php if (isset($_SESSION['esAdmin'])) { ?><li class="nav-item"><a href="ListadoReservas.php" class="nav-link px-3 text-white subrayadoNav">Listado de reservas</a></li><?php } ?>
                </ul>
                <?php if (!isset($_SESSION['Nombre'])) { ?>
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-light me-2" onclick="window.location.href='Login.php';">Iniciar sesión</button>
                        <button type="button" class="btn btn-warning" onclick="window.location.href='Alta.php';">Regístrate</button>
                    </div>
                <?php } else { ?>
                    <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['Nombre']; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
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
    </nav>

    <!-- INFO PRINCIPAL -->
    <div class="px-4 pt-5 my-5 text-center">
        <h1 class="mb-5" style="font-size: 48px;">Nuestros servicios</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4" style="font-size: 18px; font-weight: 350; margin: 3%;">Bienvenidos a nuestro
                apartado de servicios de barbería, donde ofrecemos una amplia variedad de opciones para cuidar y mejorar
                su apariencia. Desde cortes clásicos hasta peinados modernos, trabajamos con técnicas y productos de
                alta calidad para brindar una experiencia única y satisfactoria a cada uno de nuestros clientes.
                ¡Nuestro objetivo es hacer que se sienta confiado y a la moda después de cada visita!</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5 mt-5">
                <?php if (!isset($_SESSION['Nombre'])) { ?>
                    <a href="Login.php"><button type="button" class="btn btn-secondary btn-lg px-4 me-sm-3">Reserva</button></a>
                <?php } else { ?>
                    <a href="Reserva1.php"><button type="button" class="btn btn-secondary btn-lg px-4 me-sm-3">Reserva</button></a>
                <?php } ?>

            </div>
        </div>
    </div>

    <!-- CARRUSEL DE IMÁGENES -->
    <div class="container col-sm-9">
        <img src="../IMG/CarrousselServicios/1.jpg" class="img-fluid shadow-lg mb-5 rounded" id="imgCentral" />
    </div>
    <div class="row align-items-center w-100 m-0">
        <div class="col-3 text-end p-0">
            <svg id="izq" onclick="imgIzq()" xmlns="http://www.w3.org/2000/svg" width="95px" height="95px" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg>
        </div>
        <div class="col-6 text-center p-0">
            <div id="thumbnails">
                <img src="../IMG/CarrousselServicios/1.jpg" id="img1" onclick="imgClick(1)" />
                <img src="../IMG/CarrousselServicios/2.jpg" id="img2" onclick="imgClick(2)" />
                <img src="../IMG/CarrousselServicios/3.jpg" id="img3" onclick="imgClick(3)" />
                <img src="../IMG/CarrousselServicios/4.jpg" id="img4" onclick="imgClick(4)" />
                <img src="../IMG/CarrousselServicios/5.jpg" id="img5" onclick="imgClick(5)" />
                <img src="../IMG/CarrousselServicios/6.jpg" id="img6" onclick="imgClick(6)" />
            </div>
        </div>
        <div class="col-3 text-start p-0">
            <svg id="der" onclick="imgDer()" xmlns="http://www.w3.org/2000/svg" width="95px" height="95px" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
            </svg>
        </div>
    </div>

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