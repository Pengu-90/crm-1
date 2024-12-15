<?php 
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if($data != null) {
    include_once '../classes/db_handler.class.php';
    include_once '../classes/cart.class.php';
    include_once '../classes/cart.control.php';

    $id = $data['itemId'];

    $control = new CartControl(null, null, null, null, $id);
    $control->cancel();
}

