<?php
    include_once("koneksi.php");
    // Display selected user data based on id
    // Getting id from url
    $nim = $_GET['nim'];
    // Fetech user data based on id
    $result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim='$nim'");
    $user_data = mysqli_fetch_array($result);
        $nim    = $user_data['Nim'];
        $nama   = $user_data['Nama'];
        $jkel   = $user_data['Jkel'];
        $alamat = $user_data['Alamat'];
        $tgllhr = $user_data['Tgl_Lahr'];
        $prodi  = $user_data['Prodi'];
?>
<?php
    // Menjalankan Perintah didalam if apabila $_POST['update'] berisi value.
    if(isset($_POST['update']))
    {
        // Variable-variable untuk menampung nilai yang dilempar dengan method POST
        $nim    = $_POST['nim'];
        $nama   = $_POST['nama'];
        $jkel   = $_POST['jkel'];
        $alamat = $_POST['alamat'];
        $tgllhr = $_POST['tgllhr'];
        $prodi  = $_POST['prodi'];
        
        // Dengan fungsi mysqli_query, mengirim perintah sql ke database dengan 
        // query untuk melakukan UPDATE data pada table mahasiswa dengan
        // paramter variable-variable diatas
        $result = mysqli_query($con, "UPDATE Mahasiswa SET Nama='$nama',Jkel='$jkel',Alamat='$alamat',Tgl_Lahr='$tgllhr', Prodi = '$prodi' WHERE Nim='$nim'");
        
        // perintah untuk melakukan redirect halaman ke index.php
        header("Location: index.php");
    }
?>
<html>

<head>
    <title>Edit Data Mahasiswa</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br /><br />
    <form name="update_mahasiswa" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="text" name="jkel" value="<?php echo $jkel;?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $alamat;?>"></td>
            </tr>
            <tr>
                <td>Tgl Lahir</td>
                <td><input type="date" name="tgllhr" value="<?php echo $tgllhr;?>"></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><input type="text" name="prodi" value="<?php echo $prodi;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="nim" value="<?php echo $_GET['nim'];?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>