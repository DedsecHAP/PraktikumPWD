<?php
    include 'koneksi.php';
?>

<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari" placeholder="Masukan NIM">
    <input type="submit" value="Cari">
</form>

<?php
    if(isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        echo "<b>Hasil pencarian : ".$cari."</b>";
    }
?>

<table border="1">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Kode MK</th>
        <th>MataKuliah</th>
        <th>Nilai</th>
    </tr>
    <?php
        if(isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            $sql="SELECT * from KHS INNER JOIN Matakuliah ON KHS.KodeMK = matakuliah.Kode_Matkul WHERE NIM = '$cari'";
            $tampil = mysqli_query($con,$sql);
            if (mysqli_num_rows($tampil) == 0) {
                echo "<tr>
                        <td align='center' colspan='5'>Data Tidak Ditemukan!!</td>
                    </tr>";
            }
        } else {
            $sql="SELECT * FROM KHS INNER JOIN Matakuliah ON KHS.KodeMK = matakuliah.Kode_Matkul";
            $tampil = mysqli_query($con,$sql);
        }
        $no = 1;
        while($r = mysqli_fetch_array($tampil)) : ?>
            <tr>
                <td align='center'><?= $no++; ?></td>
                <td><?= $r['NIM']; ?></td>
                <td align='center'><?= $r['KodeMK']; ?></td>
                <td><?= $r['Nama_Matkul'];?></td>
                <td align='center'><?= $r['Nilai']; ?></td>
            </tr>
        <?php endwhile; ?>
</table>