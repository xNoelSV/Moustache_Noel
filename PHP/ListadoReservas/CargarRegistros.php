<?php

$IDFechaActual = $_POST['IDFechaActual'];
$Servicio = $_POST['Servicio'];
$arrayDatos = array();

include('../BD_Connector.php');

if ($Servicio == "TODO") {
    $stmt = $dbh->prepare("SELECT * FROM reservasPelo WHERE IDReserva LIKE'" . $IDFechaActual . "%'");
    $stmt2 = $dbh->prepare("SELECT * FROM reservasBarba WHERE IDReserva LIKE '" . $IDFechaActual . "%'");

    $stmt2->setFetchMode(PDO::FETCH_ASSOC);
    $stmt2->execute();
} else if ($Servicio == "Pelo") {
    $stmt = $dbh->prepare("SELECT * FROM reservasPelo WHERE IDReserva LIKE '" . $IDFechaActual . "%'");
} else if ($Servicio == "Barba") {
    $stmt = $dbh->prepare("SELECT * FROM reservasBarba WHERE IDReserva LIKE '" . $IDFechaActual . "%'");
}

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();

if (($stmt->rowCount() == 0)) {
    echo "No hay registros";
} else {
    while ($row = $stmt->fetch()) {
        if ($row["UserID"] != 0) {
            $stmt3 = $dbh->prepare("SELECT name FROM users WHERE ID='" . $row["UserID"] . "'");
            $stmt3->setFetchMode(PDO::FETCH_ASSOC);
            $stmt3->execute();
            $row2 = $stmt3->fetch();
            array_push($arrayDatos, array($row["IDReserva"], $row2['name'] , $row["fechaReserva"]));
        } else {
            array_push($arrayDatos, array($row["IDReserva"], $row["NombreReserva"] , $row["fechaReserva"]));
        }
    }
    if ($Servicio == "TODO") {
        while ($row = $stmt2->fetch()) {
            if ($row["UserID"] != 0) {
                $stmt3 = $dbh->prepare("SELECT name FROM users WHERE ID='" . $row["UserID"] . "'");
                $stmt3->setFetchMode(PDO::FETCH_ASSOC);
                $stmt3->execute();
                $row2 = $stmt3->fetch();
                array_push($arrayDatos, array($row["IDReserva"], "Barba", $row2['name'] , $row["fechaReserva"]));
            } else {
                array_push($arrayDatos, array($row["IDReserva"], "Barba", $row["NombreReserva"] , $row["fechaReserva"]));
            }
        }
        usort($arrayDatos, function($a, $b) {
            return $a[0] <=> $b[0];
        });
    }
    echo json_encode($arrayDatos);
}

?>