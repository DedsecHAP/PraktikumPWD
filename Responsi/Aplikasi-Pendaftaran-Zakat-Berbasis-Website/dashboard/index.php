<?php
    require "../config/function.php";
    $cek = false;
    session_start();
    if (empty($_SESSION['UserID']))
        header("location: ../Admin/");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $result = Search($_POST['search'], "Confirm", "");
        if (mysqli_num_rows($result) === 0) {
            $cek = true;
        }
    } else {
        $query = "SELECT * FROM Confirm INNER JOIN Penzakat USING(PenzakatID)
        INNER JOIN Zakat USING(ZakatID)
        INNER JOIN metode_bayar USING(PayID)";
        $result = $connect->query($query);
    }
    $data = getApiData("XML");
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
    <title>Dashboard Admin</title>
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
                <a href="rekap_zakat.php">Rekap Zakat</a>
            </li>
            <li>
                <a href="../Admin/logout.php">Log Out</a>
            </li>
        </ul>
    </div>
    <div class="content" id="Dashboard">
        <p>Dashboard</p>
        <div class="dashborad">
            <div class="item-beras">
                <h1><?= CheckNull($data->statistik->zakat_beras) ?><span> Kg</span></h1>
                <img src="../assets/img/rice.png" alt="">
                <p>Zakat Beras</p>
            </div>
            <div class="item-uang">
                <h1>Rp. <span><?= CheckNull($data->statistik->zakat_uang); ?></span></h1>
                <img src="../assets/img/money.png" alt="">
                <p>Zakat Uang</p>
            </div>
            <div class="person">
                <h1><?= CheckNULL($data->statistik->penzakat) ?><span> Orang</span></h1>
                <img src="../assets/img/person.png" alt="">
                <p>Jumlah Penzakat</p>
            </div>
            <div class="list-confirm">
                <h1><?= CheckNULL($data->statistik->pendaftar) ?><span> Pendaftar</span></h1>
                <img src="../assets/img/list_confirm.png" alt="">
                <p>Menunggu Konfirmasi</p>
            </div>
        </div>
        <p>Table Konfirmasi</p>
        <div class="confirm-table">
            <div class="search-container">
                <form action="index.php" method="POST">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <table class="table table-hover table-striped">
                <thead style="font-size: 14px;">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Jenis Zakat</th>
                        <th>Metode Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Tanggal Daftar</th>
                        <th style="width: 160px;">Konfirmasi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!$cek) : ?>
                    <?php $i = 1;
                    while ($data = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $data['Nama_Lngkp'] ?></td>
                            <td><?= $data['Kontak'] ?></td>
                            <td><?= $data['Nama_Zakat'] ?></td>
                            <td><?= $data['Jenis_Metode'] ?></td>
                            <td><?= change($data['Total_Bayar']) ?></td>
                            <td><?= tanggal($data['Date']) ?></td>
                            <th>
                                <button class="btn btn-success" onclick="Terima(<?= $data['ConfirmID']?>, 'Confirm');">Terima</button>
                                <button class="btn btn-danger" onclick="Terima(<?= $data['ConfirmID']?>, 'Reject');">Tolak</button>
                            </th>
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