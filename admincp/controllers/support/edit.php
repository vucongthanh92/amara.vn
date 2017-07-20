<?php
$db = new Models_MSupport;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		//'title_vn' 		=> varPost('title_vn'),
		//'title_en' 		=> varPost('title_en'),
		'nick_vn' 		=> varPost('nick_vn'),
		//'nick_en' 		=> varPost('nick_en'),
		'name_vn' 		=> varPost('name_vn'),
		//'name_en' 		=> varPost('name_en'),
		//'phone_vn' 		=> varPost('phone_vn'),
		//'phone_en' 		=> varPost('phone_en'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		'style'			=> varPost('style','0'),
	);
	
	$db -> editsupport($data,$id);
	$link = array(
		'list'	=> "support/list",
		'add'	=> "support/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOnesupport($id);
loadview("support/edit_view",$data);
?>