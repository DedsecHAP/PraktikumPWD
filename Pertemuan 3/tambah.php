<html>

<head>
    <title>Tambah data mahasiswa</title>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br /><br />
    <form action="tambah.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Nim</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Gender (L/P)</td>
                <td><input type="text" name="jkel"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>Tgl Lahir</td>
                <td><input type="date" name="tgllhr"></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><input type="text" name="prodi"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
        <?php
        // Menjalankan perintah didalam if apabila $_POST['submit'], memiliki nilai.
        if(isset($_POST['Submit'])) {

            // Dibawah adalah variabel yang digunakan untuk menampung nilai dari
            // nilai yang dilempar dengan method POST
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jkel = $_POST['jkel'];
            $alamat = $_POST['alamat'];
            $tgllhr = $_POST['tgllhr'];
            $prodi = $_POST['prodi'];
            
            // Memanggil kode yang terdapat di file koneksi.php
            include_once("koneksi.php");

            // Dengan fungsi mysqli_query, mengirim perintah sql ke database, dimana 
            // querynya adalah, menambahkan value dari variable-variable diatas 
            // ke table Mahasiswa
            $result = mysqli_query($con, "INSERT INTO mahasiswa(nim,nama,jkel,alamat,Tgl_lahr, Prodi) VALUES('$nim','$nama', '$jkel','$alamat','$tgllhr', '$prodi')");
            
            // Menampilkan pesan data berhasil disimpan
            echo "Data berhasil disimpan. <a href='index.php'>View Users</a>";
        }
        ?>
</body>
</html>