<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "akademik";

    $con = mysqli_connect($host, $username, $password, $databaseName);

    if (!$con) {
        echo "Error: ". mysqli_connect_error();
        exit();
    }
?>