<?php 
    // Memasukan File Koneksi.php
    require_once("koneksi.php");
    // Menginisialisasi variabel $sql dengan query mysql
    if (!empty($_GET['nim'])) {
        $nim = $_GET['nim'];
        $sql = "SELECT * FROM Mahasiswa WHERE Nim = '$nim'";
    } else
        $sql = "SELECT * FROM Mahasiswa";

    // mengeksekusi perintah sql sesuai query pada 
    // variable $sql, lalu memasukan return valuenya
    // ke dalam variable $query
    $query = mysqli_query($con, $sql);

    // Peruangan untuk memindahkan data dari database ke 
    // array 1 dimensi.
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }

    // Menginisialisasikan tipe konten JSON untuk
    // header pada html.
    header('content-type: application/json');

    // Menampilkan data ke halaman website dengan
    // format JSON.
    echo json_encode($data);

    mysqli_close($con);
?>

