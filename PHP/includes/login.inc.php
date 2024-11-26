<?php 
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if($data != null) {
    include_once '../classes/db_handler.class.php';
    include_once '../classes/login.class.php';
    include_once '../classes/login.control.php';

    $user = $data['user'];
    $pwd = $data['pwd'];

    $control = new LoginControl($user, $pwd);
    $control->login();
}

