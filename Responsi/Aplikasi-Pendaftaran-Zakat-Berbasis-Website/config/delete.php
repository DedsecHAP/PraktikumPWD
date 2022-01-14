<?php 
    include "config.php";
    $result = mysqli_query($connect, "DELETE Daftar, Penzakat FROM Daftar INNER JOIN
                            Penzakat USING(PenzakatID) WHERE DaftarID = '$_GET[id]'");
    mysqli_close($connect);
    header("location: ../dashboard/rekap_zakat.php?pesan=Berhasil Menghapus Data");
?>