<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Herramientas.css">
    <title>Document</title>
</head>

<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dwes";
    try {
        $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexion realizada";
        $stmt = $conexion->query('SELECT * from familia');
        $resultados=$stmt->fetchAll();  
        $nombre=$_REQUEST["nombre"];
    } catch (PDOException $e) {
        echo "La conexion falló: " . $e->getMessage();
    }
    ?>
    
    <header><h2>KSJDVHBKJDHBVKJBDKJHBKJ</h2></header>
    <nav>Inicio ........................................................................................................................................................................................................</nav>
    <aside>buscador</br>
        tipo
    </aside>
    <div id=contenedor>
        <?php
        foreach ($resultados as $value) {
            ?>
            <div class=a1><?php echo $value['nombre'] ?></div>
            <?php
        }
        ?>
    </div> 
</body>
</html>