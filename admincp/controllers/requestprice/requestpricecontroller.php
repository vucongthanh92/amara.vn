<?php
$act = $_GET['act'];

switch($act)
{
	case 'edit':	include('controllers/requestprice/edit.php');break;
	case 'del':		include('controllers/requestprice/del.php');break;
	case 'list':	include('controllers/requestprice/list.php');break;
	default:		include('controllers/requestprice/list.php');break;
}
?>