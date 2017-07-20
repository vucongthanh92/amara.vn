<?php
$db = new Models_MProduct;
$mstylepro = new Models_MStylePro();
$mmanufacpro = new Models_MManufacPro();
$id = varGetPost("id");

if(isset($_POST['addnew'])){

	if($_FILES['images']['name'] != ''){
		$cimg = new uploadImg;
		$name_img0 = $cimg -> renameImg($_FILES['images']['name']);
		$cimg -> Upload($_FILES['images']['name'],$_FILES['images']['tmp_name'],"../data/","../data/Product/",175,110);
	}else{
		$name_img0 = '';
	}
	
	for($i = 1 ; $i<=5; $i++){
		$name_img = "name_img".$i;
		if($_FILES['images'.$i]['name'] != ''){
			$cimg = new uploadImg;
			$$name_img = $cimg -> renameImg($_FILES['images'.$i]['name']);
			$cimg -> Upload($_FILES['images'.$i]['name'],$_FILES['images'.$i]['tmp_name'],"../data/","../data/Product/",175,110);
		}else{
			$$name_img = '';
		}
	}
	
	$data = array(
		'title_vn' 			=> addslashes(varPost('title_vn')),
		'description_vn'	=> addslashes(varPost('description_vn','',1)),
		'content_vn'		=> addslashes(varPost('content_vn','',1)),
		'idcat' 			=> varPost('idcat'),
		'video'				=> varPost('video'),
		'status'			=> varPost('status'),
		'warranty'			=> varPost('warranty'),
		'price'				=> str_replace(".", "", varPost('price')),
		'price_promotion'	=> str_replace(".","",varPost('price_promotion')),
		'ticpromotion'		=> varPost('ticpromotion'),
		'images'			=> $name_img0,
		'images1'			=> $name_img1,
		'images2'			=> $name_img2,
		'images3'			=> $name_img3,
		'images4'			=> $name_img4,
		'images5'			=> $name_img5,
		'unit'				=> "VNĐ",
		'sort'				=> varPost('sort'),
		'hot'				=> varPost('hot','0'),
		'ticlock'			=> varPost('ticlock','0'),
		'ticnew'			=> varPost('ticnew','0'),
		'codepro'			=> varPost('codepro','0'),
		'info_promotion'	=> addslashes(varPost('info_promotion')),
	);
	
	$idpro = $db->getinsertid();
	
	if($db-> addProduct($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		/* them thanh cong */
		$idcat = $_POST['idcat'];
		$link = array(
			'list'	=> "product/list/".$idcat,
			'add'	=> "product/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}
$data['info'] = $db -> getOneProduct($id);


loadview("product/addto_view",$data);
?>
