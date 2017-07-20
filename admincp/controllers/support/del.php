<?php
$db = new Models_MSupport;

if(isset($_POST['check_list'])){
	$db -> del_allcheck($_POST['check_list']);
	$link = array(
		'list'	=> "support/list",
		'add'	=> "support/add"
	);
	loadview("system/del_finish",$link);
}
else{
	$id = varGetPost('id');
	$db -> del_onecheck($id);
	$link = array(
		'list'	=> "support/list",
		'add'	=> "support/add"
	);
	loadview("system/del_finish",$link);
}
?>