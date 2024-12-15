<?php
include_once '../classes/db_handler.class.php';
include_once '../classes/cart.class.php';
include_once '../classes/cart.control.php';

$user = $_POST['user'];
print_r($user);

$control = new CartControl(null, null, $user, null, null);
$control->checkout();
