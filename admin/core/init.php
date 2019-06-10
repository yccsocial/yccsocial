<?php

//error_reporting(0);
//ini_set('display_errors', 0);

include 'database/connection.php';
include 'classes/function.php';

global $pdo;
$post   = new Post($pdo);
?>
