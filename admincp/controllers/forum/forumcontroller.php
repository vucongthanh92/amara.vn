<?php
$act = $_GET['act'];

switch($act) 
{
	case 'add':		include('controllers/forum/add.php');break;
	case 'edit':	include('controllers/forum/edit.php');break;
	case 'del':		include('controllers/forum/del.php');break;
	case 'list':	include('controllers/forum/list.php');break;
	default:		include('controllers/forum/list.php');break;
}
?>