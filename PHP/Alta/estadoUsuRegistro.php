<?php
sleep(3);
include("../BD_Connector.php");
$email = $_POST['email'];

if ($email == "") {
    echo "Campo vacío";
} else {
    $stmt = $dbh->prepare("SELECT * FROM users WHERE email='" . $email . "'");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        echo "Correo disponible";
    } else {
        $emailSeparado = explode("@", $email);
        echo "Correo ocupado, prueba con '" . $emailSeparado[0] . rand(0, 99) . "@" . $emailSeparado[1] . "' o '" . $emailSeparado[0] . rand(0, 99) . "@" . $emailSeparado[1] . "'.";
    }
}
?>