<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/menu.css">
    <link rel="stylesheet" href="../../styles/manualRegistrado.css"> 
    <script src="../../scripts/menu.js"></script>
    <title>Manuales - FixPoint</title>
</head>

<body>
    <header>
        <a href="../../index.php"><img id="logo" src="../../Images/Logo.png" alt=""></a>
        <img id="logoMenu" src="../../Images/menu.png" alt="" onclick="showHideMenu('menu')">
        <nav id="menu" class="hide">
            <img src="../../Images/hideMenu.png" alt="" id="hideMenu" onclick="showHideMenu('menu')">
            <ul>
                <li> <a href="">Iniciar Sesión</a> </li>
                <li> <a href="">Manuales</a> </li>
                <li><a href="../herramientas/Herramientas.php">Herramientas</a></li>
                <li><a href="">Crear Cuenta</a></li>
            </ul>
        </nav>
        <nav id="menuWeb2">
            <ul>
                <li><a href="">Crear Cuenta</a></li>
                <li><a href="./login.html">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <nav id="menuWeb">
        <ul>
            <li> <a href="">Manuales</a> </li>
            <li><a href="./pages/herramientas/Herramientas.php">Herramientas</a></li>
        </ul>
    </nav>
    <main>
    <!--SLIDER-->
    <section id="slider">
        <img id="imgSlider" src="../../Images/sliderManuales.jpg" alt="">
        <p id="txtSlider">Manuales</p>
    </section>
    <section id="botones">
        <button onclick="window.location.href='../manualCreation/ficha.html'" id="btnNuevoManual">Nuevo manual</button>
        <button onclick="openForm()" id="btnSubirManual">Subir manual</button>
    </section>
    <section id="toolSearch">
        <input type="text" id="toolSearchInput" onkeyup="searchTool()" placeholder="Buscar herramienta..">
    </section>
    <section id="manuales">

    </section>
 

<div id="formSubManual">
  <form id="formContenedor">
    <button id="btnCerrar" onclick="closeForm()"><img src="../../Images/hideMenu.png" alt=""></button>
    <div id="pdfUpdate">
        <img id="imgPDF" src="../../Images/filePDF.png" id="preview">
        <input type="file" accept="application/pdf" required>
    </div>

    <label>Nombre y apellidos</label>
    <input type="text" placeholder="Introduce tu nombre y apellidos" required>

    <label>Titulo</label>
    <input type="text" placeholder="Introduce el titulo del manual" required>

    <button type="submit" id="btnGuardar">Guardar</button>

  </form>
</div>
</main>
<footer>
</footer>
<script>
function openForm() {
  document.getElementById("formSubManual").style.display = "block";
}
function closeForm() {
  document.getElementById("formSubManual").style.display = "none";
}
</script>
</body>
</html>
