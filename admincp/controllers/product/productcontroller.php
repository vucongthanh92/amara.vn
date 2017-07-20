<?php
$act = $_GET['act'];

switch($act)
{
	case 'addto':	include('controllers/product/addto.php');break;
	case 'add':		include('controllers/product/add.php');break;
	case 'edit':	include('controllers/product/edit.php');break;
	case 'del':		include('controllers/product/del.php');break;
	case 'list':	include('controllers/product/list.php');break;
	case 'dealhethan':	include('controllers/product/dealhethan.php');break;
	case 'dealdangchay' :	include('controllers/product/dealdangchay.php');break;
	case 'save':	include('controllers/product/save.php');break;
	default:		include('controllers/product/list.php');break;
}
?>