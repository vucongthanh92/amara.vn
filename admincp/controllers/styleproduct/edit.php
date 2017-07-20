<?php
$db = new Models_MStyleProduct;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		//'description_vn'=> varPost('description_vn','',1),
		//'description_en'=> varPost('description_en','',1),
		'parentid'		=> varPost('parentid'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
	);

	
	$db -> editCatelog($data,$id);
	$link = array(
		'list'	=> "styleproduct/list",
		'add'	=> "styleproduct/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOneCatelog($id);
loadview("styleproduct/edit_view",$data);
?>