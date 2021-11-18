<?php require_once('../models/Manual.php') ?>
<?php
//comprueba si se ha submiteado el manual y si es asi lo crea
if (isset($_POST['save_manual'])) {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $pdf = $_FILES['pdf'];

    $manual = new Manual();
    $succes = $manual->create($title, $autor, $pdf);
    if($succes){
        header("Location: ../../pages/manuales/manualRegistrado.php");
    }
}

?>