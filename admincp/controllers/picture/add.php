<?php
$db = new Models_MPicture;

if(isset($_POST['addnew'])){
	
	$cimg = new uploadImg;
	$name_img = $cimg -> renameImg($_FILES['images']['name']);
	$cimg -> Upload($_FILES['images']['name'],$_FILES['images']['tmp_name'],"../data/","../data/Picture/",500,'auto');
	
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'images'		=> $name_img,
		'sort'			=> varPost('sort'),
	);

	if($db-> addNew($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "picture/list",
			'add'	=> "picture/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = "";
}

loadview('picture/add_view',$data);
?>