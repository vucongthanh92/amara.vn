<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/city/add.php');break;
	case 'edit':	include('controllers/city/edit.php');break;
	case 'del':		include('controllers/city/del.php');break;
	case 'list':	include('controllers/city/list.php');break;
	case 'save':	include('controllers/city/save.php');break;
	default:		include('controllers/city/list.php');break;
}
?>