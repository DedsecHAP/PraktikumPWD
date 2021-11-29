<?php
    include '../koneksi.php';
?>

<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
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
        <th>Nilai</th>
    </tr>
    <?php
        if(isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            $sql="select * from KHS where nim = ' ".$cari." '";
            $tampil = mysqli_query($con,$sql);
        } else {
            $sql="select * from KHS";
            $tampil = mysqli_query($con,$sql);
        }
        $no = 1;
        while($r = mysqli_fetch_array($tampil)) : ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $r['NIM']; ?></td>
                <td><?php echo $r['kodeMK']; ?></td>
                <td><?php echo $r['nilai']; ?></td>
            </tr>
        <?php endwhile; ?>
</table>