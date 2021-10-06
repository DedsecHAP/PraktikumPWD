<?php
    $myDir = "C:/xampp/htdocs/PWD/Pertemuan 1/Upload/1900018121/";
    $dir = opendir($myDir);
    echo "Isi Folder (Klik link untuk download): <br>";
    while ($tmp = readdir($dir))
        echo "<a href='$tmp' target='_BLANk'>$tmp</a><br>";
    closedir($dir);
    echo "<br><br>";
    echo "Kembali ke Halaman: <a href=latihan1.html>Upload</a>";
?>