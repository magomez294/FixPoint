<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crear una nueva guia</title>
  <link rel="stylesheet" href="../../styles/menuPlantilla.css">
  <link rel="stylesheet" href="../../styles/introduccion.css">
  <link rel="stylesheet" href="../../styles/menu.css">
</head>
<body>
    <main>
        <div id="menu">
            <ul>
                <li><a href="#">Ficha</a></li>
                <li><a href="#">Introducción</a></li>
                <li><a href="#">Detalles</a></li>
                <li><a href="#">Pasos guía</a></li>
            </ul>
        </div>
        <div id="main">
            <form action="../manualCreation/detalles.php" onsubmit="guardarIntroduccion()">
            
                <div id="introduccion">
                    <label>Introducción</label> <br>
                    <textarea id="cuadroIntro" required placeholder="Escribe un resumen acerca de la reparación que vas a llevar a cabo."></textarea>
                </div>
            
                <div id="imgIntro">
                <img src="../../Imagenes/preview.jpg" width="150px" height="120px" id="preview">
                <input id="imgPrincipal" type="file" accept="image/.jpeg, .jpg, .png" required onclick="previsualizar()">
                </div>
            
                <div id="nomDispositivo">
                    <label>Título</label> <br>
                    <textarea id="titManual" placeholder="Escribe aquí que dispositivo y que parte de este se va a reemplazar." required ></textarea>
                </div>
            
               <input type="submit" id="myButton" value="Siguiente">
               <input type="button" value="Atras" onclick="history.back()">
            </form>   
        </div>
    </main>



<!--SCRIPT PARA ALMACENAR LOS DATOS DE PLANTILLAS EN EL LOCALSTORAGE, NOS PERMITIRÁ QUE LUEGO SE VEA EN LA PREVISUALIZACIÓN DEL PDF -->
<script src="../../scripts/plantillas.js"></script>
</body>
</html>