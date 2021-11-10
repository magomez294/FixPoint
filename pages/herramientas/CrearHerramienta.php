<?php include("../../API/database/db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/menu.css">
    <link rel="stylesheet" href="../../styles/crearHerramienta.css">
    <script defer src="../../auth/auth.js"></script>
    <script defer src="../../scripts/menu.js"></script>
    <title>Añadir Herramienta</title>
</head>
<body>
    <header>
        <img id="logo" src="../../images/Logo.png" alt="">
        <img id="logoMenu" src="../../images/menu.png" alt="" onclick="showHideMenu('menu')">
        <nav id="menu" class="hide">
            <img src="../../images/hideMenu.png" alt="" id="hideMenu" onclick="showHideMenu('menu')">
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
        <form action="../../API/CRUD/create.php" method="POST">
            <div>
                <label for="name">Nombre:</label>
                <input type="text" name="name" placeholder="nombre" autofocus required >
                <label for="description">Descripción:</label>
                <textarea name="description" placeholder="descripción" autofocus rows="4" cols="50"></textarea>
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" required >
            </div>
            
            
            <input type="submit" name="save_tool" value="Guardar">
        </form>
        <?php if(isset($_SESSION['message'])){ ?>
            <div style="background-color: <?= $_SESSION['color'] ?>;">
                <?= $_SESSION['message'] ?>
            </div>
        <?php session_unset();} ?>
    </main>
</body>
</html>

