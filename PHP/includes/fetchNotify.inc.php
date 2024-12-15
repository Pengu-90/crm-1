<?php
$json = file_get_contents('php://input');
$data = json_decode($json, true);

include_once '../../PHP/classes/db_handler.class.php';
include_once '../../PHP/classes/notification.class.php';

$id = $data['user'];
$control = new Fetch();
$control->fetchNotify($id);
