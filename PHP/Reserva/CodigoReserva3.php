<?php

//echo "<script>console.log(" . $_SESSION['fechaReserva'] . ")</script>";
$_SESSION['pagoRealizado'] = "";
//echo "<input type='hidden' value='" . $_SESSION['fechaReserva'] . "'></input>";

if (empty($_SESSION['fechaReserva'])) {
    header('Location: Reserva2.php');
} 

if (isset($_POST['volverReserva3'])) {
    header('Location: Reserva2.php');
}

if (isset($_POST['irReserva4'])) {
    //echo "<script>console.log('Hola')</script>";
    $_SESSION['pagoRealizado'] = "correcto";
    header('Location: Reserva4.php');
}

?>