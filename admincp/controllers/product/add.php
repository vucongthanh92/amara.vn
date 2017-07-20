<?php

$db = new Models_MProduct;

if(isset($_POST['addnew'])){

	if($_FILES['image']['name'] != ""){
		$cimg = new uploadImg;
			$tenhinh = strtoseo(varPost('product'));
		if(DONGDAU==1) {
			$hinh = $cimg -> Upload_dongdau($_FILES['image'],$tenhinh,"../data/Product/",$error);
		}else{
			$hinh = $cimg -> Upload_NoReSize($_FILES['image'],$tenhinh,"../data/Product/",$error);
		}
		
	}else $hinh = "";
	
	if($_FILES['image1']['name'] != ""){
		$cimg = new uploadImg;
			$tenhinh1 = strtoseo(varPost('product'))."_01";
		if(DONGDAU==1) {
			$hinh1 = $cimg -> Upload_dongdau($_FILES['image1'],$tenhinh1,"../data/Product/",$error);
		}else{
			$hinh1 = $cimg -> Upload_NoReSize($_FILES['image1'],$tenhinh1,"../data/Product/",$error);
		}
		
	}else $hinh1 = "";
	if($_FILES['image2']['name'] != ""){
		$cimg = new uploadImg;
			$tenhinh2 = strtoseo(varPost('product'))."_02";
		if(DONGDAU==1) {
			$hinh2 = $cimg -> Upload_dongdau($_FILES['image2'],$tenhinh2,"../data/Product/",$error);
		}else{
			$hinh2 = $cimg -> Upload_NoReSize($_FILES['image2'],$tenhinh2,"../data/Product/",$error);
		}
		
	}else $hinh2="";
	if($_FILES['image3']['name'] != ""){
		$cimg = new uploadImg;
		$tenhinh3 = strtoseo(varPost('title_vn'))."_03";
		if(DONGDAU==1) {
			$hinh3 = $cimg -> Upload_dongdau($_FILES['image3'],$tenhinh3,"../data/Product/",$error);
		}else{
			$hinh3 = $cimg -> Upload_NoReSize($_FILES['image3'],$tenhinh3,"../data/Product/",$error);
		}
		
	} else $hinh3 ="";
	if($_FILES['image4']['name'] != ""){
		$cimg = new uploadImg;
			$tenhinh4 = strtoseo(varPost('product'))."_04";
		if(DONGDAU==1) {
			$hinh4 = $cimg -> Upload_dongdau($_FILES['image4'],$tenhinh4,"../data/Product/",$error);
		}else{
			$hinh4 = $cimg -> Upload_NoReSize($_FILES['image4'],$tenhinh4,"../data/Product/",$error);
		}
		
	}else $hinh4 = "";
	if($_FILES['image5']['name'] != ""){
		$cimg = new uploadImg;
			$tenhinh5 = strtoseo(varPost('product'))."_05";
		if(DONGDAU==1) {
			$hinh5 = $cimg -> Upload_dongdau($_FILES['image5'],$tenhinh5,"../data/Product/",$error);
		}else{
			$hinh5 = $cimg -> Upload_NoReSize($_FILES['image5'],$tenhinh5,"../data/Product/",$error);
		}
		
	}else $hinh5 = "";
	
	
	
	$data = array(
		'product' 			=> addslashes(varPost('product')),
		'title' 			=> addslashes(varPost('title')),
		//'alias' 			=> strtoseo(varPost('product')),
		'xuatxu' 			=> addslashes(varPost('xuatxu')),
		'quycach' 			=> addslashes(varPost('quycach')),
		'info' 			    => addslashes(varPost('info')),
		'khuyenmai' 		=> addslashes(varPost('khuyenmai')),
		'summary'	        => addslashes(varPost('summary','',1)),
		'notice'		    => addslashes(varPost('notice','',1)),
		'detail'		    => addslashes(varPost('detail','',1)),
		'city_id' 			=> addslashes(varPost('cityid')),
		'group_id' 			=> addslashes(varPost('groupid')),
		'market_price' 		=> str_replace(".","",varPost('market_price')),
		'team_price' 		=> str_replace(".","",varPost('team_price')),
		'team_priceold' 	=> str_replace(".","",varPost('team_priceold')),
		'begin_time' 		=> strtotime(varPost('begin_time')),
		'end_time' 			=> strtotime(varPost('end_time')),
		'expire_time' 		=> strtotime(varPost('expire_time')),
		'seo_title'	        => addslashes(varPost('seo_title','',1)),
		'seo_keyword'	    => addslashes(varPost('seo_keyword','',1)),
		'seo_description'	=> addslashes(varPost('seo_description','',1)),
		'per_number' 		=> addslashes(varPost('per_number')),
		'pre_number' 		=> addslashes(varPost('pre_number')),
		'hangsx' 			=> varPost('hangsx'),
		'date' 			    => addslashes(varPost('date')),
		'sort'			    => varPost('sort'),
		'ticlock'		    => varPost('ticlock','0'),
		'hot'		        => varPost('hot','0'),
		'visit'			    => varPost('visit'),
		'image'			    => $hinh,
		'image1'			=> $hinh1,
		'image2'			=> $hinh2,
		'image3'			=> $hinh3,
		'image4'			=> $hinh4,
		'image5'			=> $hinh5,
	);
	
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('product'));
	}else {$data['alias'] = varPost('alias'); }
	
	if($db-> addProduct($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		
		$idcat = $_POST['group_id'];
		if($idcat>0) {
			redirect(BASE_URL_ADMIN."product/list/".$idcat);
		}else {
			redirect(BASE_URL_ADMIN."product/list");
		}
		return;
	}
	
}else{

	
	$data = "";
}
loadview('product/add_view',$data);
?>