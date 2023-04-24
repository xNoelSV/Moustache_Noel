//var xmlhttp = new XMLHttpRequest();
var fechaHoy = 0;
var fechaComoCadena = 0;
var fechaComoCadenaModificada = 0;
var fechaComoCadenaInicioSemana = 0;
var clicks = 0;
var esDomingo = false;

window.onload = cargarFechaInicio();
function cargarFechaInicio() {
    fechaHoy = Date.now();
    fechaComoCadena = new Date(fechaHoy);
    fechaComoCadenaModificada = new Date(fechaHoy);
    fechaComoCadenaInicioSemana = new Date(fechaHoy);
}

function CargarRegistros(accion, servicio) {

    // Obtiene el dia de la semana en el que nos encontramos
    var numeroDia = parseInt(new Date(fechaComoCadena).getDay());

    // Avanza o retrocede (o deja igual) la semana en la que se encuentra el usuario.
    if (accion == "delante") {
        fechaComoCadena.setDate(fechaComoCadena.getDate() + 7);
    } else if (accion == "atras") {
        fechaComoCadena.setDate(fechaComoCadena.getDate() - 7);
    }

    // Le da el valor inicial de la semana correspondiente a la fechaComoCadenaInicioSemana
    fechaComoCadenaInicioSemana.setDate(fechaComoCadena.getDate() - (numeroDia - 1));

    // Selecciona el mes en el que se encuentra
    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var nombreMes = meses[new Date(fechaComoCadena).getMonth()];
    var nombreMesModificado = meses[new Date(fechaComoCadena).getMonth()];

    // Se le da el valor del primer dia de la semana a la cadena
    var stringFecha = parseInt(fechaComoCadenaInicioSemana.getDate());

    // Si es domingo, se pasa a la semana siguiente (dia actual (domingo) = 1 (lunes))
    if (numeroDia == 0) {
        fechaComoCadena.setDate(fechaComoCadena.getDate() + 1);
        esDomingo = true;
        numeroDia = 1;
    }

    // Administrador que determina los valores de cada dia según la semana en el que nos encontramos
    if (numeroDia == 1) {
        // Parte superior del calendario (Semana actual)
        fechaComoCadenaModificada.setDate(fechaComoCadena.getDate() + 6);
        fechaComoCadenaInicioSemana.setMonth(fechaComoCadena.getMonth());
        if (fechaComoCadenaModificada.getDate() < fechaComoCadenaInicioSemana.getDate()) {
            nombreMesModificado = meses[new Date(fechaComoCadenaInicioSemana).getMonth() + 1];
        }
        if (esDomingo) {
            if (fechaComoCadenaInicioSemana.getDate() > fechaComoCadenaModificada.getDate()) {
                nombreMes = meses[new Date(fechaComoCadena).getMonth()];
                nombreMesModificado = meses[new Date(fechaComoCadena).getMonth() + 1];
            }
        }
        stringFecha += " de " + nombreMes + " - " + parseInt(fechaComoCadenaModificada.getDate()) + " de " + nombreMesModificado;

    } else if (numeroDia == 2) {
        // Parte superior del calendario (Semana actual)
        fechaComoCadenaModificada.setDate(fechaComoCadena.getDate() + 5);
        if (fechaComoCadenaModificada.getDate() < fechaComoCadenaInicioSemana.getDate()) {
            nombreMes = meses[new Date(fechaComoCadena).getMonth() - 1];
        }
        stringFecha += " de " + nombreMes + " - " + parseInt(fechaComoCadenaModificada.getDate()) + " de " + nombreMesModificado;

    } else if (numeroDia == 3) {
        // Parte superior del calendario (Semana actual)
        fechaComoCadenaModificada.setDate(fechaComoCadena.getDate() + 4);
        if (fechaComoCadenaModificada.getDate() < fechaComoCadenaInicioSemana.getDate()) {
            nombreMes = meses[new Date(fechaComoCadena).getMonth() - 1];
        }
        stringFecha += " de " + nombreMes + " - " + parseInt(fechaComoCadenaModificada.getDate()) + " de " + nombreMesModificado;

    } else if (numeroDia == 4) {
        // Parte superior del calendario (Semana actual)
        fechaComoCadenaModificada.setDate(fechaComoCadena.getDate() + 3);
        if (fechaComoCadenaModificada.getDate() < fechaComoCadenaInicioSemana.getDate()) {
            nombreMes = meses[new Date(fechaComoCadena).getMonth() - 1];
        }
        stringFecha += " de " + nombreMes + " - " + parseInt(fechaComoCadenaModificada.getDate()) + " de " + nombreMesModificado;

    } else if (numeroDia == 5) {
        // Parte superior del calendario (Semana actual)
        fechaComoCadenaModificada.setDate(fechaComoCadena.getDate() + 2);
        if (fechaComoCadenaModificada.getDate() < fechaComoCadenaInicioSemana.getDate()) {
            nombreMes = meses[new Date(fechaComoCadena).getMonth() - 1];
        }
        stringFecha += " de " + nombreMes + " - " + parseInt(fechaComoCadenaModificada.getDate()) + " de " + nombreMesModificado;

    } else if (numeroDia == 6) {
        // Parte superior del calendario (Semana actual)
        fechaComoCadenaModificada.setDate(fechaComoCadena.getDate() + 1);
        if (fechaComoCadenaModificada.getDate() < fechaComoCadenaInicioSemana.getDate()) {
            nombreMes = meses[new Date(fechaComoCadena).getMonth() - 1];
        }
        stringFecha += " de " + nombreMes + " - " + parseInt(fechaComoCadenaModificada.getDate()) + " de " + nombreMesModificado;

    }

    // Generación de los textos en la parte superior de cada columna
    var nombresSemana = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
    var nombresSemanaSinTilde = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
    for (i = 0; i <= 6; i++) {
        document.getElementById("textoColumna" + nombresSemanaSinTilde[i]).innerHTML = nombresSemana[i] + " " + fechaComoCadenaInicioSemana.getDate();

        // Genera los registros de reserva según el servicio
        if (servicio == "Pelo") {
            GenerarRegistrosPelo(nombresSemanaSinTilde[i], fechaComoCadenaInicioSemana);
        } else if (servicio == "Barba") {
            GenerarRegistrosBarba(nombresSemanaSinTilde[i], fechaComoCadenaInicioSemana);
        }

        fechaComoCadenaInicioSemana.setDate(fechaComoCadenaInicioSemana.getDate() + 1);
    }

    // Imprime la semana en la parte superior del calendario
    document.getElementById("semanaCorrespondiente").innerHTML = "Semana: " + stringFecha + " del " + new Date(fechaComoCadenaModificada).getFullYear();

    // Gestiona los clicks que avanzan y retroceden las semanas
    if (accion == "atras") {
        clicks--;
    } else if (accion == "delante") {
        clicks++;
    }

    if (clicks == 0) {
        $("#semanaAnterior").prop("disabled", true);
    } else {
        $("#semanaAnterior").prop("disabled", false);
    }

    if (clicks == 20) {
        $("#semanaSiguiente").prop("disabled", true);
    } else {
        $("#semanaSiguiente").prop("disabled", false);
    }

}

