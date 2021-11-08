<?php

require_once('../models/Tool.php');

    if (isset($_POST['save_tool'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];

        $tool = new Tool($name, $description);
        $result = $tool->insert('herramientas', ['NomHer'=>$name, 'Descripcion'=>$description]);

        /* $query = "INSERT INTO herramienta(NomHer, Descripcion) VALUES ('$name', '$description')";
        $result = mysqli_query($connection, $query); */
        if (!$result) {
            $_SESSION['message'] = 'Error al intentar guardar la herramienta';
            $_SESSION['color'] = 'red';
        }else{

            $_SESSION['message'] = 'Herramienta guardada';
            $_SESSION['color'] = 'green';

            header("Location: ../pages/herramientas/CrearHerramienta.php");
        }
    }
?>