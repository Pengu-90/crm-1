<?php 
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if($data != null) {
    include_once '../classes/db_handler.class.php';
    include_once '../classes/cart.class.php';
    include_once '../classes/cart.control.php';

    $user = $data['user'];
    $qty = $data['qty'];
    $item = $data['item'];
    $amount = $data['amount'];

    $control = new CartControl($qty, $item, $user, $amount);
    $control->add();
}

