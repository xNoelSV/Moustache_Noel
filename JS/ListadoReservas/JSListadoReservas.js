var fechaHoy = 0;
var fechaComoCadena = 0;
var IDFechaActual = 0;
var clicks = 0;
var tmpNumeroDia = 0;

window.onload = cargarFechaInicio();
function cargarFechaInicio() {
    fechaHoy = Date.now();
    fechaComoCadena = new Date(fechaHoy);
}

function CargarRegistros(accion) {

    // Avanza o retrocede (o deja igual) el día en la que se encuentra el usuario.
    if (accion == "delante") {
        fechaComoCadena.setDate(fechaComoCadena.getDate() + 1);
    } else if (accion == "atras") {
        fechaComoCadena.setDate(fechaComoCadena.getDate() - 1);
    } else if (accion == "semanaDelante") {
        fechaComoCadena.setDate(fechaComoCadena.getDate() + 7);
    } else if (accion == "semanaAtras") {
        fechaComoCadena.setDate(fechaComoCadena.getDate() - 7);
    }

    // Obtiene el dia de la semana en el que nos encontramos
    var numeroDia = parseInt(new Date(fechaComoCadena).getDay());
    var nombresSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];

    // Selecciona el mes en el que se encuentra
    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var nombreMes = meses[new Date(fechaComoCadena).getMonth()];

    // Valor del día actual
    var stringDia = nombresSemana[numeroDia] + ", " + fechaComoCadena.getDate() + " de " + nombreMes + " del " + fechaComoCadena.getFullYear();

    // Imprime el día en la parte superior de la lista
    document.getElementById("diaCorrespondiente").innerHTML = "Día: " + stringDia;

    // Encontrar el ID de fechaActual y fechaHoraActual
    var mesActual = fechaComoCadena.getMonth() + 1;
    if (mesActual < 10) {
        mesActual = "0" + mesActual;
    }
    var diaActual = fechaComoCadena.getDate();
    if (diaActual < 10) {
        diaActual = "0" + diaActual;
    }
    var horaActual = fechaComoCadena.getHours();
    if (horaActual < 10) {
        horaActual = "0" + horaActual;
    }
    var minutoActual = fechaComoCadena.getMinutes();
    if (minutoActual < 10) {
        minutoActual = "0" + minutoActual;
    }
    IDFechaActual = fechaComoCadena.getFullYear() + mesActual + diaActual;

    // Genera los registros
    let servicioSeleccionado = $("#servicioSeleccionado").val();
    RecuperarRegistros(IDFechaActual, servicioSeleccionado);

    // Gestiona los clicks que avanzan y retroceden los días
    if (accion == "atras") {
        if (numeroDia != 1) {
            clicks--;
        }
        if (tmpNumeroDia == 2) {
            clicks--;
        }
    } else if (accion == "semanaAtras") {
        clicks -= 7;
    } else if (accion == "delante") {
        clicks++;
    } else if (accion == "semanaDelante") {
        clicks += 7;
    }
    tmpNumeroDia = numeroDia;

    // Muestra los días que se han adelantado o atrasado
    if (clicks != 0) {
        $("#btnRecargar").show();
        $("#diaAdelantadoAtrasado").css("color", "black");
        if (clicks < 0) {
            $("#diaAdelantadoAtrasado").text("(" + clicks + " día/s)");
        } else {
            $("#diaAdelantadoAtrasado").text("(+" + clicks + " día/s)");
        }
    } else {
        $("#diaAdelantadoAtrasado").text("---");
        $("#btnRecargar").hide();
        $("#diaAdelantadoAtrasado").css("color", "transparent");
    }
}

// ***********************************************************
// ******************** GENERAR REGISTROS ********************
// ***********************************************************

function RecuperarRegistros(IDFechaActual, servicio) {
    $.ajax({
        type: 'POST',  // Envío con método POST
        url: '../PHP/ListadoReservas/CargarRegistros.php',  // Fichero destino (el PHP que trata los datos)
        data: { IDFechaActual: IDFechaActual, Servicio: servicio }, // Datos que se envían
        success: function (resultado) {  // Función que se ejecuta si todo ha ido bien
            if (resultado == "No hay registros") {
                $("#cabeceraLista").hide();
                $("#registrosLista").hide();
                $("#alertLista").show();
                $("#indicadorReserva").hide();
            } else {
                $("#cabeceraLista").show();
                $("#registrosLista").show();
                $("#alertLista").hide();
                $("#indicadorReserva").show();
                let resul = jQuery.parseJSON(resultado);
                GenerarRegistros(resul, servicio);
            }
        },
    });
}

