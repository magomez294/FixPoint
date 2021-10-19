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
        <div id="tiempo">
            <label>Tiempo estimado</label>
            <input type="range" min="0" max="3.14" step="any">
            </div>
            <div id="dificultad">
            <label>Dificultad estimada</label>
            <select name="" id="">
                <option value="">Muy fácil</option>
                <option value="">Fácil</option>
                <option value="">Moderado</option>
                <option value="">Difícil</option>
                <option value="">Muy difícil</option>
            </select>
            </div>
            <div id="herramientas">
            <label>Herramientas</label>
            <textarea name="" id="" cols="30" rows="10"></textarea>
            </div>
            <button type="submit">Guardar</button>
    </form>
 </div>
</body>
</html>