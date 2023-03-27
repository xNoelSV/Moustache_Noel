<?php
$servicio = "";
if (isset($_POST['ReservaPelo']) || isset($_POST['ReservaBarba'])) {
    if (isset($_POST['ReservaPelo'])) {
        $servicio = "Pelo";
        $_SESSION['servicio'] = "Pelo";
    } else if (isset($_POST['ReservaBarba'])) {
        $servicio = "Afeitado";
        $_SESSION['servicio'] = "Barba";
    }
    $_SESSION['queryReserva'] = "INSERT INTO reservas VALUES (".$_SESSION['ID'].",'".$servicio."',";
    header('Location: Reserva2.php');
}
?>