function GenerarRegistros(datosRecuperados, servicio) {

    // Comprueba que la lista no exista
    if ($("#listaReservas")) {
        $("#listaReservas").remove();
    }

    // Genera los registros según el servicio
    $("#registrosLista").append("<ul class='list-group rounded-bottom' id='listaReservas'></ul>");
    if (servicio == "TODO") {
        $("#listaReservas").append("<li class='list-group-item p-0' style='background-color: #DADADA;'><div class='row align-items-start rounded-top fw-medium'><div class='col p-2 border-end border-secondary-subtle border-2'>Nombre del cliente</div><div class='col p-2 border-end border-secondary-subtle border-2' id='servicioLista'>Servicio</div><div class='col p-2'>Hora de reserva</div></div></li>");
    } else {
        $("#listaReservas").append("<li class='list-group-item p-0' style='background-color: #DADADA;'><div class='row align-items-start rounded-top fw-medium'><div class='col p-2 border-end border-secondary-subtle border-2'>Nombre del cliente</div><div class='col p-2'>Hora de reserva</div></div></li>");
    }

    // Comprueba el servicio que al que se le hace la petición
    if (servicio != "TODO") {
        $("#servicioLista").hide();
    } else {
        $("#servicioLista").show();
    }

    // Recorre los registros recuperados de la base de datos
    for (let i = 0; i < datosRecuperados.length; i++) {
        let reserva = datosRecuperados[i];

        // Guarda en formato "Date" la fecha de reserva
        if (reserva[1] == "Barba") {
            var horaReserva = new Date(reserva[3]);
        } else {
            var horaReserva = new Date(reserva[2]);
        }

        // Parsea el date a su correspondiente formato
        let hora = horaReserva.getHours();
        let minutos = horaReserva.getMinutes();
        if (hora < 10) {
            hora = "0" + hora;
        }
        if (minutos < 10) {
            minutos = "0" + minutos;
        }

        // Genera el registros
        if (servicio == "TODO") {
            if (reserva[1] == "Barba") {
                $("#listaReservas").append("<li class='list-group-item p-0' id='Barba" + reserva[0] + "' style='background-color: " + reserva[4] + "'>");
                $("#Barba" + reserva[0]).append("<div class='row align-items-start rounded-top'><div class='col border-end border-2 p-2'>" + reserva[2] + "</div><div class='col border-end border-2 p-2'>Retocado de barba</div><div class='col p-2'>" + hora + ":" + minutos + "</div></div>");
            } else {
                $("#listaReservas").append("<li class='list-group-item p-0' id='Pelo" + reserva[0] + "' style='background-color: " + reserva[3] + "'>");
                $("#Pelo" + reserva[0]).append("<div class='row align-items-start rounded-top'><div class='col border-end border-2 p-2'>" + reserva[1] + "</div><div class='col border-end border-2 p-2'>Corte de pelo</div><div class='col p-2'>" + hora + ":" + minutos + "</div></div>");
            }
        } else {
            $("#listaReservas").append("<li class='list-group-item p-0' id='" + reserva[0] + "' style='background-color: " + reserva[3] + "'>");
            $("#" + reserva[0]).append("<div class='row align-items-start rounded-top'><div class='col border-end border-2 p-2'>" + reserva[1] + "</div><div class='col p-2'>" + hora + ":" + minutos + "</div></div>");
        }
    }

}

// ******************************************************************************************************
// ********************************************* SERVICIOS **********************************************
// ******************************************************************************************************

function CambiarServicio(servicio) {
    // Si se pulsa el botón de recarga
    if (servicio == "Recargar") {
        servicio = $("#servicioSeleccionado").val();

    // Si se selecciona cualquier servicio del desplegable
    } else {
        $("#servicioSeleccionado").val(servicio);
        if (servicio == "TODO") {
            $("#desplegableServicio").text("Servicio: Todo");
        } else if (servicio == "Pelo") {
            $("#desplegableServicio").text("Servicio: Corte de pelo");
        } else if (servicio == "Barba") {
            $("#desplegableServicio").text("Servicio: Retocado de barba");
        }
    }
    RecuperarRegistros(IDFechaActual, servicio);
}