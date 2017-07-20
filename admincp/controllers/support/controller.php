<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/support/add.php');break;
	case 'edit':	include('controllers/support/edit.php');break;
	case 'del':		include('controllers/support/del.php');break;
	case 'list':	include('controllers/support/list.php');break;
	case 'save':	include('controllers/support/save.php');break;
	default:		include('controllers/support/list.php');break;
}
?>