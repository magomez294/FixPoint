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
                <li><a href="">Peticiones de herramientas</a></li>
                <li><a href="./toolsInUse.php">Herramientas en uso</a></li>
            </ul>
        </nav>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Herramienta</th>
                        <th>Arrendatario</th>
                        <th>email</th>
                        <th>Fecha petición</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    include("../../../API/database/db.php");
                    $db = new DB();
                    $result = $db->select("herramienta", "*", "Solicitado = 1 AND Disponible = 1 AND Validado = 1");
                    
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <?php $toolid = $row['ID_Herramienta'] ?>
                    <?php $rent =  $db->select("alquila", "*", "ID_Herramienta = ".$toolid);
                            $rent = mysqli_fetch_array($rent);
                    ?>
                    
                    <?php $userid = $rent['ID_Usuario'] ?>
                    <?php $user = $db->select("usuario", "*", "ID_Usuario = ".$userid);
                            $user = mysqli_fetch_array($user);
                    ?>
                        <tr>
                            <td><?php echo $row['NomHer'] ?></td>
                            <td><?php echo $user['Nombre'] ?></td>
                            <td><?php echo $user['Email'] ?></td>
                            <td><?php echo $rent['FechaSolicitud'] ?></td>
                            <td class="validate" onclick="rent(<?php $toolid ?>)"><img src="../../../Images/cheque.png"></td>
                            <td class="reject"onclick="notRent(<?php $toolid ?>)"><img src="../../../Images/cancelar.png"></td>
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