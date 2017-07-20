<?php
$db = new Models_Mdownload;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'dateupdate'	=> time(),
	);
	
	if($_FILES['file_vn']['name']!=""){	
		
		$ext = strtolower(substr(strrchr($_FILES['file_vn']['name'], '.'), 1));// lay duoi file
		$data['file_vn'] = time() . "_" .str_replace(" ", "", $_FILES['file_vn']['name']);
		
		move_uploaded_file($_FILES['file_vn']['tmp_name'], '../data/download/'.$data['file_vn']);
		
	}

	
	$db -> editdownload($data,$id);
	$link = array(
		'list'	=> "download/list",
		'add'	=> "download/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOnedownload($id);
loadview("download/edit_view",$data);
?>