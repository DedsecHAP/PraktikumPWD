<?php
    include "koneksi.php";
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $permiss = $_POST['permiss'];
    $pass = md5($_POST['password']);
    $sql = "INSERT INTO users (UserID, Password, Nama_Lengkap, Email, Permiss_Level) VALUES ('$id_user', '$pass', '$nama','$email', '$permiss')";
    $query=mysqli_query($con, $sql);
    mysqli_close($con);
    header('location:tampil_user.php');
?>