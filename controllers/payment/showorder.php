<?php
	
	$map_title = PAYMENT. $arrowmap. 'Thông tin';
	$cart["email_admin"]=$title['emaillienhe_vn'];
	$cart['map_title'] = $map_title;
	if(empty($_SESSION['cart2'])){
		redirect(BASE_URL);
	}
	loadview("payment/showorder",$cart);
?>