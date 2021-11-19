<?php require_once('../models/Manual.php') ?>
<?php

header('Acces-Control-Allow-Origin: *');
header('Acces-Control-Allow-Methods: PUT');
header('Acces-Control-Allow-Headers: *');
header('Content-type: application/json; charset=UTF-8');

$data = json_decode(file_get_contents('php://input'));

$id = '';

if(isset($data)){
    $id = $data->id;
}

http_response_code(200);
if($id){
    $manual = new Manual();
    $validated = $manual->validate($id);
    echo $validated;
}

?>