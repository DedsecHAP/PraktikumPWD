<?php
// Menghubungkan Web ke Database MYSQL
$server = "localhost";
$username = "root";
$password = "";
$db_name = "pwd_responsi_zakat";
$connect = new mysqli($server, $username, $password, $db_name);
if (!$connect)
	die("Koneksi Gagal: ". mysqli_connect_error());