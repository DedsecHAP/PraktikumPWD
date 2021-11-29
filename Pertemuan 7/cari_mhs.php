<?php
    include 'koneksi.php';
?>
<h3>Form Pencarian Dengan PHP MAHASISWA</h3>
<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari" placeholder="Masukan Nama">
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
        <th>Nama</th>
    </tr>

    <?php
        if(isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            $sql="SELECT * from mahasiswa where nama like'%".$cari."%'";
            $tampil = mysqli_query($con,$sql);
            if (mysqli_num_rows($tampil) == 0) {
                echo "<tr>
                        <td align='center' colspan='3'>Data Tidak Ditemukan!!</td>
                    </tr>";
            }
        } else {
            $sql="SELECT * FROM mahasiswa";
            $tampil = mysqli_query($con,$sql);
        } 
        $no = 1;
        while($r = mysqli_fetch_array($tampil)):?>
            <tr>
                <td align="center"><?= $no++; ?></td>
                <td><?= $r['Nim']; ?></td>
                <td><?= $r['Nama']; ?></td>
            </tr>
        <?php endwhile; ?>
</table>