/* 

------------------------------------
PETICIÓN AJAX PARA VERIFICAR USUARIO 
------------------------------------

var xmlhttp = new XMLHttpRequest();

function validarUsu() {
    xmlhttp.open("POST", "../PHP/Login/validarUsu.php", false);
    xmlhttp.onreadystatechange = respuestaServidor;
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var emailPass = []
    emailPass.push(document.getElementById('correoLogin').value);
    emailPass.push(document.getElementById('passLogin').value);
    xmlhttp.send("emailPass=" + emailPass);
}

function respuestaServidor() {
    if (xmlhttp.readyState == 4) {
        if (xmlhttp.status == 200) {
            var containerMensajeError = document.getElementById("containerMensajeError");
            
            if (containerMensajeError.contains(document.getElementById("mensajeError"))) {
                containerMensajeError.removeChild(document.getElementById("mensajeError"));
            }
            var mensajeError = document.createElement("p");
            mensajeError.id = "mensajeError";

            if (xmlhttp.responseText == "El correo no existe. ") {
                mensajeError.hidden = false;
                mensajeError.innerHTML = xmlhttp.responseText;

                let campoRedireccionAlta = document.createElement("span");
                let redireccionAlta = document.createElement("a");
                campoRedireccionAlta.id = "linkRedireccionAlta";
                redireccionAlta.innerHTML = "¡Regístrate!";
                redireccionAlta.href = "Alta.php";
                campoRedireccionAlta.appendChild(redireccionAlta);
                mensajeError.appendChild(campoRedireccionAlta);
                alert("correo");

            } else if (xmlhttp.responseText == "La contraseña es incorrecta. ") {
                mensajeError.hidden = false;
                mensajeError.innerHTML = xmlhttp.responseText;
                if (mensajeError.contains(document.getElementById("linkRedireccionAlta"))) {
                    mensajeError.removeChild(document.getElementById("linkRedireccionAlta"));
                }
                alert("pass");

            } 
            containerMensajeError.appendChild(mensajeError);

        } else {
            alert(xmlhttp.statusText);
        }
    }
}

*/