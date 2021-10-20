<?php
    // Memanggil kode yang berada pada file koneksi.php
    include_once("koneksi.php");

    // variable untuk menampung nilai yang dilempar menggunakan
    // method GET
    $nim = $_GET['nim'];

    // Dengan fungsi mysqli_query, mengirim perintah sql ke database dengan
    // query untuk melakukan hapus data pada table mahasiswa dimana data yang
    // dihapus memiliki nilai dari variable $nim.
    $result = mysqli_query($con, "DELETE FROM mahasiswa WHERE nim='$nim'");
    
    // Perintah untuk melakukan redirect, ke halaman index.php
    header("Location:index.php?");
?>