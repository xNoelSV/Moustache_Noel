var fechaHoy = 0;
var fechaComoCadena = 0;
var fechaComoCadenaModificada = 0;
var diasSumar = 0;
var totalDias = 0;
var clicks = 0;

window.onload = cargarFechaInicio();
function cargarFechaInicio() {
    fechaHoy = Date.now();
    fechaComoCadena = new Date(fechaHoy);
    fechaComoCadenaModificada = new Date(fechaHoy);
}

function CargarRegistros(dias, servicio) {

    // Obtiene el dia de la semana en el que nos encontramos
    var numeroDia = parseInt(new Date(fechaComoCadena).getDay());

    // Avanza o retrocede (o deja igual) la semana en la que se encuentra el usuario.
    fechaComoCadena.setDate(fechaComoCadena.getDate() + dias);
    
    // Le da el valor inicial de la semana correspondiente a la fechaModificada
    fechaComoCadenaModificada.setDate(fechaComoCadena.getDate());

    // Selecciona el mes en el que se encuentra
    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var nombreMes = meses[new Date(fechaComoCadena).getMonth()];

    // Si es domingo, se pasa a la semana siguiente (dia actual (domingo) = 1 (lunes))
    var stringFecha = "";
    if (numeroDia == 0) {
        fechaComoCadena.setDate(fechaComoCadena.getDate() + 1);
        numeroDia = 1;
    }

    // Administrador que determina los valores de cada dia según la semana en el que nos encontramos
    if (numeroDia == 1) {
        // Parte superior del calendario (Semana actual)
        fechaComoCadenaModificada.setDate(fechaComoCadena.getDate() + 6);
        var nombreMesModificado = meses[new Date(fechaComoCadenaModificada).getMonth()];
        stringFecha = parseInt(fechaComoCadena.getDate()) + " de " + nombreMes + " - " + parseInt(fechaComoCadenaModificada.getDate()) + " de " + nombreMesModificado;
        
        // Días de la semana que se van a sumar a la fecha
        diasSumar = [0, 1, 2, 3, 4, 5, 6];
    } else if (numeroDia == 2) {
        // Parte superior del calendario (Semana actual)
        fechaComoCadenaModificada.setDate(fechaComoCadena.getDate() + 5);
        var nombreMesModificado = meses[new Date(fechaComoCadenaModificada).getMonth()];
        stringFecha = parseInt(fechaComoCadena.getDate() - 1) + " de " + nombreMes + " - " + parseInt(fechaComoCadenaModificada.getDate()) + " de " + nombreMesModificado;

        // Días de la semana que se van a sumar a la fecha
        diasSumar = [-1, 0, 1, 2, 3, 4, 5];
    } else if (numeroDia == 3) {
        // Parte superior del calendario (Semana actual)
        fechaComoCadenaModificada.setDate(fechaComoCadena.getDate() + 4);
        var nombreMesModificado = meses[new Date(fechaComoCadenaModificada).getMonth()];
        stringFecha = parseInt(fechaComoCadena.getDate() - 2) + " de " + nombreMes + " - " + parseInt(fechaComoCadenaModificada.getDate()) + " de " + nombreMesModificado;

        // Días de la semana que se van a sumar a la fecha
        diasSumar = [-2, -1, 0, 1, 2, 3, 4];
    } else if (numeroDia == 4) {
        // Parte superior del calendario (Semana actual)
        fechaComoCadenaModificada.setDate(fechaComoCadena.getDate() + 3);
        var nombreMesModificado = meses[new Date(fechaComoCadenaModificada).getMonth()];
        stringFecha = parseInt(fechaComoCadena.getDate() - 3) + " de " + nombreMes + " - " + parseInt(fechaComoCadenaModificada.getDate()) + " de " + nombreMesModificado;

        // Días de la semana que se van a sumar a la fecha
        diasSumar = [-3, -2, -1, 0, 1, 2, 3];
    } else if (numeroDia == 5) {
        // Parte superior del calendario (Semana actual)
        fechaComoCadenaModificada.setDate(fechaComoCadena.getDate() + 2);
        var nombreMesModificado = meses[new Date(fechaComoCadenaModificada).getMonth()];
        stringFecha = parseInt(fechaComoCadena.getDate() - 4) + " de " + nombreMes + " - " + parseInt(fechaComoCadenaModificada.getDate()) + " de " + nombreMesModificado;

        // Días de la semana que se van a sumar a la fecha
        diasSumar = [-4, -3, -2, -1, 0, 1, 2];
    } else if (numeroDia == 6) {
        // Parte superior del calendario (Semana actual)
        fechaComoCadenaModificada.setDate(fechaComoCadena.getDate() + 1);
        var nombreMesModificado = meses[new Date(fechaComoCadenaModificada).getMonth()];
        stringFecha = parseInt(fechaComoCadena.getDate() - 5) + " de " + nombreMes + " - " + parseInt(fechaComoCadenaModificada.getDate()) + " de " + nombreMesModificado;

        // Días de la semana que se van a sumar a la fecha
        diasSumar = [-5, -4, -3, -2, -1, 0, 1];
    }
    
    // Generación de los textos en la parte superior de cada columna
    var nombresSemana = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
    var nombresSemanaSinTilde = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
    fechaComoCadenaModificada.setDate(fechaComoCadena.getDate());
    for (i = 0; i < 7; i++) {
        fechaComoCadenaModificada.setDate(fechaComoCadena.getDate() + diasSumar[i]);
        document.getElementById("textoColumna" + nombresSemanaSinTilde[i]).innerHTML = nombresSemana[i] + " " + parseInt(fechaComoCadenaModificada.getDate());
        setTimeout(() => 5000);
    }

    // Imprime la semana en la parte superior del calendario
    document.getElementById("semanaCorrespondiente").innerHTML = "Semana: " + stringFecha + " del " + new Date(fechaComoCadena).getFullYear();

    // Gestiona los clicks que avanzan y retroceden las semanas
    if (dias < 0) {
        clicks--;
    } else if (dias > 0) {
        clicks++;
    }

    if (clicks == 0) {
        $("#semanaAnterior").prop("disabled", true);
    } else {
        $("#semanaAnterior").prop("disabled", false);
    }

    if (clicks == 16) {
        $("#semanaSiguiente").prop("disabled", true);
    } else {
        $("#semanaSiguiente").prop("disabled", false);
    }

    // Genera los registros de reserva según el servicio
    if (servicio == "Pelo") {
        GenerarRegistrosPelo();
    } else if (servicio == "Barba") {
        GenerarRegistrosBarba();
    }

}


