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

<style>
    body,
    html {
        height: 100%;
        background: url("../IMG/Servicios1.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>

<?php
include("../PHP/Reserva/ComprobarReserva.php");
include("../PHP/Reserva/CodigoReserva3.php");
?>

<body class="text-center" data-hasqtip="0">

    <!-- NAV BAR 2 -->
    <header class="p-3 text-bg-dark">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="paginaPrincipal.php" onclick="volverReserva()"
                    class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
                    <img class="" src="../IMG/LogoSinFondo.png" width="75" height="50">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 me-3 ms-3 justify-content-center mb-md-0">
                    <li><a href="paginaPrincipal.php" onclick="volverReserva()"
                            class="nav-link px-3 text-white subrayadoNav">Home</a></li>
                    <li><a href="Servicios.php" onclick="volverReserva()"
                            class="nav-link px-3 text-white subrayadoNav">Servicios</a></li>
                    <li><a href="Reserva1.php" onclick="volverReserva()"
                            class="nav-link px-3 text-white subrayadoNav">Reserva</a></li>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
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

    <!-- MÉTODO DE PAGO -->
    <div class="container-fluid pt-5 p-0 z-0 columnaCentral h-100"
        style="width: 65%; background-color: #e8d1b5; margin: 0 auto;">
        <div class="container-fluid pt-5 z-1" style="background-color: #e8d1b5;">
            <h1 class="display-5">Paso 3.</h1>
            <h1 class="pb-5">Elige un método de pago</h1>

            <!-- INFO DE LA RESERVA 
            <p class="fs-5">Información del pago:</p>
            <div class="container-fluid mb-5" style="background-color: #e6e6e6; border-radius: 10px;">
                <div class="row align-items-start border-bottom">
                    <div class="col">
                        <strong>Nombre</strong>
                    </div>
                    <div class="col">
                        <strong>Fecha</strong>
                    </div>
                    <div class="col">
                        <strong>Hora</strong>
                    </div>
                </div>
                <div class="row align-items-start">
                    <div class="col">
                        ...
                    </div>
                    <div class="col">
                        ...
                    </div>
                    <div class="col">
                        ...
                    </div>
                </div>
                <div class="row align-items-start">
                    <div class="col"></div>
                    <div class="col">
                        <strong>SUBTOTAL</strong>
                    </div>
                    <div class="col">
                        ...
                    </div>
                </div>
            </div>-->

            <!-- INFO DE LA RESERVA 2 -->


            <!--
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Información del Pago</h4>
                                <div class="row mb-3">
                                    <div class="col-6">Monto:</div>
                                    <div class="col-6 text-end">$500</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">Concepto:</div>
                                    <div class="col-6 text-end">Pago de Servicios</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">Fecha:</div>
                                    <div class="col-6 text-end">28/03/2023</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">Número de Tarjeta:</div>
                                    <div class="col-6 text-end">**** **** **** 1234</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">Titular de la Tarjeta:</div>
                                    <div class="col-6 text-end">Juan Pérez</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">Correo Electrónico:</div>
                                    <div class="col-6 text-end">juanperez@gmail.com</div>
                                </div>
                                <button class="btn btn-primary w-100">Confirmar Pago</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            -->

            <!-- PAGOS DE PAYPAL -->
            <?php if ($_SESSION['servicio'] == "Pelo") { ?>
                <div id="smart-button-container">
                    <div style="text-align: center;">
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
                <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=EUR"
                    data-sdk-integration-source="button-factory"></script>
                <script>
                    function initPayPalButton() {
                        paypal.Buttons({
                            style: {
                                shape: 'pill',
                                color: 'gold',
                                layout: 'vertical',
                                label: 'pay',
                            },

                            createOrder: function (data, actions) {
                                return actions.order.create({
                                    purchase_units: [{ "description": "Corte de pelo", "amount": { "currency_code": "EUR", "value": 21.5 } }]
                                });
                            },

                            onApprove: function (data, actions) {
                                return actions.order.capture().then(function (orderData) {

                                    // Full available details
                                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                    // Show a success message within this page, e.g.
                                    const element = document.getElementById('paypal-button-container');
                                    element.innerHTML = '';
                                    element.innerHTML = '<h3>Thank you for your payment!</h3>';

                                    // Or go to another URL:  actions.redirect('thank_you.html');

                                });
                            },

                            onError: function (err) {
                                console.log(err);
                            }
                        }).render('#paypal-button-container');
                    }
                    initPayPalButton();
                </script>
            <?php } else if ($_SESSION['servicio'] == "Barba") { ?>
                    <div id="smart-button-container">
                        <div style="text-align: center;">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                    <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=EUR"
                        data-sdk-integration-source="button-factory"></script>
                    <script>
                        function initPayPalButton() {
                            paypal.Buttons({
                                style: {
                                    shape: 'pill',
                                    color: 'gold',
                                    layout: 'vertical',
                                    label: 'pay',

                                },

                                createOrder: function (data, actions) {
                                    return actions.order.create({
                                        purchase_units: [{ "description": "Afeitado / retocado de vello facial", "amount": { "currency_code": "EUR", "value": 11.5 } }]
                                    });
                                },

                                onApprove: function (data, actions) {
                                    return actions.order.capture().then(function (orderData) {

                                        // Full available details
                                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                        // Show a success message within this page, e.g.
                                        const element = document.getElementById('paypal-button-container');
                                        element.innerHTML = '';
                                        element.innerHTML = '<h3>Thank you for your payment!</h3>';

                                        // Or go to another URL:  actions.redirect('thank_you.html');

                                    });
                                },

                                onError: function (err) {
                                    console.log(err);
                                }
                            }).render('#paypal-button-container');
                        }
                        initPayPalButton();
                    </script>
            <?php } ?>

            <form method="POST">
                <!-- BOTÓN VOLVER -->
                <input type="submit" class="btn btn-lg btn-warning w-50 box2 mt-5"
                    name="volverReserva3" value="Volver" />
            </form>

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