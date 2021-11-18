<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Crear una nueva guia</title>
    <link rel="stylesheet" href="../../styles/menuPlantilla.css" />
    <link rel="stylesheet" href="../../styles/menu.css" />
    <link rel="stylesheet" href="../../styles/pasos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
          <li><a href="ficha.php">Ficha</a></li>
          <li><a href="introduccion.php">Introducción</a></li>
          <li><a href="detalles.php">Detalles</a></li>
          <li><a href="#">Pasos guía</a></li>
        </ul>
      </div>
      <div id="main">
        <form
          id="formulario"
          action="../manualCreation/previsualizacion.php"
          onsubmit="guardarPasos()"
        >
          <div id="listaPasos">
            <div class="paso">
              <p>Paso 1</p>
              <div class="contenido">
                <div class="image">
                    <input
                    type="file"
                    value="Imagen"
                    class="imagen"
                    id="image1"
                    accept="image/.jpeg, .jpg, .png"
                    onclick="readURL(this)"
                    />
                    <img src="" width="150px" height="120px" id="preview1" />
                </div>
                <textarea name="" class="texto"></textarea>
                <input type="button" value="Eliminar paso" class="eliminar" />
              </div>
              <input type="button" class="desplegar" value="-" />
            </div>
            <!-- <div class="paso">
                    <p>Paso 2</p>
                    <div class="contenido">
                        <input type="file" Value="Imagen" class="imagen" id="image2" accept="image/.jpeg, .jpg, .png" onclick="readURL(this)">
                        <img src="" width="150px" height="120px" id="preview2">
                        <textarea name="" cols="30" rows="10" class="texto"></textarea>
                        <input type="button" value="Eliminar paso" class="eliminar">
                    </div>
                    <input type="button" class="desplegar" value="-">
                </div> -->
          </div>

          <input type="button" id="nuevo" value="Nuevo paso" /><br /><br />
          <input type="submit" id="myButton" value="Generar previsualización" />
        </form>
      </div>
    </main>

    <script src="../../scripts/plantillas.js"></script>
    <script src="../../scripts/pasos.js"></script>
  </body>
</html>
