<?php
if(isset($_GET['act']))
	$act = $_GET['act'];
else 
	$act = "";

switch($act)
{
	case 'timnhanh':			include('controllers/product/search.php');break;
	case 'timkiem':				include('controllers/product/search.php');break;
	case 'chitiet':				include('controllers/product/detail.php');break;
	case 'danhmuc':				include('controllers/product/list.php');break;
	case 'hang-san-xuat':		include('controllers/product/hangsanxuat.php');break;
	case 'dealmoi':				include('controllers/product/dealmoi.php');break;
	case 'dealend':				include('controllers/product/dealend.php');break;
	default:					include('controllers/product/list.php');break;
}
?>