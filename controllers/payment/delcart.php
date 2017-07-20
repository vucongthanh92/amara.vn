<?php
session_start();
$mpayment = new Models_MPayment;
$id = $_GET["id"];
//$id = (int)(substr($val,0,strpos($val, '-')));
if(isset($_GET['id']) )
{
	unset($_SESSION["cart2"][$id]);
}

redirect(BASE_URL."gio-hang.html");

?>