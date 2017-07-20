<?php
$mflash = new Models_MFlash();
$banner["flash"]['logo_thuonghieu'] = $mflash->getOneflashLocation(1);
$banner["flash"]['logo_chinhanh'] = $mflash->getOneflashLocation(11);
$banner["flash"]['logo_giaohang'] = $mflash->getOneflashLocation(12);
$menu['adv'] = $mflash->listdata('*', 'location = "2" AND ticlock = "0"','sort asc, Id desc');

$mnnews = new Models_MNews();

if(isset($_POST['btn_search']))
{
	$_SESSION['keyword'] = $_POST['keyword'];
	$keyword = strtoseo($_POST['keyword']);
	redirect(BASE_URL."tim-kiem.html/".$keyword);
}

$footer['gioithieu'] = $mnnews->listdata('Id, title_vn', 'idcat = "3" AND ticlock = "0"','sort asc, Id desc');
$footer['hoptac'] = $mnnews->listdata('Id, title_vn', 'idcat = "1" AND ticlock = "0"','sort asc, Id desc');
$footer['trogiup'] = $mnnews->listdata('Id, title_vn', 'idcat = "2" AND ticlock = "0"','sort asc, Id desc');
$footer['support'] = $title;

$menu['new'] = $mnnews->listdata('Id, title_vn', 'idcat = "4" AND ticlock = "0" AND NoiBat = "1"','sort asc, Id desc');

$mncity = new Models_MCity();
$banner['tinh'] = $mncity->listdata('id, name,alias', 'ticlock = "0"','sort asc, id desc');

$mncatelog = new Models_MCatelog();
$banner['catelog'] = $mncatelog->listdata('id, ename,name', 'parentid = "0" AND ticlock = "0"','sort_order asc, Id desc');

session_start();
if(isset($_SESSION['cart2'])){
	$s =0 ;
	foreach($_SESSION['cart2'] as $k=>$v){
		$s = $s+$v;
	}
	$banner['tong'] = $s;
} else {
	$banner['tong'] = 0;
}

?>