<?php
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $nama_file = $_FILES['fupload']['name'];
    $deskripsi = $_POST['deskripsi'];

    $direktori = "C:/xampp/htdocs/PWD/Pertemuan 1/Upload/1900018121/$nama_file";
    if (move_uploaded_file($lokasi_file, $direktori)) {
        echo "<strong style='color: red'>Berhasil Upload File!!!</strong><br>";
        echo "<strong>Nama File: </strong> $nama_file <br>";
        echo "<strong>Deskripsi File: </strong> $deskripsi";
    } else
        echo "<strong style='color: red'>Gagal Upload File!!!</strong><br>";
    echo "<br><br>";
    echo "Download File: <a href=download.php>List File</a>";
?>