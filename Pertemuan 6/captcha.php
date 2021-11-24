<?php 
// Mulai Menjalankan Session
session_start();

// Memanggil fungsi rand untuk membaut angka secara acak lalu dienkripsi menggunakan
// md5 setelah itu valuenya dimasukan ke variable random_alpha
$random_alpha = md5(rand());

// Mengambil value 0-6 karakter dari variable random_alpha lalu dimasukan
// ke variable captcha_code
$captcha_code = substr($random_alpha, 0, 6);

// Memasukan value dari variable captcha code ke session dengan 
// nama captcha_code
$_SESSION["captcha_code"] = $captcha_code;

// Membuat image dengan lebar 70 dan tinggi 30 menggunakan fungsi imagecreatetruecolor 
// lalu valuenya dimasukan ke variable target_layer
$target_layer = imagecreatetruecolor(70, 30);

// Fungsi yang digunakan untuk menginisialisasi background warna pada 
// image yang telah dimasukan ke variable target_layer
$captcha_background = imagecolorallocate($target_layer, 255, 160, 119);

// Fungsi untuk menggabungkan image dengan background warna yang telah diinsialisasi
// sebelumnya pada variable target_layer dan captcha_background
imagefill($target_layer, 0, 0, $captcha_background);

// Fungsi yang digunakan untuk menginisialisasi warna huruf dari captcha
// lalu return valuenya dimasukan ke variable captcha_text_color
$captcha_text_color = imagecolorallocate($target_layer, 0, 0, 0);

// Fungsi yang menggabungkan image, warna background image dan string captcha 
// menjadi satu image, sehingga hasil imagenya terdapat kode captcha
imagestring($target_layer, 5, 5, 5, $captcha_code, $captcha_text_color);

// mengatur content type website menjadi tipe gambar JPEG
header("Content-type: image/jpeg");

// Fungsi untuk menampilkan gambar ke halaman website
imagejpeg($target_layer);
?>