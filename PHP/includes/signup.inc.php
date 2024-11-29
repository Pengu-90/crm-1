<?php
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if ($data != null) {
    include_once '../classes/db_handler.class.php';
    include_once '../classes/signup.class.php';
    include_once '../classes/signup.control.php';

    $lastname = $data['lastname'];
    $firstname = $data['firstname'];
    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];
    $address = $data['address'];

    $controller = new SignupController($lastname, $firstname, $username, $password, $email, $address);
    $controller->signup();
}
