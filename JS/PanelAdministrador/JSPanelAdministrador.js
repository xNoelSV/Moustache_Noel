// Creando una función y llamándola cada segundo
setInterval(() => {
    // Variables que guardan la información extraída de la fechahora actual
    let date = new Date(),
        year = date.getFullYear(),
        month = date.getMonth(),
        weekday = date.getDay(),
        day = date.getDate(),
        hour = date.getHours(),
        min = date.getMinutes(),
        sec = date.getSeconds(),
        meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        nombresSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];

    // Añadiendo un 0 delante en caso de que el resultado sea menor que 10
    month = month < 10 ? "0" + month : month;
    day = day < 10 ? "0" + day : day;
    hour = hour < 10 ? "0" + hour : hour;
    min = min < 10 ? "0" + min : min;
    sec = sec < 10 ? "0" + sec : sec;

    $("#fecha").text(nombresSemana[weekday] + ", " + day + " de " + meses[date.getMonth()] + " del " + year);
    $("#cuadroHora").text(hour + " : " + min + " : " + sec);

    month = date.getMonth()+1;
    month = month < 10 ? "0" + month : month;
    $("#horaActualModificada").val(year+month+day+hour+min);

}, 1000); // 1000 milisegundos = 1s

function AbrirModal(botonPulsado) {
    $("#textoModal").html("<p class='fw-bold'>" + $(botonPulsado).val() + "</p>");
    $("#dataServicio").val($(botonPulsado).val());
}
