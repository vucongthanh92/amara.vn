<?php
if(isset($_SESSION['cart2'])== false){
	redirect(BASE_URL);
}
else {
	$tong =0 ;
	foreach($_SESSION['cart2'] as $k =>$v){
		$tong = $v+ $tong;
	}
	if($tong==0) redirect(BASE_URL);
}

$map_title = PAYMENT;
session_start();
$mpayment = new Models_MPayment;
$cart['map_title'] = $map_title; 
if(isset($_POST['soluong'])){
	$soluong = $_POST['soluong'];
	//print_r($soluong);
	foreach($soluong as $k=>$v){
		$_SESSION['cart2'][$k] = $v;
	}
	//redirect(BASE_URL."gio-hang.html");
}

loadview("payment/showcart",$cart);
?>