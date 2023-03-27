<?php
$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos = "moustache";

try {
    $dsn = "mysql:host=" . $servidor . ";dbname=$basededatos";
    $dbh = new PDO($dsn, $usuario, $password);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //evitar SQL Injection
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>