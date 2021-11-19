<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/previsualizacion.css">
  <link rel="stylesheet" href="../../styles/menu.css" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script defer src="../../auth/logout.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <script defer src="../../scripts/previsualizacion.js"></script>
  <script src="../../API/auth/auth.js"></script>
  <title>Crear una nueva guia</title>
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
<div id="getPDF">
        <p>Si está todo correcto pulse el botón <i>Generar PDF</i>, por el contrario pulse <i>Volver atrás</i> si desea cambiar algún dato.</p>
        <button onclick="saveManual()">Generar pdf</button>
        <button onclick="history.back()">Volver atrás</button>
</div>
<div id="contenedor">


    <div id="titFec">
        <p id="titulo">Nombre reparacion</p>
        <p id="fecCreacion">Fecha creacion</p>
    </div>


    <div id="contPersonales">
        <p>Datos personales</p>
        <table id="tablaDatos">
            <tbody>
                <tr>
                    <td>Nombre</td>
                    <td colspan="3"><label id="datosPersona">Datos Nombre</label></td>
                </tr>
                <tr>
                    <td>Estudios realizados</td>
                    <td colspan="3"><label id="datosEstudios">Datos Estudios</label></td>
                </tr>
                <tr>
                    <td>Ciudad</td>
                    <td colspan="3"><label id="datosLugar">Datos Ciudad</label></td>
                </tr>
                <tr>
                    <td>Teléfono</td>
                    <td><label id="datosTelf">Datos telefono</label></td>
                    <td>Edad</td>
                    <td><label id="datosEdad">Datos edad</label></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td colspan="3"><label id="datosEmail">Datos email</label></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="contIntro">
        <p id="resumenIntro">Introduccion</p>
        <img src="" width="150px" height="120px" id="imgTitulo">
    <div>
        <p id="dificultad">Dificultad</p>
    </div>
       
        <div id="tempo">
            <p id="numHoras">Numero</p>
            <p id="detalleTiempo">Dias,Semanas</p>
        </div>

        <div>
            <p>Herramientas</p>
            <p id="herramientas">Texto a modificar</p>
        </div>

    </div>


    
    <div id="pasos">
        <p>Pasos a seguir</p>
        <div>
        <img src="" alt="">
        </div>
        <p>Texto</p>
    </div>
    
    
</div>

</body>
</html>