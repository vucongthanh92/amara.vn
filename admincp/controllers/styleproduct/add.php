<?php
$db = new Models_MStyleProduct;

if(isset($_POST['addnew'])){
	
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		//'description_vn'=> varPost('description_vn','',1),
		//'description_en'=> varPost('description_en','',1),
		//'images'		=> $name_img,
		'parentid'		=> varPost('parentid'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
	);

	if($db-> addCatelog($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "styleproduct/list",
			'add'	=> "styleproduct/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = '';
}

loadview('styleproduct/add_view',$data);
?>