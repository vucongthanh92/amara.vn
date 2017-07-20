<?php
$db = new Models_MBanner;

if(isset($_POST['addnew'])){
	
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		//'title_en' 		=> varPost('title_en'),
		'file_vn'		=> addslashes($_POST['content_vn']),
		//'file_en'		=> addslashes($_POST['content_en']),
		'location' 		=> varPost('location'),
		'link' 			=> varPost('link'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
	);

	if($db-> addBanner($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "banner/list",
			'add'	=> "banner/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = '';
}

loadview('banner/add_view',$data);
?>