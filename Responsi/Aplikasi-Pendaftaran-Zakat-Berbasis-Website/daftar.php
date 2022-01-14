<?php 
    require "config/config.php";
    require "config/function.php";
    $query = "SELECT * FROM Zakat";
    $Jenis_Zakat = $connect->query($query);
    if(isset($_POST['submit'])) {
        $P = new Penyimpanan($_POST['nama_lengkp'],
                            $_POST['sapaan'],
                            $_POST['id_hp'],
                            $_POST['no_hp'],
                            $_POST['jum_jiwa'],
                            $_POST['method_pay'],
                            $_POST['jenis_zakat']
                        );
        $P->SetDB($connect);
        $P->InsertPerson();
        $P->InsertPendaftar();
        $result = $P->getResult();
        if (!$result) {
            echo "Gagal Tambah Data";
        } else {
            echo "<script>
                    alert('BERHASIL MENDAFTAR, HARAP SEGERA LAKUKAN PEMBAYARAN!!!');
                </script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/daftar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/boostrap.min.css">
    <title>Pendaftaran Zakat</title>
</head>
<body>
    <header class="Nav-bar">
        <div class="logo"></div>
        <div class="judul">
            <p><span class="jdl_1">Masjid Al-Muhajirin</span><span class="jdl_2">Perumahan Puri Melati, Sleman, Yogyakarta</span></p>
        </div>
        <nav>
            <a href="index.html">BERANDA</a>
            <a href="daftar.php">ZAKAT</a>
        </nav>
    </header>
    <section>
        <div class="container">
            <div class="row py-5 mt-4 align-items-center">
                <!-- For Demo Purpose -->
                <div class="col-md-5 pr-lg-0 mb-5 mb-md-6">
                    <img src="assets/img/wallpaper_zakat.jpg" alt="" class="img-fluid mb-3 d-none d-md-block">
                    <h1>Pendaftaran Zakat Fitrah</h1>
                    <p class="font-italic text-muted mb-0">Silahkan Daftar, lalu lakukan pembayaran, bisa dengan cara: <br> 1. Bayar langsung <br> 2. Tranfser Via Bank
                        <br>Setelah melakukan pembayaran, harap segera konfirmasi ke panitia Zakat
                    </p>
                </div>
                <!-- Registeration Form -->
                <div class="col-md-7 col-lg-6 ml-auto">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 style="background-color: orange; text-align: center; padding: 5px; font-weight: bold;">Jenis Zakat</h5>
                            </div>
                            <div class="input-group col-lg-12 mb-4">
                                <select required onchange="Satuan(this.value)" id="jenis_zakat" name="jenis_zakat" class="form-control custom-select bg-white border-left-1 border-md">
                                    <option value="">Pilihan Zakat Fitrah</option>
                                    <?php getProduk() ?>
                                </select>
                            </div>
                            <div class="input-group col-lg-12 mb-1">
                                <input required id="jum_jiwa" type="number" name="jum_jiwa"  onchange="Jumlah(this.value);" min="0" placeholder="Jumlah Jiwa" class="form-control bg-white border-left-1 border-md">
                            </div>
                            <p style="font-size:10px; margin-left: 20px;" >*Termasuk Perwakilan Penzakat</p>
                            <div class="input-group col-lg-12 mb-4">
                                <input disabled id="total" type="text" name="total" placeholder="(Rp. / Kg)" class="form-control bg-white border-left-1 border-md">
                            </div>
                            <div class="col-lg-12">
                                <h5 style="background-color: orange; text-align: center; padding: 5px; font-weight: bold;">Silahkan Masukan Data Penzakat</h5>
                            </div>
                            <div class="input-group col-lg-12 mb-4">
                                <select required name="sapaan" class="form-control custom-select bg-white border-left-1 border-md">
                                    <option value="">Sapaan</option>
                                    <option value="Bp. ">Bapak</option>
                                    <option value="Ibu. ">Ibu</option>
                                    <option value="Sdr. ">Saudara</option>
                                    <option value="Sdri. ">Saudari</option>
                                </select>
                            </div>
                            <div class="input-group col-lg-12 mb-4">
                                <input required type="text" name="nama_lengkp" placeholder="Nama Lengkap" class="form-control bg-white border-left-1 border-md">
                            </div>
                            <!-- Phone Number -->
                            <div class="input-group col-lg-12 mb-1">
                                <select id="id_hp" name="id_hp" style="max-width: 80px" class="custom-select form-control bg-white border-left-1 border-md h-100 font-weight-bold text-muted">
                                    <option value="62">+62</option>
                                </select>
                                <input required type="tel" name="no_hp" maxlength="13" minlength="10" placeholder="Nomor Handphone" class="form-control bg-white border-md border-left-0 pl-3">
                            </div>
                            <p style="font-size:10px; margin-left: 20px;" >Contoh Isian: 81223456678</p>
                            <div class="col-lg-12">
                                <h5 style="background-color: orange; text-align: center; padding: 5px; font-weight: bold;">Jenis Pembayaran</h5>
                            </div>
                            <div class="input-group col-lg-12 mb-4">
                                <select required name="method_pay" class="form-control custom-select bg-white border-left-1 border-md">
                                    <option value="">Pilihan Pembayaran</option>
                                    <option value="ON">Pembayaran Langsung</option>
                                    <option value="TF">Tranfser Via Bank</option>
                                </select>
                            </div>
                            <!-- Submit Button -->
                            <div class="form-group col-lg-12 mx-auto mb-0">
                                <button id="btn-daftar" class="btn btn-primary btn-block py-2 font-weight-bold" type="submit" name="submit" >Daftar Zakat</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p>Copyright @2022 Hamas. All Right Reserved</p>
    </footer>
    <script src="assets/js/function.js"></script>
</body>

</html>