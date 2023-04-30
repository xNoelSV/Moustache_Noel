<?php

session_start();
$IDReserva = $_POST['IDReserva'];
$Servicio = $_POST['Servicio'];

include('../BD_Connector.php');

if ($Servicio == "Pelo") {
    $stmt = $dbh->prepare("SELECT * FROM reservasPelo WHERE IDReserva='" . $IDReserva . "'");
} else if ($Servicio == "Barba") {
    $stmt = $dbh->prepare("SELECT * FROM reservasBarba WHERE IDReserva='" . $IDReserva . "'");
}

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    echo "Libre";
} else {
    echo "Ocupado";
}
