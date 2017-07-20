<?php
session_start();
$id =$_GET["id"];
if(isset($_SESSION['cart2'][$id])){
	$_SESSION['cart2'][$id] = $_SESSION['cart2'][$id] +1;
}else {
	$_SESSION['cart2'][$id] = 1;
}
redirect(BASE_URL."gio-hang.html");

?> 
