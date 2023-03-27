var xmlhttp = new XMLHttpRequest();
var correoRellenado = false;
var checkboxRellenado = false;

function llamarServidor() {

    // Gestión de los elementos dentro de la web
    document.getElementById("btnModificar").disabled = true;
    if (!document.getElementById("mensajeError") == "") {
        document.getElementById("mensajeError").style = "margin-top: 0px;";
    }
    document.getElementById("imgComprobación").hidden = false;
    document.getElementById("imgComprobación").src = "../IMG/loading.gif";
    document.getElementById("textoComprobación").hidden = false;
    document.getElementById("textoComprobación").style = "color: orange;";
    document.getElementById("textoComprobación").innerHTML = "Validando...";

    // Apertura de la función
    xmlhttp.open("POST", "../PHP/ModificarUsuario/validarEmail.php", true);
    xmlhttp.onreadystatechange = respuestaServidor;
    var email = document.getElementById('pk').value;
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("email=" + email);

}

// Función que imprime por pantalla el resultado del PHP
function respuestaServidor() {
    if (xmlhttp.readyState == 4) {
        if (xmlhttp.status == 200) {
            document.getElementById("textoComprobación").hidden = false;
            if (xmlhttp.responseText == "Correo disponible") {
                document.getElementById("imgComprobación").src = "../IMG/correcto.png";
                document.getElementById("textoComprobación").style = "color: green;";
                document.getElementById("btnModificar").disabled = false;
            } else if (xmlhttp.responseText == "-") {
                document.getElementById("imgComprobación").hidden = true;
                document.getElementById("textoComprobación").hidden = true;
                document.getElementById("btnModificar").disabled = false;
            } else {
                document.getElementById("imgComprobación").src = "../IMG/incorrecto.png";
                document.getElementById("textoComprobación").style = "color: red;"
            }
            document.getElementById("textoComprobación").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("imgComprobación").hidden = true;
            document.getElementById("textoComprobación").hidden = true;
            alert(xmlhttp.statusText);
        }
    }
}