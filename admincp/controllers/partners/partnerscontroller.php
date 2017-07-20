<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/partners/add.php');break;
	case 'edit':	include('controllers/partners/edit.php');break;
	case 'del':		include('controllers/partners/del.php');break;
	case 'list':	include('controllers/partners/list.php');break;
	case 'save':	include('controllers/partners/save.php');break;
	default:		include('controllers/partners/list.php');break;
}
?>