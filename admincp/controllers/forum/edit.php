<?php
$db = new Models_MForum;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	$data = array(
		'fullname' 		=> varPost('fullname'),
		'email' 		=> varPost('email'),
		'title' 		=> varPost('title'),
		'question'		=> addslashes(varPost('question','',1)),
		//'reply'			=> varPost('reply','',1),
		//'lang'			=> varPost('lang','vn',1),
		'ticlock'		=> varPost('ticlock','0'),
	);
		
	$db -> editNew($data,$id);
	$link = array(
		'list'	=> "forum/list",
		'add'	=> "forum/add"
	);
	loadview("system/edit_finish",$link);
	return;
}else{
	$data = '';
}

$data['info'] = $db -> getOneNew($id);
loadview("forum/edit_view",$data);
?>