function guardar (e) {
e.preventDefault();
    mostrarDatos ()
}
function mostrarDatos () {
    var nombre = document.getElementById("nomPersona");
    var element = document.getElementById("lugarNombre");
    console.log(element);
    console.log(nombre);
    element.innerHTML = nombre.value;
    console.log(element);
}
