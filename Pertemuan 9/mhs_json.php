<?php
    include "koneksi.php";
    $sql="SELECT * FROM Mahasiswa ORDER BY nim";
    $tampil = mysqli_query($con,$sql);

    if (mysqli_num_rows($tampil) > 0) {
        $no=1;
        $response = array();
        $response["DataMahasiswa"] = array();
        while ($r = mysqli_fetch_array($tampil)) {
            $h['nim'] = $r['Nim'];
            $h['nama'] = $r['Nama'];
            $h['jkel'] = $r['Jkel'];
            $h['alamat'] = $r['Alamat'];
            $h['tgllhr'] = $r['Tgl_Lahr'];
            $h['prodi'] = $r['Prodi'];
            array_push($response["DataMahasiswa"], $h);
        }
        echo json_encode($response);
    } else {
        $response["message"]="tidak ada data";
        echo json_encode($response);
    }
?>