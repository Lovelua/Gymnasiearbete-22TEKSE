<?php 
$locker = 1;
include_once('config/db.php');
if (!isset($_SESSION['id'])) { session_start(); }
session_unset(); 
session_destroy();
header("Location:$loginPage")
?>