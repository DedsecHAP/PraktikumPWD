<?php 
    $address = "localhost";
    $username = "root";
    $Password = "";
    $DBName = "pwd_akademik";
    $con = mysqli_connect($address, $username, $Password, $DBName);

    if (!$con)
        die("Connection Failed: ". mysqli_connect_error());
?>