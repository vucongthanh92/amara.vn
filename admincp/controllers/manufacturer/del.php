<?php
$db = new Models_Mmanufacturer;

if(isset($_POST['check_list'])){
	$db -> del_allcheck($_POST['check_list']);
	$link = array(
		'list'	=> "manufacturer/list",
		'add'	=> "manufacturer/add"
	);
	loadview("system/del_finish",$link);
}
else{
	$id = varGetPost('id');
	$db -> del_onecheck($id);
	redirect(BASE_URL_ADMIN."manufacturer/list");
}
?>