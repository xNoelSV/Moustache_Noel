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

<body class="text-center" data-hasqtip="0" onload="CargarRegistros('')">

    <!-- TOOLTIPS -->
    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>

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
                    <div class="text-end">
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

    <!-- SÍMBOLOS DE BOOTSTRAP -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
        </symbol>
        <symbol id="arrow-left-long" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.854 3.646a.5.5 0 0 1 0 .708L8.207 8l3.647 3.646a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 0 1 .708 0zM4.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 1 0v-13a.5.5 0 0 0-.5-.5z" />
        </symbol>
        <symbol id="arrow-right-long" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.146 3.646a.5.5 0 0 0 0 .708L7.793 8l-3.647 3.646a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708 0zM11.5 1a.5.5 0 0 1 .5.5v13a.5.5 0 0 1-1 0v-13a.5.5 0 0 1 .5-.5z" />
        </symbol>
        <symbol id="plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </symbol>
        <symbol id="recharge" viewBox="0 0 16 16">
            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
        </symbol>
        <symbol id="alert" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <!-- PANEL LISTADO -->
    <h1 class="mt-5">Listado de reservas</h1>
    <form method="POST">
        <div class="container-fluid mt-4" style="width: 90%; background-color: #dec995; border-radius: 10px;">
            <div class="row align-items-start">

                <!-- CAMBIO DE DÍA -->
                <div class="pt-2" id="btnsCambiarDia">
                    <h3 class="mt-2" id="diaCorrespondiente"></h3>
                    <p class="fst-italic" id="diaAdelantadoAtrasado"></p>
                    <!-- DATEPICKER -->

                    <div class="container text-center">
                        <div class="row align-items-start">
                            <!-- PARTE DERECHA -->
                            <div class="col text-end pe-1">
                                <button class="btn btn-secondary d-inline-flex align-items-center" id="diaAnterior" type="button" onclick="CargarRegistros('atras')">
                                    <svg class="bi me-2" width="15" height="15" fill="currentColor">
                                        <use xlink:href="#arrow-left-short"></use>
                                    </svg>
                                    Día anterior
                                </button>
                            </div>
                            <!-- PARTE IZQUIERDA -->
                            <div class="col text-start ps-1">
                                <button class="btn btn-secondary d-inline-flex align-items-center" id="diaSiguiente" type="button" onclick="CargarRegistros('delante')">
                                    Día siguiente
                                    <svg class="bi ms-2" width="15" height="15" fill="currentColor">
                                        <use xlink:href="#arrow-right-short"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CAMBIO DE SEMANA -->
                <div class="pt-1" id="btnsCambiarSemana">
                    <div class="container text-center">
                        <div class="row align-items-start">
                            <!-- PARTE DERECHA -->
                            <div class="col text-end pe-1">
                                <button class="btn btn-secondary d-inline-flex align-items-center" id="semanaAnterior" type="button" onclick="CargarRegistros('semanaAtras')">
                                    <svg class="bi me-2" width="15" height="15" fill="currentColor">
                                        <use xlink:href="#arrow-left-long"></use>
                                    </svg>
                                    Semana anterior
                                </button>
                            </div>
                            <!-- PARTE IZQUIERDA -->
                            <div class="col text-start ps-1">
                                <button class="btn btn-secondary d-inline-flex align-items-center" id="semanaSiguiente" type="button" onclick="CargarRegistros('semanaDelante')">
                                    Semana siguiente
                                    <svg class="bi ms-2" width="15" height="15" fill="currentColor">
                                        <use xlink:href="#arrow-right-long"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SERVICIOS -->
                <div class="pt-2 mb-2" id="btnsServicios">
                    <div class="row align-items-start">
                        <!-- PARTE DERECHA -->
                        <div class="col text-start ps-5">
                            <div class="dropdown-center">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="desplegableServicio" data-bs-toggle="dropdown" aria-expanded="false">
                                    Servicio
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" onclick="CambiarServicio('TODO')">Ver todo</a></li>
                                    <li><a class="dropdown-item" onclick="CambiarServicio('Pelo')">Corte de pelo</a></li>
                                    <li><a class="dropdown-item" onclick="CambiarServicio('Barba')">Retocado de barba</a></li>
                                </ul>
                            </div>
                        </div>
                        <input type="hidden" id="servicioSeleccionado" value="TODO" />
                        <!-- PARTE CENTRAL -->
                        <div class="col">
                            <button type="button" class="btn btn-outline-dark" id="btnRecargar" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Recargar lista" onclick="CambiarServicio('Recargar')">
                                <svg class="bi align-middle" width="20" height="20" fill="currentColor">
                                    <use xlink:href="#recharge"></use>
                                </svg>
                            </button>
                        </div>
                        <!-- PARTE IZQUIERDA -->
                        <div class="col text-start pe-5">
                            <div class="col text-end">
                                <button class="btn btn-success d-inline-flex align-items-center text-end" id="nuevaReserva" name="nuevaReserva" type="button" onclick="window.location.href='Reserva1.php';" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Generar nueva reserva">
                                    <svg class="bi" width="20" height="20" fill="currentColor">
                                        <use xlink:href="#plus"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- SEPARADOR -->
                <div class="text-center pb-3">
                    <img src="../IMG/separadorDeTexto.png" class="img-fluid " height="75" width="250" />
                </div>

                <!-- LISTADO -->
                <div class="container-fluid ps-4 pe-4 pb-3">

                    <!-- ALERT -->
                    <div class="alert alert-primary align-items-center ms-5 me-5" id="alertLista" role="alert">
                        <svg class="bi me-2" width="15" height="15" fill="currentColor">
                            <use xlink:href="#alert"></use>
                        </svg>
                        <span> No hay registros para este día </span>
                    </div>

                    <!-- REGISTROS DE LA LISTA -->
                    <div id="registrosLista"></div>

                </div>
            </div>
        </div>
    </form>
</body>

</html>