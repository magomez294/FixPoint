
function guardar () {
    /* window.history.forward(); */
    localStorage.setItem('fecManual', document.getElementById("fecManual").value);
    localStorage.setItem('nomPersona', document.getElementById("nomPersona").value);
    localStorage.setItem('estudioActual', document.getElementById("estudioActual").value);
    localStorage.setItem('lugar', document.getElementById("lugar").value);
    localStorage.setItem('ages', document.getElementById("ages").value);
    localStorage.setItem('numTelf', document.getElementById("numTelf").value);
    localStorage.setItem('corElectronico', document.getElementById("corElectronico").value);
    
    
}

function guardarIntroduccion(){
    /* window.history.forward(); */
    localStorage.setItem('cuadroIntro', document.getElementById("cuadroIntro").value);
    localStorage.setItem('dispReemplazado', document.getElementById("titManual").value);
}

function guardarDetalles () {
    /* window.history.forward(); */
    localStorage.setItem('numTiempo', document.getElementById("numOption").value);
    localStorage.setItem('controlTiempo', document.getElementById("tiempOption").value);
    localStorage.setItem('dificultadRep', document.getElementById("dificultad").value);
    localStorage.setItem('herReparacion', document.getElementById("herramientas").value);
}

function guardarPasos() {
    /* window.history.forward(); */
    var elementos =document.getElementsByClassName("contenido");
    
    localStorage.setItem('numeropasos', elementos.length);
    console.log(localStorage.getItem("numeropasos"));
    for (let index = 0; index < elementos.length; index++) {
        localStorage.setItem('texto'+(index+1), elementos[index].children[2].value);
        localStorage.setItem('imagen'+(index+1), imagenes[index]);
    }
}

function previsualizar() {
    document.getElementById("imgPrincipal").onchange = function () {
        var reader = new FileReader();
        if(this.files[0].size>528385){
            alert("Image Size should not be greater than 500Kb");
            $("#preview").attr("src","blank");
            $("#preview").hide();  
            $('#imgPrincipal').wrap('<form>').closest('form').get(0).reset();
            $('#imgPrincipal').unwrap();     
            return false;
        }
        if(this.files[0].type.indexOf("image")==-1){
            alert("Invalid Type");
            $("#preview").attr("src","blank");
            $("#preview").hide();  
            $('#imgPrincipal').wrap('<form>').closest('form').get(0).reset();
            $('#imgPrincipal').unwrap();         
            return false;
        }
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            localStorage.setItem('imgPrincipal', e.target.result);
            document.getElementById("preview").src = e.target.result;
            $("#preview").show(); 
        };
    
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    }; 
}

