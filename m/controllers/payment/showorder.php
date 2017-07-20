<?php
	if($_SESSION['login_id']!=1){ redirect(BASE_URL."dang-nhap.html");}
	$cart["email_admin"]=$title['emaillienhe_vn'];
	$cart['map_title'] = $map_title;
	$db = new Models_MThanhvien;
	$cart['user'] = $db->getOneUser($_SESSION['login_user_id']);
	loadview("payment/showorder",$cart);
?>