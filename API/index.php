<?php

require_once('autoload.php');

$page = $functions->getPage();

if (file_exists('pages'.$page.'.php')) {
    include('pages'.$page.'.php');
}else{
    http_response_code(400);
}

echo 'HELLO';

?>