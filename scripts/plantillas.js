let date = new Date();

let day = date.getDate();
let month = date.getMonth() + 1;
let year = date.getFullYear();
document.getElementById("fecManual").value = `${year}-${month}-${day}`;


function guardar () {
    localStorage.setItem('fecManual', document.getElementById("fecManual").value);
    localStorage.setItem('nomPersona', document.getElementById("nomPersona").value);
    localStorage.setItem('estudioActual', document.getElementById("estudioActual").value);
    localStorage.setItem('lugar', document.getElementById("lugar").value);
    localStorage.setItem('ages', document.getElementById("ages").value);
    localStorage.setItem('numTelf', document.getElementById("numTelf").value);
    localStorage.setItem('corElectronico', document.getElementById("corElectronico").value);
    localStorage.setItem('imgPrincipal', document.getElementById("imgPrincipal").value);
    localStorage.setItem('nomDispositivo', document.getElementById("dispositivo").value);
    localStorage.setItem('parteReemplazada', document.getElementById("infoRemplazo").value);
}

