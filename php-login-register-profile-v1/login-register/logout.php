<?php 
// Include Database Connection 
$locker = 1;
include_once('config/db.php');


if (!isset($_SESSION['id'])) { session_start(); }
// To logout we destory the sessions 
session_unset(); 
session_destroy();

header("Location:$loginPage")
?>