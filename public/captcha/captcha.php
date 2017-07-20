<?php
session_start();
$ranStr = md5(microtime());
$ranStr = substr($ranStr, 0, 4);
$_SESSION['cap_code'] = $ranStr;
$newImage = imagecreatefromjpeg("cap_bg.jpg");
$txtColor = imagecolorallocate($newImage, 204, 4, 105);
imagestring($newImage, 6, 25, 5, $ranStr, $txtColor);
header("Content-type: image/jpeg");
imagejpeg($newImage);
?>


