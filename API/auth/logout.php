<?php



header('Acces-Control-Allow-Origin: *');
header('Acces-Control-Allow-Methods: POST');
header('Acces-Control-Allow-Headers: *');
header('Content-type: application/json; charset=UTF-8');

session_start();
unset($_SESSION['loged']);

?>

