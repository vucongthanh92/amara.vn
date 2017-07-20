<?php
$db = new Models_MFlash;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'width' 		=> varPost('width'),
		'height' 		=> varPost('height'),
		'style' 		=> varPost('style'),
		'location' 		=> varPost('location'),
		'link'			=> varPost('link'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
	);
	
	if($_FILES['file_vn']['name']!=""){	
		
		$ext = strtolower(substr(strrchr($_FILES['file_vn']['name'], '.'), 1));// lay duoi file
		$data['file_vn'] = time() . '_' . $_FILES['file_vn']['name'];
		
		move_uploaded_file($_FILES['file_vn']['tmp_name'], '../data/Flash/'.$data['file_vn']);
		
	}

	
	$db -> editflash($data,$id);
	redirect(BASE_URL_ADMIN."flash/list");
	return;
}

$data['info'] = $db -> getOneflash($id);
loadview("flash/edit_view",$data);
?>