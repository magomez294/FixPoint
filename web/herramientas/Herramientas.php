<?php include("../../database/db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/Herramientas.css">
    <script defer src="../../auth/auth.js"></script>
    <title>Document</title>
</head>

<body>
    <header><h2>KSJDVHBKJDHBVKJBDKJHBKJ</h2></header>
    <nav>Inicio ........................................................................................................................................................................................................</nav>
    <aside>buscador</br>
        tipo
    </aside>
    <div id=contenedor>
        <?php
            $query = "SELECT * FROM herramienta";
            $result = mysqli_query($connection, $query);
            if ($result) {
                $direction="local/";
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class=a1>
                        <img src="<?php echo $direction.$row['Imagen'] ?>" width="100" height="100" >
                    </div>
                    <?php
                }
            }
        ?>
        
         
    </div> 
</body>
</html>