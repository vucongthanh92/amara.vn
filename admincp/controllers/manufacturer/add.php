<?php
$db = new Models_MManufacturer;

if(isset($_POST['addnew']))
{
	
	if($_FILES['image']['name'] != ""){
		$cimg = new uploadImg;
			$tenhinh = rand_string(10);
			$hinh = $cimg -> Upload_NoReSize($_FILES['image'],$tenhinh,"../data/Manufacturer/",$error);
	}else $hinh = "";
		
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'ticlock'		=> varPost('ticlock','0'),
		'images'		=> $hinh,
	);

	if($db-> addManufacturer($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		redirect(BASE_URL_ADMIN."manufacturer/list");
		return;
	}
}else{
	$data = '';
}

loadview('manufacturer/add_view',$data);
?>