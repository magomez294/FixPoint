<?php require './users.php' ?>
<?php

header('Acces-Control-Allow-Origin: *');
header('Acces-Control-Allow-Methods: POST');
header('Acces-Control-Allow-Headers: *');
header('Content-type: application/json; charset=UTF-8');

$data = json_decode(file_get_contents('php://input'));

$username = '';
$password = '';

if(isset($data)){
    $username = $data -> username;
    $password = $data -> password;
}

http_response_code(200);
/* if($username && $password){
    $json = echo 
} */

?>