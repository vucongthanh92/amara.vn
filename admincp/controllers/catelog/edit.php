<?php
if($_SESSION['level'] != 1){
	redirect(BASE_URL_ADMIN);
}
$db = new Models_MCatelog;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'name' 		    => varPost('name'),
		'parentid'		=> varPost('parentid'),
		'sort_order'	=> varPost('sort'),
		'zone'			=> varPost('zone'),
		'ticlock'		=> varPost('ticlock','0'),
	);
	
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('name'));
	}else {$data['alias'] = varPost('alias'); }
	
	$db -> editCatelog($data,$id);
	redirect(BASE_URL_ADMIN."catelog/list");
	return;
}

$data['info'] = $db -> getOneCatelog($id);
loadview("catelog/edit_view",$data);
?>