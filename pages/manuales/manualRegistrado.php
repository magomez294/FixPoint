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
        <?php if(!isset($_SESSION['loged'])){ ?>
            <ul>
                <li><a href="../createAccount.html">Crear Cuenta</a></li>
                <li><a href="../../login.html">Iniciar Sesión</a></li>
            </ul>
        <?php } ?>
        <?php if(isset($_SESSION['loged'])){ ?>
            <ul>
                <li><button onclick="logOut()">Cerrar sesión</button></li>
            </ul>
        <?php } ?>
        </nav>
    </header>
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
    <section id="botones">
        <button onclick="window.location.href='../manualCreation/ficha.php'" id="btnNuevoManual">Crear manual</button>
        <button onclick="openForm()" id="btnSubirManual">Subir manual</button>
    </section>
    <section id="toolSearch">
        <input type="text" id="toolSearchInput" onkeyup="searchTool()" placeholder="Buscar herramienta..">
    </section>
    <section id="manuales">
        <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    include("../../API/database/db.php");
                    $db = new DB();
                    $result = $db->select("manual", "*", "Aceptado = 1");
                    $direction = '../../../manuals/';
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><a href="../../../manuals/<?php echo $row['NomMan'] ?>.pdf"><?php echo $row['NomMan'] ?></a></td>
                            <td><?php echo $row['Autor'] ?></td>
                            <td><?php echo $row['Fecha'] ?></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>                  
            </table>
    </section>
 

<div id="formSubManual">
  <form id="formContenedor" action="../../API/CRUD/createManual.php" method="POST">
    <button id="btnCerrar" onclick="closeForm()"><img src="../../Images/hideMenu.png" alt=""></button>
    <div id="pdfUpdate">
        <img id="imgPDF" src="../../Images/filePDF.png" id="preview">
        <input type="file" name="pdf" accept="application/pdf" required>
    </div>

    <label for="name">Nombre y apellidos</label>
    <input type="text" name="name" placeholder="Introduce tu nombre y apellidos" required>

    <label for="title">Titulo</label>
    <input type="text" name="title" placeholder="Introduce el titulo del manual" required>

    <button type="submit" name="save_manual" id="btnGuardar">Guardar</button>
    <?php if(isset($_SESSION['message'])){ ?>
            <div style="background-color: <?= $_SESSION['color'] ?>;">
                <?= $_SESSION['message'] ?>
            </div>
    <?php unset($_SESSION['message']);} ?>
  </form>
</div>
</main>
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
