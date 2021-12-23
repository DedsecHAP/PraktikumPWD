<?php 
    $cari = "";
    if(isset($_POST['cari'])) {
        // Menangkap data cari yang dikirim dengan method GET
        $cari = $_POST['cari'];
        // Menampilkan value dari variable cari
    }
    echo "<h3>Form Pencarian Dengan Data MAHASISWA</h3>
    <form action='akses_mhs.php' method='POST'>
        <label>Cari :</label>
        <input type='text' name='cari' value='$cari' placeholder='Masukan Nama'>
        <input type='submit' value='Cari'>
    </form>";
    // kondisi untuk mengecek kiriman dengan method GET

    // Menginisialisasikan link ke dalam variable url
    $url = "http://localhost/pwd/Pertemuan%2010/getdatamhs.php?nim=$cari";

    // Menginisialisasikan request http ke link pada variabel $url
    $client = curl_init($url);

    // Memberikan tambahan options untuk proses request
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);

    // Mengeksekusi perintah untuk request htpp sesuai options yang sudah ditambahkan
    $respone = curl_exec($client);
    
    // Mengkonversi objek JSON menjadi objek PHP
    $result = json_decode($respone);

    // Perulangan untuk menampilkan ke halaman web site
    // setiap data yang telah direqeust, sesuai dengan atribut keynya
    if (empty($result)) {
        echo "DATA KOSONG";
    } else {
        foreach ($result as $r) {
            echo "<p>";
                echo "NIM       : " .$r->Nim. "</br>";
                echo "Nama      : " .$r->Nama. "</br>";
                echo "Jenis Kel : " .gender($r->Jkel). "</br>";
                echo "Alamat    : " .$r->Alamat. "</br>";
                echo "Tgl Lahir : " .$r->Tgl_Lahr. "</br>";
                echo "Prodi     : " .$r->Prodi. "</br>";
            echo "</p>";
        }
    }
?>

<?php 
    function gender($gender) {
        if ($gender == 'L')
            return "Laki-Laki";
        else
            return "Perempuan";
    }
?>