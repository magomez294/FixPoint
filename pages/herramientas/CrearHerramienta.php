<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


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
    <script src="../../auth/logout.js"></script>
    <title>Añadir Herramienta</title>
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
                <li><a href="./pages/createAccount.html">Crear Cuenta</a></li>
                <li><a href="./login.html">Iniciar Sesión</a></li>
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
            <li> <a href="../manuales/manualRegistrado.php">Manuales</a> </li>
            <li><a href="./Herramientas.php">Herramientas</a></li>
        </ul>
    </nav>
    <main>
        <form action="../../API/CRUD/createTool.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="name">Nombre:</label>
                <input type="text" name="name" placeholder="nombre" autofocus required >
                <label for="description">Descripción:</label>
                <textarea name="description" placeholder="descripción" autofocus rows="4" cols="50"></textarea>
                <label for="imagen">Imagen:</label>
                <input type="file" name="image" required >
            </div>
            <input type="submit" name="save_tool" value="Guardar">
        </form>
        <?php if(isset($_SESSION['message'])){ ?>
            <div style="background-color: <?= $_SESSION['color'] ?>;">
                <?= $_SESSION['message'] ?>
            </div>
        <?php unset($_SESSION['message']);} ?>
    </main>
</body>
</html>

