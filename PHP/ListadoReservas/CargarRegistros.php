<?php

// Declaración de variables.
$IDFechaActual = $_POST['IDFechaActual'];
$Servicio = $_POST['Servicio'];
$arrayDatos = array();
$servicioSeleccionado = false;

include('../BD_Connector.php');

// Control del servicio seleccionado en el desplegable.
// Si ha seleccionado todo, se prepara el bloque PHP para ejecutar unas comandas determinadas.
if ($Servicio == "TODO") {
    $stmt = $dbh->prepare("SELECT * FROM reservasPelo WHERE IDReserva LIKE '" . $IDFechaActual . "%'");
    $stmt2 = $dbh->prepare("SELECT * FROM reservasBarba WHERE IDReserva LIKE '" . $IDFechaActual . "%'");
    
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $stmt2->setFetchMode(PDO::FETCH_ASSOC);
    $stmt2->execute();

    if (($stmt->rowCount() == 0) && ($stmt2->rowCount() == 0)) {
        echo "No hay registros";
        return;
    }

    // echo "<script>console.log('Hola')</script>";
    $servicioSeleccionado = false;

// Si se ha seleccionado el servicio de pelo, se selecciona unicamente la tabla reservasPelo.
} else if ($Servicio == "Pelo") {
    $stmt = $dbh->prepare("SELECT * FROM reservasPelo WHERE IDReserva LIKE '" . $IDFechaActual . "%'");
    $servicioSeleccionado = true;

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

// Si se ha seleccionado el servicio de pelo, se selecciona unicamente la tabla reservasBarba.
} else if ($Servicio == "Barba") {
    $stmt = $dbh->prepare("SELECT * FROM reservasBarba WHERE IDReserva LIKE '" . $IDFechaActual . "%'");
    $servicioSeleccionado = true;

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
}

// Comprobación de respuesta vacía.
if (($stmt->rowCount() == 0) && ($servicioSeleccionado == true)) {
    echo "No hay registros";

// Si la respuesta no está vacía, se comprueba que el servicio sea "TODO" o alguno de los demás.
// En caso de que sea un servicio únicamente, se devuelve un JSON de los registros correspondientes a la base de datos de ese servicio.
} else {
    while ($row = $stmt->fetch()) {
        if ($row["UserID"] != 0) {
            $stmt3 = $dbh->prepare("SELECT name FROM users WHERE ID='" . $row["UserID"] . "'");
            $stmt3->setFetchMode(PDO::FETCH_ASSOC);
            $stmt3->execute();
            $row2 = $stmt3->fetch();
            array_push($arrayDatos, array($row["IDReserva"], $row2['name'], $row["fechaReserva"], "white"));
        } else {
            array_push($arrayDatos, array($row["IDReserva"], $row["NombreReserva"], $row["fechaReserva"], "#ffd4d4"));
        }
    }

// Si está "TODO" seleccionado, se hace una segunda petición para extraer la información de la otra base de datos. 
// Los datos se mezclan para que queden en orden y tras ello, se devuelve la información parseada a JSON.
    if ($Servicio == "TODO") {
        while ($row = $stmt2->fetch()) {
            if ($row["UserID"] != 0) {
                $stmt3 = $dbh->prepare("SELECT name FROM users WHERE ID='" . $row["UserID"] . "'");
                $stmt3->setFetchMode(PDO::FETCH_ASSOC);
                $stmt3->execute();
                $row2 = $stmt3->fetch();
                array_push($arrayDatos, array($row["IDReserva"], "Barba", $row2['name'], $row["fechaReserva"], "white"));
            } else {
                array_push($arrayDatos, array($row["IDReserva"], "Barba", $row["NombreReserva"], $row["fechaReserva"], "#ffd4d4"));
            }
        }
        usort($arrayDatos, function($a, $b) {
            return $a[0] <=> $b[0];
        });
    }
    echo json_encode($arrayDatos);
}
