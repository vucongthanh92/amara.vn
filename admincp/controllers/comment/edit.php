<?php
$db = new Models_MComment;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	$data = array(
		'hoten' 		=> varPost('hoten'),
		'email' 		=> varPost('email'),
		'phone' 		=> varPost('phone'),
		'content' 		=> varPost('content'),
		'ticlock'		=> varPost('ticlock','0'),
	);
		
	$db -> editNew($data,$id);
	redirect(BASE_URL_ADMIN."comment/list");
	return;
}else{
	$data = '';
}

$data['info'] = $db -> getOneNew($id);
loadview("comment/edit_view",$data);
?>