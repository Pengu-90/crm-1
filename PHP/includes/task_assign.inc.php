<?php
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if ($data != null) {
    include_once '../classes/db_handler.class.php';
    include_once '../classes/task.class.php';
    include_once '../classes/task.control.php';

    $adminId = $data['admin'];
    $TaskName = $data['task'];
    $cartId = $data['cartId'];
    $orderId = $data['orderId'];

    $controller = new TaskControl($adminId, $TaskName, $cartId, $orderId);
    $controller->assign();
}
