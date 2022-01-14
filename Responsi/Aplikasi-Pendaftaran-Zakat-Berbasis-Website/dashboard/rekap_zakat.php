<?php
require "../config/function.php";
$cek = false;
session_start();
$insearch = "";
if (empty($_SESSION['UserID']))
    header("location: ../Admin/");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $insearch = $_POST['search'];
    $result = Search($_POST['search'], "Daftar", $_POST['filter']);
    if (mysqli_num_rows($result) === 0) {
        $cek = true;
    }
} else {
    $query = "SELECT * FROM Daftar INNER JOIN Penzakat USING(PenzakatID)
    INNER JOIN Zakat USING(ZakatID)
    INNER JOIN Metode_Bayar USING(PayID) ORDER BY Tanggal";
    $result = $connect->query($query);
}
if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    echo "<script>alert('$pesan')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Rekap Data Zakat</title>
</head>

<body>
    <div class="Nav-bar">
        <div class="logo"></div>
        <div class="judul">
            <p><span class="jdl_1">Masjid Al-Muhajirin</span><span class="jdl_2">Perumahan Puri Melati, Sleman, Yogyakarta</span></p>
        </div>
    </div>
    <div class="left-panel">
        <div class="info-login">
            <img src="../assets/img/user.png" alt="">
            <p>Admin</p>
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="index.php">Dashboard</a>
            </li>
            <li>
                <a aria-current="page" href="rekap_zakat.php" >Rekap Zakat</a>
            </li>
            <li>
                <a href="../Admin/logout.php">Log Out</a>
            </li>
        </ul>
    </div>
    <div class="content">
        <div class="rekap">
            <div class="search-container">
                <form action="rekap_zakat.php" method="POST"">
                    <input type="text" placeholder="Search.." value="<?= $insearch ?>" name="search">
                    <select name="filter" id="filter" class="filter">
                        <option value="">Filter</option>
                        <optgroup label="Jenis Zakat">
                            <option value="ZB">Beras</option>
                            <option value="ZU">Uang</option>
                        </optgroup>
                    </select>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div>
                <h1>Daftar Zakat Fitrah</h1>
                <a class="btn btn-primary" style="margin-bottom: 10px"href="cetak_laporan.php" role="button">Cetak</a>
            </div>
            <table class="table">
                <thead style="background-color: #0066FF; color: white; font-weight: bold; font-size: 14px;">
                    <tr>
                        <th>No</th>
                        <th>Nama Penzakat</th>
                        <th>Kontak</th>
                        <th>Jumlah Anggota</th>
                        <th>Jenis Zakat</th>
                        <th>Metode Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Tanggal Konfirmasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody
                <?php if (!$cek) : ?>
                <?php $i = 1;
                    while ($data = mysqli_fetch_array($result)) : ?>
                        <tr style="font-size:13px;">
                            <td><?= $i++ ?></td>
                            <td align="left"><?= $data['Nama_Lngkp'] ?></td>
                            <td><?= $data['Kontak'] ?></td>
                            <td><?= $data['Jum_Jiwa'] ?> Orang</td>
                            <td><?= $data['Nama_Zakat'] ?></td>
                            <td><?= $data['Jenis_Metode'] ?></td>
                            <td><?= change($data['Jum_Bayar']) ?></td>
                            <td><?= tanggal($data['Tanggal']) ?></td>
                            <td>
                                <img class="img-btn-modif" src="../assets/icon/edit.png"  onclick="Modif(<?=$data['DaftarID']?>, 'Edit');">
                                <img class="img-btn-del" src="../assets/icon/delete.png" onclick="Modif(<?=$data['DaftarID']?>, 'Hapus');">
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="8" rowspan="2" style="font-size: 20px; font-weight: bold;">DATA TIDAK DITEMUKAN!!!</td>
                </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <p>Copyright @2022 Hamas. All Right Reserved</p>
    </footer>
    <script src="../assets/js/function.js"></script>
</body>

</html>