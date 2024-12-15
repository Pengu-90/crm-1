<?php
include_once '../../PHP/classes/db_handler.class.php';
include_once '../../PHP/classes/notification.class.php';

$control = new Fetch();
$control->updateNotify($id);
