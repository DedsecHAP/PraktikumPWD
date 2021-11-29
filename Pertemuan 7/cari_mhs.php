
<?php
    // Menambahkan File Koneksi PHP untuk menghubungkan web ke database 
    include 'koneksi.php';
?>
<h3>Form Pencarian Dengan PHP MAHASISWA</h3>

<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari" placeholder="Masukan Nama">
    <input type="submit" value="Cari">
</form>

<?php
    // kondisi untuk mengecek kiriman dengan method GET
    if(isset($_GET['cari'])) {
        // Menangkap data cari yang dikirim dengan method GET
        $cari = $_GET['cari'];
        // Menampilkan value dari variable cari
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
            // Query untuk mengambil data dari table mahasiswa dimana
            // memiliki Nama dari Value Cari
            $sql="SELECT * from mahasiswa where nama like'%".$cari."%'";
            // Mengeksekusi Query ke database SQL
            $tampil = mysqli_query($con,$sql);
            // Kondisi untuk menampilkan pesan apabila data tidak ditemukan
            if (mysqli_num_rows($tampil) == 0) {
                echo "<tr>
                        <td align='center' colspan='3'>Data Tidak Ditemukan!!</td>
                    </tr>";
            }
        } else {
            // Kondisi ketika user tidak melakukan pencarian data, maka
            // secara default akan mengambil semua data dalam tabel 
            // mahasiswa
            $sql="SELECT * FROM mahasiswa";
            $tampil = mysqli_query($con,$sql);
        } 
        $no = 1;
        // Perulangan untuk menampilkan data dari table mahasiswa
        while($r = mysqli_fetch_array($tampil)):?>
            <tr>
                <!-- Menampilkan Data sesuai nama Field dlm databse -->
                <td align="center"><?= $no++; ?></td>
                <td><?= $r['Nim']; ?></td>
                <td><?= $r['Nama']; ?></td>
            </tr>
        <?php endwhile; ?>
</table>