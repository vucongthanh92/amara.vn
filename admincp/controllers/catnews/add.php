<?php
$mcatnews = new Models_MCatNews;

if(isset($_POST['addnew'])){
	$khongdau = unicode_convert2(varPost('title_vn'));
	$data = array(
		'title_vn' 		   => varPost('title_vn'),
		'title_en' 		   => varPost('title_en'),
		'description_vn'   => varPost('description_vn'),
		'parentid'		   => varPost('parentid'),
		'sort'			   => varPost('sort'),
		'ticlock'		   => varPost('ticlock','0'),
		'meta_keyword' 	   => varPost('keyword'),
		'meta_description' => varPost('description'),
		'alias'            =>$khongdau,
	);

	if($mcatnews-> addCatnews($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		redirect(BASE_URL_ADMIN."catnews/list");
		return;
	}
}else{
	$data = '';
}

loadview('catnews/add_view',$data);
?>