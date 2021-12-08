<?php
    include_once("koneksi.php");
    $result = mysqli_query($con, "SELECT * FROM Mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Mahasiswa</title>
</head>
<style>
    @page size-A4 {size:  21.0cm 29.7cm; margin: 1.5cm;}
    .page {
        size: landscape;
        visibility: visible;
        margin: 6px 0px 6px 0px;
        width: 20cm;
    }
    .data {
        border-collapse: collapse;
    }
    .data tr td {
        font-size: 14px;
        padding: 5px;
        font-family: Tahoma;
        border: 1px solid black;
    }
    .data tr th {
        font-weight: bold;
        padding: 5px;
        border: 1px solid black;
    }
    h1, h2, h3 {
        padding: 2px;
        margin: 0px;
    };
</style>
<body onload="window.print()">
    <div class="page">
        <br>
        <h1 align="center">DATA MAHASISWA</h1>
        <h3 align="center">Tahun <?= date('Y') ?>/<?= date('Y')+1; ?></h3>
        <br><br>
        <table class="data">
            <tr>
                <th>NO.</th>
                <th>NIM</th>
                <th>NAMA</th>
                <th>GENDER</th>
                <th>ALAMAT</th>
                <th>TGL LAHIR</th>
                <th>PROGRAM STUDI</th>
            </tr>
            <?php $i = 0;while ($user_data = mysqli_fetch_array($result)) : ?>
                <tr>
                    <td align="center"><?= ++$i; ?></td>
                    <td align="center"><?= $user_data['Nim']; ?></td>
                    <td><?= $user_data['Nama']; ?></td>
                    <td align="center"><?= $user_data['Jkel']; ?></td>
                    <td align="center"><?= $user_data['Alamat']; ?></td>
                    <td align="center"><?= date('d-m-Y', strtotime($user_data['Tgl_Lahr'])); ?></td>
                    <td><?= $user_data['Prodi']; ?></td>
                </tr>
                <?php endwhile; ?>
        </table>
        <table width="20%" style="font-weight: bold; margin-top: 5px;">
            <tr>
                <td>Total: <?= $i ?> Mahasiswa</td>
            </tr>
        </table>
    </div>
</body>
</html>