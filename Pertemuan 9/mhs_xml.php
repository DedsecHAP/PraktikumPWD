<?php
    include "koneksi.php";
    header('Content-Type: text/xml');

    $query = "SELECT * FROM Mahasiswa";
    $hasil = mysqli_query($con,$query);
    $jumField = mysqli_num_fields($hasil);
    echo "<?xml version='1.0'?>";
    echo "<data>";

    while ($data = mysqli_fetch_array($hasil)) {
        echo "<mahasiswa>";
            echo"<nim>",$data['Nim'],"</nim>";
            echo"<nama>",$data['Nama'],"</nama>";
            echo"<jkel>",$data['Jkel'],"</jkel>";
            echo"<alamat>",$data['Alamat'],"</alamat>";
            echo"<tgllhr>",$data['Tgl_Lahr'],"</tgllhr>";
            echo"<prodi>",$data['Prodi'],"</prodi>";
        echo "</mahasiswa>";
    }
    echo "</data>";
?>