<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administrador</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet" type="text/css" />

    <!-- JS -->
    <script language="JavaScript" type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../JS/PanelAdministrador/JSPanelAdministrador.js"></script>
    <script type="text/javascript" src="../JS/cerrarSession.js"></script>
    <script type="text/javascript" src="../JS/volverArriba.js"></script>
</head>

<?php
include("../PHP/PanelAdministrador/CodigoPanelAdministrador.php");
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
                    <li class="nav-item"><a href="PanelAdministrador.php" class="nav-link px-3 text-white subrayadoNav">Panel de administrador</a></li>
                    <li class="nav-item"><a href="ListadoReservas.php" class="nav-link px-3 text-white subrayadoNav">Listado de reservas</a></li>
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
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" onclick="cerrarSession()">Cerrar sessión</a></li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    </nav>

    <!-- CUADRO DE ADMINISTRADOR -->
    <div class="col-md-6 offset-md-3 mt-5 mb-5 text-start">
        <form method="POST">
            <div class="container-fluid p-5" style="width: 90%; background-color: #dec995; border-radius: 10px;">

                <!-- HORA ACTUAL -->
                <div class="text-center mb-4">
                    <h1 class="mb-4">Hora actual</h1>
                    <div class="container text-center fs-5">
                        <div class="row">
                            <div class="col" id="fecha">Fecha</div>
                        </div>
                        --
                        <div class="row">
                            <div class="col"><span id="cuadroHora">Horas-Minutos-Segundos</span></div>
                        </div>
                    </div>
                </div>

                <!-- SEPARADOR -->
                <div class="text-center">
                    <img src="../IMG/separadorDeTexto.png" class="img-fluid " height="75" width="250" />
                </div>

                <!-- LISTADO DE RESERVAS -->
                <div class="text-center mt-3 mb-4">
                    <h1 class="mb-4">Listado de reservas</h1>
                    <div class="container text-center fs-5">
                        <div class="col">
                            <input type="submit" value="Siguiente" class="w-50 br-5 btn btn-warning btn2" id="irListado" name="irListado"></input>
                        </div>
                    </div>
                </div>

                <!-- SEPARADOR -->
                <div class="text-center">
                    <img src="../IMG/separadorDeTexto.png" class="img-fluid " height="75" width="250" />
                </div>

                <!-- BORRAR REGISTROS ANTERIORES -->
                <div class="text-center mt-3">
                    <h1 class="mb-4">Borrar citas anteriores a hoy</h1>
                    <div class="container text-center fs-5">
                        <div class="row">
                            <div class="col">
                                <input type="button" value="Corte de pelo" class="w-75 mb-1 br-5 btn btn-warning btn2" id="Pelo" onclick="AbrirModal(this)" data-bs-toggle="modal" data-bs-target="#modalFlotante"></input>
                            </div>
                            <div class="col">
                                <input type="button" value="Retocado de barba" class="w-75 mb-1 br-5 btn btn-warning btn2" id="Barba" onclick="AbrirModal(this)" data-bs-toggle="modal" data-bs-target="#modalFlotante"></input>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL DE CONFIRMACIÓN -->
                    <div class="mb-3 text-center">
                        <!-- Modal -->
                        <div class="modal fade" id="modalFlotante" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalCenterTitle">Confirmación</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        <p>Seguro que quieres borrar los registros anteriores a la fecha actual del servicio: </p>
                                        <p id="textoModal"></p>
                                        <input type="hidden" id="dataServicio" name="dataServicio" />
                                        <input type="hidden" id="horaActualModificada" name="horaActualModificada" />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Rechazar</button>
                                        <input type="submit" class="btn btn-danger" name="btnConfirmar" id="btnConfirmar" value="Confirmar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <!-- BOTÓN "VOLVER ARRIBA" -->
    <button class="btn btn-dark" onclick="topFunction()" id="volverArriba" title="Ir arriba" style="position: fixed; bottom: 20px; right: 30px; z-index: 99;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up" viewBox="0 0 16 16">
            <path d="M3.204 11h9.592L8 5.519 3.204 11zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659z" />
        </svg>
    </button>

</body>

</html>