<?php 
    $koneksi = mysqli_connect("localhost", "root", "", "pwd_kegiatan4");

    if (!$koneksi) {
        echo "Error: ". mysqli_connect_error();
        exit();
    }
    
?>