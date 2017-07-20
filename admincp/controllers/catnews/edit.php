<?php
$mcatnews = new Models_MCatnews;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	if($_POST['alias']=="")
	{
		$khongdau = strtoseo(varPost('title_vn'));
	}
	else 
	{
		$khongdau = $_POST['alias'];
	}
	
	$data = array(
		'title_vn' 		     => varPost('title_vn'),
		'title_en' 		     => varPost('title_en'),
		'description_vn'     => varPost('description_vn'),
		'parentid'	  	     => varPost('parentid'),
		'sort'			     => varPost('sort'),
		'meta_keyword' 	     => varPost('keyword'),
		'meta_description' 	 => varPost('description'),
		'ticlock'		     => varPost('ticlock','0'),
		'alias'              => $khongdau,
	);
	
	$mcatnews -> editCatnews($data,$id);
	redirect(BASE_URL_ADMIN."catnews/list");
	return;
}

$data['info'] = $mcatnews -> getOneCatnews($id);
loadview("catnews/edit_view",$data);
?>