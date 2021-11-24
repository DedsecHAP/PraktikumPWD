<?php
    include "koneksi.php";
    $sql="DELETE FROM users WHERE UserID= '$_GET[id]'";
    mysqli_query($con, $sql);
    mysqli_close($con);
    header('location:tampil_user.php');
?>