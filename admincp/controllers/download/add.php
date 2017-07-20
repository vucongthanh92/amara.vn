<?php
$db = new Models_MDownload();

if(isset($_POST['addnew'])){
		
	if($_FILES['file_vn']['name']!=""){
		
		$ext = strtolower(substr(strrchr($_FILES['file_vn']['name'], '.'), 1));// lay duoi file
		$name_file_vn = time() . "_" .str_replace(" ", "", $_FILES['file_vn']['name']);
		
		move_uploaded_file($_FILES['file_vn']['tmp_name'], '../data/download/'.$name_file_vn);
		
	}else{
		$name_file_vn = "";
	}
	
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'file_vn'		=> $name_file_vn,
		'dateupdate'	=> time(),
	);

	if($db-> adddownload($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "download/list",
			'add'	=> "download/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = '';
}

loadview('download/add_view',$data);
?>