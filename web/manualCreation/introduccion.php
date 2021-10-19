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
    <form action="">
        <input id="imgPrincipal" type="file">
        <div id="nomDispositivo">
            <label>Dispositivo</label>
            <input type="text">
        </div>
        <div id="parteReemplazada">
            <label>¿Qué parte estás reemplazando?</label>
            <input type="text">
        </div>
        <div id="resumen">
            <label>Resumen</label><br>
            <textarea name="" id="" cols="30" rows="10"></textarea>
        </div>
        <button type="submit">Guardar</button>
    </form>
 </div>
</body>
</html>