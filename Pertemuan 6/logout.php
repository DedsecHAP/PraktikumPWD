<?php
require "koneksi.php";
    session_start();
    session_destroy();
    echo "";
    header("Location: form_login.php");
?>