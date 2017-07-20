<?php
$db = new Models_MCommentnew;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	$data = array(
		'fullname' 		=> varPost('fullname'),
		'email' 		=> varPost('email'),
		'title' 		=> varPost('title'),
		'content'		=> addslashes(varPost('content','',1)),
		'active'		=> varPost('active','0'),
	);
		
	$db -> editNew($data,$id);
	redirect(BASE_URL_ADMIN."commentnew/list");
	return;
}else{
	$data = '';
}

$data['info'] = $db -> getOneNew($id);
loadview("commentnew/edit_view",$data);
?>