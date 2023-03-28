<?php

if (empty($_SESSION['servicio'])) {
    header('Location: Reserva1.php');
}

if (isset($_POST['volverReserva2'])) {
    header('Location: Reserva1.php');
}

// $_SESSION['fechaReserva']: Guarda la fecha de la reserva.
?>