<?php
session_start();
if (isset($_SESSION['Nombre'])) {
    header('Location: paginaPrincipal.php');
}

$camposVacios = false;
$emailVacio = false;
$passVacio = false;
$emailIncorrecto = false;
$passwordIncorrecto = false;

if (isset($_POST['btnLogin'])) {

    include("../PHP/BD_Connector.php");
    $email = $_POST['emailLogin'];
    $pass = $_POST['passLogin'];

    if (($email == "") && ($pass == "")) {
        $camposVacios = true;
    } else if ($email == "") {
        $emailVacio = true;
    } else if ($pass == "") {
        $passVacio = true;
    } else {
        $stmt = $dbh->prepare("SELECT * FROM users WHERE email='" . $email . "'");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            $emailIncorrecto = true;
        } else {
            include("../PHP/EncriptarPassword.php");
            $stmt = $dbh->prepare("SELECT * FROM users WHERE email='" . $email . "' AND password='" . $pass . "'");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                $passwordIncorrecto = true;
            } else {
                $row = $stmt->fetch();
                $_SESSION['Nombre'] = $row['name'];
                $_SESSION['ID'] = $row['ID'];
                $_SESSION['Email'] = $row['email'];
                header('Location: paginaPrincipal.php');
                
            }
        }
    }
}

?>