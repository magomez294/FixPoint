<?php require_once('../models/Tool.php') ?>
<?php

header('Acces-Control-Allow-Origin: *');
header('Acces-Control-Allow-Methods: PUT');
header('Acces-Control-Allow-Headers: *');
header('Content-type: application/json; charset=UTF-8');

$data = json_decode(file_get_contents('php://input'));

$id = '';

if(isset($data)){
    $idTool = $data->idTool;
    $idUser = $data->idUser;
}

http_response_code(200);
if($id){
    $tool = new Tool('','','');
    $requested = $tool->request($idTool, $idUser);
    echo $requested;
}

?>