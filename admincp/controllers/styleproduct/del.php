<?php
$db = new Models_MStyleProduct;

if(isset($_POST['check_list'])){
	$db -> del_allcheck($_POST['check_list']);
	$link = array(
		'list'	=> "styleproduct/list",
		'add'	=> "styleproduct/add"
	);
	loadview("system/del_finish",$link);
}
else{
	$id = varGetPost('id');
	$db -> del_onecheck($id);
	$link = array(
		'list'	=> "styleproduct/list",
		'add'	=> "styleproduct/add"
	);
	loadview("system/del_finish",$link);
}
?>