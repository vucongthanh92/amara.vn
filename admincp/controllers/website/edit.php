<?php
$db = new Models_Mwebsite;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		"title_vn"=>varPost('title_vn'),
		"title_en"=>varPost('title_en'),
		"title_cn"=>varPost('title_cn'),
		'description_vn'	=> addslashes(varPost('description_vn','',1)),
		'description_en'	=> addslashes(varPost('description_en','',1)),
		'description_cn'	=> addslashes(varPost('description_cn','',1)),
		'message'	=> addslashes(varPost('message','',1)),
		'email'	=> addslashes(varPost('email','',1)),
		'keyword_vn'	=> addslashes(varPost('keyword_vn','',1)),
		'keyword_en'	=> addslashes(varPost('keyword_en','',1)),
		'keyword_cn'	=> addslashes(varPost('keyword_cn','',1)),
		'googleanalytics'	=> $_POST['google'],
		'enable'				=> varPost('enable'),
		'stamp'				=> varPost('stamp'),
	);
	$db -> editwebsite($data,$id);
	redirect(BASE_URL_ADMIN."website/edit/1");
	return;
}

$data['info'] = $db -> getOnewebsite($id);
loadview("website/edit_view",$data);
?>