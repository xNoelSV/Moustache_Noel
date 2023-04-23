<?php

if (empty($_SESSION['pagoRealizado'])) {
    header('Location: Reserva3.php');
}

// Se conecta a la BD
include('../PHP/BD_Connector.php');

$idReserva = $_SESSION['fechaReserva'];
$idUsuario = $_SESSION['ID'];
$servicio = $_SESSION['servicio'];
$date = DateTime::createFromFormat('YmdHi', $idReserva);
$fechaReserva = $date->format('Y-m-d H:i');

$stmt = $dbh->prepare("INSERT INTO reservas (IDReserva, UserID, Servicio, fechaReserva)  VALUES (?,?,?,?)");
$stmt->bindParam(1, $idReserva);
$stmt->bindParam(2, $idUsuario);
$stmt->bindParam(3, $servicio);
$stmt->bindParam(4, $fechaReserva);

$stmt->execute();

?>