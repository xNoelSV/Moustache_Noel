<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet" type="text/css" />

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../JS/paginaPrincipal/JSPaginaPrincipal.js"></script>
    <script type="text/javascript" src="../JS/cerrarSession.js"></script>
    <script type="text/javascript" src="../JS/volverArriba.js"></script>
    <script language="JavaScript" type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<?php
include("../PHP/paginaPrincipal/CodigoPaginaPrincipal.php");
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
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" onclick="cerrarSession()">Cerrar sessión</a></li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    </nav>

    <!-- CUERPO -->
    <div class="w-100">

        <!-- CELDA IMPAR -->
        <div class="text-center m-0 mt-3">
            <div class="row align-items-start w-100 m-0">
                <div class="col-12 col-xl-6 p-3 rounded-end" style="background-color: #70542b;">
                    <img src="../IMG/producto.png" class="img-fluid" style="width: 400px; height: 390px;">
                </div>
                <div class="col-12 col-xl-6 p-5">
                    <h1>¿Quiénes somos?</h1>
                    <p class="mt-5 lead">¡Bienvenido a Moustache!</p>   
                    <p class="m-0 p-3 lead">En Moustache, nos enorgullece ser mucho más que una simple barbería. Somos un lugar donde la tradición se combina con la modernidad y la atención personalizada. Nuestro objetivo es brindarte una experiencia de afeitado y corte de pelo excepcional, mientras nos aseguramos de que te sientas valorado y cómodo en todo momento.</p>
                </div>
            </div>
        </div>

        <!-- SEPARADOR -->
        <div class="text-center mb-3 mt-3">
            <img src="../IMG/separadorDeTexto.png" class="img-fluid " height="75" width="250" />
        </div>

        <!-- CELDA PAR -->
        <div class="text-center m-0">
            <div class="row align-items-start w-100 m-0">
                <div class="col-12 col-xl-6 p-3">
                    <h1>¿Qué ofrecemos?</h1>
                    <p class="mt-5 lead"></p>
                    <p class="m-0 p-3 lead">En Moustache, nos dedicamos a brindar servicios de afeitado y corte de pelo excepcionales, donde el cuidado, la atención personalizada y la cercanía con nuestros clientes son nuestra máxima prioridad. Nuestro objetivo es proporcionarte una experiencia de barbería inigualable, donde puedas relajarte, disfrutar y salir luciendo y sintiéndote genial.</p>
                </div>
                <div class="col-12 col-xl-6 p-3 rounded-start" style="background-color: #70542b;">
                    <img src="../IMG/Servicios2.jpg" class="img-fluid" style="width: 400px; height: 390px;">
                </div>
            </div>
        </div>

        <!-- SEPARADOR -->
        <div class="text-center mb-3 mt-3">
            <img src="../IMG/separadorDeTexto.png" class="img-fluid " height="75" width="250" />
        </div>

        <!-- CELDA IMPAR -->
        <div class="text-center m-0 mb-3">
            <div class="row align-items-start w-100 m-0">
                <div class="col-12 col-xl-6 p-3 rounded-end" style="background-color: #70542b;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d745.8083090948908!2d2.283147731917277!3d41.607467849285314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4c7c7ee655555%3A0x8473148d2eff08a5!2sMOUSTACHE!5e0!3m2!1ses!2ses!4v1684699248484!5m2!1ses!2ses" width="75%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-12 col-xl-6 p-3">
                    <h1>Sobre nosotros</h1>
                    <p class="mt-5 blockquote">Dirección: C/Sant Josep, 22, 08401, Granollers</p>
                    <p class="blockquote">Teléfono: 936 76 76 82</p>
                    <p class="blockquote">Correo: ourmoustache@gmail.com</p>
                    <p class="blockquote">Facebook: <a href="https://www.facebook.com/people/Moustache-Barber%C3%ADa/100042551846271/" class="link-underline-secondary">Barbería moustache</a></p>
                </div>
            </div>
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