<?php 
include_once '../../PHP/classes/db_handler.class.php';
include_once '../../PHP/classes/fetch.class.php';

$control = new Fetch();

if (isset($_GET['role'])) {
    if (!isset($_GET['view'])) {
        $control->fetchProcessTotal($user);
    } else {
        $control->fetchProcessTotalAll();

    }
} else {
    $control->fetchProcessTotalAll();

}

