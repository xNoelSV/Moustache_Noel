<?php

if (empty($_SESSION['servicio'])) {
    header('Location: Reserva1.php');
}

if (isset($_POST['volverReserva2'])) {
    header('Location: Reserva1.php');
}

// Si se ha pulsado el botón de reserva se accede a este método
if (isset($_POST['btnEnviar'])) {

    $_SESSION['fechaReserva'] = $_POST['dataStoredStr'];
    if (isset($_SESSION['esAdmin'])) {
        // Se conecta a la BD
        include('../PHP/BD_Connector.php');

        // Guarda la reserva en la base de datos.
        $servicio = $_SESSION['servicio'];
        $idReserva = $_POST['dataStoredStr'];
        $idUsuario = $_SESSION['ID'];
        $date = DateTime::createFromFormat('YmdHi', $idReserva);
        $fechaReserva = $date->format('Y-m-d H:i');
        $nombreReserva = $_POST['nombreReserva'];

        if ($servicio == "Pelo") {
            $stmt = $dbh->prepare("INSERT INTO reservaspelo (IDReserva, UserID, fechaReserva, NombreReserva)  VALUES (?,?,?,?)");
        } else if ($servicio == "Barba") {
            $stmt = $dbh->prepare("INSERT INTO reservasbarba (IDReserva, UserID, fechaReserva, NombreReserva)  VALUES (?,?,?,?)");
        }

        $stmt->bindParam(1, $idReserva);
        $stmt->bindParam(2, $idUsuario);
        $stmt->bindParam(3, $fechaReserva);
        $stmt->bindParam(4, $nombreReserva);

        $stmt->execute();
        header('Location: ListadoReservas.php');
    } else {
        header('Location: Reserva3.php');
    }
}
