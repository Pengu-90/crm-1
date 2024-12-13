<?php
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if ($data != null) {
    include_once '../classes/db_handler.class.php';
    include_once '../classes/task.class.php';
    include_once '../classes/task.control.php';

    $orderId = $data['orderId'];

    $controller = new TaskControl(null, null, null, $orderId);
    $controller->ship();
}
