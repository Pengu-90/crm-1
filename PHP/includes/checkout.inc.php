<?php 
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if($data != null) {
    include_once '../classes/db_handler.class.php';
    include_once '../classes/cart.class.php';
    include_once '../classes/cart.control.php';

    $user = $data['user'];

    $control = new CartControl(null, null, $user, null, null);
    $control->checkout();
}