// ***********************************************************
// ************************** PELO ***************************
// ***********************************************************

function GenerarRegistrosPelo(nombresSemanaSinTilde, fechaComoCadenaInicioSemana) {
    var columna = document.getElementById("columna" + nombresSemanaSinTilde);

    // En caso de dia no laborable (Lunes & Domingo) se crean los siguientes "alerts"
    if ((nombresSemanaSinTilde == "Lunes") || (nombresSemanaSinTilde == "Domingo")) {
        if ($("#diaNoLaborable" + nombresSemanaSinTilde)) {
            $("#diaNoLaborable" + nombresSemanaSinTilde).remove();
        }
        var diaNoLaborable = document.createElement("div");
        diaNoLaborable.className = "alert alert-dark ms-3 me-3"
        diaNoLaborable.setAttribute("role", "alert");
        diaNoLaborable.id = "diaNoLaborable" + nombresSemanaSinTilde;
        diaNoLaborable.innerHTML = "Día no laborable";
        columna.appendChild(diaNoLaborable);

        // Los demás días se generan los inputs con las horas
    } else {

        if ($("#botonesManana" + nombresSemanaSinTilde)) {
            $("#botonesManana" + nombresSemanaSinTilde).remove();
        }
        if ($("#separadorTarde" + nombresSemanaSinTilde)) {
            $("#separadorTarde" + nombresSemanaSinTilde).remove();
        }
        if ($("#botonesTarde" + nombresSemanaSinTilde)) {
            $("#botonesTarde" + nombresSemanaSinTilde).remove();
        }

        // ---------------------- MAÑANAS ----------------------

        var botones = document.createElement("div");
        botones.className = "btn-group-vertical w-100 ps-3 pe-3";
        botones.role = "group";
        botones.id = "botonesManana" + nombresSemanaSinTilde;
        botones.ariaLabel = "Vertical button group";
        columna.appendChild(botones);

        var horasManana = ["9:30 - 10:15", "10:15 - 11:00", "11:00 - 11:45", "11:45 - 12:30", "12:30 - 13:15"];
        for (let i = 0; i < horasManana.length; i++) {

            // Preparacion de datos
            var mesActual = fechaComoCadenaInicioSemana.getMonth() + 1;
            if (mesActual < 10) {
                mesActual = "0" + mesActual;
            }
            var diaActual = fechaComoCadenaInicioSemana.getDate();
            if (diaActual < 10) {
                diaActual = "0" + diaActual;
            }
            var horaSeparada = horasManana[i].split(" ");
            var horaSeleccionada = horaSeparada[0].split(":");
            var horaActual = horaSeleccionada[0];
            if (horaActual < 10) {
                horaActual = "0" + horaActual;
            }
            horaActual = horaActual + horaSeleccionada[1];
            var IDPreparada = fechaComoCadenaInicioSemana.getFullYear() + mesActual + diaActual + horaActual;

            setInterval(crearBoton(botones, IDPreparada, "Pelo", horasManana[i], nombresSemanaSinTilde), 3000);
        }
    
        if (nombresSemanaSinTilde == "Sabado") {
            let horaManana = document.createElement("input");
            horaManana.type = "button";
            horaManana.value = "13:15 - 14:00";
            horaManana.className = "w-100 br-5 btn btn-light border border-dark";
            horaManana.style = "--bs-border-opacity: .5;";

            // Preparacion de datos
            var mesActual = fechaComoCadenaInicioSemana.getMonth() + 1;
            if (mesActual < 10) {
                var mesActual = "0" + mesActual;
            }
            var diaActual = fechaComoCadenaInicioSemana.getDate();
            if (diaActual < 10) {
                diaActual = "0" + diaActual;
            }

            horaManana.id = fechaComoCadenaInicioSemana.getFullYear() + mesActual + diaActual + "13:15";
            horaManana.setAttribute("onclick", "AbrirModal(this, '" + nombresSemanaSinTilde + "')");
            horaManana.setAttribute("data-bs-toggle", "modal");
            horaManana.setAttribute("data-bs-target", "#modalFlotante");

            botones.appendChild(horaManana);
        }

        // ---------------------- TARDES ----------------------

        if (nombresSemanaSinTilde != "Sabado") {

            let separadorTarde = document.createElement("p");
            separadorTarde.innerHTML = "Tarde";
            separadorTarde.id = "separadorTarde" + nombresSemanaSinTilde;
            separadorTarde.className = "m-0 mt-3 mb-3 w-100";
            columna.appendChild(separadorTarde);

            var botones2 = document.createElement("div");
            botones2.className = "btn-group-vertical w-100 ps-3 pe-3";
            botones2.role = "group";
            botones2.id = "botonesTarde" + nombresSemanaSinTilde;
            botones2.ariaLabel = "Vertical button group";
            columna.appendChild(botones2);

            var horasTarde = ["16:00 - 16:45", "16:45 - 17:30", "17:30 - 18:15", "18:15 - 19:00", "19:00 - 19:45"];
            for (let i = 0; i < horasTarde.length; i++) {
                let horaTarde = document.createElement("input");
                horaTarde.type = "button";
                horaTarde.value = horasTarde[i];
                horaTarde.className = "w-100 br-5 btn btn-light border border-dark";
                horaTarde.style = "--bs-border-opacity: .5;";

                // Preparacion de datos
                var mesActual = fechaComoCadenaInicioSemana.getMonth() + 1;
                if (mesActual < 10) {
                    var mesActual = "0" + mesActual;
                }
                var diaActual = fechaComoCadenaInicioSemana.getDate();
                if (diaActual < 10) {
                    diaActual = "0" + diaActual;
                }
                var horaSeparada = horasTarde[i].split(" ");
                var horaSeleccionada = horaSeparada[0].split(":");
                var horaFinal = horaSeleccionada[0] + horaSeleccionada[1];

                horaTarde.id = fechaComoCadenaInicioSemana.getFullYear() + mesActual + diaActual + horaFinal;
                horaTarde.setAttribute("onclick", "AbrirModal(this, '" + nombresSemanaSinTilde + "')");
                horaTarde.setAttribute("data-bs-toggle", "modal");
                horaTarde.setAttribute("data-bs-target", "#modalFlotante");
                botones2.appendChild(horaTarde);
            }
        }
    }

    function crearBoton(botones, IDPreparada, Servicio, horasArray, nombresSemanaSinTilde) {
        $.ajax({
            type: 'POST',  // Envío con método POST
            url: '../PHP/Reserva/ComprobarReservaDisponible.php',  // Fichero destino (el PHP que trata los datos)
            data: { IDReserva: IDPreparada, Servicio: Servicio }, // Datos que se envían
        }).done(function (msg) {  // Función que se ejecuta si todo ha ido bien
            let horaManana = document.createElement("input");
            horaManana.type = "button";
            horaManana.value = horasArray;
            horaManana.className = "w-100 br-5 btn btn-light border border-dark";
            horaManana.style = "--bs-border-opacity: .5;";
            horaManana.id = IDPreparada;
            horaManana.setAttribute("onclick", "AbrirModal(this, '" + nombresSemanaSinTilde + "')");
            horaManana.setAttribute("data-bs-toggle", "modal");
            horaManana.setAttribute("data-bs-target", "#modalFlotante");
            if (msg == "Ocupado") {
                $(horaManana).addClass("disabled");
            }
            botones.appendChild(horaManana);

        }).fail(function (jqXHR, textStatus, errorThrown) { // Función que se ejecuta si algo ha ido mal
            // Mostramos en consola el mensaje con el error que se ha producido
            $("#consola").html("The following error occured: " + textStatus + " " + errorThrown);
        });
    }
}

