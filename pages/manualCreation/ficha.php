<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crear una nueva guia</title>
  <link rel="stylesheet" href="../../styles/menuPlantilla.css">
  <link rel="stylesheet" href="../../styles/ficha.css">
  <link rel="stylesheet" href="../../styles/menu.css">
  <script defer src="../../scripts/menu.js"></script>
  <script defer src="../../auth/logout.js"></script>
  <script src="../../API/auth/auth.js"></script>
</head>
<body>
    <header>
        <img id="logo" src="../../images/Logo.png" alt="">
        <img id="logoMenu" src="../../images/menu.png" alt="" onclick="showHideMenu('menu')">
        <nav id="menu" class="hide">
            <img src="../../images/hideMenu.png" alt="" id="hideMenu" onclick="showHideMenu('menu')">
            <ul>
                <?php if(isset($_SESSION['loged']) && $_SESSION['loged'] == true){ ?>
                    <li><a href="">Iniciar Sesión</a></li>
                    <li><a href="">Crear Cuenta</a></li>
                <?php } ?>
                    <li> <a href="">Manuales</a> </li>
                    <li><a href="./pages/herramientas/Herramientas.php">Herramientas</a></li>
                <?php if(!isset($_SESSION['loged'])){ ?>
                    <li><button onclick="logOut()">Cerrar sesión</button></li>
                <?php } ?>
            </ul>
        </nav>
        <nav id="menuWeb2">
        <?php if(!isset($_SESSION['loged'])){ ?>
            <ul>
                <li><a href="../createAccount.html">Crear Cuenta</a></li>
                <li><a href="../../login.html">Iniciar Sesión</a></li>
            </ul>
        <?php } ?>
        <?php if(isset($_SESSION['loged'])){ ?>
            <ul>
                <li><button onclick="logOut()">Cerrar sesión</button></li>
            </ul>
        <?php } ?>
        </nav>
    </header>
    <nav id="menuWeb">
        <ul>
            <li> <a href="">Manuales</a> </li>
            <li><a href="./pages/herramientas/Herramientas.php">Herramientas</a></li>
        </ul>
    </nav>
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
        
        <form action="../manualCreation/introduccion.php" onsubmit="guardar()">
            
            <div id="fecha">
                <label>Fecha</label>
                <input type="date" id="fecManual">
            </div>
            
            <div id="nombre">
                <label>Nombre</label>
                <input type="text" id="nomPersona" required>
            </div>
           
            <div id="estudios">
                <label>Estudios que realiza</label>
                <input type="text" id="estudioActual" required>
            </div>
            
            <div id="ciudad">
                <label>Ciudad</label>
                <input type="text" required id="lugar">
            </div>
            
            <div id="telf">
                <label>Teléfono</label>
                <input type="tel" id="numTelf" required pattern="[0-9]{9}">
            </div>
            
            <div id="edad">
                <label>Edad</label>
                <input type="text" id="ages" required>
            </div>
            
            <div id="email">
                <label>Correo electrónico</label>
                <input type="email" id="corElectronico" required>
            </div>
            <div id="btn">
                <input type="submit" id="myButton" value="Siguiente">
            </div>
            </form>
        
         </div>
    </main>

 <script src="../../scripts/plantillas.js"></script>
 <script>
    document.getElementById("fecManual").valueAsDate = new Date();
 </script>
</body>
</html>