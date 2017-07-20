<?php
$db = new Models_MBanner;

if(isset($_GET['id'])){$id = varGet("id");}

if(isset($_POST['editnew']))
{
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		//'title_en' 		=> varPost('title_en'),
		'file_vn'		=> addslashes($_POST['content_vn']),
		'location' 		=> varPost('location'),
		'link' 			=> varPost('link'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
	);

	$db -> editBanner($data,$id);
	$link = array(
		'list'	=> "banner/list",
		'add'	=> "banner/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOneBanner($id);
loadview('banner/edit_view',$data);
?>