<?php 

$db = mysqli_connect('localhost', 'root', '', 'crm_db');

$data1 = 'admin';
$data2 = 'admin123...';

$pwd_hash = password_hash($data2, PASSWORD_BCRYPT);

$stmt = "INSERT INTO `users_tbl`(`Username`, `Password`, `Role`) VALUES ('$data1','$pwd_hash','admin')";
$res = mysqli_query($db, $stmt);

header('location:./index.php');
