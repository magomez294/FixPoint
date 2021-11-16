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
        $success = $tool->createTool();
        if ($success) {
            header("Location: ../../pages/herramientas/CrearHerramienta.php");
        }
        
    }
?>