<?php
    include_once("koneksi.php");
    $result = mysqli_query($con, "SELECT * FROM Mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
</head>
<body>
    <a href="tambah.php">Tambah Data Baru</a><br><br>
    <table border='1' >
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Alamat</th>
            <th>Tgl Lahir</th>
            <th>Program Studi</th>
            <th>Update</th>
        </tr>
        <?php while ($user_data = mysqli_fetch_array($result)) : ?>
            <tr>
                <td><?= $user_data['Nim']; ?></td>
                <td><?= $user_data['Nama']; ?></td>
                <td><?= $user_data['Jkel']; ?></td>
                <td><?= $user_data['Alamat']; ?></td>
                <td><?= $user_data['Tgl_Lahr']; ?></td>
                <td><?= $user_data['Prodi']; ?></td>
                <td><a href="edit.php?nim=<?= $user_data['Nim'];?>">Edit</a>|
                    <a href="delete.php?nim=<?= $user_data['Nim'];?>">Delete</a>    
            </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>