<?php 
include_once '../../PHP/classes/db_handler.class.php';
include_once '../../PHP/classes/fetch.class.php';

$id = $_GET['user'];
$control = new Fetch();
$control->fetchUserOrder($id);