<?php
$db = new Models_MPicture;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'sort'			=> varPost('sort'),
	);
	
	//upload img
	if($_FILES['images']['name'] != ""){
		$cimg = new uploadImg;
		$name_img = $cimg -> renameImg($_FILES['images']['name']);
		$cimg -> Upload($_FILES['images']['name'],$_FILES['images']['tmp_name'],"../data/","../data/Picture/",500,'auto');
		$data['images'] = $name_img;
	}
	
	$db -> editNews($data,$id);
	$link = array(
		'list'	=> "picture/list",
		'add'	=> "picture/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOneNews($id);
loadview("picture/edit_view",$data);
?>