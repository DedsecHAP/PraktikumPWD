<?php 
    require "../config/config.php";
    require "../config/function.php";
    $cek = false;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Login Admin</title>
</head>

<body>
    <header class="Nav-bar">
        <div class="logo"></div>
        <div class="judul">
            <p><span class="jdl_1">Masjid Al-Muhajirin</span><span class="jdl_2">Perumahan Puri Melati, Sleman,
                    Yogyakarta</span></p>
        </div>
        <nav>
            <a href="../index.html">BERANDA</a>
            <a href="../daftar.php">ZAKAT</a>
        </nav>
    </header>
    <!-- FORM LOGIN -->
    <section>
        <h1 align="center">SILAHKAN LOGIN</h1>
        <h5 align="center" style="margin-bottom: 40px">Untuk Dapat Masuk ke Halaman Admin</h5>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <div class="form">
                <label for="username">Username</label><br>
                <input id="inuser" type="text" name="username" placeholder="Masukan Username" style="width:95%;">
            </div><br>
            <div class="form">
                <label for="password">Password</label><br>
                <input id="inpass" type="password" name="password" placeholder="Masukan Password" style="width: 95%;">
            </div>
            <input type="checkbox" onclick="show_pass()" id="showpass">
            <label for="showpass">Show Password</label><br>
            <div class="form" style="margin-top:10px;">
                <label for="captcha">Captcha</label>
                <img src='../config/captcha.php' />
                <input name='captcha' style="width: 20%; height:40px;" type='text'>
            </div>
            <?php
            session_start();
            if (isset($_POST['submit'])) {
                if (empty($_POST['username']) && empty($_POST['password']))
                    echo "<h4 id='alert'>Harap Isi Username dan Password</h4>";
                else if (empty($_POST['username']) && !empty($_POST['password']))
                    echo "<h4 id='alert'>Harap Isi Username</h4>";
                else if (!empty($_POST['username']) && empty($_POST['password']))
                    echo "<h4 id='alert'>Harap Isi Password</h4>";
                else if (empty($_POST['captcha']))
                    echo "<h4 id='alert'>Harap Isi Captcha</h4>";
                else if ($_SESSION["captcha_code"] != $_POST['captcha'])
                    echo "<h4 id='alert'>Captcha Salah!!</h4>";
                else {
                    $username = validationLogin($_POST['username']);
                    $_SESSION['UserID'] = $username;
                    $password = crypt(validationLogin($_POST['password']), "1900018121");
                    $_SESSION['PassID'] = $password;
                    $query = "SELECT * FROM users WHERE UserID = '$username' AND Password = '$password'";
                    $result = mysqli_num_rows(mysqli_query($connect, $query));
                    if ($result)
                        echo "<script>window.location.href='../dashboard/'</script>";
                    else
                        echo "<h4 id='alert'>Username dan Password Salah!!</h4>";
                }
            } ?>
            <div class="form">
                <button class="btn-login" type="submit" name="submit">Login</button>
                <button class="btn-reset">Reset</button>
            </div>
        </form>
    </section>
    <footer>
        <p>Copyright @2022 Hamas. All Right Reserved</p>
    </footer>
    <script src="../assets/js/login.js"></script>
</body>

</html>