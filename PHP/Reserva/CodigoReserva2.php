<?php

if (empty($_SESSION['queryReserva'])) {
    header('Location: Reserva1.php');
}

if (isset($_POST['volverReserva2'])) {
    $_SESSION['queryReserva'] = "";
    $_SESSION['servicio'] = "";
    header('Location: Reserva1.php');
}

?>