<?php

if (empty($_SESSION['pagoRealizado'])) {
    header('Location: Reserva3.php');
}

// Se conecta a la BD
include('../PHP/BD_Connector.php');

$servicio = $_SESSION['servicio'];
$idReserva = $_SESSION['fechaReserva'];
$idUsuario = $_SESSION['ID'];
$date = DateTime::createFromFormat('YmdHi', $idReserva);
$fechaReserva = $date->format('Y-m-d H:i');

if ($servicio == "Pelo") {
    $stmt = $dbh->prepare("INSERT INTO reservaspelo (IDReserva, UserID, fechaReserva)  VALUES (?,?,?)");
} else if ($servicio == "Barba") {
    $stmt = $dbh->prepare("INSERT INTO reservasbarba (IDReserva, UserID, fechaReserva)  VALUES (?,?,?)");
}

$stmt->bindParam(1, $idReserva);
$stmt->bindParam(2, $idUsuario);
$stmt->bindParam(3, $fechaReserva);

$stmt->execute();

?>