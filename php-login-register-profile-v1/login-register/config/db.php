<?php

if($locker = 1){
    
    // Databse Configuration 
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "test";

    // Tables 
    $tableAdmin = "php_users";

    // Directories 
    $domain = "http://localhost/projects/login-register/";
    $loginPage = "index.php";
    $registerPage = "register.php";
    $logoutPage = "logout.php";
    $dashboardPage = "home.php";


    // Create Database Connection 
    $con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Check Connection 
    if ($con->connect_error){
        die("Connection Failed: " . $con->connect_error);
    }

}


?>