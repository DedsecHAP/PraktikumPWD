<?php
    include "koneksi.php"  ;
    session_start();
    if (!empty($_SESSION['iduser'])) {
        $sql="SELECT * FROM users ORDER BY UserID";
        $tampil = mysqli_query($con,$sql);
    
        echo 
        "<h2>Selamat Datang ",$_SESSION['iduser'],"</h2>
        <form method=POST action=form_user.php>
            <input type=submit value='Tambah User'>
        </form>
        <table style='text-align:center;'>
            <tr><th>No</th><th>Username</th><th>NamaLengkap</th><th>Email</th><th>Permission</th><th>Aksi</th></tr>";
        if (mysqli_num_rows($tampil) > 0) {
            $no=1;
            while ($r = mysqli_fetch_array($tampil)) {
                echo 
                "<tr><td>$no</td><td>$r[UserID]</td>
                    <td>$r[Nama_Lengkap]</td>
                    <td>$r[Email]</td>
                    <td>$r[Permiss_Level]</td>";
                    if ($_SESSION['Permission'] == "Super Admin")
                        echo "<td><a href='hapus_user.php?id=$r[UserID]'>Hapus</a></td>";
                    else
                        echo "<td>Not Available</td>";
                echo "</tr>";
                $no++;
            }
            echo "</table>";
            echo "<a href=logout.php><b>LOGOUT</b></a></center>";
        } else {
            echo "0 results";
        }
        mysqli_close($con);
    } else 
        header('location: form_login.php');
?>