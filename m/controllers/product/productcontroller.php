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
	case 'info':				include('controllers/product/infosearch.php');break;
	default:					include('controllers/product/list.php');break;
}
?>