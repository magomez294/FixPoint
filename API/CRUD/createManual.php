<?php require_once('../models/Manual.php') ?>
<?php 
    session_start();
?>
<?php
//comprueba si se ha submiteado el manual y si es asi lo crea
if (isset($_POST['save_manual'])) {
    $title = $_POST['title'];
    $pdf = $_FILES['file'];

    $manual = new Manual();
    $succes = $manual->create($title,$pdf);
    if($succes){
        header("Location: ../../pages/manuales/manualRegistrado.php");
    }
}

?>