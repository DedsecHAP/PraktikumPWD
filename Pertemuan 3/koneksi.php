<?php
    $host = "localhost"; // Inisialisasi alamat MYSQL, bisa dgn IP 
    $username = "root";  // Inisiaslisai username untuk login database mysql
    $password = "";      // Inisialisasi password untuk login database mysql
    $databaseName = "akademik"; // Inisialisasi nama DB yg dituju pada mysql

    // Perintah untuk menghubungkan ke database dengan parameter dari 
    // variable diatas
    $con = mysqli_connect($host, $username, $password, $databaseName);

    // Apabila koneksi tidak terjalin dengan database MYSQL maka
    // akan ditampilkan pesan error dan program akan langsung berhenti
    if (!$con) {
        echo "Error: ". mysqli_connect_error();
        exit();
    }
?>