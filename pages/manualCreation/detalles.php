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
    <link rel="stylesheet" href="../../styles/detalles.css" />
    <link rel="stylesheet" href="../../styles/menu.css" />
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
                    <li><a onclick="logOut()">Cerrar sesión</a></li>
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
                <li><a onclick="logOut()">Cerrar sesión</a></li>
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
        <form
          action="../manualCreation/pasos.php"
          onsubmit="guardarDetalles()"
        >
            <div id="tiempoEstimado">
                <label>Tiempo estimado</label>
                <input type="text" id="numOption" required />
                <select id="tiempOption" required>
                    <option></option>
                    <option>min.</option>
                    <option>h.</option>
                    <option>d.</option>
                </select>
            </div>
            <div id="dificultadEstimada">
                <label>Dificultad estimada</label>
                <select id="dificultad" required>
                    <option></option>
                    <option>Muy fácil</option>
                    <option>Fácil</option>
                    <option>Moderado</option>
                    <option>Difícil</option>
                    <option>Muy difícil</option>
                </select>
            </div>
            <div>
                <label>Herramientas</label><br />
                <textarea
                name=""
                id="herramientas"
                placeholder="Herramienta1&#10;Herramienta2&#10;Herramienta3"
                required
                ></textarea>
            </div>
          <input type="submit" id="myButton" value="Siguiente" />
          <input type="button" value="Atras" onclick="history.back()" />
        </form>
      </div>
    </main>
    <script src="../../scripts/plantillas.js"></script>
  </body>
</html>
