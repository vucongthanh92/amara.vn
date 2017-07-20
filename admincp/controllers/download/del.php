<?php
$db = new Models_MDownload();

if(isset($_POST['check_list'])){
	
	$db -> del_allcheck($_POST['check_list']);
	$link = array(
		'list'	=> "download/list",
		'add'	=> "download/add"
	);
	loadview("system/del_finish",$link);
}
else{
	$id = varGetPost('id');
	$data = $db->getOnedownload($id);
	if(file_exists('../data/download/'.$data['file_vn']))
		unlink('../data/download/'.$data['file_vn']);
		
	$db -> del_onecheck($id);
	$link = array(
		'list'	=> "download/list",
		'add'	=> "download/add"
	);
	loadview("system/del_finish",$link);
}
?>