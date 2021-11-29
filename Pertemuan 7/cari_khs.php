<?php
    // Menambahkan File Koneksi PHP untuk menghubungkan web ke database 
    include 'koneksi.php';
?>

<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari" placeholder="Masukan NIM">
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
        <th>Nama Mahasiswa</th>
        <th>Kode MK</th>
        <th>MataKuliah</th>
        <th>Nilai</th>
    </tr>
    <?php
        // Menjalankan Statemen didalam, apabila variable $_GET['cari'], menangkap value
        // yang dikirimkan menggunakan method GET
        if(isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            // Query untuk mengambil data pada tabel KHS yang berelasi dengan tabel
            // Matakuliah dan memiliki NIM yang cocok dengan value dari variabel cari
            $sql="SELECT * from KHS INNER JOIN Matakuliah ON KHS.KodeMK = matakuliah.Kode_Matkul 
                INNER JOIN Mahasiswa USING (NIM) WHERE NIM = '$cari'";
            // Mengeksekusi Query ke database SQL
            $tampil = mysqli_query($con,$sql);
            // Kondisi untuk menampilkan pesan apabila data tidak ditemukan
            if (mysqli_num_rows($tampil) == 0) {
                echo "<tr>
                        <td align='center' colspan='5'>Data Tidak Ditemukan!!</td>
                    </tr>";
            }
        } else {
            // Kondisi ketika user tidak melakukan pencarian data, maka
            // secara default akan mengambil semua data dalam tabel 
            // KHS yang berelasi dengan tabel Matakuliah dan tabel mahasiswa
            $sql="SELECT * FROM KHS INNER JOIN Matakuliah ON KHS.KodeMK = matakuliah.Kode_Matkul
                INNER JOIN Mahasiswa USING(NIM)";
            $tampil = mysqli_query($con,$sql);
        }
        // Deklrasi dan inisialisasi variable untuk penomoran tabel
        $no = 1;
        // Perulangan untuk menampilkan data dari databse secara berurutan
        // pada tabel
        while($r = mysqli_fetch_array($tampil)) : ?>
            <tr>
                <!-- Menampilkan Data sesuai nama Field dlm databse -->
                <td align='center'><?= $no++; ?></td>
                <td><?= $r['NIM']; ?></td>
                <td><?= $r['Nama'] ?></td>
                <td align='center'><?= $r['KodeMK']; ?></td>
                <td><?= $r['Nama_Matkul'];?></td>
                <td align='center'><?= $r['Nilai']; ?></td>
            </tr>
        <?php endwhile; ?>
</table>