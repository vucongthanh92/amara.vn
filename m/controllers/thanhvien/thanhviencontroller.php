<?php
if(isset($_GET['act']))
	$act = $_GET['act'];
else 
	$act = "";

switch($act)
{
	case 'dangky':			include('controllers/thanhvien/dangky.php');break;
	case 'dangnhap':				include('controllers/thanhvien/dangnhap.php');break;
	case 'order':				include('controllers/thanhvien/order.php');break;
	case 'chitiet':				include('controllers/thanhvien/chitiet.php');break;
	case 'forgot':				include('controllers/thanhvien/forgot.php');break;
	case 'logout':				include('controllers/thanhvien/logout.php');break;
	case 'canhan':			include('controllers/thanhvien/canhan.php');break;
	case 'changepassword':			include('controllers/thanhvien/changepassword.php');break;
	case 'avatar':			include('controllers/thanhvien/avatar.php');break;
	default:					include('controllers/thanhvien/dangky.php');break;
}
?>