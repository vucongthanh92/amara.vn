<?php
$db = new Models_MThanhvien();

if(isset($_POST['check_list'])){
	
	$db -> del_allcheck($_POST['check_list']);
	redirect(BASE_URL_ADMIN."thanhvien/list");
	return;
}
else{
	$db -> del_onecheck($id);
	redirect(BASE_URL_ADMIN."thanhvien/list");
	return;
}
?>