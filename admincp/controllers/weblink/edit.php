<?php
$db = new Models_MWeblink;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		"title_vn" 		   => varPost("title_vn"),
		"title_en" 		   => varPost("title_en"),
		'description_vn'   => varPost('description_vn'),
		'description_en'   => varPost('description_en'),
		"content_vn" 	   => addslashes(varPost("content_vn",'',1)),
		"content_en" 	   => addslashes(varPost("content_en",'',1)),
		"ticlock"		   => varPost("ticlock","0"),
	);
	
	$db -> editWeblink($data,$id);
	redirect(BASE_URL_ADMIN."weblink/list");
	return;
}

$data['info'] = $db -> getOneWeblink($id);
loadview("weblink/edit_view",$data);

?>