// ***********************************************************
// ************************** PELO **************************
// ***********************************************************

function GenerarRegistrosPelo() {

    for (var i = 0; i < 6; i++) {
        if (i == 0) {
            //Lunes
        } else {
            var columna;

            if (i == 1) {
                var dia = "Martes";
                columna = document.getElementById("columna" + dia);
            } else if (i == 2) {
                var dia = "Miercoles";
                columna = document.getElementById("columna" + dia);
            } else if (i == 3) {
                var dia = "Jueves";
                columna = document.getElementById("columna" + dia);
            } else if (i == 4) {
                var dia = "Viernes";
                columna = document.getElementById("columna" + dia);
            } else if (i == 5) {
                var dia = "Sabado";
                columna = document.getElementById("columna" + dia);
            }

            // ---------------------- MAÑANAS ----------------------

            if ($("#botonesManana" + i)) {
                $("#botonesManana" + i).remove();
            }
            if ($("#separadorTarde" + i)) {
                $("#separadorTarde" + i).remove();
            }
            if ($("#botonesTarde" + i)) {
                $("#botonesTarde" + i).remove();
            }


            var botones = document.createElement("div");
            botones.className = "btn-group-vertical w-100 ps-3 pe-3";
            botones.role = "group";
            botones.id = "botonesManana" + i;
            botones.ariaLabel = "Vertical button group";
            columna.appendChild(botones);

            var horasManana = ["9:30 - 10:15", "10:15 - 11:00", "11:00 - 11:45", "11:45 - 12:30", "12:30 - 13:15"];
            for (let j = 0; j < horasManana.length; j++) {
                let horaManana = document.createElement("input");
                horaManana.type = "button";
                horaManana.value = horasManana[j];
                horaManana.className = "w-100 br-5 btn btn-light border border-dark";
                horaManana.style = "--bs-border-opacity: .5;";
                horaManana.id = dia + j;
                horaManana.setAttribute("onclick", "AbrirModal(this, 'textoColumna"+dia+"')");
                horaManana.setAttribute("data-bs-toggle", "modal");
                horaManana.setAttribute("data-bs-target", "#modalFlotante");
                botones.appendChild(horaManana);
            }
            if (dia == "Sabado") {
                let horaManana = document.createElement("input");
                horaManana.type = "button";
                horaManana.value = "13:15 - 14:00";
                horaManana.className = "w-100 br-5 btn btn-light border border-dark";
                horaManana.style = "--bs-border-opacity: .5;";
                horaManana.setAttribute("onclick", "AbrirModal(this, 'textoColumna"+dia+"')");
                horaManana.setAttribute("data-bs-toggle", "modal");
                horaManana.setAttribute("data-bs-target", "#modalFlotante");
                horaManana.id = dia + parseInt(horasManana.length + 1);
                botones.appendChild(horaManana);
            }

            // ---------------------- TARDES ----------------------

            if (dia != "Sabado") {

                let separadorTarde = document.createElement("p");
                separadorTarde.innerHTML = "Tarde";
                separadorTarde.id = "separadorTarde" + i;
                separadorTarde.className = "m-0 mt-3 mb-3 w-100";
                columna.appendChild(separadorTarde);

                var botones2 = document.createElement("div");
                botones2.className = "btn-group-vertical w-100 ps-3 pe-3";
                botones2.role = "group";
                botones2.id = "botonesTarde" + i;
                botones2.ariaLabel = "Vertical button group";
                columna.appendChild(botones2);

                var horasTarde = ["16:00 - 16:45", "16:45 - 17:30", "17:30 - 18:15", "18:15 - 19:00", "19:00 - 19:45"];
                for (let j = 0; j < horasTarde.length; j++) {
                    let horaTarde = document.createElement("input");
                    horaTarde.type = "button";
                    horaTarde.value = horasTarde[j];
                    horaTarde.className = "w-100 br-5 btn btn-light border border-dark";
                    horaTarde.style = "--bs-border-opacity: .5;";
                    horaTarde.setAttribute("onclick", "AbrirModal(this, 'textoColumna"+dia+"')");
                    horaTarde.setAttribute("data-bs-toggle", "modal");
                    horaTarde.setAttribute("data-bs-target", "#modalFlotante");
                    horaTarde.id = dia + parseInt(j + horasManana.length);
                    botones2.appendChild(horaTarde);
                }
            }
        }
    }
}

