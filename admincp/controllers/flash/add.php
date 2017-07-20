<?php
$db = new Models_MFlash();

if(isset($_POST['addnew'])){
		
	if($_FILES['file_vn']['name']!=""){
		
		$ext = strtolower(substr(strrchr($_FILES['file_vn']['name'], '.'), 1));// lay duoi file
		$name_file_vn = time(). '_' . $_FILES['file_vn']['name'];
		
		move_uploaded_file($_FILES['file_vn']['tmp_name'], '../data/Flash/'.$name_file_vn);
		
	}else{
		$name_file_vn = "";
	}

	$data = array(
		'width' 		=> varPost('width'),
		'height' 		=> varPost('height'),
		'style' 		=> varPost('style'),
		'location' 		=> varPost('location'),
		'file_vn'		=> $name_file_vn,
		'link'			=> varPost('link'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		//'file_en'		=> $name_file_en,
	);

	if($db-> addflash($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		redirect(BASE_URL_ADMIN."flash/list");
		return;
	}
}else{
	$data = '';
}

loadview('flash/add_view',$data);
?>