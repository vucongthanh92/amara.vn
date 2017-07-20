<?php
$db = new Models_MHoidap;
$pg = new Paging;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	$data = array(
		
		'ticlock'		=> varPost('ticlock'),
	);
		
	$db -> editNew($data,$id);
	redirect(BASE_URL_ADMIN."hoidap/list");
	return;
}else{
	$data = '';
}

$numrow = 200;
$div = 11;
$total = $db->countdata();
$start = $p * $numrow;
$where = "parentid='".$id."'";
$data['dap'] = $db->listdata($where,$start,$numrow);

$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."hoidap/list");
$data['info'] = $db -> getOneNew($id);
loadview("hoidap/edit_view",$data);
?>