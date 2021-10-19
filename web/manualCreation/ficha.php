<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crear una nueva guia</title>
  <link rel="stylesheet" href="prueba.css">
 
</head>
<body>
<div id="menu">
    <ul>
        <li><a href="ficha.html">Ficha</a></li>
        <li><a href="introduccion.html">Introducción</a></li>
        <li><a href="detalles.html">Detalles</a></li>
        <li><a href="pasos.html">Pasos guía</a></li>
    </ul>
</div>
<div id="main">
    <form action="create_manual_p1.php" method="POST" >
    <div id="fecha">
        <label>Fecha</label>
        <input type="date" id="fecManual" value="2021-10-18">
    </div>
    <div id="nombre">
        <label>Nombre</label>
        <input type="text" id="nomPersona">
    </div>
    <div id="estudios">
        <label>Estudios que realiza</label>
        <input type="text" id="estudioActual">
    </div>
    <div id="ciudad">
        <label>Ciudad</label>
        <input type="text" id="lugar">
    </div>
    <div id="telf">
        <label>Teléfono</label>
        <input type="tel" id="numTelf">
    </div>
    <div id="edad">
        <label>Edad</label>
        <input type="text" id="ages">
    </div>
    <div id="email">
        <label>Correo electrónico</label>
        <input type="email" id="corElectronico">
    </div>
    <button type="submit" onclick="guardar(event)">Guardar</button>
    </form>
 </div>
 <script src="plantillas.js"></script>
</body>
</html>