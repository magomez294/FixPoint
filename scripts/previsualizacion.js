var fecha = localStorage.getItem("fecManual").split('-');
document.getElementById("fecCreacion").innerHTML = `${fecha[2]}/${fecha[1]}/${fecha[0]}`;
document.getElementById("datosPersona").innerHTML = localStorage.getItem("nomPersona");
document.getElementById("datosEstudios").innerHTML = localStorage.getItem("estudioActual");
document.getElementById("datosLugar").innerHTML = localStorage.getItem("lugar");
document.getElementById("datosTelf").innerHTML = localStorage.getItem("numTelf");
document.getElementById("datosEdad").innerHTML = localStorage.getItem("ages");
document.getElementById("datosEmail").innerHTML = localStorage.getItem("corElectronico");
document.getElementById("resumenIntro").innerHTML = localStorage.getItem("cuadroIntro");
document.getElementById("titulo").innerHTML = localStorage.getItem("dispReemplazado");

document.getElementById("imgTitulo").src=localStorage.getItem("imgPrincipal");
document.getElementById("imgTitulo").show; 

document.getElementById("dificultad").innerHTML = localStorage.getItem("dificultadRep");
document.getElementById("numHoras").innerHTML = localStorage.getItem("numTiempo");
document.getElementById("detalleTiempo").innerHTML = localStorage.getItem("controlTiempo");

var texto = localStorage.getItem("herReparacion");
texto = texto.replace(/\n/g, "<br />");
document.getElementById("herramientas").innerHTML = texto;
console.log(localStorage.getItem("numeropasos"));
for (let index = 1; index <= localStorage.getItem("numeropasos"); index++) {
    
    var newDiv = document.createElement("div");
    newDiv.setAttribute('Class', "paso");
    var titulo = document.createElement("h3");
    titulo.textContent="Paso "+(index);
    var texto = document.createElement("p");
    texto.textContent=localStorage.getItem("texto"+index);
    var imagen = document.createElement("img");
    imagen.setAttribute('src', localStorage.getItem("imagen"+index));
    imagen.setAttribute('id', "imagen"+index);
    imagen.setAttribute('width', "150px");
    imagen.setAttribute('height', "120px");
    newDiv.appendChild(titulo);
    newDiv.appendChild(texto);
    newDiv.appendChild(imagen);
    var listaPasos = document.getElementById("pasos");
    listaPasos.appendChild(newDiv);
    document.getElementById("imagen"+index).show; 

}

function saveManual(){
    var userData = localStorage.getItem('user');
    userData = JSON.parse(userData);
    const pdf = html2pdf().from(document.getElementById('contenedor'));
    var title = localStorage.getItem("dispReemplazado");
    var autor = userData.username;
    var data = {
        title: title,
        autor: autor,
        pdf: pdf
    }
    fetch("../API/CRUD/createManual.php", {
        method: 'POST',
        body: JSON.stringify(data)
    })
    .then((response)=>response.json())
    .then((data)=>{
        if(data){
            Swal.fire(
                'Hecho!',
                `El manual con id ${id} a sido creado, está pendiente de ser validado por un resposable`,
                'success'
            )
        }
    })

}