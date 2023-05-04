<?php

session_start();
if ($_SESSION['ID'] == "") {
    header('Location: paginaPrincipal.php');
}

if (isset($_POST['irListado'])) {
    header('Location: ListadoReservas.php');
}

if (isset($_POST['btnConfirmar'])) {

    if ($_POST['dataServicio'] == "Corte de pelo") {
        $servicio = "reservasPelo";
    } else if ($_POST['dataServicio'] == "Retocado de barba") {
        $servicio = "reservasBarba";
    }       
    $fechaActual = $_POST['horaActualModificada'];

    include("../PHP/BD_Connector.php");
    $stmt = $dbh->prepare("DELETE FROM " . $servicio . " WHERE IDReserva < " . $fechaActual);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

}
