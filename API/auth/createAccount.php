<?php require_once('./user.php') ?>
<?php

header('Acces-Control-Allow-Origin: *');
header('Acces-Control-Allow-Methods: POST');
header('Acces-Control-Allow-Headers: *');
header('Content-type: application/json; charset=UTF-8');

$data = json_decode(file_get_contents('php://input'));

$username = '';
$email = '';
$password = '';

if(isset($data)){
    $username = $data -> username;
    $email = $data -> email;
    $password = $data -> password;
}
//si está toda la informacion necesaria crea la cuenta
http_response_code(200);
if ($username && $email && $password) {
    $user = new User();
    $json = $user->createAccount($username, $email, $password);

    if($json){
        echo $json;
    }else{
        http_response_code(400);
        echo json_encode([
            'error'=>true,
            'message'=>'Error al intentar crear la cuenta.'
        ]);
    }
}else{
    echo json_encode([
        'error'=>true,
        'message'=>'Falta información'
    ]);
}

?>