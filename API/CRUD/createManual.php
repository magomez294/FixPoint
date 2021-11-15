<?php require_once('../models/Manual.php') ?>
<?php

header('Acces-Control-Allow-Origin: *');
header('Acces-Control-Allow-Methods: PUT');
header('Acces-Control-Allow-Headers: *');
header('Content-type: application/pdf; charset=UTF-8');
/* echo 'entra';
 $data = json_decode(file_get_contents('php://input')); */
/*
$title = '';
$autor = '';
$pdf = '';

if(isset($data)){
    $title = $data->title;
    $autor = $data->autor;
    $pdf = $_FILES['pdf']['tmp_name'];
}

http_response_code(200);
if($title && $autor && $pdf){
    $manual = new Manual();
    $result = $manual->create($title, $autor, $pdf);
    echo $result;
}else{
    echo false;
} */
$pdfDirectory = $_SERVER['DOCUMENT_ROOT'].'/manuals/'; 
$pdfName = "3.pdf";

move_uploaded_file($_PUT['file']['tmp_name'], $pdfDirectory.$pdfName);

?>