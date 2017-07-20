<?php
include("header.php");
session_start();
$id = $_GET['id'];
if(isset($_SESSION['cart2'][$id])){
	$_SESSION['cart2'][$id] = $_SESSION['cart2'][$id]+1;
}
else {
	$_SESSION['cart2'][$id] = 1;
}
header("location: ".BASE_URL."gio-hang.html");
?>