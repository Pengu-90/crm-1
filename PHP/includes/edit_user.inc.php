<?php
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if ($data != null) {
    include_once '../classes/db_handler.class.php';
    include_once '../classes/edit.class.php';
    include_once '../classes/edit.control.php';

    $lastname = $data['lastname'];
    $firstname = $data['firstname'];
    $address = $data['address'];
    $city = $data['city'];
    $province = $data['province'];
    $zip = $data['zip'];
    $country = $data['country'];
    $contact = $data['contact'];
    $email = $data['email'];
    $username = $data['username'];
    $password = $data['password'];
    $id = $data['id'];

    $controller = new EditController($lastname, $firstname, $username, $password, $email, $address, $city, $province, $zip, $country, $contact, $id);
    $controller->editUser();
}
