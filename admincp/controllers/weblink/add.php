<?php
$db = new Models_MWeblink;

if(isset($_POST['addnew'])){
	
	$data = array(
		'title_vn' 		   => varPost('title_vn'),
		'title_en' 		   => varPost('title_en'),
		'description_vn'   => varPost('description_vn'),
		'description_en'   => varPost('description_vn'),
		'content_vn' 	   => addslashes(varPost('content_vn','',1)),
		'content_en' 	   => addslashes(varPost('content_en','',1)),
		'ticlock'		   => varPost('ticlock','0'),
	);

	if($db-> addWeblink($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		redirect(BASE_URL_ADMIN."weblink/list");
		return;
	}
	
}else{
	$data = '';
}

loadview('weblink/add_view',$data);
?>