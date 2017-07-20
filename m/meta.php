<?php
/* meta */
$meta = array();
if($_GET['mod']=='sanpham' && $_GET['act']=='chitiet') {
	$mproduct = new Models_MProduct;
	$val = $_GET['id'];
	$id =  $mproduct->getAlias($val);
	if($id<=0){
		redirect(BASE_URL."404.php");
		exit();
	}
	$pro = $mproduct->getOneProduct($id);
	$meta['title'] = $pro['title'];
	$meta['description'] = $pro['title'];
	$meta['keywork'] = 'Hot Deal Xinh hotdeal, nhommua, cungmua, muachung,  mua chung, nhóm mua, cung mua, nhom mua, hotdeal, phieu giam gia, cùng mua.';
} 
else if($_GET['mod']=='sanpham' && $_GET['act']=='danhmuc') {
	$mcat = new Models_MCatelog;
	$pro = $mcat->getOneCatelog($_GET['id']);
	$meta['title'] = $pro['name'];
	$meta['description'] = $pro['meta_description'];
	$meta['keywork'] = $pro['meta_eyword'];
}
else {
	$meta['title'] = "DEALHOT.VN, Mua Hàng Chất Lượng Nhận Quà Tặng Hot Mỗi Ngày!";
	$meta['keywork'] = 'Hot Deal Xinh hotdeal, nhommua, cungmua, muachung,  mua chung, nhóm mua, cung mua, nhom mua, hotdeal, phieu giam gia, cùng mua.';
	$meta['description'] = 'Deal Xinh - Săn Hotdeal giá rẻ! Cùng mua theo  các hotdeal sản phẩm chât lượng giá cực sốc. Khuyến mãi từ 40% đến 90%, giao hàng tận nơi miễn phí.';
}

?>