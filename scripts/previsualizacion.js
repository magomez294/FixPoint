var fecha = localStorage.getItem("fecManual").split('-');
document.getElementById("fecCreacion").innerHTML = `${fecha[2]}/${fecha[1]}/${fecha[0]}`;
document.getElementById("datosPersona").innerHTML = localStorage.getItem("nomPersona");
document.getElementById("datosEstudios").innerHTML = localStorage.getItem("estudioActual");
document.getElementById("datosLugar").innerHTML = localStorage.getItem("lugar");
document.getElementById("datosTelf").innerHTML = localStorage.getItem("numTelf");
document.getElementById("datosEdad").innerHTML = localStorage.getItem("ages");
document.getElementById("datosEmail").innerHTML = localStorage.getItem("corElectronico");




