<?php require_once('../models/Manual.php') ?>
<?php

header('Acces-Control-Allow-Origin: *');
header('Acces-Control-Allow-Methods: POST');
header('Acces-Control-Allow-Headers: *');
/* header('Content-type: application/json; charset=UTF-8'); */

$data = json_decode(file_get_contents('php://input'));

$title = '';
$autor = '';
$pdf = '';

if(isset($data)){
    $title = $data->title;
    $autor = $data->autor;
    $pdf = $data->pdf;
}

http_response_code(200);
if($title && $autor && $pdf){
    $manual = new Manual();
    $result = $manual->create($title, $autor, $pdf);
    echo $result;
}

?>