<?php

include("../database/db.php");

    if (isset($_POST['save_tool'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];

        $query = "INSERT INTO herramienta(NomHer, Descripcion) VALUES ('$name', '$description')";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            $_SESSION['message'] = 'Error al intentar guardar la herramienta';
            $_SESSION['color'] = 'red';
        }else{

            $_SESSION['message'] = 'Herramienta guardada';
            $_SESSION['color'] = 'green';

            header("Location: ../web/herramientas/CrearHerramienta.php");
        }
    }
?>