// ***********************************************************
// ************************** BARBA **************************
// ***********************************************************

function GenerarRegistrosBarba() {

    for (var i = 0; i < 6; i++) {
        if (i == 0) {
            //var dia = "Lunes";
        } else {
            var columna;

            if (i == 1) {
                var dia = "Martes";
                columna = document.getElementById("columna" + dia);
            } else if (i == 2) {
                var dia = "Miercoles";
                columna = document.getElementById("columna" + dia);
            } else if (i == 3) {
                var dia = "Jueves";
                columna = document.getElementById("columna" + dia);
            } else if (i == 4) {
                var dia = "Viernes";
                columna = document.getElementById("columna" + dia);
            } else if (i == 5) {
                var dia = "Sabado";
                columna = document.getElementById("columna" + dia);
            }

            if ($("#botonesManana" + i)) {
                $("#botonesManana" + i).remove();
            }
            if ($("#separadorTarde" + i)) {
                $("#separadorTarde" + i).remove();
            }
            if ($("#botonesTarde" + i)) {
                $("#botonesTarde" + i).remove();
            }

            var botones = document.createElement("div");
            botones.className = "btn-group-vertical w-100 ps-3 pe-3";
            botones.role = "group";
            botones.ariaLabel = "Vertical button group";
            botones.id = "botonesManana" + i;
            columna.appendChild(botones);

            var horasManana = ["9:30 - 10:00", "10:00 - 10:30", "10:30 - 11:00", "11:00 - 11:30", "11:30 - 12:00", "12:00 - 12:30", "12:30 - 13:00", "13:00 - 13:30"];
            for (let j = 0; j < horasManana.length; j++) {
                let horaManana = document.createElement("input");
                horaManana.type = "button";
                horaManana.value = horasManana[j];
                horaManana.className = "w-100 br-5 btn btn-light border border-dark";
                horaManana.style = "--bs-border-opacity: .5;";
                horaManana.id = dia + j;
                horaManana.setAttribute("onclick", "AbrirModal(this, 'textoColumna"+dia+"')");
                horaManana.setAttribute("data-bs-toggle", "modal");
                horaManana.setAttribute("data-bs-target", "#modalFlotante");
                botones.appendChild(horaManana);
            }
            if (dia == "Sabado") {
                let horaManana = document.createElement("input");
                horaManana.type = "button";
                horaManana.value = "13:30 - 14:00";
                horaManana.className = "w-100 br-5 btn btn-light border border-dark";
                horaManana.style = "--bs-border-opacity: .5;";
                horaManana.id = dia + parseInt(horasManana.length + 1);
                horaManana.setAttribute("onclick", "AbrirModal(this, 'textoColumna"+dia+"')");
                horaManana.setAttribute("data-bs-toggle", "modal");
                horaManana.setAttribute("data-bs-target", "#modalFlotante");
                botones.appendChild(horaManana);
            }

            // ---------------------- TARDES ----------------------

            if (dia != "Sabado") {
                let separadorTarde = document.createElement("p");
                separadorTarde.innerHTML = "Tarde";
                separadorTarde.id = "separadorTarde" + i;
                separadorTarde.className = "m-0 mt-3 mb-3 w-100"
                columna.appendChild(separadorTarde);

                var botones2 = document.createElement("div");
                botones2.className = "btn-group-vertical w-100 ps-3 pe-3";
                botones2.role = "group";
                botones2.id = "botonesTarde" + i;
                botones2.ariaLabel = "Vertical button group";
                columna.appendChild(botones2);

                var horasTarde = ["16:00 - 16:30", "16:30 - 17:00", "17:00 - 17:30", "17:30 - 18:00", "18:00 - 18:30", "18:30 - 19:00", "19:00 - 19:30", "19:30 - 20:00"];
                for (let j = 0; j < horasTarde.length; j++) {
                    let horaTarde = document.createElement("input");
                    horaTarde.type = "button";
                    horaTarde.value = horasTarde[j];
                    horaTarde.className = "w-100 br-5 btn btn-light border border-dark";
                    horaTarde.style = "--bs-border-opacity: .5;";
                    horaTarde.setAttribute("onclick", "AbrirModal(this, 'textoColumna"+dia+"')");
                    horaTarde.setAttribute("data-bs-toggle", "modal");
                    horaTarde.setAttribute("data-bs-target", "#modalFlotante");
                    horaTarde.id = dia + parseInt(j + horasManana.length);
                    botones2.appendChild(horaTarde);
                }
            }
        }
    }
}

// ***************************************************************************************************************************************
// ********************************************************** HORA SELECCIONADA **********************************************************
// ***************************************************************************************************************************************

function AbrirModal(botonPresionado, textoColumna) {
    let dia = botonPresionado.id;

    let columnaSeparada = document.getElementById(textoColumna).innerHTML;
    console.log(columnaSeparada);
    let columna = columnaSeparada.split(" ");
    let stringModal = "¿Quieres reservar para el " + columna[0] + " " + columna[1] + " a las " + $(botonPresionado).val() + "?";
    $("#textoModal").text(stringModal);
}

function HoraSeleccionada() {

}