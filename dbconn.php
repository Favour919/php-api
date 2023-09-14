<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbName = "phpapi";

    $conn = mysqli_connect($host, $username, $password, $dbName);

    if(!$conn){


        die("Connection Failed: ". mysqli_connect_error());
    }

?>
