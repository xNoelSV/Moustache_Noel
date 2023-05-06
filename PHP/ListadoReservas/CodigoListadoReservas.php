<?php 

session_start();
if (!isset($_SESSION['ID'])) {
    header('Location: paginaPrincipal.php');
}
if ($_SESSION['ID'] != 0) {
    header('Location: paginaPrincipal.php');
}

?>