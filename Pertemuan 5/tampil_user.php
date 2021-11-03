<?php
    include "koneksi.php";

    echo 
    "<h2>User</h2>
    <form method=POST action=form_user.php>
        <input type=submit value='Tambah User'>
    </form>
    <table>
        <tr><th>No</th><th>Username</th><th>NamaLengkap</th><th>Email</th><th>Aksi</th></tr>";
    $sql="SELECT * FROM users ORDER BY UserID";
    $tampil = mysqli_query($con,$sql);

    if (mysqli_num_rows($tampil) > 0) {
        $no=1;
        while ($r = mysqli_fetch_array($tampil)) {
            echo 
            "<tr><td>$no</td><td>$r[UserID]</td>
                <td>$r[Nama_Lengkap]</td>
                <td>$r[Email]</td>
                <td><a href='hapus_user.php?id=$r[UserID]'>Hapus</a></td>
            </tr>";
            $no++;
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    mysqli_close($con);
?>