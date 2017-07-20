<?php
if($_SESSION['level'] != 1){
	redirect(BASE_URL_ADMIN);
}
$db = new Models_MCity;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'name' 		=> varPost('name'),
		'parentid'		=> 0,
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
	);
	
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('name'));
	}else {$data['alias'] = varPost('alias'); }
	
	$db -> editCatelog($data,$id);
	redirect(BASE_URL_ADMIN."city/list");
	return;
}

$data['info'] = $db -> getOneCatelog($id);
loadview("city/edit_view",$data);
?>