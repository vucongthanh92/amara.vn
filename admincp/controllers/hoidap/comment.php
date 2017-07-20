<?php
$db = new Models_MHoidap;
$pg = new Paging;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	$data = array(
		
		'ticlock'		=> varPost('ticlock'),
		'parentid'		=> $id,
		'title_vn'      => varPost('title'),
		'name'      => varPost('fullname'),
		'email'      => varPost('email'),
		'content_vn'=> varPost('content','',1),
		'date'   =>date("Y-m-d H:i:s"),
	);
		
	$db -> addNew($data,$id);
	redirect(BASE_URL_ADMIN."hoidap/list");
	return;
}else{
	$data = '';
}

$data['info'] = $db -> getOneNew($id);
loadview("hoidap/coment_view",$data);
?>