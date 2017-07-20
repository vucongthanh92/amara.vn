<?php
$db = new Models_MProduct;

if(isset($_POST['check_list'])){
	

	$db -> del_allcheck($_POST['check_list']);
	$link = array(
		'list'	=> "product/list",
		'add'	=> "product/add"
	);
	redirect(BASE_URL_ADMIN."product/list");
}
else{
	$id = varGetPost('id');
	
	//thong tin cat
	$pro = $db->getOneProduct($id);
	
	//xoa ung dung truoc khi edit
	//$mmanufacpro->del_allcheck($id);
	if(file_exists("../data/Product/".$pro['images'])){
		unlink("../data/Product/".$pro['images']);
	}
	$db -> del_onecheck($id);
	
	redirect(BASE_URL_ADMIN."product/list/".$pro['group_id']);
}
?>