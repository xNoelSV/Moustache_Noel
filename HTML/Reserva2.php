<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet" type="text/css">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../JS/Reserva/JSReserva.js"></script>
    <script type="text/javascript" src="../JS/Reserva/GenerarRegistros.js"></script>
    <script type="text/javascript" src="../JS/cerrarSession.js"></script>
    <script type="text/javascript" src="../JS/volverArriba.js"></script>
    <script language="JavaScript" type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<?php
include("../PHP/Reserva/ComprobarReserva.php");
include("../PHP/Reserva/CodigoReserva2.php");
?>

<body class="text-center" data-hasqtip="0" <?php if ($_SESSION['servicio'] == "Pelo") { ?>onload="CargarRegistros(0, 'Pelo')" <?php } else if ($_SESSION['servicio'] == "Barba") { ?>onload="CargarRegistros(0, 'Barba')" <?php } ?>>

    <!-- NAV BAR 2 -->
    <header class="p-3 text-bg-dark">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="paginaPrincipal.php" onclick="volverReserva()" class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
                    <img class="" src="../IMG/LogoSinFondo.png" width="75" height="50">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 me-3 ms-3 justify-content-center mb-md-0">
                    <li><a href="paginaPrincipal.php" onclick="volverReserva()" class="nav-link px-3 text-white subrayadoNav">Home</a></li>
                    <li><a href="Servicios.php" onclick="volverReserva()" class="nav-link px-3 text-white subrayadoNav">Servicios</a></li>
                    <li><a href="Reserva1.php" onclick="volverReserva()" class="nav-link px-3 text-white subrayadoNav">Reserva</a></li>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['Nombre']; ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="ModificarUsuario.php" onclick="volverReserva()">Modificar
                                usuario</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" onclick="cerrarSession()">Cerrar sessión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- TÍTULO DE LA PÁGINA -->
    <div class="container-fluid mt-5">
        <h1 class="display-5">Paso 2.</h1>
        <h1 class="pb-3">Elige una hora</h1>
    </div>

    <!-- SÍMBOLOS DE BOOTSTRAP -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
        </symbol>
        <symbol id="arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
        </symbol>
    </svg>

    <!-- TABLA DÍAS RESERVA -->
    <form method="POST">
        <div class="container ps-5 pe-5 mt-5 w-100 mb-5 pb-5" id="tablaRegistros">
            <div class="mb-3" id="btnsCambiarSemana">
                <h3 id="semanaCorrespondiente"></h3>
                <button class="btn btn-secondary d-inline-flex align-items-center" id="semanaAnterior" type="button" <?php if ($_SESSION['servicio'] == "Pelo") { ?>onclick="CargarRegistros(-7, 'Pelo', +6, +5, +4, +3, +2, +1)" <?php } else if ($_SESSION['servicio'] == "Barba") { ?>onclick="CargarRegistros(-7, 'Barba')" <?php } ?>>
                    <svg class="bi me-1" width="20" height="20" fill="currentColor">
                        <use xlink:href="#arrow-left-short"></use>
                    </svg>
                    Semana anterior
                </button>
                <button class="btn btn-secondary d-inline-flex align-items-center" id="semanaSiguiente" type="button" <?php if ($_SESSION['servicio'] == "Pelo") { ?>onclick="CargarRegistros(+7, 'Pelo', +6, +5, +4, +3, +2, +1)" <?php } else if ($_SESSION['servicio'] == "Barba") { ?>onclick="CargarRegistros(+7, 'Barba')" <?php } ?>>
                    Semana siguiente
                    <svg class="bi ms-1" width="20" height="20" fill="currentColor">
                        <use xlink:href="#arrow-right-short"></use>
                    </svg>
                </button>
            </div>
            <div class="row" style="background-color: #e8d1b5;">
                <div class="fw-bold col-sm col-12 border border-secondary pb-3 ps-0 pe-0" id="columnaLunes">
                    <p class="p-3 mb-3 border-bottom border-secondary" id="textoColumnaLunes" style="background-color: #ffc107;">Lunes</p>
                    <div class="alert alert-dark ms-3 me-3" role="alert">
                        Día no laborable
                    </div>
                </div>
                <div class="fw-bold col-sm col-12 border border-secondary pb-3 ps-0 pe-0" id="columnaMartes">
                    <p class="p-3 mb-3 border-bottom border-secondary" id="textoColumnaMartes" style="background-color: #ffc107;">Martes</p>
                </div>
                <div class="fw-bold col-sm col-12 border border-secondary pb-3 ps-0 pe-0" id="columnaMiercoles">
                    <p class="p-3 mb-3 border-bottom border-secondary" id="textoColumnaMiercoles" style="background-color: #ffc107;">Miércoles</p>
                </div>
                <div class="fw-bold col-sm col-12 border border-secondary pb-3 ps-0 pe-0" id="columnaJueves">
                    <p class="p-3 mb-3 border-bottom border-secondary" id="textoColumnaJueves" style="background-color: #ffc107;">Jueves</p>
                </div>
                <div class="fw-bold col-sm col-12 border border-secondary pb-3 ps-0 pe-0" id="columnaViernes">
                    <p class="p-3 mb-3 border-bottom border-secondary" id="textoColumnaViernes" style="background-color: #ffc107;">Viernes</p>
                </div>
                <div class="fw-bold col-sm col-12 border border-secondary pb-3 ps-0 pe-0" id="columnaSabado">
                    <p class="p-3 mb-3 border-bottom border-secondary" id="textoColumnaSabado" style="background-color: #ffc107;">Sábado</p>
                </div>
                <div class="fw-bold col-sm col-12 border border-secondary pb-3 ps-0 pe-0" id="columnaDomingo">
                    <p class="p-3 mb-3 border-bottom border-secondary" id="textoColumnaDomingo" style="background-color: #ffc107;">Domingo</p>
                    <div class="alert alert-dark ms-3 me-3" role="alert">
                        Día no laborable
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL DE CONFIRMACIÓN --> 
        <div class="mb-3 text-center">
                    <!-- Modal -->
                    <div class="modal fade" id="modalFlotante" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalCenterTitle">Confirmación de reserva</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <p id="textoModal"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Rechazar</button>
                                    <input type="submit" class="btn btn-success" name="btnBorrar" value="Confirmar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <!-- BOTÓN VOLVER -->
        <input type="submit" class="btn btn-lg btn-warning w-25 position-fixed top-100 start-50 translate-middle box2" style="margin-top: -45px;" name="volverReserva2" value="Volver" />
    </form>

    <!-- BOTÓN "VOLVER ARRIBA" -->
    <button class="btn btn-dark" onclick="topFunction()" id="volverArriba" title="Ir arriba" style="position: fixed; bottom: 20px; right: 30px; z-index: 99;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up" viewBox="0 0 16 16">
            <path d="M3.204 11h9.592L8 5.519 3.204 11zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659z" />
        </svg>
    </button>

    <!-- BOTÓN TEMPORAL QUE LLEVA A LA RESERVA 3 -->
    <button class="btn btn-dark" onclick="irReserva3()" id="volverArriba" title="Ir a Reserva3.php" style="position: fixed; bottom: 20px; left: 30px; z-index: 99;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.854 4.854a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 4H3.5A2.5 2.5 0 0 0 1 6.5v8a.5.5 0 0 0 1 0v-8A1.5 1.5 0 0 1 3.5 5h9.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4z" />
        </svg>
    </button>
</body>

</html>