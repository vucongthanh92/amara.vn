<?php
$db = new Models_MManufacturer;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'ticlock'		=> varPost('ticlock','0'),
	);
	
	if($_FILES['image']['name'] != ""){
		$cimg = new uploadImg;
		$tenhinh = rand_string(10);
		$hinh = $cimg -> Upload_NoReSize($_FILES['image'],$tenhinh,"../data/Manufacturer/",$error);
		if($hinh!="") 
		{
			$data['images'] = $hinh;
		}
	}
	
	$db -> editManufacturer($data,$id);
	redirect(BASE_URL_ADMIN."manufacturer/list");
	return;
}

$data['info'] = $db -> getOneManufacturer($id);
loadview("manufacturer/edit_view",$data);
?>