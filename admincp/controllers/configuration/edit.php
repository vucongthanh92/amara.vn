<?php
$db = new Models_MConfiguration;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'keyword_vn'	=> varPost('keyword_vn','',1),
		'keyword_en'	=> varPost('keyword_en','',1),
		'email' 		=> varPost('email','',1),
		'yahoo1' 		=> varPost('yahoo1','',1),
		'yahoo2' 		=> varPost('yahoo2','',1),
		'phone' 		=> varPost('phone','',1),
		'title_yahoo1' 	=> varPost('title_yahoo1','',1),
		'title_yahoo2' 	=> varPost('title_yahoo2','',1),
	);
	
	$db -> editConfig($data,$id);
	redirect(BASE_URL_ADMIN."configuration/list");
	return;
}

$data['info'] = $db -> listdata();
loadview("configuration/edit_view",$data);
?>