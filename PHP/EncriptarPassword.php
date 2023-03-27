<?php

$key = "barberiaMoustache";
$method = "sha256";

$pass = hash($method, $key . $pass);

?>