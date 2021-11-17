
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

async function saveManual(){
    
    var userData = localStorage.getItem('user');
    userData = JSON.parse(userData);
    const element = document.getElementById('contenedor');
    console.log(element);
    console.log(html2pdf);
    var pdf;
    await html2pdf()
        .set({
            margin: 1,
            filename: 'documento.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 3,
                letterRendering: true,
            },
            jsPDF: {
                unit: "in",
                format: "a3",
                orientation: 'portrait'
            }
        })
        .from(element).save();
        /* .toPdf().output('datauristring').then(function (pdfBase64) {
            // You have access to the jsPDF object and can use it as desired.
            pdf = pdfBase64;
            const file = new File(
                [pdfBase64],
                'mifile',
                {type: 'application/pdf'}
            );
            const formData = new FormData();        
            formData.append("file", file);
            fetch('../../API/CRUD/createManual.php', {
                method: 'PUT',
                body: formData,
              })
              .then(response => response.text())
              .then(result => {
                console.log('Success:', result);
              })
              .catch(error => {
                console.error('Error:', error);
              });
        }); */
       /*  console.log(pdf)
        var formData = new FormData();
        formData.append('pdf', pdf)
        var title = localStorage.getItem("dispReemplazado");
        var autor = userData.username;
        var autor = 3
        var title = 'miTitulo'
        var data = {
            title: title,
            autor: autor,
            pdf: formData
        }
    fetch("../../API/CRUD/createManual.php", {
        method: 'POST',
        body: JSON.stringify(data)
    })
    .then((response)=>response.text())
    .then((data)=>{
        console.log(data); */
        /* if(data){
            Swal.fire(
                'Hecho!',
                `El manual con a sido creado, está pendiente de ser validado por un resposable`,
                'success'
            )
        } 
    })*/

}