<?php
if(isset($_GET['act']))
	$act = $_GET['act'];
else 
	$act = "";

switch($act)
{
	case 'city':			include('controllers/deal/city.php');break;
	case 'timkiem':				include('controllers/deal/search.php');break;
	case 'chitiet':				include('controllers/deal/detail.php');break;
	case 'danhmuc':				include('controllers/deal/list.php');break;
	default:					include('controllers/deal/list.php');break;
}
?>