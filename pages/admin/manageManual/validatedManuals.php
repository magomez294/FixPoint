<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script defer src="../../../auth/adminAuth.js"></script> -->
    <link rel="stylesheet" href="../../../styles/menu.css">
    <link rel="stylesheet" href="../../../styles/pendingManuals.css">
    <script defer src="../../../auth/logout.js"></script>
    <title>Manuales</title>
</head>
<body>
<header>
    <img id="logo" src="../../../images/Logo.png" alt="">
        <img id="logoMenu" src="../../../images/menu.png" alt="" onclick="showHideMenu('menu')">
        <nav id="menu" class="hide">
            <img src="../../../images/hideMenu.png" alt="" id="hideMenu" onclick="showHideMenu('menu')">
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
                <li><a onclick="logOut()">Cerrar sesión</a></li>
            </ul>
        <?php } ?>
        </nav>
    </header>
    <nav id="menuWeb">
        <ul>
            <li> <a href="../../manuales/manualRegistrado.php"">Manuales</a> </li>
            <li><a href="../../herramientas/Herramientas.php">Herramientas</a></li>
        </ul>
    </nav>
    <main>
        <nav>
            <ul>
                <li><a href="./pendingManuals.php">Manuales pendientes de validar</a></li>
                <li><a href="">Manuales validados</a></li>
            </ul>
        </nav>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    include("../../../API/database/db.php");
                    $db = new DB();
                    $result = $db->select("manual", "*", "Aceptado = 1");
                    $direction = '../../../manuals/';
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                            $userId = $row['Autor'];
                        $user = $db->select("usuario", "*", "ID_USUARIO = ".$userId);
                        $user = mysqli_fetch_array($user);
                    ?>
                        <tr>
                            <td><a href="../../../manuals/<?php echo $row['NomMan'] ?>.pdf"><?php echo $row['NomMan'] ?></a></td>
                            <td><?php echo $user['Nombre']?></td>
                            <td><?php echo $row['Fecha'] ?></td>
                            <td class="reject"onclick="reject(<?php echo $row['ID_Manual'] ?>)"><img src="../../../Images/cancelar.png"></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>   
            </table>
        </div>
    </main>
    
</body>
</html>