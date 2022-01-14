<?php 
    session_start();
    $bil1 = rand(1, 100);
    $bil2 = rand(5, 50);
    $captcha_code = $bil1 . " + " . $bil2;
    $_SESSION["captcha_code"] = $bil1+$bil2;
    $target_layer = imagecreatetruecolor(75, 30);
    $captcha_background = imagecolorallocate($target_layer, 255, 160, 119);
    imagefill($target_layer, 0, 0, $captcha_background);
    $captcha_text_color = imagecolorallocate($target_layer, 0, 0, 0);
    imagestring($target_layer, 5, 5, 5, $captcha_code, $captcha_text_color);
    header("Content-type: image/jpeg");
    imagejpeg($target_layer);
?>