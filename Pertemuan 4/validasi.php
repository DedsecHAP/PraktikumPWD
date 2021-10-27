<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Validasi</title>
</head>
<body>
    <?php
        require_once "config.php";
        $namaErr = $emailErr = $genderErr = $websiteErr = $sukses = "";
        $nama = $email = $gender = $comment = $website = "";
        $cek = TRUE;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            function test_input($data) {
                $data = trim($data);
                $data = stripcslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            if (empty($_POST["nama"])) {
                $namaErr = "Nama Harus Diisi";
                $cek = FALSE;
            }else 
                $nama = test_input($_POST["nama"]);
            
            if (empty($_POST['email'])) {
                $emailErr = "Email harus Diisi";
                $cek = FALSE;
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                    $emailErr = "Email Tidak Sesuai Format";
            }

            if (empty($_POST["website"]))
                $website = "";
            else
                $website = test_input($_POST["website"]);
            
            if (empty($_POST["comment"]))
                $comment = "";
            else
                $comment = test_input($_POST["comment"]);
            
            if (empty($_POST["gender"])) {
                $genderErr = "Gender Harus Dipilih";
                $cek = FALSE;
            } else    
                $gender = test_input($_POST["gender"]);

            if ($cek) {
                $result = mysqli_query($koneksi, "INSERT INTO Identitas VALUES ('', '$nama', '$email', '$website', '$comment', '$gender')");
                if ($result)
                    $sukses = "Berhasil Menambahkan Data yang Valid";
            }
        }
    ?>
    <h2>Posting Komentar </h2>
    <p><span class = "error">* Harus Diisi.</span></p>
    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table>
            <tr>
                <td>Nama:</td>
                <td>
                    <input type = "text" name = "nama">
                    <span class = "error">* <?php echo $namaErr;?></span>
                </td>
            </tr>
            <tr>
                <td>E-mail: </td>
                <td>
                    <input type = "text" name = "email">
                    <span class = "error">* <?php echo $emailErr;?></span>
                </td>
            </tr>
            <tr>
                <td>Website:</td>
                <td> 
                    <input type = "text" name = "website">
                    <span class = "error"><?php echo $websiteErr;?></span>
                </td>
            </tr>
            <tr>
                <td>Komentar:</td>
                <td><textarea name = "comment" rows = "5" cols = "40"></textarea></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type = "radio" name = "gender" value = "L">Laki-Laki
                    <input type = "radio" name = "gender" value = "P">Perempuan
                    <span class = "error">* <?php echo $genderErr;?></span>
                </td>
            </tr>
            <td>
                <input type = "submit" name = "submit" value = "Submit">
            </td>
            <td>
                <button><a href="validasi.php" style="text-decoration:none; color: black;">Reload Halaman</a></button>
            </td>
        </table>
    </form>
    <h2>Data yang Anda Isi</h2>
    <p><h4 class = "error"><?= $sukses ?></h4></p>
    <table class="outputTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat Website</th>
                <th>Komentar</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; $result = mysqli_query($koneksi, "SELECT * FROM Identitas"); ?>
            <?php while ($data = mysqli_fetch_array($result)) : ?>
            <tr>
                <td style="text-align: center;"><?= $i; $i++; ?></td>
                <td><?= $data['Nama']; ?></td>
                <td><?= $data['Email']; ?></td>
                <td><a href="https://<?= $data['Website']?>" target="_blank"><?= $data['Website']; ?></a></td>
                <td><?= $data['Komentar']; ?></td>
                <td style="text-align: center;"><?= $data['Jen_Kel'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>