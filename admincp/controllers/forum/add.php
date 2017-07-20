<?php
$db = new Models_MForum;

if(isset($_POST['addnew'])){
	
	$data = array(
		'fullname' 		=> varPost('fullname'),
		'email' 		=> varPost('email'),
		'title' 		=> varPost('title'),
		'question'		=> addslashes(varPost('question','',1)),
		//'reply'			=> varPost('reply','',1),
		//'lang'			=> varPost('lang','vn',1),
		'ticlock'		=> varPost('ticlock','0'),
	);

	if($db-> addNew($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "forum/list",
			'add'	=> "forum/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = '';
}

loadview('forum/add_view',$data);
?>