<?php
$db = new Models_MHoidap;

if(isset($_POST['check_list'])){
	$db -> del_allcheck($_POST['check_list']);
	redirect(BASE_URL_ADMIN."hoidap/list");
	return;
}
else{
	$id = varGetPost('id');
	$db -> del_onecheck($id);
	redirect(BASE_URL_ADMIN."hoidap/list");
	return;
}
?>