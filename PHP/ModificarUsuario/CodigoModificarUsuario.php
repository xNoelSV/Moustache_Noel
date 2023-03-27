<?php

session_start();
if (!isset($_SESSION['Nombre'])) {
    header('Location: paginaPrincipal.php');
}

include("../PHP/BD_Connector.php");

// Codigo que guarda la información necesaria de la sesión del usuario.
$stmt = $dbh->prepare("SELECT * FROM users WHERE ID = " . $_SESSION['ID']);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$row = $stmt->fetch();

$name = $row['name'];
$surname = $row['surname'];
$email = $row['email'];

$passwrdFail = false;
// Condicional que verifica que se haya pulsado el botón de "Borrar usuario".
if (isset($_POST['btnBorrar'])) {
    $stmt = $dbh->prepare("DELETE FROM users WHERE ID = " . $_SESSION['ID']);
    $stmt->execute();

    session_destroy();
    header('Location: Login.php');

    // Condicional que verifica que se haya pulsado el botón de "Guardar".
} else if (isset($_POST['btnModificar'])) {

    $modificaciones = 0;
    $campoClaveEditado = false;
    $nombreEditado = false;
    $query = "UPDATE users SET";
    // Cadena de condicionales que va comprovando el estado de los inputs.
    // Si alguno está vacío, se pasa al siguiente, sinó, se añade parámetros a la query para modificar el valor de la BD.
    if (!empty($_POST['nameUsuModificar'])) {
        $query = $query . " name = '" . $_POST['nameUsuModificar'] . "'";
        $nombreEditado = true;
        $modificaciones++;
    }
    if (!empty($_POST['surnameUsuModificar'])) {
        if ($modificaciones > 0) {
            $query = $query . ", surname = '" . $_POST['surnameUsuModificar'] . "'";
        } else {
            $query = $query . " surname = '" . $_POST['surnameUsuModificar'] . "'";
        }
        $modificaciones++;
    }
    if (!empty($_POST['emailUsuModificar'])) {
        if ($modificaciones > 0) {
            $query = $query . ", email = '" . $_POST['emailUsuModificar'] . "'";
        } else {
            $query = $query . " email = '" . $_POST['emailUsuModificar'] . "'";
        }
        $campoClaveEditado = true;
        $modificaciones++;
    }
    if (!empty($_POST['passUsuModificar']) || !empty($_POST['pass2UsuModificar'])) {
        if (($_POST['passUsuModificar'] == $_POST['pass2UsuModificar'])) {
            $pass = $_POST['passUsuModificar'];
            include("../PHP/EncriptarPassword.php");
            if ($modificaciones > 0) {
                $query = $query . ", password = '" . $pass . "'";
            } else {
                $query = $query . " password = '" . $pass . "'";
            }
            $campoClaveEditado = true;
            $modificaciones++;
        } else {
            $modificaciones = 0;
            $nombreEditado = false;
            $campoClaveEditado = false;
            $passwrdFail = true;
        }
    }
    $query = $query . " WHERE ID = " . $_SESSION['ID'];

    if ($modificaciones > 0) {
        $stmt = $dbh->prepare($query);
        $stmt->execute();
    }
    if ($nombreEditado) {
        $_SESSION['Nombre'] = $_POST['nameUsuModificar'];
    }
    if ($campoClaveEditado) {
        session_destroy();
        header('Location: Login.php');
    }

    header("Refresh:0");
}
?>