// ***********************************************************
// ************************** BARBA **************************
// ***********************************************************

function GenerarRegistrosBarba(nombresSemanaSinTilde, fechaComoCadenaInicioSemana) {
    var columna = document.getElementById("columna" + nombresSemanaSinTilde);

    // En caso de dia no laborable (Lunes & Domingo) se crean los siguientes "alerts"
    if ((nombresSemanaSinTilde == "Lunes") || (nombresSemanaSinTilde == "Domingo")) {
        if ($("#diaNoLaborable" + nombresSemanaSinTilde)) {
            $("#diaNoLaborable" + nombresSemanaSinTilde).remove();
        }
        var diaNoLaborable = document.createElement("div");
        diaNoLaborable.className = "alert alert-dark ms-3 me-3"
        diaNoLaborable.setAttribute("role", "alert");
        diaNoLaborable.id = "diaNoLaborable" + nombresSemanaSinTilde;
        diaNoLaborable.innerHTML = "Día no laborable";
        columna.appendChild(diaNoLaborable);

        // Los demás días se generan los inputs con las horas
    } else {

        if ($("#botonesManana" + nombresSemanaSinTilde)) {
            $("#botonesManana" + nombresSemanaSinTilde).remove();
        }
        if ($("#separadorTarde" + nombresSemanaSinTilde)) {
            $("#separadorTarde" + nombresSemanaSinTilde).remove();
        }
        if ($("#botonesTarde" + nombresSemanaSinTilde)) {
            $("#botonesTarde" + nombresSemanaSinTilde).remove();
        }

        // ---------------------- MAÑANAS ----------------------

        var botones = document.createElement("div");
        botones.className = "btn-group-vertical w-100 ps-3 pe-3";
        botones.role = "group";
        botones.id = "botonesManana" + nombresSemanaSinTilde;
        botones.ariaLabel = "Vertical button group";
        columna.appendChild(botones);

        var horasManana = ["9:30 - 10:00", "10:00 - 10:30", "10:30 - 11:00", "11:00 - 11:30", "11:30 - 12:00", "12:00 - 12:30", "12:30 - 13:00", "13:00 - 13:30"];
        for (let i = 0; i < horasManana.length; i++) {
            let horaManana = document.createElement("input");
            horaManana.type = "button";
            horaManana.value = horasManana[i];
            horaManana.className = "w-100 br-5 btn btn-light border border-dark";
            horaManana.style = "--bs-border-opacity: .5;";

            // Preparacion de datos
            var mesActual = fechaComoCadenaInicioSemana.getMonth() + 1;
            if (mesActual < 10) {
                mesActual = "0" + mesActual;
            }
            var diaActual = fechaComoCadenaInicioSemana.getDate();
            if (diaActual < 10) {
                diaActual = "0" + diaActual;
            }
            var horaSeparada = horasManana[i].split(" ");
            var horaSeleccionada = horaSeparada[0].split(":");
            var horaActual = horaSeleccionada[0];
            if (horaActual < 10) {
                horaActual = "0" + horaActual;
            }
            horaActual = horaActual + horaSeleccionada[1];

            horaManana.id = fechaComoCadenaInicioSemana.getFullYear() + mesActual + diaActual + horaActual;
            horaManana.setAttribute("onclick", "AbrirModal(this, '" + nombresSemanaSinTilde + "')");
            horaManana.setAttribute("data-bs-toggle", "modal");
            horaManana.setAttribute("data-bs-target", "#modalFlotante");
            botones.appendChild(horaManana);
        }
        if (nombresSemanaSinTilde == "Sabado") {
            let horaManana = document.createElement("input");
            horaManana.type = "button";
            horaManana.value = "13:15 - 14:00";
            horaManana.className = "w-100 br-5 btn btn-light border border-dark";
            horaManana.style = "--bs-border-opacity: .5;";

            // Preparacion de datos
            var mesActual = fechaComoCadenaInicioSemana.getMonth() + 1;
            if (mesActual < 10) {
                var mesActual = "0" + mesActual;
            }
            var diaActual = fechaComoCadenaInicioSemana.getDate();
            if (diaActual < 10) {
                diaActual = "0" + diaActual;
            }

            horaManana.id = fechaComoCadenaInicioSemana.getFullYear() + mesActual + diaActual + "13:15";
            horaManana.setAttribute("onclick", "AbrirModal(this, '" + nombresSemanaSinTilde + "')");
            horaManana.setAttribute("data-bs-toggle", "modal");
            horaManana.setAttribute("data-bs-target", "#modalFlotante");

            botones.appendChild(horaManana);
        }

        // ---------------------- TARDES ----------------------

        if (nombresSemanaSinTilde != "Sabado") {

            let separadorTarde = document.createElement("p");
            separadorTarde.innerHTML = "Tarde";
            separadorTarde.id = "separadorTarde" + nombresSemanaSinTilde;
            separadorTarde.className = "m-0 mt-3 mb-3 w-100";
            columna.appendChild(separadorTarde);

            var botones2 = document.createElement("div");
            botones2.className = "btn-group-vertical w-100 ps-3 pe-3";
            botones2.role = "group";
            botones2.id = "botonesTarde" + nombresSemanaSinTilde;
            botones2.ariaLabel = "Vertical button group";
            columna.appendChild(botones2);

            var horasTarde = ["16:00 - 16:30", "16:30 - 17:00", "17:00 - 17:30", "17:30 - 18:00", "18:00 - 18:30", "18:30 - 19:00", "19:00 - 19:30", "19:30 - 20:00"];
            for (let i = 0; i < horasTarde.length; i++) {
                let horaTarde = document.createElement("input");
                horaTarde.type = "button";
                horaTarde.value = horasTarde[i];
                horaTarde.className = "w-100 br-5 btn btn-light border border-dark";
                horaTarde.style = "--bs-border-opacity: .5;";

                // Preparacion de datos
                var mesActual = fechaComoCadenaInicioSemana.getMonth() + 1;
                if (mesActual < 10) {
                    var mesActual = "0" + mesActual;
                }
                var diaActual = fechaComoCadenaInicioSemana.getDate();
                if (diaActual < 10) {
                    diaActual = "0" + diaActual;
                }
                var horaSeparada = horasTarde[i].split(" ");
                var horaSeleccionada = horaSeparada[0].split(":");
                var horaFinal = horaSeleccionada[0] + horaSeleccionada[1];

                horaTarde.id = fechaComoCadenaInicioSemana.getFullYear() + mesActual + diaActual + horaFinal;
                horaTarde.setAttribute("onclick", "AbrirModal(this, '" + nombresSemanaSinTilde + "')");
                horaTarde.setAttribute("data-bs-toggle", "modal");
                horaTarde.setAttribute("data-bs-target", "#modalFlotante");
                botones2.appendChild(horaTarde);
            }
        }
    }
}
