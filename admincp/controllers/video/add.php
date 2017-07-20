<?php
$db = new Models_MVideo();

if(isset($_POST['addnew'])){
		
	if($_FILES['file_vn']['name']!=""){
		
		$ext = strtolower(substr(strrchr($_FILES['file_vn']['name'], '.'), 1));// lay duoi file
		$name_file_vn = time(). '_' . $_FILES['file_vn']['name'];
		
		move_uploaded_file($_FILES['file_vn']['tmp_name'], '../data/Flash/'.$name_file_vn);
		
	}else{
		$name_file_vn = "";
	}

	$data = array(
		'file_vn'		=> $name_file_vn,
		'title_vn'		=> addslashes(varPost('title_vn')),
		'link'			=> varPost('link'),
		'sort'			=> varPost('sort'),
		'ticlock'			=> varPost('ticlock','0'),
	);

	if($db-> addflash($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		redirect(BASE_URL_ADMIN."video/list");
		return;
	}
}else{
	$data = '';
}

loadview('video/add_view',$data);
?>