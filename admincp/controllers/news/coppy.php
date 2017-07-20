<?php
$db = new Models_MNews;
$dt = new Models_MTinmoi;
$id = varGetPost("id");

if(isset($_POST['addnew'])){
	if($_FILES['images']['name'] != ""){
		$tenhinh = unicode_convert2(varPost('title_vn'));
		$cimg = new uploadImg;
		if(DONGDAU==1) {
			$hinh = $cimg -> Upload_dongdau($_FILES['images'],$tenhinh,"../data/News/",$error);
		}else{
			$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/News/",$error);
		}
	}else{ $hinh = varPost('hinhanh');}
	$data = array(
		'title_vn' 		=> addslashes(varPost('title_vn')),
		'title_en' 		=> addslashes(varPost('title_en')),
		'meta_description' 		=> addslashes(varPost('meta_description')),
		'meta_keyword' 		=> addslashes(varPost('meta_keyword')),
		'description_vn'=> addslashes(varPost('description_vn','',1)),
		'description_en'=> addslashes(varPost('description_en','',1)),
		'content_vn'	=> addslashes(varPost('content_vn','',1)),
		'content_en'	=> addslashes(varPost('content_en','',1)),
		'date' 		=> varPost('date'),
		'idcat' 		=> varPost('idcat'),
		'images'		=> $hinh,
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		'visit'		=> varPost('visit','0'),
		'comment'		=> varPost('comment','1'),
		'share'		=> varPost('share','1'),
		
	);

		$db-> addNews($data);
		//$db-> addNews($data);
		$dt -> del_onecheck($id);
		redirect(BASE_URL_ADMIN."news/duyettin");
	
}
$data['info'] = $dt -> getOneNews($id);
loadview('news/coppy_view',$data);
?>