<?php

if (empty($_SESSION['servicio'])) {
    header('Location: Reserva1.php');
}

if (isset($_POST['volverReserva2'])) {
    header('Location: Reserva1.php');
}

if (isset($_POST['irReserva3'])) {
    header('Location: Reserva3.php');
}

// Si se ha pulsado el botón de reserva se accede a este método
if (isset($_POST['btnEnviar'])) {

    $_SESSION['fechaReserva'] = $_POST['dataStoredStr'];
    header('Location: Reserva3.php');

}
