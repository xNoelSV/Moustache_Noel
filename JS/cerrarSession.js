function cerrarSession() {
    alert("Redirigiendo a la página principal...");
    $.get("../PHP/cerrarSession.php");
    location.reload();
}