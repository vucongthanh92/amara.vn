<?php
/* meta */
$meta = array();
if($_GET['mod'] == 'tin-tuc') {
	if($_GET['act']=='danh-muc'){
		$db = new Models_MWebsite;
		$row_web = $db->getOneWebsite(1);
	
		$val = varGet("id");
		$mcat = new Models_MCatNews;
		$id = $mcat-> getidtoalia($val);
		if($id <=0 ){
			
			redirect(BASE_URL);
			exit();
		}
		 $meta['title'] = $info['title_vn'];
		$info =$mcat->getOneCatnews($id);
		$p= varGet("p");
		$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
		$meta['title']= $info['title_vn'];
		 if($p >= 1){
			 $meta['title']= $info['title_vn']." - Trang ".$p;
		}
		if(strlen($info['meta_keyword'])>0){
			$meta['keyword'] = OutText_Alt($info['meta_keyword']);
		} else { 
			$meta['keyword']=OutText_Alt($row_web['keyword_vn']);
		}
		if(strlen($info['meta_description'])>0){
			$meta['description'] =OutText_Alt($info['meta_description']);
		} else {
			$meta['description'] = OutText_Alt($row_web['description_vn']);
		}
	}
	elseif($_GET['act']=='chi-tiet'){
		$id = varGet("id");
		$mnews = new Models_MNews;
		$info = $mnews -> getOneNews($id,"*");
		$meta['title'] = stripcslashes($info['title_'.lang]);
		
		if(strlen($info['meta_keyword'])> 0) {
			$meta['keyword'] = OutText_Alt($info['meta_keyword']);
		}else {
			$meta['keyword'] = OutText_Alt($info['description_vn']);
		}
		if(strlen($info['meta_description'])>0){
			$meta['description'] = OutText_Alt($info['meta_description']);
		}
		else { $meta['description'] = OutText_Alt($info['description_vn']);
		 }
	}
	elseif($_GET['act'] =="timkiem") {
		$db = new Models_MWebsite;
		$row = $db->getOneWebsite(1);
		$meta['title'] = "Tìm kiếm bài viết";
		$meta['keyword'] = $row['keyword_vn'];
		$meta['description'] = $row['description_vn'];
	}
	elseif($_GET['act'] =="tieudiem"){
		$db = new Models_MWebsite;
		$row = $db->getOneWebsite(1);
		$meta['title'] = "Tin Tiêu điểm";
		$p= varGet("p");
		$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
		 if($p >= 1){
			 $meta['title']= "Tin tiêu điểm - Trang ".$p;
		}
		$meta['keyword'] = $row['keyword_vn'];
		$meta['description'] = $row['description_vn'];
	}
	elseif($_GET['act'] =="dacbiet") {
		$db = new Models_MWebsite;
		$row = $db->getOneWebsite(1);
		$meta['title'] = "Tin đặc biệt";
		$p= varGet("p");
		$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
		 if($p >= 1){
			 $meta['title']= "Tin đặc biệt - Trang ".$p;
		}
		$meta['keyword'] = $row['keyword_vn'];
		$meta['description'] = $row['description_vn'];
	}
	elseif($_GET['act'] =="xemnhieu") {
		$db = new Models_MWebsite;
		$row = $db->getOneWebsite(1);
		$meta['title'] = "Tin xem nhiều";
		$p= varGet("p");
		$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
		 if($p >= 1){
			 $meta['title']= "Tin xem nhiều - Trang ".$p;
		}
		$meta['keyword'] = $row['keyword_vn'];
		$meta['description'] = $row['description_vn'];
	}
}
elseif($_GET['mod']=='sanpham'){
	if($_GET['act']=='danhmuc'){
		$mcatelog = new Models_MCatelog;
		$id = $_GET['id'];
		//$id = $mcatelog-> GetAlias($val);
		
		$info_cat = $mcatelog->getOneCatelog($id);
		
		if($info_cat['title'] !=""){
			$meta['title'] = $info_cat['title'];
		}else{
			$meta['title'] = $info_cat['name'];
		}
		
		if($info_cat['meta_description'] != ""){
			$meta['description'] = $info_cat['meta_description'];
		}else{
			$meta['description'] = $info_cat['name'];
		}
		if($info_cat['meta_keyword'] !=""){
			$meta['keyword'] = $info_cat['meta_keyword'];
		}else{
			$meta['keyword'] = $meta['description'];
		}
	}
	elseif($_GET['act']=='chitiet'){
		$mproduct = new Models_MProduct;
		$val = $_GET['id'];
		$id = $mproduct->getAlias($val);
		if($id<=0){
			redirect(BASE_URL);
			exit();
		}
		$pro =  $mproduct ->getOneProduct($id);
		$meta['title'] = $pro['product'];
		if($pro['seo_keyword']!=''){
			$meta['keyword'] = $pro['seo_keyword'];
		}else {
			$meta['keyword'] = $pro['product'];
		}
		if($pro['seo_description']!=''){
			$meta['description'] = $pro['seo_description'];
		}else {
			$meta['description'] = $pro['title'];
		}
	}
	elseif($_GET['act']=='timkiem'){
		$meta['title'] ="Bạn muốn tìm kiếm Deal gì ?";
		$meta['description'] = "Deal Xinh - Săn Hotdeal giá rẻ! Cùng mua theo  các hotdeal sản phẩm chât lượng giá cực sốc. Khuyến mãi từ 40% đến 90%, giao hàng tận nơi miễn phí.";
		$meta['keyword'] = "Hot Deal Xinh hotdeal, nhommua, cungmua, muachung,  mua chung, nhóm mua, cung mua, nhom mua, hotdeal, phieu giam gia, cùng mua";
	}
}
elseif($_GET['mod'] == 'bmi') {
		$meta['title'] = "Tính chỉ khối cơ thể bmi";
		$meta['keyword'] = "tính chỉ khối cơ thể bmi, tinh chi khoi co the bmi";
		$meta['description'] = 'tính chỉ khối cơ thể bmi, cho biết bạn đang trong trạng thái nào, thừa cân, thiếu cân, bình thường';
}
elseif($_GET['mod']=='bai-viet'){
	if($_GET['id']==2)
	{
		$meta['title'] = "Giới Thiệu";
		$meta['keyword'] = $row['keyword_vn'];
		$meta['description'] = $row['description_vn'];
	}
	if($_GET['id']==4)
	{
		$meta['title'] = "Hướng dẫn mua hàng";
		$meta['keyword'] = $row['keyword_vn'];
		$meta['description'] = $row['description_vn'];
	}
	if($_GET['id']==5)
	{
		$meta['title'] = "Phương thức thanh toán";
		$meta['keyword'] = $row['keyword_vn'];
		$meta['description'] = $row['description_vn'];
	}
	if($_GET['id']==6)
	{
		$meta['title'] = "Chính sách khách hàng";
		$meta['keyword'] = $row['keyword_vn'];
		$meta['description'] = $row['description_vn'];
	}
	if($_GET['id']==7)
	{
		$meta['title'] = "Hệ Thống Cửa Hàng";
		$meta['keyword'] = $row['keyword_vn'];
		$meta['description'] = $row['description_vn'];
	}
}

elseif($_GET['mod'] == 'lien-he') {
		$meta['title'] = "Liên Hệ";
		$meta['keyword'] = $row['keyword_vn'];
		$meta['description'] = $row['description_vn'];
}
else {
	$db = new Models_MWebsite;
	$row = $db->getOneWebsite(1);
	$meta['title'] = $row['title_vn'];
	$meta['keyword'] = $row['keyword_vn'];
	$meta['description'] = $row['description_vn'];
}
?>