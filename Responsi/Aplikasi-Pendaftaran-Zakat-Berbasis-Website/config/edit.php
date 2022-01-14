<?php 
    include "config.php";
    include "function.php";

    if (isset($_POST['id']))
        $id = $_POST['id'];
    else
        $id = $_GET['id'];
    $result = mysqli_query($connect, "SELECT * FROM Daftar INNER JOIN Penzakat USING(PenzakatID) 
                                        INNER JOIN Zakat USING(ZakatID)WHERE DaftarID = '$id'");
    $data = mysqli_fetch_assoc($result);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $hasil = editData($_POST['jumAnggota'], $_POST['jenisZakat']);
        $result = mysqli_query($connect, "UPDATE Daftar INNER JOIN Penzakat USING(PenzakatID) 
                                        SET Nama_Lngkp = '$_POST[nama_lengkap]', Kontak = '$_POST[Kontak]'
                                        ,PayID = '$_POST[method_pay]', ZakatID = '$_POST[jenisZakat]', 
                                        Jum_Jiwa = '$_POST[jumAnggota]', Jum_Bayar = $hasil WHERE DaftarID = '$id'");
        header("location: ../dashboard/rekap_zakat.php");
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
    <link rel="stylesheet" href="../assets/css/boostrap.min.css">
    <title>Halaman Edit Data</title>
</head>
<body>
    <form action="edit.php" method="POST" class="form-edit shadow-lg">
        <h1 align="center" style="margin-bottom:30px;">Form Edit Data</h1>
        <div class="form-group">
            <input type="number" name='id' value="<?= $data['DaftarID']?>" hidden>
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" value="<?= $data['Nama_Lngkp'] ?>" name="nama_lengkap">
        </div>
        <div class="form-group">
            <label for="jumAnggota">Jumlah Anggota</label>
            <input type="number" style="width:100px;" class="form-control" name="jumAnggota" value="<?= $data['Jum_Jiwa'] ?>">
        </div>
        <div class="from-group" style="margin-bottom: 16px;">
            <label for="kontak">Kontak</label>
            <input required class="form-control" style="width:200px;" type="tel" name="Kontak" value="<?= $data['Kontak'] ?>"maxlength="13" vminlength="10" placeholder="Nomor Handphone" class="form-control bg-white border-md border-left-0 pl-3">
        </div>
        <div class="form-group">
            <label for="jenisZakat">Jenis Zakat</label>
            <select name="jenisZakat" id="jenisZakat" class="form-control">
                <option value="">Pilih Jenis Zakat</option>
                <option value="ZB" <?php if ($data['ZakatID'] == "ZB"){ echo "selected";}?>>Zakat Beras</option>
                <option value="ZU" <?php if ($data['ZakatID'] == "ZU"){ echo "selected";}?>>Zakat Uang</option>
            </select>
        </div>
        <div class="form-group">
            <label for="method_pay">Metode Pembayaran</label>
            <select name="method_pay" class="form-control">
                <option value="">Pilihan Pembayaran</option>
                <option value="ON" <?php if ($data['PayID'] == "ON"){ echo "selected";}?>>Pembayaran Langsung</option>
                <option value="TF" <?php if ($data['PayID'] == "TF"){ echo "selected";}?> >Tranfser Via Bank</option>
            </select>
        </div>
        <div class="form-group text-center" style="margin-top: 50px; margin-bottom:30px;">
            <input type="submit"name="Submit" class="btn btn-primary" value="Submit">
            <a href="../dashboard/rekap_zakat.php"><button class="btn btn-danger">Kembali</button></a>     
        </div>
    </form>
</body>
</html>