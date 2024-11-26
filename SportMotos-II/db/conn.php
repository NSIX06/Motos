<?php

    $dbHost     = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName     = "motos";

    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);

    $link = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($link->connect_error) {
        die("Connection failed: " . $db->connect_error);
    
}

?>