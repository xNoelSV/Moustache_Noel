function volverReserva() {
    $.get("../PHP/Reserva/BorrarSessionReserva.php");
    location.reload();
}

function irReserva3() {
    window.location.href = "Reserva3.php"
}