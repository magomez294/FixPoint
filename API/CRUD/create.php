<?php

require_once('../models/Tool.php');

    if (isset($_POST['save_tool']) && isset($_FILES['image'])) {
        /* echo 'entra'; */
        $name = $_POST['name'];
        $description='';
        if (isset($_POST['description'])) {
            $description = $_POST['description'];
        }
        $image = $_FILES['image'];

        $tool = new Tool($name, $description, $image);
        $success = $tool->uploadImage();
        if ($success) {
            header("Location: ../../pages/herramientas/CrearHerramienta.php");
        }
        /* if (!$success) {
            header("Location: ../../pages/herramientas/CrearHerramienta.php");
        } */
        
        

        /* $query = "INSERT INTO herramienta(NomHer, Descripcion) VALUES ('$name', '$description')";
        $result = mysqli_query($connection, $query); */
        /* if (!$result) {
            $_SESSION['message'] = 'Error al intentar guardar la herramienta';
            $_SESSION['color'] = 'red';
        }else{

            $_SESSION['message'] = 'Herramienta guardada';
            $_SESSION['color'] = 'green';

            header("Location: ../pages/herramientas/CrearHerramienta.php");
        } */
    }
?>