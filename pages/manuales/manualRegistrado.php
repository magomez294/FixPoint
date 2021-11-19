<!--PARA QUE NOS PIDA SIEMPRE LOGUEARNOS-->
<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/menu.css">
    <link rel="stylesheet" href="../../styles/manualRegistrado.css"> 
    <script src="../../scripts/menu.js"></script>
    <script defer src="../../auth/auth.js"></script>
    <script src="../../auth/logout.js"></script>
    <script src="../../scripts/manualRegistrado.js"></script>
    <title>Manuales - FixPoint</title>
</head>
<body>
<!--CABECERA-->
<header>
        <a href="../../index.php"><img id="logo" src="../../Images/Logo.png" alt=""></a>
        <a href="../../index.php"><img id="logoMenu" src="../../Images/menu.png" alt="" onclick="showHideMenu('menu')"></a>
        <nav id="menu" class="hide">
            <img src="../../Images/hideMenu.png" alt="" id="hideMenu" onclick="showHideMenu('menu')">
            <ul>
                <li> <a href="">Iniciar Sesión</a> </li>
                <li> <a href="">Manuales</a> </li>
                <li><a href="../herramientas/Herramientas.php">Herramientas</a></li>
                <li><a href="">Crear Cuenta</a></li>
            </ul>
        </nav>
        <!--BOTONES LOGIN-->
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
<!--MENU NAVEGACION-->
<nav id="menuWeb">
        <ul>
            <li> <a href="">Manuales</a> </li>
            <li><a href="../herramientas/Herramientas.php">Herramientas</a></li>
        </ul>
</nav>
<main>
<!--SLIDER-->
<section id="slider">
        <img id="imgSlider" src="../../Images/sliderManuales.jpg" alt="">
        <p id="txtSlider">Manuales</p>
</section>

<!--BOTONES MENU MANUALES-->
<section id="botones">
    <button onclick="window.location.href='../manualCreation/ficha.php'" id="btnNuevoManual">Crear manual</button>
    <button onclick="openForm()" id="btnSubirManual">Subir manual</button>
</section>

<!--BARRA DE BUSQUEDA-->
<section id="manualSearch">
    <input type="text" id="manualSearchInput" onkeyup="searchManual()" placeholder="Buscar herramienta..">
</section>

<!--CONTENEDOR MANUALES-->
<section id="manuales">
        <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                    </tr>
                </thead> 
                <tbody id="manuals">
                    <?php
                    include("../../API/database/db.php");
                    $db = new DB();
                    $result = $db->select("manual", "*", "Aceptado = 1");
                    $direction = '../../../manuals/';
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                            $userId = $row['Autor'];
                            $user = $db->select("usuario", "*", "ID_USUARIO = ".$userId);
                            $user = mysqli_fetch_array($user);
                    ?>
                        <tr id="manual">
                            <td id="name"><a href="../../../manuals/<?php echo $row['NomMan'] ?>.pdf"><?php echo $row['NomMan'] ?></a></td>
                            <td><?php echo $user['Nombre'] ?></td>
                            <td><?php echo $row['Fecha'] ?></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>                  
            </table>
    </section>
 <!--DESPLEGABLE SUBIR MANUAL-->
 <div id="formSubManual">
        <form id="formContenedor" action="../../API/CRUD/createManual.php" method="POST" enctype="multipart/form-data">
            <button id="btnCerrar" onclick="closeForm()"><img src="../../Images/hideMenu.png" alt=""></button>
            <div id="pdfUpdate">
                <img id="imgPDF" src="../../Images/filePDF.png" id="preview">
                <input type="file" name="file" accept="application/pdf" required>
            </div>

            <label for="title">Titulo</label>
            <input type="text" name="title" placeholder="Introduce el titulo del manual" required>

            <button type="submit" name="save_manual" id="btnGuardar">Guardar</button>
        </form>
        <?php if(isset($_SESSION['message'])){ ?>
                    <div style="background-color: <?= $_SESSION['color'] ?>;">
                        <?= $_SESSION['message'] ?>
                    </div>
            <?php unset($_SESSION['message']);} ?>
        </div>
<main>
<!--FOOTER-->
<footer id="piePagina">
    
</footer>
<!--SCRIPT DESPLEGABLE SUBIR MANUAL-->
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