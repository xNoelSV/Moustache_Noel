var xmlhttp = new XMLHttpRequest();
var correoRellenado = false;
var checkboxRellenado = false;

function llamarServidor() {

    // Gestión de los elementos dentro de la web
    document.getElementById("btnRegistrar").disabled = true;
    if (!document.getElementById("mensajeError") == "") {
        document.getElementById("mensajeError").style = "margin-top: 0px;";
    }
    document.getElementById("imgComprobación").hidden = false;
    document.getElementById("imgComprobación").src = "../IMG/loading.gif";
    document.getElementById("textoComprobación").hidden = false;
    document.getElementById("textoComprobación").style = "color: orange;";
    document.getElementById("textoComprobación").innerHTML = "Validando...";

    // Apertura de la función
    xmlhttp.open("POST", "../PHP/Alta/estadoUsuRegistro.php", true);
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
                correoRellenado = true;
                habilitarLogin();
            } else if (xmlhttp.responseText == "Campo vacío") {
                document.getElementById("imgComprobación").hidden = true;
                document.getElementById("textoComprobación").hidden = true;
                alert(xmlhttp.responseText);
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

function estadoCheckbox() {
    if(document.getElementById("terms").checked == true) {
        checkboxRellenado = true;
        habilitarLogin();
    } else {
        checkboxRellenado = false;
        habilitarLogin();
    }
}

function habilitarLogin() {
    if ((correoRellenado==true) && (checkboxRellenado==true)) {
        document.getElementById("btnRegistrar").disabled = false;
    } else {
        document.getElementById("btnRegistrar").disabled = true;
    }
}

function comprobarEstadoInputs(numeroInput) {
    if (numeroInput == 1) {
        let inputRellenado = document.getElementById("nameUsuSignup");
        let divInput = document.getElementById("nameUsu");
        if (divInput.contains(document.getElementById("errorNombre"))) {
            inputRellenado.className = "form-control";
            divInput.removeChild(document.getElementById("errorNombre"));
        }
        if(inputRellenado.value == "") {
            inputRellenado.className = "form-control is-invalid"
            let error = document.createElement("div");
            error.className = "invalid-feedback";
            error.id = "errorNombre";
            error.innerHTML = "Rellene el campo porfavor.";
            document.getElementById("nameUsu").appendChild(error);
        }
    } else if (numeroInput == 2) {
        let inputRellenado = document.getElementById("surnameUsuSignup");
        let divInput = document.getElementById("surnameUsu");
        if (divInput.contains(document.getElementById("errorApellido"))) {
            inputRellenado.className = "form-control";
            divInput.removeChild(document.getElementById("errorApellido"));
        }
        if(inputRellenado.value == "") {
            inputRellenado.className = "form-control is-invalid"
            let error = document.createElement("div");
            error.className = "invalid-feedback";
            error.id = "errorApellido";
            error.innerHTML = "Rellene el campo porfavor.";
            document.getElementById("surnameUsu").appendChild(error);
        } 
    } else if (numeroInput == 3) {
        let inputRellenado = document.getElementById("passUsuSignup");
        let divInput = document.getElementById("passUsu");
        if (divInput.contains(document.getElementById("errorPass"))) {
            inputRellenado.className = "form-control";
            divInput.removeChild(document.getElementById("errorPass"));
        }
        if(inputRellenado.value == "") {
            inputRellenado.className = "form-control is-invalid"
            let error = document.createElement("div");
            error.className = "invalid-feedback";
            error.id = "errorPass";
            error.innerHTML = "Rellene el campo porfavor.";
            document.getElementById("passUsu").appendChild(error);
        }
    } else if (numeroInput == 4) {
        let inputRellenado = document.getElementById("pass2UsuSignup");
        let divInput = document.getElementById("pass2Usu");
        if (divInput.contains(document.getElementById("errorPass2"))) {
            inputRellenado.className = "form-control";
            divInput.removeChild(document.getElementById("errorPass2"));
        }
        if(inputRellenado.value == "") {
            inputRellenado.className = "form-control is-invalid"
            let error = document.createElement("div");
            error.className = "invalid-feedback";
            error.id = "errorPass2";
            error.innerHTML = "Rellene el campo porfavor.";
            document.getElementById("pass2Usu").appendChild(error);
        }
    }
}