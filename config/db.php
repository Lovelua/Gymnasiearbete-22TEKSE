<?php
if($locker = 1){
    
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "test";
 
    $tableAdmin = "php_users";

    // $domain = "http://localhost/projects/login-register/";
    $loginPage = "index.php";
    $registerPage = "register.php";
    $logoutPage = "logout.php";
    $dashboardPage = "main.php";

    $con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($con->connect_error){
        die("Connection Failed: " . $con->connect_error);
    }
}
?>