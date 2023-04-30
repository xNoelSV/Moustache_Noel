<?php
if (isset($_POST['ReservaPelo']) || isset($_POST['ReservaBarba'])) {
    if (isset($_POST['ReservaPelo'])) {
        $_SESSION['servicio'] = "Pelo";
    } else if (isset($_POST['ReservaBarba'])) {
        $_SESSION['servicio'] = "Barba";
    }
    header('Location: Reserva2.php');
}
?>