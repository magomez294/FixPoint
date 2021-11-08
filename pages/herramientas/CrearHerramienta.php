<?php include("../../database/db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/menu.css">
    <link rel="stylesheet" href="../../styles/crearHerramienta.css">
    <title>Añadir Herramienta</title>
</head>
<body>
    <header>
        <img id="logo" src="../../Imagenes/Logo.png" alt="">
        <img id="logoMenu" src="../../Imagenes/menu.png" alt="" onclick="showHideMenu('menu')">
        <nav id="menu" class="hide">
            <img src="../../Imagenes/hideMenu.png" alt="" id="hideMenu" onclick="showHideMenu('menu')">
            <ul>
                <li> <a href="">Iniciar Sesión</a> </li>
                <li> <a href="">Manuales</a> </li>
                <li><a href="">Herramientas</a></li>
                <li><a href="">Crear Cuenta</a></li>
            </ul>
        </nav>
        <nav id="menuWeb2">
            <ul>
                <li><a href="">Crear Cuenta</a></li>
                <li><a href="">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="../../CRUD/create_tool.php" method="POST">
            <div>
                <label for="types">Nombre:</label>
                <input type="text" name="name" placeholder="nombre" autofocus>
                <label for="types">Descripción:</label>
                <textarea name="description" placeholder="descripción" autofocus rows="4" cols="50"></textarea>
            </div>
            
            
            <input type="submit" name="save_tool" value="Guardar">
        </form>
        <?php if(isset($_SESSION['message'])){ ?>
            <div style="background-color: <?= $_SESSION['color'] ?>;">
                <?= $_SESSION['message'] ?>
            </div>
        <?php session_unset();} ?>
    </main>

    <script src="../../scripts/menu.js"></script>
</body>
</html>
