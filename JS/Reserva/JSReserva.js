function volverReserva() {
    $.get("../PHP/Reserva/BorrarSessionReserva.php");
    location.reload();
}

// ***************************************************************************************************************************************
// ********************************************************** HORA SELECCIONADA **********************************************************
// ***************************************************************************************************************************************

function AbrirModal(botonPresionado, diaSemana) {
    let idBoton = botonPresionado.id;

    // Separamos la cadena en sus componentes de fecha y hora
    var anio = parseInt(idBoton.substring(0, 4));
    var mes = parseInt(idBoton.substring(4, 6)) - 1; // Los meses en JS comienzan en 0 (enero = 0)
    var dia = parseInt(idBoton.substring(6, 8));
    var hora = parseInt(idBoton.substring(8, 10));
    var minuto = parseInt(idBoton.substring(10, 12));

    // Creamos un objeto de fecha con los componentes obtenidos
    var fechaHora = new Date(anio, mes, dia, hora, minuto);
    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

    // Recupera los minutos de la reserva. Si son menores a 10, le suma un "0" delante.
    var minutosReserva = fechaHora.getMinutes();
    if (minutosReserva < 10) {
        minutosReserva = "0" + minutosReserva;
    }

    // Imprimimos la fecha y hora obtenidas
    $("#textoModal").text("¿Quieres reservar para el " + diaSemana.toLowerCase() + " " + fechaHora.getDate() + " de " + meses[fechaHora.getMonth()] + " a las " + fechaHora.getHours() + ":" + minutosReserva + "?");
    $("#dataStoredDate").val(fechaHora);
    $("#dataStoredStr").val(idBoton);
}
