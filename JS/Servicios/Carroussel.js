window.onload = function () {
    var imgCentral = document.getElementById("imgCentral");
    document.getElementById("izq").style.visibility = "hidden";
}
var actual = 1;

function imgClick(imgThmb) {
    imgCentral.src = "../IMG/CarrousselServicios/" + imgThmb + ".jpg";
    actual = imgThmb;

    if ((actual == 1) || (actual == 6)) {
        if (actual == 1) {
            document.getElementById("izq").style.visibility = "hidden";
            document.getElementById("der").style.visibility = "visible";
        }
        if (actual == 6) {
            document.getElementById("der").style.visibility = "hidden";
            document.getElementById("izq").style.visibility = "visible";
        }
    } else {
        document.getElementById("der").style.visibility = "visible";
        document.getElementById("izq").style.visibility = "visible";
    }
}

function imgIzq() {
    actual--;
    console.log(actual);
    if (actual == 1) {
        document.getElementById("izq").style.visibility = "hidden";
        document.getElementById("der").style.visibility = "visible";
    } else {
        document.getElementById("der").style.visibility = "visible";
    }
    imgCentral.src = "../IMG/CarrousselServicios/" + parseInt(actual) + ".jpg";
}

function imgDer() {
    actual++;
    console.log(actual);
    if (actual == 6) {
        document.getElementById("der").style.visibility = "hidden";
        document.getElementById("izq").style.visibility = "visible";
    } else {
        document.getElementById("izq").style.visibility = "visible";
    }
    imgCentral.src = "../IMG/CarrousselServicios/" + parseInt(actual) + ".jpg";
}