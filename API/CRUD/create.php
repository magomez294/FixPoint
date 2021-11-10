<?php

require_once('../models/Tool.php');

    if (isset($_POST['save_tool']) && isset($_FILES['imagen'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_FILES['imagen'];

        $tool = new Tool($name, $description, $image);
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