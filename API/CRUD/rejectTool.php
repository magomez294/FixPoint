<?php require_once('../models/Tool.php') ?>
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
    $tool = new Tool('','','');
    $rejected = $tool->reject($id);
    echo $rejected;
}

?>