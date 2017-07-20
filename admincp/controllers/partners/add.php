<?php
$db = new Models_MPartners;

if(isset($_POST['addnew'])){

    if($_FILES['images']['name'] != ""){
		$cimg = new uploadImg;
			$tenhinh = rand_string(10);
			$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/images/",$error);
	}else $hinh = "";

	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'images' 		=> $hinh,
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
	);

	if($db-> addPartners($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		
		redirect(BASE_URL_ADMIN."partners/list");
		return;
	}
}else {
	$data = '';
}

loadview('partners/add_view',$data);
?>