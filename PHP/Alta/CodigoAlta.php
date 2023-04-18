<?php
session_start();
if (isset($_SESSION['Nombre'])) {
    header('Location: paginaPrincipal.php');
}

// Variables de control de errores. 
$passwrdFail = false;

// Condicional que verifica que se haya pulsado el botón de "Sign Up".
if (isset($_POST['btnUsuSignup'])) {

    // Se conecta a la BD
    include('../PHP/BD_Connector.php');

    // Condicional que verifica el valor de los inputs del formulario.
    if (!empty($_POST['nameUsuSignup']) && !empty($_POST['emailUsuSignup']) && !empty($_POST['surnameUsuSignup']) && !empty($_POST['passUsuSignup']) && !empty($_POST['pass2UsuSignup'])) {

        $nom = $_POST['nameUsuSignup'];
        $surname = $_POST['surnameUsuSignup'];
        $email = $_POST['emailUsuSignup'];
        $pass = $_POST['passUsuSignup'];
        $pass2 = $_POST['pass2UsuSignup'];

        // Si todos los campos son correctos, se prepara un insert a la BD con los datos pasados por el formulario.
        if ($pass != $pass2) {
            $passwrdFail = true;
        } else {
            include("../PHP/EncriptarPassword.php");
            $stmt = $dbh->prepare("INSERT INTO users (name, surname, email, password)  VALUES (?,?,?,?)");

            $stmt->bindParam(1, $nom);
            $stmt->bindParam(2, $surname);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $pass);

            $stmt->execute();
            header('Location: Login.php');
        }
    }
}

?>