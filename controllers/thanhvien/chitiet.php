<?php
	if($_SESSION['login_id'] != 1) {
		header("location: ".BASE_URL);
		exit();
	}
	$db = new Models_MThanhvien;
	$sp['user'] = $db->getOneUser($_SESSION['login_user_id']);
	loadview("thanhvien/view_detail",$sp);

?>