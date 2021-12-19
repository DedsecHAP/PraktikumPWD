<?php 
    $url = "http://localhost/pwd/Pertemuan%2010/getdatamhs.php";
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
    $respone = curl_exec($client);
    $result = json_decode($respone);
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

    function gender($gender) {
        if ($gender == 'L')
            return "Laki-Laki";
        else
            return "Perempuan";
    }
?>