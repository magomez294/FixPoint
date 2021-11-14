<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script defer src="../../../auth/adminAuth.js"></script> -->
    <title>Manuales</title>
</head>
<body>
    <head></head>
    <main>
        <nav>
            <ul>
                <li><a href="./pendingManuals.php">Manuales pendientes de validar</a></li>
                <li><a href=""></a>Manuales validados</li>
            </ul>
        </nav>
        <div>
            <ul id="validatedManuals">
                <?php
                    include("../../../API/database/db.php");
                    $db = new DB();
                    $result = $db->select("manual","*", "Aceptado = 1");
                    $direction = '../../../manuals/';
                    if($result){
                        while($row = mysqli_fetch_array($result)){
                            ?>
                            <li>
                                <h2>Título: <?php echo $row['NomMan'] ?></h2>
                                <p>Autor: <?php echo $row['Autor'] ?></p>
                                <a href="<?php echo $direction.$row['Documento'] ?>">Ver</a>                
                            </li>
                    <?php
                        }
                    }
                ?>
            </ul>
        </div>
    </main>
</body>
</html>