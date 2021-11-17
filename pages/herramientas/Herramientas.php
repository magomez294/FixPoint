
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/menu.css">
    <link rel="stylesheet" href="../../styles/indexHerramientas.css">
    <script defer src="sweetalert2.all.min.js"></script>
    <script defer src="../../scripts/menu.js"></script>
    <script defer src="../../auth/auth.js"></script>
    <script defer src="../../scripts/tools.js"></script>
    <script src="../../auth/logout.js"></script>
    <title>Document</title>
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
                    <li><button onclick="logOut()">Cerrar sesión</button></li>
                <?php } ?>
            </ul>
        </nav>
        <nav id="menuWeb2">
            <ul>
                <li><button onclick="logOut()">Cerrar sesión</button></li>
            </ul>
        </nav>
    </header>
    <nav id="menuWeb">
        <ul>
            <li> <a href="">Manuales</a> </li>
            <li><a href="../../pages/herramientas/Herramientas.php">Herramientas</a></li>
        </ul>
    </nav>
    <nav id="toolsNab">
        <ul>
            <li><a href="">Herramientas</a></li>
            <li><a href="./CrearHerramienta.php">Donar</a></li>
        </ul>
    </nav>
    
    <nav id="toolSearch">
        <input type="text" id="toolSearchInput" onkeyup="searchTool()" placeholder="Buscar herramienta..">
    </nav>
    <ul id="tools">
    <?php
            include("../../API/database/db.php");
            $db = new DB();
            $result = $db->select("herramienta","*", "Validado = 1");
            $direction = '../../Images/Tools/';
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <li>
                        <h2><?php echo $row['NomHer'] ?></h2>
                        <p><?php 
                            if($row['Descripcion']) echo $row['Descripcion'] 
                        ?></p>
                        <div>
                            <img src="<?php echo $direction.$row['Imagen'] ?>" width="100" height="100" >
                        </div>
                        <div>
                            <p 
                                class="<?php 
                                    if($row['Solicitado'] == 0 && $row['Disponible'] == 1 ){
                                        echo 'available';
                                    }else{
                                        echo 'unavailable';
                                    } ?>">
                                    <?php 
                                    if($row['Solicitado'] == 0 && $row['Disponible'] == 1 ){
                                        echo 'Disponible';
                                    }else{
                                        echo 'No disponible';
                                    } ?>
                            </p>
                            <?php if ($row['Solicitado'] == 0 && $row['Disponible'] == 1 ) { ?>
                                <button onclick="request(<?php echo $row['ID_Herramienta'] ?>)">Solicitar</button>
                            <?php } ?>
                        </div>
                        
                    </li>
                    <?php
                }
            }
        ?>
        
    </ul>
    <div id=contenedor>
        
         
    </div> 
</body>
</html>