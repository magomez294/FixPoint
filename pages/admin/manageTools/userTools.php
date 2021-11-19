<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script defer src="../../../auth/adminAuth.js"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="sweetalert2.all.min.js"></script>
    <script defer src="../../../scripts/requestedTools.js"></script>
    <script src="../../../auth/logout.js"></script>
    <link rel="stylesheet" href="../../../styles/menu.css">
    <link rel="stylesheet" href="../../../styles/pendingManuals.css">
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
        <?php if(isset($_SESSION['loged']) && $_SESSION['loged'] == true){ ?>
            <ul>
                <li><a href="">Crear Cuenta</a></li>
                <li><a href="">Iniciar Sesión</a></li>
            </ul>
        <?php } ?>
        <?php if(!isset($_SESSION['loged'])){ ?>
            <ul>
                <li><a onclick="logOut()">Cerrar sesión</a></li>
            </ul>
        <?php } ?>
        </nav>
    </header>
    <nav id="menuWeb">
        <ul>
            <li> <a href="">Manuales</a> </li>
            <li><a href="../../herramientas/Herramientas.php">Herramientas</a></li>
        </ul>
    </nav>
    <main>
        <nav>
            <ul>
                <li><a href="./pendingManuals.php">Peticiones de herramientas</a></li>
                <li><a href="">Herramientas en uso</a></li>
            </ul>
        </nav>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Herramienta</th>
                        <th>Donante</th>
                        <th>email</th>
                        <th>Fecha donación</th>
                        <th>Validar</th>
                        <th>Rechazar</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    include("../../../API/database/db.php");
                    $db = new DB();
                    $result = $db->select("herramienta", "*", "Validado = 0");
                    
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    
                    <?php $userid = $result['Donante'] ?>
                    <?php $user = $db->select("usuario", "*", "ID_Usuario = ".$userid) ?>
                        <tr>
                            <td><?php echo $row['NomHER'] ?></td>
                            <td><?php echo $user['Nombre'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $row['fechaSolicitud'] ?></td>
                            <td class="reject" onclick="validate(<?php $toolid ?>)"><img src="../../../Images/cancelar.png"></td>
                            <td class="reject" onclick="reject(<?php $toolid ?>)"><img src="../../../Images/cancelar.png"></td>
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