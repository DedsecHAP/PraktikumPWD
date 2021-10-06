<?php
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $komentar = $_POST['komentar'];

    echo "<head>
                <title>My Guest Book</title>
        </head>";
    $file = fopen("guestbook.txt", "a+");
    fputs($file, "$nama|$alamat|$email|$status|$komentar\n");
    fclose($file);
    echo "Terima Kasih Atas Partisipasi Anda Mengisi Buku Tamu <br>";
    echo "<a href=tampilan.php>Isi Buku Tamu</a><br>";
    echo "<a href=lihat.php>Lihat Buku Tamu</a><br>";
?>