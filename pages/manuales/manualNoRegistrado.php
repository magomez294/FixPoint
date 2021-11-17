<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/menu.css">
    <link rel="stylesheet" href="../../styles/manualNoRegistrado.css"> 
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
    <section id="toolSearch">
        <input type="text" id="toolSearchInput" onkeyup="searchTool()" placeholder="Buscar herramienta..">
    </section>
    <section id="manuales">

    </section>
</main>
<footer>
</footer>
</body>
</html>
