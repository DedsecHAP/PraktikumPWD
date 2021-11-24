<?php
    if (!empty($_POST['id_user'])) {
        session_start();
        include "koneksi.php";
        $id_user = $_POST['id_user'];
        $pass=md5($_POST['paswd']);
        $sql="SELECT * FROM users WHERE UserID = '$id_user' AND Password ='$pass'";
    
        // Kondisi untuk mencocokan kode captcha yang dikiirmkan dari halaman login menggunakan
        // method POST dengan kode captcha yang sudah tersimpan pada SESSION
        if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
            $login=mysqli_query($con,$sql);
            $ketemu=mysqli_num_rows($login);
            $r= mysqli_fetch_array($login);
            if ($ketemu > 0) {
                $_SESSION['Permission'] = $r['Permiss_Level'];
                $_SESSION['iduser'] = $id_user;
                $_SESSION['passuser'] = $pass;
                echo"USER BERHASIL LOGIN<br>";
                echo "id user =",$_SESSION['iduser'],"<br>";
                echo "password=",$_SESSION['passuser'],"<br>";
                echo "Hak Akses=", $r['Permiss_Level'],"<br>";
                echo "<a href=tampil_user.php><b>DASHBOARD</b></a></center>";
                echo "  <a href=logout.php><b>LOGOUT</b></a></center>";
            } else {
                echo "<center>Login gagal! username & password tidak benar<br>";
                echo "<a href=form_login.php><b>ULANGI LAGI</b></a></center>";
            }
            mysqli_close($con);
        } else {
            echo "<center>Login gagal! Captcha tidak sesuai<br>";
            echo "<a href=form_login.php><b>ULANGI LAGI</b></a></center>"; 
        }
    } else
        header("location: form_login.php");
?>