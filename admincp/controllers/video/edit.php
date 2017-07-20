<?php
$db = new Models_MVideo;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'file_vn'		=> $name_file_vn,
		'title_vn'		=> addslashes(varPost('title_vn')),
		'link'			=> varPost('link'),
		'sort'			=> varPost('sort'),
		'ticlock'			=> varPost('ticlock','0'),
	);
	
	if($_FILES['file_vn']['name']!=""){	
		
		$ext = strtolower(substr(strrchr($_FILES['file_vn']['name'], '.'), 1));// lay duoi file
		$data['file_vn'] = time() . '_' . $_FILES['file_vn']['name'];
		
		move_uploaded_file($_FILES['file_vn']['tmp_name'], '../data/Flash/'.$data['file_vn']);
		
	}

	
	$db -> editflash($data,$id);
	redirect(BASE_URL_ADMIN."video/list");
	return;
}

$data['info'] = $db -> getOneflash($id);
loadview("video/edit_view",$data);
?>